jQuery(document).ready(function () {

  //Script for the menu
  jQuery('.menu_toggle').on('click', function (event) {
    jQuery('.fa').toggleClass('on_active')
    jQuery('.menu').slideToggle(500)
    event.preventDefault()
  })

  if(window.matchMedia('(max-width: 768px)').matches)
  {
    jQuery('.menu').on('click', function (event) {
      jQuery('.menu').slideUp(500)
    })
  }


  //Script for the Scroll
  jQuery('#primary-menu, #header-button').on('click', 'a', function (event) {
    event.preventDefault()
    var id = jQuery(this).attr('href'),
      top = jQuery(id).offset().top
    jQuery('body,html').animate({scrollTop: top}, 1600)
    jQuery('.menu-item').addClass('.active-item')
  })

  //Script for the Slider
  jQuery('.slider').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true
        }
      }
    ]
  })

})





