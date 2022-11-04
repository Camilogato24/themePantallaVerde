<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		    $url = get_field('url_de_la_pelicula');
			$pais = get_field('pais');
			$clasificacion = get_field('clasificacion');
			$fecha = get_field('fecha_de_estreno_de_la_pelicula');
			$director = get_field('nombre_del_director');
			$duracion = get_field('duracionpelicula');
			$imagen_principal = get_field('imagen_principal');
			?>
			<div class="hero-single" style="background-image: url(<?php echo $imagen_principal; ?>)">
				<iframe src="<?php echo $url; ?>" frameborder="0"></iframe>
				<div class="hero-single__poster" id="poster">
				<svg id="play" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 481 481" style="enable-background:new 0 0 481 481;" xml:space="preserve">
                        <g>
                            <path style="fill:hsla(77, 100%, 56%, 1);" d="M410.6,70.4C365.1,25,304.7,0,240.5,0S115.9,25,70.4,70.4C25,115.9,0,176.3,0,240.5s25,124.6,70.4,170.1
                            C115.8,456,176.2,481,240.5,481s124.6-25,170.1-70.4C456,365.2,481,304.8,481,240.5S456,115.9,410.6,70.4z M240.5,454
                            C122.8,454,27,358.2,27,240.5S122.8,27,240.5,27S454,122.8,454,240.5S358.2,454,240.5,454z"></path>
                            <path style="fill:hsla(77, 100%, 56%, 1);" d="M349.2,229.1l-152.6-97.9c-4.2-2.7-9.4-2.9-13.8-0.5c-4.3,2.4-7,6.9-7,11.8v195.7c0,4.9,2.7,9.5,7,11.8
                            c2,1.1,4.3,1.7,6.5,1.7c2.5,0,5.1-0.7,7.3-2.1l152.6-97.9c3.9-2.5,6.2-6.8,6.2-11.4S353,231.6,349.2,229.1z M202.8,313.7V167.3
                            l114.1,73.2L202.8,313.7z"></path>
                        </g>
                    </svg>
				</div>
			</div>
			<div class="body-single">
				<div class="body-single__title">
					<h1>
						<?php the_title(); ?>
					</h1>
				</div>
				<div class="body-single__content">
					<div class="body-single__content__post">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="">
						<?php the_content(); ?>
					</div>
					<div class="body-single__content__custompost">
						<div>
							<ul>
								<li>
									<strong>
										País:
									</strong>
									<p><?php echo $pais ?></p>
								</li>
								<li>
									<strong>
										Director:
									</strong>
									<p><?php echo $director ?></p>
								</li>
								<li>
									<strong>
										Año de lanzamiento:
									</strong>
									<p><?php echo $fecha ?></p>
								</li>
								<li>
									<strong>
										Duración:
									</strong>
									<p><?php echo $duracion ?></p>
								</li>
							</ul>
						</div>
						<div>
							<ul>
								<li>
									<strong>
										Clasificación:
									</strong>
									<p><?php echo $clasificacion ?></p>
								</li>
								<li>
									<strong>
										Categorías:
									</strong>
									<p><?php the_category( ' , '); ?></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="body-footer">
				<section class="most-recently">
					<div class="container">
						<div class="most-recently__title">
							<h2>
								También te puede interesar
							</h2>
						</div>
						<div class="most-recently__list">
							<ul class="most-recently__list__items">
						<?php
							function example_cats_related_post() {

								$post_id = get_the_ID();
								$cat_ids = array();
							
								$current_post_type = get_post_type($post_id);
								$query_args = array( 
									'category__in'   => $cat_ids,
									'post_type'      => $current_post_type,
									'post__not_in'    => array($post_id),
									'posts_per_page'  => '3'
								);
								$related_cats_post = new WP_Query( $query_args );
								if($related_cats_post->have_posts()):
									while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
										
											<li>
												<div class="most-recently__list__items__hero">
													<a href="<?php the_permalink(); ?>">
													<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
														<img src="<?php echo $feat_image; ?>" alt="">
													</a>
												</div>
												<div class="most-recently__list__items__title">
													<h4>
														<?php the_title(); ?>
													</h4>
												</div>
											</li>
											<?php endwhile; ?>
										</ul>
									<?php
									// Restore original Post Data
									wp_reset_postdata();
								endif;
							
							}	
						?>
						<?php example_cats_related_post() ?>
							
						</div>
					</div>
				</section>										
			</div>
			<?php
		?>
	</div><!-- .entry-content -->
	<script>
		const play = document.getElementById('play');
		const poster = document.getElementById('poster');

		play.addEventListener('click', (event) => {
			poster.clasList.add('remove');
		});

	</script>
	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author', 'bio' ); ?>
	<?php endif; ?>

</article><!-- #post-${ID} -->
