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
				<p><em>To change chapters, use the layers button</em> on the top right of the map.</p>
				<p>	Also, yes. Right now there's only a couple chapters because I have to to this manually, if you wanna know when I update the map, you can follow me on <a href="https://twitter.com/sefhi_" target="_blank" rel="noopener noreferrer">Twitter</a></p>
			</div>

			<div id="map" class="map"></div>

			<div class="article-content">
				<p>
					Sources for the maps: 
					<a href="https://www.artstation.com/redgrapes" target="_blank" rel="noopener noreferrer">Jang Sumin</a> 
					<a href="https://twitter.com/a___ajt/status/1614519409191817217" target="_blank" rel="noopener noreferrer">キュウビ ajt</a> 
					<a href="https://nikke.gg" target="_blank" rel="noopener noreferrer">nikke.gg</a> 
				</p>
			</div>

			<script type="text/javascript">
				let map = L.map('map', {
					crs: L.CRS.Simple,
					minZoom: -1,
					maxZoom: 1
				}).fitBounds([[0, 0], [1074, 1920]]);

				let chapters = [];
				for (let i = 1; i <= 20; i++) {
					chapters[i] = L.layerGroup();
					if (i === 1) chapters[i].addTo(map);

					let baseImageUrl = `<?php echo get_theme_file_uri('images/maps/1.webp'); ?>`
					// Define the regular expression pattern to match a number
					const numberPattern = /\d+(\.\d+)?/;
					// replace chapter 1 on base url with current chapter
					const imageUrl = baseImageUrl.replace(numberPattern, i);

					L.imageOverlay(imageUrl, [[0, 0], [1074, 1920]]).addTo(chapters[i]);
				}

				let markerIcon = L.icon({
					iconUrl: '<?php echo get_theme_file_uri('images/marker.png'); ?>',
					iconSize: [50, 50],
					iconAnchor: [22, 28],
					popupAnchor: [-0, -25]
				});

				function xy(x, y) {
					return Array.isArray(x) ? L.latLng(x[1], x[0]) : L.latLng(y, x);
				}

				let customOptions = {
					maxWidth: '200',
					minWidth: '200',
					className: 'custom'
				};

				// ONLY FOR DEVELOPMENT, click to add marker
				// map.on("click", function(e){
				// 	let position = xy(e.latlng.lng, e.latlng.lat);
				// 	let mp = new L.Marker(position, {icon: markerIcon}).addTo(map);
				// 	console.log(`[${position.lng}, ${position.lat}]`);
				// });

				// full list of lost relics, the biggest part of the code, sadly with wordpress can't really have this somewhere else without breaking my head on the wall
				// format => [chapter number, coordinates, popup content]
				const normalLostRelics = [
					// chapter 1
					[1, [686, 610.65625], 'Commander Recruitment Announcement – Outline for Round 1 of Recruitment'],
					[1, [1057, 815.65625], 'Commander Recruitment Announcement – Outline for Round 2 of Recruitment'],
					[1, [821, 969.65625], 'Commander Recruitment Announcement – Outline for Round 3 of Recruitment'],

					// chapter 2
					[2, [1330, 570.65625], 'Gems x100'],
					[2, [1155, 647.65625], 'A Man’s Memoir – February 7, XX'],
					[2, [1105, 968.65625], '11:05 AM'],
					[2, [584, 800.65625], 'A Man’s Memoir – December 5, XX'],
					[2, [643, 985.65625], 'A Man’s Memoir- August 21, XX'],

					// chapter 3
					[3, [752.25, 426.265625], 'Observatory Blueprint'],
					[3, [1172.75, 305.765625], 'The Godness Fall – After World'],
					[3, [1069.25, 541.765625], 'Police Station Blueprint'],
					[3, [748, 669.03125], '200x Credits'],
					[3, [477.8479630731981, 748.0127212979629], 'Hotel Blueprint'],
					[3, [1125, 816.53125], 'Maid Cafe Blueprint'],
					[3, [1251.5, 854.03125], '400x Credits'],
					[3, [832.5, 903.53125], 'Toy Store Blueprint'],
					[3, [909.25, 985.265625], 'Risk – Wandering Soul'],
					[3, [379, 906.53125], 'Train Station Blueprint'],
				
					// chapter 4
					[4, [791, 173.53125], 'Chat Log_Early Adopter.txt – 08:05 PM'],
					[4, [1486, 496.03125], '500x Credits'],
					[4, [1228, 627.03125], 'Workshop Blueprint'],
					[4, [1165.5, 829.03125], 'Chat Log_Early Adopter.txt – 12:01 AM'],
					[4, [1128.5, 940.03125], 'Chat Log_Early Adopter.txt – 09:55 AM'],
					[4, [996, 946.53125], 'Good Day Commander- After World'],
					[4, [945, 915.03125], 'Generator Blueprint'],
					[4, [1007.5, 780.03125], 'Floral Tribute – Wandering Soul'],
					[4, [694.53125, 915], 'Armory Blueprint'],
					[4, [801.03125, 627.5], 'Incoming rapture – Wandering Soul'],
					[4, [625.5, 530.53125], 'Chat Log_Early Adopter.txt – 05:37 PM'],

					// chapter 5
					[5, [973, 413.53125], 'Trendy Bar Blueprint'],
					[5, [1072, 576.03125], 'Call Log 017515 – 2:01 PM'],
					[5, [1445, 614.03125], 'x50 Gems'],
					[5, [1294, 772.03125], 'Second Hand – Wonderland'],
					[5, [813.0001658952062, 763.0312902170197], 'Library Blueprint'],
					[5, [483.5, 733.53125], 'Survival Guide 01 – 3. How to sleep'],
					[5, [617, 829.03125], 'Silver mane – Wonderland'],
					[5, [695, 856.03125], 'Hospital Blueprint'],
					[5, [837.5, 913.53125], 'Nikke Subject Recruitment – Outline for Round 2 of Recruitment'],
					[5, [927.5, 921.03125], 'The Ark – After World'],
					[5, [1189, 872.53125], 'Call Log 017515 – 4:17 PM'],

					// chapter 6
					[6, [781.5, 364.03125], 'Call Log 017515 – 03:42 pm'],
					[6, [1124.5, 484.53125], 'Cafe Blueprint'],
					[6, [984.5, 640.53125], 'Frost Pillar – White Snow'],
					[6, [825, 754.53125], 'x1000 Credits'],
					[6, [623, 873.03125], 'Survival Guide 01 – 5. How to keep Your Humanity'],
					[6, [706.5, 892.53125], 'Theater Blueprint'],
					[6, [1064, 818.03125], 'Labyrinth – White Snow'],
					[6, [1148, 863.53125], 'Seedy Club Blueprint'],
					[6, [990.5, 939.53125], 'Survival Guide 01 – 1. How to Avoid Raptures'],
					[6, [1245.5, 680.03125], 'ShowCase – After World'],
					[6, [1456.5, 587.53125], 'Call Log 07515 – 6:08 PM'],

					// chapter 7
					[7, [929, 518.03125], 'Call Log 028594 – 10:01 AM'],
					[7, [1292.5, 533.53125], 'Courthouse Blueprint'],
					[7, [874, 660.53125], 'Survival Guide 01 – 2. How to Secure Food'],
					[7, [687.5, 746.03125], 'Nikke Subject Recruitment – Outline for Round 1 of Recruitment'],
					[7, [1030, 979.03125], 'Church Blueprint'],
					[7, [869, 933.53125], 'Survival Guide 01 – 4. How to Deal With Strangers'],
					[7, [787.5, 819.03125], 'Below zero [Scenario Ver. ] – White Snow'],
					[7, [597.5, 941.03125], 'Artificial Shangri-La – After World'],
					[7, [411, 884.53125], 'x50 Gems'],
					[7, [857, 1034.53125], 'Scardi [Inst Ver. ] – White Snow'],
					[7, [926, 1034.03125], 'x2200 Credits'],

					// chapter 8
					[8, [664, 382.390625], 'A Girl’s Memoir – July 23, XX at 3:00 PM (Rainy)'],
					[8, [971, 662.390625], 'The Ruined City – Hand on Hand'],
					[8, [854, 288.890625], 'Clothing Store Blueprint'],
					[8, [747.5, 619.890625], 'Nikke Subject Recruitment – Outline for Round 3 of Recruitment'],
					[8, [948.5, 869.390625], 'Shopping Mall Blueprint'],
					[8, [635.7920417311494, 905.9365552177957], 'Chromosome – After World'],
					[8, [753.5, 883.890625], 'A Girl’s Memoir – July 25, XX (sunny)'],
					[8, [1165.5, 796.890625], 'x1600 Credits'],
					[8, [1032, 1001.890625], 'A Poster Against Nikke Experiments – 1'],
					[8, [1107, 655.890625], 'The Clue – Hand on Hand'],
					[8, [1179, 339.890625], 'A Girl’s Memoir – July 26, XX (Sunny)'],
					[8, [1371, 406.390625], 'x3200 Credits'],

					// chapter 9
					[9, [574, 824.890625], 'Pamphlet – 3. Self-Defense Training'],
					[9, [717, 843.890625], 'A Girl’s Memoir – July 24, XX (Cloudy)'],
					[9, [988.5, 929.390625], 'Radio Tower Blueprint'],
					[9, [916.5, 814.390625], 'A Poster Against Nikke Experiments – 2'],
					[9, [963, 789.390625], 'x2000 Credits'],
					[9, [1077, 813.890625], 'Heart Destroyer – Hand on Handd'],
					[9, [1095, 643.390625], 'x50 gems'],
					[9, [1035, 664.890625], 'Goddess of Victory Blueprint'],
					[9, [710.5, 484.390625], 'A Girl’s Memoir – July 27, XX (Cloudy)'],
					[9, [792, 409.890625], 'STANDALONE – Hand on Hand'],
					[9, [1385.5, 520.890625], 'Standin’ by'],
					[9, [1263.5, 618.390625], 'A Poster Against Nikke Experiments – 3'],

					// chapter 10
					[10, [705.5, 846.390625], 'Call log 028594 – 02:49 PM'],
					[10, [774, 812.390625], 'AREA : H – Two Top'],
					[10, [940, 948.390625], 'Wings of Victory Blueprint'],
					[10, [882.5, 864.890625], 'x2500 Credits'],
					[10, [974, 965.390625], 'Letters from Girlfriend – To J,'],
					[10, [763, 779.890625], 'Khamsin – Two Top'],
					[10, [1090.5, 903.890625], 'Fitness Club Blueprint'],
					[10, [1001.5, 563.390625], 'x2500 Credits'],
					[10, [1217, 419.390625], 'letters from a girlfriend – To J,'],
					[10, [1060, 853.890625], 'letters from a girlfriend – To J,'],
					[10, [1267, 762.390625], 'Take my Money!! – After World'],
					[10, [1299.5, 483.890625], 'Call log 028594 – 11:39 AM'],

					// chapter 11
					[11, [990, 504.390625], 'Languor – Folk Tales'],
					[11, [1346.5, 491.390625], 'Goddess Squad Report – A'],
					[11, [1010, 664.390625], 'Pamphlet – 1. Delivery Service'],
					[11, [1266.5, 790.890625], 'Blurred Vision – Two Top'],
					[11, [1109, 827.890625], 'Goddess Squad Report – B'],
					[11, [1071.5, 955.890625], 'Splinter – Two Top'],
					[11, [1442.9999984857745, 702.3906265142255], 'Letters From Girlfriend – To J,'],
					[11, [968.5, 858.890625], 'x50 gems –'],
					[11, [880, 902.390625], 'Pamphlet – 4. Tour Packages'],
					[11, [647.5, 744.890625], 'Goddess Squad Report – E'],
					[11, [744, 766.890625], 'Maze in Abyss – Lost Sector'],
					[11, [807.5, 558.890625], 'x3200 Credits'],
					[11, [838, 940.890625], 'Orange Pop – Folk Tales'],

					// chapter 12
					[12, [1066.5, 915.390625], 'Champions Match – After World'],
					[12, [1224.5, 877.390625], 'Pamphlet – Real Estate Trading'],
					[12, [1429, 846.890625], 'Ground Fall – Red, Eye, Smile'],
					[12, [1484.5, 725.890625], 'Doomsday Book- Mankind’s Last Moments'],
					[12, [1650, 647.390625], 'x4200 Credits'],
					[12, [1514, 496.390625], 'Goddess Squad Report – C'],
					[12, [1060, 763.390625], 'Doomsday Book- An Apostle is Born'],
					[12, [928.5, 658.390625], 'Ground Zero – Red, Eye, Smile'],
					[12, [544, 492.390625], 'x4200 Credits'],
					[12, [823, 292.390625], 'Hey- Newbie – Red, Eye, Smile'],
					[12, [1477.5, 191.890625], 'Doomsday Book- Prayer for Descent'],
					[12, [1365.5, 360.390625], 'One- Winged Dark Lord – Red, Eye, Smile'],
					[12, [970.5, 500.390625], 'Goddess Squad Report – D'],

					// chapter 13
					[13, [888.5, 391.390625], 'Ark Lottery Ticket – 1'],
					[13, [827, 315.890625], 'The Calm Before the Storm- Sand Storm'],
					[13, [609, 563.390625], 'Ark Lottery Ticket – 2'],
					[13, [875, 579.390625], 'x5000 Credits'],
					[13, [1021.5, 541.890625], 'Dust Rider – Sand Storm'],
					[13, [686, 676.890625], 'Sunday In the Ark – Folk Tale'],
					[13, [779.5, 790.890625], 'x50 gems'],
					[13, [738.5, 855.890625], 'Letters From Girlfriend – To J,'],
					[13, [944.5, 771.390625], 'Mobile_Telecom Fraud_Ads_Collection.zip – Shares_Ad'],
					[13, [974, 818.890625], 'Back and Forth – Lost Sector'],
					[13, [1126, 702.390625], 'Ark Lottery Ticket – 3'],
					[13, [1316, 622.890625], 'Break Away – Folk Tale'],
					[13, [1301.5, 872.390625], 'Ark Lottery Ticket – 4'],
					[13, [1341.5000002977265, 508.3906404817777], 'Mobile_Telecom Fraud_Ads_Collection.zip – Ark_Raffle Ticket_AD'],

					// chapter 14
					[14, [1167.0394024253535, 989.4891982321882], 'UFO Collection. Zip – Alien Sighting'],
					[14, [1074.0394024253535, 871.9891982321882], 'XX High School Letters to Parents – School Letter No. XXXX-123'],
					[14, [1200.75, 694.4375], 'Enemy Close – Living Land'],
					[14, [1421.6627467586973, 618.9919332147576], 'UFO collection.zip – Gargantuan Alien Sighting'],
					[14, [892.25, 858.9375], 'Labyrinth of Void – Lost Sector'],
					[14, [288.75, 398.4375], 'x6000 Credits'],
					[14, [369.25, 542.4375], 'WE ARE- Living Land'],
					[14, [959.25, 601.9375], 'x12000 Credits'],
					[14, [825.25, 387.9375], 'Audio Portion of a Streamer’s live stream BJ_01.mp4'],
					[14, [1101.75, 224.9375], 'Recognition distorted – Living Land'],
					[14, [1564.0796641546658, 296.8302261733942], 'Mobile_Telecom Fraud_Ads_Collection.Zip – Funds_Ad'],
					[14, [1595.0796641546658, 500.8302261733942], 'Recognition [ Scenario Ver.] – Living Land'],
					[14, [1534.2409964117342, 934.374088567218], 'UFO Collection.zip – The Nuclear Solution'],
					[14, [1596.7409964117342, 754.874088567218], 'XX High School Letters to Parents – School letter No. XXXX-124'],

					// chapter 15
					[15, [748.25, 96.9375], 'Tragedy – Folk Tale'],
					[15, [967.25, 310.4375], 'XX High School Letters to Parents – School Letter No. XXXX-125'],
					[15, [1245.0873201845734, 368.8330771455031], 'Risk [Scenario Ver. ] Wandering Soul'],
					[15, [1211.25, 510.4375], 'Audio Portion of a Streamer’s Live Stream – BJ_02.MP4'],
					[15, [1076.2499979251193, 737.9374836973658], 'A Playlist from Old Times – Just Once More.wav'],
					[15, [1362.7499979251193, 552.9374836973658], 'x50 gems'],
					[15, [999.75, 897.9375], 'Bullet Storm Retriggered – Living Land'],
					[15, [832.75, 920.9375], 'Audio Portion of a Streamer’s Live Stream – BJ_03.mp4'],
					[15, [654.25, 801.9375], 'Mobile_Telecom_Frauds_Ads_Collection.zip – Loan_Ad'],
					[15, [615.25, 632.9375], 'In Ark – Living Land'],
					[15, [660.25, 355.9375], 'x7000 Credits'],
					[15, [771.25, 201.4375], 'Chromosome Another Side – After World'],
					[15, [837.75, 658.4375], 'Playlist from the Old Times – Caught in the Rapture'],
					[15, [951.25, 769.4375], 'Playlist from the Old Times – Welcome to the Ark'],

					// chapter 16
					[16, [1126.25, 274.9375], 'Storm Breakers – Folk Tale'],
					[16, [1271.25, 452.4375], 'Enterprise-Rapture Conspiracy Theory – National Security Email'],
					[16, [1200.75, 592.4375], 'x8000 Credits'],
					[16, [1200.75, 795.4375], 'Second Hand [Scenario Ver.]”.'],
					[16, [898.75, 628.9375], 'Shopping Lists – Second Daughter’s birthday'],
					[16, [600.75, 691.9375], 'In Wonderland – Wonderland'],
					[16, [466.25, 569.9375], 'Shopping Lists – Thursday'],
					[16, [786.25, 386.4375], 'Enterprise-Rapture Conspiracy Theory – National Security Email Hard evidence of enterprises producing Raptures!'],
					[16, [829.7499999776066, 912.9374999324828], 'Impression – Lost Tales'],
					[16, [939.7499999776066, 936.4374999324828], 'Shopping Lists – Tuesday Prepare Emergency Supplies'],
					[16, [1093.7499999776066, 891.4374999324828], 'x16000 Credits'],
					[16, [1188.2499999776066, 970.9374999324828], 'Shopping Lists – Monday Last XX Mart Remains'],
					[16, [1320.25, 890.9375], 'Marry Bad – Lost Tales'],
					[16, [1554.25, 882.4375], 'Enterprise Rapture Conspiracy Theory – National Security Email The Ark is just another hell!'],
				];

				for (const [chapter, coords, popupContent] of normalLostRelics) {
					L.marker(xy(coords), { icon: markerIcon }).addTo(chapters[chapter]).bindPopup(popupContent, customOptions);
				}

				let chapterNames = ["Chapter 1", "Chapter 2", "Chapter 3", "Chapter 4", "Chapter 5", "Chapter 6", "Chapter 7", "Chapter 8","Chapter 9", "Chapter 10", "Chapter 11", "Chapter 12", "Chapter 13", "Chapter 14", "Chapter 15", "Chapter 16"];
				let chapterLayers = Object.fromEntries(chapterNames.map((name, i) => [name, chapters[i + 1]]));

				L.control.layers(chapterLayers).addTo(map);

				map.setView([500, 1000], 0);
			</script>
		</div>
	</div>

	<?php get_template_part('template-parts/sidebar'); ?>
</div>

<?php

get_footer();

?>