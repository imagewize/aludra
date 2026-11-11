<?php
/**
 * Start tab for the Aludra settings screen.
 *
 * The first thing an admin sees under Settings → Aludra: create a draft page
 * from one of the page layouts in one click, find the section patterns, and
 * see which optional features the site can use.
 *
 * There is deliberately no redirect to this screen on activation. WordPress.org
 * plugin review discourages taking over the admin after activation, so the way
 * in is a "Get started" link on the Plugins screen instead.
 *
 * @package Aludra
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Page layouts offered on the Start tab: the registered `aludra/page-*` patterns.
 *
 * Read from the pattern registry rather than from `patterns/`, so a layout
 * that another plugin or the theme unregistered is not offered here either.
 *
 * @return array[] Keyed by pattern slug: title, description, content, sections, store.
 */
function aludra_get_page_layouts() {
	$layouts = array();

	foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $pattern ) {
		if ( 0 !== strpos( $pattern['name'], 'aludra/page-' ) ) {
			continue;
		}

		$sections = 0;
		$store    = false;
		foreach ( parse_blocks( $pattern['content'] ) as $block ) {
			if ( ! empty( $block['blockName'] ) ) {
				++$sections;
			}
		}

		// A layout with WooCommerce blocks renders empty bands without it.
		if ( false !== strpos( $pattern['content'], '<!-- wp:woocommerce/' ) ) {
			$store = true;
		}

		$layouts[ $pattern['name'] ] = array(
			'title'       => $pattern['title'],
			'description' => $pattern['description'] ?? '',
			'content'     => $pattern['content'],
			'sections'    => $sections,
			'store'       => $store,
		);
	}

	return $layouts;
}

/**
 * The page template a page layout should use, or '' for the theme's default.
 *
 * Every page layout opens with its own hero, so a theme whose default page
 * template prints the post title would show that title, and its spacing, above
 * the hero. Twenty Twenty-Five does this and ships a `page-no-title` template
 * for exactly this case. A no-title template is chosen only when the default
 * template really prints a title; themes such as Aviendha, whose default page
 * template has none, keep their default.
 *
 * @return string Template slug, or '' to leave the page on the default.
 */
function aludra_get_layout_page_template() {
	if ( ! wp_is_block_theme() ) {
		return '';
	}

	$default = get_block_template( get_stylesheet() . '//page' );
	if ( ! $default || false === strpos( $default->content, '<!-- wp:post-title' ) ) {
		return '';
	}

	/**
	 * Filters the template slugs tried, in order, for pages created from a
	 * page layout. A theme whose title-less page template uses another slug
	 * can add it here.
	 *
	 * @param string[] $candidates Template slugs.
	 */
	$candidates = apply_filters(
		'aludra_layout_page_templates',
		array( 'page-no-title', 'page-without-title', 'no-title', 'page-blank', 'blank' )
	);

	$available = wp_get_theme()->get_page_templates( null, 'page' );
	foreach ( (array) $candidates as $slug ) {
		if ( isset( $available[ $slug ] ) ) {
			return $slug;
		}
	}

	return '';
}

/**
 * Create a draft page from a page layout and open it in the editor.
 *
 * Runs on admin-post.php, so it is a real POST with a nonce rather than a GET
 * link that a crawler or a prefetch could follow.
 */
function aludra_handle_create_page() {
	if ( ! current_user_can( 'edit_pages' ) ) {
		wp_die( esc_html__( 'You are not allowed to create pages.', 'aludra' ), 403 );
	}

	check_admin_referer( 'aludra_create_page' );

	$slug    = isset( $_POST['pattern'] ) ? sanitize_text_field( wp_unslash( $_POST['pattern'] ) ) : '';
	$layouts = aludra_get_page_layouts();

	if ( ! isset( $layouts[ $slug ] ) ) {
		wp_die( esc_html__( 'That page layout is not available.', 'aludra' ), 404 );
	}

	// wp_insert_post() unslashes its input, so slash it first: block attributes
	// may contain JSON escapes that would otherwise lose their backslashes.
	$page_id = wp_insert_post(
		wp_slash(
			array(
				'post_type'     => 'page',
				'post_status'   => 'draft',
				'post_title'    => $layouts[ $slug ]['title'],
				'post_content'  => $layouts[ $slug ]['content'],
				'page_template' => aludra_get_layout_page_template(),
			)
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		wp_die( esc_html( $page_id->get_error_message() ) );
	}

	wp_safe_redirect( get_edit_post_link( $page_id, 'raw' ) );
	exit;
}
add_action( 'admin_post_aludra_create_page', 'aludra_handle_create_page' );

/**
 * Add a "Get started" link to Aludra's row on the Plugins screen.
 *
 * @param string[] $links Plugin action links.
 * @return string[]
 */
function aludra_plugin_action_links( $links ) {
	array_unshift(
		$links,
		sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=aludra' ) ),
			esc_html__( 'Get started', 'aludra' )
		)
	);

	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( ALUDRA_PLUGIN_DIR . 'aludra.php' ), 'aludra_plugin_action_links' );

/**
 * Number of registered section patterns, per Aludra section category.
 *
 * @return int[] Keyed by category slug.
 */
function aludra_count_section_patterns() {
	$counts = array();

	foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $pattern ) {
		if ( 0 !== strpos( $pattern['name'], 'aludra/section-' ) ) {
			continue;
		}
		foreach ( (array) ( $pattern['categories'] ?? array() ) as $category ) {
			$counts[ $category ] = ( $counts[ $category ] ?? 0 ) + 1;
		}
	}

	return $counts;
}

/**
 * Render the Start tab.
 */
function aludra_render_start_tab() {
	$layouts     = aludra_get_page_layouts();
	$can_create  = current_user_can( 'edit_pages' );
	$woocommerce = class_exists( 'WooCommerce' );
	$section_cat = aludra_get_block_categories();
	$sections    = aludra_count_section_patterns();
	?>
	<p class="aludra-intro">
		<?php esc_html_e( 'Aludra builds pages from sections: a hero, a stat rail, pricing, an FAQ, a call to action. Start from a whole page layout and replace the copy, or add sections one at a time to any page. Your theme still sets the colours, fonts, header and footer.', 'aludra' ); ?>
	</p>

	<section class="aludra-cat">
		<div class="aludra-cat-head">
			<span class="aludra-cat-eyebrow">
				<?php echo aludra_star_svg( 'tick' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- hard-coded SVG markup. ?>
				<?php esc_html_e( 'Start a page from a layout', 'aludra' ); ?>
			</span>
			<span class="aludra-cat-rule"></span>
			<span class="aludra-cat-count">
				<?php
				/* translators: %d: number of page layouts */
				printf( esc_html( _n( '%d layout', '%d layouts', count( $layouts ), 'aludra' ) ), (int) count( $layouts ) );
				?>
			</span>
		</div>
		<div class="aludra-grid">
			<?php foreach ( $layouts as $slug => $layout ) : ?>
				<?php $blocked = $layout['store'] && ! $woocommerce; ?>
				<article class="aludra-card aludra-layout-card">
					<div class="aludra-card-heading">
						<h3 class="aludra-card-title"><?php echo esc_html( $layout['title'] ); ?></h3>
						<span class="aludra-card-slug">
							<?php
							/* translators: %d: number of sections in a page layout */
							printf( esc_html( _n( '%d section', '%d sections', $layout['sections'], 'aludra' ) ), (int) $layout['sections'] );
							?>
						</span>
					</div>
					<p class="aludra-card-desc"><?php echo esc_html( $layout['description'] ); ?></p>
					<div class="aludra-card-actions">
						<?php if ( $blocked ) : ?>
							<span class="aludra-status is-blocked"><?php esc_html_e( 'Needs WooCommerce', 'aludra' ); ?></span>
						<?php elseif ( $can_create ) : ?>
							<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
								<?php wp_nonce_field( 'aludra_create_page' ); ?>
								<input type="hidden" name="action" value="aludra_create_page" />
								<input type="hidden" name="pattern" value="<?php echo esc_attr( $slug ); ?>" />
								<button type="submit" class="button button-primary">
									<?php esc_html_e( 'Create page', 'aludra' ); ?>
									<span class="screen-reader-text">
										<?php
										/* translators: %s: page layout title */
										printf( esc_html__( 'from the %s layout', 'aludra' ), esc_html( $layout['title'] ) );
										?>
									</span>
								</button>
							</form>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="aludra-intro aludra-note">
			<?php esc_html_e( 'Each button creates a draft page and opens it in the editor; nothing is published. The same layouts are offered when you add a new page yourself.', 'aludra' ); ?>
		</p>
	</section>

	<section class="aludra-cat">
		<div class="aludra-cat-head">
			<span class="aludra-cat-eyebrow">
				<?php echo aludra_star_svg( 'tick' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- hard-coded SVG markup. ?>
				<?php esc_html_e( 'Add sections to any page', 'aludra' ); ?>
			</span>
			<span class="aludra-cat-rule"></span>
			<span class="aludra-cat-count">
				<?php
				/* translators: %d: number of section patterns */
				printf( esc_html( _n( '%d section', '%d sections', array_sum( $sections ), 'aludra' ) ), (int) array_sum( $sections ) );
				?>
			</span>
		</div>
		<p class="aludra-intro">
			<?php esc_html_e( 'In the editor, open the block inserter, switch to Patterns and pick one of the Aludra categories. Each section arrives with its copy and style in place.', 'aludra' ); ?>
		</p>
		<ul class="aludra-chips">
			<?php foreach ( $section_cat as $cat_slug => $cat_label ) : ?>
				<?php
				if ( empty( $sections[ $cat_slug ] ) ) {
					continue;
				}
				?>
				<li>
					<?php echo esc_html( $cat_label ); ?>
					<b><?php echo (int) $sections[ $cat_slug ]; ?></b>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>

	<section class="aludra-cat">
		<div class="aludra-cat-head">
			<span class="aludra-cat-eyebrow">
				<?php echo aludra_star_svg( 'tick' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- hard-coded SVG markup. ?>
				<?php esc_html_e( 'This site', 'aludra' ); ?>
			</span>
			<span class="aludra-cat-rule"></span>
		</div>
		<ul class="aludra-checks">
			<?php
			$checks = array(
				array(
					wp_is_block_theme(),
					__( 'Block theme active', 'aludra' ),
					__( 'Aludra works with any theme. With a block theme you can also edit headers, footers and mega menus in the Site Editor.', 'aludra' ),
				),
				array(
					is_wp_version_compatible( '7.0' ),
					__( 'Hide sections per device', 'aludra' ),
					__( 'Show or hide any section on mobile, tablet or desktop. Needs WordPress 7.0 or later.', 'aludra' ),
				),
				array(
					is_wp_version_compatible( '7.1' ),
					__( 'Different styles per device', 'aludra' ),
					__( 'Give a section its own spacing, colours and typography on tablet or mobile: switch the editor preview to that device. Needs WordPress 7.1 or later.', 'aludra' ),
				),
				array(
					$woocommerce,
					__( 'Store blocks', 'aludra' ),
					__( 'Free Shipping Progress and Sticky Add to Cart, plus the store homepage layout. Need WooCommerce.', 'aludra' ),
				),
			);
			foreach ( $checks as $check ) :
				list( $ok, $label, $help ) = $check;
				?>
				<li class="<?php echo esc_attr( $ok ? 'is-ready' : 'is-off' ); ?>">
					<span class="aludra-status <?php echo esc_attr( $ok ? 'is-ready' : 'is-blocked' ); ?>">
						<?php echo esc_html( $ok ? __( 'Available', 'aludra' ) : __( 'Not available', 'aludra' ) ); ?>
					</span>
					<div>
						<b><?php echo esc_html( $label ); ?></b>
						<span><?php echo esc_html( $help ); ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<p class="aludra-intro aludra-note">
			<?php
			printf( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- format is escaped; both links are built from escaped parts.
				/* translators: 1: link to the Blocks tab, 2: link to the WordPress.org reviews page */
				esc_html__( 'Turn individual blocks on or off on the %1$s tab. Enjoying Aludra? A %2$s helps other people find it.', 'aludra' ),
				'<a href="' . esc_url( admin_url( 'options-general.php?page=aludra&tab=blocks' ) ) . '">' . esc_html__( 'Blocks', 'aludra' ) . '</a>',
				'<a href="https://wordpress.org/support/plugin/aludra/reviews/#new-post" target="_blank" rel="noopener">' . esc_html__( 'review on WordPress.org', 'aludra' ) . '</a>'
			);
			?>
		</p>
	</section>
	<?php
}
