<?php
 require 'TemplateScore.php';
?>
 
  <html>   
  
   <head>   
   </head>  
   
   <body>   
   
  <?php 
  // AQUI IRIA EL JSON para cargarle los datos a $data
  
   $data = array(
   "name" => "Ejemplo",
   "score" => 3,   
   "comments" => " Se viaja muy comodo",
   "ruta" => "../img"
   );

   $inst = new TemplateScore(); 
   $inst->setData($data);
   echo $inst->getHtml();
  ?>

   </body>  
  </html>