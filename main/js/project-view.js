
// Checks viewport width
vW = $(window).width();
// $(".fb-share-btn-list").hide();
if (vW < 991){
    $(".fb-share-btn").click(function(){
        $(".fb-share-btn-list").slideToggle();
    });
}
else{
    $(".fb-share-btn").click(function(){
        $(".fb-share-btn-list li").toggleClass("active");
    });
    $(document).mouseup(function (e)
        {
            var container = $(".fb-share-btn-list, .fb-share-btn");

            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                $(".fb-share-btn-list li").removeClass("active");
            }
        });
}

// Mark as interested button interaction
$(".fb-mark-interest-btn").click(function(){
  $(this).toggleClass("interested");
  var btnTextWrapper = $(this).find("span");
  if (btnTextWrapper.text() == "Mark as Interested"){
      btnTextWrapper.text("I'm interested");
  }
    else{
    btnTextWrapper.text("Mark as Interested");
    }
});


// Like button interaction
$(".fb-comment-like-btn").click(function(){
  $(this).toggleClass("liked");
});

// view reply button interaction
$(".fb-replies-link").click(function() {
  $(this).closest(".fb-comment-replies-section").find(".fb-comment-replies-wrapper").fadeToggle();

    $(".fb-replies-link").toggleClass("replies-opened");
    var replyTextWrapper = $(this).find("span");
    var replyText = replyTextWrapper.text();

    if (replyText !== "Hide Replies"){
      replyTextWrapper.text("Hide Replies");
    }

    else if(replyText == "Hide Replies"){
      replyTextWrapper.text("Show Replies");
    }
});

// Checks url and activate respective tabs
// var url = document.location.toString();
// if (url.match('#updates')) {
//     $('.fb-pd-tab-trigger-list li a[href="#' + url.split('updates')'"]').tab('show');
// } //add a suffix
//
// // Change hash for page-reload
// $('.fb-pd-tab-trigger-list li a').on('shown.bs.tab', function (e) {
//     window.location.hash = e.target.hash;
// });

// Reward Interaction

$(".fb-cp-step-one-content").show();
$(".fb-cp-step-completed-icon").hide();
// Interaction for step one submit button
$(".fb-cp-step-one-content .fb-submit-btn").click(function(){
	$(".fb-cp-step-content").hide();
	$(".fb-cp-step-two-content").fadeIn();
	$(".fb-cp-step-one-trigger").addClass("clickable");
	$(".fb-cp-step-one-trigger").find(".fb-cp-step-count").hide();
	$(".fb-cp-step-one-trigger").find(".fb-cp-step-completed-icon").fadeIn();
	$('.fb-cp-step-two-trigger').prop('disabled', false);
	$('html, body').animate({
        scrollTop: $(".fb-cp-steps-trigger-wrapper").offset().top
    }, 600);
});
// Interaction for step one trigger
$(".fb-cp-step-one-trigger").click(function(){
	$(".fb-cp-step-content").hide();
	$(".fb-cp-step-one-content").fadeIn();
	$(this).find(".fb-cp-step-completed-icon").hide();
	$(this).find(".fb-cp-step-count").fadeIn();
	$('html, body').animate({
        scrollTop: $(".fb-cp-steps-trigger-wrapper").offset().top
    }, 600);
		$(".fb-cp-step-two-trigger").find(".fb-cp-step-completed-icon").hide();
		$(".fb-cp-step-two-trigger").find(".fb-cp-step-count").fadeIn();
		$(".fb-cp-step-two-trigger").prop('disabled', true);
		$(".fb-cp-step-three-trigger").prop('disabled', true);
});
// Interaction for step two submit button
$(".fb-cp-step-two-content .fb-submit-btn").click(function(){
	$(".fb-cp-step-content").hide();
	$(".fb-cp-step-three-content").fadeIn();
	$(".fb-cp-step-two-trigger").addClass("clickable");
	$(".fb-cp-step-two-trigger").find(".fb-cp-step-count").hide();
	$(".fb-cp-step-two-trigger").find(".fb-cp-step-completed-icon").fadeIn();
	$(".fb-cp-step-three-trigger").prop('disabled', false);
	$('html, body').animate({
        scrollTop: $(".fb-cp-steps-trigger-wrapper").offset().top
    }, 600);
});
// Interaction for step two trigger
$(".fb-cp-step-two-trigger").click(function(){
	$(".fb-cp-step-content").hide();
	$(".fb-cp-step-two-content").fadeIn();
	$(this).find(".fb-cp-step-completed-icon").hide();
	$(this).find(".fb-cp-step-count").fadeIn();
	$('html, body').animate({
        scrollTop: $(".fb-cp-steps-trigger-wrapper").offset().top
    }, 600);
		$(".fb-cp-step-three-trigger").prop('disabled', true);
});
// Interaction for step three submit button
$(".fb-cp-step-three-content .fb-submit-btn").click(function(){
	$('#projectSubmittedModal').modal('show');
});
