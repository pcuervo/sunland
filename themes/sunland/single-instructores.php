<?php
	get_header();
	the_post();

	$cover_url = THEMEPATH.'images/instructores.jpg';
	$instructor_photo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$soundcloud = get_post_meta($post->ID, '_soundcloud_meta', true);
	$youtube = get_post_meta($post->ID, '_youtube_meta', true);

?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>

	<!-- INFO -->
	<section class="[ info ]">
		<div class="[ wrapper ]">
			<div class="[ columna xmall-12 ]">
				<div class="[ columna xmall-12 medium-7 large-8 ][ clearfix ]">
					<div class="[ margin-bottom ]">
						<h2 class="[ title ]"><?php echo the_title(); ?></h2>
					</div>
					<div class="">
						<?php the_content(); ?>
					</div>
					<div class="[ margin-bottom--large ] [ clearfix ]">
						<?php if ( $soundcloud || $youtube ) : ?>
							<h2 class="title">Demos</h2>
						<?php endif; ?>
						
						<?php if ( $soundcloud ) : ?>
							<a target="_blank" href="<?php echo $soundcloud; ?>">
								<i class="[ icon-soundcloud ] [ icon-large ] [ highlight ]"></i>
							</a>
						<?php endif; 

						if ( $youtube )  : ?>
							<a target="_blank" href="<?php echo $youtube; ?>">
								<i class="[ icon-youtube-play ] [ icon-large ] [ highlight ]"></i>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="[ columna xmall-12 medium-5 large-4 ][ clearfix ]">
					<img src="<?php echo $instructor_photo[0] ?>" class="[ image-responsive ] [ padding ] [ margin-bottom ]" />
				</div>
				
			</div><!-- xmall-12 medium-8 -->
			<div class="clear"></div>
		</div><!-- wrapper -->
	</section> <!-- INFO -->

<?php get_footer(); ?>