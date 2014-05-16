/**
 * mbiKnappmap module
 *
 * @version 0.2.0
 */
define(['jquery', 'vendor_debounce', 'vendor_panzoom'], function($) {
	'use strict';

	var module = {

		namespace: '.panzoom', // @todo set namespace

		$map: $('.map'),
		$constrain: $('.constrain'),
		$waypoint: $('.waypoint'),

		// @todo: onInit fadeIn after placement is correct (do not move to location)

		init: function() {

			// --------------------------------------------------------
			// Init PanZoom
			// --------------------------------------------------------

			module.$map.panzoom({

				transition: true,
				duration: 500,
	  			easing: 'ease-in-out',
				cursor: 'move',
				contain: 'invert',
				minScale: 0.1,
	  			maxScale: 1,
	  			disableZoom: false,

	  			onStart: function() {

	  				$(this).removeClass('map--transition');

	  			},
	  			onEnd: function() {

	  				$(this).removeClass('map--transition');

	  			}

			});

			// --------------------------------------------------------
			// Enable click on waypoints
			// --------------------------------------------------------

			module.$map.on('mousedown touchstart', '.waypoint', function(e) {

				e.stopImmediatePropagation();

			});

			// --------------------------------------------------------
			// Waypoint click handler
			// --------------------------------------------------------

			$('.waypoint').on('click', function(e) {

				e.preventDefault();

				module.gotoMarker($(this), e);

			});

			// --------------------------------------------------------
			// Waypoint Menu item click handler
			// --------------------------------------------------------

			$('.js_goto-waypoint').on('click', function(e) {

				e.preventDefault();

				var target = '.waypoint--'+$(this).attr('data-waypoint');
				module.gotoMarker($(target), e);

				$('.site').toggleClass('is--navigation-open');

			});

			// --------------------------------------------------------
			// Zoom Out click handler
			// --------------------------------------------------------

			$('.js_zoom').on('click', function(e) {

				module.fitIntoView();

			});

			// --------------------------------------------------------
			// On Document Ready
			// --------------------------------------------------------

			module.$waypoint.first().addClass('waypoint--active');
			module.fitIntoView(false);

			// --------------------------------------------------------

		},
		gotoMarker: function($waypoint, e) {

			$('.waypoint--active').removeClass('waypoint--active');

			var data = module.getMarker($waypoint);

			module.$map.addClass('map--transition').panzoom('option', {
				disablePan: false,
				disableZoom: false,
				contain: 'invert'
			}).panzoom('zoom', 1, { focal: e }).panzoom('pan', data.x, data.y);

			$waypoint.addClass('waypoint--active');

			module.$map.panzoom('option', {
				disableZoom: true
			});

		},
		getMarker: function($waypoint) {

			var data = new Object();

			data.left = parseInt($waypoint.css('left'));
			data.top = parseInt($waypoint.css('top'));

			data.width = module.$constrain.width();
			data.height = module.$constrain.height();

			data.offset = $waypoint.outerWidth(true)*0.5;

			data.x = -data.left + data.width*0.5 - data.offset;
			data.y = -data.top + data.height*0.5 - data.offset;

			return data;

		},
		centerActiveMarker: function() {

			var $active = $('.waypoint--active');

			var data = module.getMarker($active);

			module.$map.addClass('map--transition').panzoom('option', {
				disablePan: false,
				contain: 'invert'
			}).panzoom('resetDimensions').panzoom('pan', data.x, data.y).panzoom('option', {
				disableZoom: true
			});

		},
		centerMap: function() {

			module.$map.panzoom('option', {
				disableZoom: false,
				disablePan: false,
				contain: false
			});

			var data = new Object();

			data.left = module.$map.innerWidth()*0.5;
			data.top = module.$map.innerHeight()*0.5;

			data.width = module.$constrain.width();
			data.height = module.$constrain.height();

			data.x = -data.left + data.width*0.5;
			data.y = -data.top + data.height*0.5;

			module.$map.addClass('map--transition').panzoom('pan', data.x, data.y).panzoom('option', {
				disablePan: true,
				disableZoom: true
			});

		},
		zoomOutAndCenter: function(transition, level) {

			if(level === undefined) {

				level = 0.5;

			}

			module.$map.panzoom('option', {
				disableZoom: false
			});

			if(transition === true) {

				module.$map.addClass('map--transition');

			}

			module.$map.panzoom('zoom', level);

			module.centerMap();

		},
		fitIntoView: function(transition) {

			if(transition === undefined) {

				transition = true;

			}

			var matrix = module.$map.panzoom('getMatrix');
			var data = new Object();

			data.zoom = parseFloat(module.getZoomLevel());

			data.originalWidth = module.$map.innerWidth();
			data.originalHeight = module.$map.innerHeight();

			data.transformedWidth = data.originalWidth * data.zoom;
			data.transformedHeight = data.originalHeight * data.zoom;

			data.posX = parseInt(matrix[4]);
			data.posY = parseInt(matrix[5]);

			data.viewportWidth = module.$constrain.width();
			data.viewportHeight = module.$constrain.height();

			data.mapRatio = data.originalWidth/data.originalHeight;
			data.viewportRatio = data.viewportWidth/data.viewportHeight;

			data.orientation = data.mapRatio < data.viewportRatio ? 'landscape' : 'portrait';

			if(data.orientation == 'landscape') {

				if(data.transformedHeight > data.viewportHeight || data.transformedHeight < data.originalHeight) {

					data.newZoom = data.viewportHeight / data.originalHeight;

				}

			} else {

				if(data.transformedWidth > data.viewportWidth || data.transformedWidth < data.originalWidth) {

					data.newZoom = data.viewportWidth / data.originalWidth;

				}

			}

			module.zoomOutAndCenter(transition, data.newZoom);

		},
		getZoomLevel: function() {

			var matrix = module.$map.panzoom('getMatrix');
			var zoom = matrix[0];

			return zoom;

		},
		zoomHandler: function() {

			var zoom = module.getZoomLevel();

			if(zoom == 1) {
				module.centerActiveMarker();
			} else {
				module.fitIntoView();
			}

		}

	};

	// -----------------------------------------------------------------

	module.init();

	$(window).resize($.debounce(250, function() {

		module.zoomHandler();

	}));

	// -----------------------------------------------------------------

	return module;

});