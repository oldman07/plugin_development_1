 <?php

add_action('admin_init', 'pwspk_metaboxes');

function pwspk_metaboxes()
{
    add_meta_box('_mycustommetabox', 'My Custom MetaBox', 'pwspk_custom_metabox', ['post','page','news']);               //add_meta_box( $id:string, $title:string, $callback:callable, $screen:string|array|WP_Screen|null, $context:string, $priority:string, $callback_args:array|null ) is use to add metaboxes
}
function pwspk_custom_metabox($post)
{
    $_mymetabox = get_post_meta($post->ID, '_mymetabox', true) ? get_post_meta($post->ID, '_mymetabox', true) : " ";            // $_mymetabox = get_post_meta($post->ID, '_mymetabox', true) $_mymetabox is a unique id and we are checking weather we have the item or not.
    $_myselectbox = get_post_meta($post->ID, '_myselectbox', true) ? get_post_meta($post->ID, '_myselectbox', true) : " ";
    ?>
    <input type="text" id='' name='_mymetabox' class='' value="<?php echo $_mymetabox;?>">
    <select name="_selectbox" id="">
        <option value="1" <?php echo $_myselectbox == 1 ? "selected" : ''?>>One</option>
        <option value="2" <?php echo $_myselectbox == 2 ? "selected" : ''?>>Two</option>
        <option value="3" <?php echo $_myselectbox == 3 ? "selected" : ''?>>Three</option>
    </select>
<?php
}
add_action('save_post', 'pwspk_save_post');

function pwspk_save_post($post_id)
{
    if (array_key_exists('_mymetabox', $_POST) && array_key_exists('_selectbox', $_POST)) {                 //array_key_exists('_mymetabox', $_POST) used to check weather that post id consist of that id or not
        update_post_meta($post_id, '_mymetabox', $_POST['_mymetabox']);                                     //update_post_meta is used to update the meta of the given post
        update_post_meta($post_id, '_myselectbox', $_POST['_selectbox']);
    }
}


add_action('the_post','pwspk_the_post');

function pwspk_the_post($post){
    if(is_single( )|| is_home()||is_front_page())                   #sloving the error in post update by using if condition
    {
    // print_r($post->ID);
    // exit;
    $_mymetabox = get_post_meta($post->ID, '_mymetabox', true) ? get_post_meta($post->ID, '_mymetabox', true) : " "; 
    ?>
    <style>
        <?php
if (is_admin($post)) {                              //checking is admin if its on admin side it change its colour
    ?>
        .post-<?php  echo $post->ID; ?>{
            background-color: <?php echo $_mymetabox ?>  
        }
    </style>
    <?php
}
}

}