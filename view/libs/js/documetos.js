$(document).ready(function () {
  agregarDocumentoPDF();
  verDocumentoPDF();
});

function verDocumentoPDF()
{
  $('.frmDataArchiv').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=verArchivo",
      "data" : datos
    }).done( function(info) {

      $('#respuestaVistaDocumento').html(info);

    });
  });
}

function agregarDocumentoPDF()
{

  $('#documentoAdd').submit(function (e) {
    e.preventDefault();
    var datos = new FormData($("#documentoAdd")[0]);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=agregarDocumentoPDF",
      "data" : datos,
      contentType: false,
      processData: false
    }).done( function(info) {

      $('#documentoAdd')[0].reset();
      $('#tableRespuestaDocumento').html(info);
      $('#modalArchivo').modal('toggle');
      $('.nameFileImg').html("");
      verDocumentoPDF();

    });
  });

}
