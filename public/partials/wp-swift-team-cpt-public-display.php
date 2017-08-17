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
while ( have_posts() ) : the_post(); $post_id = get_the_id(); ?>

    <div class="team-member">

        <?php if ( isset($options['wp_swift_team_member_cpt_checkbox_support_featured_image']) && has_post_thumbnail( $post_id ) ) : ?>
            <img src="<?php echo the_post_thumbnail_url('large'); ?>" alt="Image for <?php get_the_title() ?>">
        <?php endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_visibility'])): ?>
			<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		<?php else: ?>
			<h4><?php the_title() ?></h4>
		<?php endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_title'])):
			if ( get_field('title') ) : ?>
				<h6 class="title"><?php echo get_field('title'); ?></h6>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_email'])):
			if ( get_field('title') ) : ?>
				<div class="email"><?php echo get_field('title'); ?></div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_phone'])):
			if ( get_field('title') ) : ?>
				<div class="phone"><?php echo get_field('title'); ?></div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_mobile'])):
			if ( get_field('title') ) : ?>
				<div class="mobile"><?php echo get_field('title'); ?></div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_skype'])):
			if ( get_field('title') ) : ?>
				<div class="mobile"><?php echo get_field('title'); ?></div>
			<?php endif;
		endif ?>

		<div class="entry-content"><?php the_content();?></div>

		<?php if (isset($options['wp_swift_team_member_cpt_checkbox_visibility'])): ?>
			<div class=""><a href="<?php the_permalink() ?>" class="button">Read More</a></div>
		<?php endif; ?>		

	</div><!-- @end .team-member -->

	<?php 
endwhile;