<?php
/**
* Plugin Name: WP movies manager
* Plugin URI: #
* Description: Plugin to consume the "themoviedb" API
* Version: 1.0
* Author: Argenis Sánchez
* Author URI: #
**/

// Base plugin path
define('PLUGIN_URL_MOVIES', plugin_dir_url( __FILE__ ));
define('PLUGIN_PATH_MOVIES', plugin_dir_path( __FILE__ ));

// Admin includes 
include_once(plugin_dir_path( __FILE__ ) . '/includes/admin.php');
include_once(plugin_dir_path( __FILE__ ) . '/includes/shortcodes.php');
include_once(plugin_dir_path( __FILE__ ) . '/includes/front.php');

function search_filter_query( $query, $error = true ) {
	if ( is_search() ) {
		$query->is_search = false;
        var_dump('here');exit();
	}
}

add_action( 'parse_query', 'search_filter_query' );
