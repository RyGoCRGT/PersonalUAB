$(document).ready(function () {
  verDatosPersonal();
  verDatosPersonalLI();
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
      $("#exportarFormularioPDF").attr("href", "formularioLlenoPDF.php?datos=1&ciPersonalDetalle="+ci);
      $("#exportarFormularioWORD").attr("href", "formularioLlenoWORD.php?datos=1&ciPersonalDetalle="+ci);
      $("#exportarFormularioEXCEL").attr("href", "formularioLlenoEXCEL.php?datos=1&ciPersonalDetalle="+ci);
    });
  });

}

function verDatosPersonalLI() {
  $(".detallePersonalVER").on("submit", function(e) {
    e.preventDefault();
    var ci = $(this).children(".ci").val();
    var dat = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=verPersonal",
      "data" : dat
    }).done( function(info) {
      $('.contenidoDetalleVER').html(info);
      $(".exportarFormularioPDFVER").attr("href", "formularioLlenoPDF.php?datos=1&ciPersonalDetalle="+ci);
      $(".exportarFormularioWORDVER").attr("href", "formularioLlenoWORD.php?datos=1&ciPersonalDetalle="+ci);
      $(".exportarFormularioEXCELVER").attr("href", "formularioLlenoEXCEL.php?datos=1&ciPersonalDetalle="+ci);
    });
  });

}
