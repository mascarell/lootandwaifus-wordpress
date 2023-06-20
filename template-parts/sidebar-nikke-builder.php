<div class="sidebar animated">
	<div class="container">
		<h3>How does this work?</h3>

		<ul>
			<li>Select the units that you have</li>
			<li>Share the url on the browser so people can help you build different teams</li>
			<li>People can send you a new url with team suggestions</li>
			<li>No cookies and no account needed</li>
		</ul>
	</div>
	
	<div class="container">
		<h3>Sponsor us</h3>

		<p>Want to sponsor the website and/or our YouTube videos? You can say hello at <a class="email" href="mailto:contact@lootandwaifus.com">contact@lootandwaifus.com</a> and we'll get back to you.</p>
	</div>

	<div class="container">
		<!-- Add a placeholder for the Twitch embed -->
		<div id="twitch-embed"></div>

		<!-- Load the Twitch embed JavaScript file -->
		<script src="https://embed.twitch.tv/embed/v1.js"></script>

		<!-- Create a Twitch.Embed object that will render within the "twitch-embed" element -->
		<script type="text/javascript">
			new Twitch.Embed("twitch-embed", {
				width: '100%',
				height: 480,
				channel: "sefhi_922",
				// Only needed if this page is going to be embedded on other websites
				parent: ["embed.example.com", "othersite.example.com"]
			});
		</script>
	</div>

	<div class="container">
		<a class="patreon" href="https://patreon.com/lootandwaifus" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_theme_file_uri('images/patreon.png'); ?>" loading="lazy" alt="support us on patreon">
		</a>
	</div>
</div>