module.exports = {
	mbiFrame: {
		filter: 'isFile',
		expand: true,
		cwd: 'bower_components/mbiFrame/build/assets',
		src: ['**/*.*'],
		dest: 'content/themes/mbi-theme/assets'
	},
	mbiLib: {
		filter: 'isFile',
		expand: true,
		cwd: 'bower_components/mbiLib/build',
		src: ['**/*.*'],
		dest: 'content/themes/mbi-theme'
	}
};