<?php
/**
 * Displays header site branding
 *
 * @package Seedlet
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
	<?php if ( has_custom_logo() && ! $show_title ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( ! has_custom_logo() && ! $show_title && is_front_page() && is_page_template( 'pageDark.php' ) || ! has_custom_logo() && $show_title && is_front_page()  && is_page_template( 'pageDark.php' ) ) : ?>
		<a class="default-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white_2x.png 2x"
				sizes="320px"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! has_custom_logo() && ! $show_title && is_front_page() && ! is_page_template( 'pageDark.php' ) || ! has_custom_logo() && $show_title && is_front_page()  && ! is_page_template( 'pageDark.php' ) ) : ?>
		<a class="default-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark_2x.png 2x"
				sizes="320px"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! has_custom_logo() && ! $show_title && ! is_front_page() && is_page_template( 'pageDark.php' ) || ! has_custom_logo() && $show_title && ! is_front_page() && is_page_template( 'pageDark.php' ) ) : ?>
		<a class="default-logo is-compact" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white__compact.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white__compact_2x.png 2x"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white__compact.png,"
				alt="Pipe Wrench" />
		</a>
	<?php endif; ?>
	<?php if ( ! has_custom_logo() && ! $show_title && ! is_front_page() && ! is_page_template( 'pageDark.php' ) || ! has_custom_logo() && $show_title && ! is_front_page() && ! is_page_template( 'pageDark.php' ) ) : ?>
		<a class="default-logo is-compact" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark__compact.png,
				<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark__compact_2x.png 2x"
				src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark__compact.png,"
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
