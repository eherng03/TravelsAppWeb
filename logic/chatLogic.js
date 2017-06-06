var userLog = "abanod";
var participantesInfo = [];
var logInfo = [];

/** Document ready **/
$(document).ready( function() {
	$("#sidebar_secondary").hide(); //Ocultamos el chat
	getLogInfo();
	getTrayectos();

});

function getLogInfo(){
	var formData = {
			'userLog'    : userLog,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getLogInfo.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			logInfo.push(data);
		});

}
function getTrayectos(){
	/** Get trayectos del la persona logueada  **/

		//Informacion que se manda
		var formData = {
			'userLog'    : userLog,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getJourneys.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
		var journey = (data.journeyID); //obtenemos los datos 
		getParticipantes(journey);
		});
		
}

/** Funcion que devuelve los participantes **/
function getParticipantes(journey) {
		//console.log(journey);

	/** Get paticipantes de Journey a la que pertenece el usuario 
	logueado  **/
	var arrayPasajeros=[];
	var formData = {
			'journey'    : journey,
			'userLog'    : userLog,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getPassengers.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			var passengers = (data); //obtenemos los datos 
			//console.log(passengers);
			passengers.forEach((passengers) => {
				arrayPasajeros.push(passengers.username);

			});
		


		var formData = {
			'journey'    : journey,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getTrip.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			var tripID = (data.tripID); //obtenemos los datos 
			var formData = {
				'tripID'    : tripID,
			};

			$.ajax({
				type        : 'GET', 
				url         : '../operations/getDriver.php', //archivo que procesa los datos 
				data        : formData, 
				dataType    : 'json', 
				encode          : true
			}).done(function(data) {
				arrayPasajeros.push(data.driverUsername);

				var html1 = '<a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="true"><span class="glyphicon glyphicon-comment"></span> '+arrayPasajeros.length +' Chats<span class="caret"></span></a>';
				$(html1).appendTo("#n_chats");
				getParticipantesInfo(arrayPasajeros);

			});

		});


		});
}



/** Funcion que devuelve la informacion participantes **/
function getParticipantesInfo(arrayPasajeros){
	for (var i=0; i<arrayPasajeros.length; i++) {

		var username = arrayPasajeros[i];

		var formData = {
			'username'    : username,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getPassengersInfo.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			
			participantesInfo.push(data);
	
			

			var username = data[0].username;
			var name = data[0].name;
			var dni = data[0].dni;
			var email = data[0].email;
			var phone = data[0].phone;
			var photo = data[0].photo;

		//Codigo html que se crea de manera dinamica
		var html2 = '<li><span class="item"><span class="item-left"><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/><span class="item-info"><span id="nombreUserChat">'+name+'</span><span>'+phone+'</span></span></span><span class="item-right"><button name="'+username+'" id="abrirChat" class="btn btn-xs btn-danger pull-right"><span class="glyphicon glyphicon-pencil"></span></button></span></span></li>';
		$(html2).appendTo("#chats");

		});


	}
}



/**  **/
//Funcion para abir el chat y cargar la informacion
$(document).on ("click", "#abrirChat", function () {

	$("#Foto").empty();
	$("#mensajes").empty(); //mostramos el chat
	
	var msgs=[];
	var user2;
	
	user2 = $(this).attr("name"); //Cogemos el nombre de la persona que click
	var con = 0;
	for (var j=0; j<participantesInfo.length; j++){
	  	var asas = participantesInfo[j][0].username;
		if(participantesInfo[j][0].username == user2){
			if(con==0){
				con++;
				var username = participantesInfo[j][0].username;
				var name = participantesInfo[j][0].name;
				var photo = participantesInfo[j][0].photo;

				var html1 = '<img class="md-user-image" src="../resources/userImages/'+photo+'">';
				$(html1).appendTo("#Foto");
				var html2 = '<h1 id="idUser2" name="'+username+'">Chat - '+name+'</h1>';
				$(html2).appendTo("#Foto");
				var html3 = '<small><br><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></small>';
				$(html3).appendTo("#Foto");
					
			}
		}
	}

	var formData = {
		'user1'    :userLog,
		'user2'    :user2,
	};

	$.ajax({
	type        : 'GET', 
	url         : '../operations/getMessages.php', //archivo que procesa los datos 
	data        : formData, 
	dataType    : 'json', 
        encode          : true
	}).done(function(data) {
		data.forEach((data) => {
			msgs.push(data); //Para cada objeto recibido lo guardamos en un array

		});


   
  	for (var i=0; i<msgs.length; i++){
  		var user1 = msgs[i].user1;
  		var newuser2 = msgs[i].user2;
  		var hour = msgs[i].hour;
  		var msg = msgs[i].msg;
  		

  		if(user1 == userLog){
  			var photoLog = logInfo[0].photo;
  			var html3 = ' <div class="chat_message_wrapper chat_message_right"><div class="chat_user_avatar"><a href="" target="_blank"><img alt="" title="" src="../resources/userImages/'+photoLog+'" class="md-user-image"/></a></div><ul class="chat_message"><li><p>'+msg+'<span class="chat_message_time">'+hour+'</span></p> </li></ul></div> ';
  			$(html3).appendTo("#mensajes");
  		}else{
  			var html3 = '<div class="chat_message_wrapper"><div class="chat_user_avatar"><a href="" target="_blank"><img alt="" title="" src="../resources/userImages/'+photo+'" class="md-user-image"/></a></div><ul class="chat_message"><li><p>'+msg+'<span class="chat_message_time">'+hour+'</span></p></li></ul></div>';
  			$(html3).appendTo("#mensajes");
  		}

  	}

	});

	$("#sidebar_secondary").show() //mostramos el chat

});

//Funcion para enviar la informacion
$(document).on ("click", "#enviarMensaje", function () {
	//recogemos la informacion
	
	var user1 = userLog;
	var user2 = $("#idUser2").attr("name");
	var msg = $('#submit_message').val();
	var dt = new Date();
	var hour = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

	var formData = {
		'user1'  :user1,
		'user2'  :user2,
		'hour'   :hour,
		'msg'    :msg,

	};

	//Enviamos un post mediantes ajax con los datos formData que contieen todos los datos
        $.ajax({
            type        : 'POST', 
            url         : '../operations/setMessage.php', //archivo que procesa los datos 
            data        : formData, 
            dataType    : 'json', 
                        encode          : true
        }).always(function() {
        	$("#submit_message").val('');
        	var photoLog = logInfo[0].photo;
            var html3 = ' <div class="chat_message_wrapper chat_message_right"><div class="chat_user_avatar"><a href="" target="_blank"><img alt="photo" title="" src="../resources/userImages/'+photoLog+'" class="md-user-image"/></a></div><ul class="chat_message"><li><p>'+msg+'<span class="chat_message_time">'+hour+'</span></p> </li></ul></div> ';
  			$(html3).appendTo("#mensajes");
            });
});
