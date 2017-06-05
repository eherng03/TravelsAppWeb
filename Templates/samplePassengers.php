<?php
 require 'TemplatePassenger.php';
?>
 
  <html>   
  
   <head>   
   </head>  
   
   <body>   
   
  <?php 
  
  
  //
   $data = array(
   "name" => "pasajero", 
    "ruta" => "../img",
	 "desde" => "L",
	  "hasta" => "U"
   );

   $inst = new TemplatePassenger(); 
   $inst->setData($data);
   echo $inst->getHtml();
  ?>

   </body>  
  </html>