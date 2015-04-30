<?php
	get_header();

	$nosotros_args = array(
		'post_type' 		=> 'nosotros',
		'posts_per_page' 	=> -1,
	);
	$query_nosotros = new WP_Query( $nosotros_args );
	if ( $query_nosotros->have_posts() ) : while ( $query_nosotros->have_posts() ) : $query_nosotros->the_post();

		$bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
		<section class="[ clearfix ]">
			<div class="[ row ]">
				<div class="[ bg-image ][ span xmall-12 medium-5 large-6 ]" style="background-image: url(<?php echo $bg_image[0] ?>)">
					<div class="[ opacity-gradient ] [ full-height ]">
					</div>
				</div>
				<div class="[ span xmall-12 medium-7 large-6 ] [ ] [ padding ] [ relative ]">
					<div>
						<h2 class="[ title ]"><?php the_title(); ?></h2>
						<p><?php the_content(); ?></p>
					</div>
				</div>
			</div>
		</section>
<?php
	endwhile; endif; wp_reset_query();
?>
	<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-highlight ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Nuestros instructores</h2>
				</div>
				<?php
				$instructores_args = array(
					'post_type' 		=> 'instructores',
					'posts_per_page' 	=> -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo-de-staff',
							'field'    => 'slug',
							'terms'    => array('talleres', 'diplomados'),
						),
					),
				);
				$query_instructores = new WP_Query( $instructores_args );
				if ( $query_instructores->have_posts() ) : while ( $query_instructores->have_posts() ) : $query_instructores->the_post();

					$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
					$term_materias = wp_get_post_terms( $post->ID, 'materia', array('fields' => 'names') );
					$materias = get_formatted_materias( $term_materias );
				?>
					<div class="[ span xmall-12 medium-4 large-3 ] [ padding ]">
						<div class="[ bg-light ] [ relative ] [ instructor-image ]">
							<div class="[ text-center ] [ center-full ] [ z-index-10 ]">
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

	<!-- Sunland Studios y Express -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding--large ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más sobre nuestros talleres y cursos.</h2><a href="#" class="[ inline-block align middle ][ button button--medium button--highlight ] [ padding ]">más información</a>
				</div>
			</div>
		</div>
	</section>
	<!--  -->
<?php
	get_footer();
?>