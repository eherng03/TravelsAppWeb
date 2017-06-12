<?php
	class TemplatePassenger{

		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		public function getTemplate($passenger){
  			return "<div class = 'comentarios'> 
					<table>
						<tr>
							<td>
								<img id = 'userPhoto' src= '".$passenger->getPhoto()."' alt=''/>
							</td>
						</tr>
						
						<tr>
						  <td>Nombre:".$passenger->getName()."</td>
						</tr>  
					</table>
					
					<input type='button' value='CHAT'>
				</div>";
		}
?>