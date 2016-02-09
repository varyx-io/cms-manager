module.exports = function (grunt) {

	var globalConfig = {
		src: 'source', 
		dest: '.'
	};
	
	grunt.initConfig({
		
    globalConfig: globalConfig,
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*!\n' +
            ' * VarYX-IO Content Publishing CMP v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
            ' * Copyright 2015-<%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
            ' */\n',
    jqueryCheck: 'if (typeof jQuery === \'undefined\') { throw new Error(\'Bootstrap\\\'s JavaScript requires jQuery\') }\n\n',
		
		clean: {
			build: ["<%= globalConfig.dest %>/css/","<%= globalConfig.dest %>/js/"]
		},
		less: {
			build: {
				files: [
					{
						//	First we build out bootstrap
						"<%= globalConfig.dest %>/css/app.min.css": [
							"<%= globalConfig.src %>/less/bootstrap.less",
							"<%= globalConfig.src %>/less/library/fontawesome/font-awesome.less",

							"<%= globalConfig.src %>/less/smartadmin-production-plugins.less",
							"<%= globalConfig.src %>/less/smartadmin-production.less",
							"<%= globalConfig.src %>/less/smartadmin-skins.less"
							
						]
					}
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
				// Grunt will search for "**/*.js" under "lib/" when the "uglify" task
        // runs and build the appropriate src-dest file mappings then, so you
        // don't need to update the Gruntfile when files are added or removed.
        files: [{
            expand: true,
            src: ['**/*.js', '!**/*.min.js', '!**/*.backup.js'],
            dest: '<%= globalConfig.dest %>/js/',
            cwd: '<%= globalConfig.src %>/js/',
            extDot: 'last',
            ext: '.min.js'
            
        }]
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