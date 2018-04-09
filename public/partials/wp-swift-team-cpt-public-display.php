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
			<h4><a href="<?php echo get_the_permalink($post_id) ?>"><?php echo $post->post_title ?></a></h4>
		<?php else: ?>
			<h4><?php echo $post->post_title ?></h4>
		<?php endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_title'])):
			if ( get_field('title', $post_id) ) : $title = get_field('title', $post_id); ?>
				<h6 class="meta title"><?php echo $title; ?></h6>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_email'])):
			if ( get_field('email', $post_id) ) : $email = get_field('email', $post_id); ?>
				<div class="meta email">
					Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_phone'])):
			if ( get_field('phone', $post_id) ) : $phone = get_field('phone', $post_id); ?>
				<div class="meta phone">
					<span>Phone: </span><a href="tel:<?php echo get_field('phone'); ?>"><?php echo get_field('phone'); ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_mobile'])):
			if ( get_field('mobile', $post_id) ) : $mobile = get_field('mobile', $post_id); ?>
				<div class="meta mobile">
					<span>Mobile: </span><a href="tel:<?php echo $mobile; ?>"><?php echo $mobile; ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_skype'])):
			if ( get_field('skype', $post_id) ) : $skype = get_field('skype', $post_id); ?>
				<div class="meta skype">
					<span>Skype: </span><a href="tel:<?php echo $skype; ?>"><?php echo $skype; ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_linkedin'])):
			if ( get_field('linkedin', $post_id) ) : $linkedin = get_field('linkedin', $post_id); ?>
				<div class="meta linkedin">
					<span>LinkedIn: </span><a href="<?php echo $linkedin; ?>" target="_blank"><?php echo $linkedin; ?></a>
				</div>
			<?php endif;
		endif ?>

		<?php if ($post->post_content): ?>
			<div class="entry-content"><?php echo $post->post_content; ?></div>
		<?php endif ?>

		<?php if ( $post->post_content && isset($options['wp_swift_team_member_cpt_checkbox_visibility'])): ?>
			<div class=""><a href="<?php get_the_permalink($post_id) ?>" class="button">Read More</a></div>
		<?php endif; ?>

	</div><!-- @end .team-member -->

	<?php 
endforeach;