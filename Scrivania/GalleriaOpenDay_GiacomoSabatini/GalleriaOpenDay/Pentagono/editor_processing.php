<?php
require("sessione.php");
//
function addNodeGraphicsXml($xml,$user,$tipo,$color,$cx1,$cy1,$cx2,$cy2, $cx3, $cy3, $cx4, $cy4){
	$nodo = $xml->addChild('forma_geometrica',"forma grafica di $user");
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
	return($xml);
}
session_start();
//
$xml = simplexml_load_file("forma.xml");
$tipo = $_POST["tipo"];
$colore = $_POST["colore"];
$cx1 = $_POST["cx1"];
$cy1 = $_POST["cy1"];
$cx2 = $_POST["cx2"];
$cy2 = $_POST["cy2"];
$cx3 = $_POST["cx3"];
$cy3 = $_POST["cy3"];
$cx4 = $_POST["cx4"];
$cy4 = $_POST["cy4"];
//
if(!isLogged())   {//se non è loggato torna al form e lo script termina
         header("Location: login.html");
         exit;  
 } else {
			$user = isLogged();
			echo (" Utente $user puoi concludere l'operazione<br>");
			echo (" forma geometrica scelta: $tipo <br>");
			echo (" nella posizione: $cx1 , $cy1 , $cx2, $cy2 , $cx3, $cy3 , $cx4, $cy4 <br>");
			if ( (strcmp($tipo, "punto") == 0) || (strcmp($tipo, "linea") == 0 ) || (strcmp($tipo, "rettangolo") == 0 ) || (strcmp($tipo, "ellisse") == 0 ) || (strcmp($tipo, "triangolo") == 0 ) || (strcmp($tipo, "spezzata") == 0 )){
				//echo ("punto<br>");
				addNodeGraphicsXml($xml,$user,$tipo,$colore,$cx1,$cy1,$cx2,$cy2,$cx3, $cy3,$cx4,$cy4);
			}else
				echo("Nessuna forma grafica selezionata<br>");
			$strfile="forme_geometriche/elemento_".time().".xml";
			//echo("Memorizzazione nel file: $strfile <br>");
			$xml->asXML("$strfile");
			// In questo punto bisogna creare l'insieme dei file utilizzabili nella cartella
			// forma geometrica
			$dir_forme_geometriche = 'forme_geometriche';
			$files_forme_geometriche = scandir($dir_forme_geometriche);
			$file_indice_forme = fopen("indice_forme.txt", "w") or die("Unable to open file!");
			foreach($files_forme_geometriche as $singolo_file){   
				fwrite($file_indice_forme, $singolo_file);
				fwrite($file_indice_forme,"\n");
			}
			fclose($file_indice_forme);
			//
			header("Location: visualizzazione_processing.html");
}
?>
