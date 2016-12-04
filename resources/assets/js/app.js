/**
 * Hey! Get out of here!
 */

$(function() {

    $("#listLifx").click(function(e) {

        $.ajax({
            url: "listLifx",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(res) {

            $("#resbox").text(res);
        });

    });

    $("#changeLifxState").click(function(e) {

        $.ajax({
            url: "changeLifxState",
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

            $("#resbox").text(res);
        });

    });



});
