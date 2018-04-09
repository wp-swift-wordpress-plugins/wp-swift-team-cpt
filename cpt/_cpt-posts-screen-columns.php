<?php
function manage_columns_for_team_member($columns){
    $options = get_option( 'wp_swift_team_member_cpt_settings' );
    //remove columns
    unset($columns['date']);
    unset($columns['title']);
    $columns['title'] = _x('Name', 'column name');
    //add new columns
    if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_title'])) {
        $columns['team_member_title'] = _x('Title', 'column team-member-title');
        $columns['department'] = _x('Department', 'column team-member-department');
    }
	$columns['date'] = _x('Date', 'column name');
    return $columns;
}
add_action('manage_team_member_posts_columns','manage_columns_for_team_member');
function populate_team_member_columns($column,$post_id){
	global $post;
    if($column == 'team_member_title'){
        if(get_field('title')){
            the_field('title');
        } 
    }
    elseif($column == 'department'){
        $terms = wp_get_post_terms( $post_id, $taxonomy='department' );
        $terms_str = '';
        if (!is_wp_error($terms) && count($terms)) {
            foreach ($terms as $key => $term) {
                $terms_str = $term->name.', ';
            }
            echo rtrim($terms_str, ', ');
        }
    }
}
add_action('manage_team_member_posts_custom_column','populate_team_member_columns',10,2);