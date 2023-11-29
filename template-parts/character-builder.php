<?php
  $tags = get_the_tags();

  // Initialize an empty array to store tag slugs
  $tag_slugs = array();

  // Loop through the tags and extract their slugs
  foreach ($tags as $tag) {
    $tag_slugs[] = $tag->slug;
  }
?>

<div draggable="true" class="post builder character nomargin covering container" data-character-id="<?php echo get_the_ID(); ?>" data-character-name="<?php the_title(); ?>" >
  <div class="bg <?php echo implode(' ', $tag_slugs); ?>"></div>
  <div class="lozad <?php echo implode(' ', $tag_slugs); ?>" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
	<div class="margin" data-character-id="<?php echo get_the_ID(); ?>">
		<div class="content">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
</div>