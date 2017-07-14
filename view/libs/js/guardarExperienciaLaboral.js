$(document).ready(function () {
    enviarELaboralPersonal();
    newExperiencia();
});

function enviarELaboralPersonal()
{
  $("#ExperienciaLaboralFrm").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonEL").val(ci);
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personalELab",
      "data" : frm
    }).done( function(info) {

      $('#mensajeELaboralPersonal').html(info);
      $('.inputELabBk').attr("disabled", "disabled");

    });

  });
}

function newExperiencia()
{
  $('#newExpeLabor').click(function () {
    $(".inputELabBk").removeAttr('disabled');
    $(".inputELabBk").val('');
  });
}
