$(document).ready(function () {
  enviarDatosPersonalReferencia();
});

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
    });
  });
}
