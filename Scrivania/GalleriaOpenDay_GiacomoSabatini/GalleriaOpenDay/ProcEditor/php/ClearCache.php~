<?php
require("../../sessione.php");
session_start();
 if(isLogged()) {
 $user = isLogged();
 
 $NewCommand = "rm -R /var/www/html/GalleriaOpenDay/ProcEditor/php/tempde/*";
 $NCom2 = "rm  -R /var/www/html/GalleriaOpenDay/ProcEditor/php/tempde/*";
 $NewExe = shell_exec($NewCommand);
 $NE2 = shell_exec($NCom2);
 echo $NewExe;
 echo $NE2;
 header("Location: ProcEditor.php");
 }
?>