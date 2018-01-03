(function($){
	"use strict";
	
	if( !$.dxc ){
		$.dxc = new Object();
	};

	// Images set
	var x2 = window.devicePixelRatio > 1 ? '2x':'';
	var glassTopImg = DXC.url + "images/glassTop"+x2+".png";
	var glassBodyImg = DXC.url + "images/glassBody"+x2+".png";
	var redVerticalImg = DXC.url + "images/redVertical"+x2+".png";
	var tooltipFGImg = DXC.url + "images/tickShine.png";
	var glassBottomImg = DXC.url + "images/glassBottom"+x2+".png";
	var tootipPointImg = DXC.url + "images/tooltipPoint"+x2+".png";
	var tooltipMiddleImg = DXC.url + "images/tooltipMiddle.png";
	var tooltipButtImg = DXC.url + "images/tooltipButt"+x2+".png";
	
	$.dxc.GoalThermometer = function(target, opts){
		
		
		// To avoid scope issues, use 'instance' instead of 'this'
		// to reference this class from internal events and functions.
		
		var instance = this;
		var options = $.extend( {}, $.dxc.GoalThermometer.defaultOptions, opts );
		
		var arrayOfImages,
			imgsLoaded = 0,
			tickHeight = 40,
			mercuryHeightEmpty = 0,
			numberStartY = 6,
			thermTopHeight = 13,
			thermBottomHeight = 51,
			tooltipOffset = 15,
			heightOfBody = null,
			mercuryId = null,
			tooltipId = null,
			resolution2x = false;
		
		var $target = $(target);
		
		// Add a reverse reference to the DOM object
		$target.data("dxc.GoalThermometer", instance);
		
		// Visually create the thermometer
		instance.init = function(){
			
			// add the html
			$target.prepend(
				"<div class='therm-wrapper'>" + 
					"<div class='therm-numbers'></div>" + 
					"<div class='therm-graphics'>" + 
						"<img class='therm-top' src='" + glassTopImg + "'></img>" + 
						"<img class='therm-body-bg' src='" + glassBodyImg + "' ></img>" + 
						"<img class='therm-body-mercury' src='" + redVerticalImg + "'></img>" + 
						"<div class='therm-body-fore'></div>" + 
						"<img class='therm-bottom' src='" + glassBottomImg + "'></img>" + 
						"<div class='therm-tooltip'>" + 
							"<img class='tip-left' src='" + tootipPointImg + "'></img>" + 
							"<div class='tip-middle'><p>" + options.numberPrefix + "0</p></div>" + 
							"<img class='tip-right' src='" + tooltipButtImg + "'></img>" + 
						"</div>" +
					"</div>" + 
				"</div>"
			);
			
			// Add infos
			$target.append(function(){
				var html = '';

				// Dontane button moved to widget.php

				// Time & funded
				var minutesLeft = options.timeLeft/60;
				
				html += "<div class='time-remaining'>";
				
				// determine time left //from minutes left
				if ( minutesLeft < 0 ){ // time is up
					html += options.timesUptext;
				} else

				if ( minutesLeft < 120 ){ // less than an hour
					html += Math.floor(minutesLeft) + "" + options.minutesLeftText;
				} else
				
				if ( minutesLeft < 2880 ){ // less than a day
					html += Math.floor(minutesLeft/60) + "" +  options.hoursLeftText;
				} else { // more than a day
					html += Math.floor(minutesLeft/1440) + "" +  options.daysLeftText;
				}


				if( options.fundedText ){
					// determine % complete
					var percComplete = Math.floor(options.currentAmount/options.goalAmount * 100);
					html += ' '+ percComplete +'% '+ options.fundedText
				}

				return html;
			});
			
			// preload and add the background images
			$('<img/>').attr('src', tooltipFGImg).load(function(){
				$(this).remove();
				$(".therm-body-fore",target).css("background-image", "url('"+tooltipFGImg+"')");
				instance.checkIfAllImagesLoaded();
			});
			
			$('<img/>').attr('src', tooltipMiddleImg).load(function(){
				$(this).remove();
				$(".tip-middle",target).css("background-image", "url('" + tooltipMiddleImg + "')");
				instance.checkIfAllImagesLoaded();
			});
			
			// adjust the css
			heightOfBody = options.tickMarkSegements * tickHeight;
			$(".therm-wrapper, .therm-graphics",target).css("height",  heightOfBody + thermTopHeight + thermBottomHeight);
			$(".therm-graphics",target).css("left", options.tickmarkWidth );
			$(".therm-body-bg",target).css("height", heightOfBody);
			$(".therm-body-fore",target).css("height", heightOfBody);
			$(".therm-bottom",target).css("top", heightOfBody + thermTopHeight);

			mercuryId = $(".therm-body-mercury",target);
			mercuryId.css("top", heightOfBody + thermTopHeight);
			tooltipId = $(".therm-tooltip",target);
			tooltipId.css("top", heightOfBody + thermTopHeight - tooltipOffset);
			
			// add the numbers to the left
			var numbersDiv = $(".therm-numbers",target);
			var countPerTick = options.goalAmount/options.tickMarkSegements;
			var commaSepCountPerTick = instance.commaSeparateNumber(countPerTick);
			
			// add the number
			for ( var i = 0; i < options.tickMarkSegements; i++ ) {
				
				var yPos = tickHeight * i + numberStartY;
				var style = $("<style>.pos" + i + " { top: " + yPos + "px; width:"+options.tickmarkWidth+"px }</style>");
				$("html > head").append(style);
				var dollarText = instance.commaSeparateNumber(options.goalAmount - countPerTick * i);
				$( numbersDiv ).append( "<div class='therm-number pos" + i + "'>" +dollarText+ "</div>" );

			}
			
			// check that the images are loaded before anything
			instance.arrayOfImages = [
				".therm-top",
				".therm-body-bg",
				".therm-body-mercury",
				".therm-bottom",
				".tip-left",
				".tip-right"
			];
			instance.preloadImages();
		};

		// Check if each image is preloaded
		instance.preloadImages = function() {
			for( var i in instance.arrayOfImages ){
				$( instance.arrayOfImages[i], target ).load(function() {
					instance.checkIfAllImagesLoaded();
				});
			}
		};

		// Check that all the images are preloaded
		instance.checkIfAllImagesLoaded = function(){
			imgsLoaded++;
			if( imgsLoaded == instance.arrayOfImages.length+2 ){
				$target.fadeTo(1000, 1, function(){
					instance.animateThermometer();
				});
			}
		};

		// Animate the thermometer
		instance.animateThermometer = function(){

			var percentageComplete = options.currentAmount/options.goalAmount;
			
			if(options.currentAmount > options.goalAmount)
			{
				var mercuryHeight = 121; 
			var newMercuryTop = 13;
			}
			else
			{
			var mercuryHeight = Math.round(heightOfBody * percentageComplete); 
			var newMercuryTop = heightOfBody + thermTopHeight - mercuryHeight;
			}
			
			mercuryId.animate({height:mercuryHeight +1, top:newMercuryTop }, options.animationTime);
			tooltipId.animate({top:newMercuryTop - tooltipOffset}, {duration:options.animationTime});
			
			var tooltipTxt = $(".therm-tooltip .tip-middle p", target);
			
			//change the tooltip number as it moves
			$({tipAmount: 0}).animate({
				tipAmount: options.currentAmount
			}, {
				duration:options.animationTime,
				step:function(){
					tooltipTxt.html( instance.commaSeparateNumber(this.tipAmount) );
				}, 
				complete:function(){
					tooltipTxt.html( instance.commaSeparateNumber(options.currentAmount) );
				}
			});
		};

		// Format the numbers with $ and commas
		instance.commaSeparateNumber = function(val){
			val = Math.round(val);
		    while ( /(\d+)(\d{3})/.test(val.toString()) ){
		    	val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
		    }
		    return options.numberPrefix + val + options.numberSuffix;
		};
		
		// Run initializer
		instance.init();
	};
	
	$.dxc.GoalThermometer.defaultOptions = {	
		goalAmount: 0,
		currentAmount: 0,
		animationTime: 0,
		numberPrefix: "$",
		numberSuffix: "",
		tickMarkSegements: 3,
		tickmarkWidth: 50,

		timeLeft: 0,
		daysLeftText: "",
		hoursLeftText: "",
		minutesLeftText: "",
		timesUptext: "",
		fundedText: "",
	};
	
	$.fn.dxcGoalThermometer = function(options){
		var options = options || {};
		
		var dataMap = {
			'goal-amount': 'goalAmount',
			'current-amount': 'currentAmount',
			'animation-time': 'animationTime',
			'tickmark-segments': 'tickMarkSegements',
			'tickmark-width': 'tickmarkWidth',
			'number-prefix': 'numberPrefix',
			'number-suffix': 'numberSuffix',
			'time-left': 'timeLeft',
			'days-left-text': 'daysLeftText',
			'hours-left-text': 'hoursLeftText',
			'minutes-left-text': 'minutesLeftText',
			'timesup-text': 'timesUptext',
			'funded-text': 'fundedText',
		};
		
		return this.each(function(){
			var key, option;
			for( var key in dataMap ) {
				option = $(this).data( key );
				if( option!==false ) {
					options[ dataMap[key] ] = option;
				}
			}

			(new $.dxc.GoalThermometer(this, options));
		});
	};

	$(document).ready(function(){
		
		$('.dxc-goal-thermometer.autosetup').dxcGoalThermometer();
	});
	
})(jQuery);