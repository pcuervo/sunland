
<?php require_once('functions.php'); ?>

<?php get_header(); ?>

	<!-- BANNER -->
	<div class="[ relative ]">
		<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">
			<div class="[ opacity-gradient square ]">
				<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
					<h1 class="[ text-center light ]">Sunland School of the Arts, Escuela multidisciplinaria de artes escénicas en la Ciudad de México.</h1>
					<i class="[ scroll-down ][ block ][ xmall-12 ][ light ][ text-center ][ icon-angle-down ]"></i>
				</div>
			</div>
			<video class="[ bg-video bg-video-home ]" autoplay loop poster="<?php echo THEMEPATH; ?>images/intro.png">
				<source src="<?php echo THEMEPATH; ?>videos/intro.webm" type="video/webm">
				<source src="<?php echo THEMEPATH; ?>videos/intro.mp4" type="video/mp4">
				<source src="<?php echo THEMEPATH; ?>videos/intro.ogv" type="video/ogg">
			</video>
		</div>
	</div><!-- BANNER -->

	<div class="[ scroll-anchor ]"></div>

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
							<div class=" [ columna xmall-12 small-8 large-6 ] [ center block ] [ margin-bottom ] [ text-center ]">
								<?php the_content()?>
							</div>
							<div class="[ text-center ]">
								<a href="<?php echo site_url('nosotros'); ?>" class="[ button button--small button--highlight ] [ inline-block ]">más información</a>
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
	<?php
		$quote_args = array(
			'post_type' 		=> 'quotes',
			'posts_per_page' 	=> 1,
		);
		$query_quotes = new WP_Query( $quote_args );
		if ( $query_quotes->have_posts() ) : $query_quotes->the_post();
			$quote_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	?>
		<section class="[ margin-bottom--large ] [ bg-highlight ]">
			<div class="[ row ]">
				<div class="[ bg-image ][ span xmall-12 medium-6 xmedium-8 large-9 ]" style="background-image: url(<?php echo $quote_img_url[0]; ?>)">
					<div class="[ opacity-gradient ] [ main-tile ]">
					</div>
				</div>
				<div class="[ span xmall-12 medium-6 xmedium-4 large-3 ][ secondary-tile ] [ relative ]">
					<div class="[ center-full ]">
						<i class="[ icon-icon-quote-01 icon-large ][ text-center ] [ block ]"></i>
						<p><?php the_content(); ?></p>
						<p class="[ text-right ]"><?php the_title(); ?></p>
					</div>
				</div>
			</div>
		</section><!-- QUOTE -->
	<?php endif; wp_reset_query(); ?>

	<!-- TALLERES -->
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [  ]">
					<h2 class="[ title ] [ text-center ]">Nuestros talleres</h2>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<a href="<?php echo site_url('danza') ?>">
						<i class="[ icon-icon-dance ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					</a>
					<h2 class="[ title ] [ text-center ]">
						<a class="[ dark ]" href="<?php echo site_url('danza') ?>">
							Danza
						</a>
					</h2>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<a href="<?php echo site_url('musica') ?>">
						<i class="[ icon-icon-music-47 ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<h2 class="[ title ] [ text-center ]">
						<a class="[ dark ]" href="<?php echo site_url('musica') ?>">
							Música
						</a>
					</h2>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<a href="<?php echo site_url('teatro') ?>">
						<i class="[ icon-icon-theater ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					</a>
					<h2 class="[ title ] [ text-center ]">
						<a class="[ dark ]" href="<?php echo site_url('teatro') ?>">
							Teatro
						</a>
					</h2>
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
					'posts_per_page' 	=> 4,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo-de-staff',
							'field'    => 'slug',
							'terms'    => array('talleres', 'intensivo'),
						),
					),
				);
				$query_instructores = new WP_Query( $instructores_args );
				if ( $query_instructores->have_posts() ) : while ( $query_instructores->have_posts() ) : $query_instructores->the_post();

					$instructor_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
					$term_materias = wp_get_post_terms( $post->ID, 'materia', array('fields' => 'names') );
					$materias = get_formatted_materias( $term_materias );
				?>
					<div class="[ span xmall-12 medium-4 large-3 ] [ padding ]">
						<div class="[ bg-light ] [ relative ] [ instructor-image ]">
							<div class="[ text-center ][ center-full ][ xmall-11 ][ z-index-10 ]">
								<a href="<?php the_permalink() ?>" class="[ button button--large button--highlight ]">ver perfil</a>
							</div>
							<img src="<?php echo $instructor_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
						<p class="[  ]"><?php echo $materias; ?></p>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('nosotros'); ?>#instructores" class="[ button button--large button--dark ] [ inline-block ]">ver todos nuestros instructores</a>
				</div>
			</div>
		</div>
	</section><!-- INSTRUCTORES -->

	<!-- EVENTOS FORO SUNALND -->
	<section class="[ margin-bottom--large ]">
		<div class="wrapper">
			<div class="row">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ margin-bottom ]">Próximos eventos en el Foro Sunland</h2>
					<i class="[ icon-marker ] [ icon-medium ] [ highlight ] [ text-center center block ]"></i>
				</div>

				<?php
					$instructores_args = array(
						'post_type' 		=> 'eventos',
						'posts_per_page' 	=> 3,
					);
					$query_events = new WP_Query( $instructores_args );
					if ( $query_events->have_posts() ) : while ( $query_events->have_posts() ) : $query_events->the_post();
						$event_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
						$meta_date = rwmb_meta( '_fecha', '', $post->ID );
				?>
						<div class="[ columna xmall-12 medium-4 ]">
							<a class="[ dark ]" href="<?php the_permalink(); ?>">
								<img src="<?php echo $event_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
							</a>
							<h2 class="[ sub-title ] [ text-center ]">
								<a class="[ dark ]" href="<?php the_permalink(); ?>">
									<?php the_title() ?>
								</a>
							</h2>
							<p class="[ text-center ]">
							<?php if( $meta_date ) : 
								foreach ( $meta_date as $key => $date_time ) : 
									$formatted_datetime = get_formatted_event_datetime( $date_time ); 
									echo $formatted_datetime . '<br />';
								endforeach;
							endif; ?>
							</p>
						</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="[ clear ]"></div>
				<div class="[ text-center ]">
					<a href="<?php echo site_url('foro-sunland#calendar-section'); ?>" class="[ button button--small button--highlight ] [ inline-block ]">ver más eventos</a>
				</div>
			</div>
		</div>
	</section>
	<!-- EVENTOS FORO SUNLAND -->

	<!-- SUNLAND STUDIOS Y EXPRESS -->
	<section class="[ bg-dark ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<?php
					$sunland_studios_query = new WP_Query( 'pagename=sunland-studios' );
					if ( $sunland_studios_query->have_posts() ) : $sunland_studios_query->the_post();
						$descripcion_home_studios = get_post_meta( $post->ID, '_descripcion_home_studios_meta', TRUE );
				?>
					<div class="[ span xmall-12 medium-6 ] [ margin-bottom--large ]">
						<i class="[ icon-icon-airplane-01 ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
						<h2 class="[ title highlight ] [ text-center ]"><?php the_title() ?></h2>
							<p class="[ padding text-center ]"><?php echo $descripcion_home_studios ?></p>
						<div class="[ text-center ]">
							<a href="<?php echo site_url() . '/sunland-studios' ?>" class="[ button button--small button--highlight ] [ inline-block ]">renta el estudio</a>
						</div>
					</div>
				<?php
					endif;
					wp_reset_query();

					$sunland_express_query = new WP_Query( 'pagename=sunland-express' );
					if ( $sunland_express_query->have_posts() ) : $sunland_express_query->the_post();
						$descripcion_home_express = get_post_meta( $post->ID, '_descripcion_home_express_meta', TRUE );
				?>
						<div class="[ span xmall-12 medium-6 ] [ margin-bottom--large ]">
							<i class="[ icon-icon-airplane-48 ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>

							<h2 class="[ title highlight ] [ text-center ]"><?php the_title() ?></h2>
							<p class="[ padding text-center ]"><?php echo $descripcion_home_express ?></p>
							<div class="[ text-center ]">
								<a href="<?php echo site_url() . '/sunland-express' ?>" class="[ button button--small button--highlight ] [ inline-block ]">conoce más</a>
							</div>
						</div>
				<?php
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</section><!-- SUNLAND STUDIOS Y EXPRESS -->

	<div id="mapa" class="[ home-map ][ xmall-12 ]"></div>

<?php get_footer(); ?>


