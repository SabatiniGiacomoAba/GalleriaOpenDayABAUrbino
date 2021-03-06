<html>
<head>
   <meta charset="utf-8" />
   <title>ProcEditor - Editor Processing</title>
   <link rel="stylesheet" type="text/css" href="../css/Editor_Processing.css">
   <script src="../js/Loading.js"></script>
   <script src="../js/processing.js"></script> 
</head>
<body >
<div id="loading" style="top:0; left:0; width: 100%">
   <div id="load_screen_background"></div>
   <div id="titleScreen" class="welcomeScreen">
     <h1 class="Title2">ProcEditor </h1>
     <h3 style="margin-top: 2%"> Free Processing Editor </h3><br>
     <h2 style="margin-top:7%; font-weight: lighter;" id="txt3"> Loading... </h2>
     <h6 style="margin-top: 12%" id="txt4"> Accademia di Belle Arti di Urbino</h6>
   </div>
</div>
 <div id="proceditor" class="proContainer">
  <div id="loadPage" class="loadScreen">
                 <form  action="LoadFile.php" id="fileslist" method="post" name="filelist">
                 <!--This section is still work in progress; wait for updates!-->
                 <div style="overflow:scroll; margin:4%; width:550px;height:400px;">
           <?php
               require("../../sessione.php");
             session_start();
             $xml = simplexml_load_file("info.xml");
              /*   if(isLogged()) {
                 $user = isLogged();
                 //$tempName = "tempde/temp.m.ercolani.xml";
                 $tempName = "tempde/temp.$user.xml";
                 //$temp = fopen("tempde/temp.".$user.".xml", "r");
                  $temp = fopen("tempde/temp.$user.xml", "r");
                 echo fread($temp,filesize("tempde/temp.".$user.".xml"));
                 }*/
             if(isLogged())
              {
             $user = isLogged();
              $file_indice_forme = fopen("HostedFilesList.txt", "r");
              $toPhp = fread($file_indice_forme, filesize("HostedFilesList.txt"));
                 $filelist = explode("\n", $toPhp);
                 
                 $numfiles = count($filelist);
                 if($numfiles < 0) {
                 	echo "No files available!";
                 	}
                 	else {
                 $i =2;
                     for($i = 2; $i < ($numfiles-1); $i++) 
                        {
                         	echo "<input type=\"radio\" name=\"file\" style=\"left:10%;\" value=\"".$i."\">".$filelist[$i]."</input>";
                        	echo "<br>";
                        }
                 
                 //echo "<input type=\"submit\" style=\"bottom:0px;\"class=\"filebutton\" value=\"open\">";
                  }
             }
             
             else {
 	          echo "You aren't logged! Cannot see file list!";
            }?>
            </div>
                  
                 <input type="submit" style=" margin-right:25%;float: right; margin-top:-2%" class="filebutton" value="open">  
                 </form> 
                 <button onclick="closeLoadFile()" style=" margin-left:25%; margin-top:-2%"class="filebutton"> close</button> 
                
         </div>
     <div id="title" class="title">
        ProcEditor - Alpha v0.6
     </div>
     <div id="OptionLine">
      
          <button id="usr" class="filebuttons"  onclick="FileButton()"><?php
           /*  require("../../sessione.php");
             session_start();
             $xml = simplexml_load_file("info.xml");*/
             
             if(isLogged()) {
             $user = isLogged();
             echo $user;}
             
             else {
 	          echo "NoUser";
            }   ?></button> 
        
       <form action="../php/Drawer.php" method="post" class="Update" style="float:right; z-index: 5; position:relative; top:0px; right:0px; width:85px; height:15px;" onsubmit="return TxtRemover()">  
              <input id="send" type="submit" name="drawer" value="Update View" class="filebuttons" > 
              <textarea name="tempxml" id="tempxml" style="display:block; float:right;"></textarea>  
           </form> 
           
      <div id="menu" class="filemenu">
        <h6 style="margin-top:5px; margin-bottom:5px">File</h6>
        <!--New Button -->
          <form action="../php/New.php" method="post">
          <input id="new" type="submit" class="filebuttons" name="new" value="New"/>
          </form>
         <button onclick="openLoadFile()" class="filebuttons">Load</button>
        
          <!--Send As Button -->
          <form action="../php/Sender.php" method="post" onsubmit="return sentFileNameChecker()">  
              <input id="send" type="submit" name="submit" value="Send As:" class="filebuttons" > 
              <input id="fileName" type="text" name="xmlfilename" value="NewProcessing" style="width:100px;">
             
              <textarea name="tempXML" id="tempXML" style="position:absolute; float:right; left:100px; z-index:5; width:300px;
              height:400px; display:none;"></textarea>  
             
           </form> 
      
          <form action="../php/ClearCache.php" method="post">
          <input id="clearCache" type="submit" class="filebuttons" name="clearCache" onclick="return adminChecker()" value="Clear Cache" title="This is to clear all temporary files"/>
          </form>   
            <script type="text/javascript">
           function adminChecker() {
           	var passwd = prompt("!___Attention___!\n This is to delete all temporary files stored in our server\n and it's reserved only to Administrator! \n To Access to this function, digit Admin password.", " ");
           	
           	 if (passwd == null || passwd == "") {
        alert("Bisogna inserire la username");
        return false;
    }
    else {
    	if (passwd == "RPGaba2017") {
    		alert("Welcome, Admin! Now you can execute the command.");
    		return true;
    	}
 }   	
}
           </script>
        <hr>
           <h6 style="margin-top:5px;margin-bottom:5px;"> Gallery</h6>
           <button id="home" class="filebuttons"  name="home" onclick="homeReq()">Home</button>
           <button id="login" class="filebuttons" name="login" onclick="loginReq()" >Login</button> 
           
        </div> 
        
 </div> 
     <div id="toolPanel" class="toolPanel" >
         <button class="toolButton" id="createTriangle" onclick="TriangleOn(event)"><h4>Tr</h4></button>
         <button class="toolButton" id="createRect" onclick="RectangleOn(event)"><h4>Rct<h4></button>
         <button class="toolButton" id="createCircle" onclick="CircleOn(event)"><h4>Cr<h4></button>
         <button class="toolButton" id="createPentagon" onclick="PentagonOn(event)"><h4>Pn<h4></button>
         <button class="toolButton" id="createBrLine" onclick="PolylineOn(event)"><h4>PL<h4></button>
         <button class="toolButton" id="createLine" onclick="lineOn(event)"><h4>Li<h4></button>
         <button class="toolButton" id="createDot" onclick="DtOn(event)"><h4>Dot<h4></button>
         <td><input type="color" name="fillcolor" id="fillcolor" class="toolButton" value="#ff0000" onchange="changeColor()"></td><br>
         <td><input type="color" name="bordcolor" id="bordcolor" class="toolButton" value="#ff0000"></td>
     </div>
     <div id="mouseTrackerX" style="width:100px; float:left;"></div> 
     <div id="mouseTrackerY" style="width:100px; float:left;"></div>
     <div id="proCanvas" class="proCanvas" onmousemove="PrevCursor(event)" onmouseout="OutOfCanvas(event)">
      <canvas data-processing-sources="Canvas_Editor.pde" id="processing">  
     </div>
     
     <div id="leftPanel" class="leftPanel">
         <h3 style="margin-left: 5% font-size:20px;">Layers</h3>
         <div id="layersPan" class="layersPan">
           
         </div>
         <hr>
         <h3 style="margin-left: 5%; font-size:20px;">Option Panel</h3>
         <div id="OptionPanel" style="margin:auto; width: 100%; height:300px; overflow: scroll">
            <form id="TrPan" name="trPan" style="position:relative; z-index: 3; padding-left:10%;" class="PanOff">
                <h3>Triangle</h3>
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="0" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="0" style="width: 100px;"><br> 
                <h4>B</h4> 
                X2<input type="text" name="x2" id="x2" value="0" style="width: 100px;"><br>
                Y2<input type="text" name="y2" id="y2" value="50" style="width: 100px;"><br> 
                <h4>C</h4> 
                X3<input type="text" name="x3" id="x3" value="50" style="width: 100px;"><br>
                Y3<input type="text" name="y3" id="y3" value="50" style="width: 100px;"><br> 
                 <br>
                <div id="proportionsTr" style="width: 100px; height: auto;">Proportions:</div>             
            </form>
              <form id="rectPan" style="position:relative; z-index: 3;" class="PanOff">
                 <h3>Rectangle</h3>
                   <p>(in this version, set only A(x,y) and B(x) parameters)</p>
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="0" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="0" style="width: 100px;"><br> 
                <h4>B</h4> 
                X2<input type="text" name="x2" id="x2" value="5" style="width: 100px;"><br>
                Y2<input type="text" name="y2" id="y2" value="5" style="width: 100px;"><br> 
                 <br>
                <div id="proportionsRect" style="width: 100px; height: auto;">Proportions:</div>                       
            </form>              <form id="pentaPan" style="position:relative; z-index: 3;" class="PanOff">
                 <h3>Pentagon</h3>
                
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="30" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="0" style="width: 100px;"><br> 
                <h4>B</h4> 
                X2<input type="text" name="x2" id="x2" value="90" style="width: 100px;"><br>
                Y2<input type="text" name="y2" id="y2" value="0" style="width: 100px;"><br> 
                
                <h4>C</h4> 
                X3<input type="text" name="x3" id="x3" value="120" style="width: 100px;"><br>
                Y3<input type="text" name="y3" id="y3" value="30" style="width: 100px;"><br> 
                <h4>D</h4> 
                X4<input type="text" name="x4" id="x4" value="60" style="width: 100px;"><br>
                Y4<input type="text" name="y4" id="y4" value="60" style="width: 100px;"><br>  
                <h4>E</h4> 
                X5<input type="text" name="x5" id="x5" value="0" style="width: 100px;"><br>
                Y5<input type="text" name="y5" id="y5" value="30" style="width: 100px;"><br> 
                <br>
                <div id="proportionsPent" style="width: 100px; height: auto;">Proportions:</div>                          
            </form>           
              <form id="circlePan" style="position:relative; z-index: 3;" class="PanOff">
                 <h3>Circle</h3>
                 
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="20" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="0" style="width: 100px;"><br> 
                <h4>B</h4> 
                X2<input type="text" name="x2" id="x2" value="80" style="width: 100px;"><br>
                Y2<input type="text" name="y2" id="y2" value="0" style="width: 100px;"><br>                               
            </form> 
              <form id="polyPan" style="position:relative; z-index: 3;" class="PanOff">
                 <h3>Polyline</h3>
                 <p>(in this version, you won't be able to set how many points broken line must be composed of.)</p>
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="0" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="40" style="width: 100px;"><br> 
                <h4>B</h4> 
                X2<input type="text" name="x2" id="x2" value="20" style="width: 100px;"><br>
                Y2<input type="text" name="y2" id="y2" value="20" style="width: 100px;"><br> 
                
                <h4>C</h4> 
                X3<input type="text" name="x3" id="x3" value="80" style="width: 100px;"><br>
                Y3<input type="text" name="y3" id="y3" value="30" style="width: 100px;"><br> 
                <h4>D</h4> 
                X4<input type="text" name="x4" id="x4" value="100" style="width: 100px;"><br>
                Y4<input type="text" name="y4" id="y4" value="0" style="width: 100px;"><br>  
                <h4>E</h4> 
                X5<input type="text" name="x5" id="x5" value="0" style="width: 100px;"><br>
                Y5<input type="text" name="y5" id="y5" value="0" style="width: 100px;"><br> 
                <br>
                <div id="proportionsPoly" style="width: 100px; height: auto;">Proportions:</div>                          
            </form>
             <form id="LinePan" style="position:relative; z-index: 3;" class="PanOff">
                 <h3>Line</h3>
                 
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="20" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="0" style="width: 100px;"><br> 
                <h4>B</h4> 
                X2<input type="text" name="x2" id="x2" value="80" style="width: 100px;"><br>
                Y2<input type="text" name="y2" id="y2" value="0" style="width: 100px;"><br> 
                <br>
                <div id="proportionsLine" style="width: 100px; height: auto;">Proportions:</div>                          
            </form> 
             <form id="DotPan" style="position:relative; z-index: 3;" class="PanOff">
                 <h3>Dot</h3>
                 
                <h4>A</h4> 
                X1<input type="text" name="x1" id="x1" value="0" style="width: 100px;"><br>
                Y1<input type="text" name="y1" id="y1" value="0" style="width: 100px;"><br> 
                
                <div id="proportionsDot" style="width: 100px; height: auto;">Proportions:</div>                          
            </form>                        
         </div>
     </div>
   </div> 
   <p style="font-style:italic;">Note: on Google Chrome or other browsers set zoom at least at 90% to see whole window</p>
  <!-- <button onclick="TxtRemoverDEMO()"> Test me</button>-->
    <p id="test" style="font-style:italic;"></p>
   <!-- <p id="test2" style="font-style:italic;"></p>
    <p id="test3" style="font-style:italic;"></p>-->
 <div id="shapePrev" class="shapePrev"></div>

  <form style="display:block; z-index: 5;">  
              
              <textarea name="tmpXml" id="tmpXml" style="display:none;"><?php
                 if(isLogged()) {
                 $user = isLogged();
                 //$tempName = "tempde/temp.m.ercolani.xml";
                 $tempName = "tempde/temp.$user.xml";
                 //$temp = fopen("tempde/temp.".$user.".xml", "r");
                  $temp = fopen("tempde/temp.$user.xml", "r");
                 echo fread($temp,filesize("tempde/temp.".$user.".xml"));
                 }
              ?></textarea> 
              <script type="text/javascript">
                  var tempLoad = document.getElementById("tmpXml").value;
                  document.getElementById("tempXML").value = tempLoad;
                  document.getElementById("tempxml").value = tempLoad;
              </script> 
           </form> 
</body>
<script src="../js/LayerManager.js"></script>
<script src="../js/ButtonManager.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script> 
<script src="../js/XMLWriter/XMLWriter.js"></script> 
</html>
