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

add_action( 'init', 'pwspk_init' );  

function pwspk_init(){
    add_shortcode( 'test', 'pwspk_my_shortcode' );
    }
    function pwspk_my_shortcode($atts)
    {
        $atts = shortcode_atts(array(
                'message' => 'hello worlds',
            ), $atts,'test');
         return $atts['message'];
    }

    add_filter( 'the_title' , 'pwspk_title' );
function pwspk_title($title){
    return "you title is hacked";
}

 add_action( 'wp_enqueue_scripts' ,'pwspk_adding_script');

 function pwspk_adding_script(){
      wp_enqueue_style( 'pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/css/style.css");

      wp_enqueue_script( 'pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/js/custom.js");
 }