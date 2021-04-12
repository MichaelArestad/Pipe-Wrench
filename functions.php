<?php

/*
 * Add Google webfonts, if necessary
 *
 * - See: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */
function pipewrench_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Fira Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
    // $fira_sans = esc_html_x( 'on', 'Fira Sans: on or off', 'seedlet' );
    

	/* Translators: If there are characters in your language that are not
	* supported by Playfair Display, translate this to 'off'. Do not translate
	* into your own language.
	*/
    $bitter = esc_html_x( 'on', 'Bitter: on or off', 'pipewrench' );
    
    /* Translators: If there are characters in your language that are not
	* supported by Playfair Display, translate this to 'off'. Do not translate
	* into your own language.
	*/
    $teko = esc_html_x( 'on', 'Teko: on or off', 'pipewrench' );

	if ( 'off' !== $teko || 'off' !== $bitter  ) {
		$font_families = array();

		if ( 'off' !== $bitter ) {
			$font_families[] = 'Bitter:ital,wght@0,400;0,600;1,400;1,600';
		}

		if ( 'off' !== $teko ) {
			$font_families[] = 'Teko:wght@300;500;600';
		}

		$query_args = array(
			'family' => implode( '&family=', $font_families ), // Removed urlencode because it was breaking things
			'subset' => 'latin,latin-ext',
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pipewrench_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Tiny home page footer', 'pipewrench' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'These widgets appear next to the blog links.', 'pipewrench' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pipewrench_widgets_init' );

/**
 * Add Parent styles
 */
add_action( 'wp_enqueue_scripts', 'pipewrench_enqueue_styles' );
function pipewrench_enqueue_styles() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'pipewrench-style', get_stylesheet_uri(),
		array(),
		$theme->get('Version')
	);

	// RTL styles
	wp_style_add_data( 'pipewrench-style', 'rtl', 'replace' );
	wp_style_add_data( 'pipewrench-style-navigation', 'rtl', 'replace' );

	// Print styles
	wp_enqueue_style( 'pipewrench-print-style', get_stylesheet_directory_uri() . '/assets/css/print.css',
		array(), wp_get_theme()->get( 'Version' ), 'print'
	);
	
	// Fonts
	wp_enqueue_style( 'pipewrench-fonts', pipewrench_fonts_url(), array(), null );
}

function give_dequeue_plugin_css() {
	wp_dequeue_style( 'seedlet-fonts' );
	wp_deregister_style( 'seedlet-fonts' );
	wp_dequeue_style( 'seedlet-style' );
	wp_deregister_style( 'seedlet-style' );
	wp_dequeue_style( 'seedlet-style-navigation' );
	wp_deregister_style( 'seedlet-style-navigation' );
	wp_dequeue_style( 'seedlet-print-style' );
	wp_deregister_style( 'seedlet-print-stylen' );
}

add_action('wp_enqueue_scripts','give_dequeue_plugin_css', 100);

if ( ! function_exists( 'pipewrench_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pipewrench_setup() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Enqueue editor styles.
		add_editor_style(
			array(
				pipewrench_fonts_url(),
				'./assets/css/style-editor.css',
			)
		);


	// Editor color palette.
	$colors_theme_mod = get_theme_mod( 'custom_colors_active' );
	$primary          = ( ! empty( $colors_theme_mod ) && 'default' === $colors_theme_mod || empty( get_theme_mod( 'pipewrench_--global--color-primary' ) ) ) ? '#150619' : get_theme_mod( 'pipewrench_--global--color-primary' );
	$secondary        = ( ! empty( $colors_theme_mod ) && 'default' === $colors_theme_mod || empty( get_theme_mod( 'pipewrench_--global--color-secondary' ) ) ) ? '#5A2F67' : get_theme_mod( 'pipewrench_--global--color-secondary' );
	$foreground       = ( ! empty( $colors_theme_mod ) && 'default' === $colors_theme_mod || empty( get_theme_mod( 'pipewrench_--global--color-foreground' ) ) ) ? '#2F4C67' : get_theme_mod( 'pipewrench_--global--color-foreground' );
	$tertiary         = ( ! empty( $colors_theme_mod ) && 'default' === $colors_theme_mod || empty( get_theme_mod( 'pipewrench_--global--color-tertiary' ) ) ) ? '#D33838' : get_theme_mod( 'pipewrench_--global--color-tertiary' );
	$quaternary         = ( ! empty( $colors_theme_mod ) && 'default' === $colors_theme_mod || empty( get_theme_mod( 'pipewrench_--global--color-quaternary' ) ) ) ? '#50B28C' : get_theme_mod( 'pipewrench_--global--color-quaternary' );
	$background       = ( ! empty( $colors_theme_mod ) && 'default' === $colors_theme_mod || empty( get_theme_mod( 'pipewrench_--global--color-background' ) ) ) ? '#FFFEFA' : get_theme_mod( 'pipewrench_--global--color-background' );

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary', 'pipewrench' ),
				'slug'  => 'primary',
				'color' => $primary,
			),
			array(
				'name'  => __( 'Secondary', 'pipewrench' ),
				'slug'  => 'secondary',
				'color' => $secondary,
			),
			array(
				'name'  => __( 'Tertiary', 'pipewrench' ),
				'slug'  => 'tertiary',
				'color' => $tertiary,
			),
			array(
				'name'  => __( 'Quaternary', 'pipewrench' ),
				'slug'  => 'quaternary',
				'color' => $quaternary,
			),
			array(
				'name'  => __( 'Background', 'pipewrench' ),
				'slug'  => 'background',
				'color' => $background,
			)
		)
	);

}
endif;
add_action( 'after_setup_theme', 'pipewrench_setup', 100 );

?>