$(document).ready(function () {
  calificarMeritosPersonal();
  calificarAutoMeritosPersonal();
});

function calificarMeritosPersonal() {
  $("#guardarCalificacion").on("submit", function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=puntuarMeritoPersonal",
      "data" : data
    }).done( function(info) {
      $('#mensajeCalificacion').html(info);
    });

  });
}

function calificarAutoMeritosPersonal()
{
  $("#guardarAutoCalificacion").on("submit", function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=puntuarAutoMeritoPersonal",
      "data" : data
    }).done( function(info) {
      $('#mensajeCalificacion').html(info);
    });

  });
}
