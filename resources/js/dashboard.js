$(function(){
	var addCard = new bootstrap.Modal('#add-card-popup', {
		keyboard: false
	});

	$('#add-card').on('click', function(){
		console.log('this works');
		addCard.show();
	});

	$('#add-reward').on('click', function(){
		$('#rewards-container').append(
			'<div class="row">'+
				'<div class="col-8">'+
					'<label class="col-form-label" for="category">Category</label>'+
					'<input type="text" class="form-control" name="category[]">'+
				'</div>'+
				'<div class="col-3">'+
					'<label class="col-form-label" for="rewards">Cashback</label>'+
					'<select class="form-select" name="rewards[]" id="rewards-dropdown">'+
						'<option value="1">1%</option>'+
						'<option value="2">2%</option>'+
						'<option value="3">3%</option>'+
						'<option value="4">4%</option>'+
						'<option value="5">5%</option>'+
						'<option value="0">Other</option>'+
					'</select>'+
				'</div>'+
			'</div>'
		);
	});

	$('#remove-reward').on('click', function(){
		$('#rewards-container').children().last().remove();
	});

	$('#save-card').on('click', function(){
		let form = $('#card-form');

		$.post('/api/add-card', form.serialize(), function(response)
		{
			if(response.success == false)
			{
				//
			}
			else
			{
				addCard.hide();
				$('#container').load(location.href + ' #container');
			}
		});
	});
});