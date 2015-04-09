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
