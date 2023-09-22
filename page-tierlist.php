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
    
          <p>Welcome to our tier list for <?php echo $category_id; ?>.</p>
    
          <p>This is an overall <strong>PVE tier list</strong>, if you want to know more about each character and why they have that rating, you can click on them to read our full reviews.</p>
    
          <p>Any questions you have about our ratings, feel free to join our <a href="https://discord.gg/rdCkPuPkDq" target="_blank" rel="noopener noreferrer">Discord</a> and ask about it.</p>
    
          <p>Remember that this game has a lot of game modes and also plenty of possible team compositions. Just because you see a character on a lower rating doesn’t mean you should not use them ever.</p>
    
          <p><strong>Waifu > meta.</strong></p>
    
          <p><em>Tier 0</em> : The best units of the game. You can place them on almost any team, and they will work out of the box. Some require investment, but most of them will carry you from early game all the way to end game.</p>
    
          <p><em>Tier 0.5</em> : All these units could be Tier 0 if it wasn’t because of heavy investment, specific team compositions or both. They are, of course, units still worth using and investing into.</p>
    
          <p><em>Tier 1</em> : Good units that can fit into a lot of teams and will help you on the end game modes we currently have.</p>
    
          <p><em>Tier 1.5</em> : Decent units that are usually more niche and used only on specific team compositions or elements, making them lose some value outside that use.</p>
    
          <p><em>Tier 2</em> : I don’t think most of the units here are worth investing BUT THEY HAVE SOME USES. Some for PVP, some for PVE. They’re not useless units, I just don’t think it’s worth investing unless they’re your waifus.</p>
    
          <p><em>Tier 3</em> : Situational units, in most cases they can be ignored for PVE. Sadly a lot of cool units in this tier, please buff them.</p>
				</div>
		</div>
	</div>
</div>

<!-- all the guides -->
<div class="double guides-wrapper animated">
	<div class="news">	
		<?php
			$query = new WP_Query( array(
					'post_type'      => 'guides',
					'posts_per_page' => -1,
					'no_found_rows'  => true,
					'tag'            => 'general',
					'category_name'  => $category_id
			) );
			if ( $query->have_posts() ) :
					?> <h2 class="guides-title">General Guides ➜</h2><div class="guides"> <?php
					while ( $query->have_posts() ) : $query->the_post();

							get_template_part('template-parts/guide');

					endwhile; wp_reset_postdata();
					?> </div> <?php
			endif; 
		?>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>