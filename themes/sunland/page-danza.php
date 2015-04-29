
<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
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
					<h2 class="[ title ]"><?php the_title(); ?></h2>
				</div>
				<?php 
					$danza_args = array(
						'post_type' 		=> 'talleres',
						'posts_per_page' 	=> -1,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'arte',
								'field'    => 'slug',
								'terms'    => array('danza'),
							),
							array(
								'taxonomy' => 'tipo-de-contenido',
								'field'    => 'slug',
								'terms'    => array('texto'),
							),
						),
					);
					$query_danza = new WP_Query( $danza_args );
					if ( $query_danza->have_posts() ) : while ( $query_danza->have_posts() ) : $query_danza->the_post();
						$audiencia = get_post_meta( $post->ID, '_audiencia_meta', TRUE );
						$horario_taller = get_post_meta( $post->ID, '_horario_taller_meta', TRUE );
						$duracion_taller = get_post_meta( $post->ID, '_duracion_taller_meta', TRUE );
						$term_instructores = wp_get_post_terms( $post->ID, 'instructores', array('fields' => 'all') );
				?>
						<h3 class="[ sub-title dark ]"><?php echo the_title(); ?></h3>
						<div class="[ columna xmall-12 ]">
							<?php echo the_content(); ?>
						</div>
						<h4 class="[ sub-title dark ]">Dirigido a:</h4>
						<div class="[ columna xmall-12 ]">
							<?php echo $audiencia; ?>
						</div>
						<h4 class="[ sub-title dark ]">Horario:</h4>
						<div class="[ columna xmall-12 ]">
							<?php echo $horario_taller; ?>
						</div>
						<h4 class="[ sub-title dark ]">Imparte:</h4>
						<div class="[ columna xmall-12 ]">
							<a href="<?php echo site_url() . '/instructores/' . $term_instructores[0]->slug ?>" class="[ highlight ]">
								<?php echo $term_instructores[0]->name; ?>
							</a>
						</div>
						<h4 class="[ sub-title dark ]">Duración:</h4>
						<div class="[ columna xmall-12 ]">
							<?php echo $duracion_taller; ?>
						</div>
						<div class="[ text-center ]">
							<a href="<?php echo site_url() . '/sunland-studios' ?>" class="[ button button--small button--highlight ] [ inline-block ]">más información</a>
						</div>
						<hr>

				<?php endwhile; endif; wp_reset_query(); ?>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->

	<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-highlight ] [ margin-bottom--large ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Instructores de danza</h2>
				</div>
				<?php 
				$instructores_args = array(
					'post_type' 		=> 'instructores',
					'posts_per_page' 	=> -1,
					'tax_query' => array(
						'relation'	=> 'AND',
						array(
							'taxonomy' => 'tipo-de-staff',
							'field'    => 'slug',
							'terms'    => array( 'talleres' ),
						),
						array(
							'taxonomy' => 'materia',
							'field'    => 'slug',
							'terms'    => array( 'danza' ),
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

	<!-- GALERÍAS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 ] [ margin-bottom ]">
				<h2 class="[ title ]">Galerías de danza</h2>
			</div>
			<?php 
				$galeria_args = array(
					'post_type' 		=> 'instructores',
					'posts_per_page' 	=> -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo-de-contenido',
							'field'    => 'slug',
							'terms'    => array( 'galeria' ),
						),
					),
				);
				$query_galeria = new WP_Query( $galeria_args );
				if ( $query_galeria->have_posts() ) : while ( $query_galeria->have_posts() ) : $query_galeria->the_post();

					$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$term_materias = wp_get_post_terms( $post->ID, 'materia', array('fields' => 'names') );
					$materias = get_formatted_materias( $term_materias );
			?>
			<div class="[ span xmall-12 margin-bottom--large ] [ clearfix ]">
				
			</div>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</section>
	<!-- GALERÍAS -->

<?php get_footer(); ?>