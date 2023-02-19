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
})(jQuery);

// Filter characters
(function ($) {
  // character list
  const characters = [...document.querySelectorAll('.character')];
	const input = document.querySelector('input[type="search"]');

	input.addEventListener('input', () => {
		for (let i = 0; i < characters.length; i++) {
			let characterName = characters[i].dataset.characterName.toLowerCase();
			let characterValue = characterName.includes(input.value) ? true : false;

			if(characterValue) { // character can be searched
				characters[i].classList.remove('hidden');
			} else { // character can't be searched
				characters[i].classList.add('hidden');
			}
		}
	});
	
})(jQuery);