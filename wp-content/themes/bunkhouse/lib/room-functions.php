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

add_action( 'cmb2_admin_init', 'bh_register_rooms_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function bh_register_rooms_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_bh_rooms_';

/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Room Content Custom Fields', 'cmb2' ),
		'object_types'  => array( 'rooms', ), // Post type
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );
	
	
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Room Name', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'name',
		'type'       => 'text',
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Room Image', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'image',
		'type'       => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'    => __( 'Room and SEO Copy wysiwyg', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

$cmb_demo->add_field( array(
		'name' => __( 'Reservation URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

$cmb_demo->add_field( array(
		'name' => __( 'Nightly Room Rate', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'rate',
		'type' => 'text_money',
		//'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

$cmb_demo->add_field( array(
		'name'    => __( 'Ammenities', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'multicheckbox',
		'type'    => 'multicheck',
		// 'multiple' => true, // Store values in individual rows
		'options' => array(
			'Private Room' => __( 'Private Room', 'cmb2' ),
			'Semi-Private Room' => __( 'Semi-Private Room', 'cmb2' ),
			'Safe' => __( 'Safe', 'cmb2' ),
			'Ski Locker' => __( 'Ski Locker', 'cmb2' ),
			'Complimentary Continental Breakfast' => __( 'Complimentary Continental Breakfast', 'cmb2' ),
		),
		// 'inline'  => true, // Toggles display to inline
	) );
	
}

add_action( 'cmb2_admin_init', 'bh_rooms_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function bh_rooms_register_repeatable_group_field_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'bh_rooms_group';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Repeating Field Group for the Slides', 'cmb2' ),
		'object_types' => array( 'rooms', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => 'bh_rooms_group',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries for the Slider/Gallery', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Image {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Image', 'cmb2' ),
			'remove_button' => __( 'Remove Image', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 * The parent field's id needs to be passed as the first argument.
	 */

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Select Image', 'cmb2' ),
		'id'   => 'pic',
		'type' => 'file',
	) );

}
