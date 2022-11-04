<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->
        <footer class="footer">
        <?php 
        if( ! is_user_logged_in() ) {
            ?>
            <div class="footer__top">
                <div class="footer__top__container">
                    <div class="footer__top__container__title">
                        <h4>
                            Para acceder al catálogo y todos los contenidos de <strong>PantallaVerde</strong>, basta con <strong>Crear cuenta</strong> o <strong>Iniciar Sesión</strong>
                        </h4>
                    </div>
                    <div class="footer__top__container__login">
                        <div class="hero__content__login">
                            <div class="input-group">
                                <input type="email" class="hero__login__group__input" placeholder="Correo Electrónico">
                                <button class="btn btn-secondary"> <i class="icon-ico"></i> Ingresar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
            <div class="footer__bottom">
                <div class="footer__bottom__container">
                    <div class="footer__bottom__container__item">
                        <?php  $imgFooter = get_template_directory_uri() .'/assets/img/logo-pantallaVerde-gris.svg'; ?>
                        <img src="<?php echo $imgFooter; ?> " alt="">
                    </div>
                    <div class="footer__bottom__container__item">
                        <p>
                            Copyright © 2022 PantallaVerde. Todos los derechos reservados
                        </p>
                    </div>
                    <div class="footer__bottom__container__item">
                        <ul>
                            <li>
                                <p>
                                    QUIÉNES SOMOS
                                </p>
                            </li>
                            <li>
                                <p>
                                    ALIADOS
                                </p>
                            </li>
                            <li>
                                <p>
                                    PRENSA
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
    
	<footer id="colophon" class="site-footer">
		<?php // get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		<div class="site-info">
			<?php // $blog_info = get_bloginfo( 'name' ); ?>
			<?php // if ( ! empty( $blog_info ) ) : ?>
				<!-- <a class="site-name" href="<?php // echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>, -->
			<?php // endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentynineteen' ) ); ?>" class="imprint">
				<?php
				/* translators: %s: WordPress. */
				// printf( __( 'Proudly powered by %s.', 'twentynineteen' ), 'WordPress' );
				?>
			</a>
			<?php
			// if ( function_exists( 'the_privacy_policy_link' ) ) {
				// the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			// }
			?>
			<?php // if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
					<?php
					// wp_nav_menu(
					// 	array(
					// 		'theme_location' => 'footer',
					// 		'menu_class'     => 'footer-menu',
					// 		'depth'          => 1,
					// 	)
					// );
					// ?>
				</nav><!-- .footer-navigation -->
			<?php // endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
