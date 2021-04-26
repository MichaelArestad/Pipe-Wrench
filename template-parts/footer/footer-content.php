<?php
	$has_social_nav        = has_nav_menu( 'social' );
	$has_social_nav_items  = wp_nav_menu(
		array(
			'theme_location' => 'social',
			'fallback_cb'    => false,
			'echo'           => false,
		)
	);
	?>

<?php if ( ! ( true === get_theme_mod( 'hide_site_footer', false ) && is_front_page() && is_page() ) ) : ?>
	<?php get_template_part( 'template-parts/footer/full-width-footer' ); ?>
	<div class="footer-blog-and-widgets">
		<div class="blog-and-search">
			<?php get_search_form(); ?>
		</div>

		<?php if ( is_front_page() ) : ?>
			<?php get_template_part( 'template-parts/footer/tiny-home-page-footer' ); ?>
		<?php endif; ?>
	</div>
		
	<?php get_template_part( 'template-parts/footer/footer-menu' ); ?>
<?php endif; ?>

<?php if ( $has_social_nav && $has_social_nav_items ) : ?>
	<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'seedlet' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . seedlet_get_icon_svg( 'link' ),
					'depth'          => 1,
				)
			);
		?>
	</nav><!-- .social-navigation -->
<?php endif; ?>

<?php get_template_part( 'template-parts/footer/footer-info' ); ?>

<?php
// get_template_part( 'template-parts/footer/footer-info' );
