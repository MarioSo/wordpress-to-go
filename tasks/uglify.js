/**
 * grunt-contrib-uglify - https://github.com/gruntjs/grunt-contrib-uglify
 * Minify files with UglifyJS.
 */
module.exports = {
	target_scripts: {
		options: {
			screwIE8: true,
			banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
				'<%= grunt.template.today("yyyy-mm-dd") %> ' +
				'- high five! - <%= pkg.author %> */'
		},
		files: [{
			expand: true,
			cwd: '<%= pkg.path.static %>js',
			src: '*.js',
			dest: '<%= pkg.path.static %>js'
		}]
	}
};
