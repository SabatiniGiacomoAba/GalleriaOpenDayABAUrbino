<?php
require("../../sessione.php");
session_start();
 if(isLogged()) {
 $user = isLogged();
 
 $NewCommand = "rm /var/www/html/GalleriaOpenDay/ProcEditor/php/tempde/temp.$user.xml";
 $NCom2 = "rm /var/www/html/GalleriaOpenDay/ProcEditor/php/tempde/temp.$user.xml~";
 $NewExe = shell_exec($NewCommand);
 $NE2 = shell_exec($NCom2);
 echo $NewExe;
 echo $NE2;
 header("Location: ProcEditor.php");
 }
?>