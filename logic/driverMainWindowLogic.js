$(document).ready(function($) {
	$(".create-container").hide();
	$(".score-container").hide();

	$(".journeys-button").click(function(event) {
		//Si pulso en ver trayectos se esconden las demás opciones
		if ($(".journeys-container").is(":hidden")){
			$(".journeys-container").slideDown();
			$(".score-container").slideUp();
			$(".create-container").slideUp();
		}
	});

	$(".score-button").click(function(event) {
		if ($(".score-container").is(":hidden")){
			$(".score-container").slideDown();
			$(".journeys-container").slideUp();
			$(".create-container").slideUp();
		}
	});

	$(".create-button").click(function(event) {
		if ($(".create-container").is(":hidden")){
			$(".create-container").slideDown();
			$(".journeys-container").slideUp();
			$(".score-container").slideUp();
		}
	});

	$('.input-group').datepicker({
	    format: "dd/mm/yyyy",
	    todayBtn: "linked",
	    language: "es",
	    daysOfWeekHighlighted: "0,6",
	    autoclose: true,
	    todayHighlight: true
	});

});