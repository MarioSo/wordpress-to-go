module.exports = {
	prod: {
		options: {
			consolidateViaDeclarations: false,
			consolidateViaSelectors:    true,
			consolidateMediaQueries:    true
		},
		files: {
			'<%= pkg.path.theme %>style.css': '<%= pkg.path.theme %>style.css'
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
			'<%= pkg.path.theme %>style.css': '<%= pkg.path.theme %>style.css'
		}
	}
};