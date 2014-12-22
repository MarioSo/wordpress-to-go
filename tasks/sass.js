module.exports = {
	prod: {
		options: {
			style: 'compressed',
			sourcemap: false,
			cacheLocation: '<%= pkg.path.assets %>styles/.sass-cache'
		},
		files: {
			'<%= pkg.path.static %>/css/main.css': '<%= pkg.path.assets %>styles/main.scss',
		}
	},
	dev:{
		options: {
			style: 'expanded',
			cacheLocation: '<%= pkg.path.assets %>styles/.sass-cache'
		},
		files: {
			'<%= pkg.path.static %>/css/main.css': '<%= pkg.path.assets %>styles/main.scss',
		}
	}
};