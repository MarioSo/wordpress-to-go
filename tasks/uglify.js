/**
 * grunt-contrib-uglify - https://github.com/gruntjs/grunt-contrib-uglify
 * Minify files with UglifyJS.
 */
module.exports = {
	target_scripts: {
		files: [{
			expand: true,
			cwd: '<%= pkg.buildUrl %>js',
			src: '*.js',
			dest: '<%= pkg.buildUrl %>js'
		}]
	}
};
