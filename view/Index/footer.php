<!-- jQuery -->
<script src="view/libs/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="view/libs/js/bootstrap.min.js"></script>

<script src="view/libs/js/freelancer.min.js"></script>

<script src="view/libs/js/jquery.easing.min.js"></script>

<script src="view/libs/js/login.js"></script>

<script>
  $('#verPass').click(function() {
    $('#contrasena').removeAttr("type");
  });
  $('#verPass').dblclick(function() {
    $('#contrasena').attr("type","password");
  });
</script>

</body>

</html>
