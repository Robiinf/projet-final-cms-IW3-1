<?php /* Template Name: About Us */ ?>

<?php get_header() ?>

    <section class="intro-section">
        <h1 class="wrapper-container"><?= the_title() ?></h1>
        <?php if(has_post_thumbnail()): ?>
        <img class="intro-thumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
        <?php endif; ?>
    </section>
    <section class="about-us cr">
        <?php get_template_part('template-parts/about-us-component') ?>
    </section>

    <?php get_template_part('template-parts/team-list') ?>



<?php get_footer() ?>