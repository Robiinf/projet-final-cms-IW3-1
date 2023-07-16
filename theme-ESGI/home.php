<?php get_header() ?>

    <main>
        <h1 class="blog-title-margin"><?php wp_title(''); ?></h1>
        
        <div class="container">
            <section class="sidebar-blog">
                <?= get_sidebar('blog')?>
            </section>
    
            <?php get_template_part('template-parts/posts-list') ?>
        </div>

    </main>

<?php get_footer() ?> 