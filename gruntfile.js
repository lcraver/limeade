module.exports = function(grunt) {

	"use strict";

	//define varibles 
	var = ;
	
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

	},

	compliment: {

		var defaults = ['No one cares to customize me.'];

		var compliments = grunt.config('compliment') || defaults;
		var index = Math.floor(Math.random() * compliments.length);

		grunt.log.writeIn(compliments[index]);

		compliment: [
		    'You are so awesome!',
		    'You are a funny, funny kid.',
		    'Your code sucks.',
		    'Lulz cats.'
	    ]

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


	//default theme
	grunt.registerTask('theme_default', 'Watch dev files for the default theme', 
	function() {

		grunt.log.write('You are watching the default theme.').ok();

	});	

	//dark theme
	grunt.registerTask('theme_dark', 'Watch dev files for the dark theme', 
	function() {

		 if (failureOfSomeKind) {
			grunt.log.error('');
		}

			// Fail by returning false if this task had errors
			if (ifErrors) { return false; }

		grunt.log.write('You are watching the dark theme.').ok();

	});	


	//light theme
	grunt.registerTask('theme_light', 'Watch dev files for the light theme', 
	function() {

		if (failureOfSomeKind) {
			grunt.log.error('');
		}

			// Fail by returning false if this task had errors
			if (ifErrors) { return false; }

		grunt.log.write('You are watching the light theme.').ok();

	});		

}
