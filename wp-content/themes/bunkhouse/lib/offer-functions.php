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

add_action( 'cmb2_admin_init', 'bh_register_offers_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function bh_register_offers_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_bh_offers_';

/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Special Offer Custom Fields', 'cmb2' ),
		'object_types'  => array( 'offers', ), // Post type
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );
	
	//Slider Image Fields
	
	//	$cmb_demo->add_field( array(
	//	'name' => __( 'Offer Six', 'cmb2' ),
	//	'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 400x267', 'cmb2' ),
	//	'id'   => $prefix . 'offer6img',
	//	'type' => 'file',
  //) );
	
	$cmb_demo->add_field( array(
		'name'       => __( 'Promo Field', 'cmb2' ),
		'desc'       => __( 'field description (optional)', 'cmb2' ),
		'id'         => $prefix . 'promo1',
		'type'       => 'text',
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

$cmb_demo->add_field( array(
		'name' => __( 'CTA URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'url1',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );
}

add_action( 'cmb2_admin_init', 'bh_offers_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function bh_offers_register_repeatable_group_field_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'bh_offers_group';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Repeating Field Group for Offers', 'cmb2' ),
		'object_types' => array( 'offers', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => 'bh_offers_group',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries for Special Offers', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Special Offer {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Offer', 'cmb2' ),
			'remove_button' => __( 'Remove Offer', 'cmb2' ),
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
		'name' => __( 'Offer Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );
	
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Offer Rate', 'cmb2' ),
		'id'   => 'rate',
		'type' => 'text_money',
	) );
	
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Offer Name', 'cmb2' ),
		'id'   => 'name',
		'type' => 'text',
	) );
	
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Offer URL', 'cmb2' ),
		'id'   => 'url',
		'type' => 'text_url',
	) );

}
