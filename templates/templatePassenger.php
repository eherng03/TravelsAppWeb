<?php
   $passenger = $_POST['passenger'];

   echo "<div class = 'comentarios'> 
				<table>
					<tr>
						<td>
							<img src= '".$passenger->getPhoto()."' alt=''/>
						</td>
					</tr>
					
					<tr>
					  <td>Nombre:".$passenger->getName()."</td>
					</tr>  
				</table>
				
				<input type='button' value='CHAT'>
			</div>";
?>