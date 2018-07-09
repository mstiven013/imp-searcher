//Load all functions on document init
$(document).ready(function() {
	$('.single-list').select2();
	$('.multiple-list').select2({
		placeholder: 'Elija al menos un servicio'
	});

	searchPosts();
});

function searchPosts() {
	$('#btn-search').on('click', function(e){
		e.preventDefault();

		let errorText = '';
		let errorNames = [];
		let flag = true;

		$(this).html('Buscando...').attr('disabled', 'disabled');

		$('.imp-searcher .required').each(function() {
			if($(this).val() === null || $(this).val() == '0' || $(this).val().length < 1) {

				errorNames.push($(this).attr('id'));

				if(errorNames.length > 1) {
					$('.col-error #text').html(`Los campos: <span id="names">${errorNames.join(', ')}</span> no pueden estar vacíos`);
				} else {
					$('.col-error #text').html(`El campo: <span id="names">${errorNames.join(', ')}</span> no puede estar vacío`);
				}

				$('.col-error').css('display', 'block');
				$('#btn-search').html('Buscar').removeAttr('disabled');
				flag = false;

			}
		});

		if(flag) {
			console.log($('#servicios').val());
			console.log($('#ciudad').val());
		}

	});
}