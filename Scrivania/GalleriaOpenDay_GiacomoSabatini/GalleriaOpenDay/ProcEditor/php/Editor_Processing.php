<?php
require("sessione.php");

session_start();

 $xml = simplexml_load_file("info.xml");
 if(!isLogged())
 {   
      echo "You aren't logged in! <br><br> Please Log before attempting to upload again!";
   }

else {
	$user = isLogged();
	 echo "Sent! ".$user;
	 
	}
?>