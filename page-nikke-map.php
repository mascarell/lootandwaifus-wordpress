<?php /* Template Name: Nikke Interactive map */ ?>

<?php

get_header();

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<div class="double animated">
	<div class="news">
		<div class="article container">
			<div class="article-content">
				<h2>Interactive Nikke map</h2>
				<p><strong>To change chapters, use the layers button</strong> on the top right of the map.</p>
				<p>	Also, yes. Right now there's only a couple chapters because I have to to this manually, if you wanna know when I update the map, you have my Twitter on the sidebar.</p>
			</div>

			<div id="map" class="map"></div>

			<div class="article-content">
				<p>If you find an error in one of the maps, feel free to message me in Discord (Sefhi#9684) or you can find my Twitter on the sidebar.</p>
				<p>
					Sources for the maps: 
					<a href="https://www.artstation.com/redgrapes" target="_blank" rel="noopener noreferrer">Artist Jang Sumin</a> 
					<a href="https://twitter.com/a___ajt/status/1614519409191817217" target="_blank" rel="noopener noreferrer">キュウビ ajt</a> 
					<a href="https://nikke.gg/lost-relics/" target="_blank" rel="noopener noreferrer">nikke.gg map references</a>
				</p>
			</div>

			<script type="text/javascript">
				let map = L.map('map', {
					crs: L.CRS.Simple,
					minZoom: -5
				});
				let bounds = [[0, 0], [1074, 1920]];
				// map adjusted to our size
				map.fitBounds(bounds);

				// Create layers for every chapter
				// ONLY CHAPTER 1 needs to be added to the map on first load
				let chapter1 = L.layerGroup().addTo(map);
				let chapter2 = L.layerGroup();
				let chapter3 = L.layerGroup();

				// Image backgrounds for each layer & chapter
				let chapter1Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map1.webp'); ?>`, bounds).addTo(chapter1);
				let chapter2Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map2.webp'); ?>`, bounds).addTo(chapter2);
				let chapter3Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map3.webp'); ?>`, bounds).addTo(chapter3);

				// custom marker image options
				let markerIcon = L.icon({
					iconUrl: '<?php echo get_theme_file_uri('images/marker.png'); ?>',

					iconSize:     [50, 50], // size of the icon
					iconAnchor:   [22, 28], // point of the icon which will correspond to marker's location
					popupAnchor:  [-0, -25] // point from which the popup should open relative to the iconAnchor
				});

				// function to change latitude and longitude to X and Y coordinates
				let yx = L.latLng;
				let xy = function(x, y) {
					if (Array.isArray(x)) {    // When doing xy([x, y]);
						return yx(x[1], x[0]);
					}
					return yx(y, x);  // When doing xy(x, y);
				};

				// ONLY FOR DEVELOPMENT, click to add marker
				// map.on("click", function(e){
				// 	let position = xy(e.latlng.lng, e.latlng.lat);
				// 	let mp = new L.Marker(position, {icon: markerIcon}).addTo(map);
				// 	console.log(position);
				// });

				// Popups are different for each relic, which sucks but it is what it is
				let customPopup = `Relic name #41 <img src="<?php echo get_theme_file_uri('images/xd.png'); ?>" />`;
				// specify popup options 
				let customOptions = {
					'maxWidth': '200',
					'minWidth': '200',
					'className' : 'custom'
				}

				// Chapter 1 relics
				L.marker(xy(686, 610.65625), {icon: markerIcon}).addTo(chapter1).bindPopup('Commander Recruitment Announcement – Outline for Round 1 of Recruitment',customOptions);
				L.marker(xy(1057, 815.65625), {icon: markerIcon}).addTo(chapter1).bindPopup('Commander Recruitment Announcement – Outline for Round 2 of Recruitment',customOptions);
				L.marker(xy(821, 969.65625), {icon: markerIcon}).addTo(chapter1).bindPopup('Commander Recruitment Announcement – Outline for Round 3 of Recruitment',customOptions);
				// Chapter 2 relics
				L.marker(xy(1330, 570.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('Gems x100',customOptions);
				L.marker(xy(1155, 647.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('A Man’s Memoir – February 7, XX',customOptions);
				L.marker(xy(1105, 968.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('11:05 AM',customOptions);
				L.marker(xy(584, 800.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('A Man’s Memoir – December 5, XX',customOptions);
				L.marker(xy(643, 985.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('A Man’s Memoir- August 21, XX',customOptions);
				// Chapter 3 relics
				L.marker(xy(752.25, 426.265625), {icon: markerIcon}).addTo(chapter3).bindPopup('Observatory Blueprint',customOptions);
				L.marker(xy(1172.75, 305.765625), {icon: markerIcon}).addTo(chapter3).bindPopup('The Godness Fall – After World',customOptions);
				L.marker(xy(1069.25, 541.765625), {icon: markerIcon}).addTo(chapter3).bindPopup('Police Station Blueprint',customOptions);
				L.marker(xy(748, 669.03125), {icon: markerIcon}).addTo(chapter3).bindPopup('200x Credits',customOptions);
				L.marker(xy(477.8479630731981, 748.0127212979629), {icon: markerIcon}).addTo(chapter3).bindPopup('Hotel Blueprint',customOptions);
				L.marker(xy(1125, 816.53125), {icon: markerIcon}).addTo(chapter3).bindPopup('Maid Cafe Blueprint',customOptions);
				L.marker(xy(1251.5, 854.03125), {icon: markerIcon}).addTo(chapter3).bindPopup('400x Credits',customOptions);
				L.marker(xy(832.5, 903.53125), {icon: markerIcon}).addTo(chapter3).bindPopup('Toy Store Blueprint',customOptions);
				L.marker(xy(909.25, 985.265625), {icon: markerIcon}).addTo(chapter3).bindPopup('Risk – Wandering Soul',customOptions);
				L.marker(xy(379, 906.53125), {icon: markerIcon}).addTo(chapter3).bindPopup('Train Station Blueprint',customOptions);

				L.control.layers({
					"Chapter 1": chapter1,
					"Chapter 2": chapter2,
					"Chapter 3": chapter3,
				}).addTo(map);
				
				map.setView( [500, 1000], 0);
			</script>
		</div>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>