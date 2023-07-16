<?php /* Template Name: Contacts */ ?>

<?php get_header() ?>

    <section>
        <h1 class="wrapper-container"><?= the_title() ?></h1>
        <p class="p26 wrapper-container "><?= get_theme_mod('contact_content', 'A desire for a big big party or a very select congress ? Contact us.')?></p>
    </section>

    <section>
        
        <?php get_template_part('template-parts/contacts-info-page') ?>
        <div class="flex-end">
            <img class="contact-thumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
        </div>
    </section>

    <div class="wrapper-container">

        <?php get_template_part('template-parts/write-us') ?>
    </div>

    

<?php get_footer() ?>