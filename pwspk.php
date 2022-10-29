<?php  

/**
 * Plugin Name: Pwsdk_plugin_test
 */
register_activation_hook(__FILE__,'pwspk_register_activation_hook');
register_deactivation_hook(__FILE__,'pwspk_register_deactivation_hook');
register_uninstall_hook( __FILE__,'pwspk_register_uninstall_hook');


 function pwspk_register_activation_hook(){
     add_option('updated_title','this title is hacked');  
     //update_title is user define and it create an option in wp-admin/options.php
     
}

function pwspk_register_deactivation_hook(){
    delete_option('updated_title');
}