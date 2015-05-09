
<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );

	$soundcloud = get_post_meta($post->ID, '_soundcloud_studios_meta', true);

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
					<h1 class="[ title ]"><?php the_title(); ?></h1>
				</div>
				<div class="">
					<?php the_content(); ?>
				</div>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->

	<!-- GALERÍA -->
	<?php
	$content = $post->post_content;
	if( has_shortcode( $content, 'gallery' ) ) {
		$galleries = get_galleries_from_content($content);
		foreach ($galleries as $gallery => $galleryIDs) { ?>
			<div class="[ span xmall-12 margin-bottom--large ]">
				<div class="[ row ]">
					<?php
					$images = sga_gallery_images('thumbnail', $galleryIDs);

					foreach ($images as $key => $image) {
						$imageID                   = $image[4];
						$imageURL                  = $image[0];
						$galeria_img_url_thumbnail = wp_get_attachment_image_src( $imageID, 'thumbnail' );
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
	<!-- GALERÍA -->

	<!-- EQUIPO POST -->
	<section class="[ wrapper ]">
		<div class="[ row ] [ margin-bottom--large ]">
			<div class="[ columna xmall-12 medium-4 ]">
				<h3>General</h3>
				<ul>
					<?php
					$equipo_args = array(
						'post_type' 		=> 'equipos',
						'posts_per_page' 	=> -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'tipo-de-equipo',
								'field'    => 'slug',
								'terms'    => array( 'general' ),
							),
						),
					);
					$query_equipo = new WP_Query( $equipo_args );
					if ( $query_equipo->have_posts() ) : while ( $query_equipo->have_posts() ) : $query_equipo->the_post();
					?>
						<li class="[ xmall-12 ]">
							- <?php the_title()?>
						</li>
					<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
			</div>

			<div class="[ columna xmall-12 medium-4 ]">
				<h3>DAW</h3>
				<ul>
					<?php
					$equipo_args = array(
						'post_type' 		=> 'equipos',
						'posts_per_page' 	=> -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'tipo-de-equipo',
								'field'    => 'slug',
								'terms'    => array( 'daw' ),
							),
						),
					);
					$query_equipo = new WP_Query( $equipo_args );
					if ( $query_equipo->have_posts() ) : while ( $query_equipo->have_posts() ) : $query_equipo->the_post();
					?>
						<li class="[ xmall-12 ]">
							- <?php the_title()?>
						</li>
					<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
			</div>

			<div class="[ columna xmall-12 medium-4 ]">
				<h3>Microfonía</h3>
				<ul>
					<?php
					$equipo_args = array(
						'post_type' 		=> 'equipos',
						'posts_per_page' 	=> -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'tipo-de-equipo',
								'field'    => 'slug',
								'terms'    => array( 'microfonía' ),
							),
						),
					);
					$query_equipo = new WP_Query( $equipo_args );
					if ( $query_equipo->have_posts() ) : while ( $query_equipo->have_posts() ) : $query_equipo->the_post();
					?>
						<li class="[ xmall-12 ]">
							- <?php the_title()?>
						</li>
					<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
			</div>
		</div>
	</section><!-- EQUIPO POST -->

	<?php if ( $soundcloud ){ ?>
		<section class="[ soundcloud ]">
			<div class="[ text-center ">
				<h3>Checa nuestro Soundcloud</h3>
				<a target="_blank" href="<?php echo $soundcloud; ?>">
					<i class="[ icon-soundcloud ] [ icon-large ] [ highlight ]"></i>
				</a>
			</div>
		</section><!-- soundcloud -->
	<?php } ?>


	<!-- CALL TO ACTION -->
	<section class="[ bg-highlight ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca de Sunland Studios</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--dark ] [ padding ][ js-modal-opener ]" data-modal="natural-form">más información</a></div>
				</div>
			</div>
		</div>
	</section><!-- CALL TO ACTION -->

	<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-dark ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Colaboradores</h2>
				</div>
				<?php
				$instructores_args = array(
					'post_type' 		=> 'instructores',
					'posts_per_page' 	=> -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo-de-staff',
							'field'    => 'slug',
							'terms'    => array('studios'),
						),
					),
				);
				$query_instructores = new WP_Query( $instructores_args );
				if ( $query_instructores->have_posts() ) : while ( $query_instructores->have_posts() ) : $query_instructores->the_post();

					$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$term_materias = wp_get_post_terms( $post->ID, 'materia', array('fields' => 'names') );
					$materias = get_formatted_materias( $term_materias );
				?>
					<div class="[ span xmall-12 medium-4 large-3 ] [ padding ]">
						<div class="[ bg-light ] [ relative ] [ instructor-image ]">
							<div class="[ text-center ] [ center-full ][ xmall-11 ][ z-index-10 ]">
								<a href="<?php the_permalink() ?>" class="[ button button--large button--highlight ]">ver perfil</a>
							</div>
							<img src="<?php echo $instructor_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
						<p class="[  ]"><?php echo $materias; ?></p>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</section><!-- INSTRUCTORES -->



<?php get_footer(); ?>