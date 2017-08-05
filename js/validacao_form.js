$(document).ready(function(){
	$('.obrigatorio').focusout(function() { 
		
		$nomeElemento = $(this).attr('name');

		$elementoAnterior = $(this).prev().attr("[type='checkbox[name='" + $nomeElemento + "']");

		console.log($elementoAnterior);

		if (!$("[type='checkbox[name='" + $nomeElemento + "']").is(":checked")){

			$(".obrigatorio").css('border', '#f0f 1px solid')
		}

		if ($(this).prev().attr("[type='checkbox[name='" + $nomeElemento + "']")) {
			console.log($nomeElemento);
			if ($('input[name="' + $nomeElemento + '"]').is(':checked')){
				
			}
		}
	});
});