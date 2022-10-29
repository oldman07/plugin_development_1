<?php

/**
 * Plugin Name: Pwsdk_plugin_test
 */
// register_activation_hook(__FILE__,'pwspk_register_activation_hook');
// register_deactivation_hook(__FILE__,'pwspk_register_deactivation_hook');
// register_uninstall_hook( __FILE__,'pwspk_register_uninstall_hook');

//add_action is used to create our own hook
//do_action is used to perform action on hooks created using add_action.
//remove_action is used to remove  hooks created using add_action.
//has_action is contitional statement use to check weather the hook is there or not

include plugin_dir_path(__FILE__)."/inc/shortcode.php";     //plugin_dir_path is use to add php files in the file

add_filter('the_title', 'pwspk_title');
function pwspk_title($title)
{
    return "you title is hacked";
}

add_action('wp_enqueue_scripts', 'pwspk_adding_script');

function pwspk_adding_script()
{
    wp_enqueue_style('pwspk_plugin_dev', plugin_dir_url(__FILE__) . "assets/css/style.css"); //plugin_dir_url is use to add static resources 

    wp_enqueue_script('pwspk_plugin_dev', plugin_dir_url(__FILE__) . "assets/js/custom.js");
}

add_action( 'admin_menu','pwspk_options' );

function pwspk_options(){
    add_menu_page( 'pwspk option','pwspk option', 'manage_options', 'pwspk-option', 'pwspk_option_func' );  //add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', string $icon_url = '', int|float $position = null ): string
    add_submenu_page('pwspk-option', 'pwspk settings', 'pwspk settings', 'manage_options', 'pwspk settings','pwspk_settings_func' );   //add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', int|float $position = null ):
    add_options_page( 'Theme option','Theme option', 'manage_options', 'pwspk_theme_Settings','pwspk_theme_func');
}

function pwspk_option_func(){
    echo '<h1>pwspk_option</h1>';
}
function pwspk_settings_func(){
    echo '<h1>pwspk_settings</h1>';
}

function pwspk_theme_func(){
    echo '<h1>pwspk_Theme_settings</h1>';
}