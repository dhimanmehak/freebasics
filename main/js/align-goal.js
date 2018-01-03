
// Applies device viewport height to first fold
vW = $(window).width();
if (vW >= 992){

  $(document).ready(function(){
  resizeDiv();
  });

  window.onresize = function(event) {
  resizeDiv();
  };

}
function resizeDiv(){
vph = $(window).height();
var computedHeight;
if(vW > 1300){
  computedHeight = (vph - 104);
  $(".fb-home-first-fold").css({"height": computedHeight + "px"});
  $(".fb-awg-ff-table").css({"height": computedHeight + "px"});
}
else if(vW > 1500){
  computedHeight = (vph - 113);
}
else if(vW > 1650){
  computedHeight = (vph - 104);
}
}

$(".fb-learn-more-btn-wrap > a").click(function() {
    $('html, body').animate({
        scrollTop: $(".fb-home-second-fold").offset().top
    }, 900);
});
$(".fb-awg-learn-more-btn-wrap > a").click(function() {
    $('html, body').animate({
        scrollTop: $(".fb-stats-section").offset().top
    }, 900);
});





// Adds Relevant classes to Goal steps when clicking next button
$('.fb-take-action-btn').click(function() {
    $('.fb-header-tab-trigger > li').removeClass("active");
    $('.fb-goal-tab-content .tab-pane').removeClass("active in");
    $('.fb-align-with-goal-tab-trigger').addClass("active");
    $('.fb-align-with-goal-tabpane').addClass("active in");
    $("html, body").animate({ scrollTop: 0 }, "slow");
});
$('.fb-awg-view-project-btn').click(function() {
    $('.fb-header-tab-trigger > li').removeClass("active");
    $('.fb-goal-tab-content .tab-pane').removeClass("active in");
    $('.fb-start-project-tab-trigger').addClass("active");
    $('.fb-support-project-tabpane').addClass("active in");
    $("html, body").animate({ scrollTop: 0 }, "slow");
});

  $(document).ready(function() {
    $('#nav-one').onePageNav({
      easing: 'easeInOutExpo',
      scrollSpeed: 1500,
    });
    $('#nav-two').onePageNav({
      easing: 'easeInOutExpo',
      scrollSpeed: 1500,
    });
  });
// Adds a class to body tag of twitter widget iframe - for styling purposes
window.setTimeout(function(){
  $(".fb-awg-twitter-section iframe").ready(function (){
    $('.fb-awg-twitter-section iframe').contents().find("body").addClass("fb-single-twitter-feed");
  });
}, 1000);

// Goal Wheel Interaction
$(".fb-awg-ff-goal-detail-content").hide();
$(".fb-awg-ff-goal-detail-content.active").fadeIn();
$(".fb-awg-selected-goal-image").hide();
$(".fb-awg-selected-goal-image.active").fadeIn();

$(".fb-goal-fragment").click(function(){
  $(".fb-goal-fragment").removeClass("active");
  $(".fb-awg-ff-goal-detail-content").removeClass("active").hide();
  $(".fb-awg-selected-goal-image").removeClass("active").hide();
  var clickedFragment = $(this).attr("class");

  if(clickedFragment === "fb-goal-fragment goal-trigger-1"){
    $(this).addClass("active");
    $(".goal-content-1").addClass("active").fadeIn();
    $("#goal-image-1").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-2"){
    $(this).addClass("active");
    $(".goal-content-2").addClass("active").fadeIn();
    $("#goal-image-2").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-3"){
    $(this).addClass("active");
    $(".goal-content-3").addClass("active").fadeIn();
    $("#goal-image-3").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-4"){
    $(this).addClass("active");
    $(".goal-content-4").addClass("active").fadeIn();
    $("#goal-image-4").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-5"){
    $(this).addClass("active");
    $(".goal-content-5").addClass("active").fadeIn();
    $("#goal-image-5").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-6"){
    $(this).addClass("active");
    $(".goal-content-6").addClass("active").fadeIn();
    $("#goal-image-6").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-6"){
    $(this).addClass("active");
    $(".goal-content-6").addClass("active").fadeIn();
    $("#goal-image-6").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-7"){
    $(this).addClass("active");
    $(".goal-content-7").addClass("active").fadeIn();
    $("#goal-image-7").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-8"){
    $(this).addClass("active");
    $(".goal-content-8").addClass("active").fadeIn();
    $("#goal-image-8").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-9"){
    $(this).addClass("active");
    $(".goal-content-9").addClass("active").fadeIn();
    $("#goal-image-9").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-10"){
    $(this).addClass("active");
    $(".goal-content-10").addClass("active").fadeIn();
    $("#goal-image-10").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-11"){
    $(this).addClass("active");
    $(".goal-content-11").addClass("active").fadeIn();
    $("#goal-image-11").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-12"){
    $(this).addClass("active");
    $(".goal-content-12").addClass("active").fadeIn();
    $("#goal-image-12").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-13"){
    $(this).addClass("active");
    $(".goal-content-13").addClass("active").fadeIn();
    $("#goal-image-13").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-14"){
    $(this).addClass("active");
    $(".goal-content-14").addClass("active").fadeIn();
    $("#goal-image-14").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-15"){
    $(this).addClass("active");
    $(".goal-content-15").addClass("active").fadeIn();
    $("#goal-image-15").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-16"){
    $(this).addClass("active");
    $(".goal-content-16").addClass("active").fadeIn();
    $("#goal-image-16").fadeIn();
  }
  else if(clickedFragment === "fb-goal-fragment goal-trigger-17"){
    $(this).addClass("active");
    $(".goal-content-17").addClass("active").fadeIn();
    $("#goal-image-17").fadeIn();
  }
});

// Pledge Button Interaction
$(".fb-twitter-fb-pledge-btns-wrapper").hide();
// $(".fb-awg-pledge-btn").click(function(){
//   $(".fb-twitter-fb-pledge-btns-wrapper").slideDown();
// });
// $(".fb-pledge-greeting-text-wrapper .icon-close").click(function(){
//   $(".fb-twitter-fb-pledge-btns-wrapper").slideUp();
// });

// View Project Button Interaction
$('.fb-view-project-btn').click(function() {
    $('.fb-header-tab-trigger > li').removeClass("active");
    $('.fb-goal-tab-content .tab-pane').removeClass("active in");
    $('.fb-start-project-tab-trigger').addClass("active");
    $('.fb-support-project-tabpane').addClass("active in");
    $("html, body").animate({ scrollTop: 0 }, "slow");
});

// Adding stylesheet dynamically for styling Start a Project Map
// $(document).ready(function() {
//   $('.fb-sap-map-iframe').load(function(){
//     $('.fb-sap-map-iframe').contents().find('body').addClass('test');
//   });
// });
// window.setTimeout(function(){
//   $(".fb-sap-map-iframe").ready(function (){
//     var $mapIframContent = $(".fb-sap-map-iframe").contents();
//     $mapIframContent.find("body").addClass("test");
//   });
// }, 1000);

// Buzz feed button interaction
$('.FAB').on('click', function () {
  $(this).closest('.user-input').toggleClass('show-input');
  $(this).find(".icon-add").toggleClass("rotate");
});

// Adds a class to body tag of buzz feed twitter widget iframe - for styling purposes
window.setTimeout(function(){
  $(".fb-floating-buzz-feed-btn iframe").ready(function (){
    $('.fb-floating-buzz-feed-btn iframe').contents().find("body").addClass("fb-single-twitter-feed");
  });
}, 1000);

// Support Project Map
window.setTimeout(function(){
  $(".fb-sap-first-fold iframe").ready(function (){
    $('.fb-sap-first-fold iframe').contents().find("body").addClass("fb-sap-map");
  });
}, 1000);

(function() {
	// $('.grid').height( $(window).height() );
	var	contents = $('.fb-sap-map-iframe').contents(),
		body = contents.find('body'),
		styleTag = $('<style></style>').appendTo(contents.find('head'));
})();

// Closes Buzzfeed panel on scroll
$(window).scroll(function(){
   if ($(this).scrollTop() > 5) {
       $('.user-input').removeClass('show-input');
       $(".icon-add").removeClass("rotate");
   } else {}
});
