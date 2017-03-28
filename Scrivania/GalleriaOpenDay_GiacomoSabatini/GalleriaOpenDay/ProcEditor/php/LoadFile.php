         <?php
           
           require("sessione.php");
session_start();
$user = isLogged();
$loadedfile =$_POST["file"];
 $file_indice_forme = fopen("HostedFilesList.txt", "r");
 $toPhp = fread($file_indice_forme, filesize("HostedFilesList.txt"));
 $filelist = explode("\n", $toPhp);
 $i = $loadedfile;
 
$toStr = $filelist[$i];

  $toloadfile = "HostedFiles/".$toStr;
  $strfile="tempde/temp.".$user.".xml";
  
 $temp = fopen("$toloadfile", "r");
 $tmpXml = fread($temp,filesize("HostedFiles/".$toStr));

 
	$newfile = fopen("$strfile","w");
	         fwrite($newfile, $tmpXml);
	         fclose($newfile);
	 header('Location:ProcEditor.php');
?>
            