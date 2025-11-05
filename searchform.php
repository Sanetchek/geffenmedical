<div id="search_popup" class="search__popup">
  <form action="/" method="get" id="search_form" class="search__form">
    <span id="search_close" class="search__close">&times</span>
    <label for="search" class="search__label">
      <input type="text" name="s" id="search" class="search__input" value="<?php the_search_query(); ?>"
        placeholder="<?php _e('חיפוש בגפן מדיקל ', 'geffen') ?>" />
    </label>
    <button class="search__btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
        <path
          d="M13.5 13.399C14.7372 12.1364 15.5 10.4073 15.5 8.5C15.5 4.63401 12.366 1.5 8.5 1.5C4.63401 1.5 1.5 4.63401 1.5 8.5C1.5 12.366 4.63401 15.5 8.5 15.5C10.4587 15.5 12.2295 14.6955 13.5 13.399ZM13.5 13.399L16.5 16.5"
          stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </button>
  </form>
</div>