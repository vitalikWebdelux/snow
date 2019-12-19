<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tehnodim
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/mobile-menu');?>
	<header>
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="header__logo col">
						<a href="#">
							<img src="<?php echo SD_THEME_IMAGE_URI; ?>/logo.png" alt="logo">
						</a>
					</div>
					<div class="header__partner col">
						<img src="<?php echo SD_THEME_IMAGE_URI; ?>/partners.png" alt="partners">
					</div>
					<div class="header__loc col">
						<a href="#">м. Івано-Франківськ,<br>  вул. Довженка 21б</a>
					</div>
					<div class="header__contacts col">
						<a href="#">Безкоштовні дзвінки <br><span> 0 800 303 309</span> </a>
					</div>

					<?php 
					$td_instagram = carbon_get_theme_option( 'td_instagram' );
					$td_facebook = carbon_get_theme_option( 'td_facebook' );
					if( !empty($td_instagram) || !empty($td_facebook) ) : ?>
						<div class="header__soc col">
							<?php if( !empty($td_facebook) ) : ?>	
									<a href="<?php echo esc_url($td_facebook); ?>" class='facebook-icon'></a>
							<?php endif; ?>

							<?php if( !empty($td_instagram) ) : ?>
									<a href="<?php echo esc_url($td_instagram); ?>" class='inst-icon'></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				
			</div>
			<div class="hamburger">
				<svg height="32px" 
					id="Layer_1" 
					style="enable-background:new 0 0 32 32;" 
					version="1.1" viewBox="0 0 32 32" width="32px" 
					xml:space="preserve" xmlns="http://www.w3.org/2000/svg" 
					xmlns:xlink="http://www.w3.org/1999/xlink">
					<path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"></path></svg>
			</div>
		</div>
	</header>
	<div class="header__menu">
		<div class="container">
			<div class="nav-menu">
				<nav class='top-menu'>
					<?php
						if( has_nav_menu( 'main_menu' ) ) {
							wp_nav_menu(array(
								'menu' => 'main_menu',
								'menu_class' => 'main-menu',
								'theme_location' => 'main_menu',
								'container' => 'ul',
							));
						}						
					?>
					<!-- <ul class=' main-menu'>
						<li>
							<a href="#">Головна</a>
						</li>
						<li class='menu-item-has-children'>
							<a href="#">Каталог продукції</a>

							<ul class="sub-menu">
								<li>
									<a href="#">Гаражні ворота </a>
								</li>
								<li>
									<a href="#">В'їзні ворота</a>
								</li>
								<li>
									<a href="#">Автоматика до воріт</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Про компанію </a>
						</li>
						<li>
							<a href="#">Партнерам</a>
						</li>
						<li>
							<a href="#"> Сервіс</a>
						</li>
						<li>
							<a href="#">Новини</a>
						</li>
						<li>
							<a href="#">Контакти</a>
						</li>
					</ul>	 -->
				</nav>
				<div class="top-lang">
					<div class="lang-switcher">
						<div class="lang-switcher__current">UA</div>
						<ul id='menu-lang'>
							<li class='lang-item'>
								<a href="#">
									UA
								</a>
							</li>
							<li class='lang-item'>
								<a href="#">
									RU
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<main class="td-main">
		