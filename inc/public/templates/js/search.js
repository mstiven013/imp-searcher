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

		if($('#servicios').val().length < 1 && $('#ciudad').val() == '0') {

			$('.col-error #text').html(`Debes seleccionar al menos un <span class="names">servicio</span> o una <span class="names">Ciudad</span>`);

			$('.col-error').css('display', 'block');
			$('#btn-search').html('Buscar').removeAttr('disabled');
			flag = false;

		}

		$('#servicios').on('change', function() {
			if($('#servicios').val().length > 0) {
				$('.col-error').css('display', 'none');
			}
		});

		$('#ciudad').on('change', function() {
			if($('#ciudad').val() !== 0) {
				$('.col-error').css('display', 'none');
			}
		});

		if(flag) {

			let searching = '<div class="imp-loader"><p>Buscando talleres...</p></div>';

			$('.talleres-loop').html(searching);

			//imp_vars
			$.ajax({
				method: 'POST',
				url: imp_vars.ajaxurl,
				data: {"action": "imp_search_results", "ciudad": $('#ciudad').val(), "servicios": $('#servicios').val()},
				success: function(response) {
					setTimeout(function() {
						$('.talleres-loop').html(response);
						$('#btn-search').html('Buscar').removeAttr('disabled');
					}, 1000);
				}
			});
		}

	});
}