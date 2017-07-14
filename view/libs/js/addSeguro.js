$(document).ready(function () {
  addSeguro();
});

function addSeguro()
{
  $('#addNewSeguroForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewSeguro",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.seguroNew').html(info);
        $('#respuestaAddSeguro').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewSeguro').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddSeguro').html(info);
      }
    });
  });
}
