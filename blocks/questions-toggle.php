<?php
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'questions_toggle',
            'title'             => __('Preguntas frecuentes'),
            'description'       => __('Preguntas frecuentes toggle block'),
            'render_callback'   => 'cf_questions_toggle_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}

 function cf_questions_toggle_callback( $block ) 
{
	$heading = get_field('titulo');
	?>
   <section class="list-category">
        <div class="container">
            <div class="list-category__title">
                <h2>
                    EXPLORA NUESTROS CONTENIDOS
                </h2>
            </div>
            <ul class="list-category__columns">
            <?php           
               $categories = get_categories();
               $term_pre = 'category_';
               foreach($categories as $category) {
                  $term_id = $category->term_id;
                  echo '<div class="list-category__columns__item"> ' . get_field('icon', $term_pre, $term_id ). ' <h3 href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
               }
            ?>
            </ul>
        </div>
    </section>
   <section class="content-accordeon">
      <div class="content-accordeon__title">
			<?php if ($heading ) {
				echo '<h2>' . $heading . '</h2>';
			} ?>
      </div>
		<div class="content-accordeon__list">
			<?php 
			$args = array
			(
				'post_type' => 'preguntas',
				'post_status' => 'publish',
				'posts_per_page' => 3
			);

			$news_posts = new WP_Query($args);
			while($news_posts->have_posts()) : $news_posts->the_post(); ?>
         <div class="content-accordeon__list__item" id="post-<?php the_ID(); ?>" style="background-image: url('<?php the_post_thumbnail_url() ?>')" >
            <div class="content-accordeon__list__item__head">
               <label class="tab-label"  for="chck<?php the_ID(); ?>"><?php the_title(); ?>
               <button>
                  <i class="ico">
                  </i>
               </button>
            </div>
            <input class="check-input" type="checkbox" id="chck<?php the_ID(); ?>">
            <div class="content-accordeon__list__item__content">
               <?php the_content(); ?>
            </div>
         </div>
         <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); // reset the query ?>
      <script>
         function check() {
            document.getElementById("chck107").checked = true;
         }
         check();
         
         function isChecked(id) {
            console.log(id)
            // const item = document.getElementById(id);     
            // const itemHead = document.querySelectorAll('.content-accordeon__list__item input');
            // for (let index = 0; index < itemHead.length; index++) {
            //    const element = itemHead[index];
            //    element.checked = false;
            // }
            // item.checked = true;
         }
      </script>
   </section>
<?php } ?>