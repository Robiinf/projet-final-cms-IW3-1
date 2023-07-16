<?php get_header() ?>

<main class="page404">
    <h1><?= get_theme_mod('text_404', "404 Error.")?></h1>
    <p class="p26"><?= get_theme_mod('text_404_subtitle', "The page you were looking for couldn't be found. Maybe try a search?")?></p>
    <?= get_search_form() ?>
</main>


<?php get_footer() ?>