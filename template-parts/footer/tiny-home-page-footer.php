<?php
/**
 * Displays the secondary footer widget area
 *
 * @package Pipe Wrench
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

	<div class="widget-area">
		<div class="widget-column footer-widget-2">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	</div><!-- .widget-area -->

<?php endif; ?>
