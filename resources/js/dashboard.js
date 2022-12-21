$(function(){
	var addCard = new bootstrap.Modal('#add-card-popup', {
		keyboard: false
	});

	$('#add-card').on('click', function(){
		console.log('this works');
		addCard.show();
	});
});