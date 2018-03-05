<?php
if( function_exists('acf_add_local_field_group') ):
$options = get_option( 'wp_swift_team_member_cpt_settings' );
$team_member_fields = array ();
$team_member_title = array (
	'key' => 'field_59959722040cd',
	'label' => 'Title',
	'name' => 'title',
	'type' => 'text',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'maxlength' => '',
);
$department = array(
	'key' => 'field_5a92a482206cb',
	'label' => 'Department',
	'name' => 'department',
	'type' => 'select',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array(
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'choices' => array(
		'investment' => 'Investment',
		'admin' => 'Admin',
		'external' => 'External',
	),
	'default_value' => array(
	),
	'allow_null' => 1,
	'multiple' => 0,
	'ui' => 0,
	'ajax' => 0,
	'return_format' => 'array',
	'placeholder' => '',
);
$tax_department = array(
	'key' => 'field_5a9d93861a475',
	'label' => 'Department',
	'name' => 'tax_department',
	'type' => 'taxonomy',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array(
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'taxonomy' => 'department',
	'field_type' => 'select',
	'allow_null' => 0,
	'add_term' => 0,
	'save_terms' => 1,
	'load_terms' => 1,
	// 'return_format' => 'object',
	'return_format' => 'id',
	'multiple' => 0,
);
$team_member_email = array (
	'key' => 'field_56cb0269b691e',
	'label' => 'Email',
	'name' => 'email',
	'type' => 'email',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => 'info@dlight.ie',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
);
$team_member_phone = array (
	'key' => 'field_56cb02acb6920',
	'label' => 'Phone',
	'name' => 'phone',
	'type' => 'text',
	'instructions' => 'Suggested format: +353 (0)51 124 1234',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'maxlength' => '',
);
$team_member_mobile = array (
	'key' => 'field_599598b4026ef',
	'label' => 'Mobile',
	'name' => 'mobile',
	'type' => 'text',
	'instructions' => 'Suggested format: +353 (0)87 124 1234',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'maxlength' => '',
);
$team_member_skype = array (
	'key' => 'field_56cb0296b691f',
	'label' => 'Skype',
	'name' => 'skype',
	'type' => 'text',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'maxlength' => '',
	'readonly' => 0,
	'disabled' => 0,
);
$team_member_linkedin = array (
	'key' => 'field_5a3be084adae6',
	'label' => 'Linkedin',
	'name' => 'linkedin',
	'type' => 'text',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'maxlength' => '',
);
$team_member_featued_profile = array (
	'key' => 'field_599599ffbbb7f',
	'label' => 'Featued Profile',
	'name' => 'featued_profile',
	'type' => 'true_false',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'message' => 'Some themes will use this to feature selected profiles',
	'default_value' => 0,
	'ui' => 0,
	'ui_on_text' => '',
	'ui_off_text' => '',
);
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_title'])) {
	$team_member_fields[] = $team_member_title;
	$team_member_fields[] = $department;
	$team_member_fields[] = $tax_department;
}
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_email'])) {
	$team_member_fields[] = $team_member_email;
}
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_phone'])) {
	$team_member_fields[] = $team_member_phone;
}
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_mobile'])) {
	$team_member_fields[] = $team_member_mobile; 
}
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_skype'])) {
	$team_member_fields[] = $team_member_skype;
}
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_linkedin'])) {
	$team_member_fields[] = $team_member_linkedin;
}
if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_featued_profile'])) {
	$team_member_fields[] = $team_member_featued_profile;
}						
if (count($team_member_fields)>0) {
	acf_add_local_field_group(array (
		'key' => 'group_56b870f5c968e',
		'title' => 'Team Member Profile',
		'fields' => $team_member_fields,
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team_member',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
}

endif;