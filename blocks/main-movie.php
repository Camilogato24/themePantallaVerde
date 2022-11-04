<?php 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'MainMovie',
            'title'             => __('Bloque de la pelicula principal '),
            'description'       => __('Bloque de la pelicula principal'),
            'render_callback'   => 'cf_mainMovie_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}
function cf_mainMovie_callback( $block ) 
{
    $movie = get_field('choosemovie');
    $post_id = $movie;
    $queried_post = get_post($post_id);
    $title = $queried_post->post_title;
    $content = $queried_post->post_content;

    if( is_user_logged_in() ) {
    ?>
    <section class="hero-home" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post_id); ?>);">
        <a href="<?php echo the_field('url_de_la_pelicula', $post_id) ?>"></a>
        <div class="container">
            <div class="hero-home__summaryContent">
                <div class="hero-home__summaryContent__title">
                    <h1>
                        <?php echo $title; ?>
                    </h1>
                </div>
                <div class="hero-home__summaryContent__text">
                    <div class="hero-home__summaryContent__text__left">
                        <div class="hero-home__summaryContent__text__left__description">
                            <p>
                                <?php echo $content; ?>
                            </p>
                        </div>
                        <div class="hero-home__summaryContent__text__left__btnContent">
                            <a href="<?php echo get_page_link($post_id); ?>" class="btn btn-secondary"> <i class="icon-ico"></i> Ver más</a>
                        </div>
                    </div>
                    <div class="hero-home__summaryContent__text__right">
                        <div class="hero-home__summaryContent__right__item">
                            <strong>
                                Pais
                            </strong>
                            <p>
                                <?php echo the_field('pais', $post_id) ?>
                            </p>
                        </div>
                        <div class="hero-home__summaryContent__right__item">
                            <strong>
                                Director
                            </strong>
                            <p>
                                <?php echo the_field('nombre_del_director', $post_id) ?>
                            </p>
                        </div>
                        <div class="hero-home__summaryContent__right__item">
                            <strong>
                                Año lanzamiento
                            </strong>
                            <p>
                                <?php echo the_field('fecha_de_estreno_de_la_pelicula', $post_id) ?>
                            </p>
                        </div>
                        <div class="hero-home__summaryContent__right__item">
                            <strong>
                                Duración
                            </strong>
                            <p>
                                <?php echo the_field('duracionpelicula', $post_id) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-home__btnPlay">
                <button>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 481 481" style="enable-background:new 0 0 481 481;" xml:space="preserve">
                        <g>
                            <path style="fill:hsla(77, 100%, 56%, 1);" d="M410.6,70.4C365.1,25,304.7,0,240.5,0S115.9,25,70.4,70.4C25,115.9,0,176.3,0,240.5s25,124.6,70.4,170.1
                            C115.8,456,176.2,481,240.5,481s124.6-25,170.1-70.4C456,365.2,481,304.8,481,240.5S456,115.9,410.6,70.4z M240.5,454
                            C122.8,454,27,358.2,27,240.5S122.8,27,240.5,27S454,122.8,454,240.5S358.2,454,240.5,454z"/>
                            <path style="fill:hsla(77, 100%, 56%, 1);" d="M349.2,229.1l-152.6-97.9c-4.2-2.7-9.4-2.9-13.8-0.5c-4.3,2.4-7,6.9-7,11.8v195.7c0,4.9,2.7,9.5,7,11.8
                            c2,1.1,4.3,1.7,6.5,1.7c2.5,0,5.1-0.7,7.3-2.1l152.6-97.9c3.9-2.5,6.2-6.8,6.2-11.4S353,231.6,349.2,229.1z M202.8,313.7V167.3
                            l114.1,73.2L202.8,313.7z"/>
                        </g>
                    </svg>

                </button>
            </div>
        </div>
    </section>
<?php }
}

?>