'use strict';


/**
 * Use modernizr for feature detction.
 * For the build url see:
 * - assets/scripts/basejs/modules/modernizr.js
 */
require(["basejs/vendor/modernizr"]);


/**
 * Waits for DOM to be ready
 */
require(['ready'], function(domReady) {
	domReady(function () {
		require(['elements'], function(el){
			console.log(el.find('body'));
		});
	});
});
