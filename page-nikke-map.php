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
				<p>	Also, yes. Right now there's only a couple chapters because I have to to this manually, if you wanna know when I update the map, you can follow me on <a href="https://twitter.com/sefhi_" target="_blank" rel="noopener noreferrer">Twitter</a></p>
			</div>

			<div id="map" class="map"></div>

			<div class="article-content">
				<p>If you find an error in one of the maps, feel free to message me in Discord (Sefhi#9684) or you can follow me on <a href="https://twitter.com/sefhi_" target="_blank" rel="noopener noreferrer">Twitter</a>.</p>
				<p>
					Sources for the maps: 
					<a href="https://www.artstation.com/redgrapes" target="_blank" rel="noopener noreferrer">Artist Jang Sumin</a> 
					<a href="https://twitter.com/a___ajt/status/1614519409191817217" target="_blank" rel="noopener noreferrer">キュウビ ajt</a> 
					<a href="https://nikke.gg" target="_blank" rel="noopener noreferrer">nikke.gg</a> 
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
				let chapter4 = L.layerGroup();
				let chapter5 = L.layerGroup();
				let chapter6 = L.layerGroup();
				let chapter7 = L.layerGroup();

				// Image backgrounds for each layer & chapter
				let chapter1Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map1.webp'); ?>`, bounds).addTo(chapter1);
				let chapter2Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map2.webp'); ?>`, bounds).addTo(chapter2);
				let chapter3Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map3.webp'); ?>`, bounds).addTo(chapter3);
				let chapter4Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map4.webp'); ?>`, bounds).addTo(chapter4);
				let chapter5Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map5.webp'); ?>`, bounds).addTo(chapter5);
				let chapter6Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map6.webp'); ?>`, bounds).addTo(chapter6);
				let chapter7Image = L.imageOverlay(`<?php echo get_theme_file_uri('images/maps/map7.webp'); ?>`, bounds).addTo(chapter7);

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
				// 	console.log(`${position.lng}, ${position.lat}`);
				// });

				// Popups are different for each relic, which sucks but it is what it is
				let customPopup = `Relic name #41 <img src="<?php echo get_theme_file_uri('images/xd.png'); ?>" />`;
				// specify popup options 
				let customOptions = {
					'maxWidth': '200',
					'minWidth': '200',
					'className' : 'custom'
				}

				// All the relics inside {} so I can close all this code in VSCode lmao
				{
					// Chapter 1 normal relics
					L.marker(xy(686, 610.65625), {icon: markerIcon}).addTo(chapter1).bindPopup('Commander Recruitment Announcement – Outline for Round 1 of Recruitment',customOptions);
					L.marker(xy(1057, 815.65625), {icon: markerIcon}).addTo(chapter1).bindPopup('Commander Recruitment Announcement – Outline for Round 2 of Recruitment',customOptions);
					L.marker(xy(821, 969.65625), {icon: markerIcon}).addTo(chapter1).bindPopup('Commander Recruitment Announcement – Outline for Round 3 of Recruitment',customOptions);
					// Chapter 2 normal relics
					L.marker(xy(1330, 570.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('Gems x100',customOptions);
					L.marker(xy(1155, 647.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('A Man’s Memoir – February 7, XX',customOptions);
					L.marker(xy(1105, 968.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('11:05 AM',customOptions);
					L.marker(xy(584, 800.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('A Man’s Memoir – December 5, XX',customOptions);
					L.marker(xy(643, 985.65625), {icon: markerIcon}).addTo(chapter2).bindPopup('A Man’s Memoir- August 21, XX',customOptions);
					// Chapter 3 normal relics
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
					// Chapter 4 normal relics
					L.marker(xy(791, 173.53125), {icon: markerIcon}).addTo(chapter4).bindPopup('Chat Log_Early Adopter.txt – 08:05 PM',customOptions);
					L.marker(xy(1486, 496.03125), {icon: markerIcon}).addTo(chapter4).bindPopup('500x Credits',customOptions);
					L.marker(xy(1228, 627.03125), {icon: markerIcon}).addTo(chapter4).bindPopup('Workshop Blueprint',customOptions);
					L.marker(xy(1165.5, 829.03125), {icon: markerIcon}).addTo(chapter4).bindPopup('Chat Log_Early Adopter.txt – 12:01 AM',customOptions);
					L.marker(xy(1128.5, 940.03125), {icon: markerIcon}).addTo(chapter4).bindPopup('Chat Log_Early Adopter.txt – 09:55 AM',customOptions);
					L.marker(xy(996, 946.53125), {icon: markerIcon}).addTo(chapter4).bindPopup('Good Day Commander- After World',customOptions);
					L.marker(xy(945, 915.03125), {icon: markerIcon}).addTo(chapter4).bindPopup('Generator Blueprint',customOptions);
					L.marker(xy(1007.5, 780.03125), {icon: markerIcon}).addTo(chapter4).bindPopup('Floral Tribute – Wandering Soul',customOptions);
					L.marker(xy(694.53125, 915), {icon: markerIcon}).addTo(chapter4).bindPopup('Armory Blueprint',customOptions);
					L.marker(xy(801.03125, 627.5), {icon: markerIcon}).addTo(chapter4).bindPopup('Incoming rapture – Wandering Soul',customOptions);
					L.marker(xy(625.5, 530.53125), {icon: markerIcon}).addTo(chapter4).bindPopup('Chat Log_Early Adopter.txt – 05:37 PM',customOptions);
					// Chapter 5 normal relics
					L.marker(xy(973, 413.53125), {icon: markerIcon}).addTo(chapter5).bindPopup('Trendy Bar Blueprint',customOptions);
					L.marker(xy(1072, 576.03125), {icon: markerIcon}).addTo(chapter5).bindPopup('Call Log 017515 – 2:01 PM',customOptions);
					L.marker(xy(1445, 614.03125), {icon: markerIcon}).addTo(chapter5).bindPopup('x50 Gems',customOptions);
					L.marker(xy(1294, 772.03125), {icon: markerIcon}).addTo(chapter5).bindPopup('Second Hand – Wonderland',customOptions);
					L.marker(xy(813.0001658952062, 763.0312902170197), {icon: markerIcon}).addTo(chapter5).bindPopup('Library Blueprint',customOptions);
					L.marker(xy(483.5, 733.53125), {icon: markerIcon}).addTo(chapter5).bindPopup('Survival Guide 01 – 3. How to sleep',customOptions);
					L.marker(xy(617, 829.03125), {icon: markerIcon}).addTo(chapter5).bindPopup('Silver mane – Wonderland',customOptions);
					L.marker(xy(695, 856.03125), {icon: markerIcon}).addTo(chapter5).bindPopup('Hospital Blueprint',customOptions);
					L.marker(xy(837.5, 913.53125), {icon: markerIcon}).addTo(chapter5).bindPopup('Nikke Subject Recruitment – Outline for Round 2 of Recruitment',customOptions);
					L.marker(xy(927.5, 921.03125), {icon: markerIcon}).addTo(chapter5).bindPopup('The Ark – After World',customOptions);
					L.marker(xy(1189, 872.53125), {icon: markerIcon}).addTo(chapter5).bindPopup('Call Log 017515 – 4:17 PM',customOptions);
					// Chapter 6 normal relics
					L.marker(xy(781.5, 364.03125), {icon: markerIcon}).addTo(chapter6).bindPopup('Call Log 017515 – 03:42 pm',customOptions);
					L.marker(xy(1124.5, 484.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('Cafe Blueprint',customOptions);
					L.marker(xy(984.5, 640.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('Frost Pillar – White Snow',customOptions);
					L.marker(xy(825, 754.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('x1000 Credits',customOptions);
					L.marker(xy(623, 873.03125), {icon: markerIcon}).addTo(chapter6).bindPopup('Survival Guide 01 – 5. How to keep Your Humanity',customOptions);
					L.marker(xy(706.5, 892.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('Theater Blueprint',customOptions);
					L.marker(xy(1064, 818.03125), {icon: markerIcon}).addTo(chapter6).bindPopup('Labyrinth – White Snow',customOptions);
					L.marker(xy(1148, 863.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('Seedy Club Blueprint',customOptions);
					L.marker(xy(990.5, 939.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('Survival Guide 01 – 1. How to Avoid Raptures',customOptions);
					L.marker(xy(1245.5, 680.03125), {icon: markerIcon}).addTo(chapter6).bindPopup('ShowCase – After World',customOptions);
					L.marker(xy(1456.5, 587.53125), {icon: markerIcon}).addTo(chapter6).bindPopup('Call Log 07515 – 6:08 PM',customOptions);
					// Chapter 7 normal relics
					L.marker(xy(929, 518.03125), {icon: markerIcon}).addTo(chapter7).bindPopup('Call Log 028594 – 10:01 AM',customOptions);
					L.marker(xy(1292.5, 533.53125), {icon: markerIcon}).addTo(chapter7).bindPopup('Courthouse Blueprint',customOptions);
					L.marker(xy(874, 660.53125), {icon: markerIcon}).addTo(chapter7).bindPopup('Survival Guide 01 – 2. How to Secure Food',customOptions);
					L.marker(xy(687.5, 746.03125), {icon: markerIcon}).addTo(chapter7).bindPopup('Nikke Subject Recruitment – Outline for Round 1 of Recruitment',customOptions);
					L.marker(xy(1030, 979.03125), {icon: markerIcon}).addTo(chapter7).bindPopup('Church Blueprint',customOptions);
					L.marker(xy(869, 933.53125), {icon: markerIcon}).addTo(chapter7).bindPopup('Survival Guide 01 – 4. How to Deal With Strangers',customOptions);
					L.marker(xy(787.5, 819.03125), {icon: markerIcon}).addTo(chapter7).bindPopup('Below zero [Scenario Ver. ] – White Snow',customOptions);
					L.marker(xy(597.5, 941.03125), {icon: markerIcon}).addTo(chapter7).bindPopup('Artificial Shangri-La – After World',customOptions);
					L.marker(xy(411, 884.53125), {icon: markerIcon}).addTo(chapter7).bindPopup('x50 Gems',customOptions);
					L.marker(xy(857, 1034.53125), {icon: markerIcon}).addTo(chapter7).bindPopup('Scardi [Inst Ver. ] – White Snow',customOptions);
					L.marker(xy(926, 1034.03125), {icon: markerIcon}).addTo(chapter7).bindPopup('x2200 Credits',customOptions);
				}

				L.control.layers({
					"Chapter 1": chapter1,
					"Chapter 2": chapter2,
					"Chapter 3": chapter3,
					"Chapter 4": chapter4,
					"Chapter 5": chapter5,
					"Chapter 6": chapter6,
					"Chapter 7": chapter7,
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