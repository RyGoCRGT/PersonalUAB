$(document).ready(function () {
  addNacionalidad();
});

function addNacionalidad()
{
  $('#addNewNacionalidadForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewNacionalidad",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      console.log(tam);
      if (tam>100)
      {
        $('.nacionalidadNew').html(info);
        $('#respuestaAddNacionalidad').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewNacionalidad').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddNacionalidad').html(info);
      }
    });
  });
}
