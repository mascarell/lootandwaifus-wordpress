<?php
  $tags = get_the_tags();

  // Initialize an empty array to store tag slugs
  $tag_slugs = array();

  // Loop through the tags and extract their slugs
  foreach ($tags as $tag) {
    $tag_slugs[] = $tag->slug;
  }

  // get character notes
  $notes = get_post_meta( get_the_ID(), 'notes', true );
  // get character synergies, good and bad
  $good_characters = get_post_meta( get_the_ID(), 'good_characters', true );
  $bad_characters = get_post_meta( get_the_ID(), 'bad_characters', true );

  // get category of the game as slug so we can put the classes for elemental icons
  $categories = get_the_category();
  $category_slug = $categories[0]->slug;
?>

<div id="<?php echo get_the_ID(); ?>" draggable="true" class="post builder <?php echo $category_slug; ?> character nomargin covering container" data-character-id="<?php echo get_the_ID(); ?>" data-character-name="<?php the_title(); ?>" >
  <div 
    <?php if ( ! empty( $notes ) ) { ?> data-notes="<?php echo $notes; ?>" <?php } ?> 
    <?php if ( ! empty( $good_characters ) ) { ?> data-good_characters="<?php echo $good_characters; ?>" <?php } ?> 
    <?php if ( ! empty( $bad_characters ) ) { ?> data-bad_characters="<?php echo $bad_characters; ?>" <?php } ?> 
    class="character-notes bg <?php echo implode(' ', $tag_slugs); ?>"
  ></div>
  <div class="lozad <?php echo implode(' ', $tag_slugs); ?>" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
	<div class="margin" data-character-id="<?php echo get_the_ID(); ?>">
		<div class="content">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
</div>