=== Menu Designer ===
Contributors:      Moiraine Theme
Tags:              block, menu, navigation, mega menu, template parts
Tested up to:      6.7
Stable tag:        0.1.3
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Advanced mega menu block for creating dynamic navigation with template parts integration.

== Description ==

Menu Designer is a powerful WordPress block that enables creation of dynamic mega menus within navigation blocks. It integrates seamlessly with WordPress template parts system to provide rich, customizable dropdown menu content.

**Key Features:**
- Direct integration with WordPress Navigation blocks
- Template part-based mega menu content
- Responsive layout controls (content, wide, full width)
- Flexible justification options (left, center, right)
- WordPress Interactivity API for modern user experience
- Accessibility-compliant with keyboard navigation and screen reader support

**Perfect for:**
- Professional websites requiring advanced navigation
- E-commerce sites with complex product categories
- Corporate sites with extensive service offerings
- Any WordPress site needing enhanced menu functionality

== Installation ==

The Menu Designer block is integrated into the Moiraine theme. No separate installation required.

**Usage Instructions:**
1. Navigate to Appearance → Site Editor
2. Edit your Header template part
3. Locate your Navigation block
4. Click "+" within the Navigation block to add a menu item
5. Search for "Menu Designer" and insert the block
6. Configure the block settings and select a template part for mega menu content

**Requirements:**
- WordPress 6.0 or higher
- Moiraine theme (or compatible block theme)
- Template parts with "Menu" area assigned

== Frequently Asked Questions ==

= How do I add a Menu Designer block to my navigation? =

Within your Navigation block, click the "+" button to add a new menu item. Search for "Menu Designer" in the block inserter and add it as a navigation menu item.

= Where do I create template parts for mega menu content? =

Go to Site Editor → Template Parts → Menu area. Create new template parts or use the pre-built ones included with the theme (menu-card-simple, menu-panel-features, etc.).

= Why doesn't my Menu Designer block show template part options? =

Ensure your template parts are assigned to the "Menu" area. The block only displays template parts specifically created for the menu area.

= Can I customize the mega menu styling? =

Yes! The block includes layout controls for width (content/wide/full) and justification (left/center/right). Additional styling can be applied through theme customization.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 0.1.3 =
* Fixed: Site Editor link in block settings now correctly navigates to Menu template parts area
* Fixed: Updated URL from incorrect path parameter to proper p=%2Fpattern&postType=wp_template_part format

= 0.1.2 =
* Fixed: WordPress Interactivity API state management updated to match Human Made Mega Menu Block implementation patterns exactly
* Fixed: Added proper context reference management with context.megaMenu DOM reference and enhanced focus restoration
* Fixed: Implemented missing initMenu callback with data-wp-watch integration for proper initialization timing
* Fixed: Outside click detection now uses proper context reference management instead of DOM queries
* Fixed: View.js script loading issue by implementing proper ES module configuration
* Fixed: Menu Designer width management - removed restrictive 300px minimum width causing narrow desktop dropdowns
* Fixed: Template part expansion within mega menus by adding CSS overrides for width constraints in menu context
* Fixed: Dynamic positioning system to prevent horizontal scroll bars when mega menus extend beyond viewport boundaries
* Enhanced: Dynamic width calculation using max-content and viewport-aware sizing for better responsive behavior
* Enhanced: Added new flexible width classes (menu-width-auto, menu-width-flexible) for different content types
* Enhanced: Mobile breakpoint handling with proper width resets while maintaining desktop functionality
* Enhanced: State management now uses menuOpenedBy getter with clean separation between state and context
* Enhanced: JavaScript architecture streamlined with simplified action methods and cleaner state updates
* Enhanced: Intelligent viewport-aware positioning system using WordPress Interactivity API that automatically calculates optimal menu positioning (left/center/right) based on button location and available space
* Enhanced: Build output optimized with clean production-ready code and responsive window resize handling
* Enhanced: Documentation completely reorganized with clear structure and comprehensive technical guide

= 0.1.1 =
* Fixed: Menu Designer block now properly integrates with WordPress Navigation blocks
* Fixed: Added required block supports for navigation integration (interactivity, renaming, reusable, __experimentalSlashInserter)
* Fixed: Corrected typography supports to match WordPress core navigation blocks
* Enhanced: Block now appears in navigation block inserter when adding menu items
* Enhanced: Simplified mega menu creation workflow within navigation blocks

= 0.1.0 =
* Initial release with mega menu functionality
* Template part integration for dynamic menu content
* Responsive layout controls and justification options
* WordPress Interactivity API integration
* Accessibility features with keyboard navigation

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above. This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation." Arbitrary sections will be shown below the built-in sections outlined above.
