$(document).ready(function () {
    enviarCursoPersonal();
    newCurso();
});

function enviarCursoPersonal()
{
  $("#CursosFrm").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonaCurso").val(ci);
    var frm = new FormData($("#CursosFrm")[0]);
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personalCursos",
      "data" : frm,
      contentType: false,
      processData: false

    }).done( function(info) {

      $('#mensajeCursosPersonal').html(info);
      $(".inputCursoBk").attr('disabled', 'disabled');

    });

  });
}

function newCurso() {
  $('#newCurso').click(function () {
    $(".inputCursoBk").removeAttr('disabled');
    $(".inputCursoBk").val('');
  });
}
