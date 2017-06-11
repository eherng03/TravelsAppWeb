<?php

	class TemplateJourney{
		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		public function getTemplate($driver, $trip, $userNameLogged, $cancelled){
			$textSeats = "";
			if($userNameLogged != "reserved"){
				$textSeats = "disponibles";
			}
		   	$html = "<div class = 'Journey'> 
						<table>
							<tr>
							  <td> <img src= '../resources/userImages/".$driver->photo."'/>
								Nombre: ".$driver->name."	
								</td>
								 <td>Trayecto: ".$trip->getOrigin()."-".$trip->getDestination()."</td>
							</tr>					
							<tr>
							 
							<td>Precio: ".$trip->getPrice()."€</td>
							<td>Nº plazas ".$textSeats.": ".$trip->getSeats()."</td>
							</tr>
							
							<tr>
												
							  <td>Día y hora de salida: ".date('D, d M Y H:i', $trip->getInitDate())." Día y hora de llegada: ".date('D, d M Y H:i', $trip->getArrivalDate())."</td>
							</tr>";
			if($cancelled == 1){
				$html .= "<tr>				
							<td>Cancelado</td>
						</tr>";
			}

			$html .= "</table>"; 
			
			$tripID;			
			try {
				$tripID = $trip->getJourneys()[0]->getTripID();
			} catch (Exception $e) {
				$tripID = $trip->getTripID();
			}
			
			$html .= "<div> <input class='book-button' type='button' value='Ver info conductor' data-toggle='modal' data-target='#myModal' id ='verComentarios' driver ='".$driver->user."'' driverName ='".$driver->name."' ></div> ";
			$html .= "<div> <input class='book-button' type='button' value='Ver pasajeros viaje' data-toggle='modal' data-target='#myModal2' id ='verPasajeros' tripID ='".$tripID."'></div> ";
			
			
			if($userNameLogged != '-' && $userNameLogged != "reserved"){
				$journeysID = array();
				$journeys = $trip->getJourneys();
				foreach ($journeys as $journey) {
					array_push($journeysID, $journey->getID());
				}
				
				$journeysIDString = "";
				foreach ($journeysID as $journeyID) {
					$journeysIDString .= $journeyID;
					$journeysIDString .= " ";
				}

				$html .= "<div><input class='book-button' type='button' value='Reservar' id = 'bookBtn' idTrip = '".$trip->getJourneys()[0]->getTripID()."' idsJourneys = '".$journeysIDString."'></div>";
			}elseif($userNameLogged == "reserved"){

				$currentDate = $milliseconds = round(microtime(true));
				$initDate = $trip->getInitDate();
				$resta = $currentDate - $initDate;

				$dia = "86400";
				$semana = "604800";

				//Si ha transcurrido mas de un dia y menos de una semana dejamos puntuar al usuario el conductor
				if(($resta > $dia) && ($resta<$semana)){
					$html .= "<input driverName ='".$driver->user."' class='score-button' type='button' value='Puntuar conductor' id = 'scoreBtn' driver = '".$driver->name."' data-toggle='modal' data-target='#modalScore' '>";
				}
				$html .= "<input class='cancel-button' type='button' value='Anular' id = 'cancelBtn' idTrip = '".$trip->getTripID()."' idJourney = '".$trip->getID()."'>";
			}
			$html .= "</div>";
		   	return $html;	
		}

		public function getTemplateForDriver($journey, $trip, $cancelled){
		   	$html = "<div class = 'Journey'> 
						<table>
							<tr>
								<td>Viaje: ".$trip->getOrigin()."-".$trip->getDestination()."</td>
								<td>Trayecto: ".$journey->getOrigin()."-".$journey->getDestination()."</td>
							</tr>					
							<tr>
							 
							<td>Precio: ".$journey->getPrice()."€</td>
							<td>Nº plazas disponibles: ".$journey->getSeats()."</td>
							</tr>
							
							<tr>
												
							  <td>Día y hora de salida: ".date('D, d M Y H:i', $journey->getInitDate())." Día y hora de llegada: ".date('D, d M Y H:i', $journey->getArrivalDate())."</td>
							</tr>
							<tr>
								<input class='book-button' type='button' value='Ver pasajeros trayecto' data-toggle='modal' data-target='#myModal2' id ='verPasajerosTrayecto' tripID ='".$journey->getTripID()."' journeyID ='".$journey->getID()."'>
							</tr>";
			if($cancelled == 1){
				$html .= "<tr>				
							<td>Cancelado</td>
						</tr>";
			}
			$html .= "</table>
					</div>";

			return $html;
		}
	}
	
?>
