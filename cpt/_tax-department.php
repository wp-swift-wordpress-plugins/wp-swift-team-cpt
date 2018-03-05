<?php
function cptui_register_my_taxes_department() {

	/**
	 * Taxonomy: Departments.
	 */

	$labels = array(
		"name" => __( "Departments", "wp-swift-tax-department" ),
		"singular_name" => __( "Department", "wp-swift-tax-department" ),
		"view_item" => __( "View Department", "wp-swift-tax-department" ),
	);

	$args = array(
		"label" => __( "Departments", "wp-swift-tax-department" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Departments",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'department', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
		// Hide the metabox so we can create our own with ACF
    	'meta_box_cb' => false,				
	);
	register_taxonomy( "department", array( "team_member" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_department' );