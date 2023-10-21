<?php 
	if(is_front_page()) {
		$category_id = '';
	} else {
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$category_id = $categories[0]->slug;
		} else {
			$category_id = '';
		}
	}
?>

<div class="sidebar" id="sidebar">
  <nav class="sidebar__container">
    <div class="sidebar__content">
      <!-- NIKKE GODDES OF VICTORY MENU -->
      <?php if($category_id == 'nikke') { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
          
          <a href="<?php echo home_url(); ?>/nikke/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>
          
          <!-- <a href="#" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a> -->

          <a href="<?php echo home_url(); ?>/nikke-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Tools</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/guides/nikke-interactive-map/" class="sidebar__link">
              <i class="ri-road-map-line"></i>
              <span class="sidebar__link-name">Interactive map</span>
              <span class="sidebar__link-floating">Interactive map</span>
          </a>

          <a href="<?php echo home_url(); ?>/nikke-team-builder/" class="sidebar__link">
              <i class="ri-lightbulb-flash-line"></i>
              <span class="sidebar__link-name">Team builder</span>
              <span class="sidebar__link-floating">Team builder</span>
          </a>

          <a href="<?php echo home_url(); ?>/nikke-events/" class="sidebar__link">
              <i class="ri-calendar-event-line"></i>
              <span class="sidebar__link-name">Events</span>
              <span class="sidebar__link-floating">Events</span>
          </a>
        </div>
      <!-- REVERSE 1999 MENU -->
      <?php } else if($category_id == 'reverse-1999') { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
          
          <a href="<?php echo home_url(); ?>/reverse-1999/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>
          
          <!-- <a href="#" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a> -->

          <a href="<?php echo home_url(); ?>/reverse-1999-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a>
        </div>
      <?php } else { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Games</span>
        </h3>
        
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/nikke" class="sidebar__link">
              <i class="ri-crosshair-2-line"></i>
              <span class="sidebar__link-name">NIKKE</span>
              <span class="sidebar__link-floating">NIKKE</span>
          </a>
          
          <a href="<?php echo home_url(); ?>/reverse-1999" class="sidebar__link">
              <i class="ri-history-line"></i>
              <span class="sidebar__link-name">Reverse: 1999</span>
              <span class="sidebar__link-floating">Reverse: 1999</span>
          </a>
        </div>
      <?php } ?>

        <h3 class="sidebar__title">
          <span>Support us</span>
        </h3>

        <div class="sidebar__list">
          <a href="https://discord.gg/rdCkPuPkDq" class="sidebar__link">
              <i class="ri-discord-line"></i>
              <span class="sidebar__link-name">Discord</span>
              <span class="sidebar__link-floating">Discord</span>
          </a>

          <a href="https://www.patreon.com/lootandwaifus" class="sidebar__link">
              <i class="ri-patreon-line"></i>
              <span class="sidebar__link-name">Patreon</span>
              <span class="sidebar__link-floating">Patreon</span>
          </a>

          <a href="<?php echo home_url(); ?>/supporters/" class="sidebar__link">
              <i class="ri-heart-2-line"></i>
              <span class="sidebar__link-name">Supporters</span>
              <span class="sidebar__link-floating">Supporters</span>
          </a>
        </div>
    </div>
  </nav>
</div>
