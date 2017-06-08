var userLog = "EvaHergar";
var logInfo = [];
var usersInfo = [];

/** Document ready **/
$(document).ready( function() {
	$("#sidebar_secondary").hide(); //Ocultamos el chat
	getLogInfo();
	getJourneys();
	//getTrayectos();


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

function getJourneys(){
	
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
			var journeys = (data); //obtenemos los datos 
			journeys.forEach((journeys) => {
				getTripId(journeys.journeyID,usersInfo);
			});
		});
}

function getTripId(journeyID,usersInfo){
	var formData = {
			'journeyID'    : journeyID,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getTrip.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			var tripInfo = (data); //obtenemos los datos 
			tripInfo.forEach((tripInfo) => {
				var destination = tripInfo.destination;
				var tripID = tripInfo.tripID;
				var html = '<ul class="nav navbar-nav navbar-right"><li class="dropdown" id="n_chats'+destination+'"><ul class="dropdown-menu dropdown-cart" role="menu" id="chats'+destination+'"></ul></li></ul>';
				$(html).appendTo("#navBar");

				getPassengers(journeyID, usersInfo, destination);
				getDriverUsername(tripID, usersInfo, destination);
			});
		});
}


function getPassengers(journey,usersInfo,destination) {
var html1 = '<a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="true"><span class="glyphicon glyphicon-comment"></span>Chats - '+destination+'<span class="caret"></span></a>';
$(html1).appendTo('#n_chats'+destination+'');
 var arrayPasajeros = [];
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
				getUsersInfo(passengers.username,usersInfo,destination);
			});
	});
}

function getDriverUsername(tripID,usersInfo,destination){
	var formData = {
			'tripID'    : tripID,
		};

		$.ajax({
			type        : 'GET', 
			url         : '../operations/getDriverUsername.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
			encode          : true
		}).done(function(data) {
			var driverUsername = data.driverUsername;
			if(driverUsername != userLog){
				getDriverInfo(driverUsername,usersInfo,destination);
			}
	
		});
}


/** Funcion que devuelve la informacion participantes **/
function getUsersInfo(username,usersInfo,destination){
var a = destination;
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
		
		usersInfo.push(data);

		var username = data[0].username;
		var name = data[0].name;
		var dni = data[0].dni;
		var email = data[0].email;
		var phone = data[0].phone;
		var photo = data[0].photo;

	//Codigo html que se crea de manera dinamica
	var html2 = '<li><span class="item"><span class="item-left"><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/><span class="item-info"><span id="nombreUserChat">'+name+'</span><span>'+phone+'</span></span></span><span class="item-right"><button name="'+username+'" id="abrirChat" class="btn btn-xs btn-danger pull-right"><span class="glyphicon glyphicon-pencil"></span></button></span></span></li>';
	$(html2).appendTo('#chats'+destination+'');

	});
	
}

/** Funcion que devuelve la informacion participantes **/
function getDriverInfo(username,usersInfo,destination){
var a = destination;
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
		
		usersInfo.push(data);

		var username = data[0].username;
		var name = data[0].name;
		var dni = data[0].dni;
		var email = data[0].email;
		var phone = data[0].phone;
		var photo = data[0].photo;

	//Codigo html que se crea de manera dinamica
	var html2 = '<li><span class="item"><span class="item-left"><img id="userPhoto" src="../resources/userImages/'+photo+'" alt=""/><span class="item-info"><span id="nombreUserChat">'+name+'</span><span>'+phone+'</span><span>Conductor</span></span></span><span class="item-right"><button name="'+username+'" id="abrirChat" class="btn btn-xs btn-danger pull-right"><span class="glyphicon glyphicon-pencil"></span></button></span></span></li>';
	$(html2).appendTo('#chats'+destination+'');

	});


	
}

function openChat(user2){
$("#sidebar_secondary").hide(); //mostramos el chat
$("#Foto").empty();
$("#mensajes").empty(); //mostramos el chat
	
	var msgs=[];
	var user2 = user2;
	
	
	var con = 0;
	for (var j=0; j<usersInfo.length; j++){
	  	var asas = usersInfo[j][0].username;
		if(usersInfo[j][0].username == user2){
			if(con==0){
				con++;
				var username = usersInfo[j][0].username;
				var name = usersInfo[j][0].name;
				var photo = usersInfo[j][0].photo;

				var html1 = '<img class="md-user-image" name="'+username+'" src="../resources/userImages/'+photo+'">';
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


	//Metodo burbuja para ordenar los mensajes recibidos HH:MM:SS
	for (var i=2; i<msgs.length; i++){
		for (var j=0; j<=msgs.length-i; j++){

			var hora1 = msgs[j].hour;
		

			var hora2 = msgs[j+1].hour;

			if(hora1 > hora2 ){
				var aux  = msgs[j];
				msgs[j] = msgs[j+1];
				msgs[j+1] = aux;
			}
		}
	}

   
  	for (var i=0; i<msgs.length; i++){

  		var user1 = msgs[i].user1;
  		var newuser2 = msgs[i].user2;
  		var date = new Date(parseInt(msgs[i].hour));

  		var hour = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

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
	$("#chat").animate({ scrollTop: $(document).height()*1000 }, "slow");
	$("#sidebar_secondary").show() //mostramos el chat

}



//Funcion para enviar la informacion
$(document).on ("click", "#enviarMensaje", function () {
	//recogemos la informacion
	
	var user1 = userLog;
	var user2 = $("#idUser2").attr("name");
	var msg = $('#submit_message').val();
	var dt = new Date();
	var mlsecond = dt.getTime();
	console.log(mlsecond);
	//var dt = dt.getDate();
	//var dt = date.getFullYear() + ":" + date.getMonth() + ":" + date.getDate() + ":" + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
	hour = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

	var formData = {
		'user1'  :user1,
		'user2'  :user2,
		'mlsecond'   :mlsecond,
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
        $("#chat").animate({ scrollTop: $(document).height()*1000 }, "slow");
});

//Funcion para abir el chat y cargar la informacion
$(document).on ("click", "#abrirChat", function () {
	user2 = $(this).attr("name"); //Cogemos el nombre de la persona que click
	openChat(user2);
});
//Funcion para actualizar el chat		
 $(document).on ("click", "#actualizarChat", function () {
 		user2 = $(".md-user-image").attr("name"); //Cogemos el nombre de la persona que click
 	 openChat(user2);		
 });		
 		
 $(document).on ("click", "#removeClass", function () {		
 	$("#sidebar_secondary").hide(); 
 });





