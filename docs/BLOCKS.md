# Block Details

Full feature notes for every block in Aludra. For the short one-line summary of each
block, see the "Included Blocks" list in [README.md](../README.md).

### Mega Menu Block

Advanced navigation block with template part integration for creating dynamic mega menus.

**Features:**
- WordPress Interactivity API integration
- Template part support
- Responsive design
- Keyboard navigation support

### Carousel Block

Create responsive image/content carousels using Slick Carousel.

**Features:**
- Slick Carousel integration
- Thumbnail navigation (above/below/left/right)
- Center mode with configurable peek
- Variable width slides
- Lazy loading options
- Adaptive height support
- Arrow customization (SVG styles, backgrounds, sizes, custom SVG)
- Block patterns for common use cases
- Responsive breakpoints
- Touch/swipe support

### Contact Section Block

Dark contact section with info column and Contact Form 7 form card.

**Features:**
- Full-width dark background section
- Info column for contact details
- Contact Form 7 integration
- Responsive design

### Slide Block

Companion block for the Carousel block.

**Features:**
- InnerBlocks support for flexible content
- Works seamlessly with Carousel parent block

### FAQ Tabs Block

Interactive FAQ block with vertical tab navigation and dynamic content display.

**Features:**
- Vertical tab navigation with questions
- Dynamic content area showing answers
- Customizable button with configurable text and URL
- WordPress Interactivity API integration
- Editable questions, titles, and descriptions via block inspector
- Responsive design with flexible layout

### Search Overlay Trigger Block

A clickable search icon that opens a full-screen search overlay with smooth animations.

**Features:**
- Full-screen search overlay with backdrop blur
- Smooth fade-in/scale animations
- Auto-focus on search input when opened
- Multiple close methods (X button, backdrop click, Escape key)
- Body scroll lock when overlay active
- Responsive design optimized for mobile
- Vanilla JavaScript (no dependencies)
- ARIA labels and keyboard accessibility

### FAQ Tab Answer Block

Child block for individual FAQ answers, used inside the FAQ Tabs block.

**Features:**
- InnerBlocks support for rich answer content
- Editable question (tab label) and answer title
- Parent constraint (only valid inside the FAQ Tabs block)

### Feature Cards Block

Responsive grid of feature highlight cards with SVG icons and a section header.

**Features:**
- Auto-fit card grid with hover effects
- Icons resolved via the reusable `aludra/icon` binding
- Theme colour presets with sensible fallbacks (renders correctly on any theme)

### Icon Grid Block

Auto-fit grid of icon + text items with an eyebrow, title, and lead.

**Features:**
- Responsive auto-fit grid layout
- Icons resolved via the `aludra/icon` binding
- Theme colour presets with fallbacks

### Trust Bar Block

Inline bar of trust-signal items (icon + text) that wraps on mobile.

**Features:**
- Flex row of icon + label items
- Icons resolved via the `aludra/icon` binding
- Theme colour presets with fallbacks

### Pricing Tiers Block

Three-column pricing comparison table with featured tier highlighting.

**Features:**
- Built entirely from InnerBlocks — every price, feature line, and button is directly editable
- Featured (middle) tier visually raised with its own accent border
- Responsive: columns stack on mobile

### Testimonial Grid Block

Grid of customer testimonials with metrics.

**Features:**
- Automatically becomes a Slick Carousel on larger sets (4+ cards on desktop, 2+ on mobile); renders as a static grid otherwise
- Shares the Carousel block's vendored Slick Carousel assets — no duplicate library loaded when both blocks are used
- Arrow and dot styling configurable via the block inspector (colour, hover states, spacing)

### CTA Columns Block

Dual call-to-action cards with headings, descriptions, and buttons.

**Features:**
- Color variant control via the block inspector
- Built from InnerBlocks for full content flexibility

### Feature List Grid Block

Two-column grid of features with checkmarks and hover effects.

**Features:**
- Responsive two-column layout that stacks on mobile
- Hover effects on each feature item

### Hero Split Block

Split-pane hero with heading, lead text, and a button on one side, and a desktop/mobile image pair on the other.

**Features:**
- Desktop/mobile image swap handled by a pure CSS media-query toggle between two independently editable `core/image` blocks — no JS
- CTA button with a directional arrow and hover lift
- Theme colour presets with sensible fallbacks

### About Section Block

Full-width about/value-proposition section with heading, lead text, an offer list, and closing copy.

**Features:**
- Built from InnerBlocks for full content flexibility
- Theme colour presets with sensible fallbacks

### Services Block

Section header with a two-per-row grid of icon, heading, and text service cards.

**Features:**
- Icons resolved via the reusable `aludra/icon` binding
- Responsive grid that stacks on mobile
- Theme colour presets with sensible fallbacks

### Review Profiles Block

Full-width client review section with a heading and a row of round avatar photos with quotes.

**Features:**
- Three-up grid of avatar photo + quote
- Avatars ship as empty `core/image` placeholders ready for real client photos
- Theme colour presets with sensible fallbacks

### CTA Banner Block

Full-width call-to-action band with heading, lead text, and button.

**Features:**
- Native `theme.json` colour palette support with preset-fallback chain
- Built from InnerBlocks for full content flexibility

### Hero Banner Block

Dark full-width hero with an eyebrow badge, heading, lead text, and dual CTA buttons.

**Features:**
- Full-width dark background hero section
- Eyebrow badge for category/tag
- Heading and lead text content
- Dual CTA buttons
- Responsive design

### Service Intro Block

Introductory text section for service pages, with constrained-width editable paragraphs.

**Features:**
- Built from InnerBlocks for full content flexibility
- Theme colour presets with sensible fallbacks

### Service Detail Cards Block

Stacked, numbered service cards, each with a heading, description, and checklist.

**Features:**
- Built from InnerBlocks for full content flexibility — heading, description, and checklist per card
- Theme colour presets with sensible fallbacks
