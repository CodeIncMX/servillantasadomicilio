<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package servillantasadomicilio
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
<div id="page" class="site">

	<div class="modal-container">
		<div class="modal-content"></div>
	</div>	


		<header id="masthead" class="site-header container">
		<nav id="menu" class="navbar navbar-expand-lg" role="navigation">
			<div class="site-branding navbar-brand">
				<a href="/">
					<img class="logo" alt="Servillantas Hecdiz">
				</a>
			</div><!-- .site-branding -->

			<button id="headerMenuToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<i class="menu-icon" aria-hidden="true"></i>
				<i class="menu-icon-expand" aria-hidden="true"></i>			
			</button>

			<?php
			wp_nav_menu( array(
				'menu_id'        => 'primary',
				'theme_location' => 'primary',
				'container'		 => 'div',
				'container_id'	 => 'navbarNavDropdown',
				'container_class'=> 'collapse navbar-collapse',
				'menu_id'		 => 'main-menu',
				'menu_class' 	 => 'navbar-nav',
				'depth'			 => 2,
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			) );
			?>
			
		</nav><!-- #menu -->
		<div class="menu-icons hidden">
			<div class="menu-icons-inner">
				<a href="tel:5215512741853"><i class="phone-icon"></i></a>
				<a href="https://wa.me/5215512741853?text=Me%20gustaría%20contarcar%20con%20servillantas%20a%20domicilio"><i class="whatsapp-icon"></i></a>
				<a href="mailto:contacto@hecdiz.com"><i class="mail-icon"></i></a>
				<a href="https://www.facebook.com/servillantashecdiz/"> <i class="facebook-icon"></i></a>
				<a href="https://www.instagram.com/servillantasmx/"> <i class="instagram-icon"></i></a>
			</div>
		</div>
	</header><!-- #masthead -->


	<div id="content" class="site-content">
