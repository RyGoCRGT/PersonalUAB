$(document).ready(function () {
  addTipoArchivo();
});

function addTipoArchivo()
{
  $('#tipoArchivoFrm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addTipoArchivo",
      "data" : datos
    }).done( function(info) {
      $('#tipoArchivoTable').html(info);
    });
  });
}
