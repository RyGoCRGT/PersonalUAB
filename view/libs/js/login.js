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
      $("#mensaje").html("");
      switch (info) {
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
          $("#mensaje").addClass("alert");
          $("#mensaje").addClass("alert-danger");
          $("#mensaje").addClass("alert-dismissable");
          $("#mensaje").append(info);
          parpa();
          function parpa() {
             $('#mensaje').fadeIn(500).delay(250).fadeOut(300, parpa)
             setTimeout("$('#mensaje').stop(true,true).css('opacity', 1)", 4000);
          }
          break;
      }

    });

  });
}
