<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );

	$videoHost = NULL;
	$video_src = '';
	$video_express = get_post_meta( $post->ID, '_video_express_meta', TRUE );
	if (strpos($video_express,'yout') !== false) {
		$video_express_host = 'youtube';
	}
	if (strpos($video_express,'vim') !== false) {
		$video_express_host = 'vimeo';
	}
	if( $video_express_host ){
		$video_express_src = get_video_src($video_express, $video_express_host);
	}
?>
	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>

	<!-- SUNLAND EXPRESS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 medium-9 ] [ ] [ padding ] [ relative ]">
				<h1 class="[ title ]"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
			<div class="[ columna shown--medium medium-3 ]">
				<img src="<?php echo THEMEPATH ?>images/express-poster.png" class="[ image-responsive ] [ padding ] [ margin-bottom ]">
			</div>

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
								$imageID         = $image[4];
								$imageURL        = $image[0];

								$galeria_img_url_thumbnail = wp_get_attachment_image_src( $imageID, 'medium' );
								$galeria_img_url_full = wp_get_attachment_image_src( $imageID, 'full' );

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
		</div>
	</section><!-- SUNLAND EXPRESS -->

	<!-- VIDEOS -->
	<?php if ( ! empty($video_express_src) ){ ?>
		<section class="[ wrapper ][ margin-bottom ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-8 center ]">
					<div class="[ video-wrapper ]">
						<iframe src="https:<?php echo $video_express_src; ?>?color=1aa2dc&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<!-- VIDEOS -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ][ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca de Sunland Express</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--highlight ] [ padding ][ js-modal-opener ]" data-modal="natural-form">más información</a></div>
				</div>
			</div>
		</div>
	</section>
<?php
	get_footer();
?>