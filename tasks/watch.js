module.exports = {
 options: {
		livereload: true,
		spawn: true,
		debounceDelay: 250
 },
 scripts: {
		files: ['<%= pkg.path.static %>js/**/*.js'],
		tasks: ['requirejs']
		// tasks: ['requirejs:head', 'requirejs:main']
 },
 sass: {
    options: {
      livereload: false
    },
		files: ['<%= pkg.path.assets %>styles/**/*.scss'],
		tasks: ['sass:dev' , 'autoprefixer']
 },
 css: {
		files: ['<%= pkg.path.static %>css/main.css'],
		tasks: []
 },
 html: {
		files: ['<%= pkg.path.theme %>**/*.php'],
		tasks: []
 }
};