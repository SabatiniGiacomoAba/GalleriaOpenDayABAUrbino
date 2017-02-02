<!DOCTYPE html>
<html>
<head>
<title>Galleria Processing</title>
<?php
require("../sessione.php");
function LoadProject($user, $dir, $filtro, $progetto){
	  $progetto=$progetto."/";
	  $lista_files=glob($progetto.$filtro);
	  foreach($lista_files as $singolo_file){
	  	       //echo "<br> elenco :<br> --> $singolo_file  ";
	          $sfile = str_replace($progetto, "", $singolo_file); 
	          $sfile = $dir.$sfile;
				 echo "<br> copia :<br> --> $singolo_file <br> --> $sfile";	
				 copy($singolo_file, $sfile );
	  }

}
?>
</head>
<body>
<b><div style="text-align: center"> <i>Nuovo Progetto Galleria Processing</i></div></b><br>
<hr>

<?php
$dir    = "../forme_geometriche/";
$filtro = "*.xml";
$progetto = $_POST["progetto"];
//echo "<br>".$progetto;
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
			//if ( (is_array($lista_files)) and (count($lista_files) >= 1)) {
				//echo "<br>Bisogna caricare il progetto selezionato <b>$progetto</b>" ;
				// significa copiare tutti i file in una nuova directory
				//$newDirProject=makeNewProject($user,$data,$ora,$lista_files,$dir);
				loadProject($user, $dir, $filtro, $progetto);
				echo "<br>Creato con successo il progetto: <b> $progetto </b>";				
			//}else{
			//	echo "<br>Non bisogna salvare il progetto";
			//}
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
