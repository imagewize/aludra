/**
 * WordPress Interactivity API for Mega Menu Block
 * Phase 2C: Enhanced with layout-specific logic
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/interactivity-api/
 */
import {
	store,
	getContext,
	getElement,
	withScope,
} from '@wordpress/interactivity';

const { state, actions } = store( 'aludra/mega-menu', {
	state: {
		get isMenuOpen() {
			const context = getContext();
			return context.isOpen || false;
		},

		get isMobile() {
			return window.innerWidth < 768;
		},
	},

	actions: {
		toggleMenu() {
			const context = getContext();
			if ( context.isOpen ) {
				actions.closeMenu();
			} else {
				actions.openMenu();
			}
		},

		toggleMenuOnClick() {
			const context = getContext();
			const { ref } = getElement();

			if ( context.menuOpenedBy.click || context.menuOpenedBy.focus ) {
				actions.closeMenu();
			} else {
				context.previousFocus = ref;
				actions.openMenu( 'click' );
			}
		},

		closeMenuOnClick() {
			actions.closeMenu( 'click' );
			actions.closeMenu( 'focus' );
		},

		handleMenuKeydown( event ) {
			const context = getContext();

			// ESC key closes menu
			if ( event?.key === 'Escape' && context.isOpen ) {
				actions.closeMenu();
				event.preventDefault();
			}

			// Tab key focus trap (for overlay mode)
			if ( event?.key === 'Tab' && context.isOpen ) {
				const { layoutMode } = context;

				// Only trap focus in overlay mode
				if ( layoutMode === 'overlay' ) {
					const { firstFocusable, lastFocusable } = context;

					if (
						event.shiftKey &&
						// eslint-disable-next-line @wordpress/no-global-active-element
						document.activeElement === firstFocusable
					) {
						event.preventDefault();
						lastFocusable?.focus();
					} else if (
						! event.shiftKey &&
						// eslint-disable-next-line @wordpress/no-global-active-element
						document.activeElement === lastFocusable
					) {
						event.preventDefault();
						firstFocusable?.focus();
					}
				}
			}

			// Legacy support
			if ( context.menuOpenedBy?.click ) {
				if ( event?.key === 'Escape' ) {
					actions.closeMenuOnClick();
				}
			}
		},

		handleOutsideClick( event ) {
			const context = getContext();

			if ( ! context.isOpen ) {
				return;
			}

			const { ref } = getElement();
			const isClickInside = ref.contains( event.target );
			if ( ! isClickInside ) {
				actions.closeMenu();
			}

			// Legacy support
			const megaMenu = context?.megaMenu;
			if ( megaMenu && ! megaMenu.contains( event.target ) ) {
				actions.closeMenuOnClick();
			}
		},

		openMenu( menuOpenedOn = 'click' ) {
			const context = getContext();
			const { ref } = getElement();
			const { layoutMode } = context;

			// Layout-specific open logic
			if ( layoutMode === 'overlay' ) {
				// Lock body scroll
				document.body.classList.add( 'mega-menu-overlay-open' );
			}

			// Position full-width panels before opening
			actions.positionFullWidthPanel();
			actions.fitPanelToViewport();

			// Set open state
			context.isOpen = true;

			// Track how menu was opened (for legacy support)
			if ( menuOpenedOn && context.menuOpenedBy ) {
				context.menuOpenedBy[ menuOpenedOn ] = true;
			}

			// Apply animation speed CSS variable
			if ( context.animationSpeed ) {
				ref.style.setProperty(
					'--mm-animation-speed',
					`${ context.animationSpeed }ms`
				);
			}

			// Set focus trap
			actions.setFocusTrap();
		},

		closeMenu( menuClosedOn = 'click' ) {
			const context = getContext();
			const { layoutMode } = context;

			// Set closed state
			context.isOpen = false;

			// Track close event (for legacy support)
			if ( menuClosedOn && context.menuOpenedBy ) {
				context.menuOpenedBy[ menuClosedOn ] = false;
			}

			// Layout-specific close logic
			if ( layoutMode === 'overlay' ) {
				document.body.classList.remove( 'mega-menu-overlay-open' );
			}

			// Return focus to trigger
			actions.returnFocus();
		},

		setFocusTrap() {
			const { ref } = getElement();
			const panel = ref.querySelector(
				'.wp-block-aludra-mega-menu__panel'
			);

			if ( ! panel ) {
				return;
			}

			const context = getContext();
			const focusableElements = panel.querySelectorAll(
				'a[href], button, input, textarea, select, [tabindex]:not([tabindex="-1"])'
			);

			context.firstFocusable = focusableElements[ 0 ];
			context.lastFocusable =
				focusableElements[ focusableElements.length - 1 ];

			// Focus first element after a short delay
			setTimeout(
				withScope( () => {
					const ctx = getContext();
					ctx.firstFocusable?.focus();
				} ),
				100
			);
		},

		returnFocus() {
			const { ref } = getElement();
			const trigger = ref.querySelector(
				'.wp-block-aludra-mega-menu__trigger'
			);
			trigger?.focus();
		},

		updateMobileState() {
			const context = getContext();
			const breakpoint = context.mobileBreakpoint || 768;
			context.isMobile = window.innerWidth < breakpoint;
		},

		positionFullWidthPanel() {
			const { ref } = getElement();
			const panel = ref.querySelector(
				'.wp-block-aludra-mega-menu__panel.mm-full-width'
			);

			if ( ! panel ) {
				return;
			}

			// Get the navigation container's position
			const nav = ref.closest( '.wp-block-navigation' );
			if ( ! nav ) {
				return;
			}

			const navRect = nav.getBoundingClientRect();

			// Get dropdown spacing from CSS variable
			const computedStyle = window.getComputedStyle( ref );
			const dropdownSpacing =
				parseInt(
					computedStyle.getPropertyValue( '--mm-dropdown-spacing' )
				) || 16;

			// Calculate position to align panel with navigation container
			const topPosition = navRect.bottom + dropdownSpacing; // Position below nav with spacing
			const leftPosition = navRect.left;

			// Apply positioning
			panel.style.top = `${ topPosition }px`;
			panel.style.left = `${ leftPosition }px`;
			panel.style.transform = 'none';
			panel.style.width = `${ navRect.width }px`;
		},

		/**
		 * Keep a dropdown panel inside the viewport.
		 *
		 * Above the mobile breakpoint a panel hangs below its trigger with no
		 * height limit, so a tall template part ran past the bottom of a tablet
		 * or short laptop screen — and a fixed (full-width) panel does not move
		 * with the page, so that part could not be reached at all. Cap it at
		 * the space below its top and let it scroll. Horizontally, an aligned
		 * panel wider than the room beside its trigger ran off a screen edge;
		 * shift it back with `translate`, which composes with the alignment
		 * classes' `transform` instead of overriding it.
		 *
		 * Skipped where CSS already makes the panel full-screen (overlay
		 * layout, below 768px, inside core's open navigation overlay).
		 * Measuring works before `is-open` lands: the closed panel is hidden
		 * with opacity/visibility, so it is still laid out.
		 */
		fitPanelToViewport() {
			// Called from toggleMenu, getElement() is the trigger button, not
			// the block wrapper, so resolve the wrapper before looking down.
			const { ref: element } = getElement();
			const ref =
				element.closest( '.wp-block-aludra-mega-menu' ) || element;
			const panel = ref.querySelector(
				'.wp-block-aludra-mega-menu__panel'
			);

			if ( ! panel ) {
				return;
			}

			const context = getContext();
			panel.style.maxHeight = '';
			panel.style.overflowY = '';
			panel.style.overscrollBehavior = '';
			panel.style.boxSizing = '';
			panel.style.translate = '';

			if (
				context.layoutMode === 'overlay' ||
				window.matchMedia( '(max-width: 768px)' ).matches ||
				ref.closest(
					'.wp-block-navigation__responsive-container.is-menu-open'
				)
			) {
				return;
			}

			const margin = 16;
			const minHeight = 200;
			const viewportWidth = document.documentElement.clientWidth;
			const viewportHeight = window.innerHeight;
			const rect = panel.getBoundingClientRect();

			const available = viewportHeight - rect.top - margin;
			if ( rect.height > available ) {
				panel.style.maxHeight = `${ Math.max( available, minHeight ) }px`;
				panel.style.overflowY = 'auto';
				panel.style.overscrollBehavior = 'contain';
				// The cap is the panel's outer height, padding included.
				panel.style.boxSizing = 'border-box';
			}

			// A full-width panel already spans the viewport; nothing to shift.
			if ( panel.classList.contains( 'mm-full-width' ) ) {
				return;
			}

			let shift = 0;
			if ( rect.right > viewportWidth - margin ) {
				shift = viewportWidth - margin - rect.right;
			}
			if ( rect.left + shift < margin ) {
				shift = margin - rect.left;
			}
			if ( shift !== 0 ) {
				panel.style.translate = `${ Math.round( shift ) }px 0`;
			}
		},
	},

	callbacks: {
		initMenu() {
			const context = getContext();
			const { ref } = getElement();

			// Set the menu reference when initialized
			if ( state.isMenuOpen ) {
				context.megaMenu = ref;
			}

			// Update mobile state on initialization
			actions.updateMobileState();

			// Position full-width panels
			actions.positionFullWidthPanel();

			// Add resize listener for mobile detection and full-width positioning
			if ( ! context.resizeListenerAdded ) {
				window.addEventListener(
					'resize',
					withScope( () => {
						actions.updateMobileState();
						actions.positionFullWidthPanel();
						if ( getContext().isOpen ) {
							actions.fitPanelToViewport();
						}
					} )
				);
				context.resizeListenerAdded = true;
			}
		},
	},
} );
