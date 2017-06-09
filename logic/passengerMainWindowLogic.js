$(document).ready(function() {
	$(".search-container").hide();

	$(".journeys-button").click(function(event) {
		//Si pulso en ver trayectos se esconden las demás opciones
		if ($(".journeys-container").is(":hidden")){
			$(".journeys-container").slideDown();
			$(".search-container").slideUp();
		}
	});

	$(".search-button").click(function(event) {
		if ($(".search-container").is(":hidden")){
			$(".search-container").slideDown();
			$(".journeys-container").slideUp();
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
	
	//Cargar trayectos pasajero
	$.ajax({
		url: "../operations/getJourneysPassenger.php",
		type: 'POST',
		data: {"username": $('#hdnSession').val()},
		success: function(data){
			var containerJourneys = document.getElementById("journeys");

			$(containerJourneys).append(data);
		}
	});
});