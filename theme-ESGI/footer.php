        <footer id="site-footer">
			<div class="footer-first">
				<img class="logo-footer" src="<?= get_theme_mod("footer_logo", get_template_directory_uri() . '/assets/images/svg/logo-white.svg')?>" alt="">
                <?php get_template_part('template-parts/contacts-info-footer') ?>
			</div>
            <div class="footer-second">
                <p class="p20"><?= get_theme_mod("footer_copyright", '2022  Figma Template by ESGI')?></p>
                <div class="social">
                    <a href="<?= get_theme_mod("footer_url_linkedin")?>"><img src="<?= get_template_directory_uri() . '/assets/images/svg/linkedin.svg'?>" alt=""></a>
                    <a href="<?= get_theme_mod("footer_url_linkedin")?>"><img src="<?= get_template_directory_uri() . '/assets/images/svg/facebook.svg'?>" alt=""></a>
                </div>
            </div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>