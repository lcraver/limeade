module.exports = function(grunt) {

	"use strict";
	
	// project config
	grunt.initConfig({ 
			
	/*
		* Build App
	*/
	build: {

		less: {
			development: {
				options: {
					yuicompress: false,
					report: 'false'
				},
				files: {
					"src/lib/css/styles.css" : "src/lib/less/*.less"
				}
			},
			production: {
				options: {
					yuicompress: true,
					report: 'gzip'
				},
				files: {
					"dist/lib/css/styles.min.css" : "dist/lib/css/styles.css"
				}
			}
		},

		uglify: { 
			my_target: {
				files: {
					'dist/lib/js/post.min.js': [ // minify the following file(s) into post.min.js
						'src/lib/js/post.js'
						],
					'dist/lib/js/pre.min.js': [ // minify the following file(s) into pre.min.js
						'src/lib/js/pre.js'
						]	
				}
			}
		},

		watch: {
			files: ['src/lib/**'],
			tasks: ['less','uglify'],
		}

	},



	/*
		* App Themes
	*/

	theme_default: {

		//define default theme directory
		var dir_default = ['src/app/themes/default/**'];

		less: {

		},

		csslint: {

		},

		//watch default theme production files for changes
		watch: {
			files: dir_default,
			tasks: ['less'],
		}

	}, 

	theme_dark: {

		//define dark theme directory
		var  dir_dark = ['src/app/themes/dark/**'];

		less: {

		},

		csslint: {

		},

		//watch dark theme production files for changes
		watch: {
			files: dir_dark,
			tasks: ['less'],
		}

	},

	theme_light: {

		//define light theme directory
		var dir_light = ['src/app/themes/light/**'];

		less: {

		},

		csslint: {

		},

		//watch light theme production files for changes
		watch: {
			files: dir_light,
			tasks: ['less'],
		}

	}
	
	});
	
	// load node_module
	grunt.loadNpmTasks('grunt-contrib-watch');	
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-coffee');
	grunt.loadNpmTasks('grunt-contrib-csslint');
	grunt.loadNpmTasks('grunt-contrib-htmlmin');
	grunt.loadNpmTasks('grunt-contrib-uglify'); 
		
	// register default task 
	grunt.registerTask('default',['build']);	

	// register theme tasks
	grunt.registerTask('theme-default-dev',['theme-default']);		
	grunt.registerTask('theme-dark-dev',['theme-dark']);		
	grunt.registerTask('theme-light-dev',['theme-light']);	

}
