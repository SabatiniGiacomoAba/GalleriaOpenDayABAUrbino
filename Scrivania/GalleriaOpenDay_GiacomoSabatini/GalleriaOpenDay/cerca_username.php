<?php

$xml = simplexml_load_file("dati_utenti.xml");
$username = $_GET["username"];


function findNodeXml($xml,$usern){
	foreach($xml->user as $user){
    		if ( $user ->username == $usern) {
    			$v = $user;
    		}
	}
	return ( $v );
} 
function writeSchedaNode($v){
	echo "<br>";
	echo "<table>";
	echo "<tr><td>Nome:</td><td>$v[0]->name</td></tr>";
        echo "<tr><td>Cognome:</td><td>$v[0]->surname</td></tr>";
	echo "<tr><td>Username:</td><td>$v[0]->username</td></tr>";
	echo "<tr><td>Password:</td><td>*****</td></tr>";
	echo "<tr><td>Definizione:</td><td>$v[0]->definition</td></tr>";
	echo "<tr><td>email:</td><td>$v[0]->email</td></tr>";
	echo "<tr><td>Studi:</td><td>$v[0]->studies</td></tr>";
	echo "<tr><td>sesso:</td><td>$v[0]->s</td></tr>";
	echo "</table><br>";
	echo "<hr>";
}

$result = findNodeXml($xml,$username);
if($result[0]){
        echo "<br><b>Username: ".$username." presente</b><br>";
        

        echo "<a href=\"cerca_username.html\"> Torna alla pagina di Ricerca Utente </a><br>";
        echo "<a href=\"index.html\"> Torna alla Home Page </a>";
} else {
    	  echo "<br><b>Username: ".$username." non presente</b><br>";
    	  echo "Non è possibile modificare il profilo....<br>";
    	  // Possiamo passare alla registrazione
		  echo "<a href=\"cerca_username.html\"> Torna alla pagina di Ricerca </a><br>";
		          echo "<a href=\"index.html\"> Torna alla Home Page </a>";
}
?>
