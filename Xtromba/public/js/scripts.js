// Preloader
$(window).on('load', function() {
  $('#preloader').delay(100).fadeOut('slow',function(){$(this).remove();});
});

// Para el plugin de selector multiple
  $(".chosen-select").chosen({
    placeholder_text_multiple: 'Puede seleccionar una o varias opciones',
    no_results_text: "No se encontraron resultados"
  });

// Navbar Menu Responsive

  // $("[data-trigger]").on("click", function(){
  //   var trigger_id =  $(this).attr('data-trigger');
  //   $(trigger_id).toggleClass("show");
  //   $('body').toggleClass("offcanvas-active");
  // });

  // // close if press ESC button 
  // $(document).on('keydown', function(event) {
  //     if(event.keyCode === 27) {
  //       var trigger_id =  $(this).attr('data-trigger');
  //       $(trigger_id).removeClass("show");
  //       $(".navbar-collapse").removeClass("show");
  //       $("body").removeClass("overlay-active");
  //       $("body").removeClass("offcanvas-active");
  //     }
  // });

  // // close button 
  // $(".btn-close").on("click", function(e){
  //     $(".navbar-collapse").removeClass("show");
  //     $("body").removeClass("offcanvas-active");
  //     $("body").removeClass("overlay-active");
  // });

//Navbar autohide

  // add padding top to show content behind navbar
  $('body').css('padding-top', $('.navbar').outerHeight() + 'px')

  // detect scroll top or down
  if ($('.smart-scroll').length > 0) { // check if element exists
      var last_scroll_top = 0;
      $(window).on('scroll', function() {
          scroll_top = $(this).scrollTop();
          if(scroll_top < last_scroll_top) {
              $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
          }
          else {
              $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
          }
          last_scroll_top = scroll_top;
      });
  }

  // Notification navbar
  var el = document.querySelector('.notification');
        document.querySelector('.btn-notification').addEventListener('click', function(){
        var count = Number(el.getAttribute('data-count')) || 0;
        el.setAttribute('data-count', count + 1);
        el.classList.remove('notify');
        el.offsetWidth = el.offsetWidth;
        el.classList.add('notify');
        if(count === 0){
            el.classList.add('show-count');
        }
    }, false);