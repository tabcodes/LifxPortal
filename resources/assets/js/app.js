/**
 * Hey! Get out of here!
 */

$(function() {
slideout = new Slideout({
      'panel': document.getElementById('content-wrap'),
      'menu': document.getElementById('mobile-menu'),
      'padding': 256,
      'tolerance': 70
    });

    $("#mobile-menu-link").click(function(e) {
      e.preventDefault();
      slideout.toggle();
    });
  setTimeout(function() {
    showit("nav-image-top", "fadeInDown")
  }, 100);
  setTimeout(function() {
    showit("nav-image-bottom", "fadeInRight");
    showit("nav-container", "fadeInDown");

  }, 700);

  setTimeout(function() {
    showit("circle-first", "fadeInUp");
  }, 800);

  setTimeout(function() {
    showit("circle-second", "fadeInUp");
  }, 900);

  setTimeout(function() {
    showit("circle-third", "fadeInUp");
  }, 1000);

  setTimeout(function() {
    showit("circle-fourth", "fadeInUp");
  }, 1100);
})


function showit(elid, className) {
  // $("#" + elid).css('visibility','visible').hide().fadeIn(speed);
  $("#" + elid).css('visibility','visible').addClass(className);
}
