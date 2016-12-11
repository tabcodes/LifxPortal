/**
 * Hey! Get out of here!
 */

$(function() {

  $('input[type="range"]').rangeslider();


  $("#light-control-row").on('click', '.light-action', function(e) {
    e.preventDefault();


    var lightInner = $(this).parent().parent().parent();

    lightInner.css('opacity', '0.4');


    var lightLoader = lightInner.siblings(".light-loader");
    lightLoader.fadeIn('fast');

    var thisLightId = $(this).data('light-id');
    var thisId = $(this).attr('id');
    var thisAction = $(this).data('action');

    var urlString = thisAction + "/" + thisLightId;
    $.ajax({
      url: urlString,
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      statusCode: {
        500: function() {
          alert("Failed!");
        },
        200: function(response) {
          handleSuccess(thisId, thisLightId, response);
        }
      }
    });
  });



  function handleSuccess(elementId, lightId, response) {

    console.log("Element clicked:", elementId);
    console.log("Light ID:", lightId);
    console.log("AJAX Response:", response);

    var light = $("#" + lightId);
    light.fadeOut('fast', function() {
      light.replaceWith(response.composedView);

    });





  }
});
