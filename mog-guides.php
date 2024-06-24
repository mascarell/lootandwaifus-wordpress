<?php
/**
 * Template Name: MOG 2.0 page
 * Template Post Type: guides
 */
?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<!-- all the guides -->
<div class="double guides-wrapper animated">
	<div class="news">
    <div class="article container animated">
      <img class="lozad small-thumbnail" data-src="<?php echo the_post_thumbnail_url(); ?>">
					<h1><?php the_title(); ?></h1>

          <!-- Author -->
          <div class="author">
            <div class="info">
              <?php
                $author_id = get_the_author_meta('ID');
                $author_avatar = get_avatar($author_id, 96); // You can change the size (96 in this example) as needed
                echo $author_avatar;
              ?>
              <p><?php the_author(); ?></p>
              <span class="tag">writer</span>
            </div>
            <div class="stats">
              <p>Published on: <?php echo get_the_date(); ?></p>
              <p>Last updated on: <?php echo get_the_modified_date(); ?></p>
            </div>
          </div>
      
      <div class="article-content">
        <?php the_content(); ?>
      </div>
		</div>

		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'mog',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">MOG 2.0 Guides ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
	</div>
</div>

<?php

get_footer();

?>