/**
 * Admin Settings Page JavaScript
 *
 * Handles bulk actions and parent-child block dependencies.
 *
 * @package Aludra
 */

(function ($) {
	'use strict';

	$(document).ready(function () {
		// Tag child-block rows so CSS can indent them; the Settings API
		// renders data-parent on the <input>, not the <tr>.
		$('.aludra-block-checkbox[data-parent]').each(function () {
			$(this).closest('tr').addClass('aludra-child-row');
		});

		// Handle Enable All button.
		$('#aludra-enable-all').on('click', function (e) {
			e.preventDefault();
			$('.aludra-block-checkbox').prop('checked', true);
			handleDependencies();
		});

		// Handle Disable All button.
		$('#aludra-disable-all').on('click', function (e) {
			e.preventDefault();
			$('.aludra-block-checkbox').prop('checked', false);
			handleDependencies();
		});

		// Handle parent-child dependencies.
		function handleDependencies() {
			// Carousel -> Slide dependency.
			const carouselCheckbox = $('#aludra_carousel');
			const slideCheckbox = $('#aludra_slide');

			if (carouselCheckbox.length && slideCheckbox.length) {
				if (!carouselCheckbox.prop('checked')) {
					slideCheckbox.prop('checked', false).prop('disabled', true);
				} else {
					slideCheckbox.prop('disabled', false);
				}
			}

			// FAQ Tabs -> FAQ Tab Answer dependency.
			const faqTabsCheckbox = $('#aludra_faq-tabs');
			const faqTabAnswerCheckbox = $('#aludra_faq-tab-answer');

			if (faqTabsCheckbox.length && faqTabAnswerCheckbox.length) {
				if (!faqTabsCheckbox.prop('checked')) {
					faqTabAnswerCheckbox.prop('checked', false).prop('disabled', true);
				} else {
					faqTabAnswerCheckbox.prop('disabled', false);
				}
			}
		}

		// Run on page load.
		handleDependencies();

		// Run when checkboxes change.
		$('.aludra-block-checkbox').on('change', function () {
			handleDependencies();
		});

		// Warn before disabling parent blocks with dependent children.
		$('#aludra_carousel, #aludra_faq-tabs').on('change', function () {
			const isChecked = $(this).prop('checked');
			const blockId = $(this).attr('id');
			let dependentBlockName = '';

			if (blockId === 'aludra_carousel') {
				dependentBlockName = 'Slide';
			} else if (blockId === 'aludra_faq-tabs') {
				dependentBlockName = 'FAQ Tab Answer';
			}

			if (!isChecked && dependentBlockName) {
				const message =
					'Disabling this block will also disable the ' +
					dependentBlockName +
					' block. Continue?';

				if (!confirm(message)) {
					$(this).prop('checked', true);
					handleDependencies();
				}
			}
		});
	});
})(jQuery);
