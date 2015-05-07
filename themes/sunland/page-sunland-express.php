<?php

	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient main-tile ]">
		</div>
	</div>

	<!-- SUNLAND EXPRESS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 medium-9 ] [ ] [ padding ] [ relative ]">
				<h2 class="[ title ]"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<div class="[ columna shown--medium medium-3 ]">
				<img src="<?php echo THEMEPATH ?>images/express-poster.png" class="[ image-responsive ] [ padding ] [ margin-bottom ]">
			</div>
			<div class="[ span xmall-12 margin-bottom--large ] [ clearfix ]">
				<div class="[ row ]">
					<div class="[ span xmall-12 margin-bottom--large ] [ clearfix ]">
						<?php foreach ( $images as $image ) : ?>
							<div class="[ columna xmall-12 medium-4 ]">
								<?php
									$image_url = wp_get_attachment_url( $image->ID );
								?>
								<img src="<?php echo $image_url ?>" class="[ image-responsive ] [ margin-bottom ]">
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- SUNLAND EXPRESS -->

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