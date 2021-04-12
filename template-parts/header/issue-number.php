<?php
/**
 * Displays the issue number
 *
 * @package Pipe Wrench
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-3' ) ) : ?>

	<div class="widget-area issue-number">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- .widget-area -->

<?php endif; ?>
