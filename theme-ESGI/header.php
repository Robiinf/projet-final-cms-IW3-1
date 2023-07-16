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
		    <div class="burger-menu">
				 <img src="<?=  get_template_directory_uri() . '/assets/images/svg/menu.svg'?>" alt="" onclick="openMenu()"> 
			</div>
			<aside class="burger-menu-content">
				<section class="head">
					<div>
					<?php
					if(has_custom_logo()){
						the_custom_logo();
					}
					?>
					</div>
					<img src="<?=  get_template_directory_uri() . '/assets/images/svg/close.svg'?>" alt="" onclick="closeMenu()">
				</section>
				<b>Or try Search</b>
				<?php
				if(has_nav_menu('main-menu')){
					wp_nav_menu([
						'menu' => 'main-menu',
						'container' => 'nav',
						'container_class' => 'main-menu'
					]);
				}
				?>
			
			</aside>
		</header>
		<script>
			function openMenu(){
				document.querySelector('.burger-menu-content').classList.add('burger-menu-content--active');
			}
			function closeMenu(){
				document.querySelector('.burger-menu-content').classList.remove('burger-menu-content--active');
			}
		</script>