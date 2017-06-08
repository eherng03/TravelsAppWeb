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
		
		public function getTemplate($driver, $trip){
		   	return "<div class = 'Journey'> 
						<table >
							<tr>
							  <td> <img src= '".$driver->photo."' alt=''/>
								Nombre: ".$driver->name."	
								</td>
								 <td>Trayecto:".$trip->getOrigin()."-".$trip->getDestination()."</td>
							</tr>					
							<tr>
							 
							<td>Precio:".$trip->getPrice()."</td>
							<td>Nº plazas disponibles:".$trip->getSeats()."</td>
							</tr>
							
							<tr>
												
							  <td>Día y hora de salida :".$trip->getInitDate()."Día y hora de llegada:".$trip->getArrivalDate()."</td>
							</tr>	 
						
						</table>
					</div>";
		}
		
	}
	
?>