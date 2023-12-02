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
          <a href="<?php echo home_url(); ?>/nikke-team-randomizer" class="sidebar__link">
              <i class="ri-dice-2-line"></i>
              <span class="sidebar__link-name">Team Randomizer</span>
              <span class="sidebar__link-floating">Team Randomizer</span>
          </a>

          <a href="<?php echo home_url(); ?>/guides/nikke-interactive-map/" class="sidebar__link">
              <i class="ri-road-map-line"></i>
              <span class="sidebar__link-name">Lost Relics</span>
              <span class="sidebar__link-floating">Lost Relics</span>
          </a>

          <a href="<?php echo home_url(); ?>/nikke-team-builder/" class="sidebar__link">
              <i class="ri-lightbulb-flash-line"></i>
              <span class="sidebar__link-name">Team builder</span>
              <span class="sidebar__link-floating">Team builder</span>
          </a>

          <a href="<?php echo home_url(); ?>/nikke-raids/" class="sidebar__link">
              <i class="ri-sword-line"></i>
              <span class="sidebar__link-name">Raids</span>
              <span class="sidebar__link-floating">Raids</span>
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
        </div>

        <h3 class="sidebar__title">
          <span>Reverse: 1999</span>
        </h3>
        
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/reverse-1999/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>
          
          <a href="<?php echo home_url(); ?>/reverse-1999-tier-list/" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a>

          <a href="<?php echo home_url(); ?>/reverse-1999-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a>

          <!-- <a href="<?php echo home_url(); ?>/reverse-1999-characters/" class="sidebar__link">
              <i class="ri-instance-line"></i>
              <span class="sidebar__link-name">Psychubes</span>
              <span class="sidebar__link-floating">Psychubes</span>
          </a>

          <a href="<?php echo home_url(); ?>/reverse-1999-characters/" class="sidebar__link">
              <i class="ri-shirt-line"></i>
              <span class="sidebar__link-name">Skins</span>
              <span class="sidebar__link-floating">Skins</span>
          </a> -->
        </div>

        <!-- <h3 class="sidebar__title">
          <span>Tools</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/reverse-1999-events/" class="sidebar__link">
              <i class="ri-calendar-event-line"></i>
              <span class="sidebar__link-name">Events</span>
              <span class="sidebar__link-floating">Events</span>
          </a>
        </div> -->
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
              <span class="sidebar__link-name">GoV: NIKKE</span>
              <span class="sidebar__link-floating">GoV: NIKKE</span>
          </a>
          
          <!-- <a class="sidebar__link">
              <i class="ri-vip-crown-line"></i>
              <span class="sidebar__link-name">Overlord: KoN</span>
              <span class="sidebar__link-floating">Overlord: KoN</span>
          </a>
          
          <a class="sidebar__link">
              <svg width="24px" height="24px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path fill="#fff" d="M35.143 35.8c-5.796-.14-11.483 2.82-14.575 8.212-4.497 7.84-1.8 17.85 6.026 22.355 4.804 2.767 10.42 2.805 15.086.615l68.558 39.375-29.797 51.957 28.51 16.49c6.374-49.47 27.945-90.184 68.726-119.837l-28.51-16.492-29.63 51.67-68.522-39.352c-.44-5.166-3.31-10.04-8.135-12.818-2.446-1.408-5.103-2.113-7.737-2.176zm153.093 71.632l-37.892.642 251.484 144.74-9.322 16.198-253.45-145.87 19.89 35.135c3.916 1.873 29.888 14.392 59.775 33.858 30.715 20.005 64.022 44.997 74.397 74.703 4.567 2.27 31.488 15.496 69.58 27.764 37.96 12.224 84.088 21.654 119.912 15.58-12.992-35.507-44.6-70.15-74.456-95.995-27.686-23.965-52.14-39.656-59.117-43.998-30.91 5.99-69.19-10.66-101.86-27.53-31.63-16.333-55.295-32.69-58.94-35.228zm-26.992 72.9c5.623 17.433 10.356 39.574 14.51 64.59v77.287h18.687v-42.12c14.672-28.54 40.948-3.137 50.7 53.53v161.003h18.688V335.87c12.62-13.188 27.91 3.7 38.975 32.24v35.175h18.69v-25.707c17.057-20.727 46.446-5.688 59.93 49.102v66.888h18.688v-67.07c17.575-58.125 49.153-84.382 74.394-96.3-38.7 3.766-81.725-6.276-117.537-17.81-42.97-13.838-75.7-30.45-75.7-30.45l-3.72-1.887-1.078-4.027c-5.46-20.368-36.988-48.063-67.95-68.228-18.276-11.905-35.828-21.51-47.276-27.463zm23.854 181.48c-11.643 0-21.08 9.438-21.08 21.08 0 11.644 9.437 21.08 21.08 21.08 11.643 0 21.08-9.436 21.08-21.08 0-11.642-9.437-21.08-21.08-21.08zm283.754 7.53s-21.08 52.667-21.08 64.31 9.437 21.08 21.08 21.08c11.643 0 21.08-9.437 21.08-21.08 0-11.643-21.08-64.31-21.08-64.31zM312.15 426.11c-11.643 0-21.082 9.436-21.082 21.08 0 11.642 9.44 21.08 21.082 21.08 11.643 0 21.08-9.438 21.08-21.08 0-11.644-9.437-21.08-21.08-21.08z"/>
              </svg>
              <span class="sidebar__link-name">Brown Dust 2</span>
              <span class="sidebar__link-floating">Brown Dust 2</span>
          </a> -->
          
          <a href="<?php echo home_url(); ?>/reverse-1999" class="sidebar__link">
              <i class="ri-history-line"></i>
              <span class="sidebar__link-name">Reverse: 1999</span>
              <span class="sidebar__link-floating">Reverse: 1999</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>Support us</span>
        </h3>

        <div class="sidebar__list">          
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

          <a href="https://discord.gg/rdCkPuPkDq" class="sidebar__link">
              <i class="ri-discord-line"></i>
              <span class="sidebar__link-name">Discord</span>
              <span class="sidebar__link-floating">Discord</span>
          </a>
        </div>
      <?php } ?>
        <a href="https://www.ldplayer.net/?n=39386997#utm_source=aff&utm_medium=aff&utm_campaign=aff39386997" class="play" target="_blank" rel="noopener noreferrer">
          <img src="<?php echo get_theme_file_uri('images/ldplayer.webp'); ?>" alt="ldplayer logo">
          <span>Play gachas on PC</span>
        </a>
    </div>
  </nav>
</div>
