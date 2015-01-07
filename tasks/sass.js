/**
 * grunt-sass https://github.com/sindresorhus/grunt-sass
 * uses libsass which is faster, but missing some features.
 */

module.exports = {
	prod: {
		options: {
			outputStyle: 'compressed'
		},
		files: {
			'<%= pkg.path.static %>/css/main.css': '<%= pkg.path.assets %>styles/main.scss',
		}
	},
	dev: {
		options: {
			sourceMap: true,
			outputStyle: 'expanded'
		},
		files: {
			'<%= pkg.path.static %>/css/main.css': '<%= pkg.path.assets %>styles/main.scss',
		}
	}
};
