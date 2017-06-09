$(document).ready(function () {
  enviarDatosPersonal();
});

function enviarDatosPersonal() {
  $("#frmPersonal").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPerson").val(ci);
    var img = $("#fotoPersonal").val();
    var frm = $(this).serialize();
    console.log( frm );
    console.log( img );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personalInsertar",
      "data" : frm+'&fotoPersonal='+encodeURIComponent(img)
    }).done( function(info) {

      $("#mensajePersonal").html(info);

      $('html,body').animate({
        scrollTop: $("#wrapper").offset().top
      }, 2000);

    });

  });
}
