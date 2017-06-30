$(document).ready(function () {
  calificarMeritosPersonal();
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
