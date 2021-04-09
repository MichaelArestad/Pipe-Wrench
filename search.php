<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Seedlet
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main search-page" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header default-max-width">
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span class="page-description search-term">%2$s</span></h1>',
					__( 'Search results for:', 'seedlet' ),
					get_search_query()
				);
				?>
			</header><!-- .page-header -->
			
			<div class="search_search-results">
				<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				
				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				
				// get_template_part( 'template-parts/content/content-excerpt' );
				
				// End the loop.
			endwhile;
			
			// Numbered pagination.
			seedlet_the_posts_pagination();
			
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content/content-none' );
				
			endif;
			?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
