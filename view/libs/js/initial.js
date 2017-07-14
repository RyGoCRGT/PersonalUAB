$(document).ready(function($) {
  $(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    $(this).removeClass("btn-default").addClass("btn-primary");
  });
  $('.datepicker').datepicker({
    clearBtn: true,
    language: "es"
  });
  $("#controls-left").hide();
  $("#cursos").hide();
  $("#titulos").hide();
  $('#listoAll').hide();
  inputNumber();
  inputLetra();
  inputNumberFloat();
  inputfecha();
  visorDocument();
  $('.componentePersonal').hide();
  cargarImagenLogo();
});

function cargarImagenLogo()
{
  var foto = $('#fotoPerfil').val();
  var res = foto.split("wamp64/www/PersonalUAB/view/")[1];
  if (foto != "") {
    $('.img-fotoPersonal').removeAttr('src');
    $('.img-fotoPersonal').attr('src','../'+res);
  }
}

function visorDocument()
{
  $('.click-titulos').click(function () {
    $("#controls-left").show(1500);
    $("#controls-center").hide(1500);
    $("#titulos").show(1500);
    $("#cursos").hide(1500);
  });
  $('.click-cursos').click(function () {
    $("#controls-left").show(1000);
    $("#controls-center").hide(1500);
    $("#cursos").show(1500);
    $("#titulos").hide(1500);
  });
}

function inputfecha()
{
  $('.datepicker').keypress(function (key) {
    if (true)
        return false;
  });
}

function inputNumberFloat() {
  $('.solo-numero-float').on('input', function () {
    this.value = this.value.replace(/[^._0-9]/g,'');
  });
}

function inputNumber() {
  $('.solo-numero').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g,'');
  });
}

function inputLetra() {
  $('.solo-letra').keypress(function (key) {
    if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode != 45) //retroceso
        && (key.charCode != 241) //ñ
         && (key.charCode != 209) //Ñ
         //&& (key.charCode != 32) //espacio
         && (key.charCode != 225) //á
         && (key.charCode != 233) //é
         && (key.charCode != 237) //í
         && (key.charCode != 243) //ó
         && (key.charCode != 250) //ú
         && (key.charCode != 193) //Á
         && (key.charCode != 201) //É
         && (key.charCode != 205) //Í
         && (key.charCode != 211) //Ó
         && (key.charCode != 218) //Ú
        )
        return false;
  });
}
