$(document).ready(function () {
  enviarDatosPersonalReferencia();
  enviarDatosPersonalReferenciaEditar();
});

function enviarDatosPersonalReferenciaEditar()
{
  $("#frmPersonalReferenciaEditar").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonReferencia").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaReferenciaEditar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmReferencia").html(info);
      $('.inputReferBk').attr("disabled", "disabled");
      $('#referenciaContent').click();
      $('#referenciaTittle').css('border-color', 'rgb(41, 176, 13)');
    });
  });
}

function enviarDatosPersonalReferencia() {
  $("#frmPersonalReferencia").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonReferencia").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaReferenciaInsertar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmReferencia").html(info);
      $('.inputReferBk').attr("disabled", "disabled");
      $('#referenciaContent').click();
      $('#referenciaTittle').css('border-color', 'rgb(41, 176, 13)');
    });
  });
}
