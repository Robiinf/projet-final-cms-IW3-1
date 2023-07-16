<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<header>
			<div>
				<?php
				if(has_custom_logo()){
					the_custom_logo();
				}
				?>
			</div>
			<div>
				<?php
				if(has_nav_menu('main-menu')){
					wp_nav_menu([
						'menu' => 'main-menu',
						'container' => 'nav',
						'container_class' => 'main-menu'
					]);
				}
				?>
			</div>
		</header>