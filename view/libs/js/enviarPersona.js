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

      $("#primerNombre").attr("disabled","disabled");
      $("#segundoNombre").attr("disabled", "disabled");
      $("#apellidoPaterno").attr("disabled", "disabled");
      $("#apellidoMaterno").attr("disabled", "disabled");
      $("#ciNit").attr("disabled", "disabled");
      $("#lugarExpedicion").attr("disabled", "disabled");
      $("#fechaNac").attr("disabled", "disabled");
      $("#estadoCivil").attr("disabled", "disabled");
      $("#telefono").attr("disabled", "disabled");
      $(".sexo").attr("disabled", "disabled");


      $("#mesajePersona").html(info);
      $("#GeneralLI").removeClass('active');
      $("#PersonalLI").addClass('active');

      $("#General").removeClass('active in');
      $("#Personal").addClass('active in');

      $('html,body').animate({
        scrollTop: $("#wrapper").offset().top
      }, 1000);

    });

  });
}
