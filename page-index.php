<?php /* Template Name: Landing page */ ?>

<?php

get_header();

?>

<!-- Hero section -->
<div class="hero animated">
  <h1>Your one-stop shop for in depth gacha games tier lists and guides</h1>
  <p>Loot & Waifus is a community driven wiki for the games we love and care about. Click down below on your favorite game to get started.</p>
</div>

<!-- Games that we cover -->
<div class="games container animated">
	<a href="<?php echo home_url(); ?>/nikke" class="game nikke covering">
		<div>
			<p>Goddess of Victory: Nikke</p>
		</div>
	</a>
	<a class="game reverse covering">
		<div>
			<p>Reverse:1999 (coming soon)</p>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
	<a class="game">
		<div>
		</div>
	</a>
</div>

<?php

get_footer();

?>