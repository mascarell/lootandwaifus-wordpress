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
  
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?> >

<div class="separator"></div>

<div class="web">

<?php get_template_part('template-parts/top-menu'); ?>