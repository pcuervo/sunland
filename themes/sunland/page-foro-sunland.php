<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>

	<!-- INFO -->
	<section class="[ info ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 ] [ margin-bottom ]">
					<h1 class="[ title ]"><?php the_title(); ?></h1>
				</div>
				<div class="[ columna xmall-12 ]">
					<p><?php the_content(); ?></p>
				</div>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->

	<!-- VIDEOS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 medium-4 ]">
				<div class="[ video-wrapper ]">
					<iframe src="https://www.youtube.com/embed/qaZxyJEfLCg" frameborder="0" allowfullscreen></iframe>
				</div>
				<h3>Teatro</h3>
			</div>
			<div class="[ columna xmall-12 medium-4 ]">
				<div class="[ video-wrapper ]">
					<iframe src="https://www.youtube.com/embed/pPpzw_1kZUM" frameborder="0" allowfullscreen></iframe>
				</div>
				<h3>Danza</h3>
			</div>
			<div class="[ columna xmall-12 medium-4 ]">
				<div class="[ video-wrapper ]">
					<iframe src="https://www.youtube.com/embed/jclFhixqvEs" frameborder="0" allowfullscreen></iframe>
				</div>
				<h3>Música</h3>
			</div>
		</div>
	</section>
	<!-- VIDEOS -->

	<!-- CALENDAR -->
	<section id="calendar-section" class="[ calendar ][ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="main_body_events_calendar calendarioContainer" >
				<div class="custom-calendar-wrap">
					<div id="custom-inner" class="custom-inner">
						<div class="custom-header clearfix">
							<nav>
								<span id="custom-prev" class="custom-prev"><i class="[ icon-angle-left ]"></i></span>
								<span id="custom-next" class="custom-next"><i class="[ icon-angle-right ]"></i></span>
							</nav>
							<h2 id="custom-month" class="[ custom-month ][ dark-shade ]"></h2>
							<h3 id="custom-year" class="[ custom-year ][ dark-shade ]"></h3>
						</div>
						<div id="calendar" class="fc-calendar-container"></div>
					</div>
				</div>
			</div>
		</div><!-- wrapper -->
	</section> <!-- CALENDAR -->

	<!-- EVENTOS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ span xmall-12 margin-bottom--large ] [ clearfix ]">
				<h2 class="[ dark ][ margin-bottom ]">Eventos próximos</h2>
				<?php
					$args = array(
						'post_type' 		=> 'eventos',
						'posts_per_page' 	=> 4
					);
					$query_eventos = new WP_Query( $args );
					if ( $query_eventos->have_posts() ) : while ( $query_eventos->have_posts() ) : $query_eventos->the_post();

						$dia = get_post_meta( $post->ID, '_dia_meta', TRUE );
						$date = ( ! empty( $dia ) ) ? get_formatted_event_date( $dia ) : '';

				?>
						<h2><?php echo the_title(); ?></h2>
						<h3 class="[ dark ]"><?php echo $date; ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink() ?>" class="[ button button--small button-ink ] [ inline-block ][ margin-bottom--large ]">Ver más <i class="[ fa fa-chevron-right ]"></i></a>
				<?php
					endwhile; endif; wp_reset_query();
				?>
			</div>
		</div>
	</section><!-- EVENTOS -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca del Foro Sunland
					</h3><div class="[ inline-block align-middle ][ text-center ][ padding ]">
						<a href="#" class="[ button button--medium button--highlight ][ padding ][ js-modal-opener ]" data-modal="natural-form">más información</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<!-- GALERÍA -->
				<article class="[ bg-highlight ]">
					<?php
					$content = $post->post_content;
					if( has_shortcode( $content, 'gallery' ) ) {
						$galleries = get_galleries_from_content($content);
						foreach ($galleries as $gallery => $galleryIDs) { ?>
							<div class="[ span xmall-12 margin-bottom--large ]">
								<div class="[ row ]">
									<?php
									$images = sga_gallery_images('medium', $galleryIDs);

									foreach ($images as $key => $image) {
										$imageID                   = $image[4];
										$imageURL                  = $image[0];
										$galeria_img_url_thumbnail = wp_get_attachment_image_src( $imageID, 'medium' );
										$galeria_img_url_full      = wp_get_attachment_image_src( $imageID, 'full' );

										?>
										<div class="[ columna xmall-12 medium-4 large-3 ]">
											<a class="[ fancybox ]" rel="group" href="<?php echo $galeria_img_url_full[0] ?>">
												<img class="[ image-responsive ][ margin-bottom ]" src="<?php echo $galeria_img_url_thumbnail[0]; ?>" />
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php }
					} ?>
				</article>
			</div>
		</div>
	</section><!-- GALERÍA -->

<?php get_footer(); ?>