/**
 * mbiBlock module
 *
 * @version 0.2.0
 */
define([
	'jquery',
	'modules/mbiconfig',
	'vendor/modernizr'
], function(
	$,
	mbiConfig
) {
	'use strict';

	var module = {

		centerGridItem: function() {

			var h = $('.block--grid .item').height();
			$('.block--grid .item .overlay').css('height', h+'px');

		},
		fitToView: function() {

			var h = $(window).height();

			$('.block--fullscreen').css('height', h+'px');
			$('.block--fullscreen').find('.swiper-container, .swiper--wrapper').css('height', h+'px');

		},
		init: function() {

			if(Modernizr.touch || $('html').hasClass('ios')) {

				$('.block--grid').on('click', '.item', function(e) {

					if(!$(this).hasClass('hover')) {

						$('.item').removeClass('hover');
						$(this).addClass('hover');

					}

				});

			} else {

				$('.block--grid').on('mouseenter', '.item', function(e) {

					$(this).addClass('hover');

				});
				$('.block--grid').on('mouseleave', '.item', function(e) {

					$(this).removeClass('hover');

				});

			}

			// --------------------------------------------------------------

			$(window).resize(function() {

				module.centerGridItem();
				module.fitToView();

			});

			$(window).load(function() {

				module.centerGridItem();

			});

			module.fitToView();

			// --------------------------------------------------------------

		}

	};

	module.init();

	return module;

});