$(document).ready(function () {
  calcular_total();
});

function calcular_total() {
	$(".puntaje").keyup(
    function sumar(){
    	var totalInp = $('.puntaje').serializeArray();
    	var total = 0;
      var aux = 0;
      // console.log(totalInp);

      $.each(totalInp, function(i, field){
        aux = field.value
        total =  parseFloat(aux) + parseFloat(total);
      });
      // console.log(total);

    	$('#puntajeTotal').val(total);
    }
	);
}
