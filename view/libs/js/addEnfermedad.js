$(document).ready(function () {
  addEnfermead();
});

function addEnfermead()
{
  $('#addNewEnfermedadForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewEnfermedad",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.enfermedadNew').html(info);
        $('#respuestaAddEnfermedad').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewEnfermedad').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddEnfermedad').html(info);
      }
    });
  });
}
