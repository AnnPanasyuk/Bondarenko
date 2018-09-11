  if (window.matchMedia("(min-width: 1024px)").matches) {
    $(window).on('scroll', function () {
      let $window = $(window).scrollTop(),
        windowHeight = $(window).height() / 1.3;

      $(".title-animation").each(function () {
        if ($window + windowHeight >= $(this).offset().top) {

          $(this).addClass("wow fadeIn").css({
            animationDuration: ".3s",
            opacity: 1
          })
        }
      });

    });
    $(".item-animation").each(function () {

      $(this).addClass("wow zoomInUp").css({
        animationDuration: "1s"
      });
      $(".item-animation").eq(0).css({
        animationDelay: ".3s"
      });
      $(".item-animation").eq(1).css({
        animationDelay: ".7s"
      });
      $(".item-animation").eq(2).css({
        animationDelay: "1.2s"
      });

      if ($(".item-animation").length > 3) {
        $(".item-animation").eq(3).css({
          animationDelay: ".3s"
        });
        $(".item-animation").eq(4).css({
          animationDelay: ".7s"
        });
        $(".item-animation").eq(5).css({
          animationDelay: "1.2s"
        });
      }
    });
    $(".left-animation").addClass("wow fadeInLeft").css({
      animationDuration: ".5s",
      animationTimingFunction: "ease-out"
    })
    $(".right-animation").addClass("wow fadeInRight").css({
      animationDuration: ".5s",
      animationTimingFunction: "ease-out"
    })
  }
'use strict';
// fixed svg show
//-----------------------------------------------------------------------------
svg4everybody();

// checking if element for page
//-----------------------------------------------------------------------------------
function isOnPage(selector) {
    return ($(selector).length) ? $(selector) : false;
}

  $(window).on('scroll', function(){
      if($(window).scrollTop() > 1){
          $('.header').addClass('header-fixed');
      } else{
          $('.header').removeClass('header-fixed');
      }
  });

// // search page
// function pageWidget(pages) {
//   var widgetWrap = $('<div class="widget_wrap"><ul class="widget_list"></ul></div>');
//   widgetWrap.prependTo("body");
//   for (var i = 0; i < pages.length; i++) {
//     if (pages[i][0] === '#') {
//       $('<li class="widget_item"><a class="widget_link" href="' + pages[i] +'">' + pages[i] + '</a></li>').appendTo('.widget_list');
//     } else {
//       $('<li class="widget_item"><a class="widget_link" href="' + pages[i] + '.html' + '">' + pages[i] + '</a></li>').appendTo('.widget_list');
//     }
//   }
//   var widgetStilization = $('<style>body {position:relative} .widget_wrap{position:fixed;top:0;left:0;z-index:9999;padding:20px 20px;background:#222;border-bottom-right-radius:10px;-webkit-transition:all .3s ease;transition:all .3s ease;-webkit-transform:translate(-100%,0);-ms-transform:translate(-100%,0);transform:translate(-100%,0)}.widget_wrap:after{content:" ";position:absolute;top:0;left:100%;width:24px;height:24px;background:#222 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAABGdBTUEAALGPC/xhBQAAAAxQTFRF////////AAAA////BQBkwgAAAAN0Uk5TxMMAjAd+zwAAACNJREFUCNdjqP///y/DfyBg+LVq1Xoo8W8/CkFYAmwA0Kg/AFcANT5fe7l4AAAAAElFTkSuQmCC) no-repeat 50% 50%;cursor:pointer}.widget_wrap:hover{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0)}.widget_item{padding:0 0 10px}.widget_link{color:#fff;text-decoration:none;font-size:15px;}.widget_link:hover{text-decoration:underline} </style>');
//   widgetStilization.prependTo(".widget_wrap");
// }
//
// $(document).ready(function($) {
//   pageWidget(['index', 'detail-news', 'portfolio', 'contact-page', 'news', 'services-page','wedding-event','corporate-event','specific-event','biography', '#modal', '#modal2']);
// });

// general-menu
//-----------------------------------------------------------------------------------
$(document).on('click', '.js-header-menu-btn', function (e) {
    e.preventDefault();
    $('body').addClass('open-general-menu');
});
$(document).on('click', '.js-btn-close-menu', function (e) {
    e.preventDefault();
    $('body').removeClass('open-general-menu');
});
$(document).on('click', '.js-menu-overlay', function(){
  $('body').removeClass('open-general-menu');
})
$("body").on("click", ".line-item a", function() {
  var t = $($(this).attr("href")).offset().top - 90 + 'px';
  return $("html,body").animate({
      scrollTop: t
  }, 800), !1
});
window.chartColors = {
    red: '#ff3657',
    red1: '#ce0000',
    orange: '#cab486',
    yellow: '#504740',
    green: '#70d600',
    blue: '#f6612c',
    grey: 'rgba(232, 232, 232, 0.8)',
    dark: '#bababa',
    greyspec: 'rgba(186, 186, 186, 0.2)'
};

function isScrolledIntoView(elem){
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();

      var elemTop = elem.offset().top;
      var elemBottom = elemTop + elem.height();

      return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
}


if (isOnPage($('.chart'))) {
    var configChartMuscles = {
        type: 'doughnut',
        data: {
            datasets: [{
                borderWidth: 0,
                data: [
                    28,
                    72
                ],
                backgroundColor: [
                    window.chartColors.grey,
                    window.chartColors.dark
                ],
                label: 'Dataset 1'
            }],
            labels: [
                '1',
                '2'
            ]
        },
        options: {
            cutoutPercentage: 93,
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            title: {
                display: false
            },
            animation: {
                duration: 1000
            }
        }
    };


        $('.chart').each(function () {
            //var idChart = $(this).attr('id');
            //var ctxMuscles = document.getElementById(idChart).getContext('2d');
            var currrr = $(this);
            var ctxMuscles = this.getContext('2d');
            var rounder = $(this).attr('data-percent')*1;
            configChartMuscles.data.datasets[0].data = [ 100 - rounder , rounder  ] ;

        //    var cuntdfg = new Chart(ctxMuscles, configChartMuscles);

            var inView = false;

            $(window).scroll(function() {

                if (isScrolledIntoView( currrr )) {
                    if (inView) { return; }
                    inView = true;
                    new Chart(ctxMuscles, configChartMuscles);
                } else {
                    inView = false;
                }

            });
        });

}

if (isOnPage($('.chart-color'))) {
    var configChartMuscles1 = {
        type: 'doughnut',
        data: {
            datasets: [{
                borderWidth: 0,
                data: [
                    28,
                    72
                ],
                backgroundColor: [
                    window.chartColors.yellow,
                    window.chartColors.orange
                ],
                label: 'Dataset 1'
            }],
            labels: [
                '1',
                '2'
            ]
        },
        options: {
            cutoutPercentage: 93,
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            title: {
                display: false
            },
            animation: {
                duration: 1000
            }
        }
    };
    $('.chart-color').each(function () {
        //var idChart1 = $(this).attr('id');
        //var ctxMuscles1 = document.getElementById(idChart1).getContext('2d');
        var currrr = $(this);

        var ctxMuscles1 = this.getContext('2d');
        var rounder = $(this).attr('data-percent')*1;
        configChartMuscles1.data.datasets[0].data = [ 100 - rounder , rounder  ];

        var inView = false;

        $(window).scroll(function() {

            if (isScrolledIntoView( currrr )) {
                if (inView) { return; }
                inView = true;
                new Chart(ctxMuscles1, configChartMuscles1);
            } else {
                inView = false;
            }

        });

    });

}

if (isOnPage($('.chart-events'))) {
    var configChartMuscles2 = {
        type: 'doughnut',
        data: {
            datasets: [{
                borderWidth: 0,
                data: [
                    28,
                    72
                ],
                backgroundColor: [
                    window.chartColors.grey,
                    window.chartColors.orange
                ],
                label: 'Dataset 1'
            }],
            labels: [
                '1',
                '2'
            ]
        },
        options: {
            cutoutPercentage: 93,
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            title: {
                display: false
            },
            animation: {
                duration: 1000
            }
        }
    };
    $('.chart-events').each(function () {
       // var idChart2 = $(this).attr('id');
       // var ctxMuscles2 = document.getElementById(idChart2).getContext('2d');
        var currrr = $(this);

        var ctxMuscles2 = this.getContext('2d');
        var rounder = $(this).attr('data-percent')*1;
        configChartMuscles2.data.datasets[0].data = [ 100 - rounder , rounder  ];

        var inView = false;


        $(window).scroll(function() {

            if (isScrolledIntoView( currrr )) {
                if (inView) { return; }
                inView = true;
                new Chart(ctxMuscles2, configChartMuscles2);
            } else {
                inView = false;
            }

        });

    });

}

if (isOnPage($('.chart-spec-events'))) {
    var configChartMuscles3 = {
        type: 'doughnut',
        data: {
            datasets: [{
                borderWidth: 0,
                data: [
                    28,
                    72
                ],
                backgroundColor: [
                    window.chartColors.greyspec,
                    window.chartColors.orange
                ],
                label: 'Dataset 1'
            }],
            labels: [
                '1',
                '2'
            ]
        },
        options: {
            cutoutPercentage: 93,
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            title: {
                display: false
            },
            animation: {
                duration: 1000
            }
        }
    };
    $('.chart-spec-events').each(function () {
       // var idChart3 = $(this).attr('id');
       // var ctxMuscles3 = document.getElementById(idChart3).getContext('2d');
        var currrr = $(this);

        var inView = false;

        var ctxMuscles3 = this.getContext('2d');
        var rounder = $(this).attr('data-percent')*1;
        configChartMuscles3.data.datasets[0].data = [ 100 - rounder , rounder  ];


        $(window).scroll(function() {

            if (isScrolledIntoView( currrr )) {
                if (inView) { return; }
                inView = true;
                new Chart(ctxMuscles3, configChartMuscles3);
            } else {
                inView = false;
            }

        });

    });

}

if (isOnPage($('.gallery-item'))) {
  var galleryItems = $('.gallery-item').length,
    stringNum =  galleryItems - 6;
     if (galleryItems < 10){
       $('.items-count p').text('+ ' + stringNum);
   } else {
       $('.items-count p').text('+ ' + stringNum);
   }
}

if (isOnPage($('.gallery-item.mod-biography'))) {
  var galleryItems = $('.gallery-item.mod-biography').length,
    stringNum =  galleryItems - 3;
     if (galleryItems < 10){
       $('.items-count p').text('+ ' + stringNum);
   } else {
       $('.items-count p').text('+ ' + stringNum);
   }
}


$(document).on('click', '.header-lang', function (e) {

    $(this).toggleClass('is-active');
    if ($(this).hasClass('is-active')) {
        $('.header-lang').removeClass('mod-ru');
        $('.header-lang').removeClass('mod-de');
    }
});

$(document).on('click', '.header-lang .de', function (e) {
    e.preventDefault();
    $('.header-lang').addClass('mod-de');
});

$(document).on('click', '.header-lang .ru', function (e) {
    e.preventDefault();
    $('.header-lang').addClass('mod-ru');
});

$("[data-fancybox]").fancybox({
    infobar: false,
    buttons: [
        "close"
    ],
    thumbs : {
        autoStart : true,
        axis      : 'x'
    }
});

new WOW().init();
// custom jQuery validation
//-----------------------------------------------------------------------------------
var validator = {
    init: function() {
        $('form').each(function() {
            var name = $(this).attr('name');
            if (valitatorRules.hasOwnProperty(name)) {
                var rules = valitatorRules[name];
                $(this).validate({
                    rules: rules,
                    errorElement: 'b',
                    errorClass: 'error',
                    focusInvalid: false,
                    focusCleanup: false,
                    onfocusout: function(element) {
                        var $el = validator.defineElement($(element));
                        $el.valid();
                    },
                    errorPlacement: function(error, element) {
                        validator.setError($(element), error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        var $el = validator.defineElement($(element)),
                            $elWrap = $el.closest('.el-field');
                        if ($el) {
                            $el.removeClass(validClass).addClass(errorClass);
                            $elWrap.removeClass('show-check');
                            if ($el.closest('.ui.dropdown').length) {
                                $el.closest('.ui.dropdown').addClass('error');
                            }
                        }
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        var $el = validator.defineElement($(element)),
                            $elWrap = $el.closest('.el-field');
                        if ($el) {
                            $el.removeClass(errorClass).addClass(validClass);
                            if ($elWrap.hasClass('check-valid')) {
                                $elWrap.addClass('show-check');
                            }
                            $el.closest('el-field').addClass('show-check');
                            if ($el.val() == '') {
                                $el.removeClass('valid');
                            }
                            if ($el.closest('.ui.dropdown').length) {
                                $el.closest('.ui.dropdown').removeClass('error');
                            }
                        }
                    },
                    messages: {
                        'user_email': {
                            required: 'Поле обязательное',
                            email: 'Неправильный формат E-mail'
                        },
                        'user_name': {
                            required: 'Поле обязательное',
                            letters: 'Неправильный формат имени',
                            minlength: 'Не меньше 2 символов'
                        },
                        'user_login': {
                            required: 'Поле обязательное',
                            email: 'Неправильный формат E-mail'
                        },
                        'user_password': {
                            required: 'Поле обязательное',
                            minlength: 'Не менее 6-ти символов'
                        },
                        'user_password_confirm': {
                            required: 'Вы не подтвердили пароль',
                            minlength: 'Не менее 6-ти символов',
                            equalTo: 'Пароли должны совпадать'
                        },
                        'user_phone': {
                            required: 'Поле обязательное',
                            digits: 'Неправильный формат номера'
                        }
                    }
                });
            }
        });
    },
    setError: function($el, message) {
        $el = this.defineElement($el);
        if ($el) this.domWorker.error($el, message);
    },
    defineElement: function($el) {
        return $el;
    },
    domWorker: {
        error: function($el, message) {
            if ($el.attr('type') == 'file') $el.parent().addClass('file-error');
            $el.addClass('error');
            $el.after(message);
        }
    }
};


// rule for form namespace
//-----------------------------------------------------------------------------------
var valitatorRules = {
    'form_one': {
        'user_login': {
            required: true,
            email: true
        },
        'user_name': {
            required: true,
            minlength: 2
        },
        'user_email': {
            required: true,
            email: true
        },
        'user_phone': {
            required: true,
            digits: true
        },
        'user_password': {
            required: true,
            minlength: 6
        },
        'user_password_confirm': {
            required: true,
            minlength: 6,
            equalTo: "#user_password"
        }
    }

};

// custom rules
//-----------------------------------------------------------------------------------
$.validator.addMethod("email", function(value) {
    if (value == '') return true;
    var regexp = /[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    return regexp.test(value);
});

$.validator.addMethod("letters", function(value, element) {
    return this.optional(element) || /^[^1-9!@#\$%\^&\*\(\)\[\]:;,.?=+_<>`~\\\/"]+$/i.test(value);
});

$.validator.addMethod("digits", function(value, element) {
    return this.optional(element) || /^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/i.test(value);
});

$.validator.addMethod("valueNotEquals", function(value, element) {
    if (value == "") return false
    else return true
});

//  validator init
//-----------------------------------------------------------------------------------
validator.init();

  $('input[name="phone_contact"]').inputmask({
    mask: "+(999) 99 99 99",
    greedy: false
  });
    function init() {
      var coords = {
        lat: -37.81298694478599,
        lng: 144.96654156616205
      };
      var mapOptions = {
        zoom: 7,
        scrollwheel: false,
        zoomControl: false,
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        scaleControl: false,
        panControl: false,
        streetViewControl: false,
        draggable: true,
        overviewMapControl: false,
        disableDefaultUI: true,
        center: coords,
        styles:
          [
              {
                  "featureType": "all",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "saturation": 36
                      },
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 40
                      }
                  ]
              },
              {
                  "featureType": "all",
                  "elementType": "labels.text.stroke",
                  "stylers": [
                      {
                          "visibility": "on"
                      },
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 16
                      }
                  ]
              },
              {
                  "featureType": "all",
                  "elementType": "labels.icon",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 20
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry.stroke",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 17
                      },
                      {
                          "weight": 1.2
                      }
                  ]
              },
              {
                  "featureType": "landscape",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 20
                      }
                  ]
              },
              {
                  "featureType": "poi",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 21
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 17
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "geometry.stroke",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 29
                      },
                      {
                          "weight": 0.2
                      }
                  ]
              },
              {
                  "featureType": "road.arterial",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 18
                      }
                  ]
              },
              {
                  "featureType": "road.local",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 16
                      }
                  ]
              },
              {
                  "featureType": "transit",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 19
                      }
                  ]
              },
              {
                  "featureType": "water",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 17
                      }
                  ]
              }
          ]
      }
      if ($('#map').length) {
      var myMap = new google.maps.Map(document.getElementById("map"), mapOptions);
      var markers = [{
        index: 0,
        "latitude": -37.81298694478599,
        "longitude": 144.96654156616205
      }
      ]
      for (var i = 0; i < markers.length; i++) {
        addMarker(markers[i]);
      }

      function addMarker(properties) {
        new RichMarker({
          position: new google.maps.LatLng(properties.latitude, properties.longitude),
          map: myMap,
          draggable: false,
          shadow: "none",
          id: "Id-" + properties.index,
          content: '<img src="/wp-content/themes/bondarenko/assets/img/marker-pin.png" alt="marker" </div>'
        });
      }
    }
    }
    google.maps.event.addDomListener(window, 'load', init);

  let $sliderTop = $('.slider-top'),
      $sliderEvents = $('.slider-events'),
      $sliderSpecEvents = $('.specific-events-slider'),
      $sliderReviews = $('.slider-reviews'),
      $newsSlider = $('.news-slider'),
      $newsPaginationSlider = $('.news-pagination-slider'),
      $gallerySlider = $('.gallery-slider');

  if (isOnPage($sliderTop)){
      $sliderTop.slick({
          dots: false,
          arrows: true,
          infinite: true,
          speed: 400,
          cssEase: 'ease',
          swipeToSlide: true,
          nextArrow: $('.nav-slider .current')
      });

      let allSlides = $sliderTop.slick('getSlick').$slides.length,
          thisSlide = $sliderTop.slick('slickCurrentSlide');


      $sliderTop.on('beforeChange', function(event, slick, currentSlide){
          $sliderTop.css({opacity: 0.5});
      });

      if (allSlides < 10){
          $('.nav-slider .all').text('0'+allSlides);
      } else {
          $('.nav-slider .all').text(allSlides);
      }

      $sliderTop.on('afterChange', function(event, slick, currentSlide){
          var thisNumber = currentSlide + 1;

          $sliderTop.css({opacity: 1});
          thisSlide = currentSlide;
          if (thisNumber < 10){
              $('.nav-slider .current').text('0'+ thisNumber);
          } else {
              $('.nav-slider .current').text(thisNumber);
          }
      });

      $('.nav-slider').on('mouseenter', function(){
          let currentItem = thisSlide + 2;

          if (currentItem < 10){
              if(thisSlide + 1 >= allSlides){
                  currentItem = 1;
              }
              $('.nav-slider .current').text('0'+ currentItem);
          } else {
              if(thisSlide + 1 >= allSlides){
                  currentItem = 1;
              }
              $('.nav-slider .current').text(currentItem);
          }
      });

      $('.nav-slider .current').on('mouseleave', function(){
          let currentItem = thisSlide + 1;

          if (currentItem < 10){
              $('.nav-slider .current').text('0'+ currentItem);
          } else {
              $('.nav-slider .current').text(currentItem);
          }
      });
  }
  if (isOnPage($sliderEvents)){
      $sliderEvents.slick({
          dots: false,
          arrows: false,
          infinite: false,
          speed: 300,
          variableWidth: true,
          // swipeToSlide: true,
          slidesToScroll: 3,
          slidesToShow: 4,
          responsive: [
              {
                  breakpoint: 1460,
                  settings: {
                      infinite: false,
                      slidesToShow: 3,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 1440,
                  settings: {
                      infinite: false,
                      slidesToShow: 3
                  }
              },
              {
                  breakpoint: 1024,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                  }
              },
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      variableWidth: false,
                      dots: true
                  }
              }
          ]
      });
  }
  if (isOnPage($sliderSpecEvents)){
      $sliderSpecEvents.slick({
          dots: false,
          arrows: true,
          infinite: true,
          speed: 300,
          cssEase: 'ease',
          swipeToSlide: true,
          nextArrow: $('.nav-spec-slider .current')
      });

      let allSlidesSpec = $sliderSpecEvents.slick('getSlick').$slides.length,
          thisSlide = 0;


      if (allSlidesSpec < 10){
          $('.nav-spec-slider .all').text('0'+allSlidesSpec);
      } else {
          $('.nav-spec-slider .all').text(allSlidesSpec);
      }

      $sliderSpecEvents.on('afterChange', function(event, slick, currentSlide){
          var thisNumber = currentSlide + 1;

          $sliderTop.css({opacity: 1});
          thisSlide = currentSlide;
          if (thisNumber < 10){
              $('.nav-spec-slider .current').text('0'+ thisNumber);
          } else {
              $('.nav-spec-slider .current').text(thisNumber);
          }
      });

      $('.nav-spec-slider').on('mouseenter', function(){
          let currentItem = thisSlide + 2;

          if (currentItem < 10){
              if(thisSlide + 1 >= allSlidesSpec){
                  currentItem = 1;
              }
              $('.nav-spec-slider .current').text('0'+ currentItem);
          } else {
              if(thisSlide + 1 >= allSlidesSpec){
                  currentItem = 1;
              }
              $('.nav-spec-slider .current').text(currentItem);
          }
      });

      $('.nav-spec-slider .current').on('mouseleave', function(){
          let currentItem = thisSlide + 1;

          if (currentItem < 10){
              $('.nav-spec-slider .current').text('0'+ currentItem);
          } else {
              $('.nav-spec-slider .current').text(currentItem);
          }
      });
  }

  if(isOnPage($sliderReviews) && $(window).width() <= 1024){
      $sliderReviews.slick({
          infinite: false,
          dots: true,
          arrows: false,
          speed: 300,
          slidesToShow: 2,
          slidesToScroll: 1,
          responsive: [
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 1,
                      dots: true,
                  }
              }
          ]
      });
  }

  if(isOnPage($newsSlider) && $(window).width() <= 1024){
      $newsSlider.slick({
          infinite: false,
          dots: true,
          arrows: false,
          speed: 300,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      dots: true,
                  }
              }
          ]
      });
  }

  if(isOnPage($newsPaginationSlider) && $(window).width() <= 768){
      $newsPaginationSlider.slick({
          infinite: false,
          dots: true,
          arrows: false,
          speed: 300,
          slidesToShow: 1,
          slidesToScroll: 1
      })
  }

  if(isOnPage($gallerySlider) && $(window).width() <=767){
      $gallerySlider.slick({
          infinite: false,
          dots: true,
          arrows: false,
          speed: 300,
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true
      });
  }
  $(function() {
      var $container = $('.js-index');
      $container.find('');
  });


  function validationCall(form){

      var thisForm = form;
      var formSur = thisForm.serialize();

      $.ajax({
          url : thisForm.attr('action'),
          data: formSur,
          method:'POST',
          success : function(data){
              if ( data.trim() == 'true') {
                  thisForm.trigger("reset");

                  $('.btn-close-menu').click();
                  
                  popNext("#call_success");
              }
              else {
                  thisForm.trigger('reset');
              }

          }
      });
  }

  function popNext(popupId){

      $.fancybox.open({
          src  : popupId,
          type : 'inline',
          opts : {
              afterClose: function(){
                  $('form').trigger("reset");
              }
          }
      });

  }

  $(document).ready(function() {

        $('form').on('submit', function (e) {
            e.preventDefault();
            validationCall( $(this) );

        })

  })