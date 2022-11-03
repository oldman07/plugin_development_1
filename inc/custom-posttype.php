<?php

add_action('init','pwspk_news');

function pwspk_news(){
    register_post_type( "news", array(
        'label' => 'Global News',
        'labels' => array(),
        'public' => true,
    ) );
}

add_filter( 'template_include' , 'pwspk_news_template');                //'template_include' include the current template to the custome post type


function pwspk_news_template($template){
    global $post;
    if(is_single() && $post->post_type == 'news'){
        $template = plugin_dir_path(__FILE__).'../templates/pwspk_news.php';
        // print_r($template);
        // exit;
    }
    return $template;
}