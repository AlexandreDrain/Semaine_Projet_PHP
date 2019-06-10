$(document).ready(function() {
	
	// $('header figure img').first().on('click', function() {
	// 		console.log('img[href="Logo"]');
	// 		// $(this).
	// });

	$('nav').mouseenter(function() {

		console.log(this)

		 $(this).parent().find('ul').slideDown();

		// $(this).mouseleave(function(){
		// 	$('#sous_menu').slideUp(500);
				
		// 	});
		});

})