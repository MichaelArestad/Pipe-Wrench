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
    // $playfair_display = esc_html_x( 'on', 'Playfair Display: on or off', 'seedlet' );
    
    /* Translators: If there are characters in your language that are not
	* supported by Playfair Display, translate this to 'off'. Do not translate
	* into your own language.
	*/
    $teko = esc_html_x( 'on', 'Teko: on or off', 'pipewrench' );

	if ( 'off' !== $teko ) {
		$font_families = array();

		if ( 'off' !== $teko ) {
			$font_families[] = 'Teko:wght@300;400;500;600;700';
		}

		// if ( 'off' !== $playfair_display ) {
		// 	$font_families[] = 'Playfair Display:ital,wght@0,400;0,700;1,400';
		// }

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add Parent styles
 *
 * - See: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */
add_action( 'wp_enqueue_scripts', 'pipewrench_enqueue_styles' );
function pipewrench_enqueue_styles() {
	$parenthandle = 'seedlet-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme = wp_get_theme();
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
		array(),
		$theme->parent()->get('Version')
	);

	wp_enqueue_style( 'pipewrench-style', get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get('Version')
	);

	// Navigation styles
	wp_enqueue_style( 'pipewrench-style-navigation', get_stylesheet_directory_uri() . '/assets/css/style-navigation.css',
		array( $parenthandle ),
		$theme->get('Version')
	);

	// RTL styles
	wp_style_add_data( 'pipewrench-style', 'rtl', 'replace' );
	wp_style_add_data( 'pipewrench-style-navigation', 'rtl', 'replace' );

	// Print styles
	wp_enqueue_style( 'pipewrench-print-style', get_stylesheet_directory_uri() . '/assets/css/print.css',
		array( $parenthandle ), wp_get_theme()->get( 'Version' ), 'print'
	);
	
	// Fonts
	wp_enqueue_style( 'pipewrench-fonts', pipewrench_fonts_url(), array(), null );
}

?>