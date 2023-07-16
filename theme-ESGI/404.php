<?php get_header() ?>
<style>
    body{
        background: var(--main-color);
        color:white !important;
    }
    h1,h2,h3,h4,h5,h6,p{
        color: white !important;
    }
    header img{
        filter:invert(1)
    }
    .burger-menu-content img{
        filter: invert(0);
    }
</style>
<main class="page404">
    <h1><?= get_theme_mod('text_404', "404 Error.")?></h1>
    <p class="p26"><?= get_theme_mod('text_404_subtitle', "The page you were looking for couldn't be found. Maybe try a search?")?></p>
    <div class="search">
    <? get_template_part('template-parts/search-form'); ?>
    </div>
    
</main>


<?php get_footer() ?>