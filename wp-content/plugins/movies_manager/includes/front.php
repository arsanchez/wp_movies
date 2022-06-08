<?php 
// Admin styles
function movies_manager_enqueue_custom_style() {
    wp_register_style( 'wp_movie_manager_css', PLUGIN_URL_MOVIES . 'assets/css/front.css', false, '1.0.0' );
    wp_enqueue_style( 'wp_movie_manager_css' );
    wp_enqueue_script( 'wp_movie_manager_js', PLUGIN_URL_MOVIES . 'assets/js/front.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'movies_manager_enqueue_custom_style' );