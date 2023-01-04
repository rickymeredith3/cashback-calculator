$(function(){
	var addCard = new bootstrap.Modal('#add-card-popup', {
		keyboard: false
	});

	$('#add-card').on('click', function(){
		let form = $('#card-form');
		hideFormErrors(form);
		addCard.show();
	});

	$('#add-reward').on('click', function(){
		$('#rewards-container').append(
			'<div class="row mt-3">'+
				'<div class="col-8">'+
					'<select name="category[]" id="category[]" class="form-select">'+
						'<option value="fitness">Fitness</option>'+
						'<option value="gas">Gas</option>'+
						'<option value="groceries">Groceries</option>'+
						'<option value="online purchases">Online Purchases</option>'+
						'<option value="restaurants">Restaurants</option>'+
						'<option value="streaming services">Streaming Services</option>'+
						'<option value="travel">Travel</option>'+
						'<option value="Other">Other</option>'+
					'</select>'+
				'</div>'+
				'<div class="col-3">'+

					'<select class="form-select" name="rewards[]" id="rewards[]">'+
						'<option value="1">1%</option>'+
						'<option value="2">2%</option>'+
						'<option value="3">3%</option>'+
						'<option value="4">4%</option>'+
						'<option value="5">5%</option>'+
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
		hideFormErrors(form);

		$.post('/api/add-card', form.serialize(), function(response)
		{
			if(response.success == false)
			{
				showFormErrors(response.errors)
			}
			else
			{
				addCard.hide();
				$('#cards').load(location.href + ' #cards');
				$('#calculator').load(location.href + ' #calculator');
			}
		});
	});

	$('#calculate').on('click', function()
	{
		card = $('#calc-category').val()
		$.get("/api/calculate/" + card, function(response){
			console.log(response.reward, response.card);
			$('#result-card').text(response.card + '          ');
			$('#result-reward').text('          ' + response.reward + '%          ');
			$('#results').show();
		})
	});
});