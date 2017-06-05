<?php
 require 'TemplateJourneys.php';
?>
 
  <html>   
  
   <head>   
   </head>  
   
   <body>   
   
  <?php 
  
  
  //
   $data = array(
   "name" => "Driver",
   "precio" => 15.30,
   "desde" => "Leon",
    "hasta" => "Uni",
   "plazas" => 4,
   "salida" => "11:20",
   "llegada" => "11:30",
    "ruta" => "../img"
   );

   $inst = new TemplateJourneys(); 
   $inst->setData($data);
   echo $inst->getHtml();
  ?>

   </body>  
  </html>