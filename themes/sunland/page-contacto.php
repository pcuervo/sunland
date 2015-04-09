<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$contact_info_query = new WP_Query( 'pagename=info-general' );
	if ( $contact_info_query->have_posts() ) : $contact_info_query->the_post(); 
		$telefono1 = get_post_meta( $post->ID, '_telefono1_meta', TRUE );
		$telefono2 = get_post_meta( $post->ID, '_telefono2_meta', TRUE );
		$email = get_post_meta( $post->ID, '_email_meta', TRUE );
		$direccion = get_post_meta( $post->ID, '_direccion_meta', TRUE );
	endif;
	wp_reset_query();
?>

	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>

	<!-- SUNLAND STUDIOS -->
	<section class="[ wrapper ]">
		<div class="[ row ]">
			<div class="[ columna xmall-12 medium-5 ] [ margin-bottom ]">
				<h3>Teléfonos</h3>
				<p><?php echo $telefono1 ?></p>
				<p><?php echo $telefono2 ?></p>
				<h3>E-mail</h3>
				<p><?php echo $email ?></p>
				<form>
					<fieldset>
						<label for="nombre">Nombre completo</label>
						<input type="text" name="nombre">
					</fieldset>
					<fieldset>
						<label for="email">Correo electrónico</label>
						<input type="text" name="email">
					</fieldset>
					<fieldset>
						<label for="tel">Teléfono</label>
						<input type="text" name="tel">
					</fieldset>
					<fieldset>
						<label for="mensaje">Tu mensaje</label>
						<textarea name="mensaje" id="" cols="30" rows="10"></textarea>
					</fieldset>
					<fieldset>
						<input type="hidden" name="action" value="send_contact">
						<input type="hidden" name="email_to" value="<?php echo $email ?>">
						<input type="submit" value="enviar">
					</fieldset>
				</form>
			</div>
			<div class="[ columna xmall-12 medium-7 ]" id="mapa" style="height:600px"></div>
		</div>
	</section>
	<!--  -->

<?php
	get_footer();
?>