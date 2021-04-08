$(document).ready(function () {
  //Summernote________________________________________________________________________________________________________________________________________________________
  $('#summernote').summernote(
    {
      placeholder: 'Ingresa texto...',
      tabsize: 20,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ],
      lang: 'es-ES',
    }
  );
  $('.summernote-disable').summernote('disable');
});
//______________________________________________________________________________________________________________________________________________________________________