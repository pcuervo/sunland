(function( $ ) {



	$('#geo-autocomplete').geocomplete({
		details: "#post",
		detailsAttribute: "data-geo"
	});

	$('.js-datepicker').datepicker({
		changeMonth: 	true,
		changeYear: 	true,
		dateFormat: 	'yy-mm-dd'
	});



}(jQuery));