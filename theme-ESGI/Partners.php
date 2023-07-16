<?php /* Template Name: Partners */ ?>

<?php get_header() ?>
    <div class="wrapper-container">
        <h1 ><?= the_title() ?></h1>
        <section class="our-partners">
            <?php get_template_part('template-parts/partners-list') ?>
        </section>
    </div>

<?php get_footer() ?>