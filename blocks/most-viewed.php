<?php 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'Bloque de peliculas mas vistas',
            'title'             => __('Bloque de la pagina de peliculas mas vistas '),
            'description'       => __('Bloque de la pagina de peliculas mas vistas'),
            'render_callback'   => 'cf_most_viewed_movies',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}
function cf_most_viewed_movies( $block ) 
{ 
    ?>
    <section class="list-movies">
        <div class="container">
            <div class="list-movies__content">
                <?php 
                if( have_rows('movies') ):
                    while( have_rows('movies') ) : the_row();
                        $post_id = get_sub_field('movie'); 
                        $movie = get_post($post_id);
                        ?>
                        <div class="list-movies__content__column" id="post-<?php echo $post_id; ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post_id); ?>);">
                            <div class="list-movies__content__column__category">
                                <p>
                                <?php 
                                    $i = 0;
                                    foreach((get_the_category($post_id)) as $category) { if($i == 0) { echo $category->cat_name . ' '; } $i++; } 
                                ?>
                                </p>
                            </div>
                            <div class="list-movies__content__column__logo">
                                <img src="#" alt="">
                            </div>
                            <div class="list-movies__content__column__title">
                                <h2>
                                    <?php echo $movie->post_title; ?>
                                </h2>
                            </div>
                        </div>
                        <?php    
                    endwhile;
                
                // No value.
                else :
                    // Do something...
                endif;
                ?>
            </div>
        </div>
    </section>
    <?php
    }
?>