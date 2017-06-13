$(document).ready(function () {
  enviarDatosPersonal();
});

function enviarDatosPersonal() {
  $("#frmPersonal").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPerson").val(ci);
    var img = new FormData($("#frmPersonal")[0]);
    var frm = $(this).serialize();
    console.log( frm );
    console.log( img );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personalInsertar",
      "data" : img,
      contentType: false,
      processData: false

    }).done( function(info) {

      $("#mensajePersonal").html(info);

      $("#PersonalLI").removeClass('active');
      $("#FamiliaresLI").addClass('active');

      $("#Personal").removeClass('active in');
      $("#Familiares").addClass('active in');

      $('html,body').animate({
        scrollTop: $("#wrapper").offset().top
      }, 1000);

    });

  });
}
