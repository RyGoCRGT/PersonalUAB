$(document).ready(function($){
  $('.selector-mobile').hide("slow");
  var ventana_ancho = $(window).width();
  if (ventana_ancho < '1000')
  {
    $('body').addClass('body-small');//menu mobile
    $('.selector').remove();
    $('.selector-mobile').show("slow");
  }
  else
  {
    $('.selector-mobile').remove();
  }
});
