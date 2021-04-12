<?php if ( ! is_home() ) : ?>
  <div class="tiny-mega-blog">
    <h2><a href="<?php echo get_site_url() ?>/blog">Blog</a></h2>
    <ul>
      <?php
      $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 7, // Number of recent posts thumbnails to display
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