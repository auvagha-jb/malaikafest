$(document).ready(function() 
  {
      var owl = $('.slider');
      owl.owlCarousel({
        items: 3,  // Initial number of items
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true
      });
      // Check the screen size on load
      if ($(window).width() < 768) {
        owl.trigger('destroy.owl.carousel');
        owl.owlCarousel({
          items: 1,  // Change to 1 item for smaller screens
          loop: true,
          autoplay: true,
          autoplayTimeout: 2000,
          autoplayHoverPause: true
        });
      }
      // Check the screen size on resize
      $(window).resize(function() {
        if ($(window).width() < 768) {
          owl.trigger('destroy.owl.carousel');
          owl.owlCarousel({
            items: 1,  // Change to 1 item for smaller screens
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true
          });
        } else {
          owl.trigger('destroy.owl.carousel');
          owl.owlCarousel({
            items: 3,  // Change back to 4 items for larger screens
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true
          });
        }
      });
  });