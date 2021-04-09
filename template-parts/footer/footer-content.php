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
			<?php if ( ! is_home() ) : ?>
				<div class="tiny-mega-blog">
					<h2><a href="<?php echo get_site_url() ?>/blog">Blog</a></h2>
					<ul>
						<?php
						$recent_posts = wp_get_recent_posts(array(
							'numberposts' => 10, // Number of recent posts thumbnails to display
							'post_status' => 'publish' // Show only the published posts
						));
						foreach( $recent_posts as $post_item ) : ?>
							<li>
								<a href="<?php echo get_permalink($post_item['ID']) ?>">
									<?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
									<?php echo $post_item['post_title'] ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
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
