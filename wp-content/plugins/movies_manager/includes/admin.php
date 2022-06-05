<?php
// Admin styles
function movies_manager_enqueue_custom_admin_style() {
    wp_register_style( 'wp_movie_manager_admin_css', PLUGIN_URL_MOVIES . 'assets/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'wp_movie_manager_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'movies_manager_enqueue_custom_admin_style' );

// Adding the admin settings 
function movies_manager_settings_init(){
    // Register a new setting for "wporg" page.
    register_setting( 'wpmmanager', 'wpmmanager_options' );

    add_settings_section(
        'wpmmanager_section_keys',
        __( 'API settings "The movie DB".', 'wpmmanager' ), 'wpmmanager_section_keys_callback',
        'wpmmanager'
    );

    // Register a new field in the "wporg_section_developers" section, inside the "wporg" page.
    add_settings_field(
        'wpmmanager_field_api_key', 
        __( 'API Key', 'wpmmanager' ),
        'wpmmanager_field_api_key_cb',
        'wpmmanager',
        'wpmmanager_section_keys',
        array(
            'id'         => 'wpmmanager_field_api_key',
            'class'      => 'wpmmanager_row'
        )
    );
}

add_action( 'admin_init', 'movies_manager_settings_init');

function wpmmanager_section_keys_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'wpmmanager' ); ?></p>
    <?php
}

// Field callback function
function wpmmanager_field_api_key_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'wpmmanager_options' );
    ?>
      <p class="description">
        <?php esc_html_e( 'Your API key goes here', 'wpmmanager' ); ?>
    </p>
    <input type="password"  id="<?php echo esc_attr( $args['id'] ); ?>"
            data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
            name="wpmmanager_options[<?php echo esc_attr( $args['id'] ); ?>]"
            class="<?php echo esc_attr( $args['class'] ); ?>"
            value="<?php echo $options[$args['id']];  ?>"/>
    <?php
}

add_action('admin_menu', 'wp_movies_manager_add_setup_menu');
 
function wp_movies_manager_add_setup_menu() {
    add_menu_page( 'WP Movies manager', 'Movies Manager', 'manage_options', 'movies-manager-plugin',
     'movies_manager_settings_html', PLUGIN_URL_MOVIES.'assets/img/logo.png');
}

function movies_manager_settings_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'wpmmanager_messages', 'wpmmanager_message', __( 'Settings Saved', 'wpmmanager' ), 'updated' );
    }

    settings_errors( 'wpmmanager_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'wpmmanager' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wpmmanager' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}
 