/**
 * mbiH2Nav module
 *
 * @version 0.2.0
 */
define([
	'jquery',
	'modules/mbihelper',
	'vendor/modernizr'
], function(
	$,
	_
) {
	'use strict';

	var module = {

		init: function() {

			$('.site__navigation').on('click', '.js_open-menu', function() {

				var nav = $(this).attr('data-menu');

				if($('.site').hasClass('is-menu-open')) { // if open

					if($('.site').hasClass('is-menu-open--'+nav)) {

						$('.site').removeClass('is-menu-open').removeClass('is-menu-open--'+nav);

					} else {

						$('.site').attr('class', 'site is-menu-open is-menu-open--'+nav);

					}

				} else { // if closed

					$('.site').addClass('is-menu-open').addClass('is-menu-open--'+nav);

				}

			});

			// reset scroll to 0 after closing menu

			$('.navigation__container').on(_.transitionend(), function(e) {

				e.stopPropagation();

				if(e.originalEvent.propertyName == 'visibility') {

				$('.navigation__container').scrollTop(0);

				}

			});

			// ---

			if(Modernizr.touch || $('html').hasClass('ios')) {

				$('.buttons').on('click', '.button', function(e) {

					if(!$(this).hasClass('hover')) {

						$('.buttons .button').removeClass('hover');
						$(this).addClass('hover');

					}

				});

			} else {

				$('.buttons').on('mouseenter', '.button', function(e) {

					$(this).addClass('hover');

				});
				$('.buttons').on('mouseleave', '.button', function(e) {

					$(this).removeClass('hover');

				});

			}

		}

	};

	// -----------------------------------------------------------------

	module.init();

	// -----------------------------------------------------------------

	return module;

});