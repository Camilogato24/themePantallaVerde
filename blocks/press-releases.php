<?php 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'Bloque de boletines de prensa',
            'title'             => __('Bloque de boletines de prensa'),
            'description'       => __('Bloque de boletines de prensa'),
            'render_callback'   => 'cf_press_releases',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}
function cf_press_releases( $block ) 
{ 
    $fondo = get_field('imagen_principal');
    $titulo = get_field('titulo_para_manual');
    $boletinFile = get_field('boletin_de_prensa');
    $tituloNewsletter = get_field('titulonewsletter');
    $imagenAliados = get_field('imagenaliados');
    ?>
    <section class="press-releases">
        <div class="press-releases__hero" style="background-image: url(<?php echo $fondo; ?>);">
        </div>
        <div class="press-releases__files">
            <p>
                <?php echo $titulo ?>
            </p>
            <a href="<?php $boletinFile ?>" download="<?php echo $titulo ?>" class="btn btn-secondary bigger">Obtener archivos</a>
        </div>
        <div class="press-releases__title">
            <h2>
                Boletines de prensa
            </h2>
        </div>
        <div class="press-releases__list">
            <div class="container">
                <ul class="press-releases__list__items">
                    <?php 
                    $args = array
                    (
                        'post_type' => 'boletines',
                        'post_status' => 'publish',
                        'posts_per_page' => 12, 
                    );
    
                    $news_posts = new WP_Query($args);
                    while($news_posts->have_posts()) : $news_posts->the_post(); ?>
                        <li id="post-<?php the_ID(); ?>" class="item <?php $i = 0; foreach((get_the_category()) as $category) { if($i == 0) { echo eliminar_acentos(strtolower(preg_replace('/\s+/', '', $category->cat_name))) . ''; } $i++; } ?>">                        
                            <a href="<?php the_permalink(); ?>"> 
                                <div class="press-releases__list__items__hero">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="">
                                </div>
                                <div class="press-releases__list__items__title">
                                    <h4>
                                    <?php the_title(); ?>
                                    </h4>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); // reset the query ?>
            </div>
        </div>
        <div class="press-releases__newsletter">
            <div class="footer__top">
            <div class="footer__top__container">
                <div class="footer__top__container__title">
                    <h4>
                        <?php echo $tituloNewsletter ?>
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
        </div>
        <div class="press-releases__aliados">
            <div class="press-releases__aliados__titulo">
                <h2>
                    Aliados
                </h2>
            </div>
            <div class="press-releases__aliados__imagen">
                <div class="container">
                    <img src="<?php echo $imagenAliados ?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <script>
        const allItems = Array.from(document.querySelectorAll('.item'));
        const items = document.getElementsByClassName('selectorItem');
        for (let index = 0; index < items.length; index++) {
            const element = items[index];
            element.addEventListener("click", function(){
                setVisibility(element.value);
            }, false);
        }
        function setVisibility(s) {
            console.log("sisas", s)

            allItems.map(function (el) {
                if ( (" " + el.classList + " ").replace(/[\n\t]/g, " ").indexOf(s) > -1 ) {
                el.style.display = 'block';
                } else {
                el.style.display = 'none';
                }
            });
        }
    </script>
    <?php
    }
?>