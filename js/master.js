$(document).ready(function(){

	
	var width = $('.menu_usuario').width();
	width += (0.055 * width);
	$('.menu_usuario').width(width);


	$(".menu_ajuda").click(menuAjuda);
	$("#submenu_ajuda").click(menuAjuda);

	$('#container').click(function(){
		if( $('#submenu_ajuda').css('display') == 'block') {
			$("#submenu_ajuda").fadeToggle('display');
			$(".menu_ajuda .label").css('font-weight', '100');
		}
	});
	function menuAjuda(){
		if( $('#submenu_ajuda').css('display') == 'none') {
			$(".menu_ajuda .label").css('font-weight', '500');
		} else {
			$(".menu_ajuda .label").css('font-weight', '100');
		}
		$("#submenu_ajuda").fadeToggle('display');
		
		if( $('#submenu_notificacoes').css('display') == 'block') {
			$("#submenu_notificacoes").fadeToggle('display');
			$(".menu_notificacoes .label").css('font-weight', '100');
		}

		if( $('#submenu_usuario').css('display') == 'block') {
			$("#submenu_usuario").fadeToggle('display');
			$(".menu_usuario .label").css('font-weight', '100');
		}
	}

	$(".menu_usuario").click(menuUsuario);
	$("#submenu_usuario").click(menuUsuario);

	function menuUsuario(){
		if( $('#submenu_usuario').css('display') == 'none') {
			$(".menu_usuario .label").css('font-weight', '500');
		} else {
			$(".menu_usuario .label").css('font-weight', '100');
		}
		$("#submenu_usuario").fadeToggle('display');

		if( $('#submenu_notificacoes').css('display') == 'block') {
			$("#submenu_notificacoes").fadeToggle('display');
			$(".menu_notificacoes .label").css('font-weight', '100');
		}

		if( $('#submenu_ajuda').css('display') == 'block') {
			$("#submenu_ajuda").fadeToggle('display');
			$(".menu_ajuda .label").css('font-weight', '100');
		}
	}

	$(".menu_notificacoes").click(menuNotificacoes);
	$("#submenu_notificacoes").click(menuNotificacoes);

	function menuNotificacoes(){
		if( $('#submenu_notificacoes').css('display') == 'none') {
			$('#not_cont').css('background-color', '#6453a2');
		} else {
			$('#not_cont').css('background-color', '#988cc2');
		}
		$("#submenu_notificacoes").fadeToggle('display');

		if( $('#submenu_usuario').css('display') == 'block') {
			$("#submenu_usuario").fadeToggle('display');
			$(".menu_usuario .label").css('font-weight', '100');
		}

		if( $('#submenu_ajuda').css('display') == 'block') {
			$("#submenu_ajuda").fadeToggle('display');
			$(".menu_ajuda .label").css('font-weight', '100');
		}
	}

	/*$(".menu_notificacoes").hover(function(){
		$('#not_cont').css('background-color', '#6453a2');
	}, function(){
		$('#not_cont').css('background-color', '#988cc2');
	});*/
});