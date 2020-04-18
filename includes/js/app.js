// App
//swiper destaque
var destaque;
destaque = new Swiper("#destaque", {
  pagination: {
    el: "#destaquepagination.swiper-pagination",
    clickable: true
  },
  paginationClickable: true,
  loop: false,
  slidesPerView: 1,
  centeredSlides: false,
  spaceBetween: 0,
  effect: "fade",
  navigation: {
    prevEl: "#destaqueprev",
    nextEl: "#destaquenext"
  }
});
