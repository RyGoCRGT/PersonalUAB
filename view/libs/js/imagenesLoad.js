$(function () {
  $('li a').click( function(){
    $('.nameFileImg').html("");
  });
});

$(function () {
  $('#fotoPersonal').change( function(){
    //console.log(this.files);
    var reader = new FileReader();

    reader.onload = function (image) {
      $('#repuestaFoto').attr('src', image.target.result);
      $('#repuesta').addClass('well');
    }

    reader.readAsDataURL(this.files[0]);
  });
});

$(function () {
  $('.exportarArchivoFile').change( function(){
    $.each(this.files, function() {
      readURL(this);
    })
  });
});

function readURL(file) {
  var reader = new FileReader();
  reader.onload = function(e)
    {
      $('.nameFileImg').html('<p style="color:rgb(3, 81, 102)"><strong>Nombre: </strong>'+file.name+'</p>')
    }

  reader.readAsDataURL(file);
}
