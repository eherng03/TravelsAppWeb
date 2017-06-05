<?php
	$trip = $_POST['trip'];
	$driver = $_POST['driver'];

   echo "<div class = 'Journey'> 
				<table >
					<tr>
					  <td> <img src= '".$driver->photo."' alt=''/>
						Nombre: ".$driver->name."	
						</td>
						 <td>Trayecto:".$trip->source."-".$trip->destination."</td>
					</tr>					
					<tr>
					 
					<td>Precio:".$trip->price."</td>
					<td>Nº plazas disponibles:".$trip->seats."</td>
					</tr>
					
					<tr>
										
					  <td>Día y hora de salida :".$trip->initDate $trip->initHour."Día y hora de llegada:".$trip->arrivalDate $trip->arrivalHour."</td>
					</tr>	 
				
				</table>
			</div>";
?>