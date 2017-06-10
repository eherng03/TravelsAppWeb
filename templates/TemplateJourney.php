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
		
		public function getTemplate($driver, $journey, $userNameLogged){
			
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
												
							  <td>Día y hora de salida: ".$trip->getInitDate()." Día y hora de llegada: ".$trip->getArrivalDate()."</td>
							</tr>	
						</table>";
						
			if($userNameLogged != '-'){
				$journeysID = array();
				$journeys = $trip->getJourneys();
				foreach ($journeys as $journey) {
					array_push($journeysID, $journey->getID());
				}
				$html .= "<input class='book-button' type='button' value='Reservar' id = 'bookBtn' onclick = 'bookClicked()''>
					<input type='hidden' id='journeyID' value=".json_encode($journeysID)."/>";
			}
			
			$html .= "</div>";
		   	return $html;	
		}

		public function getTemplateForDriver($journey, $trip){
			
		   	return "<div class = 'Journey'> 
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
												
							  <td>Día y hora de salida: ".$journey->getInitDate()." Día y hora de llegada: ".$journey->getArrivalDate()."</td>
							</tr>	
						</table>
					</div>";
		}
	}
	
?>