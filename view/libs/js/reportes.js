$(document).ready(function () {
  $('.selectpicker').selectpicker('refresh');
  $('#graficoCanvas').hide();
  $('#closeCanvas').hide();
  $('#linkReportCanvas').hide();
  listaPersonalReporte();
  cantidadPersonalReporte();
  hideShowCanvas();
  clickReport();
});

function listaPersonalReporte()
{
  $('#reportePersonalListado').on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var tipo = $('#tipoPersonalReporte').val();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=listadoPersonal",
      "data" : datos+"&tipoPersonal="+tipo
    }).done( function(info) {
      $('#reporteGenerado').html(info);
    });
  });
}

function clickReport()
{
  $('#linkReportCanvas').click(function () {
    $('#graficoCanvas').get(0).toBlob(function (blob) {
      saveAs(blob, "grafico.png");
    });
  });
}

function hideShowCanvas()
{
  $('#closeCanvas').click(function () {
    $('#graficoCanvas').hide(1500);
    $('#tableReprtes').show(1500);
    $('#closeCanvas').hide(1500);
    $('#linkReportCanvas').hide(1500);
  });
}

function cantidadPersonalReporte()
{
  $('#reporteGrapBoton').click(function (e) {
    e.preventDefault();
    var tipoTiulo = $('#tipoTituloProfesionalReporte').val();
    var sexo = $('#sexoReporte').val();
    var datitos = "tipoTituloProfesional="+tipoTiulo+"&sexo="+sexo;
    console.log(datitos);
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=cantidadPersonal",
      "data" : datitos,
      success: function(info) {
        var valores = eval(info);
         console.log(valores);
        var i   = valores[0];
        var s   = valores[1];
        var e   = valores[2];
        var t   = valores[3];
        var f  = valores[4];

        var Datos = {
                labels : ['INGENIERIA', 'SALUD', 'EDUCACION', 'TEOLOGIA', 'FCEA'],
                datasets : [
                    {
                        fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                        strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                        highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                        highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                        data : [i, s, e, t, f]
                    }
                ]
            }

        var contexto = document.getElementById('graficoCanvas').getContext('2d');
        window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });

        $('#tableReprtes').hide(1500);
        $('#graficoCanvas').show(1500);
        $('#closeCanvas').show(1500);
        $('#linkReportCanvas').show(1500);
        // $('#linkReportCanvas').attr('href','../reportes/cantidadPersonalRep.php?tipoTituloProfesional='+tipoTiulo+'&sexo='+sexo);
      }
    });
  });

}
