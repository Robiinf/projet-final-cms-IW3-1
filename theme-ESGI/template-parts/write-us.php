<section class="write-us">
    <h2 class="margin-title"><?= get_theme_mod('form_title', 'Write us here')?></h2>
    <p class="p26 margin-left"><?= get_theme_mod('form_subtitle', 'Go! Don\'t be shy.')?></p>
    <form action="">
        <input class="theme-input" type="text" placeholder="<?= get_theme_mod('placeholder_subjet', 'Subject')?>">
        <input class="theme-input" type="email" placeholder="<?= get_theme_mod('placeholder_email', 'Email')?>">
        <input class="theme-input" type="text" placeholder="<?= get_theme_mod('placeholder_phone', 'Phone no.')?>">
        <textarea class="theme-input" placeholder="<?= get_theme_mod('placeholder_message', 'Message')?>"></textarea>
        <button><?= get_theme_mod('text_submit_button', 'Submit')?></button>
    </form>
</section>