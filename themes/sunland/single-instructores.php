<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );

	$soundcloud = get_post_meta($post->ID, '_soundcloud_meta', true);
	$youtube = get_post_meta($post->ID, '_youtube_meta', true);
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>

	<!-- INFO -->
	<section class="[ info ]">
		<div class="[ wrapper ]">
			<div class="[ xmall-12 medium-8 ]">
				<div class="[ margin-bottom ]">
					<h2 class="[ title ]"><?php echo the_title(); ?></h2>
				</div>
				<div class="">
					<?php the_content(); ?>
				</div>
				<div class="[ margin-bottom--large ] [ clearfix ]">
					<h2 class="title">Demos</h2>
					<?php if ( $soundcloud ){ ?>
						<a target="_blank" href="<?php echo $soundcloud; ?>">
							<i class="[ icon-soundcloud ] [ icon-large ] [ highlight ]"></i>
						</a>
					<?php }
					if ( $youtube ){ ?>
						<a target="_blank" href="<?php echo $youtube; ?>">
							<i class="[ icon-youtube-play ] [ icon-large ] [ highlight ]"></i>
						</a>
					<?php } ?>
				</div>
			</div><!-- xmall-12 medium-8 -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca del Foro Sunland</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--highlight ] [ padding ][ js-modal-opener ]" data-modal="natural-form">más información</a></div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>