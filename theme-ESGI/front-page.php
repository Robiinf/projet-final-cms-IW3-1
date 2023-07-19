<?php get_header() ?>

<main>

    <section class="intro-section">
        <h1 class="wrapper-container"><?= get_theme_mod("main_title", "A really professional structure for all your events!")?></h1>
        <?php if(has_post_thumbnail()): ?>
        <div class="flex-end">
            <img class="intro-thumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
        </div>
        <?php endif; ?>
    </section>

    <section class="about-us">
        <?php get_template_part('template-parts/about-us-component') ?>
    </section>

    <section class="our-services">
        <h2 class="wrapper-container"><?= get_theme_mod("our_services_title", 'Our Services')?></h2>
        <?php get_template_part('template-parts/services-list') ?>
    </section>
    
    <section class="our-partners wrapper-container">
        <h2 ><?= get_theme_mod("our_partners_title", 'Our Partners')?></h2>
        <?php get_template_part('template-parts/partners-list') ?>
    </section>
    
</main>

<?php get_footer() ?> 