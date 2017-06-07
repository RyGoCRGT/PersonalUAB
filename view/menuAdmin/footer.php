

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
<script src="../libs/js/enviarPersona.js"></script>


<script>
$('.datepicker').datepicker({
  clearBtn: true,
  language: "ES"
});
</script>
<script>
  $(function () {
    $('#fotoPersonal').change( function(){
      console.log(this.files);
      var reader = new FileReader();

      reader.onload = function (image) {
        $('#repuestaFoto').attr('src', image.target.result);
        $('#repuesta').addClass('well');
      }

      reader.readAsDataURL(this.files[0]);
    });
  });
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
</body>
</html>
