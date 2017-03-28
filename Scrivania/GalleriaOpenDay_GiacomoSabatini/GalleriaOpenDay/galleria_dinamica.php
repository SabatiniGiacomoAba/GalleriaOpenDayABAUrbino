<!DOCTYPE html>
<html>
<head>
<title>Galleria Processing</title>
<script src="js/processing.js"></script>
</head>
<body>
<b><div style="text-align: center"> <i>Galleria Processing</i></div></b><br>
<hr>
<center>
<table BORDER="0" align="center">
<?php
$dir    = "upload_pde/";
$filtro = "*.pde";
$extinfo = ".xml";
$lista_files=glob($dir.$filtro);
//$weeds = array('.', '..'); 
//$directories = array_diff(scandir($dir), $weeds);    
foreach($lista_files as $files) 
{ 
      $sfiles = str_replace($dir, "", $files); 
      $fileinfo = $files.$extinfo;
      //echo "<br>".$fileinfo;
      $xml = simplexml_load_file($fileinfo);
      if ($xml != NULL) {
      	$user = $xml->info_file->attributes()->username;
      	$data = $xml->info_file->attributes()->data;
      	$ora = $xml->info_file->attributes()->ora;
      	$size = $xml->info_file->attributes()->size;
      	//echo "<br>Mio ".$xml->info_file->attributes()->username;
      }
      
      echo "<tr><td align=\"center\" valign=\"middle\">
      <canvas data-processing-sources=\"upload_pde/$sfiles\"></canvas>
      </td><td align=\"left\" valign=\"top\"> 
      <strong><em>Nome file</em></strong>: $sfiles <br>
       <strong><em>Nome utente</em></strong> : $user <br> 
       <strong><em>Data</em></strong> : $data <br> 
        <strong><em>Peso </em></strong>: $size <br>
      <strong><em>Ora </em></strong>: $ora </td></tr>";
} 
?>
</table>
</center>
<br><a href="index.html"> Home Page </a>
</body>
</html>
