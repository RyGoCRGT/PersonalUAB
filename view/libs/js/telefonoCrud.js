$(document).ready(
  function ()
  {
    $('#formTelefono').hide();
    $('#hideTelefono').hide();
    $('#addTelefono').show();
    telefonoNew();
    formHideShow();
    telefonoDelete();
  }
);

function formHideShow()
{
  $('#addTelefono').click(
    function ()
    {
      $('#formTelefono').show(1500);
      $('#addTelefono').hide(1500);
      $('#hideTelefono').show(1500);
    }
  );
  $('#hideTelefono').click(
    function ()
    {
      $('#formTelefono').hide(1500);
      $('#hideTelefono').hide(1500);
      $('#addTelefono').show(1500);
    }
  );
}

function telefonoNew()
{
  $('#newTelefono').submit(
    function (e)
    {
      e.preventDefault();
      var datos = $(this).serialize();
      console.log(datos);
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=telefonoAdd",
        "data" : datos
      }).done( function(info) {
        $('#inputPhone').val('');
        $('#tablaRespuesta').html(info);
        telefonoDelete();
      });
    }
  );
}

function telefonoDelete()
{
  $('.telefonoBorrar').submit(
    function (e)
    {
      e.preventDefault();
      var datos = $(this).serialize();
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=telefonoDelete",
        "data" : datos
      }).done( function(info) {
        $('#tablaRespuesta').html(info);
        telefonoDelete();
      });
    }
  );
}
