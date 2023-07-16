<form class="" action="<?= esc_url(home_url('/')) ?>">
    <input class="theme-input" name="s" type="search" placeholder="Type to search" aria-label="Search" value="<?= get_search_query() ?>">
    <button class="search-submit" type="submit">Recherche</button>
</form>