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
    
          <p>If you want to know more about each character and why they have that rating, you can click on them to read our full reviews.</p>
    
          <p>Any questions you have about our ratings, feel free to join our <a href="https://discord.gg/rdCkPuPkDq" target="_blank" rel="noopener noreferrer">Discord</a> and ask about it.</p>
    
          <p>Remember that this game has a lot of game modes and also plenty of possible team compositions. Just because you see a character on a lower rating doesn’t mean you should not use them ever.</p>
    
          <p><strong>Waifu > meta.</strong></p>
    
          <p><em>Tier 0</em> : The best units of the game. You can place them on almost any team, and they will work out of the box. Some require investment, but most of them will carry you from early game all the way to end game.</p>
    
          <p><em>Tier 0.5</em> : All these units could be Tier 0 if it wasn’t because of heavy investment, specific team compositions or both. They are, of course, units still worth using and investing into.</p>
    
          <p><em>Tier 1</em> : Good units that can fit into a lot of teams, will help you with game progression at any point and the end game modes we currently have.</p>
    
          <p><em>Tier 1.5</em> : Decent units that are usually more niche and used only on specific team compositions or elements, making them lose some value outside that use.</p>
    
          <p><em>Tier 2</em> : Situational units, in most cases they can be ignored for PVE. Sadly a lot of cool units in this tier, please buff them.</p>
          
          <p><em>Tier 3</em> : I don’t think most of the units here are worth investing BUT THEY HAVE SOME USES. They’re not useless units, I just don’t think it’s worth investing unless they’re your waifus.</p>

          <div class="tier-list">
            <!-- TIER 0 UNITS -->
            <div class="row">
              <p class="tier tier-0">Tier 0</p>

              <div class="characters">
                <?php
                  $args = array(
                    'post_type' => 'characters', 
                    'posts_per_page' => -1, // Set the number of posts to display, -1 for all
                    'tag' => 'tier-0',
                  );
                  $query = new WP_Query($args);
                  if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                      get_template_part('template-parts/character');
                    endwhile; wp_reset_postdata();
                  endif; 
                  ?>
              </div>
            </div>

            <!-- TIER 0.5 UNITS -->
            <div class="row">
              <p class="tier tier-1">Tier 0.5</p>
            </div>

            <!-- TIER 1 UNITS -->
            <div class="row">
              <p class="tier tier-2">Tier 1</p>
            </div>

            <!-- TIER 1.5 UNITS -->
            <div class="row">
              <p class="tier tier-3">Tier 1.5</p>
            </div>

            <!-- TIER 2 UNITS -->
            <div class="row">
              <p class="tier tier-4">Tier 2</p>
            </div>

            <!-- TIER 3 UNITS -->
            <div class="row">
              <p class="tier tier-5">Tier 3</p>
            </div>
          </div>
				</div>
		</div>
	</div>
</div>

<?php

get_footer();

?>