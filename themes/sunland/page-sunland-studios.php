
<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$images = get_attached_media( 'image' );

	
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
				<div class="[ columna xmall-12 ]">
					<p><?php the_content(); ?></p>
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
							$image_url = wp_get_attachment_url( $image->ID );
						?>
						<img src="<?php echo $image_url ?>" class="[ image-responsive ] [ margin-bottom ]">
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<!-- GALERÍA ESTÁTICA -->

	<!-- EQUIPO POST -->
	<?php 
			$instructores_args = array(
				'post_type' 		=> 'equipos',
				'posts_per_page' 	=> -1,
			);
			$query_equipo = new WP_Query( $instructores_args );
			if ( $query_equipo->have_posts() ) : while ( $query_equipo->have_posts() ) : $query_equipo->the_post();			
	?>
			   <div class="[ row ] [ margin-bottom--large ]">
					<div class="wrapper">
						<div class="row">
							<div class="[ span xmall-12 ] [ center block ] [ margin-bottom--large ]">
								<h2 class="[ title ] [ text-center ] [ margin-bottom ]"><?php the_title()?></h2>
								<p class=" [ columna xmall-12 small-8 large-6 ] [ center block ] [ margin-bottom ] [ text-center ]"><?php the_content()?></p>
							</div>
						</div>
					</div>
    <?php endwhile; endif; wp_reset_query(); ?>
	<!-- EQUIPO POST -->

	<!-- CALL TO ACTION -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 ] [ padding ] [ text-center ][ center block ]">
					<h3 class="[ sub-title ] [ text-center ] [ inline-block align-middle ] [ padding ]">Conoce más acerca de Sunland Studios</h2><div class="[ inline-block block align middle ] [ text-center ][ padding ]"><a href="#" class="[ button button--medium button--highlight ] [ padding ]">más información</a></div>
				</div>
			</div>
		</div>
	</section>

		<!-- INSTRUCTORES -->
	<section class="[ hidden--xmall shown--medium ] [ bg-highlight ] [ margin-bottom--large ]">
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



<?php get_footer(); ?>