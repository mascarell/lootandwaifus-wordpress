// Menu & overlay functionality
(function ($) {
  // Animations
  const items = [...document.querySelectorAll('.animated')];

  for (let i = 0; i < items.length; i++) {
    setTimeout(function () {
      items[i].classList.add('active');
    }, 50 * (i + 1));
  }

  // Lozad
  const observer = lozad(); // lazy loads elements with default selector as '.lozad'
  observer.observe();

	// Open and close menu
	document.querySelector('.b-menu').addEventListener('click', () => {
		document.querySelector('.overlay-menu').classList.toggle('open');
	});
})(jQuery);

// Event chart
(function ($) {
	try {
		$(document).ready(function () {
			// Basic variables to get all the containers from the events
			const chartContainer = document.querySelector('.chart-events');
			const chartContent = document.querySelector('.chart-container');
			const chartParent = document.querySelector('.chart-parent');
			const showAllEventsButton = document.querySelector('.show-more');

			// Show all events button
			showAllEventsButton.addEventListener('click', () => {
				chartParent.classList.add('open');
			});

			// scroll on the chart container
			chartContainer.addEventListener('wheel', (e) => {
				e.preventDefault(); // prevent the default mousewheel behavior
				chartContainer.scrollLeft += e.deltaY; // scroll horizontally based on the deltaY value
			});
			
			// Get the current date
			let today = new Date();
			// Get the date from 14 days ago and 14 days after for the chart
			let chartStartDate = new Date(today.getTime() - (14 * 24 * 60 * 60 * 1000));
			let chartStartDateReference = new Date(today.getTime() - (14 * 24 * 60 * 60 * 1000)); // date start just as reference
			let chartEndDate = new Date(today.getTime() + (14 * 24 * 60 * 60 * 1000));

			// Create the chart header with dates
			let $header = $('<div class="chart-header"></div>');
			let currentDate = chartStartDate;
			while (currentDate <= chartEndDate) {
				// Abbreviated day of the week so we can display it above the day
				let weekday = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'][new Date(currentDate).getDay()]
				
				if (new Date(currentDate).setHours(0, 0, 0, 0) == new Date(today).setHours(0, 0, 0, 0)) {
					$header.append(`
						<div class="chart-header-item current">
						<span>${weekday}</span>
						${currentDate.getDate()}
						</div>
					`);
					currentDate.setDate(currentDate.getDate() + 1);
				} else {
					$header.append(`
						<div class="chart-header-item">
						<span>${weekday}</span>
						${currentDate.getDate()}
						</div>
					`);
					currentDate.setDate(currentDate.getDate() + 1);
				}
			}
			$('.chart-dates').append($header);

			// Position the chart bars based on start and end dates
			$('.chart-bar').each(function () {
				let startDate = new Date($(this).attr('data-start-date'));
				let endDate = new Date($(this).attr('data-end-date'));

				// to avoid events going off the chart on the right side, we check when they end
				// if it's later than the end of the chart date, we use that one instead
				let finalEndDate = endDate > chartEndDate ? chartEndDate : endDate

				// Get the width of each date header element
				let headerItems = document.querySelectorAll(".chart-header-item");
				let headerItemWidthPx = headerItems[0].offsetWidth;
				let eventWidth = Math.round((finalEndDate.getTime() - startDate.getTime()) / (24 * 60 * 60 * 1000) * headerItemWidthPx);

				if (startDate < chartStartDateReference) { // event is negative, all the way to the left
					const diffTime = Math.abs(chartStartDateReference - startDate); // get the absolute difference in milliseconds
					const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // convert the difference to days and round up
	
					$(this).css({
						'width': eventWidth,
						'margin-left': -(diffDays * headerItemWidthPx) + headerItemWidthPx 
					});
				} else { // event is fully in the chart
					const diffTime = Math.abs(chartStartDateReference - startDate); // get the absolute difference in milliseconds
					const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // convert the difference to days and round up
	
					$(this).css({
						'width': eventWidth,
						'margin-left': (diffDays * headerItemWidthPx)
					});
				}
			});
		});

		window.onload = function () {
			document.querySelector('.chart-events').scrollTo({
				top: 0,
				left: 425,
				behavior: "smooth",
			});
		}
	} catch (error) {
		console.error(error)
	}
})(jQuery);

// Filter characters
(function ($) {
	try {
		// character list
		const characters = [...document.querySelectorAll('.characters.filtered .character')];
		const input = document.querySelector('input[type="search"]');

		input.addEventListener('input', () => {
			for (let i = 0; i < characters.length; i++) {
				let characterName = characters[i].dataset.characterName.toLowerCase();
				let characterValue = characterName.includes(input.value) ? true : false;

				if (characterValue) { // character can be searched
					characters[i].classList.remove('hidden');
				} else { // character can't be searched
					characters[i].classList.add('hidden');
				}
			}
		});
	} catch (error) {
	}
})(jQuery);

// Scroll while dragging things
// no idea how it works xd https://stackoverflow.com/questions/18809678/make-html5-draggable-items-scroll-the-page
(function ($) {
	try {
		var stop = true;
		$(".filtered .character.builder").on("drag", function (e) {

			stop = true;

			if (e.originalEvent.clientY < 150) {
				stop = false;
				scroll(-1)
			}

			if (e.originalEvent.clientY > ($(window).height() - 150)) {
				stop = false;
				scroll(1)
			}

		});

		$(".filtered .character.builder").on("dragend", function (e) {
			stop = true;
		});

		var scroll = function (step) {
			var scrollY = $(window).scrollTop();
			$(window).scrollTop(scrollY + step);
			if (!stop) {
				setTimeout(function () { scroll(step) }, 20);
			}
		}	
	} catch (error) {
	}
})(jQuery);

// TEAM BUILDER FOR NIKKE
(function ($) {
	try {
		// disable default draover on document
		document.addEventListener("dragover", function (event) {
			event.preventDefault();
		});

		// Get parameters
		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);

		// If there were units preselected, you can't toggle them
		const activeTeam = urlParams.has('units') ? true : false;

		// variables to control team builder settings and selected units
		let units = urlParams.has('units') ? urlParams.get('units') : '';
		let team1 = urlParams.has('team1') ? urlParams.get('team1') : '';
		// we transform those into arrays
		let unitsArray = units.split(',');
		let team1Array = team1.split(',');

		// character list
		const characters = [...document.querySelectorAll('.filtered .character.builder')];
		const team1Characters = [...document.querySelectorAll('.teams .characters .character')];
		let charactersId = [];
		let team1Id = [];

		// variables related to drag and drop
		let draggedElement;

		// on page load, select units if we have the url parameter
		if (urlParams.has('units')) {
			characters.forEach(character => {
				let id = character.dataset.characterId; // id of the character

				if (unitsArray[0] !== '') {
					if (unitsArray.indexOf(id) !== -1) { // If the unit is on the url parameters
						charactersId.push(id);
						character.classList.toggle('selected');
					} else { // if we don't have the unit, we just hide it so people only see what we have
						character.classList.add('unavailable');
					}
				}
			});
		}
		// on page load, add units to your team if we have the url parameter
		if (urlParams.has('team1')) {
			try {
				// remove duplicates of same unit to avoid problems
				let uniqueCharacters = [...new Set(team1Array)];
				let selectedCharacters = [];

				// add characters on the url to a tmp variable "selectedCharacters" so we bypass innerHTML not giving us duplicates
				for (let character = 0; character < team1Array.length; character++) {
					if (team1Array[character] != '0') {
						let element = document.querySelector(`[data-character-id='${team1Array[character]}']`);
						selectedCharacters.push(element);
					} else {
						selectedCharacters.push('');
					}
				}

				// Update units we have on the url to show on our squads
				for (let character = 0; character < team1Array.length; character++) {
					if (team1Array[character] != '0') {
						team1Characters[character].innerHTML = selectedCharacters[character].innerHTML;
					}
				}
			} catch (error) { }

			// update images
			const observer = lozad(); // lazy loads elements with default selector as '.lozad'
			observer.observe();
		}

		// select and deselect units on click
		characters.forEach(character => {
			if (!activeTeam) {
				character.addEventListener('click', e => {
					character.classList.toggle('selected');
					let id = character.dataset.characterId;

					// Update arrays of units
					charactersId.indexOf(id) === -1 ? charactersId.push(id) : charactersId.splice(charactersId.indexOf(id), 1);

					// Update the url
					changeURL();
				});
			}
		});

		// event listener so we can toggle teams 1 to 3 visible
		let teamSwitch = [...document.querySelectorAll('.team-switch span')];
		teamSwitch.forEach(switchs => {
			switchs.addEventListener('click', (e) => {
				// array with all the characters
				let team = [...document.querySelectorAll('.teams .characters > .character')];
				let teamButtons = [...document.querySelectorAll('.team-switch span')];

				// show teams from 1 to 3
				switch (e.target.className.split(" ")[0]) {
					case 'team1':
						// show current active team
						for (let i = 0; i < team.length; i++) {
							let character = team[i]
							character.classList.contains('team1') ? character.classList.remove('notSelected') : character.classList.add('notSelected')
						}
						// show current active team button
						for (let i = 0; i < teamButtons.length; i++) {
							teamButtons[i].classList.contains('team1') ? teamButtons[i].classList.add('active') : teamButtons[i].classList.remove('active');
						}
						break;
					case 'team2':
						// show current active team
						for (let i = 0; i < team.length; i++) {
							let character = team[i]
							character.classList.contains('team2') ? character.classList.remove('notSelected') : character.classList.add('notSelected')
						}
						// show current active team button
						for (let i = 0; i < teamButtons.length; i++) {
							teamButtons[i].classList.contains('team2') ? teamButtons[i].classList.add('active') : teamButtons[i].classList.remove('active');
						}
						break;
					case 'team3':
						// show current active team
						for (let i = 0; i < team.length; i++) {
							let character = team[i]
							character.classList.contains('team3') ? character.classList.remove('notSelected') : character.classList.add('notSelected')
						}
						// show current active team button
						for (let i = 0; i < teamButtons.length; i++) {
							teamButtons[i].classList.contains('team3') ? teamButtons[i].classList.add('active') : teamButtons[i].classList.remove('active');
						}
						break;
					default:
						console.log(e.target.classList.value)
						break;
				}
			});
		});

		// event listener for every character so we can drag them
		characters.forEach(character => {
			character.addEventListener('dragstart', e => {
				draggedElement = e.target.innerHTML;
			});
		});
		// drop over
		team1Characters.forEach(character => {
			character.addEventListener('drop', e => {
				e.target.outerHTML = draggedElement;
				updateTeam1Array();
				changeURL();
			});
		});

		// Changing url it's going to be better on it's own function just in case
		function changeURL() {
			if (history.pushState) {
				// Make sure the parameter is not empty
				let units = charactersId.length ? `units=${charactersId.join(',')}` : ''
				let team1 = team1Id.length ? `&team1=${team1Id.join(',')}` : '&team1='

				let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + units + team1;
				window.history.pushState({ path: newurl }, '', newurl);
			}
		}

		function updateTeam1Array() {
			let ids = []; // tmp variable for ids of the team 1

			team1Characters.forEach(character => {
				// Update arrays of units
				let id = character.querySelector('.margin').dataset.characterId;

				id != null ? ids.push(character.querySelector('.margin').dataset.characterId) : ids.push('0');
			});

			team1Id = ids;
		}
	} catch (error) {
	}
})(jQuery);