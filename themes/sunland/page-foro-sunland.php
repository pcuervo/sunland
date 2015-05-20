<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );

	$video_danza_host = NULL;
	$video_musica_host = NULL;
	$video_teatro_host = NULL;
	$video_src = '';

	/**
	 * Danza
	**/
	$url_video_danza = get_post_meta($post->ID, '_video_danza_meta', true);
	if (strpos($url_video_danza,'yout') !== false) {
		$video_danza_host = 'youtube';
	}
	if (strpos($url_video_danza,'vim') !== false) {
		$video_danza_host = 'vimeo';
	}
	if( $video_danza_host ){
		$video_danza_src = get_video_src($url_video_danza, $video_danza_host);
	}

	/**
	 * Música
	**/
	$url_video_musica = get_post_meta($post->ID, '_video_musica_meta', true);
	if (strpos($url_video_musica,'yout') !== false) {
		$video_musica_host = 'youtube';
	}
	if (strpos($url_video_musica,'vim') !== false) {
		$video_musica_host = 'vimeo';
	}
	if( $video_musica_host ){
		$video_musica_src = get_video_src($url_video_musica, $video_musica_host);
	}

	/**
	 * Teatro
	**/
	$url_video_teatro = get_post_meta($post->ID, '_video_teatro_meta', true);
	if (strpos($url_video_teatro,'yout') !== false) {
		$video_teatro_host = 'youtube';
	}
	if (strpos($url_video_teatro,'vim') !== false) {
		$video_teatro_host = 'vimeo';
	}
	if( $video_teatro_host ){
		$video_teatro_src = get_video_src($url_video_teatro, $video_teatro_host);
	}

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
			<?php if ( ! empty($video_danza_src) ){ ?>
				<div class="[ columna xmall-12 medium-4 ]">
					<div class="[ video-wrapper ]">
						<iframe src="https:<?php echo $video_danza_src; ?>?color=1aa2dc&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<h3>Danza</h3>
				</div>
			<?php } ?>
			<?php if ( ! empty($video_musica_src) ){ ?>
				<div class="[ columna xmall-12 medium-4 ]">
					<div class="[ video-wrapper ]">
						<iframe src="https:<?php echo $video_musica_src; ?>?color=1aa2dc&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<h3>Música</h3>
				</div>
			<?php } ?>
			<?php if ( ! empty($video_teatro_src) ){ ?>
				<div class="[ columna xmall-12 medium-4 ]">
					<div class="[ video-wrapper ]">
						<iframe src="https:<?php echo $video_teatro_src; ?>?color=1aa2dc&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<h3>Teatro</h3>
				</div>
			<?php } ?>
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
					
						$meta_date = rwmb_meta( '_fecha', '', $post->ID );
				?>
						<h2><?php echo the_title(); ?></h2>
						<h3 class="[ dark ]">
							<?php if( $meta_date ) : 
								foreach ( $meta_date as $key => $date_time ) : 
									$formatted_datetime = get_formatted_event_datetime( $date_time ); 
									echo $formatted_datetime . '<br />';
								endforeach;
							endif; ?>
						</h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink() ?>" class="[ button button--small button-ink ] [ inline-block ][ margin-bottom--large ]">Ver más <i class="[ fa fa-chevron-right ]"></i></a>
				<?php
					endwhile; endif; wp_reset_query();
				?>
			</div>
		</div>
	</section><!-- EVENTOS -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ][ margin-bottom ]">
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