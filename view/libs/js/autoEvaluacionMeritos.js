$(document).ready(function () {
  clickTabMeritos();
});

function clickTabMeritos()
{
  $("#autoEvMeritos").on("click", function(e) {
    e.preventDefault();
    var tipo = $('#tipoPersonal').val();
    if (tipo == '1')
    {
      tipo = "Docente";
    }
    else {
      if (tipo == '2') {
        tipo = "Profesor";
      }
    }
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
