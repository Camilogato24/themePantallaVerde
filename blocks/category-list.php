<?php 
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'categoryList',
            'title'             => __('Bloque de la Categoria principal '),
            'description'       => __('Bloque de la Categoria principal'),
            'render_callback'   => 'cf_categoryList_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}
function cf_categoryList_callback( $block ) 
{
    $titulo = get_field('titulo');
    $descripcion = get_field('descripcion');
    $categoria = get_field('categoria');
    $url_category = get_field('url_category');
    $hero = get_field('fondo');

    ?>
   <section class="outstanding-item">
      <div class="outstanding-item__hero">
         <img src="<?php echo $hero; ?>" alt="<?php echo $titulo; ?>">
      </div>
      <div class="container">
         <div class="outstanding-item__content">
            <div class="outstanding-item__content__title">
               <h2>
                  <?php echo $titulo ?>
               </h2>
            </div>
            <div class="outstanding-item__content__text">
               <p>
                  <?php echo $descripcion ?>
               </p>
            </div>
            <div class="outstanding-item__content__list">
               <ul class="outstanding-item__content__list__nav">
                  <?php
                  $args = array
                  (
                     'post_type' => 'peliculas',
                     'post_status' => 'publish',
                     'posts_per_page' => 5, 
                     'cat' => $categoria 
                  );
                  $news_posts = new WP_Query($args);
                  while($news_posts->have_posts()) : $news_posts->the_post(); ?>
                  <a href="<?php the_permalink(); ?>">
                     <li id="post-<?php the_ID(); ?>">
                        <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                        <h3><?php the_title(); ?></h3>
                     </li>
                  </a>
                  <?php endwhile; ?>
               </ul>
            </div>
            <?php wp_reset_postdata(); // reset the query ?>
            <div class="outstanding-item__content__btnAction">
               <a href="<?php $url_category ?>" class="btn btn-secondary bigger">Explorar la coleccion</a>
            </div>
         </div>
      </div>
   </section>
<?php
}

?>