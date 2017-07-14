$(document).ready(function () {
  publicarNoticia();
  clickMasPublicaion();
  $('#publicarNoticia').hide();
  $('#cerrarFrmPublicacion').hide();
});

function clickMasPublicaion()
{
  $('#verFrmPublicacion').click(
    function () {
      $('#publicarNoticia').show(1500);
      $('#verFrmPublicacion').hide(1500);
      $('#cerrarFrmPublicacion').show(1500);
    }
  );
  $('#cerrarFrmPublicacion').click(
    function () {
      $('#publicarNoticia').hide(1500);
      $('#verFrmPublicacion').show(1500);
      $('#cerrarFrmPublicacion').hide(1500);
    }
  );
}

function publicarNoticia()
{

  $('#frmNuevaNoticia').submit(function (e) {
    e.preventDefault();
    var datos = new FormData($("#frmNuevaNoticia")[0]);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=publicarNoticia",
      "data" : datos,
      contentType: false,
      processData: false
    }).done( function(info) {

      $('#frmNuevaNoticia')[0].reset();
      $('.respuesta').hide();
      $('#publicarNoticia').hide(1500);
      $('#verFrmPublicacion').show(1500);
      $('#cerrarFrmPublicacion').hide(1500);
      $('#respuestaPublicacionesSemana').html(info);

    });
  });

}
