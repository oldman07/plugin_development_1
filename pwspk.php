<?php

/**
 * Plugin Name: Pwsdk_plugin_test
 */
register_activation_hook(__FILE__, 'pwspk_register_activation_hook');
register_deactivation_hook(__FILE__, 'pwspk_register_deactivation_hook');
// register_uninstall_hook( __FILE__,'pwspk_register_uninstall_hook');

//add_action is used to create our own hook
//do_action is used to perform action on hooks created using add_action.
//remove_action is used to remove  hooks created using add_action.
//has_action is contitional statement use to check weather the hook is there or not

//php recommend to wrap in Div
//settings_errors( ) use to show error on front end.





function pwspk_register_activation_hook()
{
    add_option('pwspk_option_1', '');
}

function pwspk_register_deactivation_hook()
{
    delete_option('pwspk_option_1');
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_FILE', __FILE__);

include plugin_dir_path(__FILE__)."/inc/shortcode.php";     //plugin_dir_path is use to add php files in the file
include plugin_dir_path(__FILE__)."/inc/metaboxes.php";
include plugin_dir_path(__FILE__)."/inc/custom-posttype.php";
// include PLUGIN_PATH."inc/api.php";
include PLUGIN_PATH."inc/db.php";

// add_filter('the_title', 'pwspk_title');                     //the_title is a pre define term use to make changes in post title.
// function pwspk_title($title)
// {
//     return "you title is hacked";
// }

add_action('wp_enqueue_scripts', 'pwspk_adding_script');        //wp_enqueue_scripts is user to add static resources like css and js.

function pwspk_adding_script()
{
    wp_enqueue_style('pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/css/style.css"); //plugin_dir_url is use to add static resources

    wp_enqueue_script('pwspk_plugin_dev', plugin_dir_url(__FILE__) . "assets/js/custom.js");
}

add_action('admin_menu', 'pwspk_options');                                 // admin_menu  Fires before the administration menu loads in the admin
add_action('admin_menu', 'pwspk_process_form_settings');                   //process form settings allow us to redirect our form

function pwspk_options()
{
    add_menu_page('pwspk option', 'pwspk option', 'manage_options', 'pwspk-option', 'pwspk_option_func');  //add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', string $icon_url = '', int|float $position = null ): string
    add_submenu_page('pwspk-option', 'pwspk settings', 'pwspk settings', 'manage_options', 'pwspk settings', 'pwspk_settings_func');   //add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', int|float $position = null ):
    add_options_page('Theme option', 'Theme option', 'manage_options', 'pwspk_theme_Settings', 'pwspk_theme_func');
}

function pwspk_process_form_settings()
{
    register_setting('pwspk-option-group', 'pwspk-option-name');
    if (isset($_POST['action']) && current_user_can('manage_options')) {
        update_option('pwspk_option_1', sanitize_text_field($_POST['pwspk_option_1']));
    };
}

function pwspk_option_func()
{ ?>
 

<div class="wrap">                                                 
<h1>pwspk_option</h1>
<?php settings_errors() ?>

    <form action="options.php" method='post'>
        <?php settings_fields('pwspk-option-group')  ?>
        <label for=""> Setting 1:
        <input type="text" name='pwspk_option_1' value ="<?php esc_html(get_option('pwspk_option_1')); ?>" /></label>
        <?php submit_button('Save changes') ?>
    </form>
    <?php include PLUGIN_PATH."inc/api.php" ?>
</div>

<?php

}
function pwspk_settings_func()
{
    echo '<h1>pwspk_settings</h1>';
}

function pwspk_theme_func()
{
    echo '<h1>pwspk_Theme_settings</h1>';
}
