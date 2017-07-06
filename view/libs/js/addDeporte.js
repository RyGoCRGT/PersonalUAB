$(document).ready(function () {
  addDeporte();
});

function addDeporte()
{
  $('#addNewDeporteForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewDeporte",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.deporteNew').html(info);
        $('#respuestaAddDeporte').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewDeporte').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddDeporte').html(info);
      }
    });
  });
}
