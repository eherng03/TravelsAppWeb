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

$(document).on('click', '#verComentarios', function(){ 

	$("#modalHeader").empty();
	$("tr[id=fila]").remove();
	
    var driverUsername = $(this).attr('driver');
    var driverName = $(this).attr('driverName');


    var html2 = '<h4 class="modal-title">Comentarios de '+driverName+'</h4>';
    $(html2).appendTo("#modalHeader");

	
	getComments(driverUsername);

});

function getDriverInfo(driverUsername,scoreAverage){

	var formData = {
			'username'    : driverUsername,
	};
	$.ajax({
				type        : 'GET', 
				url         : '../operations/getPassengersInfo.php', //archivo que procesa los datos del user
				data        : formData, 
				dataType    : 'json', 
				encode          : true
			}).done(function(data) {
				var name = data[0].name;
				var phone = data[0].phone;
				var email = data[0].email;
				var photo = data[0].photo;
				row = $('<tr id="fila"><th><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/></th><th>'+name+'</th><th>'+email+'</th><th>'+phone+'</th><th>'+scoreAverage+'</th></tr>'); //create row
				$('#tab_infoDriver').append(row);
			});

}

function getComments(driverUsername){
	var comments = [];
	var formData = {
			'driverUsername'    : driverUsername,
	};
		$.ajax({
				type        : 'GET', 
				url         : '../operations/getCommentsAndScore.php', //archivo que procesa los datos del user
				data        : formData, 
				dataType    : 'json', 
				encode          : true
			}).done(function(data) {
				data.forEach((data) => {
					comments.push(data);
				});

				var total = 0;
				for (var i=0; i<comments.length; i++){
					var score = comments[i].score;
					total = parseInt(total)+parseInt(score);
				}
				var scoreAverage = parseInt(total)/parseInt(comments.length);

				var desde = comments.length-5;
				var hasta = length;

				if(desde < 0){
					desde = 0;
				}

				for (var i=desde; i<desde+5; i++){
					if(i < comments.length){
						var score = comments[i].score;
						var comment = comments[i].comment;

						row = $('<tr id="fila"><th>'+comment+'</th><th>'+score+'</th></tr>'); //create row
						$('#tab_comentarios').append(row);
					}
						

					
				}

				
				
				getDriverInfo(driverUsername,scoreAverage);
			});

}

$(document).on('click', '#verPasajeros', function(){ 

	$("#modalHeader2").empty();
	$("tr[id=fila]").remove();
	
    var tripID = $(this).attr('tripID');
	var passengers = [];
	
    var html2 = '<h4 class="modal-title">Pasajeros del viaje</h4>';
    $(html2).appendTo("#modalHeader2");
	
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getPassengersTrip.php', //archivo que procesa los datos del user
	data        : {'tripID':tripID}, 
		dataType    : 'json', 
		encode          : true
	}).done(function(data) {
		data.forEach((data) => {
			passengers.push(data);
		});


		for (var i=0; i < passengers.length; i++){

			var photo = passengers[i].photo;
			var name = passengers[i].name;

			row = $('<tr id="fila"><th><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/></th><th>'+name+'</th></tr>'); //create row
			$('#tab_infoPassenger').append(row);
		}
		
	});

});


$(document).on('click', '#scoreBtn', function(){
	$("#modalHeader3").empty();

	var driver = $(this).attr('driver');
	var driverName = $(this).attr('driverName');
	var html2 = '<h4 class="modal-title" driver="'+driverName+'">Puntuar a '+driver+'</h4>';
    $(html2).appendTo("#modalHeader3");
});


$(document).on('click', '#enviarComentario', function(){
	var driverUsername = $("h4").attr('driver');
	var userLog = $("#hdnSession").val();
	var score = $('select[name=selector]').val();
	var comment = $('textarea').val();

	var formData = {
		'driverUsername'    : driverUsername,
		'passUsername'      : userLog,
		'comment'      : comment,
		'score'      : score,
	};

	$.ajax({
		type        : 'POST', 
		url         : '../operations/setScore.php', //archivo que procesa los datos del user
		data        : formData, 
		dataType    : 'json', 
		encode          : true
	})
	
	$('select[name=selector]').val("1");
	$('textarea').val('');
	 
});