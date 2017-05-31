$(document).ready(function($) {
	$(".journeys-container").hide();
	$(".score-container").hide();

	$(".journeys-button").click(function(event) {
		if ($(".journeys-container").is(":hidden")){
			$(".journeys-container").slideDown();
			$(".score-container").slideUp();
		}else{
			$(".journeys-container").slideUp();
		}
	});

	$(".score-button").click(function(event) {
		if ($(".score-container").is(":hidden")){
			$(".score-container").slideDown();
			$(".journeys-container").slideUp();
		}else{
			$(".score-container").slideUp();
		}
	});

});