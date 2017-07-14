$(document).ready(function(){
  $('#cargoPersonalSelect').hide();
  $('#carreraPersonalSelect').hide();
    //$('#AutoEvaluacionLI').hide();
	$("#tipoPersonal").change(function(){
    var tipo = $("#tipoPersonal").val();
    //console.log(tipo);
    switch (tipo) {
      case '1':
        // $('#carreraPersonalSelect').show(700);
        $('#cargoPersonalSelect').show(700);
        //$('#AutoEvaluacionLI').show(700);
        break;
      default:
        $('#cargoPersonalSelect').hide(700);
        // $('#carreraPersonalSelect').hide(700);
        //$('#AutoEvaluacionLI').hide(700);
        break;
    }
  });

  $("#tipoUsuario").change(function(){
    var tipo = $("#tipoUsuario").val();
    //console.log(tipo);
    switch (tipo) {
      case '3':
        // $('#carreraPersonalSelect').show(700);
        $('#cargoPersonalSelect').show(700);
        //$('#AutoEvaluacionLI').show(700);
        break;
      default:
        $('#cargoPersonalSelect').hide(700);
        // $('#carreraPersonalSelect').hide(700);
        //$('#AutoEvaluacionLI').hide(700);
        break;
    }
  });

  $("#cargoPersonal").change(function()
  {
    var tipo = $("#cargoPersonal").val();
    switch (tipo) {
      case '1':
        $('#carreraPersonalSelect').show(700);
        break;
      default:
        $('#carreraPersonalSelect').hide(700);
        break;
    }
  });
});
