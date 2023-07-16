<?php

function esgi_custom_search_button($form) {
    $old = '<button class="search-submit" type="submit">Recherche</button>';
    $new = '<button class="search-submit" type="submit"><i class="search-ico"></i></button>';
    $form = str_replace($old, $new, $form);
    return $form;
}
add_filter('get_search_form', 'esgi_custom_search_button');
