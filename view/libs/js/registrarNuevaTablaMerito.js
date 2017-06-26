$(document).ready(function () {
  registrarNuevaTablaMeritos();
});

function registrarNuevaTablaMeritos() {
  $("#frmRegistrarNuevaTablaMerito").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url : "index.php?modo=RegistrarNuevaTablaMeritos",
      data: new FormData($(this)[0]),//el "FormData es para obtner todos los datos del formulario incluidos archivos."
      async: false,
      contentType: false,
      cache: false,
      processData:false, 
    }).done( function(info) {
      $("#mesajePersona").html(info);
      /*$('html,body').animate({
        scrollTop: $("#wrapper").offset().top
      }, 1000);
      */
    });

  });
}
