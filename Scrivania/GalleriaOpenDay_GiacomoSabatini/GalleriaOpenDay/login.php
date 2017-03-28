<?php
require("sessione.php"); //require is a calling of an external script. It's useful to load data acquired/compiled in other scripts or to call functions & other elements;
session_start();//avvia la sessione in Galleria
$xml = simplexml_load_file("dati_utenti.xml");
$username = $_POST["username"];
$password = $_POST["password"];
$realm = $_POST["realm"];
echo "<b><div style=\"text-align: center\">Login al sito <i>Galleria Processing</i></div></b>";
//  Funzione per cercare i dati se esistenti
function findNodeXml($xml,$usern,$r){

	foreach($xml->user as $user){ 
			
    		if ( $user -> username == $usern) {
    			$v = $user;
    		}
	}
	return ( $v );
} 
$result = findNodeXml($xml,$username,$realm);
if($result[0]){      
      if ($result[0] -> password == $password ) {
      	if($result[0] -> realm == $realm)
      	{
      	  login($username);
			  echo "<br><b>Benvenuto: ".$username." login avvenuta</b><br>";
			  echo "<a href=\"index.html\"> Home Page </a>";
			}
			else {
			   echo "Realm /not correct! Try again!";
			   echo "<a href=\"index.html\"> Home Page </a>";
			}
     } else {
			echo "<br><b>Password errata</b><br>";
			echo "<a href=\"login.html\"> Torna alla pagina di Login </a>";
     }
} else {
     echo "<br><b>Username: ".$username." non presente</b><br>";
     echo "<a href=\"login.html\"> Torna alla pagina di Login </a>";
}
?>
