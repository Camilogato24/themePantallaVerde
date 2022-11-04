<?php
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'hero',
            'title'             => __('Bloque Principal '),
            'description'       => __('Bloque principal toggle block'),
            'render_callback'   => 'cf_hero_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}

 function cf_hero_callback( $block ) 
{
	$titulo = get_field('titulo');
    $subtitule = get_field('subtitulo');
    $backgroundImage = get_field('fondo');
	
    if( !is_user_logged_in() ) {
    ?>
    <section class="hero" style="background-image: url(<?php echo $backgroundImage; ?>)">
        <div class="container">
            <div class="hero__content">
            <div class="hero__content__title">
                <h2> <?php echo $titulo ?> </h2>
            </div>
            <div class="hero__content__subtitle">
                <p>
                    <?php echo $subtitule ?>
                </p>
            </div>
            <div class="hero__content__login">
                <div class="input-group">
                <input
                    type="email"
                    class="hero__login__group__input"
                    placeholder="Correo Electrónico"
                />
                <button class="btn btn-secondary">
                    <i class="icon-ico"> Ingresar </i>
                </button>
                </div>
            </div>
            </div>
        </div>
    </section>
<?php } }?>