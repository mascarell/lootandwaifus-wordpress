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
          
          <!-- <a href="<?php echo home_url(); ?>/blog" class="sidebar__link">
              <i class="ri-file-list-3-line"></i>
              <span class="sidebar__link-name">Blog</span>
              <span class="sidebar__link-floating">Blog</span>
          </a> -->
        </div>

        <h3 class="sidebar__title">
          <span>NIKKE</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/nikke/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>
          
          <a href="<?php echo home_url(); ?>/nikke-pve-tier-list" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a>

          <a href="<?php echo home_url(); ?>/nikke-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a>

          <a href="<?php echo home_url(); ?>/guides/nikke-codes/" class="sidebar__link">
              <i class="ri-vip-diamond-line"></i>
              <span class="sidebar__link-name">Free codes</span>
              <span class="sidebar__link-floating">Free codes</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Tools</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/nikke-team-builder/" class="sidebar__link">
              <i class="ri-lightbulb-flash-line"></i>
              <span class="sidebar__link-name">Team builder</span>
              <span class="sidebar__link-floating">Team builder</span>
          </a>

          <a href="<?php echo home_url(); ?>/guides/nikke-interactive-map/" class="sidebar__link">
              <i class="ri-road-map-line"></i>
              <span class="sidebar__link-name">Lost Relics</span>
              <span class="sidebar__link-floating">Lost Relics</span>
          </a>
        </div>
      <!-- Brown Dust 2 menu -->
      <?php } else if($category_id == 'brown-dust-2') { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Brown Dust 2</span>
        </h3>
        
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/brown-dust-2/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>

          <!-- <a href="<?php echo home_url(); ?>/nikke-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a> -->

          <a href="<?php echo home_url(); ?>/guides/brown-dust-2-codes/" class="sidebar__link">
              <i class="ri-vip-diamond-line"></i>
              <span class="sidebar__link-name">Free codes</span>
              <span class="sidebar__link-floating">Free codes</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Tools</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/brown-dust-2-events/" class="sidebar__link">
              <i class="ri-calendar-event-line"></i>
              <span class="sidebar__link-name">Events</span>
              <span class="sidebar__link-floating">Events</span>
          </a>
        </div>
      <!-- Solo Leveling: Arise menu -->
      <?php } else if($category_id == 'solo-leveling-arise') { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>

          <!-- <a href="<?php echo home_url(); ?>/blog" class="sidebar__link">
              <i class="ri-file-list-3-line"></i>
              <span class="sidebar__link-name">Blog</span>
              <span class="sidebar__link-floating">Blog</span>
          </a> -->
        </div>

        <h3 class="sidebar__title">
          <span>Solo Leveling</span>
        </h3>
        
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/solo-leveling-arise/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>

          <a href="<?php echo home_url(); ?>/solo-leveling-arise-tier-list/" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a>

          <a href="<?php echo home_url(); ?>/solo-leveling-arise-weapon-tier-list/" class="sidebar__link">
              <i class="ri-sword-fill"></i>
              <span class="sidebar__link-name">Weapon tier list</span>
              <span class="sidebar__link-floating">Weapon tier list</span>
          </a>

          <a href="<?php echo home_url(); ?>/guides/solo-leveling-arise-codes/" class="sidebar__link">
              <i class="ri-vip-diamond-line"></i>
              <span class="sidebar__link-name">Free codes</span>
              <span class="sidebar__link-floating">Free codes</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Database</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/solo-leveling-arise-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a>

          <a href="<?php echo home_url(); ?>/solo-leveling-arise-weapons/" class="sidebar__link">
              <i class="ri-focus-3-line"></i>
              <span class="sidebar__link-name">Weapons</span>
              <span class="sidebar__link-floating">Weapons</span>
          </a>
        </div>
      <!-- Wuthering Waves menu -->
      <?php } else if($category_id == 'wuthering-waves') { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>WuWa</span>
        </h3>
        
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/wuthering-waves/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>

          <a href="<?php echo home_url(); ?>/wuthering-waves-tier-list/" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a>

          <a href="<?php echo home_url(); ?>/wuthering-waves-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a>
        </div>
      <!-- No game menu -->
      <?php } else { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>

          <!-- <a href="<?php echo home_url(); ?>/blog" class="sidebar__link">
              <i class="ri-file-list-3-line"></i>
              <span class="sidebar__link-name">Blog</span>
              <span class="sidebar__link-floating">Blog</span>
          </a> -->
        </div>

        <h3 class="sidebar__title">
          <span>Gachas</span>
        </h3>
        
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/nikke" class="sidebar__link">
              <i class="ri-crosshair-2-line"></i>
              <span class="sidebar__link-name">GoV: NIKKE</span>
              <span class="sidebar__link-floating">GoV: NIKKE</span>
          </a>
          
          <!-- <a href="<?php echo home_url(); ?>/wuthering-waves/" class="sidebar__link">
              <i class="ri-music-2-line"></i>
              <span class="sidebar__link-name">Wuthering Waves</span>
              <span class="sidebar__link-floating">WuWa</span>
          </a> -->
          
          <a href="<?php echo home_url(); ?>/solo-leveling-arise" class="sidebar__link">
              <i class="ri-sword-line"></i>
              <span class="sidebar__link-name">Solo Leveling: Arise</span>
              <span class="sidebar__link-floating">Solo Leveling</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Community</span>
        </h3>

        <div class="sidebar__list">          
          <a href="<?php echo home_url(); ?>/viewer-pulls" class="sidebar__link">
              <i class="ri-coupon-3-line"></i>
              <span class="sidebar__link-name">Viewer pulls</span>
              <span class="sidebar__link-floating">Viewer pulls</span>
          </a>

          <a href="https://tally.so/r/m6e5aO" class="sidebar__link">
              <i class="ri-verified-badge-line"></i>
              <span class="sidebar__link-name">Account review</span>
              <span class="sidebar__link-floating">Account review</span>
          </a>

          <a href="https://ko-fi.com/sefhi" class="sidebar__link">
              <i class="ri-heart-2-line"></i>
              <span class="sidebar__link-name">Support us</span>
              <span class="sidebar__link-floating">Support us</span>
          </a>

          <!-- <a href="<?php echo home_url(); ?>/supporters/" class="sidebar__link">
              <i class="ri-heart-2-line"></i>
              <span class="sidebar__link-name">Supporters</span>
              <span class="sidebar__link-floating">Supporters</span>
          </a> -->

          <a href="https://discord.gg/rdCkPuPkDq" class="sidebar__link">
              <i class="ri-discord-line"></i>
              <span class="sidebar__link-name">Discord</span>
              <span class="sidebar__link-floating">Discord</span>
          </a>
        </div>
      <?php } ?>
      <!-- Shows on all menus -->
        <a href="https://www.twitch.tv/sefhi_922" class="play twitch" target="_blank" rel="noopener noreferrer">
          <i class="ri-twitch-line"></i>
          <span>Daily streams</span>
        </a>
    </div>
  </nav>
</div>
