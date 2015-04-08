<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
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
				<p>333</p>
				<h3>E-mail</h3>
				<p>s@d.com</p>
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
						<input type="submit" value="enviar">
					</fieldset>
				</form>
			</div>
			<div class="[ columna xmall-12 medium-5 ]" id="mapa">
			
			</div>
		</div>
	</section>
	<!--  -->

<?php
	get_footer();
?>