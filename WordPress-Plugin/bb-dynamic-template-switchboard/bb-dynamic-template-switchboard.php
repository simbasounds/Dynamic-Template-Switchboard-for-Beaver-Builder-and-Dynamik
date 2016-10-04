<?php
/**
 * Plugin Name: Beaver Builder Dynamic Template Switchboard
 * Plugin URI: https://www.wpbeaverbuilder.com/custom-module-documentation/
 * Description: Custom Beaver Builder module used for inserting WordPress template (eg. single.php, archive.php) dynamic content into Beaver Builder layout templates.
 * Version: 1.0
 * Author: Simon Barnett
 * Author URI: http://www.simonbarnett.co.za
 */
define( 'FLDTS_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'FLDTS_MODULES_URL', plugins_url( '/', __FILE__ ) );

function load_fldts_modules() {
	if ( class_exists( 'FLBuilder' ) ) {
		require_once 'modules/dynamic-template-switchboard.php';
	}
}
add_action( 'init', 'load_fldts_modules' );