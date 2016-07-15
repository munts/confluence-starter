<?php
//require_once( dirname(__FILE__) . '/lib/theme-options-cmb.php');
require_once( dirname(__FILE__) . '/lib/room-functions.php');
require_once( dirname(__FILE__) . '/lib/front-page-functions.php');
require_once( dirname(__FILE__) . '/lib/slider-functions.php');
require_once( dirname(__FILE__) . '/lib/offer-functions.php');
require_once( dirname(__FILE__) . '/lib/review-functions.php');
require_once( dirname(__FILE__) . '/lib/widgets.php');
require_once( dirname(__FILE__) . '/lib/aq_resizer.php');
require_once( dirname(__FILE__) . '/lib/wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'bunkhouse' ),
) );

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
   
add_action( 'wp_enqueue_scripts', 'bunkhouse_scripts');
 function bunkhouse_scripts(){
	 	//wp_register_script( 'fotorama', get_template_directory_uri() . '/js/fotorama.js', array(), '1.0.0', true );
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	 	wp_enqueue_script('imagesloaded.pkgd.min', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '1.0.0', true );
	 	wp_enqueue_script('jquery.superslides.min', get_template_directory_uri() . '/js/jquery.superslides.min.js', array(), '1.0.0', true );
	 	wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
	 	//wp_enqueue_script('flatWeatherPlugin.min', get_template_directory_uri() . '/js/jquery.flatWeatherPlugin.min.js', array(), '1.0.0', true );
	 	//wp_enqueue_script('fancybox.pack', get_template_directory_uri() . '/js/fancybox.pack.js', array(), '1.0.0', true );
	 	wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri() . '/js/bootstrap-datepicker.js', array(), '1.0.0', true );
	 	wp_enqueue_script('fotorama', get_template_directory_uri() . '/js/fotorama.js', array(), '1.0.0', true );
	 	wp_enqueue_script('settings', get_template_directory_uri() . '/js/settings.js', array(), '1.0.0', true );
}
   
function bunkhouse_theme_styles() {
   		wp_register_style('bootstrap.min.css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1', 'all' );
		wp_register_style('fotorama', get_template_directory_uri() .'/css/fotorama.css', array(), '1', 'all' );
    	wp_register_style('animate',  get_template_directory_uri() .'/css/animate.css', array(), null, 'all' );
    	wp_register_style('font-awesome.min', get_template_directory_uri() .'/css/font-awesome.min.css', array(), null, 'all' );
		wp_register_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), null, 'all' );
		wp_register_style('superslides', get_template_directory_uri() .'/css/superslides.css', array(), null, 'all' );
		//wp_register_style('flatWeatherPlugin', get_template_directory_uri() .'/css/flatWeatherPlugin.css', array(), null, 'all' );
		//wp_register_style('fancyBox', get_template_directory_uri() .'/css/jquery.fancybox.css', array(), null, 'all' );
		wp_register_style('fontic-hotel', get_template_directory_uri() .'/css/fontic-hotel.css', array(), null, 'all' );
		wp_register_style('styles', get_stylesheet_uri(), array(), null, 'all' );
    	wp_enqueue_style( 'bootstrap.min.css' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'supperslides' );
    	wp_enqueue_style( 'animate' );
	  	wp_enqueue_style( 'fotorama' );
    	wp_enqueue_style( 'font-awesome.min' );
		//wp_enqueue_style( 'fontic-hotel' );
		wp_enqueue_style( 'styles' );
}
add_action( 'wp_enqueue_scripts', 'bunkhouse_theme_styles' );
    

// add title tag support
add_theme_support( 'title-tag' );

//Functions for the portfolio custom post types

add_filter('excerpt_length', 'my_excerpt_length');
 
function my_excerpt_length($length) {
 
    return 20;
}
 
add_filter('excerpt_more', 'new_excerpt_more'); 
 
function new_excerpt_more($text){ 
 
    return ' '; 
 
} 
 
function portfolio_thumbnail_url($pid){
    $image_id = get_post_thumbnail_id($pid); 
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot'); 
    return  $image_url[0]; 
}

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Button',  
			'block' => 'span',  
			'classes' => 'button',
			'wrapper' => true,
			
		),  
		array(  
			'title' => 'Primary',  
			'block' => 'span',  
			'classes' => 'primary',
			'wrapper' => true,
		),
		array(  
			'title' => 'Story',  
			'block' => 'span',  
			'classes' => 'story',
			'wrapper' => true,
		),
		array(  
			'title' => 'Responsive Image',  
			'selector' => 'img',  
			'classes' => 'img-responsive',
			'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

//Adding logo before the nav
add_action ('before_nav', 'logo');
//add_action ('after_nav', 'custom_banner_function');

//Remove the wysiwyg editor field from specific pages
function remove_main_editor() {
	if (get_the_id() === 10) {remove_post_type_support ('page', 'editor');
		} //End If
	} //End remove_main_wysiwyg
add_action( 'add_meta_boxes', 'remove_main_editor' );

function remove_main_editor2() {
	remove_post_type_support ('offers', 'editor');
	} //End remove_main_wysiwyg
add_action( 'add_meta_boxes', 'remove_main_editor2' );

//Creating Custom Post types for Rooms
function setup_rooms_cpt(){
	$labels = array(
		'name' => _x('rooms', 'post type general name'),
		'singular_name' => _x('Room', 'post type singular name'),
		'add_new' => _x('Add New', 'room'),
		'add_new_item' => __('Add New Room'),
		'edit_item' => __('Edit Room'),
		'new_item' => __('New Room'),
		'all_items' => __('All Rooms'),
		'view_item' => __('View Room'),
		'search_items' => __('Search Rooms'),
		'not_found' => __('No Rooms Found'),
		'not_found_in_trash' => __('No Rooms found in the trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Rooms'
		);
	$args = array(
		'labels' => $labels,
		'description' => 'The Bunkhouse Rooms',
		'rewrite' => array('slug' => 'rooms'),
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'has_archive' => true,
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-admin-multisite',
		);
	register_post_type('rooms', $args);
}
add_action('init', 'setup_rooms_cpt');

function rooms_taxonomy() {  
    register_taxonomy(  
        'room_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'rooms',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Room Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'rooms', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'rooms_taxonomy');

//Creating Custom Post types for Offers
function setup_offers_cpt(){
	$labels = array(
		'name' => _x('Offers', 'post type general name'),
		'singular_name' => _x('Offer', 'post type singular name'),
		'add_new' => _x('Add New', 'offer'),
		'add_new_item' => __('Add New Offer'),
		'edit_item' => __('Edit Offer'),
		'new_item' => __('New Offer'),
		'all_items' => __('All Offers'),
		'view_item' => __('View Offer'),
		'search_items' => __('Search Offers'),
		'not_found' => __('No Offers Found'),
		'not_found_in_trash' => __('No Offers found in the trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Offers'
		);
	$args = array(
		'labels' => $labels,
		'description' => 'The Bunkhouse Offers',
		'rewrite' => array('slug' => 'offers'),
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'has_archive' => true,
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-cart',
		);
	register_post_type('offers', $args);
}
add_action('init', 'setup_offers_cpt');

function offers_taxonomy() {  
    register_taxonomy(  
        'offer_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'offers',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Offer Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'offers', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'offers_taxonomy');

//Creating Custom Post types for Reviews
function setup_reviews_cpt(){
	$labels = array(
		'name' => _x('reviews', 'post type general name'),
		'singular_name' => _x('Review', 'post type singular name'),
		'add_new' => _x('Add New', 'Review'),
		'add_new_item' => __('Add New Review'),
		'edit_item' => __('Edit Review'),
		'new_item' => __('New Review'),
		'all_items' => __('All Reviews'),
		'view_item' => __('View Review'),
		'search_items' => __('Search Reviews'),
		'not_found' => __('No Reviews Found'),
		'not_found_in_trash' => __('No Reviews found in the trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Reviews'
		);
	$args = array(
		'labels' => $labels,
		'description' => 'The Bunkhouse Reviews',
		'rewrite' => array('slug' => 'reviews'),
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'has_archive' => true,
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-welcome-write-blog',
		);
	register_post_type('reviews', $args);
}
add_action('init', 'setup_reviews_cpt');

//Creating Custom Post types for the homepage slider
function setup_slides_cpt(){
	$labels = array(
		'name' => _x('slides', 'post type general name'),
		'singular_name' => _x('Slide', 'post type singular name'),
		'add_new' => _x('Add New', 'slide'),
		'add_new_item' => __('Add New Slide'),
		'edit_item' => __('Edit Slide'),
		'new_item' => __('New Slide'),
		'all_items' => __('All Slides'),
		'view_item' => __('View Slide'),
		'search_items' => __('Search Slides'),
		'not_found' => __('No Slides Found'),
		'not_found_in_trash' => __('No Slides found in the trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Slides'
		);
	$args = array(
		'labels' => $labels,
		'description' => 'The homepage slides',
		'rewrite' => array('slug' => 'slides'),
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title', 'thumbnail', 'excerpt', 'custom-fields'),
		'has_archive' => true,
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-images-alt2',
		);
	register_post_type('slides', $args);
}
add_action('init', 'setup_slides_cpt');

//Adding Featured Image Support to all Custom Post Types
add_theme_support( 'post-thumbnails', array( 'rooms', 'reviews', 'post', 'page' ) ); // support for these post types

$args = array(
    'header-text' => array(
        'site-title',
        'site-description',
    ),
    'size' => 'full',
);
add_theme_support( 'site-logo', $args );

function remove_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Search');
    // unregister_widget('WP_Widget_Text');
     unregister_widget('WP_Widget_Categories');
     //unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Widget_Tag_Cloud');
     //unregister_widget('WP_Nav_Menu_Widget');
 }
 add_action('widgets_init', 'remove_default_widgets', 11);


// Remove meta generator (WP version) from site and feed
if ( ! function_exists( 'mywp_remove_version' ) ) {
 
function mywp_remove_version() {
		return '';
}
add_filter('the_generator', 'mywp_remove_version');
}
 
// Clean header from unneeded links
if ( ! function_exists( 'mywp_head_cleanup' ) ) {
 
function mywp_head_cleanup() {
		remove_action('wp_head', 'feed_links', 2);  // Remove Post and Comment Feeds
		remove_action('wp_head', 'feed_links_extra', 3);  // Remove category feeds
		remove_action('wp_head', 'rsd_link'); // Disable link to Really Simple Discovery service
		remove_action('wp_head', 'wlwmanifest_link'); // Remove link to the Windows Live Writer manifest file.
		/*remove_action( 'wp_head', 'index_rel_link' ); */ // canonic link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);  // Remove relation links for the posts adjacent to the current post.
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


add_action('init', 'mywp_head_cleanup');
} }


