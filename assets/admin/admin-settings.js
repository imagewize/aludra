/**
 * Admin Settings Page JavaScript
 *
 * Handles bulk actions, the live enabled counter, card state, and
 * parent-child block dependencies.
 *
 * @package Aludra
 */

(function ($) {
	'use strict';

	$(document).ready(function () {
		const $checkboxes = $('.aludra-block-checkbox');

		// Sync a card's on/off styling to its checkbox.
		function syncCard($checkbox) {
			const $card = $checkbox.closest('.aludra-card');
			const on = $checkbox.prop('checked');
			$card.toggleClass('is-on', on).toggleClass('is-off', !on);
		}

		// Update the "N / total enabled" counter in the header.
		function updateCount() {
			const enabled = $checkboxes.filter(':checked').length;
			$('.aludra-count-num').text(enabled);
		}

		// Handle parent-child dependencies.
		function handleDependencies() {
			// Carousel -> Slide dependency.
			const carousel = $('#aludra_carousel');
			const slide = $('#aludra_slide');

			if (carousel.length && slide.length) {
				if (!carousel.prop('checked')) {
					slide.prop('checked', false).prop('disabled', true);
				} else {
					slide.prop('disabled', false);
				}
				syncCard(slide);
			}

			// FAQ Tabs -> FAQ Tab Answer dependency.
			const faqTabs = $('#aludra_faq-tabs');
			const faqAnswer = $('#aludra_faq-tab-answer');

			if (faqTabs.length && faqAnswer.length) {
				if (!faqTabs.prop('checked')) {
					faqAnswer.prop('checked', false).prop('disabled', true);
				} else {
					faqAnswer.prop('disabled', false);
				}
				syncCard(faqAnswer);
			}
		}

		// Refresh everything derived from checkbox state.
		function refresh() {
			handleDependencies();
			$checkboxes.each(function () {
				syncCard($(this));
			});
			updateCount();
		}

		// Bulk: Enable all.
		$('#aludra-enable-all').on('click', function (e) {
			e.preventDefault();
			$checkboxes.prop('checked', true);
			refresh();
		});

		// Bulk: Disable all.
		$('#aludra-disable-all').on('click', function (e) {
			e.preventDefault();
			$checkboxes.prop('checked', false);
			refresh();
		});

		// React to individual toggles.
		$checkboxes.on('change', function () {
			syncCard($(this));
			refresh();
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
				}
				refresh();
			}
		});

		// Initial sync on page load.
		refresh();
	});
})(jQuery);
