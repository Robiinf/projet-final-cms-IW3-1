<?php /* Template Name: Services */ ?>

<?php get_header() ?>

    <section>
        <h1 class="wrapper-container"><?= the_title() ?></h1>
        <?php get_template_part('template-parts/services-list') ?>
    </section>

    <section class="service-content">
        <h2 class="wrapper-container"><?= get_theme_mod("service1_title", 'Corp. Parties')?></h2>
        <p class="p26"><?= get_theme_mod("service1_content", 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.')?></p>
    </section>
    <img class="service-img" src="<?= the_post_thumbnail_url() ?>" alt="">

<?php get_footer() ?>