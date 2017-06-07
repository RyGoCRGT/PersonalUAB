$(document).ready(function () {
  enviarDatosPersona();
});

function enviarDatosPersona() {
  $("#frmPersona").on("submit", function(e) {
    e.preventDefault();
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaInsertar",
      "data" : frm
    }).done( function(info) {

    $("#mesajePersona").html(info);
    $("#GeneralLI").removeClass('active');
    $("#PersonalLI").addClass('active');

    $("#General").removeClass('active in');
    $("#Personal").addClass('active in');

    });

  });
}
