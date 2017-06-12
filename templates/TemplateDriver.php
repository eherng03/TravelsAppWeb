<?php
	namespace travels\templates;
	class TemplateDriver{

		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		public function getTemplate($driver){
		   	return "<div class = 'driver'> 
						<table>
							<tr>
								<td>
									<img id = 'userPhoto' src= '".$driver->getPhoto()."' alt=''/>
								</td>
							</tr>
							
							<tr>
							  <td>Nombre:".$driver->getName()."</td>
							</tr>
							<tr>
							  <td>Email:".$driver->getEmail()."</td>
							</tr>
							<tr>
							  <td>Teléfono:".$driver->getTelephone()."</td>
							</tr>
							<tr>
							  <td>Puntuación:".$driver->getScoreAverage()."</td>
							</tr>
							<tr>
							  <td>Comentarios:".$driver->getComents()."</td>
							</tr>
						</table>
						<input type='button' value='CHAT'>
					</div>";
		}
?>