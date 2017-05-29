$(document).ready(function () {
  enviarDatos();
});

function enviarDatos() {
  $("#LoginPersonal").on("submit", function(e) {
    e.preventDefault();
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=CampLlenos",
      "data" : frm
    }).done( function(info) {
      $("#mensaje").addClass("well");
      $("#mensaje").html(info);
      var datito = $("#mensaje").text();
      console.log( datito );
      switch (datito) {
        case '1':
          window.location.href = "view/menuAdmin/";
          break;

        case '2':
          window.location.href = "view/menuAsistente/";
          break;

        case '3':
          window.location.href = "view/menuDocente/";
          break;

        case '4':
          window.location.href = "view/menuProfesor/";
          break;

        default:

      }

    });

  });
}
