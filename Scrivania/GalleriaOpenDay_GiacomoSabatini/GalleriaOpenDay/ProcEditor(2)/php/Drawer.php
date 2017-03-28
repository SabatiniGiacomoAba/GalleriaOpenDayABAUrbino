<?php
/*require("sessione.php");
/*function addNodeGraphicsXml($xmlpde,$demo,$user,$tipo,$color,$cx1,$cy1,$cx2,$cy2, $cx3, $cy3, $cx4, $cy4){
	
	$nodo = $xmlpde->addChild('forma_geometrica',"forma grafica di $user");
	$nodo->addAttribute('tipo',$tipo);
	$nodo->addAttribute('utente',$user);
	$nodo->addAttribute('colore',$color);
	$nodo->addAttribute('x1',$cx1);
	$nodo->addAttribute('y1',$cy1);
	$nodo->addAttribute('x2',$cx2);
	$nodo->addAttribute('y2',$cy2);
	$nodo->addAttribute('x3',$cx3);
	$nodo->addAttribute('y3',$cy3);
	$nodo->addAttribute('x4',$cx4);
	$nodo->addAttribute('y4',$cy4);
	return($xmlpde);
}
session_start();
$demo = $_POST["tempxml"];
$xmlpde = simplexml_load_file("Shapes.xml");
$tipo = "";
$colore = "#ff0000";
$cx1 = 0;	
$cy1 = 0;
$cx2 = 0;
$cy2 = 0;
$cx3 = 0;
$cy3 = 0;
$cx4 = 0;
$cy4 = 0;


 $xml = simplexml_load_file("info.xml");
 //$sendas = $_POST["xmlfilename"];

 if(!isLogged())
 {   
      echo "You aren't logged in! <br><br> Please Log before attempting to upload again!";
   }

else {
	$user = isLogged();
	
	$strfile="tempde/temp.".$user.".xml";
	
	
			
			//addNodeGraphicsXml($xmlpde,$demo,$user,$tipo,$colore,$cx1,$cy1,$cx2,$cy2,$cx3, $cy3,$cx4,$cy4);
			
			//echo("Memorizzazione nel file: $strfile <br>");
			$xmlpde->asXML("$strfile");
			// In questo punto bisogna creare l'insieme dei file utilizzabili nella cartella
			// forma geometrica
			$dir_forme_geometriche = "tempde";
			$files_forme_geometriche = scandir($dir_forme_geometriche);
			$file_indice_forme = fopen("temp.txt", "w") or die("Unable to open file!");
			foreach($files_forme_geometriche as $singolo_file)
			{   
				fwrite($file_indice_forme, $singolo_file);
				fwrite($file_indice_forme,"\n");
			}
			fclose($file_indice_forme);
			
   header('Location:ProcEditor.php');
			//
}

}*/
require("sessione.php");
/*function addNodeGraphicsXml($blank_xml, $tmpXml){
	//$node = $blank_xml->addChild("layer1", $tmpXml);
	$node = $blank_xml -> addChild("shape",$tmpXml);
	return($blank_xml);
}
*/ session_start();
 $tmpXml = $_POST["tempxml"]; 
// $blank_xml = simplexml_load_file("Blank.xml");
 $xml = simplexml_load_file("info.xml");

 if(!isLogged())
 {   
      echo "You aren't logged in! <br><br> Please Log before attempting to upload again!";
   }

else {
	$user = isLogged();
	//addNodeGraphicsXml($blank_xml, $tmpXml);
	$strfile="tempde/temp.".$user.".xml";
	$newfile = fopen("$strfile","w");
	         fwrite($newfile, $tmpXml);
	         fclose($newfile);
	//$blank_xml += $tmpXml;
	//$blank_xml->asXML("$strfile");
	$dir_forme_geometriche = "tempde";
			$files_forme_geometriche = scandir($dir_forme_geometriche);
			$file_indice_forme = fopen("temp.txt", "w") or die("Unable to open file!");
			foreach($files_forme_geometriche as $singolo_file)
			{   
				fwrite($file_indice_forme, $singolo_file);
				fwrite($file_indice_forme,"\n");
			}
			fclose($file_indice_forme);
	 header('Location:ProcEditor.php');
	 }
?>