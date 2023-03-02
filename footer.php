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

<?php wp_footer(); ?>

</body>
</html>