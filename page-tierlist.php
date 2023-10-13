<?php /* Template Name: Tier List */ ?>

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

          <div class="character-filters">
            <input type="search" id="search" name="search" placeholder="Filter characters" autocomplete="off">
          </div>
          
          <?php get_template_part('template-parts/database-filters'); ?>

          <div class="tier-list">
            <!-- TIER 0 UNITS -->
            <?php
              $args = array(
                'post_type' => 'characters', 
                'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                'category_name'  => $category_id,
                'tag' => 'tier-0',
              );
              $query = new WP_Query($args);
              if ( $query->have_posts() ) : ?>
                <div class="row"><p class="tier tier-0">Tier 0</p><div class="characters filtered">

                <?php while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/character');
                endwhile; wp_reset_postdata(); ?>
                </div></div>
              <?php endif;
            ?>

            <!-- TIER 0.5 UNITS -->
            <?php
              $args = array(
                'post_type' => 'characters', 
                'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                'category_name'  => $category_id,
                'tag' => 'tier-0-5',
              );
              $query = new WP_Query($args);
              if ( $query->have_posts() ) : ?>
                <div class="row"><p class="tier tier-1">Tier 0.5</p><div class="characters filtered">

                <?php while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/character');
                endwhile; wp_reset_postdata(); ?>
                </div></div>
              <?php endif;
            ?>

            <!-- TIER 1 UNITS -->
            <?php
              $args = array(
                'post_type' => 'characters', 
                'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                'category_name'  => $category_id,
                'tag' => 'tier-1',
              );
              $query = new WP_Query($args);
              if ( $query->have_posts() ) : ?>
                <div class="row"><p class="tier tier-2">Tier 1</p><div class="characters filtered">

                <?php while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/character');
                endwhile; wp_reset_postdata(); ?>
                </div></div>
              <?php endif;
            ?>

            <!-- TIER 1.5 UNITS -->
            <?php
              $args = array(
                'post_type' => 'characters', 
                'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                'category_name'  => $category_id,
                'tag' => 'tier-1-5',
              );
              $query = new WP_Query($args);
              if ( $query->have_posts() ) : ?>
                <div class="row"><p class="tier tier-3">Tier 1.5</p><div class="characters filtered">

                <?php while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/character');
                endwhile; wp_reset_postdata(); ?>
                </div></div>
              <?php endif;
            ?>

            <!-- TIER 2 UNITS -->
            <?php
              $args = array(
                'post_type' => 'characters', 
                'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                'category_name'  => $category_id,
                'tag' => 'tier-2',
              );
              $query = new WP_Query($args);
              if ( $query->have_posts() ) : ?>
                <div class="row"><p class="tier tier-4">Tier 2</p><div class="characters filtered">

                <?php while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/character');
                endwhile; wp_reset_postdata(); ?>
                </div></div>
              <?php endif;
            ?>

            <!-- TIER 3 UNITS -->
            <?php
              $args = array(
                'post_type' => 'characters', 
                'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                'category_name'  => $category_id,
                'tag' => 'tier-3',
              );
              $query = new WP_Query($args);
              if ( $query->have_posts() ) : ?>
                <div class="row"><p class="tier tier-5">Tier 3</p><div class="characters filtered">

                <?php while ( $query->have_posts() ) : $query->the_post();
                get_template_part('template-parts/character');
                endwhile; wp_reset_postdata(); ?>
                </div></div>
              <?php endif;
            ?>
          </div>
				</div>
		</div>
	</div>
</div>

<?php

get_footer();

?>