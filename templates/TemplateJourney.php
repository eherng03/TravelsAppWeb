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
		
		public function getTemplate($driver, $journey){
		   	return "<div class = 'Journey'> 
						<table>
							<tr>
							  <td> <img src= '../resources/userImages/".$driver->photo."'/>
								Nombre: ".$driver->name."	
								</td>
								 <td>Trayecto: ".$journey->getOrigin()."-".$journey->getDestination()."</td>
							</tr>					
							<tr>
							 
							<td>Precio: ".$journey->getPrice()."</td>
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