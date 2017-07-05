$(document).ready(function () {
  enviarDatosPersonalHijo();
  nuevoHijo();
  hijosAll();
});

function hijosAll()
{
  $('#allhijos').click(function () {
    $('#hijosContent').click();
    $('#hijosTittle').css('border-color', 'rgb(41, 176, 13)');
  });
}

function enviarDatosPersonalHijo()
{
  $("#frmPersonalHijos").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonHijo").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaHijoInsertar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmHijo").html(info);
      $('.inputHijoBk').attr("disabled","disabled")
    });
  });
}

function nuevoHijo()
{
  $('#nuevoHijoPers').click(function () {
    $('.inputHijoBk').removeAttr('disabled');
    $('.inputHijoBk').val('');
    $('#mensajeFrmHijo').html("");
  });
}
