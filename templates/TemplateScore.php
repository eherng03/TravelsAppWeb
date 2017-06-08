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
		
		public function getTemplate($comment){
		   	return "<div class = 'comentarios'> 
						<table>
							<tr>
							  <td>Nombre:".$coment->getPassUserName()."</td>
							</tr> 
							<tr>
								<td>Puntuación:".$coment->getScore()."</td>
							</tr>
							<tr>
								<td>Comentario:".$coment->gerComent()."</td>
							</tr> 
						</table>
					</div>";
		}
?>