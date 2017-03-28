<?php
require("sessione.php");
function addNodeGraphicsXml($blank_xml, $tmpXml){
	//$node = $blank_xml->addChild("layer1", $tmpXml);
	$node = $blank_xml -> addChild("shape",$tmpXml);
	return($blank_xml);
}
session_start();
$tmpXml = $_POST["tempXML"]; 
 $blank_xml = simplexml_load_file("Blank.xml");
 $xml = simplexml_load_file("info.xml");
 $sendas = $_POST["xmlfilename"];
 
 if(!isLogged())
 {   
      echo "You aren't logged in! <br><br> Please Log before attempting to upload again!";
   }

else {
	$user = isLogged();
	
	$strfile="HostedFiles/".$sendas .".".$user.".xml";
	
	
	      echo (" Utente $user puoi concludere l'operazione<br>");
			
			addNodeGraphicsXml($blank_xml, $tmpXml);
			
			//echo("Memorizzazione nel file: $strfile <br>");
			$blank_xml->asXML("$strfile");
			// In questo punto bisogna creare l'insieme dei file utilizzabili nella cartella
			// forma geometrica
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