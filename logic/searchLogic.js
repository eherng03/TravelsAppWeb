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

    $('#origin').change(function(event) {
        var selectedOrigin = $(this).find(":selected");
        var trip = selectedOrigin.val();
        var origin = selectedOrigin.text();

        $.ajax({
                type: 'POST',
                url: '../operations/getSelectDestinations.php',
                data: {'origin': origin, "trip": trip},
                success: function(data){
                     $("#destination").empty();
                    var comboBox = document.getElementById("destination");
                    var opt = document.createElement('option');
                    opt.innerHTML = "- - -";
                    comboBox.appendChild(opt);
                    var journeys = JSON.parse(data);
                    journeys.forEach((journey) =>{
                        var opt = document.createElement('option');
                        opt.innerHTML = journey.destination;
                        comboBox.appendChild(opt);
                    });
                }
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
                $("#searchResult").append(data);
            }
        });
    });

});

$(document).on('click', '#bookBtn', function(){ 
    var idTrip = $(this).attr('idTrip');
    var idsJourney = $(this).attr('idsJourneys');
     $.ajax({
            url: "../operations/book.php",
            type: 'POST',
            data: {"idTrip": idTrip, "idsJourney": idsJourney, "username": userLog},
            
            success: function(data){
                alert("Ha reservado su viaje");
                location.reload();
            }
        });
});
