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
							<td>Nº plazas disponibles: ".$trip->getSeats()."</td>
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
			
			$html .= "<div> <input class='book-button' type='button' value='Ver comentarios' data-toggle='modal' data-target='#myModal' id ='verComentarios' driver ='".$driver->user."'' driverName ='".$driver->name."' ></div> ";
			
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
				$html .= "<input class='book-button' type='button' value='Reservar' id = 'bookBtn' idTrip = '".$trip->getJourneys()[0]->getTripID()."' idsJourneys = '".$journeysIDString."'>";
			}elseif($userNameLogged == "reserved"){
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
