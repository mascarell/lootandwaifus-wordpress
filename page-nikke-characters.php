<?php /* Template Name: Nikke Characters */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

function showCharactersByRarity($tag_slug, $category_id) {
  $query = new WP_Query( array(
      'post_type'      => 'characters',
      'orderby'        => 'title',
      'order'          => 'ASC',
      'posts_per_page' => -1,
      'no_found_rows'  => true,
      'category_name'  => $category_id,
      'tax_query' => array(
          array(
              'taxonomy' => 'post_tag',  // Use the taxonomy name for tags
              'field'    => 'slug',      // Use 'slug' or 'term_id' as per your requirement
              'terms'    => $tag_slug,  // Replace with the slug of your desired tag
          ),
      ),
  ) );
  if ( $query->have_posts() ) :

      while ( $query->have_posts() ) : $query->the_post();

        get_template_part('template-parts/character-nomargin');

      endwhile; wp_reset_postdata();
  endif;
}

?>

<div class="double characters-wrapper animated">
  <div class="news">
    <div class="character-filters">
      <input type="search" id="search" name="search" placeholder="Filter characters" autocomplete="off">
		</div>

    <?php get_template_part('template-parts/database-filters'); ?>

		<div class="characters filtered">
			<?php
        // We have a different ordering method for reverse 1999 characters
        if($category_id == 'Reverse: 1999') {
          // semi dirty way of doing it but better than it not working
          showCharactersByRarity('ur', $category_id);
          showCharactersByRarity('ssr', $category_id);
          showCharactersByRarity('sr', $category_id);
          showCharactersByRarity('r', $category_id);
        } else {
          $query = new WP_Query( array(
              'post_type'      => 'characters',
              'orderby'        => 'title',
              'order'          => 'ASC',
              'posts_per_page' => -1,
              'no_found_rows'  => true,
              'category_name'  => $category_id
          ) );
          if ( $query->have_posts() ) :
  
              while ( $query->have_posts() ) : $query->the_post();
  
                get_template_part('template-parts/character-nomargin');
  
              endwhile; wp_reset_postdata();
          endif; 
        }
			?>
		</div>
	</div>
</div>

<?php

get_footer();

?>