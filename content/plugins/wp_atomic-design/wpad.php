<?php
/*
	* Plugin Name:       WP Atomic Design
	* Plugin URI:        http://github.com/soon
	* Description:       soon
	* Version:           0.0.1
	* Author:            Mario Sommer
	* Author URI:        http://mariosommer.at
	* Text Domain:       wpad
	* License:           GPL-2.0+
	* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	*/

/**
	* Make sure that the plugin file can't be accessed
	* within the web browser directly.
	*/
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/wpad_Manager.class.php';
// require_once plugin_dir_path( __FILE__ ) . '/twig/lib/Twig/Autoloader.php';
require_once plugin_dir_path( __FILE__ ) . 'mustache/src/Mustache/Autoloader.php';



function setup() {

	// Twig_Autoloader::register();
	Mustache_Autoloader::register();

	$adm = WPAD_Manager::get_instance();
	$adm->run();

}

setup();
