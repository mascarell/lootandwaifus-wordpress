<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="robots" content="index,follow,noodp"><!-- All Search Engines -->
	<meta name="googlebot" content="index,follow"><!-- Google Specific -->

	<meta content="website" property="og:type" />
	<meta property="og:title" content="Loot & Waifus" key="ecritorio-title-og" />
	<meta content="en_EN" property="og:locale" />
	<meta content="Loot & Waifus" property="og:site_name" />

  <!-- Lozad -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

  <!-- AdSense -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9374214313904321" crossorigin="anonymous"></script>

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-HXWCG1EYHV"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-HXWCG1EYHV');
  </script>

	<!-- Particle.js -->
	<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

  <!-- Remix icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.css" crossorigin="">
  
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?> >

<div class="separator"></div>

<header class="header">
    <div class="header__container">
      <div class="header__toggle" id="header-toggle">
        <i class="ri-menu-line"></i>
      </div>

      <div class="twitch-live">
        <?php echo do_shortcode('[sw-twitch layout="status" autoplay="1"]'); ?>
      </div>

      <div class="social-button">
        <a href="https://discord.gg/rdCkPuPkDq" class="play discord" target="_blank" rel="noopener noreferrer">
          <i class="ri-discord-fill"></i>
          <span>Discord</span>
        </a>
      </div>
    </div>
</header>

<?php get_template_part('template-parts/global-sidebar'); ?>

<main class="main" id="main">

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


<!-- NIKKE GODDES OF VICTORY MENU -->
<?php if($category_id == 'nikke') { ?>
  <a href="https://www.youtube.com/@lootandwaifus/videos" class="play big animated" target="_blank" rel="noopener noreferrer">
    <i class="ri-youtube-fill"></i>
    <span>Daily Gacha Videos</span>
  </a>
<!-- Brown Dust 2 menu -->
<?php } else if($category_id == 'trickcal-revive') { ?>
  <a href="https://www.youtube.com/@lootandwaifus/videos" class="play big animated" target="_blank" rel="noopener noreferrer">
    <i class="ri-youtube-fill"></i>
    <span>Daily Gacha Videos</span>
  </a>
<!-- No game -->
<?php } else { ?>
<?php } ?>
