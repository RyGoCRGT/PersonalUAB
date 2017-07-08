$(document).ready(function($) {
  $(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    $(this).removeClass("btn-default").addClass("btn-primary");
  });
  $('.datepicker').datepicker({
    clearBtn: true,
    language: "es"
  });
  $('#listoAll').hide();
  inputNumber();
  inputLetra();
  inputNumberFloat();
});

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
