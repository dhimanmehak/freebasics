
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

$( function() {
    $( "select" ).selectmenu();
});


// Filter Interaction
$("#filterSelectBox").selectmenu({
  change: function(event, ui) {
    var SelectedFilter = ui.item.value;

    if(SelectedFilter == "age"){
        $(".fb-sap-map-crl-filter-wrap").hide();
        $(".fb-sap-filter-age-wrap").fadeIn();
    }
    else if(SelectedFilter == "gender"){
        $(".fb-sap-map-crl-filter-wrap").hide();
        $(".fb-sap-filter-gender-wrap").fadeIn();
    }
    else if(SelectedFilter == "religion"){
        $(".fb-sap-map-crl-filter-wrap").hide();
        $(".fb-sap-filter-religion-wrap").fadeIn();
    }
    else if(SelectedFilter == "country"){
        $(".fb-sap-map-crl-filter-wrap").hide();
        $(".fb-sap-filter-country-wrap").fadeIn();
    }
    else if(SelectedFilter === ""){
        $(".fb-sap-map-crl-filter-wrap").hide();
    }

}
});
