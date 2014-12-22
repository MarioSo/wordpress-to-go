/**
 * grunt-contrib-requirejs
 * https://github.com/gruntjs/grunt-contrib-requirejs
 */
module.exports = {
	compile: {
		options: {
			mainConfigFile: "<%= pkg.path.assets %>config/require-build.js",
			// done: function(done, output) {
			// 	var duplicates = require('rjs-build-analysis').duplicates(output);

			// 	if (duplicates.length > 0) {
			// 		grunt.log.subhead('Duplicates found in requirejs build:');
			// 		grunt.log.warn(duplicates);
			// 		return done(new Error('r.js built duplicate modules, please check the excludes option.'));
			// 	}

			// 	done();
			// }
		}
	}
};