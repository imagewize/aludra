<?php
/**
 * Abilities API integration: let a coding agent build pages from Aludra patterns.
 *
 * An agent writing Aludra block markup from memory produces block-validation
 * errors that the frontend never shows — the page looks right and is broken for
 * every editor that opens it. These abilities let an agent assemble a page from
 * Aludra's registered patterns instead, swapping only text and links, so what
 * lands in post_content is markup that already passed the pattern validator.
 *
 * Abilities (REST: /wp-json/wp-abilities/v1/abilities/<name>/run):
 *
 * - aludra/list-patterns  Pattern slugs, titles, kinds and descriptions.
 * - aludra/get-pattern    One pattern's markup plus its replaceable texts and links.
 * - aludra/list-blocks    Aludra block types: attributes, parents, style variations.
 * - aludra/compose-page   Create or update a page from an ordered list of patterns.
 * - aludra/check-page     Server-side structural check of a page's blocks.
 *
 * They run as the authenticated user (e.g. an application password), with that
 * user's capabilities. The MCP Adapter plugin, when installed, exposes the same
 * abilities as MCP tools.
 *
 * @package Aludra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Block attributes that hold structure, not copy. Text replacement never
 * touches them, so a find string can't accidentally rewrite a class name,
 * a layout setting or an enum value.
 */
const ALUDRA_ABILITIES_STRUCTURAL_ATTRS = array(
	'className',
	'anchor',
	'align',
	'style',
	'layout',
	'metadata',
	'lock',
	'tagName',
	'textAlign',
	'fontSize',
	'fontFamily',
	'backgroundColor',
	'textColor',
	'gradient',
	'ref',
	'slug',
	'theme',
	'area',
	'id',
	'url',
	'href',
	'linkTarget',
	'rel',
	'sizeSlug',
	'linkDestination',
	'displayMode',
	'engine',
	'layoutMode',
	'menuSlug',
);

/**
 * Blocks that take a section colour scheme (is-aludra-scheme-*).
 *
 * Mirrors BLOCKS in assets/js/editor-section-schemes.js; keep the two in step.
 */
const ALUDRA_ABILITIES_SCHEME_BLOCKS = array(
	'core/group',
	'aludra/spine-section',
	'aludra/split-section',
	'aludra/about',
	'aludra/service-intro',
	'aludra/services-block',
	'aludra/service-blocks',
	'aludra/feature-cards',
	'aludra/feature-list-grid',
	'aludra/icon-grid',
	'aludra/cta-columns',
	'aludra/pricing-tiers',
	'aludra/comparison-table',
	'aludra/faq-tabs',
	'aludra/trust-bar',
	'aludra/review-profiles',
	'aludra/testimonial-grid',
	'aludra/photo-grid',
	'aludra/instagram-embed',
);

/**
 * Pattern kinds an agent may put into a page's post_content.
 *
 * Header, footer and mega-menu patterns belong in template parts, not in a page.
 */
const ALUDRA_ABILITIES_PAGE_KINDS = array( 'page', 'section', 'carousel' );

/**
 * Replace exact text segments in an HTML fragment.
 *
 * A text segment is the text between two tags. A segment is replaced only when
 * its trimmed, entity-decoded text equals a find string exactly; surrounding
 * whitespace is kept. Replacement text is escaped, so it can never inject markup.
 *
 * Pure PHP (no WordPress calls), so it is unit-tested directly.
 *
 * @param string               $html Markup fragment.
 * @param array<string,string> $map  Plain-text find => plain-text replace.
 * @return string
 */
function aludra_abilities_replace_html_text( $html, array $map ) {
	if ( '' === $html || empty( $map ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/>([^<>]+)</',
		static function ( $m ) use ( $map ) {
			$raw     = $m[1];
			$decoded = html_entity_decode( $raw, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
			$trimmed = trim( $decoded );

			if ( '' === $trimmed || ! array_key_exists( $trimmed, $map ) ) {
				return $m[0];
			}

			preg_match( '/^\s*/u', $raw, $lead );
			preg_match( '/\s*$/u', $raw, $trail );

			return '>' . $lead[0] . htmlspecialchars( $map[ $trimmed ], ENT_NOQUOTES, 'UTF-8' ) . $trail[0] . '<';
		},
		$html
	);
}

/**
 * Collect the distinct text segments of an HTML fragment, in document order.
 *
 * The counterpart of aludra_abilities_replace_html_text(): every string this
 * returns is a valid find key for it.
 *
 * @param string $html Markup, block comments included or not.
 * @return string[]
 */
function aludra_abilities_extract_html_texts( $html ) {
	$html = preg_replace( '/<!--.*?-->/s', '', $html );
	preg_match_all( '/>([^<>]+)</', $html, $matches );

	$texts = array();
	foreach ( $matches[1] as $raw ) {
		$text = trim( html_entity_decode( $raw, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) );
		if ( '' !== $text ) {
			$texts[ $text ] = true;
		}
	}

	return array_keys( $texts );
}

/**
 * Whether a block attribute value is copy that text replacement may touch.
 *
 * @param string $key   Attribute name.
 * @param mixed  $value Attribute value.
 * @return bool
 */
function aludra_abilities_is_text_attr( $key, $value ) {
	return is_string( $value )
		&& '' !== trim( $value )
		&& ! in_array( $key, ALUDRA_ABILITIES_STRUCTURAL_ATTRS, true );
}

/**
 * Walk a parsed block tree, applying text, link and attribute replacements.
 *
 * @param array<int,array>     $blocks Parsed blocks.
 * @param array<string,string> $texts  Text find => replace.
 * @param array<string,string> $links  URL find => replace (already sanitized).
 * @return array<int,array>
 */
function aludra_abilities_rewrite_blocks( array $blocks, array $texts, array $links ) {
	foreach ( $blocks as &$block ) {
		if ( ! empty( $block['attrs'] ) ) {
			foreach ( $block['attrs'] as $key => $value ) {
				if ( aludra_abilities_is_text_attr( $key, $value ) && array_key_exists( trim( $value ), $texts ) ) {
					$block['attrs'][ $key ] = $texts[ trim( $value ) ];
				} elseif ( in_array( $key, array( 'url', 'href' ), true ) && is_string( $value ) && array_key_exists( $value, $links ) ) {
					$block['attrs'][ $key ] = $links[ $value ];
				}
			}
		}

		foreach ( $block['innerContent'] as $i => $chunk ) {
			if ( is_string( $chunk ) ) {
				$block['innerContent'][ $i ] = aludra_abilities_rewrite_html( $chunk, $texts, $links );
			}
		}
		$block['innerHTML'] = aludra_abilities_rewrite_html( $block['innerHTML'], $texts, $links );

		if ( ! empty( $block['innerBlocks'] ) ) {
			$block['innerBlocks'] = aludra_abilities_rewrite_blocks( $block['innerBlocks'], $texts, $links );
		}
	}
	unset( $block );

	return $blocks;
}

/**
 * Apply text and href replacements to one HTML chunk.
 *
 * @param string               $html  Markup chunk.
 * @param array<string,string> $texts Text find => replace.
 * @param array<string,string> $links URL find => replace.
 * @return string
 */
function aludra_abilities_rewrite_html( $html, array $texts, array $links ) {
	$html = aludra_abilities_replace_html_text( $html, $texts );

	if ( empty( $links ) || false === strpos( $html, 'href' ) ) {
		return $html;
	}

	$processor = new WP_HTML_Tag_Processor( $html );
	while ( $processor->next_tag( 'a' ) ) {
		$href = $processor->get_attribute( 'href' );
		if ( is_string( $href ) && array_key_exists( $href, $links ) ) {
			$processor->set_attribute( 'href', $links[ $href ] );
		}
	}

	return $processor->get_updated_html();
}

/**
 * Style variation names a block accepts: those declared in its block.json
 * (`styles`, kept on the block type) plus those registered with
 * register_block_style() (kept in the styles registry).
 *
 * @param string $block_name Block name.
 * @return string[]
 */
function aludra_abilities_block_styles( $block_name ) {
	$names = array_keys( WP_Block_Styles_Registry::get_instance()->get_registered_styles_for_block( $block_name ) );
	$type  = WP_Block_Type_Registry::get_instance()->get_registered( $block_name );

	if ( $type && ! empty( $type->styles ) ) {
		foreach ( $type->styles as $style ) {
			if ( ! empty( $style['name'] ) ) {
				$names[] = $style['name'];
			}
		}
	}

	return array_values( array_unique( $names ) );
}

/**
 * Swap the is-style-* variation on a section's top-level block.
 *
 * @param array  $block Parsed top-level block.
 * @param string $style Style variation name, e.g. "night", or "default" to remove it.
 * @return array|WP_Error
 */
function aludra_abilities_apply_style( array $block, $style ) {
	$registered = aludra_abilities_block_styles( (string) $block['blockName'] );

	if ( 'default' !== $style && ! in_array( $style, $registered, true ) ) {
		return new WP_Error(
			'aludra_unknown_style',
			sprintf(
				/* translators: 1: style name, 2: block name, 3: comma-separated style names. */
				__( 'Style "%1$s" is not registered for %2$s. Available: %3$s.', 'aludra' ),
				$style,
				$block['blockName'],
				implode( ', ', array_merge( array( 'default' ), array_diff( $registered, array( 'default' ) ) ) )
			)
		);
	}

	return aludra_abilities_swap_class( $block, 'is-style-', 'default' === $style ? '' : 'is-style-' . $style );
}

/**
 * Set a section's colour scheme (is-aludra-scheme-*).
 *
 * @param array  $block  Parsed top-level block.
 * @param string $scheme tint, invert or brand; page removes the scheme.
 * @return array|WP_Error
 */
function aludra_abilities_apply_scheme( array $block, $scheme ) {
	if ( ! in_array( $block['blockName'], ALUDRA_ABILITIES_SCHEME_BLOCKS, true ) ) {
		return new WP_Error(
			'aludra_no_scheme',
			/* translators: %s: block name. */
			sprintf( __( '%s does not take a section colour scheme.', 'aludra' ), $block['blockName'] )
		);
	}

	return aludra_abilities_swap_class( $block, 'is-aludra-scheme-', 'page' === $scheme ? '' : 'is-aludra-scheme-' . $scheme );
}

/**
 * Replace every class with a prefix on a block, in its className attribute and
 * on its wrapper element alike, so the markup keeps matching save().
 *
 * @param array  $block  Parsed block.
 * @param string $prefix Class prefix to clear, e.g. is-style-.
 * @param string $add_class Class to add, or '' to only clear.
 * @return array
 */
function aludra_abilities_swap_class( array $block, $prefix, $add_class ) {
	$pattern = '/^' . preg_quote( $prefix, '/' ) . '/';
	$classes = preg_split( '/\s+/', (string) ( $block['attrs']['className'] ?? '' ), -1, PREG_SPLIT_NO_EMPTY );
	$old     = array_values( preg_grep( $pattern, $classes ) );
	$classes = array_values( preg_grep( $pattern, $classes, PREG_GREP_INVERT ) );

	if ( $add_class ) {
		$classes[] = $add_class;
	}

	if ( $classes ) {
		$block['attrs']['className'] = implode( ' ', $classes );
	} else {
		unset( $block['attrs']['className'] );
	}

	// The wrapper element carries the same classes; keep it in step with the attribute.
	foreach ( $block['innerContent'] as $i => $chunk ) {
		if ( is_string( $chunk ) ) {
			$processor = new WP_HTML_Tag_Processor( $chunk );
			if ( $processor->next_tag() ) {
				foreach ( $old as $class ) {
					$processor->remove_class( $class );
				}
				if ( $add_class ) {
					$processor->add_class( $add_class );
				}
				$block['innerContent'][ $i ] = $processor->get_updated_html();
			}
			break;
		}
	}

	return $block;
}

/**
 * Collect block names in a parsed tree that are not registered on this site.
 *
 * A pattern can reference a block the site has disabled (Settings → Aludra) or
 * a plugin it lacks; such a block would land as an invalid placeholder.
 *
 * @param array<int,array> $blocks Parsed blocks.
 * @return string[]
 */
function aludra_abilities_unregistered_blocks( array $blocks ) {
	$registry = WP_Block_Type_Registry::get_instance();
	$missing  = array();

	foreach ( $blocks as $block ) {
		if ( $block['blockName'] && ! $registry->is_registered( $block['blockName'] ) ) {
			$missing[] = $block['blockName'];
		}
		if ( ! empty( $block['innerBlocks'] ) ) {
			$missing = array_merge( $missing, aludra_abilities_unregistered_blocks( $block['innerBlocks'] ) );
		}
	}

	return array_values( array_unique( $missing ) );
}

/**
 * The kind of an Aludra pattern, from its slug: page, section, carousel,
 * header, footer or mega-menu.
 *
 * @param string $slug Pattern slug, e.g. aludra/section-hero-split.
 * @return string
 */
function aludra_abilities_pattern_kind( $slug ) {
	$name = substr( $slug, strlen( 'aludra/' ) );
	foreach ( array( 'mega-menu', 'section', 'page', 'carousel', 'header', 'footer' ) as $kind ) {
		if ( 0 === strpos( $name, $kind . '-' ) ) {
			return $kind;
		}
	}
	return 'other';
}

/**
 * Registered Aludra patterns, keyed by slug.
 *
 * @return array<string,array>
 */
function aludra_abilities_patterns() {
	$patterns = array();
	foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $pattern ) {
		if ( 0 === strpos( $pattern['name'], 'aludra/' ) ) {
			$patterns[ $pattern['name'] ] = $pattern;
		}
	}
	return $patterns;
}

/**
 * Extract the replaceable copy of a pattern: HTML text segments plus text
 * attributes in block comments, deduplicated, in document order.
 *
 * @param string $content Pattern markup.
 * @return string[]
 */
function aludra_abilities_pattern_texts( $content ) {
	$texts = aludra_abilities_extract_html_texts( $content );

	$walk = static function ( array $blocks ) use ( &$walk, &$texts ) {
		foreach ( $blocks as $block ) {
			foreach ( (array) $block['attrs'] as $key => $value ) {
				if ( aludra_abilities_is_text_attr( $key, $value ) && ! in_array( trim( $value ), $texts, true ) ) {
					$texts[] = trim( $value );
				}
			}
			if ( ! empty( $block['innerBlocks'] ) ) {
				$walk( $block['innerBlocks'] );
			}
		}
	};
	$walk( parse_blocks( $content ) );

	return $texts;
}

/**
 * Distinct link targets in a pattern.
 *
 * @param string $content Pattern markup.
 * @return string[]
 */
function aludra_abilities_pattern_links( $content ) {
	$links     = array();
	$processor = new WP_HTML_Tag_Processor( $content );
	while ( $processor->next_tag( 'a' ) ) {
		$href = $processor->get_attribute( 'href' );
		if ( is_string( $href ) && '' !== $href ) {
			$links[ $href ] = true;
		}
	}
	return array_keys( $links );
}

/**
 * Turn a list of {find, replace} pairs into a find => replace map.
 *
 * @param mixed    $pairs    Input list.
 * @param callable $sanitize Applied to each replacement.
 * @return array<string,string>
 */
function aludra_abilities_pairs_to_map( $pairs, callable $sanitize ) {
	$map = array();
	foreach ( (array) $pairs as $pair ) {
		if ( isset( $pair['find'], $pair['replace'] ) && '' !== trim( (string) $pair['find'] ) ) {
			$map[ trim( (string) $pair['find'] ) ] = $sanitize( (string) $pair['replace'] );
		}
	}
	return $map;
}

/**
 * Assemble one section's markup from a pattern and its replacements.
 *
 * @param array $section Section input: pattern, texts, links, style.
 * @param array $patterns Registered Aludra patterns.
 * @return array{markup:string,unmatched:string[]}|WP_Error
 */
function aludra_abilities_build_section( array $section, array $patterns ) {
	$slug = (string) ( $section['pattern'] ?? '' );

	if ( ! isset( $patterns[ $slug ] ) ) {
		/* translators: %s: pattern slug. */
		return new WP_Error( 'aludra_unknown_pattern', sprintf( __( 'Unknown pattern "%s". Call aludra/list-patterns for valid slugs.', 'aludra' ), $slug ) );
	}

	if ( ! in_array( aludra_abilities_pattern_kind( $slug ), ALUDRA_ABILITIES_PAGE_KINDS, true ) ) {
		/* translators: %s: pattern slug. */
		return new WP_Error( 'aludra_wrong_kind', sprintf( __( 'Pattern "%s" belongs in a template part, not in page content.', 'aludra' ), $slug ) );
	}

	$content = $patterns[ $slug ]['content'];
	$blocks  = parse_blocks( $content );

	$missing = aludra_abilities_unregistered_blocks( $blocks );
	if ( $missing ) {
		return new WP_Error(
			'aludra_unregistered_blocks',
			/* translators: 1: pattern slug, 2: comma-separated block names. */
			sprintf( __( 'Pattern "%1$s" uses blocks this site has not registered: %2$s.', 'aludra' ), $slug, implode( ', ', $missing ) )
		);
	}

	$texts = aludra_abilities_pairs_to_map( $section['texts'] ?? array(), 'sanitize_text_field' );
	$links = aludra_abilities_pairs_to_map( $section['links'] ?? array(), 'esc_url_raw' );

	// Report finds that match nothing, so an agent learns its replacement was lost.
	$known     = array_merge( aludra_abilities_pattern_texts( $content ), aludra_abilities_pattern_links( $content ) );
	$unmatched = array_values( array_diff( array_merge( array_keys( $texts ), array_keys( $links ) ), $known ) );

	$blocks = aludra_abilities_rewrite_blocks( $blocks, $texts, $links );

	if ( ! empty( $section['style'] ) || ! empty( $section['scheme'] ) ) {
		$top = null;
		foreach ( $blocks as $i => $block ) {
			if ( $block['blockName'] ) {
				$top = $i;
				break;
			}
		}
		if ( null !== $top ) {
			if ( ! empty( $section['style'] ) ) {
				$blocks[ $top ] = aludra_abilities_apply_style( $blocks[ $top ], sanitize_key( $section['style'] ) );
				if ( is_wp_error( $blocks[ $top ] ) ) {
					return $blocks[ $top ];
				}
			}
			if ( ! empty( $section['scheme'] ) ) {
				$blocks[ $top ] = aludra_abilities_apply_scheme( $blocks[ $top ], $section['scheme'] );
				if ( is_wp_error( $blocks[ $top ] ) ) {
					return $blocks[ $top ];
				}
			}
		}
	}

	return array(
		'markup'    => trim( serialize_blocks( $blocks ) ),
		'unmatched' => $unmatched,
	);
}

/**
 * Execute aludra/compose-page.
 *
 * @param array $input Ability input.
 * @return array|WP_Error
 */
function aludra_abilities_compose_page( $input ) {
	$patterns = aludra_abilities_patterns();
	$parts    = array();
	$warnings = array();

	foreach ( $input['sections'] as $index => $section ) {
		$built = aludra_abilities_build_section( $section, $patterns );
		if ( is_wp_error( $built ) ) {
			$built->add_data( array( 'section' => $index ) );
			return $built;
		}
		$parts[] = $built['markup'];
		foreach ( $built['unmatched'] as $find ) {
			/* translators: 1: section index, 2: find string. */
			$warnings[] = sprintf( __( 'Section %1$d: "%2$s" matched nothing in the pattern; call aludra/get-pattern for its exact texts and links.', 'aludra' ), $index, $find );
		}
	}

	$postarr = array(
		'post_type'    => 'page',
		'post_content' => implode( "\n\n", $parts ),
		'post_status'  => $input['status'] ?? 'draft',
	);

	if ( isset( $input['title'] ) ) {
		$postarr['post_title'] = sanitize_text_field( $input['title'] );
	}
	if ( ! empty( $input['page_id'] ) ) {
		$postarr['ID'] = (int) $input['page_id'];
	}

	// wp_insert_post() expects slashed data, as from a form submission.
	$page_id = empty( $postarr['ID'] )
		? wp_insert_post( wp_slash( $postarr ), true )
		: wp_update_post( wp_slash( $postarr ), true );

	if ( is_wp_error( $page_id ) ) {
		return $page_id;
	}

	return array(
		'page_id'  => (int) $page_id,
		'status'   => get_post_status( $page_id ),
		'edit_url' => (string) get_edit_post_link( $page_id, 'raw' ),
		'link'     => (string) get_permalink( $page_id ),
		'warnings' => $warnings,
	);
}

/**
 * Permission check for aludra/compose-page.
 *
 * @param array $input Ability input.
 * @return bool
 */
function aludra_abilities_can_compose( $input ) {
	if ( ! empty( $input['page_id'] ) ) {
		$page = get_post( (int) $input['page_id'] );
		if ( ! $page || 'page' !== $page->post_type || ! current_user_can( 'edit_post', $page->ID ) ) {
			return false;
		}
	} elseif ( ! current_user_can( 'edit_pages' ) ) {
		return false;
	}

	if ( in_array( $input['status'] ?? 'draft', array( 'publish', 'future', 'private' ), true ) && ! current_user_can( 'publish_pages' ) ) {
		return false;
	}

	return true;
}

/**
 * Execute aludra/check-page: structural checks that need no editor.
 *
 * @param array $input Ability input.
 * @return array|WP_Error
 */
function aludra_abilities_check_page( $input ) {
	$page = get_post( (int) $input['page_id'] );
	if ( ! $page ) {
		return new WP_Error( 'aludra_no_page', __( 'Page not found.', 'aludra' ) );
	}

	$registry = WP_Block_Type_Registry::get_instance();
	$issues   = array();
	$count    = 0;

	$walk = static function ( array $blocks, array $ancestors ) use ( &$walk, &$issues, &$count, $registry ) {
		foreach ( $blocks as $block ) {
			$name = $block['blockName'];

			if ( null === $name ) {
				if ( '' !== trim( $block['innerHTML'] ) ) {
					$issues[] = array(
						'block'   => '',
						'problem' => __( 'Markup outside any block (classic content). Wrap it in a block.', 'aludra' ),
					);
				}
				continue;
			}

			++$count;
			$type = $registry->get_registered( $name );

			if ( ! $type ) {
				$issues[] = array(
					'block'   => $name,
					'problem' => __( 'Block type is not registered on this site.', 'aludra' ),
				);
			} else {
				$parent = end( $ancestors );
				if ( ! empty( $type->parent ) && ! in_array( $parent, $type->parent, true ) ) {
					$issues[] = array(
						'block'   => $name,
						/* translators: %s: comma-separated block names. */
						'problem' => sprintf( __( 'Must be a direct child of: %s.', 'aludra' ), implode( ', ', $type->parent ) ),
					);
				}
				if ( ! empty( $type->ancestor ) && ! array_intersect( $type->ancestor, $ancestors ) ) {
					$issues[] = array(
						'block'   => $name,
						/* translators: %s: comma-separated block names. */
						'problem' => sprintf( __( 'Must be inside one of: %s.', 'aludra' ), implode( ', ', $type->ancestor ) ),
					);
				}
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$walk( $block['innerBlocks'], array_merge( $ancestors, array( $name ) ) );
			}
		}
	};
	$walk( parse_blocks( $page->post_content ), array() );

	return array(
		'page_id' => (int) $page->ID,
		'blocks'  => $count,
		'ok'      => empty( $issues ),
		'issues'  => $issues,
		'note'    => __( 'Structural check only. Whether each block matches its save() output can only be checked in the block editor.', 'aludra' ),
	);
}

/**
 * Register the Aludra ability category.
 */
add_action(
	'wp_abilities_api_categories_init',
	static function () {
		wp_register_ability_category(
			'aludra',
			array(
				'label'       => __( 'Aludra', 'aludra' ),
				'description' => __( 'Build pages from Aludra patterns and blocks.', 'aludra' ),
			)
		);
	}
);

/**
 * Register the Aludra abilities.
 */
add_action(
	'wp_abilities_api_init',
	static function () {
		/**
		 * Filters whether Aludra registers its page-building abilities.
		 *
		 * @param bool $enabled Default true.
		 */
		if ( ! apply_filters( 'aludra_abilities_enabled', true ) ) {
			return;
		}

		$can_edit = static function () {
			return current_user_can( 'edit_posts' );
		};

		$readonly = array(
			'public'      => true,
			'annotations' => array(
				'readonly'   => true,
				'idempotent' => true,
			),
		);

		$pair_list = array(
			'type'  => 'array',
			'items' => array(
				'type'                 => 'object',
				'properties'           => array(
					'find'    => array( 'type' => 'string' ),
					'replace' => array( 'type' => 'string' ),
				),
				'required'             => array( 'find', 'replace' ),
				'additionalProperties' => false,
			),
		);

		wp_register_ability(
			'aludra/list-patterns',
			array(
				'label'               => __( 'List Aludra patterns', 'aludra' ),
				'description'         => __( 'Lists Aludra block patterns: slug, title, kind (page, section, carousel, header, footer, mega-menu), categories and description. Pages are built from section patterns with aludra/compose-page; a page pattern is a complete, ready layout. Header, footer and mega-menu patterns belong in template parts and cannot be composed into a page.', 'aludra' ),
				'category'            => 'aludra',
				'input_schema'        => array(
					'type'                 => 'object',
					'default'              => array(),
					'properties'           => array(
						'kind' => array(
							'type' => 'string',
							'enum' => array( 'page', 'section', 'carousel', 'header', 'footer', 'mega-menu' ),
						),
					),
					'additionalProperties' => false,
				),
				'output_schema'       => array(
					'type'  => 'array',
					'items' => array(
						'type'       => 'object',
						'properties' => array(
							'slug'        => array( 'type' => 'string' ),
							'title'       => array( 'type' => 'string' ),
							'kind'        => array( 'type' => 'string' ),
							'categories'  => array(
								'type'  => 'array',
								'items' => array( 'type' => 'string' ),
							),
							'description' => array( 'type' => 'string' ),
						),
					),
				),
				'execute_callback'    => static function ( $input = array() ) {
					$out = array();
					foreach ( aludra_abilities_patterns() as $slug => $pattern ) {
						$kind = aludra_abilities_pattern_kind( $slug );
						if ( ! empty( $input['kind'] ) && $input['kind'] !== $kind ) {
							continue;
						}
						$out[] = array(
							'slug'        => $slug,
							'title'       => (string) $pattern['title'],
							'kind'        => $kind,
							'categories'  => array_values( (array) ( $pattern['categories'] ?? array() ) ),
							'description' => (string) ( $pattern['description'] ?? '' ),
						);
					}
					return $out;
				},
				'permission_callback' => $can_edit,
				'meta'                => $readonly,
			)
		);

		wp_register_ability(
			'aludra/get-pattern',
			array(
				'label'               => __( 'Get an Aludra pattern', 'aludra' ),
				'description'         => __( 'Returns one pattern: its block markup, the exact text strings that aludra/compose-page can replace ("texts") and its link targets ("links"). Use these strings verbatim as "find" values. Each text is one whole text run; a heading with inline emphasis has one text per run.', 'aludra' ),
				'category'            => 'aludra',
				'input_schema'        => array(
					'type'                 => 'object',
					'properties'           => array(
						'slug' => array( 'type' => 'string' ),
					),
					'required'             => array( 'slug' ),
					'additionalProperties' => false,
				),
				'output_schema'       => array(
					'type'       => 'object',
					'properties' => array(
						'slug'    => array( 'type' => 'string' ),
						'title'   => array( 'type' => 'string' ),
						'kind'    => array( 'type' => 'string' ),
						'content' => array( 'type' => 'string' ),
						'texts'   => array(
							'type'  => 'array',
							'items' => array( 'type' => 'string' ),
						),
						'links'   => array(
							'type'  => 'array',
							'items' => array( 'type' => 'string' ),
						),
						'styles'  => array(
							'type'  => 'array',
							'items' => array( 'type' => 'string' ),
						),
						'scheme'  => array( 'type' => 'boolean' ),
					),
				),
				'execute_callback'    => static function ( $input ) {
					$patterns = aludra_abilities_patterns();
					$slug     = (string) $input['slug'];
					if ( ! isset( $patterns[ $slug ] ) ) {
						/* translators: %s: pattern slug. */
						return new WP_Error( 'aludra_unknown_pattern', sprintf( __( 'Unknown pattern "%s".', 'aludra' ), $slug ) );
					}
					$content = $patterns[ $slug ]['content'];

					// Style variations the section's top-level block accepts.
					$styles = array();
					$scheme = false;
					foreach ( parse_blocks( $content ) as $block ) {
						if ( $block['blockName'] ) {
							$styles = aludra_abilities_block_styles( $block['blockName'] );
							$scheme = in_array( $block['blockName'], ALUDRA_ABILITIES_SCHEME_BLOCKS, true );
							break;
						}
					}

					return array(
						'slug'    => $slug,
						'title'   => (string) $patterns[ $slug ]['title'],
						'kind'    => aludra_abilities_pattern_kind( $slug ),
						'content' => $content,
						'texts'   => aludra_abilities_pattern_texts( $content ),
						'links'   => aludra_abilities_pattern_links( $content ),
						'styles'  => $styles,
						'scheme'  => $scheme,
					);
				},
				'permission_callback' => $can_edit,
				'meta'                => $readonly,
			)
		);

		wp_register_ability(
			'aludra/list-blocks',
			array(
				'label'               => __( 'List Aludra blocks', 'aludra' ),
				'description'         => __( 'Lists the Aludra block types registered on this site with their attributes (type, default, source), parent/ancestor constraints and style variations. For hand-writing markup beyond patterns; prefer aludra/compose-page, whose output is already validated.', 'aludra' ),
				'category'            => 'aludra',
				'output_schema'       => array(
					'type'  => 'array',
					'items' => array(
						'type'       => 'object',
						'properties' => array(
							'name'        => array( 'type' => 'string' ),
							'title'       => array( 'type' => 'string' ),
							'description' => array( 'type' => 'string' ),
							'parent'      => array( 'type' => array( 'array', 'null' ) ),
							'ancestor'    => array( 'type' => array( 'array', 'null' ) ),
							'attributes'  => array( 'type' => 'object' ),
							'styles'      => array( 'type' => 'array' ),
						),
					),
				),
				'execute_callback'    => static function () {
					$out = array();
					foreach ( WP_Block_Type_Registry::get_instance()->get_all_registered() as $name => $type ) {
						if ( 0 !== strpos( $name, 'aludra/' ) ) {
							continue;
						}
						$out[] = array(
							'name'        => $name,
							'title'       => (string) $type->title,
							'description' => (string) $type->description,
							'parent'      => $type->parent,
							'ancestor'    => $type->ancestor,
							'attributes'  => (object) ( $type->attributes ?? array() ),
							'styles'      => aludra_abilities_block_styles( $name ),
						);
					}
					return $out;
				},
				'permission_callback' => $can_edit,
				'meta'                => $readonly,
			)
		);

		wp_register_ability(
			'aludra/compose-page',
			array(
				'label'               => __( 'Compose a page from Aludra patterns', 'aludra' ),
				'description'         => __( 'Creates a page (or replaces the content of an existing one, when page_id is given) from an ordered list of page, section or carousel patterns. Per section, "texts" and "links" swap exact strings from aludra/get-pattern; replacements are plain text or URLs, never HTML. "style" sets the section\'s style variation (or "default" to clear it); "scheme" sets its section colour scheme: tint, invert, brand, or page to clear it (only where aludra/get-pattern reports scheme: true). New pages are drafts unless status says otherwise. Returns warnings for find strings that matched nothing.', 'aludra' ),
				'category'            => 'aludra',
				'input_schema'        => array(
					'type'                 => 'object',
					'properties'           => array(
						'title'    => array( 'type' => 'string' ),
						'page_id'  => array(
							'type'    => 'integer',
							'minimum' => 1,
						),
						'status'   => array(
							'type'    => 'string',
							'enum'    => array( 'draft', 'pending', 'private', 'publish' ),
							'default' => 'draft',
						),
						'sections' => array(
							'type'     => 'array',
							'minItems' => 1,
							'items'    => array(
								'type'                 => 'object',
								'properties'           => array(
									'pattern' => array( 'type' => 'string' ),
									'texts'   => $pair_list,
									'links'   => $pair_list,
									'style'   => array( 'type' => 'string' ),
									'scheme'  => array(
										'type' => 'string',
										'enum' => array( 'page', 'tint', 'invert', 'brand' ),
									),
								),
								'required'             => array( 'pattern' ),
								'additionalProperties' => false,
							),
						),
					),
					'required'             => array( 'sections' ),
					'additionalProperties' => false,
				),
				'output_schema'       => array(
					'type'       => 'object',
					'properties' => array(
						'page_id'  => array( 'type' => 'integer' ),
						'status'   => array( 'type' => 'string' ),
						'edit_url' => array( 'type' => 'string' ),
						'link'     => array( 'type' => 'string' ),
						'warnings' => array(
							'type'  => 'array',
							'items' => array( 'type' => 'string' ),
						),
					),
				),
				'execute_callback'    => 'aludra_abilities_compose_page',
				'permission_callback' => 'aludra_abilities_can_compose',
				'meta'                => array(
					'public'      => true,
					'annotations' => array(
						'readonly'    => false,
						'destructive' => false,
						'idempotent'  => false,
					),
				),
			)
		);

		wp_register_ability(
			'aludra/check-page',
			array(
				'label'               => __( 'Check a page\'s blocks', 'aludra' ),
				'description'         => __( 'Structural check of a page\'s blocks: every block registered on this site, child blocks inside their required parent, no markup outside blocks. It cannot tell whether a block\'s markup matches its save() output — only the block editor can — so a clean result is necessary, not sufficient.', 'aludra' ),
				'category'            => 'aludra',
				'input_schema'        => array(
					'type'                 => 'object',
					'properties'           => array(
						'page_id' => array(
							'type'    => 'integer',
							'minimum' => 1,
						),
					),
					'required'             => array( 'page_id' ),
					'additionalProperties' => false,
				),
				'output_schema'       => array(
					'type'       => 'object',
					'properties' => array(
						'page_id' => array( 'type' => 'integer' ),
						'blocks'  => array( 'type' => 'integer' ),
						'ok'      => array( 'type' => 'boolean' ),
						'issues'  => array( 'type' => 'array' ),
						'note'    => array( 'type' => 'string' ),
					),
				),
				'execute_callback'    => 'aludra_abilities_check_page',
				'permission_callback' => static function ( $input ) {
					return current_user_can( 'edit_post', (int) ( $input['page_id'] ?? 0 ) );
				},
				'meta'                => $readonly,
			)
		);
	}
);
