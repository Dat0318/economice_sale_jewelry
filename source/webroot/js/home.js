// Collection
$(document).ready(function($) {
	var swiper = new Swiper('.block-slider .swiper-container', {
      spaceBetween: 30,
      pagination: {
        el: '.block-slider .swiper-pagination',
        clickable: true,
      },
    });
});
// New product
$(document).ready(function($) {
	var swiper = new Swiper('.new-product .swiper-container', {
      slidesPerView: 4,
      spaceBetween: 50,
      // init: false,
      pagination: {
        el: '.new-product .swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
});

// Hot product
$(document).ready(function($) {
	var swiper = new Swiper('.hot-product .swiper-container', {
      slidesPerView: 4,
      spaceBetween: 50,
      // init: false,
      pagination: {
        el: '.hot-product .swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
});

// Other product
$(document).ready(function($) {
	var swiper = new Swiper('.other-product .swiper-container', {
      spaceBetween: 30,
      pagination: {
        el: '.other-product .swiper-pagination',
        clickable: true,
      },
    });
});

// Customer feedback
$(document).ready(function($) {
	var swiper = new Swiper('.customer-feedback .swiper-container', {
      spaceBetween: 30,
      pagination: {
        el: '.customer-feedback .swiper-pagination',
        clickable: true,
      },
    });
});
    
