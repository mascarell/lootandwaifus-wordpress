<?php /* Template Name: Team builder 3 units */ ?>

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

        get_template_part('template-parts/character-builder');

      endwhile; wp_reset_postdata();
  endif;
}

?>

<div class="double characters-wrapper builder animated">
	<div class="news">
    <div class="article container animated">
      <div class="article-content">
        <?php the_content(); ?>
      </div>
		</div>

		<div class="teams three">
			<span class="advice">Team builder works best on PC, mobile can be funky until I do an update</span>
			<h3>Your teams</h3>
			<div class="team-switch">
				<span class="team1 active">1</span>
				<span class="team2">2</span>
				<span class="team3">3</span>
			</div>

			<div class="characters">
				<div class="post builder team1 character nomargin covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team1 character nomargin covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team1 character nomargin covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team2 character nomargin notSelected covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team2 character nomargin notSelected covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team2 character nomargin notSelected covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team3 character nomargin notSelected covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team3 character nomargin notSelected covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
				<div class="post builder team3 character nomargin notSelected covering container"><div class="margin"><div class="content"><h2>Drag character</h2></div></div></div>
			</div>
		</div>

    <div class="character-filters" style="display:none;">
      <input type="search" id="search" name="search" placeholder="Filter characters" autocomplete="off">
		</div>
    
		<?php get_template_part('template-parts/database-filters'); ?>

		<div class="characters filtered">
			<?php
        // We have a different ordering method for reverse 1999 characters
        if($category_id == 'Solo Leveling: Arise') {
          // semi dirty way of doing it but better than it not working
          showCharactersByRarity('ur', $category_id);
          showCharactersByRarity('sr', $category_id);
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
  
                get_template_part('template-parts/character-builder');
  
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