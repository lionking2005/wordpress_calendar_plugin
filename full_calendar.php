<?php
/**
* Plugin Name: Full calendar event
* Description: Manage the jQuery calendar event
* Version: 1.0
* Auther: Bruno
**/

 if ( !defined( 'ABSPATH' ) ) exit;

 if ( !class_exists('Full_Calendar_Plugin') ) :

 	class Full_Calendar_Plugin {
 		public static $_instance;

 		/*
 		** The function to get the class instance.
 		*/
 		public static function get_instance() {
 			if ( is_null( self::$_instance) ) {
 				self::$_instance = new self();
 			}
 			return self::$_instance;
 		}

 		/*
 		** Initializing function to init the plugin while activate
 		*/
 		public function init_plugin() {
 			add_shortcode( 'full_calender_event', array( $this, "add_full_calender_event" ) ) ;
 			$this->load_init_script();
 		}

 		public function load_init_script() {
 			if ( !wp_script_is( 'theme-chooser', 'enqueued' ) ) {
                wp_enqueue_script( 'theme-chooser', plugin_dir_url( __FILE__) . 'assets/js/theme-chooser.js' );
            }
            if ( !wp_script_is( 'core-js', 'enqueued' ) ) {
            	wp_enqueue_script( 'core-js', plugin_dir_url( __FILE__) . 'assets/js/core/main.js');
            }
            if ( !wp_script_is( 'daygrid-js', 'enqueued' ) ) {
            	wp_enqueue_script( 'daygrid-js', plugin_dir_url( __FILE__) . 'assets/js/daygrid/main.js');
            }
            if ( !wp_script_is( 'interaction-js', 'enqueued' ) ) {
            	wp_enqueue_script( 'interaction-js', plugin_dir_url( __FILE__) . 'assets/js/interaction/main.js');
            }
            if ( !wp_script_is( 'list-js', 'enqueued' ) ) {
            	wp_enqueue_script( 'list-js', plugin_dir_url( __FILE__) . 'assets/js/list/main.js');
            }
            if ( !wp_script_is( 'timegrid-js', 'enqueued' ) ) {
            	wp_enqueue_script( 'timegrid-js', plugin_dir_url( __FILE__) . 'assets/js/timegrid/main.js');
            }
            if ( !wp_style_is( 'core-css', 'enqueued' ) ) {
            	wp_enqueue_style( 'core-css', plugin_dir_url( __FILE__) . 'assets/css/core/main.css');
            }
            if ( !wp_style_is( 'daygrid-css', 'enqueued' ) ) {
            	wp_enqueue_style( 'daygrid-css', plugin_dir_url( __FILE__) . 'assets/css/daygrid/main.css');
            }
            if ( !wp_style_is( 'list-css', 'enqueued' ) ) {
            	wp_enqueue_style( 'list-css', plugin_dir_url( __FILE__) . 'assets/css/list/main.css');
            }
            if ( !wp_style_is( 'timegrid-css', 'enqueued' ) ) {
            	wp_enqueue_style( 'timegrid-css', plugin_dir_url( __FILE__) . 'assets/css/timegrid/main.css');
            }

            if ( !wp_script_is( 'calendar-js', 'enqueued' ) ) {
            	wp_enqueue_script( 'calendar-js', plugin_dir_url( __FILE__) . 'assets/js/calendar.js');
            }            
 		}

 		public function add_full_calender_event(){
 			return "<div id='calendar'></div>";
 		}

 	}

 	Full_Calendar_Plugin::get_instance()->init_plugin();
 endif;