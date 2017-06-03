var userLog = 2; //User log
var arrayDatosPersona=[];

$(document).ready( function() {
	getMessages();
});

//Funcion para abir el chat y cargar la informacion
$(document).on ("click", "#abrirChat", function () {


	$("#Foto").empty();
	$("#mensajes").empty(); //mostramos el chat
	
	var msgs=[];
	var user2;
	
	user2 = $(this).attr("name"); //Cogemos el nombre de la persona que click


	var formData = {
		'user1'    :userLog,
		'user2'    :user2,
	};

	$.ajax({
	type        : 'GET', 
	url         : '../operations/getChatMessages.php', //archivo que procesa los datos 
	data        : formData, 
	dataType    : 'json', 
        encode          : true
	}).done(function(data) {
		var msg = (data); //obtenemos los datos 
		console.log(msg);
		msg.forEach((msg) => {
			msgs.push(msg); //Para cada objeto recibido lo guardamos en un array

		});

	
    var con = 0;
  	for (var i=0; i<msgs.length; i++){
  		var user1 = msgs[i].user1;
  		var user2 = msgs[i].user2;
  		var hour = msgs[i].hour;
  		var msg = msgs[i].msg;
  		
  		for (var j=0; j<arrayDatosPersona.length; j++){
	  		
			if(arrayDatosPersona[j].user == user2){
				if(con==0){
					con++;
					var username = arrayDatosPersona[j].user;
					var name = arrayDatosPersona[j].name;
					var photo = arrayDatosPersona[j].photo;

					var html1 = '<img class="md-user-image" src="'+photo+'">';
					$(html1).appendTo("#Foto");
					var html2 = '<h1 id="idUser2" name="'+username+'">Chat - '+name+'</h1>';
					$(html2).appendTo("#Foto");
					var html3 = '<small><br><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></small>';
					$(html3).appendTo("#Foto");
					
				}
			}

		}

  		if(user1 == userLog){
  			var html3 = ' <div class="chat_message_wrapper chat_message_right"><div class="chat_user_avatar"><a href="" target="_blank"><img alt="'+photo+'" title="" src="'+photo+'" class="md-user-image"/></a></div><ul class="chat_message"><li><p>'+msg+'<span class="chat_message_time">'+hour+'</span></p> </li></ul></div> ';
  			$(html3).appendTo("#mensajes");
  		}else{
  			var html3 = '<div class="chat_message_wrapper"><div class="chat_user_avatar"><a href="" target="_blank"><img alt="'+photo+'" title="" src="" class="md-user-image"/></a></div><ul class="chat_message"><li><p>'+msg+'<span class="chat_message_time">'+hour+'</span></p></li></ul></div>';
  			$(html3).appendTo("#mensajes");
  		}

  	}

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
            var html3 = ' <div class="chat_message_wrapper chat_message_right"><div class="chat_user_avatar"><a href="" target="_blank"><img alt="photo" title="" src="photo" class="md-user-image"/></a></div><ul class="chat_message"><li><p>'+msg+'<span class="chat_message_time">'+hour+'</span></p> </li></ul></div> ';
  			$(html3).appendTo("#mensajes");
            });
});

});

//Funcion para actualizar el chat
$(document).on ("click", "#actualizarChat", function () {
	 getMessages();
});

$(document).on ("click", "#removeClass", function () {
	 getMessages();
});


function getMessages() {
	$("#sidebar_secondary").hide(); //Ocultamos el chat
	/**
	** Numero de chats del usuario logeado
	**/

	//Informacion que se manda
	var formData = {
		'userLog'    : userLog,
	};

	var userLog_chats=[];
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getNChats.php', //archivo que procesa los datos 
		data        : formData, 
		dataType    : 'json', 
	        encode          : true
	}).done(function(data) {
		console.log(data);
		var users = (data); //obtenemos los datos 
		
		users.forEach((users) => { //Para cada objeto recibido lo guardamos en un array
			userLog_chats.push(users); 
		});

		//Codigo html que se crea de manera dinamica
		var html1 = '<a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="true"><span class="glyphicon glyphicon-comment"></span> '+userLog_chats.length +' Chats<span class="caret"></span></a>';
		$(html1).appendTo("#n_chats");
	

		/**
		**Datos de la gente con la que el user_log mantiene chats
		**/  
		var users=[]
		for (var i=0; i<userLog_chats.length; i++) {

			//Informacion que se manda
			var formData = {
				'user2'    : userLog_chats[i].user2,
			};

			$.ajax({
			type        : 'GET', 
			url         : '../operations/getChatUsers.php', //archivo que procesa los datos 
			data        : formData, 
			dataType    : 'json', 
		        encode          : true
			}).done(function(data) {
				var user_info = (data); //obtenemos los datos 
				console.log(user_info);
				user_info.forEach((user_info) => {

					users.push(user_info); //Para cada objeto recibido lo guardamos en un array
					arrayDatosPersona = users.slice(); //Copiamos el array

					var username = user_info.user;
					var name = user_info.name;
					var phone = user_info.telephone;
					var photo = user_info.photo;

					//Codigo html que se crea de manera dinamica
					var html2 = '<li><span class="item"><span class="item-left"><img src="" alt=""/><span class="item-info"><span id="nombreUserChat">'+name+'</span><span>'+phone+'</span></span></span><span class="item-right"><button name="'+username+'" id="abrirChat" class="btn btn-xs btn-danger pull-right"><span class="glyphicon glyphicon-pencil"></span></button></span></span></li>';
					$(html2).appendTo("#chats");
				});

			});
		}
	});
    
}