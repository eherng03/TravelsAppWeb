<?php
   $coment = $_POST['coment'];

   echo "<div class = 'comentarios'> 
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
?>