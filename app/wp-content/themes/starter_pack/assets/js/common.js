const BODY = document.getElementsByTagName('body')[0];
const OVERLAY = document.getElementById('overlay') ? document.getElementById('overlay') : false;


//right menu
if (document.getElementById('right_menu')) {
  let show_right_menu = document.getElementById('show_right_menu');
  let close_right_menu = document.getElementById('close_right_menu');

  show_right_menu.addEventListener('click', function () {
    showRightMenu();
  });

  close_right_menu.addEventListener('click', function () {
    closeRightMenu();
  });


}


function showRightMenu() {
  setOverlay();
  BODY.classList.add('right_menu_showed');
}

function closeRightMenu() {
  BODY.classList.remove('right_menu_showed');
  removeOverlay();
}

function setOverlay() {
  OVERLAY.classList.remove('d_none');
  BODY.classList.add('ovf_hidden');
}

function removeOverlay() {
  OVERLAY.classList.add('d_none');
  BODY.classList.remove('ovf_hidden');
}

if (document.getElementById('promo_scene_prlx')) {
  var promo_scene_prlx = document.getElementById('promo_scene_prlx');
  var parallaxInstance = new Parallax(promo_scene_prlx, {
    relativeInput: true,
    hoverOnly: false,
    selector: '.prlx',
  });
}


//прокрутка

if (document.getElementById('main_page_navigation')) {

  document.getElementById('main_page_navigation').getElementsByTagName('a')[0].classList.add('active');

  $(window).scroll(function () {
    var $sections = $('section');
    $sections.each(function (i, el) {
      var top = $(el).offset().top - 100;
      var bottom = top + $(el).height();
      var scroll = $(window).scrollTop();
      var id = $(el).attr('id');
      if (scroll > top && scroll < bottom) {
        $('a.active').removeClass('active');
        $('a[href="#' + id + '"]').addClass('active');

      }
    })
  });

//slow scroll

  $("a").click(function () {
    $("html, body").animate({
      scrollTop: $($(this).attr("href")).offset().top + "px"
    }, {
      duration: 500,
      easing: "swing"
    });
    return false;
  });
}


///////////////////////////////////////////////////////
$(document).ready(function () {
  $("#callback_form").submit(function () {
    $.ajax({
      type: "POST",
      url: "\\wp-content\\themes\\starter_pack\\mails\\callback_mail.php",
      data: $(this).serialize()
    }).done(function () {
      popup_alert_done('callback_popup');
    }).fail(function () {
    });
    return false;
  });
});

// custom dots and navs
if (document.getElementById('dots_list')) {
  var dots_list = document.getElementById('dots_list');
  var dots_mass = dots_list.getElementsByClassName('dots_item');
  var our_service_carousel = $(".our_service_carousel");
  our_service_carousel.owlCarousel({
    loop: false,
    nav: false,
    margin: 20,
    padding: 0,
    dots: false,
    dotsContainer: '#dots_list',
    responsive: {
      0: {
        items: 1
      }
    }
  });
  $('.dots_item').click(function () {
    our_service_carousel.trigger('to.owl.carousel', [$(this).index(), 300]);
  });
  our_service_carousel.on('changed.owl.carousel', function (e) {
    changeActiveDots(e.item.index);
    return true;
  });

  function changeActiveDots(index) {

    for (let i = 0; i < dots_mass.length; i++) {
      dots_mass[i].classList.remove('active');
    }
    dots_mass[index].classList.add('active');

    return true;
  }

  $(".our_service_carousel_left_nav").click(function () {
    our_service_carousel.trigger("next.owl.carousel");
  });
  $(".our_service_carousel_right_nav").click(function () {
    our_service_carousel.trigger("prev.owl.carousel");
  });
}


//прокрутка
if (document.body.clientWidth > 1199 && $(window).scroll(function () {
  $(window).scrollTop() >= 50 ? $("#bottom_content_menu").addClass("hide") : $("#bottom_content_menu").removeClass("hide")
})) ;

function closeLeftMenuByMissClick(blockname, function_name) {
  $(document).mouseup(function (e) {
    let t = $("." + blockname);
    t.is(e.target) || 0 !== t.has(e.target).length || function_name
  })
}


let $dots = $('.owl-dot');
$dots.attr('aria-label', 'owl carousel');



//preloader
$(window).on('load', function () {
  $('.preloader').delay(1000).fadeOut('slow');
});
///////end preloader