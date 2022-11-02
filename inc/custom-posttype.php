<?php

add_action('init','pwspk_news');

function pwspk_news(){
    register_post_type( "news", array(
        'label' => 'Global News',
        'labels' => array(),
        'public' => true,
    ) );
}