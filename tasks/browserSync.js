module.exports = {
	dev: {
    bsFiles: {
      src : '<%= pkg.path.static %>css/**/*.css'
    },
    options: {
      watchTask: true // < VERY important
    }
  }
};