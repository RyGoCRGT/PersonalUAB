$(document).ready(function () {
  addAfp();
});

function addAfp()
{
  $('#addNewAfpForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewAfp",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.afpNew').html(info);
        $('#respuestaAddAfp').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewAfp').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddAfp').html(info);
      }
    });
  });
}
