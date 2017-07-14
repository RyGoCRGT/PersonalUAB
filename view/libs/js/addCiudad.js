$(document).ready(function () {
  addCiudad();
});

function addCiudad()
{
  $('#addNewCiudadForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewCiudad",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.ciudadNew').html(info);
        $('#respuestaAddCiudad').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewCiudad').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddCiudad').html(info);
      }
    });
  });
}
