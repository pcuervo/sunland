<?php
	get_header();
	the_post();

	if ( has_term('studios', 'tipo-de-staff', $post) ){

		$cover_url = THEMEPATH.'images/colaboradores.jpg';
	} else{
		$cover_url = THEMEPATH.'images/instructores.jpg';
	}


	$images = get_attached_media( 'image' );

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

<?php get_footer(); ?>