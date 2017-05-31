$(document).ready(function($) {
	$(".journeys-container").hide();

	$(".journeys-button").click(function(event) {
		if ($(".journeys-container").is(":hidden")){
			$(".journeys-container").slideDown();
		}else{
			$(".journeys-container").slideUp();
		}
	});
});