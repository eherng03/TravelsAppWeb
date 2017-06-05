<?php
 class TemplatePassenger{
  
  
  
  private $name;

  private $ruta;
 
  
  
  function setData($datos){
   $this->name = $datos['name'];

    $this->ruta = $datos['ruta'];
	
	 $this->desde = $datos['desde'];
    $this->hasta = $datos['hasta'];
   
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
				
					 <td><strong> Trayecto: </strong>".$this->desde."-".$this->hasta."</td>
					</tr>
					
					
			
					 
				
				</table>
				
				<input type='button' value='CHAT'>
			</div>";
  }
  
  
  
  
 }
?>