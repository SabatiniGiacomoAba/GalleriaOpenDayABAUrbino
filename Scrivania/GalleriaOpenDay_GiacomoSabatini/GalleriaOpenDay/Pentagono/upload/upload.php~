<?php
require("../sessione.php");
function addNodeInfoXml($xml,$user,$data,$ora,$sfile){
	
	$nodo = $xml->addChild('info_file',"Informazioni sul file uploded");
	$nodo->addAttribute('username',$user);
	$nodo->addAttribute('data',$data);
	$nodo->addAttribute('ora',$ora);
	$nodo->addAttribute('file',$sfile);
	return($xml);
}
session_start();
$xml = simplexml_load_file("info.xml");
if(!isLogged())   {//se non è loggato torna al form e lo script termina
         header("Location: ../login.html");
         exit;  
 } else {
 	$user = isLogged();
 	$data = date("d-m-Y");
 	$ora = date("H:i:s");
 	echo "<br>User: " . $user;
 	echo "<br>Data: " . $data;
 	echo "<br>Ora: ". $ora;
 	echo "<br>";
 	//
	if ($_FILES["file"]["error"] > 0){
  		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	} else {
  		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  		echo "Type: " . $_FILES["file"]["type"] . "<br>";
  		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  		//echo "Stored in: " . $_FILES["file"]["tmp_name"];
	}
	if (file_exists("../upload_pde/" . $_FILES["file"]["name"])) {
  		echo $_FILES["file"]["name"] . " already exists. ";
	} else {
  		move_uploaded_file($_FILES["file"]["tmp_name"],"../upload_pde/" . $_FILES["file"]["name"]);
  		echo "Stored in: " . "../upload_pde/" . $_FILES["file"]["name"];
  		$strfile="../upload_pde/".$_FILES["file"]["name"].".xml";
		echo("<br>Memorizzazione nel file di info: $strfile <br>");
		addNodeInfoXml($xml,$user,$data,$ora,$_FILES["file"]["name"]);
		echo($xml);
		$xml->asXML($strfile);
	}
	echo "<br><a href=\"../index.html\"> Home Page </a>";
}
?> 