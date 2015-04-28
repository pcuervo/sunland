
<?php require_once('functions.php'); ?>

<?php get_header(); ?>

	<!-- BANNER -->
	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo THEMEPATH ?>images/danza-01.jpg)">
		<div class="[ opacity-gradient square ]">
			<div class="[ media-info ] [ xmall-10 medium-7 center-full ]">
				<h2 class="[ text-center light ]">Sunland School of the Arts, Escuela multidisciplinaria de artes escénicas en la Ciudad de México.</h2>
			</div>
		</div>
	</div>
	<!--  -->
	<!-- ¿POR QUÉ SUNLAND? -->

	<?php 
		$home_info_query = new WP_Query( 'pagename=info-home' );
		if ( $home_info_query->have_posts() ) : $home_info_query->the_post(); 
	?>
   
		   <div class="[ row ] [ margin-bottom--large ]">
				<div class="wrapper">
					<div class="row">
						<div class="[ span xmall-12 ] [ center block ] [ margin-bottom--large ]">
							<h2 class="[ title ] [ text-center ] [ margin-bottom ]"><?php the_title()?></h2>
							<p class=" [ columna xmall-12 small-8 large-6 ] [ center block ] [ margin-bottom ] [ text-center ]"><?php the_content()?></p>
							<div class="[ text-center ]">
								<a href="#" class="[ button button--small button--highlight ] [ inline-block ]">más información</a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- ¿POR QUÉ SUNLAND? -->
		     
    <?php
		endif;
		wp_reset_query();
	?>
	
<!-- QUOTE -->
	<section class="[ margin-bottom--large ] [ bg-highlight ]">
		<div class="[ row ]">
			<div class="[ bg-image ][ span xmall-12 medium-6 xmedium-8 large-9 ]" style="background-image: url(<?php echo THEMEPATH ?>images/danza-01.jpg)">
				<div class="[ opacity-gradient ] [ main-tile ]">
				</div>
			 </div>
				<div class="[ span xmall-12 medium-6 xmedium-4 large-3 ][ secondary-tile ] [ relative ]">
						<?php 
							$testimonials_args = array(
								'post_type' 		=> 'testimonials',
								'posts_per_page' 	=> -1,
							);
							$query_testimonials = new WP_Query( $testimonials_args );
							if ( $query_testimonials->have_posts() ) : while ( $query_testimonials->have_posts() ) :$query_testimonials->the_post();

								$testimonial_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								$term_materias = wp_get_post_terms( $post->ID, 'materia', array('fields' => 'names') );
								$materias = get_formatted_materias( $term_materias );
						?>
								<div class="[ center-full ]">
									<i class="[ icon-quote icon-large ][ text-center ] [ block ]"></i>
									<!-- </div>
										<img src="<?php echo $testimonial_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
									</div> -->									
									<p><?php the_content() ?></p>
									<p class="[ text-right ]"><p><?php the_title() ?></p>
									
								</div>

						<?php endwhile;endif; wp_reset_query(); ?>
			    </div>
		</div>
	</section><!-- QUOTE —>




	
	<!-- TALLERES -->
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [  ]">
					<h2 class="[ title ] [ text-center ]">Nuestros talleres</h2>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<i class="[ icon-icon-dance ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<h2 class="[ title dark ] [ text-center ]">Danza</h2>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<i class="[ icon-icon-music-47 ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<h2 class="[ title dark ] [ text-center ]">Música</h2>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<i class="[ icon-icon-theater ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<h2 class="[ title dark ] [ text-center ]">Teatro</h2>
				</div>
			</div>
		</div>
	</section><!-- TALLERES -->
	
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
							'terms'    => array('talleres', 'diplomados'),
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

	<!-- EVENTOS FORO SUNALND -->
	<section class="[ margin-bottom--large ]">
		<div class="wrapper">
			<div class="row">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ margin-bottom ]">Próximos eventos en el foro Sunland</h2>
					<i class="[ icon-marker ] [ icon-medium ] [ highlight ] [ text-center center block ]"></i>
					<p class="[ text-center ]">
						Cozumel #31, Col. Roma, Cuahtemoc, México D.F. CP: 06700
					</p>
				</div>
				<div class="[ columna xmall-12 medium-4 ] [  ]">
					<img src="<?php echo THEMEPATH ?>images/evento-danza.png" class="[ image-responsive ] [ margin-bottom ]">
					<h2 class="[ sub-title dark ] [ text-center ]">Evento 1</h2>
					<p class="[ text-center ]">Fecha</p>
				</div>
				<div class="[ columna xmall-12 medium-4 ] [  ]">
					<img src="<?php echo THEMEPATH ?>images/evento-danza-02.png" class="[ image-responsive ] [ margin-bottom ]">
					<h2 class="[ sub-title dark ] [ text-center ]">Evento 2</h2>
					<p class="[ text-center ]">Fecha</p>
				</div>
				<div class="[ columna xmall-12 medium-4 ] [  ]">
					<img src="<?php echo THEMEPATH ?>images/evento-danza.png" class="[ image-responsive ] [ margin-bottom ]">
					<h2 class="[ sub-title dark ] [ text-center ]">Evento 3</h2>
					<p class="[ text-center dark ]">Fecha</p>
				</div>
				<div class="[ text-center ]">
					<a href="#" class="[ button button--small button--highlight ] [ inline-block ]">ver más eventos</a>
				</div>
			</div>
		</div>
	</section><!-- EVENTOS FORO SUNLAND -->

	<!-- SUNLAND STUDIOS Y EXPRESS -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 medium-6 ] [ margin-bottom--large ]">
					<i class="[ icon-mic ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<h2 class="[ title highlight ] [ text-center ]">Sunland Studios</h2>
					<p class="[ padding text-center ]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel nisi nec orci molestie pulvinar. Etiam quis molestie arcu. Suspendisse mollis sem eget nisi mattis cursus.</p>
					<div class="[ text-center ]">
						<a href="#" class="[ button button--small button--highlight ] [ inline-block ]">más información</a>
					</div>
				</div>
				<div class="[ span xmall-12 medium-6 ] [ margin-bottom--large ]">
					<i class="[ icon-airplane ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<h2 class="[ title highlight ] [ text-center ]">Sunland Express</h2>
					<?php
						$sunland_express_query = new WP_Query( 'pagename=sunland-express' );
						if ( $sunland_express_query->have_posts() ) : $sunland_express_query->the_post(); 
							$descripcion_home_express = get_post_meta( $post->ID, '_descripcion_home_express_meta', TRUE );
						endif;
						wp_reset_query();
					?>
					<p class="[ padding text-center ]"><?php echo $descripcion_home_express ?></p>
					<div class="[ text-center ]">
						<a href="<?php echo site_url() . '/sunland-express' ?>" class="[ button button--small button--highlight ] [ inline-block ]">más información</a>
					</div>
				</div>
			</div>
		</div>
	</section><!-- SUNLAND STUDIOS Y EXPRESS -->

	<div id="mapa" style="height:600px; width:100%"></div>
	
<?php get_footer(); ?>









