$(document).ready(function () {
  addReligion();
});

function addReligion()
{
  $('#addNewReligionForm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var ventanaAncho = $(window).width();
    // console.log(datos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addNewReligion",
      "data" : datos+"&ventanaAncho="+ventanaAncho
    }).done( function(info) {
      var tam = info.length;
      // console.log(tam);
      if (tam>100)
      {
        $('.religionNew').html(info);
        $('#respuestaAddReligion').html("<p style='color:green'>Exito al Guardar</p>");
        setTimeout(function(){ $('#addNewReligion').modal('toggle'); }, 1000);
        $('.selectpicker').selectpicker();
      }
      else
      {
        $('#respuestaAddReligion').html(info);
      }
    });
  });
}
