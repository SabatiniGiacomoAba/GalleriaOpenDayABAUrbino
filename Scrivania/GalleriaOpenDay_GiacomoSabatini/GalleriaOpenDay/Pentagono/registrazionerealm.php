<?php

$xml = simplexml_load_file("dati_utentirealm.xml");
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$password = $_POST["password"];
$definition = $_POST["definition"];
$realm = $_POST["realm"];
$email = $_POST["email"];
$studies = $_POST["studies"];
$s=$_POST["sex"];
//echo "Sesso ".$s;

echo "<b><div style=\"text-align: center\">Registrazione al sito <i>Gallery Processing</i></div></b>";
//  Funzione per cercare i dati se esistenti
function findNodeXml($xml,$usern){
	foreach($xml->user as $user){
    		if ( $user ->username == $usern) {
    			$v = $user;
    		}
	}
	return ( $v );
} 
// Funzione per aggiungere un record
function addNodeXml($xml,$name,$surname,$username,$password,$definition,$realm,$email,$studies,$s){
	$nodo = $xml->addChild('user','');
	$id = count($xml->user);
	$nodo->addAttribute('id',$id);
	$nodo->addChild('name',$name);
	$nodo->addChild('surname',$surname);
	$nodo->addChild('username',$username);
	$nodo->addChild('password',$password);
	$nodo->addChild('definition',$definition);
	$nodo->addChild('realm',$realm);
	$nodo->addChild('email',$email);
	$nodo->addChild('studies',$studies);
	$nodo->addChild('sex',$s);
	return($xml);
}

function writeSchedaNode($name,$surname,$username,$password,$definition,$realm,$email,$studies,$s){
	echo "<hr>";
	echo "<br>";
	echo "<table>";
	echo "<tr><td>Nome:</td><td>$name</td></tr>";
   echo "<tr><td>Cognome:</td><td>$surname</td></tr>";
	echo "<tr><td>Username:</td><td>$username</td></tr>";
	echo "<tr><td>Password:</td><td>*****</td></tr>";
	echo "<tr><td>Definizione:</td><td>$definition</td></tr>";
	echo "<tr><td>realm:</td><td>$realm</td></tr>";
	echo "<tr><td>email:</td><td>$email</td></tr>";
	echo "<tr><td>Studi:</td><td>$studies</td></tr>";
	echo "<tr><td>sesso:</td><td>$s</td></tr>";
	echo "</table><br>";
	echo "<hr>";
}

$result = findNodeXml($xml,$username);
if($result[0]){
        echo "<br><b>Username: ".$username." presente</b><br>";
        echo "<a href=\"registrazionerealm.html\"> Torna alla pagina di Registrazione </a>";
} else {
    	  echo "<br><b>Username: ".$username." non presente</b><br>";
    	  echo "Registrazione ....<br>";
    	  // Possiamo passare alla registrazione
    	  $xml = addNodeXml($xml,$name,$surname,$username,$password,$definition,$realm,$email,$studies,$s);
    	  $xml->asXML("dati_utentirealm.xml");
    	  echo "Registrazione terminata con successo<br>"; 
          writeSchedaNode($name,$surname,$username,$password,$definition,$realm,$email,$studies,$s);
    	  echo "<br><a href=\"loginrealm.html\" >Login</a>" ;
	  
}
?>
