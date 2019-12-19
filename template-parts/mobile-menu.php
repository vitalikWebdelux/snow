<div class="td-close-side"></div>
<div class="td-mobile-nav">
	<div class="td-mobile-nav__logo">
		<div class="lang-switcher">
			<div class="lang-switcher__current">UA</div>
			<ul id='mob-menu-lang'>
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

		<img src="<?php echo SD_THEME_IMAGE_URI; ?>/logo.png" alt="">
		
	</div>
	
	<div class="td-mobile-nav__menu">
		<?php
			if( has_nav_menu( 'main_menu' ) ) {
				wp_nav_menu(array(
					'menu' => 'main_menu',
					'menu_class' =>  'mobile-main-menu',
					'theme_location' => 'main_menu',
					'container' => 'ul',
				));
			}						
		?>
		<!-- <ul class=' mobile-main-menu'>
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
		</ul> -->
	</div>
	<div class="td-mobile-nav__loc">
		<div class="header__loc">
			<a href="#">м. Івано-Франківськ,<br>  вул. Довженка 21б</a>
		</div>
	</div>
	
</div>