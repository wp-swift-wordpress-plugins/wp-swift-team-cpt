<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/wp-swift-wordpress-plugins
 * @since      1.0.0
 *
 * @package    Wp_Swift_Team_Cpt
 * @subpackage Wp_Swift_Team_Cpt/public/partials
 */
$i = 0;
foreach( $posts as $post ): $post_id = $post->ID; $i++; ?>

    <div class="team-member <?php echo $i % 2 ? 'odd':'even'; ?>">

        <?php if ( isset($options['wp_swift_team_member_cpt_checkbox_support_featured_image']) && has_post_thumbnail( $post_id ) ) : ?>
            <img src="<?php echo get_the_post_thumbnail_url($post_id, 'thumbnail'); ?>" alt="Image for <?php echo $post->post_title ?>" class="team">
        <?php endif;

		if ($post->post_content && isset($options['wp_swift_team_member_cpt_checkbox_visibility'])): ?>
			<h5><a href="<?php get_the_permalink($post_id) ?>"><?php echo $post->post_title ?></a></h5>
		<?php else: ?>
			<h5><?php echo $post->post_title ?></h5>
		<?php endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_title'])):
			if ( get_field('title', $post_id) ) : $title = get_field('title', $post_id); ?>
				<h6 class="meta title"><?php echo $title; ?></h6>
			<?php endif;
		endif;

		?>

	</div><!-- @end .team-member -->

	<?php 
endforeach;