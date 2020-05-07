<?php
/** THEME-OPTIONS.PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: declare global options for the theme
 **/

// --------------------------------------------------------
// ---------------- Instantiate The Options Page
// --------------------------------------------------------

class Theme_Options_Page {

    /**
     * Constructor.
     */
    function __construct() {
        add_action('admin_menu',  array( $this, 'admin_menu' ));
        add_action('acf/init', array( $this, 'admin_menu' ));
        add_action( 'admin_menu', array( $this, 'add_custom_option_page' ), 100 );
    }

    /**
     * Registers a new settings page under Settings.
     */
    function admin_menu() {
        acf_add_options_page(array(
            'page_title' => __('Theme Options'),
            'menu_title' => __('Theme Options'),
            'menu_slug' => 'theme-options',
            'capability' => 'manage_options',
            'position' => '3.11',
            'icon_url' => 'dashicons-welcome-widgets-menus',
            'update_button' => __('Update Theme Options', 'acf'),
            'updated_message' => __("Theme options have been updated", 'acf'),
        ));
    }

    /**
     * Register functions page.
     */
    function add_custom_option_page() {
        add_submenu_page(
            'theme-options',
            __( 'Theme Functions', 'textdomain' ),
            __( 'Theme Functions', 'textdomain' ),
            'manage_options',
            'theme-functions',
            'theme_function_build'
        );
    }

}

new Theme_Options_Page;



// --------------------------------------------------------
// ---------------- Theme Functions
// --------------------------------------------------------


/**
 * Construct functions page.
 * Preloader - saves pages html to database
 * Function below clears the preloader of any caches -- Will we use this?
 */
function theme_function_build(){


    // Reset Preloader Values
    if (isset($_GET['refresh-preloader'])) {
        echo '<div id="message" class="updated fade"><p>';
        reset_all_Preloader();
        echo '</p></div>';
    }



    ?>
    <div class="wrap">
        <h1><?php _e( 'Theme Functions', 'textdomain' ); ?></h1>
        <?php echo '<p><a href="'.admin_url('admin.php?page=theme-functions&refresh-preloader').'">'.__('Empty All Preloaders', 'textdomain').' &raquo;</a></p>'; ?>
    </div>
    <?php
}
