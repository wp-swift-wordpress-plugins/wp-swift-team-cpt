<?php
/**
 * Register Post Type: Team.
 */
function cptui_register_my_cpts_team_member() {

	$labels = array(
		"name" => __( "Team", "" ),
		"singular_name" => __( "Team Member", "" ),
		"all_items" => __( "All Team Members", "" ),
	);

	$supports = array( "title", "editor" );	

	$options = get_option( 'wp_swift_team_member_cpt_settings' );

	$cpt_visibility = false;

	if (isset($options['wp_swift_team_member_cpt_checkbox_visibility'])) {
		$cpt_visibility = true;
	}

	if (isset($options['wp_swift_team_member_cpt_checkbox_support_featured_image'])) {
		$supports[] = "thumbnail";
	}

	if (isset($options['wp_swift_team_member_cpt_checkbox_support_excerpt'])) {
		$supports[] = "excerpt";
	}

	$args = array(
		"label" => __( "Team", "" ),
		"labels" => $labels,
		"description" => "Post type for staff and team members",
		"public" => false,// private
		"publicly_queryable" => false,// private
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,// private
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "team-member", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 50,
		"menu_icon" => "dashicons-groups",
		"supports" => $supports,
	);

	if ($cpt_visibility) {
		$args["public"] = true;
		$args["publicly_queryable"] = true;
		$args["exclude_from_search"] = false;
	}

	register_post_type( "team_member", $args );
}
add_action( 'init', 'cptui_register_my_cpts_team_member' );

