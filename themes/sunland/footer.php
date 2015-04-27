
			</div><!-- main -->
			<footer>
				<section class="[ bg-highlight ]">
					<div class="[ wrapper ] [ padding ]">
						<div class="[ row ]">
							<?php 
								$contact_info_query = new WP_Query( 'pagename=info-general' );
								if ( $contact_info_query->have_posts() ) : $contact_info_query->the_post(); 
									$facebook = get_post_meta( $post->ID, '_facebook_meta', TRUE );
									$twitter = get_post_meta( $post->ID, '_twitter_meta', TRUE );
									$instagram = get_post_meta( $post->ID, '_instagram_meta', TRUE );
									$youtube = get_post_meta( $post->ID, '_youtube_meta', TRUE );
									$telefono1 = get_post_meta( $post->ID, '_telefono1_meta', TRUE );
									$telefono2 = get_post_meta( $post->ID, '_telefono2_meta', TRUE );
									$email = get_post_meta( $post->ID, '_email_meta', TRUE );
									$direccion = get_post_meta( $post->ID, '_direccion_meta', TRUE );
								endif;
								wp_reset_query();
							?>
							<div class="[ columna xmall-12 medium-4 ] [ text-center ] [ margin-bottom ]">
								<p>Síguenos en:</p>
								<p>
									<a href="<?php echo $facebook ?>"><i class="[ icon-facebook ] [ icon-medium ]"></i></a>
									<a href="<?php echo $twitter ?>"><i class="[ icon-twitter ] [ icon-medium ]"></i></a>
									<a href="<?php echo $youtube ?>"><i class="[ icon-youtube-play ] [ icon-medium ]"></i></a>
									<a href="<?php echo $instagram ?>"><i class="[ icon-instagram ] [ icon-medium ]"></i></a>
								</p>
							</div>
							<div class="[ columna xmall-12 medium-4 ] [ text-center ] [ margin-bottom ]">
								<p>Teléfonos: <a href="tel:+55890527" class="[ light ]"><?php echo $telefono1 ?></a> / <a href="tel:+52946813" class="[ light ]"><?php echo $telefono2 ?></a></p>
								<p>E-mail: <a href="mailto:<?php echo $email ?>" class="[ light ]"><?php echo $email ?></a></p>
							</div>
							<div class="[ columna xmall-12 medium-4 xm ] [ ] [ margin-bottom ]">
								<img src="<?php echo THEMEPATH ?>images/logo-sierra-nevada.png" class="[ span xmall-6 medium-8 xmedium-5 large-4 center block ][ image-responsive ]">
							</div>
							<div class="clear"></div>
							<div class="[ columna xmall-12 center block ] [ text-center ]">
								<p><?php echo $direccion ?></p>
							</div>
							<div class="[ columna xmall-12 center block ] [ text-center ]">
								<p>Términos y condiciones / Políticas de privacidad</p>
							</div>
						</div>
					</div>
				</section>
			</footer>
			<?php wp_footer(); ?>

		</div><!-- container -->

		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	</body>
</html>	


