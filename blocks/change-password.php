<?php 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'changePassword',    
            'title'             => __('Bloque de cambiar contraseña '),
            'description'       => __('Bloque del cambiar contraseña'),
            'render_callback'   => 'cf_pass_change_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recuperar', 'contraseña' ),
         )
      );
   }
}
function cf_pass_change_callback( $block ) 
{
    $backgroundImage = get_field('background');
    ?>
    <section class="signup-container">
        <div class="signup-container__poster" style="background-image: url(<?php echo $backgroundImage; ?>)">
            <img src="../images/logo-pantallaVerde-blanco.svg" alt="">
            <p>
                PantallaVerde © 2022. Todos los derechos reservados
            </p>
        </div>
        <div class="signup-container__form">
            <div class="signup-container__form__title">
                <h1>
                    Iniciar sesion
                </h1>
            </div>
            <div class="signup-container__form__form">
                <form method="post" action="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">
                    <div class="form-group">
                        <input type="text" name="user_login" id="user_login" class="btn btn-input" value="" size="20" autocapitalize="off" autocomplete="username">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms">
                        <div>
                            <label for="terms">
                                He leído y Acepto los Términos y Condiciones dispuestos por la plataforma para su acceso y prestación de servicio.
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="newsletter" id="newsletter">
                        <div>
                            <label for="newsletter">
                                Deseo recibir información acerca de Novedades, estrenos y contenidos exclusivos
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php do_action('login_form'); ?>
                        <input type="submit" name="user-submit" value="<?php _e('Recuperar contraseña'); ?>" tabindex="14" class="user-submit" />
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                        <input type="hidden" name="user-cookie" value="1" />                        
                    </div>
                </form>
            </div>
            <div class="signup-container__linkOptions">
                <p>
                    Ya tengo cuenta, quiero
                    <a href="/login">
                        INICIAR SESIÓN
                    </a>
                </p>
            </div>
        </div>
    </section>
    <?php 
}

?>