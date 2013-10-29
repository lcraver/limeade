module.exports = function(grunt) {

	"use strict";
	
	// project config
	grunt.initConfig({ 
		
	// combine Less
	less: {
		development: {
			options: {
				yuicompress: false,
				report: 'false'
			},
			files: {
				"src/css/styles.css" : "src/less/*.less"
			}
		},
		production: {
			options: {
				paths: ["assets/dist/css"],
				yuicompress: true,
				report: 'gzip'
			},
			files: {
				"dist/css/styles.min.css" : "src/css/styles.css"
			}
		}
	},
	
	// lint CSS
	/*csslint: {
		options: {
			// load lint config file
			csslintrc: '.csslintrc'
		},
		lax: {
			options: {
				import: 2
			},
			src: ['dist/css/*.css']
		}
	},*/
	
	// minify JavaScripts
	uglify: { 
		my_target: {
			files: {
				'dist/js/post.min.js': [ // minify the following file(s) into post.min.js
					'src/js/post.js'
					],
				'dist/js/pre.min.js': [ // minify the following file(s) into pre.min.js
					'src/js/pre.js'
					]	
			}
		}
	},	
	
	// watch all files for changes 
	watch: {
		files: ['src/**'],
		tasks: ['less','uglify'],
	}
	
	});
	
	// load node_module
	grunt.loadNpmTasks('grunt-contrib-watch');	
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-csslint');
	grunt.loadNpmTasks('grunt-contrib-htmlmin');
	grunt.loadNpmTasks('grunt-contrib-uglify'); 
		
	
	// create default task 
	grunt.registerTask('default',['watch']);			
}
