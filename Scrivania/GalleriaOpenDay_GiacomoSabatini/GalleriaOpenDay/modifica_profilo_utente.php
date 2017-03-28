<?php

$xml = simplexml_load_file("dati_utenti.xml");
$name = $_GET["name"];
$surname = $_GET["surname"];
$username = $_GET["username"];
$definition = $_GET["definition"];
$email = $_GET["email"];
$studies = $_GET["studies"];
$s=$_GET["sex"];
/*
echo "$name<br>";
echo "$surname<br>";
echo "$username<br>";
echo "$definition<br>";
echo "$email<br>";
echo "$studies<br>";
echo "$s<br>";
*/
echo "<b><div style=\"text-align: center\">Modifica il profilo di registrazione al sito <i>Gallery Processing</i></div></b>";
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
function modifyNodeXml($xml,$name,$surname,$username,$definition,$email,$studies,$s){
	foreach($xml->user as $user){
    		if ( $user ->username == $username) {
    			// In questo caso possiamo modificare il profilo
    			if (( $name != "" ) && ($name != $user-> name))
    				$user -> name = $name;
    			if (( $surname != "" ) && ($surname != $user-> surname ))
    				$user -> surname = $surname; 				
    			if (( $definition != "" ) && ($definition != $user-> definition ))
    				$user -> definition = $definition;
    			if (( $email != "" ) && ($email != $user-> email ))
    				$user -> email = $email;
    			if (( $studies != "" ) && ($studies != $user-> studies ))
    				$user -> studies = $studies;
    			if (( $s != "" ) && ($s != $user-> sex ))
    				$user -> sex = $s;
    		}
	}
	return($xml);
}

function writeSchedaNode($name,$surname,$username,$password,$definition,$email,$studies,$s){
	echo "{<hr>";
	echo "<br>";
	echo "<table>";
	echo "<tr><td>Nome:</td><td>$name</td></tr>";
        echo "<tr><td>Cognome:</td><td>$surname</td></tr>";
	echo "<tr><td>Username:</td><td>$username</td></tr>";
	echo "<tr><td>Password:</td><td>*****</td></tr>";
	echo "<tr><td>Definizione:</td><td>$definition</td></tr>";
	echo "<tr><td>email:</td><td>$email</td></tr>";
	echo "<tr><td>Studi:</td><td>$studies</td></tr>";
	echo "<tr><td>sesso:</td><td>$s</td></tr>";
	echo "</table><br>";
	echo "<hr>";
}

$result = findNodeXml($xml,$username);
if($result[0]){
        echo "<br><b>Username: ".$username." presente</b><br>";
        $xml = modifyNodeXml($xml,$name,$surname,$username,$definition,$email,$studies,$s);
		  $xml->asXML("dati_utenti.xml");
        echo "<a href=\"modifica_profilo.php\"> Torna alla pagina di Modifica della Registrazione </a><br>";
        echo "<a href=\"index.html\"> Torna alla Home Page </a>";
} else {
    	  echo "<br><b>Username: ".$username." non presente</b><br>";
    	  echo "Non è possibile modificare il profilo....<br>";
    	  // Possiamo passare alla registrazione
		  echo "<a href=\"modifica_profilo.php\"> Torna alla pagina di Modifica della Registrazione </a><br>";
}
?>
