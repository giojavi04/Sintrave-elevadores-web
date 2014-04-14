var path = require('path');
var stylesDir = 'static/css/';
var jsDir = 'static/js/';

module.exports = function(grunt){
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		stylus : {
			compile: {
				options: {
					compress: false,
					paths: [stylesDir],
					'include css': true
				},
				files: {
					'static/css/main.css': stylesDir + 'main.styl'
				}
			}
		},

		cssmin:{
			add_banner:{
				options: {
					banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
        					'<%= grunt.template.today("yyyy-mm-dd") %> - ' +
        					'Copyright 2014, Sintrave Elevadores */'
				},
				files: {
					'static/css/main.min.css': stylesDir + 'main.css'
				}
			}
		},

		uglify:{
			options: {
				 banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
        				'<%= grunt.template.today("yyyy-mm-dd") %> - ' +
        				'Copyright 2014, Sintrave Elevadores */'
			},
			minifyjs: {
				files:{
					'static/js/main.min.js': jsDir + 'main.js'
				}
			}
		},

		watch:{
			stylesheets: {
				files: [stylesDir + '/**/*.styl', stylesDir + '/**/*.css'],
				tasks: ['stylus', 'cssmin', 'uglify'],
				options: {
					interrupt: true
				}
			}
		}
	});

	//cargar plugins
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-stylus');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('compile', ['stylus', 'cssmin', 'uglify']);
	grunt.registerTask('default', ['compile', 'watch']);
}