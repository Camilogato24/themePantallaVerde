<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,600&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if( !is_user_logged_in() ) { ?>
<header class="primary-header">
	<div class="container">
		<div class="primary-header__content">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			<a href="./components/signup.html" class="btn btn-primary"> 
				Iniciar sesión
			</a>
		</div>
		<?php 
			wp_nav_menu( array( 'fallback_cb' => 'custom_primary_menu_fallback', 'menu' => 'menu', 'container' => false, 'menu_id' => 'menu', 'menu_class'=>'', 'theme_location'=>'primary-menu' ) );

			function custom_primary_menu_fallback() {
			  ?>
			  <ul id="menu"><li><a href="/">Home</a></li><li><a href="/wp-admin/nav-menus.php">Set primary menu</a></li></ul>
			  <?php
			}
		?>
	</div>
</header>
<?php } else { ?>
<header class="primary-header">
	<div class="container">
		<div class="primary-header__mainMenu">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			<nav class="primary-header__mainMenu__nav">
			<?php 
				wp_nav_menu( 
					array(	'container' => 'ul', 
					'theme_location' => 'my-custom-menu'							
					)
				); 
			?>
			</nav>
			<div class="primary-header__mainMenu__avatar">
				<a href="#">Usuario Verde</a>
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 273.052 273.052" style="enable-background:new 0 0 273.052 273.052;" xml:space="preserve">
					<g>
						<circle style="fill:hsla(77, 100%, 56%, 1);" cx="138.173" cy="73.52" r="73.52"></circle>
						<path style="fill:hsla(77, 100%, 56%, 1);" d="M126.381,171.369c6.728,3.236,17.65,3.236,24.378,0l67.047-32.243
						c6.734-3.236,13.989-0.082,16.208,7.054l20.032,64.35c2.219,7.136,0.234,17.65-4.433,23.48l-1.137,1.425
						c-3.807,4.759-11.058,8.784-17.661,24.797c-2.85,6.913-10.378,12.82-17.846,12.82H63.043c-7.473,0-14.99-5.901-17.873-12.793
						c-6.679-15.947-14.163-19.776-18.259-24.291l-3.263-3.612c-5.015-5.537-6.995-15.719-4.427-22.735L42.5,145.974
						c2.567-7.016,10.106-10.079,16.839-6.842L126.381,171.369z"></path>
					</g>
				</svg>
			</div>
		</div>
	</div>
</header>
<?php } ?>
<div id="page" class="site">
<div id="content" class="site-content">
