$(document).ready(function(){

	//AUMENTA A LARGURA DO ITEM QUE CONTÉM O NOME DO USUÁRIO EM 5,5%
	//PARA NÃO "DANÇAR" NO HOVER
	var width = $('.menu_usuario').width();
	width += (0.085 * width);
	$('.menu_usuario').width(width);

	$('#submenus_overlay').click(function(){
		if( $('#submenu_notificacoes').css('display') == 'block') {
			$("#submenu_notificacoes").fadeToggle('display');
			$("#submenus_overlay").fadeToggle('display');
			$(".menu_notificacoes .label").css('font-weight', '200');
		}

		if( $('#submenu_ajuda').css('display') == 'block') {
			$("#submenu_ajuda").fadeToggle('display');
			$("#submenus_overlay").fadeToggle('display');
			$(".menu_ajuda .label").css('font-weight', '200');
		}
		
		if( $('#submenu_usuario').css('display') == 'block') {
			$("#submenu_usuario").fadeToggle('display');
			$("#submenus_overlay").fadeToggle('display');
			$(".menu_usuario .label").css('font-weight', '200');
		}

	});

	$(".menu_ajuda").click(menuAjuda);
	$("#submenu_ajuda").click(menuAjuda);

	function menuAjuda(){
		if( $('#submenu_ajuda').css('display') == 'none') {
			$(".menu_ajuda .label").css('font-weight', '700');
		} else {
			$(".menu_ajuda .label").css('font-weight', '200');
		}
		$("#submenu_ajuda").fadeToggle('display');
		$("#submenus_overlay").fadeToggle('display');
		
		if( $('#submenu_notificacoes').css('display') == 'block') {
			$("#submenu_notificacoes").fadeToggle('display');
			$(".menu_notificacoes .label").css('font-weight', '200');
		}

		if( $('#submenu_usuario').css('display') == 'block') {
			$("#submenu_usuario").fadeToggle('display');
			$(".menu_usuario .label").css('font-weight', '200');
		}
	}

	$(".menu_usuario").click(menuUsuario);
	$("#submenu_usuario").click(menuUsuario);

	function menuUsuario(){
		if( $('#submenu_usuario').css('display') == 'none') {
			$(".menu_usuario .label").css('font-weight', '700');
		} else {
			$(".menu_usuario .label").css('font-weight', '200');
		}
		$("#submenu_usuario").fadeToggle('display');
		$("#submenus_overlay").fadeToggle('display');

		if( $('#submenu_notificacoes').css('display') == 'block') {
			$("#submenu_notificacoes").fadeToggle('display');
			$(".menu_notificacoes .label").css('font-weight', '200');
		}

		if( $('#submenu_ajuda').css('display') == 'block') {
			$("#submenu_ajuda").fadeToggle('display');
			$(".menu_ajuda .label").css('font-weight', '200');
		}
	}

	$(".menu_notificacoes img").click(menuNotificacoes);

	function menuNotificacoes(){
		if( $('#submenu_notificacoes').css('display') == 'none') {
			$('#not_cont').css('background-color', '#6453a2');
		} else {
			$('#not_cont').css('background-color', '#988cc2');
		}
		$("#submenu_notificacoes").fadeToggle('display');
		$("#submenus_overlay").fadeToggle('display');

		if( $('#submenu_usuario').css('display') == 'block') {
			$("#submenu_usuario").fadeToggle('display');
			$(".menu_usuario .label").css('font-weight', '200');
		}

		if( $('#submenu_ajuda').css('display') == 'block') {
			$("#submenu_ajuda").fadeToggle('display');
			$(".menu_ajuda .label").css('font-weight', '200');
		}
	}

	/*$(".menu_notificacoes").hover(function(){
		$('#not_cont').css('background-color', '#6453a2');
	}, function(){
		$('#not_cont').css('background-color', '#988cc2');
	});*/
});