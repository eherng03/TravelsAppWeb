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

    var formData = {

			'userLog'    : driverUsername,
		};



		$.ajax({
			type        : 'GET', 
			url         : '../operations/getScoreAverage.php', //archivo que procesa los datos del user
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			var ScoreAverage = data.score;

			getDriverInfo(driverUsername,ScoreAverage);
			getComments(driverUsername);
		});
});

function getDriverInfo(driverUsername,ScoreAverage){

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
				row = $('<tr id="fila"><th><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/></th><th>'+name+'</th><th>'+email+'</th><th>'+phone+'</th><th>'+ScoreAverage+'</th></tr>'); //create row
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


				for (var i=comments.length-1; i>(comments.length-1)-5; i--){
					//console.log(comments[i].comment);
					var comment = comments[i].comment;
					var score = comments[i].score;

					row = $('<tr id="fila"><th>'+comment+'</th><th>'+score+'</th></tr>'); //create row
					$('#tab_comentarios').append(row);
				}
				
			});

}