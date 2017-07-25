$(document).ready(function(){
	$('.obrigatorio').focusout(function() { 
		
		$nomeElemento = $(this).attr('name');

		$elementoAnterior = $(this).prev();

		console.log($elementoAnterior);

		if ($elementoAnterior.is(':checkbox')) {console.log($nomeElemento);
			if (!$('input[name="' + $nomeElemento + '"]').is(':checked')){
				console.log($nomeElemento);
			}
		}
	});
});