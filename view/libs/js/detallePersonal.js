$(document).ready(function () {
  verDatosPersonal();
});

function verDatosPersonal() {
  $("#detallePersonal").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonalDetalle").val(ci);
    var data = $(this).serialize();
    console.log( data );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=verPersonal",
      "data" : data
    }).done( function(info) {

      $('#contenidoDetalle').html(info);

    });
  });

}
