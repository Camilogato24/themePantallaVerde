<?php 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'Login',
            'title'             => __('Bloque de login '),
            'description'       => __('Bloque del login'),
            'render_callback'   => 'cf_login_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}
function cf_login_callback( $block ) 
{
    $backgroundImage = get_field('background');
    if( is_user_logged_in() ) {
        echo "<script type='text/javascript'>";
        echo "window.location.href = '/';";
        echo "</script>";
    } else {
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
                <form method="post" action="<?php bloginfo('url') ?>/wp-login.php">
                    <div class="form-group">
                        <input type="text" name="log" value="" size="20" id="user_login" tabindex="1" class="btn btn-input" placeholder="Usuario"  />
                        <input type="password" class="btn btn-input" placeholder="Contraseña"  name="pwd" value="" size="20" id="user_pass" tabindex="2" />
                    </div>
                    <div class="form-group">
                        <?php do_action('login_form'); ?>
                        <input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                        <input type="hidden" name="user-cookie" value="1" />                        
                    </div>
                </form>
            </div>
            <div class="signup-container__linkOptions">
                <p>
                    Ya tengo cuenta, quiero
                    <a href="#">
                        INICIAR SESIÓN
                    </a>
                </p>
                <p>
                    He olvidado mi contraseña
                    <a href="#">
                        RECUPERAR CONTRASEÑA
                    </a>
                </p>
            </div>
        </div>
    </section>
    <?php 
    }
}

?>