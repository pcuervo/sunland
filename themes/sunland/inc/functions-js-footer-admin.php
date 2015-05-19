<?php

	/**
	* Here we add all the javascript that needs to be run on the footer.
	**/
	function footer_admin_scripts(){
		global $post;
?>
			<script type="text/javascript">
				(function( $ ) {
					"use strict";
					$(function(){

						/**
						 * On load
						**/

						$('#geo-autocomplete').geocomplete({
							details: "#post",
							detailsAttribute: "data-geo"
						});

						$('.js-datepicker').datepicker({
							changeMonth: 	true,
							changeYear: 	true,
							dateFormat: 	'yy-mm-dd'
						});

						/**
						 * Triggered events
						**/

						$('.js-add-date-metaboxes').on('click', function(e){
							e.preventDefault();

							var currentPost = $(this).data('post');
							addDateEventMetabox(currentPost);
						});



					});
				}(jQuery));
			</script>

<?php 
	}// footer_admin_scripts