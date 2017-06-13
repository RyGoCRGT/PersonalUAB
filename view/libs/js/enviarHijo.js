$(document).ready(function () {
  enviarDatosPersonalHijo();
});

function enviarDatosPersonalHijo() {
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
    });
  });
}
