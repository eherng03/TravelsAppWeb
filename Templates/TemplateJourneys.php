<?php
 class TemplateJourneys{
  
  private $name;
  private $precio;
  private $desde;
   private $hasta;
  
  private $plazas;
  private $salida;
  private $llegada;
 
   private $ruta;
  

 
  
  
  function setData($datos){
   $this->name = $datos['name'];
   $this->precio = $datos['precio'];
   $this->desde = $datos['desde'];
    $this->hasta = $datos['hasta'];
    $this->plazas = $datos['plazas'];
	 $this->salida = $datos['salida'];
    $this->llegada = $datos['llegada'];
	 $this->ruta = $datos['ruta'];
   
  }
  
  function getHtml(){
   return "<div class = 'Trayecto'> 
				 
				<table >
					
					<tr colspan='2' rowspan= '2'>
					  <td> <img src= '".$this->ruta."' alt=''/>
					  <strong> Nombre: </strong>".$this->name."	
						</td>
						 <td><strong> Trayecto: </strong>".$this->desde."-".$this->hasta."</td>
					</tr>
				
					
					<tr colspan='2'>
					 
					  <td><strong> Precio: </strong>".$this->precio."</td>
					<td><strong> Nº plazas disponibles: </strong>".$this->plazas."</td>
					</tr>
					
					
					
					<tr>
										
					  <td><strong> Hora de salida : </strong>".$this->salida." <strong>  Hora de llegada: </strong>".$this->llegada."</td>
					</tr>
					
					
					 
				
				</table>
			</div>";
  }
  
  
  
  
 }
?>