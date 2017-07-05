$(document).ready(function () {
  addLugarExpedicion();
});

function addLugarExpedicion()
{
  $('#addNewLugExpediForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewLugarExpedicion",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.lugarExpedicionNew').html(info);
        $('#respuestaAddLugEx').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewLugExpedi').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddLugEx').html(info);
      }
    });
  });
}
