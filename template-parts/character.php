<?php
$tags = get_the_tags(); // get an array of tags associated with the post
if ( $tags ) {
	$first_tag = reset( $tags ); // get the first tag in the array
}
?>

<div class="post character covering container" data-character-name="<?php the_title(); ?>">
	<div class="bg <?php echo $first_tag->slug; ?>"></div>
	<div class="lozad <?php echo $first_tag->slug; ?>" data-background-image="<?php echo the_post_thumbnail_url(); ?>"></div>
	<a href="<?php the_permalink(); ?>" class="margin">
		<div class="content">
			<h2><?php the_title(); ?></h2>
		</div>
	</a>
</div>