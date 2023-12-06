<?php /* Template Name: Nikke Characters */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

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
          $query = new WP_Query( array(
              'post_type'      => 'characters',
              'posts_per_page' => -1,
              'no_found_rows'  => true,
              'category_name'  => $category_id,
              'tax_query'      => array(
                  'relation' => 'AND', // Specify that posts must have all specified tags
                  array(
                      'taxonomy' => 'post_tag',
                      'field'    => 'slug',
                      'terms'    => array( 'ur', 'ssr', 'sr', 'r' ),
                  ),
              ),
              'orderby'        => 'terms_order', // Order by the order of tags specified
              'order'          => 'DESC',
          ) );

          if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post();
                  get_template_part('template-parts/character-nomargin');
              endwhile;
              wp_reset_postdata();
          endif;
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