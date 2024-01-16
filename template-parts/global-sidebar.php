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

          <a href="<?php echo home_url(); ?>/nikke-events/" class="sidebar__link">
              <i class="ri-calendar-event-line"></i>
              <span class="sidebar__link-name">Events</span>
              <span class="sidebar__link-floating">Events</span>
          </a>
        </div>
      <!-- GIRLS FRONTLINE 2 EXILIUM MENU -->
      <?php } else if($category_id == 'girls-frontline-2-exilium') { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
        </div>

        <h3 class="sidebar__title">
          <span>GFL2</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/girls-frontline-2/" class="sidebar__link">
              <i class="ri-book-open-line"></i>
              <span class="sidebar__link-name">Guides</span>
              <span class="sidebar__link-floating">Guides</span>
          </a>
          
          <!-- <a href="<?php echo home_url(); ?>/nikke-pve-tier-list" class="sidebar__link">
              <i class="ri-line-chart-line"></i>
              <span class="sidebar__link-name">Tier list</span>
              <span class="sidebar__link-floating">Tier list</span>
          </a> -->

          <!-- <a href="<?php echo home_url(); ?>/nikke-characters/" class="sidebar__link">
              <i class="ri-group-line"></i>
              <span class="sidebar__link-name">Characters</span>
              <span class="sidebar__link-floating">Characters</span>
          </a> -->
        </div>

        <!-- <h3 class="sidebar__title">
          <span>Tools</span>
        </h3>

        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/nikke-team-randomizer" class="sidebar__link">
              <i class="ri-dice-2-line"></i>
              <span class="sidebar__link-name">Team Randomizer</span>
              <span class="sidebar__link-floating">Team Randomizer</span>
          </a>

          <a href="<?php echo home_url(); ?>/nikke-team-builder/" class="sidebar__link">
              <i class="ri-lightbulb-flash-line"></i>
              <span class="sidebar__link-name">Team builder</span>
              <span class="sidebar__link-floating">Team builder</span>
          </a>
        </div> -->
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
      <!-- No game menu -->
      <?php } else { ?>
        <div class="sidebar__list">
          <a href="<?php echo home_url(); ?>/" class="sidebar__link">
              <i class="ri-home-5-line"></i>
              <span class="sidebar__link-name">Home</span>
              <span class="sidebar__link-floating">Home</span>
          </a>
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
          
          <a href="<?php echo home_url(); ?>/brown-dust-2" class="sidebar__link">
              <i class="ri-sword-line"></i>
              <span class="sidebar__link-name">Brown Dust 2</span>
              <span class="sidebar__link-floating">Brown Dust 2</span>
          </a>

          <a href="<?php echo home_url(); ?>/girls-frontline-2" class="sidebar__link">
              <svg height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25.489 25.489" xml:space="preserve">
                <g>
                  <path style="fill:#fff;" d="M0.293,22.117l2.329,2.757c0,0,0.822,1.163,1.413,0.291c0.591-0.87,4.134-8.052,4.134-8.052
                    s0.355-0.586,0.604,0.461s2.294,6.113,2.294,6.113s0.309,0.427,0.68,0.112c0.372-0.312,1.86-1.567,1.86-1.567
                    s0.502-0.159-0.018-1.151c-0.521-0.995-2.43-5.521-2.43-5.521s-0.279-0.58,0.125-0.92c0.403-0.339,0.924-0.728,0.924-0.728
                    s0.232-0.479,0.871,0.026c0.638,0.504,2.468,2.357,5.287,3.054c2.818,0.699,5.285,0.793,5.285,0.793s0.604,0.022,0.689-1.009
                    c0.088-1.026,0.037-2.47,0.037-2.47s0.058-0.688-0.547-0.708c-0.603-0.021-1.627,0.209-2.918-0.189
                    c-1.291-0.396-4.208-2.53-4.208-2.53s-0.468-0.367-0.034-0.735c0.434-0.366,3.471-2.928,3.471-2.928s0.521-0.389,0.207-0.761
                    c-0.313-0.371-0.47-0.557-0.47-0.557l5.516-4.658L24.346,0L18.83,4.656l-0.453-0.409c0,0-0.403-0.351-0.744-0.063
                    c-0.34,0.284-3.9,3.236-3.9,3.236s-1.003-1.061-1.746-0.434s-5.266,4.449-5.266,4.449s-0.197,0.271-0.042,0.83
                    c0.154,0.561,0.437,0.957,0.158,1.193c-0.278,0.234-1.735,1.465-1.735,1.465s-0.407,0.397-0.356,1.151
                    c0.052,0.752-0.364,1.578-1.169,2.26c-0.804,0.68-3.125,2.586-3.125,2.586S-0.229,21.497,0.293,22.117z"/>
                  <path style="fill:#fff;" d="M21.174,3.157c0,0-1.847-2.189-2.171-2.571c-0.324-0.384-1.266-0.722-1.381,0.625
                    c-0.129,1.551-0.273,3.638-0.273,3.638l1.611,0.053c0,0-0.079-0.855-0.195-1.284c-0.146-0.534,0.107-0.796,0.396-0.452
                    c0.289,0.339,0.832,0.979,0.832,0.979L21.174,3.157z"/>
                  <path style="fill:#fff;" d="M11.204,16.285c0,0,0.512-0.432,0.921-0.777c0.409-0.345,0.805-1.12,0.464-2.146
                    c-0.34-1.025,1,0.147,1,0.147s0.703,1.612-0.496,2.623c-1.204,1.019-1.736,1.423-1.736,1.423L11.204,16.285z"/>
                </g>
              </svg>
              <span class="sidebar__link-name">Girl's Frontline 2</span>
              <span class="sidebar__link-floating">GFL2</span>
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
      <!-- Shows on all menus -->
        <!-- <a href="https://www.ldplayer.net/?n=39386997#utm_source=aff&utm_medium=aff&utm_campaign=aff39386997" class="play" target="_blank" rel="noopener noreferrer">
          <img src="<?php echo get_theme_file_uri('images/ldplayer.webp'); ?>" alt="ldplayer logo">
          <span>Play gachas on PC</span>
        </a> -->
    </div>
  </nav>
</div>
