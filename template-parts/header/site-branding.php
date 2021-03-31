<?php
/**
 * Displays header site branding
 *
 * @package Pipe Wrench
 * @since 1.0.0
 */
$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<?php if ( has_custom_logo() && $show_title ) : ?>
	<div class="site-logo"><?php the_custom_logo(); ?></div>
<?php endif; ?>

<div class="site-branding">
	<?php 
		function is_template_dark() {
			if ( is_page_template( 'pageDark.php') || is_page_template( 'pageDarkNoHeading.php') || is_page_template( 'pageFancyDark.php') ) {
				return true;
			} else {
				return false;
			}
		}
	?>
	<?php if ( has_custom_logo() && ! $show_title ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( ! has_custom_logo() && ! $show_title && is_front_page() && is_template_dark() || ! has_custom_logo() && $show_title && is_front_page()  && is_template_dark() ) : ?>
		<a class="default-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-light.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-light_2x.png 2x"
				sizes="320px"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-light.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! has_custom_logo() && ! $show_title && is_front_page() && ! is_template_dark() || ! has_custom_logo() && $show_title && is_front_page()  && ! is_template_dark() ) : ?>
		<a class="default-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark_2x.png 2x"
				sizes="320px"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! has_custom_logo() && ! $show_title && ! is_front_page() && is_template_dark() || ! has_custom_logo() && $show_title && ! is_front_page() && is_template_dark() ) : ?>
		<a class="default-logo is-compact" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-banner-light.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-banner-light_2x.png 2x"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-banner-light.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! has_custom_logo() && ! $show_title && ! is_front_page() && ! is_template_dark() || ! has_custom_logo() && $show_title && ! is_front_page() && ! is_template_dark() ) : ?>
		<a class="default-logo is-compact" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-banner-dark.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-banner-dark_2x.png 2x"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-banner-dark.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! empty( $blog_info ) && $show_title ) : ?>
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $blog_info; ?></a></h1>
		<?php else : ?>
			<p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $blog_info; ?></a></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( ( $description || is_customize_preview() ) && $show_title ) : ?>
		<p class="site-description">
			<?php echo $description; ?>
		</p>
	<?php endif; ?>
</div><!-- .site-branding -->
