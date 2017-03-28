<?php
require("sessione.php");
session_start();

$temp = fopen("temp.".$user.".xml", "r");

echo fread($list,filesize("temp.$user.xml"));
?>
 <!--
<textarea name="tmpReader" id="tmpReader" style="display:none;">
<?php
require("sessione.php");
session_start();
if(isLogged()) {
$user = isLogged();
$temp = fopen("temp.".$user.".xml", "a");
echo fread($temp,filesize($temp));
}
?>
<script type="text/javascript">
window.onload = function TmpLoader () {
	 var tmpReader = document.getElementById("tmpReader");
    document.getElementById("tempXML").value += (tmpReader.flush());
    document.getElementById("tempxml").value += (tmpReader.flush());
}
   
                
</script>
</textarea>-->