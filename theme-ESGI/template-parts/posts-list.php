<section class="blog-list">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="post-card">
                <img class="post-list-thumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
                <h4><a href="<?= the_permalink()?>"><?= the_title() ?></a></h4>
                <?= the_excerpt() ?>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="p20"><?= get_theme_mod('text_case_no_result', "No result.")?></p>
    <?php endif; ?>

    <div>
       <?php theme_pagination() ?> 
    </div>
</section>

