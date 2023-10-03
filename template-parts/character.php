<?php
  $tags = get_the_tags();
  global $post;
  if ($post) {
    $post_slug = get_post_field('post_name', $post->ID);
  }

  // Initialize an empty array to store tag slugs
  $tag_slugs = array();

  // Loop through the tags and extract their slugs
  foreach ($tags as $tag) {
    $tag_slugs[] = $tag->slug;
  }
?>

<div class="post character covering container" data-character-name="<?php the_title(); ?>">
	<div class="bg <?php echo $post_slug; ?> <?php echo implode(' ', $tag_slugs); ?>"></div>
	<div class="lozad" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
	<a href="<?php the_permalink(); ?>" class="margin">
		<div class="content">
			<h2><?php echo the_title(); ?></h2>
		</div>
	</a>
</div>