// Lozad lazy loading
(function ($) {
  try {
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
  } catch (error) {
    console.error(error)
  }
})(jQuery);

// animations
(function ($) {
  // Animations
  const items = [...document.querySelectorAll('.animated')];

  for (let i = 0; i < items.length; i++) {
    setTimeout(function () {
      items[i].classList.add('active');
    }, 50 * (i + 1));
  }
})(jQuery);

// sidebar functionality
(function ($) {
  try {
    const showSidebar = (toggleId, sidebarId, mainId) => {
      const toggle = document.getElementById(toggleId),
        sidebar = document.getElementById(sidebarId),
        main = document.getElementById(mainId)

      if (toggle && sidebar && main) {
        toggle.addEventListener('click', () => {
          /* Show sidebar */
          sidebar.classList.toggle('show-sidebar')
          /* Add padding main */
          main.classList.toggle('main-pd')
        })
      }
    }
    showSidebar('header-toggle', 'sidebar', 'main')
  } catch (error) {
    console.error(error)
  }
})(jQuery);

// custom selects and filters in databases
(function ($) {
  try {
    // Get all custom select containers
    const customSelects = document.querySelectorAll(".custom-select");
    let filters = [] // array with all our filters
    let searchFilter = ''
    // todo -> change this input by class or id instead, we have multiple search bars
    const input = document.querySelector('#search');
    // character list
    const characters = [...document.querySelectorAll('.characters.filtered .character')];
    const resetFiltersButton = document.querySelector('.reset-filters')
    const advancedFiltersButton = document.querySelector('.advanced-filters')
    const advancedTags = [...document.querySelectorAll('.tag')];
    const advancedFiltersInput = document.querySelector('#filter');

    customSelects.forEach((customSelect) => {
      const selectBtn = customSelect.querySelector(".select-button");
      const selectedValue = customSelect.querySelector(".selected-value");
      const optionsList = customSelect.querySelectorAll(".select-dropdown li");

      // add click event to select button
      selectBtn.addEventListener("click", (e) => {
        // Close all open selects
        customSelects.forEach((select) => {
          if (select !== customSelect) {
            select.classList.remove("active");
            select.querySelector(".select-button").setAttribute("aria-expanded", "false");
          }
        });

        // Toggle the active class on the current select
        customSelect.classList.toggle("active");
        // Update the aria-expanded attribute based on the current state
        selectBtn.setAttribute(
          "aria-expanded",
          selectBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
        );

        // Prevent the click event from propagating further (e.g., closing the select immediately)
        e.stopPropagation();
      });

      optionsList.forEach((option) => {
        function handler(e) {
          // Click Events
          if (e.type === "click" && e.clientX !== 0 && e.clientY !== 0 && customSelect.classList.contains("active")) {
            selectedValue.textContent = option.textContent;
            customSelect.classList.remove("active");

            // get all values from this select and remove them (if they're present) from the array before we add the new value to the filters array
            const selectOptions = customSelect.querySelectorAll('input')
            const selectOptionsID = Array.from(selectOptions).map(element => element.id);
            
            filters = filters.filter(item => !selectOptionsID.includes(item));

            // Get and print the id attribute of the selected option
            // const id = customSelect.getAttribute("id");
            const id = option.querySelector('input').getAttribute("id");

            if(id != '')
              filters.push(id.toLowerCase())
            
            filterCharacters(filters, characters)
          }
        }

        option.addEventListener("click", handler);
      });
    });

    // Add a global click event to close selects when clicking outside
    document.addEventListener("click", (e) => {
      customSelects.forEach((customSelect) => {
        if (!customSelect.contains(e.target)) {
          customSelect.classList.remove("active");
          customSelect.querySelector(".select-button").setAttribute("aria-expanded", "false");
        }
      });
    });

    // our search bar is the first filter in the array
    input.addEventListener('input', () => {
      searchFilter = input.value.toLowerCase();
      filterCharacters(filters, characters)
    });

    // filter advanced tags
    advancedFiltersInput.addEventListener('input', () => {
      // characterName.includes(searchFilter)
      advancedTags.forEach(tag => {
        if (!tag.textContent.toLowerCase().includes(advancedFiltersInput.value.toLowerCase()))
          tag.classList.add('hidden')
        else
          tag.classList.remove('hidden')
      });
    });

    // advanced filters button toggle on/off
    advancedFiltersButton.addEventListener('click', () => {
      document.querySelector('.character-skills').classList.toggle('active')
    })

    // reset filters button
    resetFiltersButton.addEventListener("click", () => {
      filters = []
      searchFilter = ''
      input.value = ''

      // remove all advanced tags selected
      advancedTags.forEach(tag => {
        tag.classList.remove('active')        
      });
      
      // Iterate through all custom select containers and reset them
      customSelects.forEach((customSelect) => {
        // Reset the selected value text
        const firstOption = customSelect.querySelector('ul li label').textContent
        const selectedValue = customSelect.querySelector(".selected-value")

        selectedValue.textContent = firstOption
      });

      filterCharacters(filters, characters)
    });

    // select and add tags to the filter array
    advancedTags.forEach(tag => {
      tag.addEventListener('click', () => {
        let tagFilter = tag.classList.item(1)
        
        // if the filter is already active, we remove it, if not, we push it to the filters array and update the character list
        const index = filters.indexOf(tagFilter);

        if (index !== -1) {
          // Value exists in the array, so remove it
          filters.splice(index, 1);
          tag.classList.remove('active')      
        } else {
          // Value does not exist in the array, so add it
          filters.push(tagFilter);
          tag.classList.add('active')      
        }

        filterCharacters(filters, characters)
      })
    });

    // filter characters
    function filterCharacters(filters, characters) {
      // if there are filters or we're searching for a character, the reset button should appear
      if (filters.length > 0 || searchFilter)
        resetFiltersButton.classList.add('active')
      else
        resetFiltersButton.classList.remove('active')
      
      for (let i = 0; i < characters.length; i++) {
        const elementClasses = characters[i].querySelector('.bg').classList;
        let characterName = characters[i].querySelector('.bg').classList.item(1);
        let showCharacter = false
        
        // if we have active filters, we give them priority
        if(filters.length > 0) {
          for (const className of filters) {
            // Check if the className exists in the element's classList
            if (!elementClasses.contains(className)) {
              // If any class is missing, the condition is not met
              showCharacter = false
              break; // Exit the loop early
            }
  
            showCharacter = true
  
            // does the search bar includes this character name?
            if (characterName.includes(searchFilter)) {
              showCharacter = true
            } else
              showCharacter = false
          }
        // no filters active, so we first check search bar
        } else {
          if (characterName.includes(searchFilter))
            showCharacter = true
        }

        if (showCharacter)
          characters[i].classList.remove('hidden');
        else
          characters[i].classList.add('hidden');
      }
    }
  } catch (error) {
    console.log('error on custom selects')
  }
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
				left: 300,
				behavior: "smooth",
			});
		}
	} catch (error) {
		console.error(error)
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