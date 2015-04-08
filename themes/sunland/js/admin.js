(function( $ ) {



	$('input#geo-autocomplete').geocomplete({
		details: "#post",
		detailsAttribute: "data-geo"
	});



}(jQuery));