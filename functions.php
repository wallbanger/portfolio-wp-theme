<?php

register_nav_menus( array(
    'Primary' => __( 'Primary menu', 'Colorcut' )
) );

register_nav_menus( array(
    'All page' => __( 'All Page Menu', 'Colorcut' )
) );

// remove menu classes without
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
    if(is_array($var)){
        $varci= array_intersect($var, array('current-menu-item'));
        $cmeni = array('current-menu-item');
        $selava   = array('current-menu-item');
        $selavaend = array();
        $selavaend = str_replace($cmeni, $selava, $varci);
    }
    else{
        $selavaend= '';
    }
    return $selavaend;
}

//excerpt properties
function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
add_filter ( 'widget_text' , 'do_shortcode' );

// main functions
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
add_theme_support( 'post-thumbnails' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function sidebar_widgets_init() {

    if ( function_exists('register_sidebar') ){
        register_sidebar( array(
            'name' => 'Language',
            'id' => 'lang',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ) );
    }
    if ( function_exists('register_sidebar') ){
        register_sidebar( array(
            'name' => 'footer-1',
            'id' => 'footer-1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ) );
    }
    if ( function_exists('register_sidebar') ){
        register_sidebar( array(
            'name' => 'footer-2',
            'id' => 'footer-2',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ) );
    }
    if ( function_exists('register_sidebar') ){
        register_sidebar( array(
            'name' => 'footer-3',
            'id' => 'footer-3',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ) );
    }
    if ( function_exists('register_sidebar') ){
        register_sidebar( array(
            'name' => 'sidebar',
            'id' => 'sidebar',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ) );
    }

};

add_action( 'widgets_init', 'sidebar_widgets_init' );

// ==== Google Chrome Bug
add_action('admin_enqueue_scripts', 'chrome_fix');
function chrome_fix() {
    if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false )
        wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
}
