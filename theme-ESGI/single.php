<?php get_header(); ?>

    <main>
        <h1 class="wrapper-container"><?= the_title()?></h1>
        <div class="container">
            <aside class="sidebar-blog">
                <?= get_sidebar('blog')?>
            </aside>

            <section class="post">
                <div class="post-content">
                    <img class="post-thumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
                    <p class="info-post"><?= get_the_category_list(', ') . ' - ' . get_the_date() ?></p>
                    <div >
                        <?= the_content() ?>
                    </div>
                    <?= the_tags("<div class='post-tags'>", " ", "</div>") ?>
                </div>
                <div>
                    <h2>Commentaires</h2>
                    <div>
                        <?php if (comments_open() || get_comments_number()) : ?>
                            <?php comments_template(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>

    </main>

<?php get_footer(); ?>