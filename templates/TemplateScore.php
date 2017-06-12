<?php
	namespace travels\templates;
	class TemplateScore{

		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		public function getTemplate($comment){
		   	return "<div class = 'puntuacion'> 
						<table>
							<tr>
							  <td>Nombre: ".$comment->getPassUserName()."</td>
							</tr> 
							<tr>
							  <td>Comentario: ".$comment->getComment()."</td>
							</tr> 
							<tr>
							  <td>Puntuación: ".$comment->getScore()."</td>
							</tr> 
						</table>
					</div>";
		}
	}
?>