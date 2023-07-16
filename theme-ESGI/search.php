<?php get_header(); ?>

    <main class="container-search">
        <div>
        <h1><?= get_theme_mod('resultat_recherche', "Search results for: ") . get_search_query() ?></h1>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h4><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h4>    
                    <p><?= get_the_category_list(', ') . ', ' . get_the_date() ?></p>
                    <p><?= the_excerpt() ?></p>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="p26"><?= get_theme_mod('text_case_no_result', "No result.")?></p>
        <?php endif; ?> 
        </div>
    </main>
<?php get_footer(); ?>