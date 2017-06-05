<?php
 class TemplateScore{
  
  
  
  private $name;
  private $score;
  private $comments;
  private $ruta;
 
  
  
  function setData($datos){
   $this->name = $datos['name'];
   $this->puntuacion = $datos['score'];
   $this->comments = $datos['comments'];
    $this->ruta = $datos['ruta'];
   
  }
  
  function getHtml(){
   return "<div class = 'comentarios'> 
				 
				<table>
					<tr>
						<td rowspan= '4'>
							<img src= '".$this->ruta."' alt=''/>
						</td>
					</tr>
					
					<tr>
					  <td><strong> Nombre: </strong>".$this->name."</td>
					
					</tr>
					
					
					<tr>
					
					
					  <td><strong> Comentarios: </strong>".$this->comments."</td>
					</tr>
					<tr>
					 
					  <td><strong> Valoracion: </strong>".$this->puntuacion."</td>
					
					</tr>
					 
				
				</table>
			</div>";
  }
  
  
  
  
 }
?>