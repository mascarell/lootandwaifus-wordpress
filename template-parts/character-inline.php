<?php while ( have_posts() ) : the_post();
  $tags = get_the_tags();

  // Initialize an empty array to store tag slugs
  $tag_slugs = array();

  // Loop through the tags and extract their slugs
  foreach ($tags as $tag) {
    $tag_slugs[] = $tag->slug;
  }

  // get category of the game as slug so we can put the classes for elemental icons
  $categories = get_the_category();
  $category_slug = $categories[0]->slug;
?>

  <div class="post <?php echo $category_slug; ?> character nomargin covering container" data-character-name="<?php the_title(); ?>">
    <div class="bg <?php echo implode(' ', $tag_slugs); ?>"></div>
    <div class="lozad <?php echo implode(' ', $tag_slugs); ?>" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
    <a href="<?php the_permalink(); ?>" class="margin">
      <div class="content">
        <h2><?php the_title(); ?></h2>
      </div>
    </a>
  </div>

<?php endwhile; // end of the loop. ?>