<?php
/**
 * Replace the default "Enter title here" placeholder text in the title input box
 * with something more descriptive can be helpful for custom post types
 */
function change_default_title_team_member( $title ){

    $screen = get_current_screen();

    if ( 'team_member' == $screen->post_type ){
        $title = "Enter name here";
    }
    return $title;
}
add_filter( 'enter_title_here', 'change_default_title_team_member' );