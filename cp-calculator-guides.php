<?php 
/**
 * Template Name: NIKKE CP deficit calculator page
 * Template Post Type: guides
 */
?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<!-- all the guides -->
<div class="double">
	<div class="news">
    <div class="article container animated">
      <div class="article-content">
        <h1><?php the_title(); ?></h1>
        
        <?php the_content(); ?>
    
        <div class="cp-calculator">
          <!-- stage cp -->
          <div class="calculator-block">
            <label for="stage_cp">Stage CP</label>
            <input type="number" class="form-control" id="stage_cp" placeholder="Enter Stage CP">
          </div>
          
          <!-- team cp -->
          <div class="calculator-block">
            <label for="team_cp">Team CP</label>
            <input type="number" class="form-control" id="team_cp" placeholder="Enter Team CP">
          </div>
          
          <!-- results -->
          <div class="cp_defict">CP Deficit: <span id="cp_deficit_value">0</span></div>
          <div class="stat_penalty">Stat Penalty: <span id="stat_penalty_value">0</span></div>
        </div>
      </div>
    </div>
	</div>
</div>

<?php

get_footer();

?>