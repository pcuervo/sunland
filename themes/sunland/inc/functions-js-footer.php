<?php 





	/**
	* Here we add all the javascript that needs to be run on the footer. 
	**/
	function footer_scripts(){
		global $post;

		if( wp_script_is( 'functions', 'done' ) ) {
?>
			<script type="text/javascript">
				(function( $ ) {
					"use strict";
					$(function(){
						<?php 
						if( 'contacto' == $post->post_name || is_home() ) {
							$coord = get_map_coordinates();
							$lat = $coord['lat'];
							$lon = $coord['lon'];
							$direccion = get_info_general( 'direccion' );
						?>
							loadMap('<?php echo $lat ?>', '<?php echo $lon ?>', '<?php echo $direccion ?>');
						<?php 
						} 
						?>
					});
				}(jQuery));
			</script>

	<?php }
	}// footer_scripts