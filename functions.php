<?php
 
// Load stylesheets
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
    wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts','load_css');

// Load JavaScript
function load_js()
{
	wp_enqueue_script('jquery');
	wp_register_script('bootstrap',  get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
	wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

// Theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Menus
register_nav_menus(
        array(
        	'top-menu' => 'Top Menu Location',
        	'mobile-menu' => 'Mobile Menu Location',
        	'footer-menu' => 'Footer Menu Location',
        )
);

// Custom Image Sizes
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);


// Register Sidebars
function my_sidebars()
{
    register_sidebar(

        array(

            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );

    register_sidebar(

        array(

            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
}
add_action('widgets_init','my_sidebars');



// 'Brew'
function our_coffee()
{

   $args = array(
      
        'labels' => array(
                   'name' => 'Brews',
                   'singular_name' => 'Brew'
        ),

        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-image-filter',
        'support' => array('title', 'editor', 'thumbnail', 'custom-fields'),
   );

   register_post_type('our-brewing', $args);

}
add_action('init', 'our_coffee');


function my_first_taxonomy()
{
    $args = array(

        'labels' => array(
                   'name' => 'Types',
                   'singular_name' => 'Type'
        ),

        'public' => true,
        'hierarchical' => true,

    );

    register_taxonomy('Types', array('our-brewing'), $args);
}
add_action('init', 'my_first_taxonomy');

add_filter('acf/settings/remove_wp_meta_box', '__return_false');