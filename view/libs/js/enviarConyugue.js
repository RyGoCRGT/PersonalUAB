$(document).ready(function () {
  enviarDatosPersonalConyugue();
});

function enviarDatosPersonalConyugue() {
  $("#frmPersonalConyugue").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonConyu").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaConyugueInsertar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmCon").html(info);
    });
  });
}
