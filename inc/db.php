<?php 
defined('ABSPATH') || die('nice try');

register_activation_hook( PLUGIN_FILE,function(){
    global $wpdb;
    // $prefix = $wpdb->$prefix;
    $table_name = $wpdb->prefix . 'my_table';
    $collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE `wordpress`.`$table_name` (`id` INT NOT NULL , `user_id` INT NOT NULL ,
     `post_id` INT NOT NULL , `like` INT NOT NULL , `dislike` INT NOT NULL , `date_added` INT NOT NULL )
      {$collate};";
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql);
});


register_activation_hook( PLUGIN_FILE,function(){
  global $wpdb;
  // $prefix = $wpdb->$prefix;
  $table_name = $wpdb->prefix . 'my_table';
  $wpdb->insert( $table_name, array(
    'date_added' => current_time( 'mysql' ),
    'id' => 1,
    'user_id' => 1,
    'post_id' => 1,
    'like' => 1,
    'dislike' => 1,

  ));
});






register_deactivation_hook( PLUGIN_FILE, function(){
//   global $wpdb;
//   $prefix = $wpdb->$prefix;
//   // $sql = "DROP TABLE IF EXIST '{$prefix}likesdislikes';";
//   // $wpdb->query($sql);
  
// $table_name = $wpdb->prefix . 'my_table';

// $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
 } )
    

?>