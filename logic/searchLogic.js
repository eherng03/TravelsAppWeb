$(document).ready(function() {
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
});