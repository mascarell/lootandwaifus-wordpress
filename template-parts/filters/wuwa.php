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
        <label for="ssr">SSR</label>
      </li>
      <li role="option">
        <input type="radio" id="sr" name="social-account" />
        <label for="sr">SR</label>
      </li>
    </ul>
  </div>
  
  <!-- Afflatus filter -->
  <div class="custom-select">
    <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
      <span class="selected-value">Weapon type</span>
      <span class="arrow"></span>
    </button>
    <ul class="select-dropdown" role="listbox">
      <li role="option">
        <input type="radio" id="" name="social-account" checked />
        <label for="afflatus">All weapons</label>
      </li>
      <li role="option">
        <input type="radio" id="pistol" name="social-account" />
        <label for="pistol">Pistol</label>
      </li>
      <li role="option">
        <input type="radio" id="sword" name="social-account" />
        <label for="sword">Sword</label>
      </li>
      <li role="option">
        <input type="radio" id="broadblade" name="social-account" />
        <label for="broadblade">Broadblade</label>
      </li>
      <li role="option">
        <input type="radio" id="rectifier" name="social-account" />
        <label for="rectifier">Rectifier</label>
      </li>
      <li role="option">
        <input type="radio" id="gaunlet" name="social-account" />
        <label for="gaunlet">Gaunlet</label>
      </li>
    </ul>
  </div>
  
  <!-- Damage type filter -->
  <div class="custom-select">
    <button class="select-button" role="combobox" aria-labelledby="select button" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-dropdown">
      <span class="selected-value">Damage type</span>
      <span class="arrow"></span>
    </button>
    <ul class="select-dropdown" role="listbox">
      <li role="option">
        <input type="radio" id="" name="social-account" checked />
        <label for="weapons">All damage types</label>
      </li>
      <li role="option">
        <input type="radio" id="aero" name="social-account" />
        <label for="aero">Aero</label>
      </li>
      <li role="option">
        <input type="radio" id="electro" name="social-account" />
        <label for="electro">Electro</label>
      </li>
      <li role="option">
        <input type="radio" id="fusion" name="social-account" />
        <label for="fusion">Fusion</label>
      </li>
      <li role="option">
        <input type="radio" id="glacio" name="social-account" />
        <label for="glacio">Glacio</label>
      </li>
      <li role="option">
        <input type="radio" id="havoc" name="social-account" />
        <label for="havoc">Havoc</label>
      </li>
      <li role="option">
        <input type="radio" id="spectro" name="social-account" />
        <label for="spectro">Spectro</label>
      </li>
    </ul>
  </div>

  <button style="display: none;" class="filters-button advanced-filters">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" width="24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Advanced filters
  </button>

  <?php
  // Filters only for team builder
  // Get the current page ID
  $page_title = get_the_title(); // Get the current page title

  // Check if the current page ID is equal to X
  if ($page_title == 'Wuthering Waves Team Builder' || $page_title == 'Wuthering Waves Random Team Generator') { ?>
    <button id="select-all" class="filters-button">
      <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="24" viewBox="0 0 24 24"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>
      Select all
    </button>

    <button id="remove-all" class="filters-button">
      <svg xmlns="http://www.w3.org/2000/svg"  fill="white" width="20" viewBox="0 0 24 24"><path d="M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z"></path></svg>
      Remove selected
    </button>
  <?php } ?>

  <button class="reset-filters">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b72a2a" width="24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    Reset filters
  </button>
</div>