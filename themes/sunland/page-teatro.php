
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
			<div class="[ xmall-12 medium-8 ]">
				<div class=" [ margin-bottom ]">
					<h2 class="[ title ]"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
				<?php
					$teatro_args = array(
						'post_type' 		=> 'talleres',
						'posts_per_page' 	=> -1,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'arte',
								'field'    => 'slug',
								'terms'    => array( 'teatro' ),
							),
							array(
								'taxonomy' => 'tipo-de-contenido',
								'field'    => 'slug',
								'terms'    => array( 'texto' ),
							),
						),
					);
					$query_teatro = new WP_Query( $teatro_args );
					if ( $query_teatro->have_posts() ) : while ( $query_teatro->have_posts() ) : $query_teatro->the_post();
						$audiencia = get_post_meta( $post->ID, '_audiencia_meta', TRUE );
						$horario_taller = get_post_meta( $post->ID, '_horario_taller_meta', TRUE );
						$duracion_taller = get_post_meta( $post->ID, '_duracion_taller_meta', TRUE );
						$term_instructores = wp_get_post_terms( $post->ID, 'instructores', array('fields' => 'all') );
				?>
						<h3 class="[ sub-title dark ]"><?php echo the_title(); ?></h3>
						<div class="">
							<?php echo the_content(); ?>
						</div>
						<h4 class="[ dark ]">Dirigido a:</h4>
						<div class="[ margin-bottom ]">
							<?php echo $audiencia; ?>
						</div>
						<?php if ( $horario_taller != '' ) : ?>
							<h4 class="[ dark ]">Horario:</h4>
							<div class="[ margin-bottom ]">
								<?php echo $horario_taller; ?>
							</div>
						<?php endif ?>
						<h4 class="[ dark ]">Imparte:</h4>
						<div class="[ margin-bottom ]">
							<a href="<?php echo site_url() . '/instructores/' . $term_instructores[0]->slug ?>" class="[ highlight ]">
								<?php echo $term_instructores[0]->name; ?>
							</a>
						</div>
						<?php if ( $duracion_taller != '' ) : ?>
							<h4 class="[ dark ]">Duración:</h4>
							<div class="[ margin-bottom ]">
								<?php echo $duracion_taller; ?>
							</div>
						<?php endif; ?>

				<?php endwhile; endif; wp_reset_query(); ?>
			</div><!-- row -->
		</div><!-- wrapper -->
	</section> <!-- INFO -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">¿Tienes alguna duda sobre los talleres de teatro?</h2><div class="[ inline-block align-middle ][ text-center ][ padding ]"><a href="#" class="[ button button--medium button--highlight ][ padding ][ js-modal-opener ]" data-modal="natural-form">contáctanos</a></div>
				</div>
			</div>
		</div>
	</section><!-- CALL TO ACTION -->

	<!-- GALERÍAS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 ] [ margin-bottom ]">
				<h2 class="[ title ]">Galerías de danza</h2>
			</div>
			<?php
				$galeria_args = array(
					'post_type' 		=> 'talleres',
					'posts_per_page' 	=> -1,
					'tax_query' => array(
						'relation' => 'AND',
						array(
								'taxonomy' => 'arte',
								'field'    => 'slug',
								'terms'    => array( 'teatro' ),
							),
						array(
							'taxonomy' => 'tipo-de-contenido',
							'field'    => 'slug',
							'terms'    => array( 'galeria' ),
						),
					),
				);
				$query_galeria = new WP_Query( $galeria_args );
				if ( $query_galeria->have_posts() ) : while ( $query_galeria->have_posts() ) : $query_galeria->the_post();

					$galeria_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$images = get_attached_media( 'image', 80 );
			?>
					<div class="[ columna xmall-12 medium-4 ]">
						<img src="<?php echo $galeria_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">

					</div>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</section><!-- GALERÍAS -->

	<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-dark ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Instructores de teatro</h2>
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
							'terms'    => array( 'teatro' ),
						),
					),
				);
				$query_instructores = new WP_Query( $instructores_args );
				if ( $query_instructores->have_posts() ) : while ( $query_instructores->have_posts() ) : $query_instructores->the_post();

					$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				?>
					<div class="[ span xmall-12 medium-4 ] [ padding ]">
						<div class="[ bg-light ] [ relative ] [ instructor-image ]">
							<div class="[ text-center ] [ center-full ] [ z-index-10 ]">
								<a href="<?php the_permalink() ?>" class="[ button button--large button--highlight ]">ver perfil</a>
							</div>
							<img src="<?php echo $instructor_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</section><!-- INSTRUCTORES -->

<?php get_footer(); ?>