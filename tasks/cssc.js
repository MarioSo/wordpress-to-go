module.exports = {
	prod: {
		options: {
			consolidateViaDeclarations: false,
			consolidateViaSelectors:    true,
			consolidateMediaQueries:    true
		},
		files: {
			'<%= pkg.path.static %>css/main.css': '<%= pkg.path.static %>css/main.css'
		}
	},
	dev: {
		options: {
			consolidateViaDeclarations: false,
			consolidateViaSelectors:    true,
			consolidateMediaQueries:    true,
			lineBreaks: false,
			compress: false
		},
		files: {
			'<%= pkg.path.static %>css/main.css': '<%= pkg.path.static %>css/main.css'
		}
	}
};