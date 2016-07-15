<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_bh_frontpage_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Homepage Custom Fields', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on'      => array( 'id' => array( 10, ) ), // Specific post IDs to display this metabox
		//'show_on_cb' => '_bh_frontpage_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );
	
	// Intro & Welcome Copy

	$cmb_demo->add_field( array(
		'name' => __( 'Intro Copy', 'cmb2' ),
		'desc' => __( 'This is the: Welcome To... copy', 'cmb2' ),
		'id'   => $prefix . 'welcome_intro',
		'type' => 'text',
		// 'repeatable' => true,
	) );
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Welcome Title', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'welcome_title',
		'type'       => 'text',
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	
	$cmb_demo->add_field( array(
		'name' => __( 'Front page welcome image', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2' ),
		'id'   => $prefix . 'welcome_image',
		'type' => 'file',
	) );


	$cmb_demo->add_field( array(
		'name'    => __( 'Welcome and SEO Copy wysiwyg', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'welcome_wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	
	$cmb_demo->add_field( array(
		'name' => __( 'Welcome Video', 'cmb2' ),
		'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
		'id'   => $prefix . 'welcome_video',
		'type' => 'oembed',
	) );
	
	// Homepage Rooms Copy
	
	$cmb_demo->add_field( array(
		'name' => __( 'Rooms Intro Copy', 'cmb2' ),
		'desc' => __( 'This is the: Check Out Our Rooms... copy', 'cmb2' ),
		'id'   => $prefix . 'rooms_intro',
		'type' => 'text',
		// 'repeatable' => true,
	) );
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Rooms Title', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'rooms_title',
		'type'       => 'text',
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	
	$cmb_demo->add_field( array(
		'name' => __( 'Homepage Rooms Image', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2' ),
		'id'   => $prefix . 'rooms_image',
		'type' => 'file',
	) );


	$cmb_demo->add_field( array(
		'name'    => __( 'Rooms Copy wysiwyg', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'rooms_wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	
	$cmb_demo->add_field( array(
		'name' => __( 'Rooms Video', 'cmb2' ),
		'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
		'id'   => $prefix . 'rooms_embed',
		'type' => 'oembed',
	) );
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Extra Intro Space Title', 'cmb2' ),
		'desc'       => __( 'This can be Activities, Dining, Nightlife, etc (optional)', 'cmb2' ),
		'id'         => $prefix . 'extra_intro',
		'type'       => 'text',
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Extra Promo Space Title', 'cmb2' ),
		'desc'       => __( 'This can be Activities, Dining, Nightlife, etc (optional)', 'cmb2' ),
		'id'         => $prefix . 'extra_title',
		'type'       => 'text',
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	
	$cmb_demo->add_field( array(
		'name' => __( 'Extra Image', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2' ),
		'id'   => $prefix . 'extra_image',
		'type' => 'file',
	) );
	
	$cmb_demo->add_field( array(
		'name'    => __( 'Extra Copy wysiwyg', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'extra_wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );
	
	$cmb_demo->add_field( array(
		'name' => __( 'Offers Post ID', 'cmb2' ),
		'desc' => __( 'Enter the post id of the Offers data', 'cmb2' ),
		'id'   => $prefix . 'offer_id',
		'type' => 'text',
	) );

	$cmb_demo->add_field( array(
		'name' => __('Reviews Post ID', 'cmb2' ),
		'desc' => __( 'Enter the post id of the Reviews data', 'cmb2' ),
		'id'   => $prefix . 'review_id',
		'type' => 'text',
	) );
	
	$cmb_demo->add_field( array(
		'name' => __( 'Slider Post ID', 'cmb2' ),
		'desc' => __( 'Enter the post id of the Slider to use on the homepage', 'cmb2' ),
		'id'   => $prefix . 'slider_id',
		'type' => 'text',
	) );

}

	//$cmb_demo->add_field( array(
	//	'name'         => 'Testing Field Parameters',
	//	'id'           => $prefix . 'parameters',
	//	'type'         => 'text',
	//	'before_row'   => 'yourprefix_before_row_if_2', // callback
	//	'before'       => '<p>Testing <b>"before"</b> parameter</p>',
	//	'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
	//	'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
	//	'after'        => '<p>Testing <b>"after"</b> parameter</p>',
	//	'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
	//) );

//}

	/**
	 * Metabox to be displayed on a single page ID
	 */
	//$cmb_about_page = new_cmb2_box( array(
	//	'id'           => $prefix . 'metabox',
	//	'title'        => __( 'About Page Metabox', 'cmb2' ),
	//	'object_types' => array( 'page', ), // Post type
	//	'context'      => 'normal',
	//	'priority'     => 'high',
	//	'show_names'   => true, // Show field names on the left
	//	'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	//) );

//}
