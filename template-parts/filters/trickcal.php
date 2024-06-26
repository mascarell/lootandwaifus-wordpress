<div class="filters">
  <!-- Rarity filter -->
  <div class="custom-select">
    <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
      <span class="selected-value">All rarities</span>
      <span class="arrow"></span>
    </button>
    <ul class="select-dropdown" role="listbox">
      <li role="option">
        <input type="radio" id="" name="social-account" checked />
        <label for="rarities">All rarities</label>
      </li>
      <li role="option">
        <input type="radio" id="ssr" name="social-account" />
        <label for="ssr">3*</label>
      </li>
      <li role="option">
        <input type="radio" id="sr" name="social-account" />
        <label for="sr">2*</label>
      </li>
      <li role="option">
        <input type="radio" id="r" name="social-account" />
        <label for="sr">1*</label>
      </li>
    </ul>
  </div>
  
  <!-- Position filter -->
  <div class="custom-select">
    <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
      <span class="selected-value">All positions</span>
      <span class="arrow"></span>
    </button>
    <ul class="select-dropdown" role="listbox">
      <li role="option">
        <input type="radio" id="" name="social-account" checked />
        <label for="position">All positions</label>
      </li>
      <li role="option">
        <input type="radio" id="front-row" name="social-account" />
        <label for="front-row">Front row</label>
      </li>
      <li role="option">
        <input type="radio" id="middle-row" name="social-account" />
        <label for="middle-row">Middle row</label>
      </li>
      <li role="option">
        <input type="radio" id="back-row" name="social-account" />
        <label for="back-row">Back row</label>
      </li>
    </ul>
  </div>
  
  <!-- Damage type filter -->
  <div class="custom-select">
    <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
      <span class="selected-value">All damage types</span>
      <span class="arrow"></span>
    </button>
    <ul class="select-dropdown" role="listbox">
      <li role="option">
        <input type="radio" id="" name="social-account" checked />
        <label for="position">All damage types</label>
      </li>
      <li role="option">
        <input type="radio" id="magical-damage" name="social-account" />
        <label for="magical-damage">Magical Damage</label>
      </li>
      <li role="option">
        <input type="radio" id="physical-damage" name="social-account" />
        <label for="physical-damage">Physical Damage</label>
      </li>
    </ul>
  </div>
  
  <!-- Element filter -->
  <div class="custom-select">
    <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
      <span class="selected-value">Element</span>
      <span class="arrow"></span>
    </button>
    <ul class="select-dropdown" role="listbox">
      <li role="option">
        <input type="radio" id="" name="social-account" checked />
        <label for="weapons">All elements</label>
      </li>
      <li role="option">
        <input type="radio" id="fire" name="social-account" />
        <label for="fire">Fire</label>
      </li>
      <li role="option">
        <input type="radio" id="dark" name="social-account" />
        <label for="dark">Dark</label>
      </li>
      <li role="option">
        <input type="radio" id="water" name="social-account" />
        <label for="water">Water</label>
      </li>
      <li role="option">
        <input type="radio" id="plant" name="social-account" />
        <label for="plant">Plant</label>
      </li>
      <li role="option">
        <input type="radio" id="light" name="social-account" />
        <label for="light">Light</label>
      </li>
    </ul>
  </div>

  <button class="filters-button advanced-filters" style="display:none;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" width="24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Advanced filters
  </button>

  <button class="reset-filters">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b72a2a" width="24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    Reset filters
  </button>
</div>