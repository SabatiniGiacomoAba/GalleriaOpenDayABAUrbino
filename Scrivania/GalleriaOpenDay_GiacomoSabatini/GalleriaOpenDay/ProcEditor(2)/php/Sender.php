<?php
require("sessione.php");

session_start();
$tmpXml = $_POST["tempXML"]; 

 $xml = simplexml_load_file("info.xml");
 $sendas = $_POST["xmlfilename"];
 
 if(!isLogged())
 {   
      echo "You aren't logged in! <br><br> Please Log before attempting to upload again!";
   }

else {
	$user = isLogged();
	
	$strfile="HostedFiles/".$sendas .".".$user.".xml";
	      $newfile = fopen("$strfile", "w");
	         fwrite($newfile, $tmpXml);
	         fclose($newfile);
	      echo (" Utente $user puoi concludere l'operazione<br>");
			$dir_forme_geometriche = "HostedFiles";
			$files_forme_geometriche = scandir($dir_forme_geometriche);
			$file_indice_forme = fopen("HostedFilesList.txt", "w") or die("Unable to open file!");
			foreach($files_forme_geometriche as $singolo_file)
			{   
				fwrite($file_indice_forme, $singolo_file);
				fwrite($file_indice_forme,"\n");
			}
			fclose($file_indice_forme);
			
	
	echo "Sent ".$strfile.", ".$user ."!";
			//
}
?> 