<?php /* Template Name: Partners */ ?>

<?php get_header() ?>

    <h1 class="margin-left"><?= the_title() ?></h1>
    <section class="our-partners">
        <?php get_template_part('template-parts/partners-list') ?>
    </section>

<?php get_footer() ?>