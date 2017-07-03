$(document).ready(function(){
  $('#cargoPersonalSelect').hide();
  $('#carreraPersonalSelect').hide();
	$("#tipoPersonal").change(function(){
    var tipo = $("#tipoPersonal").val();
    console.log(tipo);
    switch (tipo) {
      case '1':
        $('#carreraPersonalSelect').show(700);
        $('#cargoPersonalSelect').hide(700);
        console.log("Hola");
        break;
      case '2':
        $('#cargoPersonalSelect').hide(700);
        $('#carreraPersonalSelect').hide(700);
        console.log("Hola");
        break;
      case '3':
        $('#cargoPersonalSelect').show(700);
        $('#carreraPersonalSelect').hide(700);
        console.log("Hola");
        break;
    }
  });
});
