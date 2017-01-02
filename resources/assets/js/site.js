$(function() {


  $("[data-toggle='tooltip']").tooltip();

  $("#auth-control-row").on('click', '.auth-action', function() {
      var url = $(this).data('link');

      document.location.href=url;
  });

});
