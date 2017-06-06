$(document).ready( function() {
	cambioVentana(); 
	loadDrivers();
	loadUsers();
});

function cambioVentana() {
	//Depende el lick que pulses se abrira una ventana o otra
    $('#conductores-link').click(function(e) {
		$("#conductores").delay(100).fadeIn(100);
 		$("#usuarios").fadeOut(100);
		$('#usuarios-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#usuarios-link').click(function(e) {
		$("#usuarios").delay(100).fadeIn(100);
 		$("#conductores").fadeOut(100);
		$('#conductores-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
}


function loadDrivers() {
	var drivers=[];
	var i=0; //Id para el boton

	//Peticion para obtener los conductores de la bd
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getDriversInfo.php', //archivo que procesa los datos 
		dataType    : 'json', 
	        encode          : true
		}).done(function(data) { //obtenemos los datos 

			data.forEach((data) => {
			drivers.push(data); //Para cada objeto recibido lo guardamos en un array
			

			//Variables de cada objeto
			var username = data.username;
			var email = data.email;
			var name = data.name;
			var telephone = data.phone;
			var dni = data.dni;
			var photo = data.photo;

			//creamos una fila para la tabla con los datos
	  		row = $('<tr><tr><td id="boton'+i+'"><td>'+username+'</td><td>'+email+'</td><td>'+name+'</td><td>'+telephone+'</td><td>'+dni+'</td><td><img id="userPhoto" alt="" title="" src="../resources/userImages/'+photo+'" class="md-user-image"/></td><td id="boton'+name+'"></td></tr>'); //create row
	   		$('#tab_conductores').append(row);

	   		//Boton para ver los comentarios
	   		$('<input />', {
	   			name : username,
	   		 	class: "botonVer btn btn-info",
	            type : 'button',
	            id: 'id' + username,
	            value: "Ver",
	        }).appendTo('#boton'+name+'');

	   		//Boton para eliminar usuario
	   		$('<input />', {
	   			name : username,
	   		 	class: "botonEliminar btn btn-danger",
	            type : 'button',
	            id: 'id' + i,
	            value: "Borrar",
	        }).appendTo('#boton'+i+'');


			$(".botonVer").attr("data-toggle", "modal");
			$(".botonVer").attr("data-target", "#myModal");

   		 	i++;

			});

		});

}


function loadUsers() {
	var users=[];
	var i=0;
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getPassengersInfoAdmin.php', //archivo que procesa los datos 
		dataType    : 'json', 
	        encode          : true
		}).done(function(data) {
			var user_info = (data); //obtenemos los datos 
			console.log(user_info);
			user_info.forEach((user_info) => {

			users.push(user_info); //Para cada objeto recibido lo guardamos en un array

			//Variables de cada objeto
			var username = user_info.username;
			var email = user_info.email;
			var name = user_info.name;
			var telephone = user_info.telephone;
			var dni = user_info.dni;
			var photo = user_info.photo;

			//creamos una fila para la tabla con los datos
	  		row = $('<tr><tr><td id="botonUser'+i+'"><td>'+username+'</td><td>'+email+'</td><td>'+name+'</td><td>'+telephone+'</td><td>'+dni+'</td><td><img id="userPhoto" alt="" title="" src="../resources/userImages/'+photo+'" class="md-user-image"/></td></tr>'); //create row
	   		$('#tab_usuarios').append(row);

	   		//Boton para eliminar usuario
	   		$('<input />', {
	   			name : username,
	   		 	class: "botonEliminar btn btn-danger",
	            type : 'button',
	            id: 'id' + i,
	            value: "Borrar",
	        }).appendTo('#botonUser'+i+'');
	        
   		 	i++;

			});
		});
}


$(document).on ("click", ".botonEliminar", function () {
	var username = $( this ).attr("name");
 	var formData = {
    	'username' :  username,

    };

   //Enviamos un post mediantes ajax con los datos formData que contieen todos los datos
    $.ajax({
        type        : 'POST', 
        url         : '../operations/deleteUser.php', //archivo que procesa los datos 
        data        : formData, 
        dataType    : 'json', 
                    encode          : true
    })
    
    //Elimina la fila  segun el boton seleccionado
    var parentTag = $(this).parent().parent().remove(); 
 
});


/**  **/
//Funcion para abir el chat y cargar la informacion
$(document).on ("click", ".botonVer", function () {

	//Limpiamos los datos anteriores
	$("#modalHeader").empty();
	$("tr[id=fila]").remove();

	var driver;
	driver = $(this).attr("id"); //Cogemos el nombre de la persona que click
	driver = driver.split("id");
	driverUsername = driver[1];

	var html2 = '<h4 class="modal-title">Comentarios de '+driverUsername+'</h4>';
	$(html2).appendTo("#modalHeader");


	var formData = {
		'driverUsername' :  driverUsername,
	};

	
	
	$.ajax({
	type        : 'GET', 
	url         : '../operations/getComments.php', //archivo que procesa los datos 
	data        : formData, 
	dataType    : 'json', 
        encode          : true
	}).done(function(data) {
		data.forEach((data) => {
			var passUsername = data.passUsername;
			var comment = data.comment;

		//creamos una fila para la tabla con los datos
		row = $('<tr id="fila"><th>'+passUsername+'</th><th>'+comment+'</th></tr>'); //create row
		$('#tab_comentarios').append(row);

		});
	});

});