<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );

	$dia = get_post_meta( $post->ID, '_dia_meta', TRUE );
	$date = ( ! empty( $dia ) ) ? get_formatted_event_date( $dia ) : '';
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
					<h2 class="[ title ]"><?php echo the_title(); ?></h2>
					<h3 class="[ dark ]"><?php echo $date; ?></h3>
				</div>
				<div class="[ columna xmall-12 medium-6 ]">
					<?php the_content(); ?>
				</div>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->

	<!-- GALERÍA ESTÁTICA -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ span xmall-12 margin-bottom--large ] [ clearfix ]">
				<?php foreach ( $images as $image ) : ?>
					<div class="[ columna xmall-12 medium-4 ]">
						<?php
							$image_url = wp_get_attachment_image_src( $image->ID, 'thumbnail' );
						?>
						<img src="<?php echo $image_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section><!-- GALERÍA ESTÁTICA -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca del Foro Sunland</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--highlight ] [ padding ]">más información</a></div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>