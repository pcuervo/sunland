var $=jQuery.noConflict();

/*------------------------------------*\
	FUNCTIONS
\*------------------------------------*/






/*------------------------------------*\
	AJAX FUNCTIONS
\*------------------------------------*/



/**
 * Save contact form data as WP post.
 * @params int postID 
 */
function addDateEventMetabox( postID ){
	var data = {};
	
	data['post_id'] = postID;
	data['action'] = 'add_date_event_metabox';
	$.post(
		ajax_url,
		data,
		function( response ){
			console.log( response );
			var message_json = $.parseJSON( response );
			
			if( message_json.error == '0' ){
				var html_date_input = '' + 
					'<hr><label>Día 2:</label> ' +  
					'<input type="text" class="[ widefat ][ js-datepicker ]" name="_dia2_meta"/>' +
					'<label>Hora 2:</label>' +
					'<input type="text" class="[ widefat ]" name="_hora2_meta" />';		

				$('.js-add-date-metaboxes').before( html_date_input );		
			}
		}
	);

}// addDateEventMetabox