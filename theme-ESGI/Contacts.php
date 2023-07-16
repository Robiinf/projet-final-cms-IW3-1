<?php /* Template Name: Contacts */ ?>

<?php get_header() ?>

    <section>
        <h1 class="margin-left"><?= the_title() ?></h1>
        <p class="p26 margin-left"><?= get_theme_mod('contact_content', 'A desire for a big big party or a very select congress ? Contact us.')?></p>
    </section>

    <section>
        <?php get_template_part('template-parts/contacts-info-page') ?>
        <div class="flex-end">
            <img class="contact-thumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
        </div>
    </section>

    <?php get_template_part('template-parts/write-us') ?>

    

<?php get_footer() ?>