var userLog;

$(document).ready(function($) {
	userLog = $("#hdnSession").val();		//Username del conductor
	$(".create-container").hide();
	$(".score-container").hide();
	
	window.nDests = 1;
	$("#driver").val(userLog);

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
	    format: "mm/dd/yyyy",
	    todayBtn: "linked",
	    language: "es",
	    daysOfWeekHighlighted: "0,6",
	    autoclose: true,
	    todayHighlight: true
	});


	$("#iconButton").click(function(){
		$(".register-container").slideUp("fast");
		$(".login-container").slideUp("fast");
	});

	//Añadir paradas
	$("#addDest").click(function(event) {
		nDests += 1;
		//TODO cambiar si sobra tiempo
		$("#destinations").append("<label>Destino "+nDests+"</label>"+
			"<input class='form-control' placeholder='Destino' name='dest"+nDests+"' type='text' id='dest"+nDests+"' required/>"+
			"<label>Numero de asientos</label>"+
			"<input class='form-control' placeholder='Numero de asientos' name='nSeats"+nDests+"' type='text' id='nSeats"+nDests+"' required/>"+
			"<label>Precio</label>"+
			"<input class='form-control' placeholder='Precio' name='price"+nDests+"' type='text' id='price"+nDests+"' required/>"+

			"<div class='input-group date'  data-provide = 'datepicker' id = 'datepicker'>"+
				"<input type='text' class='form-control' placeholder='Fecha' name='date"+nDests+"' id='date"+nDests+"' required>"+
				"<span class='input-group-addon'><i class='glyphicon glyphicon-th'></i></span>"+
			"</div> <hr>");
		
		$("#nDests").val(nDests);
	});
	
	//Cargar trayectos pasajero
	$.ajax({
		url: "../operations/getJourneysDriverShow.php",
		type: 'POST',
		data: {"username": $('#hdnSession').val()},
		success: function(data){
			var containerJourneys = document.getElementById("journeys");

			$(containerJourneys).append(data);
		}
	});
	
	
	//Viajes que se pueden cancelar
	$.get("../operations/selectTripsCancel.php", {"username": $('#hdnSession').val()}).done(function(data) {
        var comboBox = document.getElementById("cancel");
        var trips = JSON.parse(data);

        trips.forEach((trip) =>{
			$('#cancel').append("<option value="+trip.tripID+">"+trip.origin +"-"+ trip.destination+"</option>");
        });
    });
	
	//Cancelar viaje seleccionado	
	$("#cancelButton").click(function(event) {
		if($("#cancel option:selected").text() == "---"){
			return;
		}
		
		var tripID = $('#cancel option:selected').val();
		$.get("../operations/cancelTrip.php", {"tripID": tripID}).done(function(data) {
			alert(data);
			window.location.replace("../graphic/driverMainWindow.php");
		});
	});
	
	
	//Viajes que se pueden borrar o modificar
	$.get("../operations/selectTripsDelete.php", {"username": $('#hdnSession').val()}).done(function(data) {
        var comboBox = document.getElementById("delete");
		var trips = JSON.parse(data);

        trips.forEach((trip) =>{
			$('#delete').append("<option value="+trip.tripID+">"+trip.origin +"-"+ trip.destination+"</option>");
        });
    });
	
	//Borrar viaje seleccionado
	$("#deleteButton").click(function(event) {
		if($("#delete option:selected").text() == "---"){
			return;
		}
		
		var tripID = $('#delete option:selected').val();
		$.get("../operations/deleteTrip.php", {"tripID": tripID}).done(function(data) {
			alert(data);
			window.location.replace("../graphic/driverMainWindow.php");
		});
	});
	
	//Mostrar opciones modificar viaje seleccionado
	$("#modifyButton").click(function(event) {
		if($("#delete option:selected").text() == "---"){
			return;
		}		
		
		var tripID = $('#delete option:selected').val();

		$('#hdnTrip').val(tripID);

		$.get("../operations/getJourneysTrip.php", {"tripID": tripID}).done(function(data) {
			var journeys = JSON.parse(data);
			
			var i = 1;
			journeys.forEach((journey) =>{
				$("#modifySection").append("<br><label>Trayecto "+journey.origin+"-"+journey.destination+"</label>"+
											"<br><label'>Precio</label><input class='form-control' value='"+journey.price+"' name='price"+i+"' type='text' id='price"+i+"' required/>"+
											"<br><label'>Numero de asientos</label><input class='form-control' value='"+journey.nSeats+"' name='seats"+i+"' type='text' id='seats"+i+"' required/></div>");
				i++;
			});
			$('#hdnNJourneys').val(i-1);
			$("#modifySection").append("<br><input type='submit' id = 'makeChangesBtn' value='Realizar Cambios'/>");
		});
	});

});

