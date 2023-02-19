<div class="footer animated">
	<!-- Copyright -->
	<p class="copyright">&copy; <?php echo date("Y"); ?> Loot & Waifus</p>

	<!-- Menu footer -->
	<div class="navbar">
		<?php
			$args = array( 'theme_location' => 'footer' );
			wp_nav_menu( $args );
		?>
	</div>
</div>

</div>

<!-- Load the Twitch embed JavaScript file -->
<script src="https://embed.twitch.tv/embed/v1.js"></script>

<!-- Create a Twitch.Embed object that will render within the "twitch-embed" element -->
<script type="text/javascript">
	new Twitch.Embed("twitch-embed", {
		autoplay: true,
		allowfullscreen: true,
		chat: false,
		theme: 'dark',
		muted: true,
		width: '100%',
		height: 480,
		channel: "sefhi_922",
	});
</script>

<?php wp_footer(); ?>

</body>
</html>