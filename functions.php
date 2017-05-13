<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {

    $parent_style = 'twentyeleven-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function theme_url_shortcode( $attrs = array (), $content = '' ) {
     
    $theme = ( is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri() );
 
    return $theme;
     
}
add_shortcode('theme', 'theme_url_shortcode' );

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

// edit header dimensions here
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 1023 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 390 ) );


?>
