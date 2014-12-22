/**
 * grunt-contrib-requirejs
 * https://github.com/gruntjs/grunt-contrib-requirejs
 */
module.exports = {
  options: {
    debug: true
    // transform: [ "browserify-shim" ]
    // transform: ['reactify'],
    // extensions: ['.jsx'],
  },
  dev: {
    options: {
     //  // alia<s: ['react:']  // Make React available externally for dev tools
    	// debug: true,
    	// transform: [ "browserify-shim" ]
    },
    src: ['<%= pkg.path.assets %>scripts/main.js'],
    dest: '<%= pkg.path.assets %>static/js/main.js'
  },
  production: {
    options: {
      debug: false
    },
    src: ['<%= pkg.path.assets %>scripts/main.js'],
    dest: '<%= pkg.path.assets %>static/js/main.js'
  }
};