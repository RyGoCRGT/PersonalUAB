$(document).ready(function () {
  controlMerito();
});

function controlMerito() {
	$(".control").click(
    function () {
      if($(this).is(':checked'))
      {
        $(this).parent().parent().addClass("danger");
      }
      else
      {
        $(this).parent().parent().removeClass("danger");
      }
    }
	);
}
