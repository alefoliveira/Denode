$(document).ready(function(){

var is_valid = [];
//PROBLEMA NO FORM IS VALID

$("input").focus( function (){
        $(this).css("border-color", "#199ad9");
        $(".erro").fadeTo("slow", 0, function(){});
        }).blur(function(){
            var form_is_valid = is_valid.length;
            if(form_is_valid >= 7){
                $('#add').prop('disabled', false);
            };
        });

var VALIDATION = {
    //verifica as letras
    letters_only: function(texto, empty_erro, type_erro){
        texto./*keypress(function(key) {
        if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) return false; //botao pressionado
        }).*/blur( function () { //saiu da caixa
            var input = texto;
            var re = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ ]+$/;
            var is_letter = re.test(input.val());

         if(input.val().length <= 1 || input.val() == ''){
            ERROS.erro_empty(texto, empty_erro);
        } else if(is_letter) {
            ERROS.valid(texto); //yes
        } else {
        ERROS.invalid_type(texto, type_erro); //no
    }
})},//FIM LETTERS ONLY

    numbers_only: function(texto, empty_erro, type_erro, quant){
        texto.keypress(function(key) {
        if(texto.val().length >= quant) return false;
        
    }).blur( function () {
    var input = texto;
    var re = /^(?=.*\d)[0-9]{11}$/;
    var is_number = re.test(input.val());
    
     if(input.val().length == 0 || input.val() == ''){
            ERROS.erro_empty(texto, empty_erro);
        } else if(is_number) {
            ERROS.valid(texto); //yes
            check_cpf_ajax(texto.val());//(key.charCode < 48 || key.charCode > 57 || texto.val().length >= quant) return false;
        } else {
        ERROS.invalid_type(texto, type_erro);
    }
})},  //FIM NUMBERS ONLY

    email_only: function(texto, empty_erro, type_erro){
        texto.blur( function () {
    var input = texto;
    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var is_email = re.test(input.val());
    
    if(input.val().length == 0 || input.val() == ''){
            ERROS.erro_empty(texto, empty_erro);
        } else if(is_email) {
            ERROS.valid(texto); //yes
        } else {
        ERROS.invalid_type(texto, type_erro);
    }
})} //FIM EMAIL ONLY

};// FIM VALIDATION

var ERROS = {
    erro_empty: function(texto, empty_erro) {
        texto.css("border-color", "#ff3333"); //no
        //$empty_erro.text('')
        empty_erro.fadeTo("slow", 1, function(){});
    },

    invalid_type: function(texto, type_erro){
        texto.css("border-color", "#cd2626"); //no
        type_erro.fadeTo("slow", 1, function(){});
    },
    valid: function(texto){
        texto.css("border-color", "#7cfc00"); //yes
        is_valid.push(1);
    },
    ja_existe: function(texto, type_erro){
        texto.css("border-color", "#cd2626"); //no
        type_erro.fadeTo("slow", 1, function(){});
    }
}

VALIDATION.letters_only($('#nome'), $('#err3'), $('#err4'));
VALIDATION.letters_only($('#sobrenome'), $('#err5'), $('#err6'));
VALIDATION.letters_only($('#cargo'), $('#err13'), $('#err14'));
VALIDATION.numbers_only($('#cpf'), $('#err1'), $('#err2'), 11);
VALIDATION.email_only($('#email'), $('#err9'), $('#err10'));

$("#senha").blur( function () {
    var input = $(this);
    
    if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err11").fadeTo("slow", 1, function(){});
        } else if(input.val().length > 7) { //falta checar pq essa porra nao funciona
        ERROS.valid($(this)); //yes
    } else {
        $(this).css("border-color", "#ff3333"); //no
        $("#err12").fadeTo("slow", 1, function(){});
    }
});

$("#anonascimento").keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
    }).blur( function () {
    var input = $(this);
    var re = /^(?=.*\d)[0-9]{4}$/;
    var is_number = re.test(input.val());
    
    if(input.val().length == 0 || input.val() == ''){
        $(this).css("border-color", "#ff3333"); //no - empty
        $("#err7").fadeTo("slow", 1, function(){});
        } 
    else if(is_number) { 
        if(1900 > input.val() || 2010 < input.val()) {
        $(this).css("border-color", "#ff3333"); //no - ano invalido
        $("#err8").fadeTo("slow", 1, function(){});
    } else {
        ERROS.valid($(this)); //yes - ano valido
    }} 
    else {
        $(this).css("border-color", "#ff3333"); //idk what u typed
        $("#err8").fadeTo("slow", 1, function(){});
    }
});

$('#sexo').change(function(){
    if((this).checked){
    is_valid.push(1);
    alert(is_valid);
    }
});

var xmlhttp = new XMLHttpRequest();
function check_cpf_ajax(cpf){
    $.ajax({
            type: 'post', 
            url: 'apoio/ajax_checker.php?cpf=' + cpf,
            data: "{cpf:" + cpf + "}",
            success: function (resposta){
              if(resposta == 'OK'){
                $('#err20').val('OK');
                ERROS.valid($('#cpf'));
                alert(resposta);
              } else if(resposta == 'NO'){
                $('#err20').val('NO');
                ERROS.ja_existe($('#cpf'), $('#err20'));
                alert(resposta);
              } else {
                alert(resposta);
              }
            }
          });
}
});
