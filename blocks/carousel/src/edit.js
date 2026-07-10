import {
    useBlockProps,
    InnerBlocks,
    InspectorControls,
    BlockControls,
    withColors,
    __experimentalColorGradientSettingsDropdown as ColorGradientSettingsDropdown,
    __experimentalUseMultipleOriginColorsAndGradients as useMultipleOriginColorsAndGradients
} from '@wordpress/block-editor';
import { PanelBody, RangeControl, ToggleControl, SelectControl, ToolbarGroup, ToolbarButton, TextareaControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { useSelect } from '@wordpress/data';
import classnames from 'classnames';
import { compose } from '@wordpress/compose';
import { withSelect } from '@wordpress/data';

const ALLOWED_BLOCKS = ['aludra/slide'];

/**
 * Edit component for the Carousel Block
 *
 * Note: This component uses experimental WordPress features:
 * - __experimentalColorGradientSettingsDropdown
 * - __experimentalUseMultipleOriginColorsAndGradients
 * These features might change or be removed in future WordPress versions.
 */
const Edit = compose(
    withColors('arrowColor', 'arrowBackground', 'arrowHoverColor', 'arrowHoverBackground'),
    withSelect((select) => {
        const settings = select('core/block-editor').getSettings();
        return {
            colors: settings.colors || [],
        };
    })
)(function({
    attributes,
    setAttributes,
    clientId,
    arrowColor,
    setArrowColor,
    arrowBackground,
    setArrowBackground,
    arrowHoverColor,
    setArrowHoverColor,
    arrowHoverBackground,
    setArrowHoverBackground
}) {
    const {
        slidesToShow,
        slidesToScroll,
        speed,
        arrows,
        dots,
        infinite,
        autoplay,
        autoplaySpeed,
        rtl,
        responsiveWidth,
        responsiveSlides,
        responsiveSlidesToScroll,
        slides,
        slidePadding,
        adaptiveHeight,
        enableThumbnails,
        thumbnailsToShow,
        thumbnailPosition,
        thumbnailSpacing,
        centerMode,
        centerPadding,
        variableWidth,
        lazyLoad,
        arrowColor: arrowColorAttr,
        arrowBackground: arrowBackgroundAttr,
        arrowHoverColor: arrowHoverColorAttr,
        arrowHoverBackground: arrowHoverBackgroundAttr,
        arrowStyle,
        arrowBackgroundStyle,
        arrowSize,
        customArrowSvg,
    } = attributes;

    const slideCount = useSelect(
        (select) => select('core/block-editor').getBlock(clientId).innerBlocks.length
    );

    const blockProps = useBlockProps({
        className: classnames(
            `cb-shows-${slidesToShow}-slides`,
            `cb-responsive-${responsiveSlides}-slides`,
            { 'cb-padding': slidePadding },
            slideCount + 1 > slidesToShow ? 'cb-show-scrollbar' : 'cb-hide-scrollbar'
        ),
    });

    const placeholder = (
        <div className="cb-carousel-placeholder">
            {__('Click plus (+) to add slides', 'aludra')}
        </div>
    );

    const colorGradientSettings = useMultipleOriginColorsAndGradients();

    const onArrowColorChange = (color) => {
        setArrowColor(color);
        setAttributes({ arrowColor: color });
    };

    const onArrowBackgroundChange = (color) => {
        setArrowBackground(color);
        setAttributes({ arrowBackground: color });
    };

    const onArrowHoverColorChange = (color) => {
        setArrowHoverColor(color);
        setAttributes({ arrowHoverColor: color });
    };

    const onArrowHoverBackgroundChange = (color) => {
        setArrowHoverBackground(color);
        setAttributes({ arrowHoverBackground: color });
    };

    return (
        <Fragment>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton
                        icon="image-flip-horizontal"
                        label={__('Center Mode', 'aludra')}
                        isPressed={centerMode}
                        onClick={() => setAttributes({ centerMode: !centerMode })}
                    />
                    <ToolbarButton
                        icon="images-alt2"
                        label={__('Thumbnail Navigation', 'aludra')}
                        isPressed={enableThumbnails}
                        onClick={() => setAttributes({ enableThumbnails: !enableThumbnails })}
                    />
                    <ToolbarButton
                        icon="slides"
                        label={__('Variable Width', 'aludra')}
                        isPressed={variableWidth}
                        onClick={() => setAttributes({ variableWidth: !variableWidth })}
                    />
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls group="color">
                {arrows && (
                    <>
                        <ColorGradientSettingsDropdown
                            panelId={clientId}
                            settings={[
                                {
                                    label: __('Arrow Color', 'aludra'),
                                    colorValue: arrowColor?.color || arrowColorAttr,
                                    onColorChange: onArrowColorChange
                                },
                                {
                                    label: __('Arrow Background', 'aludra'),
                                    colorValue: arrowBackground?.color || arrowBackgroundAttr,
                                    onColorChange: onArrowBackgroundChange
                                },
                                {
                                    label: __('Arrow Hover Color', 'aludra'),
                                    colorValue: arrowHoverColor?.color || arrowHoverColorAttr,
                                    onColorChange: onArrowHoverColorChange
                                },
                                {
                                    label: __('Arrow Hover Background', 'aludra'),
                                    colorValue: arrowHoverBackground?.color || arrowHoverBackgroundAttr,
                                    onColorChange: onArrowHoverBackgroundChange
                                }
                            ]}
                            {...colorGradientSettings}
                        />
                    </>
                )}
            </InspectorControls>
            <InspectorControls>
                <PanelBody title={__('Layout', 'aludra')} initialOpen={true}>
                    <RangeControl
                        label={__('Slides to Show', 'aludra')}
                        value={slidesToShow}
                        onChange={(value) => setAttributes({ slidesToShow: value })}
                        min={1}
                        max={10}
                    />
                    <RangeControl
                        label={__('Slides to Scroll', 'aludra')}
                        value={slidesToScroll}
                        onChange={(value) => setAttributes({ slidesToScroll: value })}
                        min={1}
                        max={10}
                    />
                    {centerMode && (
                        <RangeControl
                            label={__('Center Padding', 'aludra')}
                            help={__('Amount of adjacent slides visible', 'aludra')}
                            value={parseInt(centerPadding)}
                            onChange={(value) => setAttributes({ centerPadding: `${value}px` })}
                            min={0}
                            max={200}
                            step={10}
                        />
                    )}
                    {enableThumbnails && (
                        <>
                            <RangeControl
                                label={__('Thumbnails to Show', 'aludra')}
                                value={thumbnailsToShow}
                                onChange={(value) => setAttributes({ thumbnailsToShow: value })}
                                min={2}
                                max={10}
                            />
                            <SelectControl
                                label={__('Thumbnail Position', 'aludra')}
                                value={thumbnailPosition}
                                options={[
                                    { label: __('Below', 'aludra'), value: 'below' },
                                    { label: __('Above', 'aludra'), value: 'above' },
                                    { label: __('Left', 'aludra'), value: 'left' },
                                    { label: __('Right', 'aludra'), value: 'right' }
                                ]}
                                onChange={(value) => setAttributes({ thumbnailPosition: value })}
                            />
                            <RangeControl
                                label={__('Thumbnail Spacing', 'aludra')}
                                value={parseInt(thumbnailSpacing)}
                                onChange={(value) => setAttributes({ thumbnailSpacing: `${value}px` })}
                                min={0}
                                max={100}
                                step={5}
                            />
                        </>
                    )}
                </PanelBody>
                <PanelBody title={__('Behavior', 'aludra')} initialOpen={false}>
                    <ToggleControl
                        label={__('Autoplay', 'aludra')}
                        checked={autoplay}
                        onChange={(value) => setAttributes({ autoplay: value })}
                    />
                    {autoplay && (
                        <RangeControl
                            label={__('Autoplay Speed (ms)', 'aludra')}
                            value={autoplaySpeed}
                            onChange={(value) => setAttributes({ autoplaySpeed: value })}
                            min={1000}
                            max={10000}
                            step={500}
                        />
                    )}
                    <ToggleControl
                        label={__('Infinite Loop', 'aludra')}
                        checked={infinite}
                        onChange={(value) => setAttributes({ infinite: value })}
                    />
                    <RangeControl
                        label={__('Animation Speed (ms)', 'aludra')}
                        value={speed}
                        onChange={(value) => setAttributes({ speed: value })}
                        min={100}
                        max={3000}
                        step={100}
                    />
                    <SelectControl
                        label={__('Lazy Loading', 'aludra')}
                        help={__('Improves performance for image-heavy carousels', 'aludra')}
                        value={lazyLoad}
                        options={[
                            { label: __('Disabled', 'aludra'), value: 'off' },
                            { label: __('On Demand', 'aludra'), value: 'ondemand' },
                            { label: __('Progressive', 'aludra'), value: 'progressive' }
                        ]}
                        onChange={(value) => setAttributes({ lazyLoad: value })}
                    />
                    <ToggleControl
                        label={__('Adaptive Height', 'aludra')}
                        help={__('Auto-adjust height to match active slide', 'aludra')}
                        checked={adaptiveHeight}
                        onChange={(value) => setAttributes({ adaptiveHeight: value })}
                    />
                </PanelBody>
                <PanelBody title={__('Navigation', 'aludra')} initialOpen={false}>
                    <ToggleControl
                        label={__('Show Arrows', 'aludra')}
                        checked={arrows}
                        onChange={(value) => setAttributes({ arrows: value })}
                    />
                    <ToggleControl
                        label={__('Show Dots', 'aludra')}
                        checked={dots}
                        onChange={(value) => setAttributes({ dots: value })}
                    />
                    {dots && (
                        <RangeControl
                            label={__('Dots Top Spacing', 'aludra')}
                            value={parseInt(attributes.dotsBottomSpacing)}
                            onChange={(value) => setAttributes({ dotsBottomSpacing: `${value}px` })}
                            min={0}
                            max={100}
                            step={1}
                        />
                    )}
                </PanelBody>
                {arrows && (
                    <PanelBody title={__('Arrow Style', 'aludra')} initialOpen={false}>
                        <SelectControl
                            label={__('Arrow Icon', 'aludra')}
                            value={arrowStyle}
                            options={[
                                { label: __('Arrow (Default)', 'aludra'), value: 'arrow' },
                                { label: __('Chevron', 'aludra'), value: 'chevron' },
                                { label: __('Caret (Triangle)', 'aludra'), value: 'caret' },
                                { label: __('Custom SVG', 'aludra'), value: 'custom' }
                            ]}
                            onChange={(value) => setAttributes({ arrowStyle: value })}
                            help={__('Choose the arrow icon style - all icons are SVG-based for sharp, scalable rendering', 'aludra')}
                        />
                        {arrowStyle === 'custom' && (
                            <TextareaControl
                                label={__('Custom SVG Code', 'aludra')}
                                value={customArrowSvg}
                                onChange={(value) => setAttributes({ customArrowSvg: value })}
                                help={__('Paste SVG code for custom arrow icon', 'aludra')}
                                rows={4}
                            />
                        )}
                        <SelectControl
                            label={__('Arrow Background Shape', 'aludra')}
                            value={arrowBackgroundStyle}
                            options={[
                                { label: __('Circle', 'aludra'), value: 'circle' },
                                { label: __('Rounded Square', 'aludra'), value: 'rounded' },
                                { label: __('Square', 'aludra'), value: 'square' },
                                { label: __('None', 'aludra'), value: 'none' }
                            ]}
                            onChange={(value) => setAttributes({ arrowBackgroundStyle: value })}
                            help={__('Choose the arrow background shape', 'aludra')}
                        />
                        <RangeControl
                            label={__('Arrow Size (px)', 'aludra')}
                            value={arrowSize}
                            onChange={(value) => setAttributes({ arrowSize: value })}
                            min={20}
                            max={80}
                            step={2}
                        />
                    </PanelBody>
                )}
                <PanelBody title={__('Responsive', 'aludra')} initialOpen={false}>
                    <RangeControl
                        label={__('Mobile Breakpoint (px)', 'aludra')}
                        value={responsiveWidth}
                        onChange={(value) => setAttributes({ responsiveWidth: value })}
                        min={320}
                        max={1200}
                        step={1}
                    />
                    <RangeControl
                        label={__('Mobile: Slides to Show', 'aludra')}
                        value={responsiveSlides}
                        onChange={(value) => setAttributes({ responsiveSlides: value })}
                        min={1}
                        max={5}
                    />
                    <RangeControl
                        label={__('Mobile: Slides to Scroll', 'aludra')}
                        value={responsiveSlidesToScroll}
                        onChange={(value) => setAttributes({ responsiveSlidesToScroll: value })}
                        min={1}
                        max={5}
                    />
                </PanelBody>
                <PanelBody title={__('Advanced', 'aludra')} initialOpen={false}>
                    <RangeControl
                        label={__('Total Slides', 'aludra')}
                        help={__('Number of slide blocks to generate', 'aludra')}
                        value={slides}
                        onChange={(value) => setAttributes({ slides: value })}
                        min={1}
                        max={20}
                    />
                    <ToggleControl
                        label={__('Slide Padding', 'aludra')}
                        help={__('Add padding around slides', 'aludra')}
                        checked={slidePadding}
                        onChange={(value) => setAttributes({ slidePadding: value })}
                    />
                    <ToggleControl
                        label={__('RTL Mode', 'aludra')}
                        help={__('Right-to-left language support', 'aludra')}
                        checked={rtl}
                        onChange={(value) => setAttributes({ rtl: value })}
                    />
                </PanelBody>
            </InspectorControls>
            <div {...blockProps}>
                <InnerBlocks
                    orientation="horizontal"
                    allowedBlocks={ALLOWED_BLOCKS}
                    templateLock={false}
                    renderAppender={InnerBlocks.ButtonBlockAppender}
                    placeholder={placeholder}
                />
            </div>
        </Fragment>
    );
});

export default Edit;
