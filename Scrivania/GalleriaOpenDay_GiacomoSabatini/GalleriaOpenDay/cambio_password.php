<?php
require("sessione.php");
session_start();//avvia la sessione in Galleria
$xml = simplexml_load_file("dati_utenti.xml");
$username = $_POST["username"];
$password = $_POST["password"];
$newpassword = $_POST["newpassword"];
echo "<b><div style=\"text-align: center\">Cambio password per il sito <i>Galleria Processing</i></div></b>";
//  Funzione per cercare i dati se esistenti
function findNodeXml($xml,$usern, $passwd, $newpasswd){

	foreach($xml->user as $user){
			//echo "mio<br>";
    		if ( ($user -> username == $usern) && ($user -> password == $passwd ) ) {  
    		   //echo $newpasswd	;		
    			$user -> password = $newpasswd;
    			$v = $user;
    		}
	}
	return ( $v );
} 

$result = findNodeXml($xml,$username,$password, $newpassword);

if($result[0]){      
      //echo $result[0] -> password;
      if ($result[0] -> password == $newpassword ) {
      	//login($username);
      	//echo $result[0] -> username;
      	$xml->asXML("dati_utenti.xml");
			echo "<br><b>Cambio password per utente : ".$username." avvenuta</b><br>";
			echo "<a href=\"index.html\"> Home Page </a>";
     } else {
			echo "<br><b>Cambio password non avvenuta correttamente</b><br>";
			echo "<a href=\"cambio_password.html\"> Torna alla pagina di cambio password </a>";
     }
} else {
     echo "<br><b>Username: ".$username." non presente</b><br>";
     echo "<a href=\"cambio_password.html\"> Torna alla pagina di cambio password </a>";
}
?>
