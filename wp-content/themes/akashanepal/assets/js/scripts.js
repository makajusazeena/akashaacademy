function testimonial(){
    const swiper = new Swiper('#testimonials', {
        // Optional parameters
        slidesPerView: 3,
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
      });
}
$(document).ready(function(){
    testimonial();


})