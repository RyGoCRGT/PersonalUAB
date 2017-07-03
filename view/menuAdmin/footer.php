

</div>
</div>
</div>

</div>

<!-- Mainly scripts -->
<script src="../libs/js/jquery.min.js"></script>
<script src="../libs/js/bootstrap.min.js"></script>
<script src="../libs/js/bootstrap-select.min.js"></script>
<script src="../libs/js/bootstrap-datepicker.min.js"></script>
<script src="../libs/js/jquery.metisMenu.js"></script>



<!-- Custom and plugin javascript -->
<script src="../libs/js/inspinia.js"></script>
<script src="../libs/js/pace.min.js"></script>

<script src="../libs/js/table.js"></script>
<script src="../libs/js/enviarPersonaUsuario.js"></script>
<script src="../libs/js/enviarUsuario.js"></script>
<script src="../libs/js/enviarPersona.js"></script>
<script src="../libs/js/enviarPersonal.js"></script>
<script src="../libs/js/enviarConyugue.js"></script>
<script src="../libs/js/enviarHijo.js"></script>
<script src="../libs/js/enviarReferencia.js"></script>
<script src="../libs/js/detallePersonal.js"></script>
<script src="../libs/js/guardarCursoEstudiado.js"></script>
<script src="../libs/js/guardarTituloProfesional.js"></script>
<script src="../libs/js/guardarExperienciaLaboral.js"></script>
<script src="../libs/js/registrarNuevaTablaMerito.js"></script>
<script src="../libs/js/imagenesLoad.js"></script>
<script src="../libs/js/cambioCargoFacultad.js"></script>
<script src="../libs/js/autosuma.js"></script>
<script src="../libs/js/controlMeritos.js"></script>
<script src="../libs/js/guardarCalificacion.js"></script>

<script>
$('.datepicker').datepicker({
  clearBtn: true,
  language: "ES"
});
$('#listoAll').hide();
</script>
<script>
$(document).ready(function($){
  $('.selector-mobile').hide("slow");
  var ventana_ancho = $(window).width();
  if (ventana_ancho < '1000')
  {
    //alert(ventana_ancho);
    $('.selector').remove();
    $('.selector-mobile').show("slow");
  }
  else
  {
    $('.selector-mobile').remove();
  }
});
</script>
<script type="text/javascript">
$(document).ready(function($) {
$(".btn-pref .btn").click(function () {
  $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
  // $(".tab").addClass("active"); // instead of this do the below
  $(this).removeClass("btn-default").addClass("btn-primary");
});
});
</script>
<div id="fondoModal"></div>
</body>
</html>
