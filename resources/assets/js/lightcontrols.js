/**
 * Hey! Get out of here!
 */

$(function() {



    bindDials();

    $("#light-control-row").on('click', '.brightness-group', function(e) {
        e.preventDefault();
        var groupId = $(this).data('group');
        var el = $("#" + groupId + "-brightness-detail");
        if($(".group-detail").is(":visible")) {
          $(".group-detail").slideUp('fast');
        }

        if(el.is(":visible")) {
          el.slideUp('fast');
        } else {
          el.slideDown('fast');
        }

    });

    $("#light-control-row").on('click', '.temp-group', function(e) {
        e.preventDefault();

        var groupId = $(this).data('group');
        var el = $("#" + groupId + "-temp-detail");

        if($(".group-detail").is(":visible")) {
          $(".group-detail").slideUp('fast');
        }

        if(el.is(":visible")) {
          el.slideUp('fast');
        } else {
          el.slideDown('fast');
        }

    })

    $("#light-control-row").on('click', '.group-brightness-set', function(e) {
        e.preventDefault();

        var groupId = $(this).data('group');

        dimGroupBox(groupId);

        var groupString = "group:" + groupId;
        var url = "setStateGroup/" + groupString;
        var brightness = $("#" + groupId + "-brightness-slider").val() / 100;
        var data = {
            'brightness': brightness
        };

        console.log(data);

        callGroupAjax(url, data, groupId);

    });

    $("#light-control-row").on('click', '.group-temp-set', function(e) {
        e.preventDefault();

        var groupId = $(this).data('group');

        dimGroupBox(groupId);

        var groupString = "group:" + groupId;
        var url = "setStateGroup/" + groupString;
        var temp = $("#" + groupId + "-temp-slider").val();
        var data = {
            'temp': temp
        };


        callGroupAjax(url, data, groupId);

    });


    $("#light-control-row").on('click', '.power-group', function(e) {

        e.preventDefault();

        var groupId = $(this).data('group');

        dimGroupBox(groupId);


        var groupString = "group:" + groupId;
        var url = "togglePowerGroup/" + groupString;

        callGroupAjax(url, null, groupId);

    });

    $("#light-control-row").on('click', '.light-button-apply', function(e) {
        e.preventDefault();
        dimLightBox($(this).attr('id'), 0);

        var lightId = $(this).data('light-id');
        var lightString = "id:" + lightId;
        var lightColorBox = $("#color-" + lightId);
        if (lightColorBox.length > 0) {
            lightColor = lightColorBox.spectrum('get').toHsv();
        } else {
            lightColor = null;
        }

        var lightTemp = $("#temp-" + lightId).val();
        var lightBrightness = $("#brightness-" + lightId).val();

        var url = "setStateSingle/" + lightString;

        var dataToSend = {
            'color': lightColor,
            'temp': lightTemp,
            'brightness': lightBrightness
        }

        callLightAjax(url, dataToSend, lightId);


    });

    $("#light-control-row").on('click', '.light-action', function(e) {
        e.preventDefault();

        dimLightBox($(this).attr('id'), 1);


        var thisLightId = $(this).data('light-id');
        var thisId = $(this).attr('id');
        var thisAction = $(this).data('action');

        var urlString = thisAction + "/" + thisLightId;

        callLightAjax(urlString, null, thisLightId);
    });



});


function dimGroupBox(groupId) {

    $("#light-box-" + groupId).css('opacity', '0.4');
    $("#group-" + groupId + "-loader").fadeIn();

}

function lightGroupBox(groupId) {

    $("#group-" + groupId + "-loader").fadeOut();

}


function dimLightBox(elementId, setpower) {
    var lightInner = $("#" + elementId).parent().parent();
    if (setpower == 1) {
        lightInner = lightInner.parent();
    }


    lightInner.css('opacity', '0.4');
    var lightLoader = lightInner.siblings(".light-loader");
    lightLoader.fadeIn('fast');
}

function handleLightSuccess(lightId, response) {

    // console.log("Light ID:", lightId);
    // console.log("AJAX Response:", response);

    var light = $("#" + lightId);
    light.fadeOut('fast', function() {
        light.replaceWith(response.composedView);
        bindDials();
    });

}

function handleGroupSuccess(groupId, response) {
    console.log
    composedView = response.composedView;

    var el = $(composedView).find('#light-box-' + groupId);

    $("#light-box-" + groupId).fadeOut('fast', function() {
        $(this).replaceWith(el);
        bindDials();
        lightGroupBox(groupId);
    });




    console.log(el);

}


function callLightAjax(endpoint, data, lightId) {

    $.ajax({
        url: endpoint,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        statusCode: {
            500: function() {
                alert('failed');
            },
            200: function(response) {

                handleLightSuccess(lightId, response);
            }
        }
    });
}

function callGroupAjax(endpoint, data, groupId) {

    $.ajax({
        url: endpoint,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        statusCode: {
            500: function() {
                alert('failed');
            },
            200: function(response) {

                handleGroupSuccess(groupId, response);
            }
        }
    });
}



function bindDials() {


  $('.group-brightness-slider').rangeslider({
      polyfill: false,
      onSlide: function() {
          var el = $(".group-brightness-slider");
          var val = el.val();
          var id = el.data('group');
          $("#" + id + "-brightness-text").text(val + "%");

      }
  });

  $('.group-temp-slider').rangeslider({
      polyfill: false,
      onSlide: function() {
          var el = $(".group-temp-slider");
          var val = el.val();
          var id = el.data('group');
          $("#" + id + "-temp-text").text(val + "K");

      }
  });


    var binder = function() {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

            this.cursorExt = 0.3;

            var a = this.arc(this.cv) // Arc
                ,
                pa // Previous arc
                , r = 1;

            this.g.lineWidth = this.lineWidth;

            if (this.o.displayPrevious) {
                pa = this.arc(this.v);
                this.g.beginPath();
                this.g.strokeStyle = this.pColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                this.g.stroke();
            }

            this.g.beginPath();
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
            this.g.stroke();

            this.g.lineWidth = 2;
            this.g.beginPath();
            this.g.strokeStyle = this.o.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
            this.g.stroke();

            return false;
        }
    }



    $('[data-toggle="tooltip"]').tooltip();


    $(".dial-brightness").knob({
        'min': 0,
        'max': 100,
        'step': 1,
        'width': '100',
        'height': '100',
        'thickness': '0.15',
        'skin': 'tron',
        'fgColor': '#4d8dd9',
        'displayPrevious': true,
        draw: binder
    });

    $(".dial-temperature").knob({
        'min': 2500,
        'max': 9000,
        'step': 500,
        'width': '100',
        'height': '100',
        'thickness': '0.15',
        'skin': 'tron',
        'fgColor': '#02b586',
        'displayPrevious': true,
        draw: binder
    });

    $(".dial-color-light").each(function() {

        var colors = $(this).data('lifx-color');


        dialBrightness = 100;
        initialColorString = "hsv(" + colors.hue + ", " + colors.saturation + ", " + dialBrightness + ")";
        // console.log(initialColorString);

        $(this).spectrum()
            .spectrum("set", initialColorString);

    })

    $(".dial-color-group").each(function() {

      $(this).spectrum({
        clickoutFiresChange: false,
        palette: [
        ['black', 'white', 'blanchedalmond'],
        ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
      ],
        change: function() {

            var groupId = $(this).data("group");
            var groupString = "group:" + groupId;

            dimGroupBox(groupId);

            url = "setStateGroup/" + groupString;
            groupColor = $(this).spectrum('get').toHsv();
            data = {
              'color': groupColor
            };

            callGroupAjax(url, data, groupId);
        }


      });

    })

}
