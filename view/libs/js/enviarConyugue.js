$(document).ready(function () {
  enviarDatosPersonalConyugue();
  enviarDatosPersonalConyugueEditar();
});

function enviarDatosPersonalConyugue()
{
  $("#frmPersonalConyugue").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonConyu").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaConyugueInsertar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmCon").html(info);
      $('#conyugueContent').click();
      $('#conyugueTittle').css('border-color', 'rgb(41, 176, 13)');
      $('.personaConyugueBk').attr('disabled', 'disabled');
    });
  });
}

function enviarDatosPersonalConyugueEditar()
{
  $("#frmPersonalConyugueEditar").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonConyu").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personaConyugueEditar",
      "data" : frm
    }).done( function(info) {
      $("#mensajeFrmCon").html(info);
      $('#conyugueContent').click();
      $('#conyugueTittle').css('border-color', 'rgb(41, 176, 13)');
      $('.personaConyugueBk').attr('disabled', 'disabled');
    });
  });
}
