$(document).ready(function () {
  enviarDatosPersonalHijo();
  nuevoHijo();
  hijosAll();
  clickTable();
  editarHijo();
});

function editarHijo()
{
  $('#editarPersonaHijo').submit(
    function functionName(e)
    {
      e.preventDefault();
      var ci = $("#ciNit").val();
      $("#ciPersonHijoEdit").val(ci);
      var frm =$(this).serialize();
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=personaHijoEditar",
        "data" : frm
      }).done( function(info) {
        $('#mensajeHijoEditar').html("<p style='color:green'><strong>Cambios Realizados Exitosamente</strong></p>");
        $('#mensajeFrmHijo').html(info);
        clickTable();
      });
    }
  );
}

function hijosAll()
{
  $('#allhijos').click(function () {
    $('#hijosContent').click();
    $('#hijosTittle').css('border-color', 'rgb(41, 176, 13)');
  });
}

function enviarDatosPersonalHijo()
{
  $("#frmPersonalHijos").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonHijo").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaHijoInsertar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmHijo").html(info);
      $('.inputHijoBk').attr("disabled","disabled")
      clickTable();
    });
  });
}

function nuevoHijo()
{
  $('#nuevoHijoPers').click(function () {
    $('.inputHijoBk').removeAttr('disabled');
    $('.inputHijoBk').val('');
  });
}

function clickTable()
{
  $('.dataHijo').click(
    function ()
    {
      var data = $(this).children('.idPersona').serializeArray();

      $('#idPersonaHijEdit').val(data[0]['value']);
      $('#primerNombreHijEdit').val(data[1]['value']);
      $('#segundoNombreHijEdit').val(data[2]['value']);
      $('#apellidoPaternoHijEdit').val(data[3]['value']);
      $('#apellidoMaternoHijEdit').val(data[4]['value']);
      $('#fechaNacimientoHijEdit').val(data[5]['value']);

      //console.log(data[1]['value']);

      $('#mensajeHijoEditar').html("");

    }
  );
}
