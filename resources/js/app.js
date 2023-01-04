import './bootstrap';
$(function ()
{
window.showFormErrors = function(errors)
{
	$.each(errors, function(key, value){
		if($('#'+key).length)
		{
			$('#'+key).addClass('border-danger');
			$('<p class="text-small text-danger">'+value+'</p>').insertAfter($('#'+key));
		}
		else
		{
			$('#'+key+'[]').addClass('border-danger');
			$('<p class="text-small text-danger">'+value+'</p>').insertAfter($('#'+key+'[]'));
		}
		
	});
}

window.hideFormErrors = function(fields)
{
	$("p.text-danger").remove();
	$.each(fields, function( index, value ) {
		$(value).removeClass("border-danger");
	});
}
});