<?php
{ 
   if (function_exists('acf_register_block'))
   {
      acf_register_block 
      (
         array 
         (
            'name'              => 'recent-posts-page',
            'title'             => __('Recent Posts complete'),
            'description'       => __('Recent posts block complete'),
            'render_callback'   => 'cf_recent_posts_page_callback',
            'category'          => 'cf',
            'keywords'          => array( 'cf', 'recent', 'posts' ),
         )
      );
   }
}

 function cf_recent_posts_page_callback( $block ) 
{
	?>  
   <section class="list-movies-recent">
        <div class="container">
			<div class="list-movies-recent__content">
				<?php 
				$args = array
				(
					'post_type' => 'peliculas',
					'post_status' => 'publish',
					'posts_per_page' => 15, 
				);

				$news_posts = new WP_Query($args);
				while($news_posts->have_posts())  : $news_posts->the_post();  ?>
                <div class="list-movies-recent__content__column" id="post-<?php the_ID(); ?>" style="background-image: url('<?php the_post_thumbnail_url() ?>')" >
                    <div class="list-movies-recent__content__column__category">
                        <p>
                            <?php 
                                $i = 0;
                                foreach((get_the_category()) as $category) { if($i == 0) { echo $category->cat_name . ' '; } $i++; } 
                            ?>
                        </p>
                    </div>
                    <div class="list-movies-recent__content__column__logo">
                        <img src="#" alt="">
                    </div>
                    <div class="list-movies-recent__content__column__title">
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                    </div>
                </div>
				<?php endwhile; ?>
			</div>
      <?php wp_reset_postdata(); // reset the query ?>
        </div>
   </section>
<?php } ?>