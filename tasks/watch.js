/**
 * grunt-contrib-watch - https://github.com/gruntjs/grunt-contrib-watch
 * Run tasks whenever watched files change.
 */
module.exports = {
 options: {
		livereload: true,
		spawn: true,
		debounceDelay: 250
 },
 scripts: {
		files: ['<%= pkg.path.assets %>js/**/*.js'],
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
