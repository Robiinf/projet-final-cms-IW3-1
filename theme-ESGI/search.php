<?php get_header(); ?>

    <main class="container-search">
        <div>
            <h1><?= get_theme_mod('resultat_recherche', "Search results for: ") . get_search_query() ?></h1>
            <div class="article-list">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="article-card">
                    <h4><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h4>    
                    <p class="info-post"><?= get_the_category_list(', ') . ', ' . get_the_date() ?></p>
                    <?= the_excerpt() ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="p26"><?= get_theme_mod('text_case_no_result', "No result.")?></p>
        <?php endif; ?> 
            </div>
        </div>
    </main>
<?php get_footer(); ?>