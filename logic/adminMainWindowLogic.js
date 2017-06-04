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
		url         : '../operations/getDrivers.php', //archivo que procesa los datos 
		dataType    : 'json', 
	        encode          : true
		}).done(function(data) {
			var drivers_info = (data); //obtenemos los datos 
			console.log(drivers_info);
			drivers_info.forEach((drivers_info) => {

			drivers.push(drivers_info); //Para cada objeto recibido lo guardamos en un array

			//Variables de cada objeto
			var name = drivers_info.name;
			var email = drivers_info.email;
			var user = drivers_info.user;
			var telephone = drivers_info.telephone;
			var dni = drivers_info.dni;
			var photo = drivers_info.photo;

			//creamos una fila para la tabla con los datos
	  		row = $('<tr><tr><td id="boton'+i+'"><td>'+name+'</td><td>'+email+'</td><td>'+user+'</td><td>'+telephone+'</td><td>'+dni+'</td><td>'+photo+'</td><td id="boton'+user+'"></td></tr>'); //create row
	   		$('#tab_conductores').append(row);

	   		//Boton para ver los comentarios
	   		$('<input />', {
	   			name : user,
	   		 	class: "botonVer btn btn-info",
	            type : 'button',
	            id: 'id' + user,
	            value: "Ver",
	        }).appendTo('#boton'+user+'');

	   		//Boton para eliminar usuario
	   		$('<input />', {
	   			name : user,
	   		 	class: "botonEliminar btn btn-danger",
	            type : 'button',
	            id: 'id' + i,
	            value: "Borrar",
	        }).appendTo('#boton'+i+'');

   		 	i++;

			});

		});

}



function loadUsers() {
	var users=[];
	var i=0;
	$.ajax({
		type        : 'GET', 
		url         : '../operations/getPassengers.php', //archivo que procesa los datos 
		dataType    : 'json', 
	        encode          : true
		}).done(function(data) {
			var user_info = (data); //obtenemos los datos 
			console.log(user_info);
			user_info.forEach((user_info) => {

			users.push(user_info); //Para cada objeto recibido lo guardamos en un array

			//Variables de cada objeto
			var name = user_info.name;
			var email = user_info.email;
			var user = user_info.user;
			var telephone = user_info.telephone;
			var dni = user_info.dni;
			var photo = user_info.photo;

			//creamos una fila para la tabla con los datos
	  		row = $('<tr><tr><td id="botonUser'+i+'"><td>'+name+'</td><td>'+email+'</td><td>'+user+'</td><td>'+telephone+'</td><td>'+dni+'</td><td>'+photo+'</td></tr>'); //create row
	   		$('#tab_usuarios').append(row);

	   		//Boton para eliminar usuario
	   		$('<input />', {
	   			name : user,
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
	var user = $( this ).attr("name");
 	var formData = {
    	'user' :  user,

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