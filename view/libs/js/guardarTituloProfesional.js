$(document).ready(function () {
    enviarTituloPersonal();
    newTittle();
});

function enviarTituloPersonal() {
  $("#TiulosFrm").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonaTitulo").val(ci);
    var frm = new FormData($("#TiulosFrm")[0]);
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personalTitulos",
      "data" : frm,
      contentType: false,
      processData: false

    }).done( function(info) {

      $('#mensajeTitulosPersonal').html(info);
      $('.inputTitulosBk').attr("disabled", "disabled");

    });

  });
}

function newTittle() {
  $('#newTitulo').click(function () {
    $(".inputTitulosBk").removeAttr('disabled');
    $(".inputTitulosBk").val('');
  });
}
