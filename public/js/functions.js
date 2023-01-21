// $("#menu-list").scrollspy({ offset: -180 });

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 2,
  spaceBetween: 15,
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 5,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 15,
    },
  },
});

var swiper = new Swiper(".swiper1", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".swiper2", {
  slidesPerView: 5,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  },
});
// $('document').ready(function(){
//     setHeight();
// })

$("#mobile-menu").click(function () {
  $("#main-nav-wrapper").toggleClass("show-menu");
  $("body").toggleClass("menu-showing");
});
$(".add-to-cart").click(function (e) {
  e.preventDefault();
  $("body").addClass("main-showing");
  $("#product-main").addClass("show");
});
$("#close-product-main").click(function (e) {
  e.preventDefault();
  $("#product-main").removeClass("show");
  $("body").removeClass("main-showing");
});
$("#coupon-link").click(function (e) {
  e.preventDefault();
  $("#coupon-input").slideToggle();
});
$("#desktop-cart a").click(function () {
  $("#cart").addClass("show");
});
$(".cart-title a").click(function () {
  $("#cart").removeClass("show");
});
if ($(window).width() > 1025) {
  $(".has-child").hover(
    function () {
      var position = $(this).offset();
      var width = $(this).width();
      var top = position.top;
      var left = position.left;
      var leftP = left - width + 12;
      // $(this).find(".is-child").css("top", top);
      $(this).find(".is-child").css("left", leftP);
      $(this).find(".is-child").show();
      $(this).find(".is-child").css("opacity", "1");
      $(this).find(".is-child").css("visibility", "visible");
    },
    function () {
      $(this).find(".is-child").css("opacity", "0");
      $(this).find(".is-child").css("visibility", "hidden");
      $(this).find(".is-child").hide();
    }
  );
}
$("#mobile-cart-trigger").click(function () {
  $("#cart").addClass("show");
});

$(".delivery-wrap").click(function () {
  $("#delivery-form").show();
  $("#pickup-form").hide();
  $(this).addClass("active");
  $(".checkout-wrap").removeClass("active");
});
$(".checkout-wrap").click(function () {
  $("#delivery-form").hide();
  $("#pickup-form").show();
  $(this).addClass("active");
  $(".delivery-wrap").removeClass("active");
});
$("#check-out").click(function (e) {
  e.preventDefault();
  $("#cart").removeClass("show");
  $("#checkout").addClass("show");
});
$("#close-checkout").click(function () {
  $("#checkout").removeClass("show");
});

$(".nav-item")
  .not(".has-child")
  .click(function () {
    $("#main-nav-wrapper").removeClass("show-menu");
  });
$(".nav-item.has-child").click(function () {
  $(".is-child").toggle();
});
$(".is-child").click(function () {
  $("#main-nav-wrapper").removeClass("show-menu");
});

$(".variant-radio-label").click(function () {
  $(".variant-radio-label").removeClass("selected");
  $(this).addClass("selected");
});
// $(".nav-link").click(function(){
//   $("#main-nav-wrapper").removeClass("show-menu");
// });
// $("has-child .nav-link").click(function(e){
//   e.stopPropagation();
//   $("#main-nav-wrapper").addClass("show-menu");
// })

// $("#menu-list").scrollspy({ offset: -180 });
// function setHeight(){
//     var cw = $(".product-wrapper-main").width();
//     $(".product-image").css({
//         'height': cw + 'px'
//     });
// }
