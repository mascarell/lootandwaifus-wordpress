<?php /* Template Name: Tier List Builder */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<div class="double">
	<div class="news">
		<div class="article container animated">
      <div class="article-content">
          <h1><?php the_title(); ?></h1>
    
          <?php the_content(); ?>

          <div class="tier-list custom">
            <!-- TIER 0 UNITS -->
            <div class="row"><p class="tier tier-0" contentEditable="true">S</p><div class="characters filtered">
            </div></div>

            <!-- TIER 1 UNITS -->
            <div class="row"><p class="tier tier-1" contentEditable="true">A</p><div class="characters filtered">
            </div></div>

            <!-- TIER 2 UNITS -->
            <div class="row"><p class="tier tier-2" contentEditable="true">B</p><div class="characters filtered">
            </div></div>

            <!-- TIER 3 UNITS -->
            <div class="row"><p class="tier tier-3" contentEditable="true">C</p><div class="characters filtered">
            </div></div>
          </div>

          <div class="character-filters" style="display: none;">
            <input type="search" id="search" name="search" placeholder="Filter characters" autocomplete="off">
          </div>
          
          <?php get_template_part('template-parts/database-filters'); ?>

          <div class="characters filtered">
            <?php
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
      
                    get_template_part('template-parts/character-tierlist-builder');
      
                  endwhile; wp_reset_postdata();
              endif;
            ?>
          </div>
				</div>
		</div>
	</div>
</div>

<?php

get_footer();

?>