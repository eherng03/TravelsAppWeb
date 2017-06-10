var userLog;

$(document).ready(function() {
	userLog = $("#hdnSession").val(); //Username del conductor
	
    //Rellena el select de origenes
    $.get("../operations/selectJourneySearch.php", function(data) {
        var comboBox = document.getElementById("origin");
        var journeys = JSON.parse(data);

        journeys.forEach((journey) =>{
            var opt = document.createElement('option');
            //TODO funciona porque origen es privado
            opt.innerHTML = journey.origin;
            comboBox.appendChild(opt);
        });
    });

    //Rellena el select de destinos
    $.get("../operations/selectJourneySearch.php", function(data) {
        var comboBox = document.getElementById("destination");
        var journeys = JSON.parse(data);

        journeys.forEach((journey) =>{
            var opt = document.createElement('option');
            //TODO funciona porque origen es privado
            opt.innerHTML = journey.destination;
            comboBox.appendChild(opt);
        });
    });

    $("#searchBtn").click(function(){
        var origin = $('#origin').find(":selected").text();
        var destination = $('#destination').find(":selected").text();
        var date = $("#datepicker").datepicker( "getDate" );
        var milsStart = date.getTime();
        var milsEnd = date.setDate(date.getDate() + 1);       //Dia siguiente en milisegundos

        //Enviamos en la peticion origen, destino y fecha en milisegundos (el dia entero, inicio y fin)
        $.ajax({
            url: "../operations/getSearchResults.php",
            type: 'POST',
            data: {"origin": origin, "destination": destination, "dateStart": milsStart, "dateEnd": milsEnd, userNameLogged: userLog},
            success: function(data){
                var containerSearchResult = document.getElementById("searchResult");
                while(containerSearchResult.firstChild){
                    containerSearchResult.removeChild(containerSearchResult.firstChild);
                }
                $(containerSearchResult).append(data);
            }
        });
        
		/*
        $.ajax({
            url: 'templateJourney.php',
            type: 'POST',
            data: {'trip': trip, 'driver': driver},
            success: function(data){
                data.appendTo('#searchResult');
            }
        });*/
    });
});

function bookClicked(){
	alert("hola");
}