<?php 
include get_theme_file_path( '/classes/eliminar_acentos.php' );

{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'Bloque de peliculas y filtro por catergia',
            'title'             => __('Bloque de peliculas y filtro por catergia '),
            'description'       => __('Bloque de peliculas y filtro por catergia'),
            'render_callback'   => 'cf_category_page_movies',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}
function cf_category_page_movies( $block ) 
{ 
    ?>
    <section class="most-recently">
        <div class="container">
            <div class="most-recently__tabs">
                <ul>
                    <li class="input-box">
                        <input checked class="selectorItem" type="radio" id="all" name="checkbox" value=""><label for="all">Todo el contenido</label>
                    </li>
                    <?php 
                        $categories = get_categories();
                        foreach($categories as $category) {
                        $name = strtolower(preg_replace('/\s+/', '', $category->name));
                        $nameSinAcentos = eliminar_acentos($name);
                        echo '<li class="input-box"><input class="selectorItem" type="radio" id="'.$nameSinAcentos.'" name="checkbox" value="'.$nameSinAcentos.'"><label for="'.$nameSinAcentos.'">'. $category->name .'</label></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="most-recently__list">
                <ul class="most-recently__list__items">
                <?php 
                  $args = array
                  (
                     'post_type' => 'peliculas',
                     'post_status' => 'publish',
                     'posts_per_page' => 100, 
                  );

                  $news_posts = new WP_Query($args);
                  while($news_posts->have_posts()) : $news_posts->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>" class="item <?php $i = 0; foreach((get_the_category()) as $category) { if($i == 0) { echo eliminar_acentos(strtolower(preg_replace('/\s+/', '', $category->cat_name))) . ''; } $i++; } ?>">                        
                        <a href="<?php the_permalink(); ?>"> 
                            <div class="most-recently__list__items__hero">
                                <img src="<?php the_post_thumbnail_url() ?>" alt="">
                            </div>
                            <div class="most-recently__list__items__title">
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