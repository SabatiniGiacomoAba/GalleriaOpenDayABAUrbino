<!DOCTYPE html>
<html>
<head>
<title>Galleria Processing</title>
<script src="js/processing.js"></script>
<?php
require("../sessione.php");
function makeNewProject($user,$data,$ora,$list_files, $dir){
	$newDirProject=$user."-".$data."-".$ora;
	if (!mkdir($newDirProject, 0777)) {
	  die('Impossibile creare la directory...');
     exit;
	} else {
	  foreach($list_files as $singolo_file){  
	          $sfile = str_replace($dir, "", $singolo_file); 
	          $sfile = $newDirProject."/".$sfile;
				 //echo "<br> sposto :<br> --> $singolo_file <br> --> $sfile";	
				 rename($singolo_file, $sfile );
	  }
	}
	return($newDirProject);
}
?>
</head>
<body>
<b><div style="text-align: center"> <i>Nuovo Progetto Galleria Processing</i></div></b><br>
<hr>

<?php
$dir    = "../forme_geometriche/";
$filtro = "*.xml";
session_start();
if(!isLogged())   {//se non è loggato torna al form e lo script termina
         //header("Location: ../login.html");
         echo "<br> Bisogna essere autenticati come administrator per completare l'operazione";
         echo "<br><a href=\"../login.html\"> Login </a>";
         exit;  
 } else {
 	   $user = isLogged();
 		$data = date("d-m-Y");
 		$ora = date("H-i-s");
 		if ($user == "administrator") {
			$lista_files=glob($dir.$filtro);
			if ( (is_array($lista_files)) and (count($lista_files) >= 1)) {
				echo "<br>Bisogna salvare il progetto attivo";
				// significa copiare tutti i file in una nuova directory
				$newDirProject=makeNewProject($user,$data,$ora,$lista_files,$dir);
				echo "<br>Creato con successo il progetto: <b> $newDirProject </b>";				
			}else{
				echo "<br>Non bisogna salvare il progetto";
			}
		} else {
		  echo "<br> Bisogna essere autenticati come administrator per completare l'operazione";
        echo "<br><a href=\"../login.html\"> Login </a>";
        exit;   
		}
}
?>
<br><a href="../index.html"> Home Page </a>
</body>
</html>
