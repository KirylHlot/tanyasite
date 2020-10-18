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
if (document.body.clientWidth > 1199 && $(window).scroll(function() {
  $(window).scrollTop() >= 50 ? $("#bottom_content_menu").addClass("hide") : $("#bottom_content_menu").removeClass("hide")
}));

function closeLeftMenuByMissClick(blockname, function_name) {
  $(document).mouseup(function(e) {
    let t = $("." + blockname);
    t.is(e.target) || 0 !== t.has(e.target).length || function_name
  })
}

function setOverlay() {
  document.getElementById('overlay').classList.remove('d_none');
  document.getElementById('body').classList.add('ovf_hidden');
  return true;
}

function removeOverlay() {
  document.getElementById('overlay').classList.add('d_none');
  document.getElementById('body').classList.remove('ovf_hidden');
  return true;
}

let $dots = $('.owl-dot');
$dots.attr('aria-label', 'owl carousel');

//slow scroll
$(document).ready(function() {
  $("a.scroll").click(function() {
    $("html, body").animate({
      scrollTop: $($(this).attr("href")).offset().top + "px"
    }, {
      duration: 500,
      easing: "swing"
    });
    return false;
  });
});

//preloader
$(window). on('load', function(){
  $('.preloader').delay(1000).fadeOut('slow');
});
///////end preloader