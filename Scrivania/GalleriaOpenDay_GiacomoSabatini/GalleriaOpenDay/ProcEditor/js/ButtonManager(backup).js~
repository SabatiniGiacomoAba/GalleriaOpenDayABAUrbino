//// JavaScript Document    
    var CanvasX;
    var CanvasY;

    
 function PrevCursor(e) {
    	
     var mousex = e.clientX;
    var mousey = e.clientY;
   CanvasX = document.getElementById("mouseTrackerX").value=(mousex - 460);
   CanvasY = document.getElementById("mouseTrackerY").value=(mousey - 57);
    document.getElementById("mouseTrackerX").innerHTML = CanvasX;
     document.getElementById("mouseTrackerY").innerHTML = CanvasY;

     
  } 
   //General Vars 
   var layerCount = 0;
   //var bordcolore = document.getElementById("bordcolor").value;	
   var bordcolore =  document.getElementById("bordcolor").value;	
   var colore = document.getElementById("fillcolor").value;	;	
   //Vertices Vars (Default)
   var cx1 =0;
   var cy1 =0;
   var cx2 =0;
   var cy2 =50;
   var cx3 =50;
   var cy3 =0;
    //Triangle
    TrOn = false;
    var shapePrev = document.getElementById("shapePrev"); 
    
  function changeColor() {
    colore = document.getElementById("fillcolor").value;	
    bordcolore = document.getElementById("bordcolor").value;	
     
 }  
     

 function TriangleOn(e)
    {
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (TrOn==false) {
     	 	
     	    shapePrev.classList.add("triangle");
     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    TrOn = true;
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	       
     	     
     	       window.onclick = function WriteTrPos(e)
     	        {
     	        	  
     	           if ( TrOn == true) {
     	           layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	           var v = new  XMLWriter();
                 v.writeStartDocument(true);
                 v.writeElementString('layer'+ layerCount, "");
                 v.writeAttributeString('color',colore);
                  v.writeAttributeString('border-color',bordcolore);
                 v.writeAttributeString('tipo',"triangolo");
                 v.writeAttributeString('x1',cx1 + CanvasX);
                 v.writeAttributeString('y1',cy1 + CanvasY);
                 v.writeAttributeString('x2',cx2 + CanvasX);
                 v.writeAttributeString('y2',cy2 + CanvasY);
                 v.writeAttributeString('x3',cx3 + CanvasX);
                 v.writeAttributeString('y3',cy3 + CanvasY);
                 v.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
      
                 document.getElementById("tempXML").value += (v.flush());
                 document.getElementById("tempxml").value += (v.flush());
       	      }
     	       }
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("triangle");
     	 	TrOn = false;
     	 }
     }


 //menu    
     var menu = document.getElementById("menu");
     var User = document.getElementById("file");
     var NoUser = "NoUser";
     var UserInfo = User.textContent;
     var fActive = false;
     
  
     function FileButton() {
     	 if (fActive==false) {
     	 	
     	    menu.classList.add("opened");
     	    fActive = true;
     	 	
     	 }
     	 else {
     	 	menu.classList.remove("opened");
     	 	fActive = false;
     	 }
     }

     function loginReq()
     {
     	if (UserInfo == "NoUser") {
      window.location.href="../../login.html";
      //window.location.href='https://www.google.com/chrome/browser/index.html';
       }
       else if(UserInfo != "NoUser") {
       	
       	alert("Already Logged In!");
       	}
      }
       function homeReq()
     {
     
      window.location.href="../../index.html";
      //window.location.href='https://www.google.com/chrome/browser/index.html';
       }
       
    //BUTTONS 