<?php

$xml = simplexml_load_file("dati_utenti.xml");

function viewNodeXml($xml){
	foreach($xml->user as $user){    
    		writeSchedaNode($user-> name,$user->surname,$user->username,$user->password,$user ->realm, $user->definition,$user->email,$user->studies, $user->sex);
	}
} 


function writeSchedaNode($name,$surname,$username,$password,$realm,$definition,$email,$studies,$s){
	echo "<hr>";
	echo "<br>";
	echo "<table>";
	echo "<tr><td>Nome:</td><td>$name</td></tr>";
        echo "<tr><td>Cognome:</td><td>$surname</td></tr>";
	echo "<tr><td>Username:</td><td>$username</td></tr>";
	echo "<tr><td>Password:</td><td>*****</td></tr>";
	echo "<tr><td>Definizione:</td><td>$definition</td></tr>";
   echo "<tr><td>Realm:</td><td>$realm</td></tr>";
	echo "<tr><td>email:</td><td>$email</td></tr>";
	echo "<tr><td>Studi:</td><td>$studies</td></tr>";
	echo "<tr><td>sesso:</td><td>$s</td></tr>";
	echo "</table><br>";
	echo "<hr>";
}

         
echo "<html>";
echo "<body>";
viewNodeXml($xml);
echo "<br>";
echo "<a href=\"index.html\"> Home Page </a>";
echo "</body>";
echo "</html>";

?>
