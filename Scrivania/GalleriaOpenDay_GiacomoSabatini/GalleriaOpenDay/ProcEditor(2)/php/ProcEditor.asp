<html>
<head>
   <meta charset="utf-8" />
   <title>Editor Processing</title>
   <link rel="stylesheet" type="text/css" href="../css/Editor_Processing.css">
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>


 <div id="proceditor" class="proContainer">
     <div id="title" class="title">
        ProcEditor - Alpha v0.1
     </div>
     <div id="OptionLine">
     
     <button id="file" class="filebuttons" onclick="FileButton()">NoUser</button>
     
       <div id="menu" class="filemenu">
        <h6 style="margin-top:5px;margin-bottom:5px">File</h6>
        
          <button id="new" class="filebuttons" name="new">New</button>
          <form action="../php/Sender.php" method="post"  enctype="multipart/form-data">
              <input id="send" type="submit" name="submit" value="Send" class="filebuttons">
              
           </form>
              <button id="sendAs" class="filebuttons"  name="sendAs">Send As</button>
         
        <hr>
           <h6 style="margin-top:5px;margin-bottom:5px;"> Gallery</h6>
           <button id="home" class="filebuttons"  name="home" onclick="homeReq()">Home</button>
           <button id="login" class="filebuttons" name="login" onclick="loginReq()" >Login</button>
        </div> 
        
     </div>   
     <div id="toolPanel" class="toolPanel">
         <button class="toolButton" id="createTriangle"><h4>Tr</h4></button>
         <button class="toolButton" id="createRect"><h4>Rct<h4></button>
         <button class="toolButton" id="createCircle"><h4>Cr<h4></button>
         <button class="toolButton" id="createBrLine"><h4>BL<h4></button>
         <button class="toolButton" id="createLine"><h4>Li<h4></button>
         <button class="toolButton" id="createDot"><h4>Dot<h4></button>
     </div>
     
     <div id="proCanvas" class="proCanvas">
      <canvas data-processing-sources="../pde/Canvas_Editor/Canvas_Editor.pde" id="processing">  
     </div>
     
     <div id="leftPanel" class="leftPanel">
         <div id="otherTools" class="otherTools">
            
         </div>
         <div id="layers" class="layers">
         
         </div>
     </div>
     
     <div class="LoginOff" id="logWin"></div>
 
</body> 
<script src="../js/ButtonManager.js"></script>
<script src="../js/processing.js"></script> 
</html>
