module.exports = {
	mbiFrame: {
		filter: 'isFile',
		expand: true,
		cwd: 'bower_components/mbiFrame/assets',
		src: ['**/*.*'],
		dest: 'content/themes/mbi-theme/assets'
	},
	mbiLib: {
		filter: 'isFile',
		expand: true,
		cwd: 'bower_components/mbiLib/includes',
		src: ['**/*.*'],
		dest: 'content/themes/mbi-theme/includes'
	}
};