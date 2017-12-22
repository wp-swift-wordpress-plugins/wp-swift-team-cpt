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
while ( have_posts() ) : the_post(); $post_id = get_the_id(); $i++; ?>

    <div class="team-member <?php echo $i % 2 ? 'odd':'even'; ?>">

        <?php if ( isset($options['wp_swift_team_member_cpt_checkbox_support_featured_image']) && has_post_thumbnail( $post_id ) ) : ?>
            <img src="<?php echo the_post_thumbnail_url('thumbnail'); ?>" alt="Image for <?php get_the_title() ?>" class="team">
        <?php endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_visibility'])): ?>
			<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
		<?php else: ?>
			<h4><?php the_title() ?></h4>
		<?php endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_title'])):
			if ( get_field('title') ) : ?>
				<h6 class="meta title"><?php echo get_field('title'); ?></h6>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_email'])):
			if ( get_field('email') ) : ?>
				<div class="meta email">
					Email: <a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_phone'])):
			if ( get_field('phone') ) : ?>
				<div class="meta phone">
					<span>Phone: </span><a href="tel:<?php echo get_field('phone'); ?>"><?php echo get_field('phone'); ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_mobile'])):
			if ( get_field('mobile') ) : ?>
				<div class="meta mobile">
					<span>Mobile: </span><a href="tel:<?php echo get_field('mobile'); ?>"><?php echo get_field('mobile'); ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_skype'])):
			if ( get_field('skype') ) : ?>
				<div class="meta skype">
					<span>Skype: </span><a href="tel:<?php echo get_field('skype'); ?>"><?php echo get_field('skype'); ?></a>
				</div>
			<?php endif;
		endif;

		if (isset($options['wp_swift_team_member_cpt_checkbox_acf_field_linkedin'])):
			if ( get_field('linkedin') ) : ?>
				<div class="meta linkedin">
					<span>LinkedIn: </span><a href="<?php echo get_field('linkedin'); ?>" target="_blank"><?php echo get_field('linkedin'); ?></a>
				</div>
			<?php endif;
		endif ?>

		<hr>
		<div class="entry-content"><?php the_content();?></div>

		<?php if (isset($options['wp_swift_team_member_cpt_checkbox_visibility'])): ?>
			<div class=""><a href="<?php the_permalink() ?>" class="button">Read More</a></div>
		<?php endif; ?>	

		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<siv class="edit-link">', '</siv>' ); ?>	

	</div><!-- @end .team-member -->

	<?php 
endwhile;