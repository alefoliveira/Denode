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
    
    letters_only: function(texto, type_erro){
        texto./*keypress(function(key) {
        
        if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) return false; //botao pressionado
        }).*/blur( function () { //saiu da caixa
            var input = texto;
            var re = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ ]+$/;
            var is_letter = re.test(input.val());

         if(input.val().length <= 1 || input.val() == ''){
            ERROS.erro_empty(texto, type_erro);
        } else if(is_letter) {
            ERROS.valid(texto); //yes
        } else {
        ERROS.invalid_type(texto, type_erro, 'letter'); //no
        }
})},//FIM LETTERS ONLY

    numbers_only: function(texto, type_erro, quant){
        texto.blur( function () { //saiu da caixa
            var input = texto;
            var re = /^[0-9]+$/;
            var is_number = re.test(input.val());

         if(input.val().length == 0 || input.val() == ''){
            ERROS.erro_empty(texto, type_erro);
        } else if(is_number) {
            if(input.length = quant){
                ERROS.valid(texto); //yes
            } else {
                ERROS.invalid_type(texto, type_erro, 'number'); //no
            }
        } else {
        ERROS.invalid_type(texto, type_erro, 'number'); //no
        }
})},  //FIM NUMBERS ONLY

    email_only: function(texto, type_erro){
        texto.blur( function () {
    var input = texto;
    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var is_email = re.test(input.val());
    
    if(input.val().length == 0 || input.val() == ''){
            ERROS.erro_empty(texto, type_erro);
        } else if(is_email) {
            ERROS.valid(texto); //yes
        } else {
        ERROS.invalid_type(texto, type_erro, 'email');
    }
})}, //FIM EMAIL ONLY

    letters_numbers: function(texto, type_erro){
        texto.blur( function () { //saiu da caixa
            var input = texto;
            var re = /^[0-9A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ,'. ]+$/;
            var is_letter = re.test(input.val());

         if(input.val().length <= 1 || input.val() == ''){
            ERROS.erro_empty(texto, type_erro);
        } else if(is_letter) {
            ERROS.valid(texto); //yes
        } else {
        ERROS.invalid_type(texto, type_erro, 'lnn'); //no
    }
})}

};// FIM VALIDATION

var ERROS = {
    erro_empty: function(texto, type_erro) {
        texto.css("border-color", "#ff3333"); //no
        //$empty_erro.text('')
        type_erro.text('Campo precisa ser preenchido');
        type_erro.fadeTo("slow", 1, function(){});
    },

    invalid_type: function(texto, type_erro, type_value){
        texto.css("border-color", "#cd2626"); //no
        if(type_value == 'letter'){
            type_erro.text('Somente letras são permitidas');
        } else if (type_value == 'number'){
            type_erro.text('Somente números são permitidos');
        } else if(type_value == 'email'){
            type_erro.text('Por favor, insira um email válido. Ex: maria@silva.com');
        } else if(type_value == 'address'){
            type_erro.text('Por favor, insira um endereço válido. Ex: Avenida Paulista, 29');
        } else if(type_value == 'lnn'){
            type_erro.text('Por favor, insira um nome válido (permitido: letras, números, espaço, vírgula. Ex: Studio 54, New York)');
        }
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

VALIDATION.letters_only($('#nome'), $('#err1'));
VALIDATION.letters_only($('#sobrenome'), $('#err2'));
VALIDATION.letters_only($('#cargo'), $('#err5'));
VALIDATION.numbers_only($('#cpf'), $('#err4'), 11);
VALIDATION.email_only($('#email'), $('#err6'));

$("#senha").blur( function () {
    var input = $(this);
    var re = /^[0-9A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ,'. ]+$/;
    var is_password = re.test(input.val());
    
    if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err7").text('Campo precisa ser preenchido');
        $("#err7").fadeTo("slow", 1, function(){});

    } else if(input.val().length > 7) {
        if(is_password){
        ERROS.valid($(this)); //yes
        } else {
            $(this).css("border-color", "#ff3333"); //no
            $("#err7").text('Por favor, insira uma senha válida. Ela deve conter pelo menos 8 caracteres que podem ser números, letras, vírgulas e pontos. ');
            $("#err7").fadeTo("slow", 1, function(){});
        }
    } else {
        $(this).css("border-color", "#ff3333"); //no
        $("#err7").text('Por favor, insira uma senha válida. ');
        $("#err7").fadeTo("slow", 1, function(){});
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
         $("#err3").text('Campo precisa ser preenchido');
        $("#err3").fadeTo("slow", 1, function(){});
        } 
    else if(is_number) { 
        if(1900 > input.val() || 2010 < input.val()) {
        $(this).css("border-color", "#ff3333"); //no - ano invalido
         $("#err3").text('Por favor, insira seu ano de nascimento.');
        $("#err3").fadeTo("slow", 1, function(){});
    } else {
        ERROS.valid($(this)); //yes - ano valido
    }} 
    else {
        $(this).css("border-color", "#ff3333"); //idk what u typed
        $("#err3").fadeTo("slow", 1, function(){});
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
