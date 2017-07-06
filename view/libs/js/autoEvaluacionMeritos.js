$(document).ready(function () {
  clickTabMeritos();
});

function clickTabMeritos()
{
  $("#autoEvMeritos").click(function(e) {
    e.preventDefault();
    var tipo = $('#tipoPersonal option:selected').html();
    console.log(tipo);
    var ci = $('#ciNit').val();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=autoEvaluarMerito",
      "data" : "tipoPersonal="+tipo+"&ciNit="+ci
    }).done( function(info) {
      $('#mensajeAutoEvaluacion').html(info);
    });
  });
}
