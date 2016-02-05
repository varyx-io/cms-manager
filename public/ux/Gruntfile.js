module.exports = function (grunt) {
	grunt.initConfig({
//		clean: {
//			//build: ["css/","js/"]
//		},
		less: {
			build: {
				files: [
					{
						//	First we build out bootstrap
						"css/app.min.css": [
							"source/less/app.less"
						]
					},
					{
						expand: true,
						cwd: 'source/less/modules',
						src: ['*.less'],
						dest: 'css/modules/',
						ext: '.min.css'
					},
				]
			}
		},

		uglify: {
			options: {
				beautify: true,
				sourceMap: true,
				sourceMapName: 'js/global.map'
			},
			build: {
				files: [
					{
						'js/app.min.js': [

							//	This will be our root JS (donoted by '_').  We include this AFTER all other vendor scripts.  These are for GLOBAL scripts and directives.
							//	main JS will contain mostly event listeners and implimentations and yes, one-offs will go here because we can, through the magic of selectors,
							//	target specific entities and still do it effieintly
							'source/js/app.js'
						]
					},

					//	Compile all plugin files.
					{
						expand: true,
						cwd: 'source/js/modules',
						src: ['**/*.js'],
						dest: 'js/modules/',
						ext: '.min.js'
					}
				]
			}
		},

		copy: {
			build: {
				expand: true,
				cwd: 'source/assets',
				// Copy all images
				src: ['**/*.jpg', '**/*.png', '**/*.gif'], //	If we want to exclude in the future.. we can do that with '!{boot,var,mix}*.less' as a second arg
				dest: 'assets/'
			}
		},
		
		watch: {
			styles: {
				files: ["source/less/**/*.less", "source/less/**/*.jpg", "source/less/**/*.gif", "source/less/**/*.png", "source/js/**/*.js"],
				tasks: [/*"clean",*/ "less", "uglify", "copy"]
			}
			,grunt: {
				files: ['Gruntfile.js','config/**/*'],
				tasks: [/*"clean",*/ "less", "uglify", "copy"]
			}
		}

	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');
	//	This is the default task!
	grunt.registerTask('default', [/*"clean",*/ 'less', 'uglify', 'copy', 'watch']);
}