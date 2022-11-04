<?php

if(function_exists('acf_register_block')) { 
   add_action('acf/init', 'cf_custom_block');
}

 function cf_custom_block() 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'recent-posts',
            'title'             => __('Recent Posts'),
            'description'       => __('Recent posts block'),
            'render_callback'   => 'cf_recent_posts_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}

 function cf_recent_posts_callback( $block ) 
{
		$heading = get_field('titulo');	
      $perCategorie = get_field('por_categoria');
      $isCategory = get_field('convertir_a_bloque_de_categorias');
	?>
   <?php if ($isCategory) { ?>
      <section class="most-recently">
        <div class="container">
            <div class="most-recently__title">
               <?php if ($heading ) {
                  echo '<h2>' . $heading . '</h2>';
               } ?>
            </div>
            <div class="most-recently__list">
                <ul class="most-recently__list__items">
                <?php 
                  $args = array
                  (
                     'post_type' => 'peliculas',
                     'post_status' => 'publish',
                     'posts_per_page' => 6, 
                     'cat' => $perCategorie 
                  );

                  $news_posts = new WP_Query($args);
                  while($news_posts->have_posts()) : $news_posts->the_post(); ?>
                  <a href="<?php the_permalink(); ?>"> 
                    <li id="post-<?php the_ID(); ?>">
                        <div class="most-recently__list__items__hero">
                            <img src="<?php the_post_thumbnail_url() ?>" alt="">
                        </div>
                        <div class="most-recently__list__items__title">
                            <h4>
                              <?php the_title(); ?>
                            </h4>
                        </div>
                    </li>
                  </a>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); // reset the query ?>
            </div>
        </div>
    </section>
   <?php } else { ?> 
   <section class="list-movies">
      <div class="container">
            <div class="list-movies__title">
               <?php if ($heading ) {
                  echo '<h2>' . $heading . '</h2>';
               } ?>
            </div>
            <div class="list-movies__content">
               <?php 
               $args = array
               (
                  'post_type' => 'peliculas',
                  'post_status' => 'publish',
                  'posts_per_page' => 3, 
               );

               $news_posts = new WP_Query($args);
               while($news_posts->have_posts()) : $news_posts->the_post(); ?>
               <a href="<?php the_permalink(); ?>"> 
               <div class="list-movies__content__column" id="post-<?php the_ID(); ?>" style="background-image: url('<?php the_post_thumbnail_url() ?>')" >
                  <div class="list-movies__content__column__category">
                           <p>
                              <?php 
                                 $i = 0;
                                 foreach((get_categories()) as $category) { if($i == 0) { echo $category->cat_name . ' '; } $i++; } 
                              ?>
                           </p>
                     </div>
                  <div class="list-movies__content__column__logo">
                           <img src="#" alt="">
                     </div>
                  <div class="list-movies__content__column__title">
                           <h2>
                        <?php the_title(); ?>
                           </h2>
                     </div>
               </div>
               </a>
               <?php endwhile; ?>
            </div>
         <?php wp_reset_postdata(); // reset the query ?>
      </div>
   </section>
   <?php } ?>
<?php } ?>