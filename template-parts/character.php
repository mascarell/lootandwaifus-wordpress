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

  // Custom fields for the event
	$paired = get_post_meta( get_the_ID(), 'paired', true );
	$investment = get_post_meta( get_the_ID(), 'investment', true );
	$elemental = get_post_meta( get_the_ID(), 'elemental', true );
	$support = get_post_meta( get_the_ID(), 'support', true );
	$healing = get_post_meta( get_the_ID(), 'healing', true );
	$situational = get_post_meta( get_the_ID(), 'situational', true );
	$roles = get_post_meta( get_the_ID(), 'roles', true ); // can fill multiple roles on a team depending on investment
	$loved = get_post_meta( get_the_ID(), 'loved', true ); // popular and loved characters regardless of tier placement

  // get category of the game as slug so we can put the classes for elemental icons
  $categories = get_the_category();
  $category_slug = $categories[0]->slug;
?>


<div class="post <?php echo $category_slug; ?> character covering container" data-character-name="<?php the_title(); ?>">
  <div class="flags">
    <?php if ( ! empty( $paired ) ) { ?> 
      <div class="flag" data-tooltip="This character tier placement is dependent on having specific units (<?php echo $paired; ?>) in the same team."><i class="ri-group-line"></i></div> 
    <?php } ?>
    <?php if ( ! empty( $investment ) ) { ?> 
      <div class="flag" data-tooltip="This character tier placement is for their performance based on heavy investment, multiple dupes or a mix of both."><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 11 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138"/>
      </svg></div> 
    <?php } ?>
    <?php if ( ! empty( $elemental ) ) { ?> 
      <div class="flag" data-tooltip="This character tier placement is for their excellent performance based on elemental type content."><i class="ri-fire-line"></i></div> 
    <?php } ?>
    <?php if ( ! empty( $support ) ) { ?> 
      <div class="flag" data-tooltip="This character tier placement is based on their performance as fully support unit."><i class="ri-tools-fill"></i></div> 
    <?php } ?>
    <?php if ( ! empty( $healing ) ) { ?> 
      <div class="flag" data-tooltip="This character tier placement is based on their performance as a healer."><i class="ri-heart-add-line"></i></div> 
    <?php } ?>
    <?php if ( ! empty( $situational ) ) { ?> 
      <div class="flag" data-tooltip="This character tier placement is for their performance based on specific situations or niches."><i class="ri-sparkling-line"></i></div> 
    <?php } ?>
    <?php if ( ! empty( $roles ) ) { ?> 
      <div class="flag" data-tooltip="This character can fill multiple roles on the team depending on investment (<?php echo $roles; ?>)."><i class="ri-asterisk"></i></div> 
    <?php } ?>
    <?php if ( ! empty( $loved ) ) { ?> 
      <div class="flag" data-tooltip="Regardless of tier placement, this character is loved by everyone in the community and they deserve their own flag."><i class="ri-heart-line"></i></div> 
    <?php } ?>
  </div>
	<div class="bg <?php echo $post_slug; ?> <?php echo implode(' ', $tag_slugs); ?>"></div>
	<div class="lozad" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
	<a href="<?php the_permalink(); ?>" class="margin">
		<div class="content">
			<h2><?php echo the_title(); ?></h2>
		</div>
	</a>
</div>