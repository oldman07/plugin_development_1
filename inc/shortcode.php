<?php
add_action('init', 'pwspk_init');

function pwspk_init()
{
    add_shortcode('test', 'pwspk_my_shortcode');
    add_shortcode('news', 'pwspk_my_news_shortcode');
}

function pwspk_my_news_shortcode($atts, $content=' '){
    $atts = shortcode_atts(array(
        'message' => ' Hello, World!',
        ), $atts, 'news');
    $args = array(
        'post_type' =>'news',
        'post_status'=>'publish',
        'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if($query->have_posts()) :
        while($query->have_posts()):
            $query->the_post();
            $content.="<h2><a  href='".get_the_permalink()."'>".get_the_title()." </a></h2>";
            $content.="<p>".get_the_content()."</p>";
        endwhile;

        endif;
return $content;
    
}





function pwspk_my_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'message' => 'hello worlds',
    ), $atts, 'test');
    return $atts['message'];
}
