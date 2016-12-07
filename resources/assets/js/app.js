/**
 * Hey! Get out of here!
 */

$(function() {


    $(".light-action-power").click(function(e) {

        var thisId = $(this).data('light-id');

        $.ajax({
          url:"togglePowerSingle",
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            "lightIndex": thisId
          }
        })
    });

    $("#changeLifxState").click(function(e) {

        $.ajax({
            url: "togglePowerAll",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(res) {

            $("#resbox").text(res);
        });

    });

    $("#breatheLifxLights").click(function(e) {


        $.ajax({
            url: "breatheLifxLights",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(res) {

        });

    });


    $("#setState").click(function(e) {
      var dat = {};

      $(".light-prop").each(function() {
        var thisVal = $(this).val();
        var thisId = $(this).attr('id');
        dat[thisId] = thisVal;
      })

      console.log(dat);


      $.ajax({
        url:"setLifxState",
        data: dat,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }).done(function(res) {
        console.log(res);
      })


    });



});
