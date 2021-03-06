
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
if(vW < 1400){
  computedHeight = (vph - 121);
}
else if(vW > 1500){
  computedHeight = (vph - 125);
}
$(".fb-home-first-fold").css({"height": computedHeight + "px"});
$(".fb-awg-ff-table").css({"height": computedHeight + "px"});
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


// Dynamically Adding Twitter styles based on device width

// For Mobile - Portrait
viewportWidth = $(window).width();
if (viewportWidth > 0 && viewportWidth <479){
  var options = {
      "url": "main/css/twitter-widget-custom-styles.css"
  };
  CustomizeTwitterWidget(options);
}
// For Mobile - Landscape
else if (viewportWidth > 479 && viewportWidth < 767){
  var options = {
      "url": "main/css/twitter-widget-custom-styles-mobile-landscape.css"
  };
  CustomizeTwitterWidget(options);
}
// For Tablet
else if (viewportWidth > 767 && viewportWidth < 991){
  var options = {
      "url": "main/css/twitter-widget-custom-styles-tablet.css"
  };
  CustomizeTwitterWidget(options);
}
// For Desktop
else if(viewportWidth > 991){
  var options = {
      "url": "main/css/twitter-widget-custom-styles-desktop.css"
  };
  CustomizeTwitterWidget(options);
}


// Adds Relevant classes to Goal steps when clicking next button
// $('.fb-take-action-btn').click(function() {
//     $('.fb-header-tab-trigger > li').removeClass("active");
//     $('.fb-goal-tab-content .tab-pane').removeClass("active in");
//     $('.fb-align-with-goal-tab-trigger').addClass("active");
//     $('.fb-align-with-goal-tabpane').addClass("active in");
//     $("html, body").animate({ scrollTop: 0 }, "slow");
// });
// $('.fb-awg-view-project-btn').click(function() {
//     $('.fb-header-tab-trigger > li').removeClass("active");
//     $('.fb-goal-tab-content .tab-pane').removeClass("active in");
//     $('.fb-start-project-tab-trigger').addClass("active");
//     $('.fb-support-project-tabpane').addClass("active in");
//     $("html, body").animate({ scrollTop: 0 }, "slow");
// });

  // $(document).ready(function() {
  //   $('#nav-one').onePageNav({
  //     easing: 'easeInOutExpo',
  //     scrollSpeed: 1500,
  //   });
  //   $('#nav-two').onePageNav({
  //     easing: 'easeInOutExpo',
  //     scrollSpeed: 1500,
  //   });
  // });
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
// $(".fb-twitter-fb-pledge-btns-wrapper").hide();
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

// Initializing charts
var chart;

var chartData = [
    {
        "country": "Czech Republic",
        "people": 2000,
        "short": "CZ"
    },
    {
        "country": "Ireland",
        "people": 1555,
        "short": "IR"
    },
    {
        "country": "Germany",
        "people": 986,
        "short": "DE"
    },
    {
        "country": "Australia",
        "people": 436,
        "short": "AU"
    }
];

AmCharts.ready(function () {
    // SERIAL CHART
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    chart.startDuration = 2;
    // change balloon text color
    chart.balloon.color = "#000000";

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0;
    categoryAxis.axisAlpha = 0;
    categoryAxis.labelsEnabled = false;

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.gridAlpha = 0;
    valueAxis.axisAlpha = 0;
    valueAxis.labelsEnabled = false;
    valueAxis.minimum = 0;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.balloonText = "[[category]]: [[value]]";
    graph.valueField = "people";
    graph.descriptionField = "short";
    graph.type = "column";
    graph.lineAlpha = 0;
    graph.fillAlphas = 1;
    graph.fillColors = ["#DC3D52", "#e9001e"];
    graph.labelText = "[[description]]";
    graph.balloonText = "[[category]]: [[value]] People";
    chart.addGraph(graph);

    chart.creditsPosition = "top-right";

    // WRITE
    chart.write("chartdiv");
});

var chart;

var chartData = [
    {
        "country": "Czech Republic",
        "people": 2000,
        "short": "CZ"
    },
    {
        "country": "Ireland",
        "people": 1555,
        "short": "IR"
    },
    {
        "country": "Germany",
        "people": 986,
        "short": "DE"
    },
    {
        "country": "Australia",
        "people": 436,
        "short": "AU"
    }
];

AmCharts.ready(function () {
    // SERIAL CHART
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    chart.startDuration = 2;
    // change balloon text color
    chart.balloon.color = "#000000";

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0;
    categoryAxis.axisAlpha = 0;
    categoryAxis.labelsEnabled = false;

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.gridAlpha = 0;
    valueAxis.axisAlpha = 0;
    valueAxis.labelsEnabled = false;
    valueAxis.minimum = 0;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.balloonText = "[[category]]: [[value]]";
    graph.valueField = "people";
    graph.descriptionField = "short";
    graph.type = "column";
    graph.lineAlpha = 0;
    graph.fillAlphas = 1;
    graph.fillColors = ["#DC3D52", "#e9001e"];
    graph.labelText = "[[description]]";
    graph.balloonText = "[[category]]: [[value]] People";
    chart.addGraph(graph);

    chart.creditsPosition = "top-right";

    // WRITE
    chart.write("chart-two");
});

var chart;

var chartData = [
    {
        "country": "Czech Republic",
        "people": 2000,
        "short": "CZ"
    },
    {
        "country": "Ireland",
        "people": 1555,
        "short": "IR"
    },
    {
        "country": "Germany",
        "people": 986,
        "short": "DE"
    },
    {
        "country": "Australia",
        "people": 436,
        "short": "AU"
    }
];

AmCharts.ready(function () {
    // SERIAL CHART
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    chart.startDuration = 2;
    // change balloon text color
    chart.balloon.color = "#000000";

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0;
    categoryAxis.axisAlpha = 0;
    categoryAxis.labelsEnabled = false;

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.gridAlpha = 0;
    valueAxis.axisAlpha = 0;
    valueAxis.labelsEnabled = false;
    valueAxis.minimum = 0;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.balloonText = "[[category]]: [[value]]";
    graph.valueField = "people";
    graph.descriptionField = "short";
    graph.type = "column";
    graph.lineAlpha = 0;
    graph.fillAlphas = 1;
    graph.fillColors = ["#DC3D52", "#e9001e"];
    graph.labelText = "[[description]]";
    graph.balloonText = "[[category]]: [[value]] People";
    chart.addGraph(graph);

    chart.creditsPosition = "top-right";

    // WRITE
    chart.write("chart-three");
});

var chart;

var chartData = [
    {
        "country": "Czech Republic",
        "people": 2000,
        "short": "CZ"
    },
    {
        "country": "Ireland",
        "people": 1555,
        "short": "IR"
    },
    {
        "country": "Germany",
        "people": 986,
        "short": "DE"
    },
    {
        "country": "Australia",
        "people": 436,
        "short": "AU"
    }
];

AmCharts.ready(function () {
    // SERIAL CHART
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    chart.startDuration = 2;
    // change balloon text color
    chart.balloon.color = "#000000";

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.gridAlpha = 0;
    categoryAxis.axisAlpha = 0;
    categoryAxis.labelsEnabled = false;

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.gridAlpha = 0;
    valueAxis.axisAlpha = 0;
    valueAxis.labelsEnabled = false;
    valueAxis.minimum = 0;
    chart.addValueAxis(valueAxis);

    // GRAPH
    var graph = new AmCharts.AmGraph();
    graph.balloonText = "[[category]]: [[value]]";
    graph.valueField = "people";
    graph.descriptionField = "short";
    graph.type = "column";
    graph.lineAlpha = 0;
    graph.fillAlphas = 1;
    graph.fillColors = ["#DC3D52", "#e9001e"];
    graph.labelText = "[[description]]";
    graph.balloonText = "[[category]]: [[value]] People";
    chart.addGraph(graph);

    chart.creditsPosition = "top-right";

    // WRITE
    chart.write("chart-four");
});

// setTimeout(function() {
//     var $head = $(".fb-sap-map-iframe").contents().find("head");
//     $head.append($("<link/>",
//         { rel: "stylesheet", href: "css/fb-styles.css", type: "text/css" }
//     ));
// }, 1);
// $(document).ready(function() {
// setTimeout(function() {
//     $(".fb-sap-map-iframe").load(function() {
//       // alert("hai");
//       var $iframeHead = $(".fb-sap-map-iframe").contents().find("head");
//       // var $iframeHead = $iframeContents.find("head");
//       alert($iframeContents);
//       $iframeHead.append($("<link/>",
//             { rel: "stylesheet", href: "css/fb-styles.css", type: "text/css" }
//         ));
//     });
//   }, 2000);
// });
// $('.fb-sap-map-iframe').load( function() {
//     $('.fb-sap-map-iframe').contents().find("head")
//       .append($("<style type='text/css'>  .my-class{display:none;}  </style>"));
// });
(function() {
	// $('.grid').height( $(window).height() );
	var	contents = $('.fb-sap-map-iframe').contents(),
		body = contents.find('body'),
		styleTag = $('<style></style>').appendTo(contents.find('head'));
	// $('textarea').keyup(function() {
	// 	var $this = $(this);
	// 	if ( $this.attr('id') === 'html') {
	// 		body.html( $this.val() );
	// 	} else {
	// 		// it had to be css
	// 		styleTag.text( $this.val() );
	// 	}
	// });
})();

// Closes Buzzfeed panel on scroll
$(window).scroll(function(){
   if ($(this).scrollTop() > 5) {
       $('.user-input').removeClass('show-input');
       $(".icon-add").removeClass("rotate");
   } else {}
});

// Initializing select boxes
$( function() {
    $( "select" ).selectmenu();
});

// News category Interaction
// $('.fb-news-category-selector').on('change', function (e) {
//     // With $(this).val(), you can **(and have to!)** specify the target in your <option> values.
//     $('.fb-news-tab-trigger li a').eq($(this).val()).tab('show');
//     // If you do not care about the sorting, you can work with $(this).index().
//     // $('#the-tab li a').eq($(this).index()).tab('show');
// });
// $("#dropDown").change(function() {
//         var value = $("#dropDown option:selected").val();
//         $('#tabbable li').find("a[href=#'+value+']").click();
// });​
$( ".fb-news-category-selector" ).selectmenu({
  change: function( event, ui ) {
    var selectedValue = ui.item.value;
    // var selectedValue = this.options[this.selectedIndex].value;
    // var selectedIndex = selectedValue; // added this variable for clarity
    // alert(selectedIndex);
    // $('.fb-news-tab-trigger li a:eq(' + selectedIndex + ')').tab('show');
    $('a[href="#' + selectedValue + '"]').tab('show');
  }
});
// $(".gc-publish-select-box").selectmenu({
//   change: function(event, ui) {
//     var value = ui.item.value;
//     if(value == 'publish'){
//       $(this).closest(".gc-publish-select-box-wrap").removeClass().addClass("gc-publish-select-box-wrap gc-publish-status-publish");
//     }
//     else if(value == 'republish'){
//       $(this).closest(".gc-publish-select-box-wrap").removeClass().addClass("gc-publish-select-box-wrap gc-publish-status-republish");
//     }
//     else if(value == 'unpublish'){
//       $(this).closest(".gc-publish-select-box-wrap").removeClass().addClass("gc-publish-select-box-wrap gc-publish-status-unpublish");
//     }
//   }
// });
// document.getElementById('someSelect').onchange = function () {
//     var selectedValue = this.options[this.selectedIndex].value;
//     var selectedIndex = selectedValue; // added this variable for clarity
//     $('#someNavTabs a:eq(' + selectedIndex + ')').tab('show');
// };
