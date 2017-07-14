$(document).ready(function () {
  enviarDatosPersonal();
  enviarDatosPersonalEditar();
});

function enviarDatosPersonal() {
  $("#frmPersonal").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    if ($("#ciNit").val() != "1")
    {
      $("#ciPerson").val(ci);
      var img = new FormData($("#frmPersonal")[0]);
      console.log( img );
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=personalInsertar",
        "data" : img,
        contentType: false,
        processData: false

      }).done( function(info) {

        $("#mensajePersonal").html(info);

        $("#PersonalLI").removeClass('active');
        $("#FamiliaresLI").addClass('active');

        $("#Personal").removeClass('active in');
        $("#Familiares").addClass('active in');

        $('html,body').animate({
          scrollTop: $("#wrapper").offset().top
        }, 1000);

        $('.personalInputCtr').attr('disabled', 'disabled');

        $('#listoAll').show();

      });
    }
    else
    {
      $("#mensajePersonal").html("<p style='color: red'>Por Favor llene los datos Generales Primero</p>");
    }
  });
}

function enviarDatosPersonalEditar()
{
  $("#frmPersonalEditar").on("submit", function(e) {
    e.preventDefault();
    if ($("#ciNit").val() != "1")
    {
      var img = "";
      var foto = $('#fotoPersonal').val();
      if (foto == '')
      {
        img = $("#frmPersonalEditar").serialize();
        console.log(img + " -->data");
        $.ajax({
          "method" : "POST",
          "url" : "index.php?modo=personalEditar",
          "data" : img
        }).done( function(info) {
          if (info == '1')
          {
            $("#mensajePersonal").html("<p style='color:green'>Cambio Exitoso</p>");
            $("#PersonalLI").removeClass('active');
            $("#FamiliaresLI").addClass('active');

            $("#Personal").removeClass('active in');
            $("#Familiares").addClass('active in');

            $('html,body').animate({
              scrollTop: $("#wrapper").offset().top
            }, 1000);

            $('.personalInputCtr').attr('disabled', 'disabled');

            $('#listoAll').show();
          }
          else
          {
            $("#mensajePersonal").html("<p style='color:red'>Ah Ocurrido un Error</p>");
          }
        });
      }
      else
      {
        img = new FormData($("#frmPersonalEditar")[0]);
        console.log(img + " -->img");
        $.ajax({
          "method" : "POST",
          "url" : "index.php?modo=personalEditar",
          "data" : img,
          contentType: false,
          processData: false
        }).done( function(info) {
          if (info == '1')
          {
            $("#mensajePersonal").html("<p style='color:green'>Cambio Exitoso</p>");
            $("#PersonalLI").removeClass('active');
            $("#FamiliaresLI").addClass('active');

            $("#Personal").removeClass('active in');
            $("#Familiares").addClass('active in');

            $('html,body').animate({
              scrollTop: $("#wrapper").offset().top
            }, 1000);

            $('.personalInputCtr').attr('disabled', 'disabled');

            $('#listoAll').show();
          }
          else
          {
            $("#mensajePersonal").html("<p style='color:red'>Ah Ocurrido un Error</p>");
          }
        });
      }
    }
    else
    {
      $("#mensajePersonal").html("<p style='color: red'>Por Favor llene los datos Generales Primero</p>");
    }
  });
}
