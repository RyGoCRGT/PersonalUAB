$(document).ready(function () {
  enviarDatosPersona1();
});

function enviarDatosPersona1() {
  $("#frmPersona1").on("submit", function(e) {
    e.preventDefault();
    var frm = $(this).serialize();
    console.log( frm );
    var nombreUsu2=$("#apellidoPaternoCon").val();
    var nombreUsu1=$("#primerNombreCon").val();
    var nombreUsu=nombreUsu1.charAt(0)+nombreUsu2;
    $("#nombreUsuario").val(nombreUsu.toLowerCase());
    var contrasena=$("#ciNit").val();
    $("#contrasena").val(contrasena);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaInsertar",
//      "url" : "index.php?modo=personaInsertar",
      "data" : frm
    }).done( function(info) {

      $("#primerNombreCon").attr("disabled","disabled");
      $("#segundoNombreCon").attr("disabled", "disabled");
      $("#apellidoPaternoCon").attr("disabled", "disabled");
      $("#apellidoMaternoCon").attr("disabled", "disabled");
      $("#ciNit").attr("disabled", "disabled");
      $("#lugarExpedicion").attr("disabled", "disabled");
      $("#fechaNac").attr("disabled", "disabled");
      $("#estadoCivil").prop("disabled", "disabled");
      $("#telefono").attr("disabled", "disabled");
      $(".sexo").attr("disabled", "disabled");



      $("#mesajePersona").html(info);
      $("#PersonaU").removeClass('active');
      $("#UsuarioU").addClass('active');

      $("#Persona").removeClass('active in');
      $("#Usuario").addClass('active in');

      $('html,body').animate({
        scrollTop: $("#wrapper").offset().top
      }, 1000);


    });

  });
}
