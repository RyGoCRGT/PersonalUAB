$(document).ready(function () {
  enviarDatosUsuario();
});

function enviarDatosUsuario() {
  $("#frmUsuario1").on("submit", function(e) {
    e.preventDefault();

    var ci = $("#ciNit").val();
    $("#ciPerson").val(ci);

    var frm = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=usuarioInsertar",
      "data" : frm
    }).done( function(info) {
     $("#mensajeUsu").html(info);
    });
  });
}
