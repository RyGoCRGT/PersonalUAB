<!-- jQuery -->
<script src="view/libs/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="view/libs/js/bootstrap.min.js"></script>

<script src="view/libs/js/freelancer.min.js"></script>

<script src="view/libs/js/jquery.easing.min.js"></script>

<script src="view/libs/js/login.js"></script>

<script>
  // $('#verPass').click(function() {
  //   $('#contrasena').removeAttr("type");
  // });
  // $('#verPass').dblclick(function() {
  //   $('#contrasena').attr("type","password");
  // });


  var conteo = 0  //Definimos la Variable

$("#verPass").click(function() { //Funcion del Click
    if(conteo == 0) { //Si la variable es igual a 0
    conteo = 1; //La cambiamos a 1
    $('#contrasena').removeAttr("type", "password"); //Removemos el atributo de Tipo Contraseña
    $("#contrasena").prop("type", "text"); //Agregamos el atributo de Tipo Texto(Para que se vea la Contraseña escribida)
    // $("#change").removeClass("eye"); //Removemos una clase (la imagen del ojo por defecto)
    // $("#change").addClass("eye2"); //Agregamos una Nueva Clase (la imagen del ojo nueva)
    }else{ //En caso contrario
    conteo = 0; //La cambiamos a 0
    $('#contrasena').removeAttr("type", "text"); //Removemos el atributo de Tipo Texto
    $("#contrasena").prop("type", "password"); //Agregamos el atributo de Tipo Contraseña
    // $("#change").removeClass("eye2"); //Removemos una clase (la imagen del ojo nueva)
    // $("#change").addClass("eye"); //Agregamos una Nueva Clase (la imagen del ojo por defecto)
    } //Cierre del Else
}); //Cierre de la funcion Click
</script>

</body>

</html>
