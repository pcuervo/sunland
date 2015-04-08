<?php 

	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient rectangle ]">
		</div>
	</div>

	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ span xmall-12 ] [ ] [ padding ] [ relative ]">
				<h2 class="[ title ]"><?php the_title() ?></h2>
				<p><?php the_content(); ?></p>
			</div>
		</div>
	</section>

	<!-- GALERÍA ESTÁTICA -->
	<section class="[ wrapper ]">
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
	</section><!-- GALERÍA ESTÁTICA -->
	
	<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-dark ]">
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
								'terms'    => 'talleres',
							),
						),
					);
					$query_instructores = new WP_Query( $instructores_args );
					if ( $query_instructores->have_posts() ) : while ( $query_instructores->have_posts() ) : $query_instructores->the_post();

						$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						$term_materias = wp_get_post_terms( $post->ID, 'materia', array('fields' => 'names') );
						$materias = get_formatted_materias( $term_materias );
				?>
					<div class="[ span xmall-12 medium-4 ] [ padding ]">
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

<?php 
	get_footer();
?>