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
 colore = document.getElementById("fillcolor").value;	
    bordcolore = document.getElementById("bordcolor").value;	
   //Vertices Vars (Default)
   var cx1;
   var cy1;
   var cx2;
   var cy2;
   var cx3;
   var cy3;
   var cx4;
   var cy4;
   var cx5;
   var cy5;
   var proportions;
    //Shapes' Booleans
    var TrOn = false;
    var RectOn = false;
    var PentaOn = false;
    var CircOn = false;
    var PolyOn = false;
    var LiOn = false;
    var DotOn = false;
   // Shape prevs 
    var shapePrev = document.getElementById("shapePrev"); 
    var TrPan = document.getElementById("TrPan");
    var RectPan = document.getElementById("rectPan");
    var PentaPan = document.getElementById("pentaPan");
    var CirclePan = document.getElementById("circlePan");
    var PolyPan = document.getElementById("polyPan");
    var LiPan = document.getElementById("LinePan");
    var DotPan = document.getElementById("DotPan");
    
  
  
  function changeColor() {
    colore = document.getElementById("fillcolor").value;	
    bordcolore = document.getElementById("bordcolor").value;	
     
 }  
 //Only Triangle
 function TriangleOn(e)
    {
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (TrOn==false) {
     	 	
     	    shapePrev.classList.add("triangle");
     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    //
     	    TrOn = true;
     	    DotOn = false;
     	    LineOn = false;
     	    RectOn = false;
     	    PentaOn = false;
     	    CircOn =false;
     	 	 PolyOn = false;
     	    //
     	    shapePrev.classList.remove("rectangular");
     	    shapePrev.classList.remove("pentagon"); 
     	     shapePrev.classList.remove("circle"); 
     	    shapePrev.classList.remove("polyline");
     	     shapePrev.classList.remove("line");
     	    shapePrev.classList.remove("dot");
     	    
     	         TrPan.classList.remove("PanOff");
     	       	TrPan.classList.add("PanOn");
     	       	PentaPan.classList.remove("PanOn");
     	       	PentaPan.classList.add("PanOff"); 
     	       	RectPan.classList.remove("PanOn");
     	       	RectPan.classList.add("PanOff");
     	       	CirclePan.classList.remove("PanOn");
     	       	CirclePan.classList.add("PanOff"); 
     	         PolyPan.classList.remove("PanOn");
     	         PolyPan.classList.add("PanOff");
     	          LinePan.classList.remove("PanOn");
     	         LinePan.classList.add("PanOff");
     	         
     	         DotPan.classList.remove("PanOn");
     	         DotPan.classList.add("PanOff");
     	         
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	    
     	     
     	       window.onclick = function WriteTrPos(e)
     	        {
     	        	  
     	          if ( TrOn == true) {
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	           	
     	           	/*cx1 =document.forms["trPan"]["x1"].value;
                  cy1 =document.forms["trPan"]["y1"].value;
                  cx2 =document.forms["trPan"]["x2"].value;
                  cy2 =document.forms["trPan"]["y2"].value;
                  cx3 =document.forms["trPan"]['x3'].value;
                  cy3 =document.forms["trPan"]["y3"].value;*/
                  x1 =document.forms["trPan"]["x1"].value;
                  y1 =document.forms["trPan"]["y1"].value;
                  x2 =document.forms["trPan"]["x2"].value;
                  y2 =document.forms["trPan"]["y2"].value;
                  x3 =document.forms["trPan"]["x3"].value;
                  y3 =document.forms["trPan"]["y3"].value;
                  
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
                  cx3 =Number(x3);
                  cy3 =Number(y3);
     	           var v = new  XMLWriter();
                 v.writeStartDocument();
                 v.writeStartElement("layers","");
                 v.writeStartElement('layer',"");
                 v.writeAttributeString('color',colore);
                 v.writeAttributeString('border-color',bordcolore);
                 v.writeAttributeString('tipo',"triangolo");
                 v.writeAttributeString('x1',cx1 + CanvasX);
                 v.writeAttributeString('y1',cy1 + CanvasY);
                 v.writeAttributeString('x2',cx2 + CanvasX);
                 v.writeAttributeString('y2',cy2 + CanvasY);
                 v.writeAttributeString('x3',cx3 + CanvasX);
                 v.writeAttributeString('y3',cy3 + CanvasY);
                 v.writeEndElement();
                 v.writeEndElement();
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
     	 	 TrPan.classList.remove("PanOn");
     	    TrPan.classList.add("PanOff");
     	 	TrOn = false;
     	 }
     }


function RectangleOn(e)
    {

     
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (RectOn==false) {
     	 	
     	    
     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    
     	    RectOn = true;
     	    TrOn =false;
     	    PentaOn = false;
     	    CircOn =false;
     	    PolyOn = false;
     	     DotOn = false;
     	    LineOn = false;	
     	 	
     	 	 
     	 	 shapePrev.classList.remove("polyline");
     	    shapePrev.classList.add("rectangular");
     	    shapePrev.classList.remove("triangle");
          shapePrev.classList.remove("pentagon");
          shapePrev.classList.remove("circle");
           shapePrev.classList.remove("line");
     	    shapePrev.classList.remove("dot");  
          	
     	         TrPan.classList.remove("PanOn");
     	       	TrPan.classList.add("PanOff");
     	       	PentaPan.classList.remove("PanOn");
     	       	PentaPan.classList.add("PanOff");   	
     	       	RectPan.classList.remove("PanOff");
     	       	RectPan.classList.add("PanOn");   	    
     	         CirclePan.classList.remove("PanOn");
     	       	CirclePan.classList.add("PanOff");
     	         PolyPan.classList.remove("PanOn");
     	         PolyPan.classList.add("PanOff"); 
                LinePan.classList.remove("PanOn");
     	         LinePan.classList.add("PanOff");
     	         
     	         DotPan.classList.remove("PanOn");
     	         DotPan.classList.add("PanOff");   
                  
                  
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	       
     	       window.onclick = function WriteRectPos(e)
     	        {
     	        	  
     	          if ( RectOn == true) {
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	            x1 =document.forms["rectPan"]["x1"].value;
                  y1 =document.forms["rectPan"]["y1"].value;
                  x2 =document.forms["rectPan"]["x2"].value;
                  y2 =document.forms["rectPan"]["y2"].value;
              
                  
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
              
                  
                 
     	           var c = new  XMLWriter();
     	         //  if (document.getElementById("tempXML").value == null) {
                 c.writeStartDocument();
             // }
                 c.writeStartElement("layers","");
                 c.writeStartElement('layer',"");
                 c.writeAttributeString('color',colore);
                 c.writeAttributeString('border-color',bordcolore);
                 c.writeAttributeString('tipo',"rettangolo");
                 c.writeAttributeString('x1',cx1 + CanvasX);
                 c.writeAttributeString('y1',cy1 + CanvasY);
                 c.writeAttributeString('x2',cx2 + CanvasX);
                 c.writeAttributeString('y2',cy2 + CanvasY);
                
                 c.writeEndElement();
                 c.writeEndElement();
                 c.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
                 
                  document.getElementById("tempXML").value += (c.flush());
                 document.getElementById("tempxml").value += (c.flush());
                 
       	      }
       	      
     	       }
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("rectangular");
     	 	RectPan.classList.remove("PanOn");
     	   RectPan.classList.add("PanOff");
     	 	RectOn = false;
     	 }
     }
function PentagonOn(e)
    {
    	cx1 =0;
      cy1 =0;
      cx2 =0;
      cy2 =50;
      cx3 =50;
      cy3 =0;
      cx4 =0;
      cy4 =50;
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (PentaOn==false) {

     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    
     	    PentaOn = true;
     	    TrOn =false;
     	    RectOn =false;
     	    CircOn =false;
     	 	 PolyOn = false;
     	 	
     	    shapePrev.classList.add("pentagon");
     	    shapePrev.classList.remove("triangle");
          shapePrev.classList.remove("rectangle"); 
          shapePrev.classList.remove("circle");	
          shapePrev.classList.remove("polyline");
           shapePrev.classList.remove("line");
     	    shapePrev.classList.remove("dot");
          
     	         TrPan.classList.remove("PanOn");
     	       	TrPan.classList.add("PanOff");
     	       		
     	       	RectPan.classList.remove("PanOn");
     	       	RectPan.classList.add("PanOff");   	    
     	    
     	       	PentaPan.classList.remove("PanOff");
     	       	PentaPan.classList.add("PanOn");   	    
     	    	   
     	    	   CirclePan.classList.remove("PanOn");
     	       	CirclePan.classList.add("PanOff");
     	    	
     	    	   PolyPan.classList.remove("PanOn");
     	         PolyPan.classList.add("PanOff");
     	          
     	          LinePan.classList.remove("PanOn");
     	         LinePan.classList.add("PanOff");
     	         
     	         DotPan.classList.remove("PanOn");
     	         DotPan.classList.add("PanOff");
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	       
     	     
     	       window.onclick = function WritePentaPos(e)
     	        {
     	        	  
     	          if ( PentaOn == true) {
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	            x1 =document.forms["pentaPan"]["x1"].value;
                  y1 =document.forms["pentaPan"]["y1"].value;
                  x2 =document.forms["pentaPan"]["x2"].value;
                  y2 =document.forms["pentaPan"]["y2"].value;
                  x3 =document.forms["pentaPan"]["x3"].value;
                  y3 =document.forms["pentaPan"]["y3"].value;
                  x4 =document.forms["pentaPan"]["x4"].value;
                  y4 =document.forms["pentaPan"]["y4"].value;
                  x5 =document.forms["pentaPan"]["x5"].value;
                  y5 =document.forms["pentaPan"]["y5"].value;
                  
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
                  cx3 =Number(x3);
                  cy3 =Number(y3);
                  cx4 =Number(x4);
                  cy4 =Number(y4);
                  cx5 =Number(x5);
                  cy5 =Number(y5);
                  
                 
     	           var c = new  XMLWriter();
     	         //  if (document.getElementById("tempXML").value == null) {
                 c.writeStartDocument();
             // }
                 c.writeStartElement("layers","");
                 c.writeStartElement('layer',"");
                 c.writeAttributeString('color',colore);
                 c.writeAttributeString('border-color',bordcolore);
                 c.writeAttributeString('tipo',"pentagono");
                 c.writeAttributeString('x1',cx1 + CanvasX);
                 c.writeAttributeString('y1',cy1 + CanvasY);
                 c.writeAttributeString('x2',cx2 + CanvasX);
                 c.writeAttributeString('y2',cy2 + CanvasY);
                 c.writeAttributeString('x3',cx3 + CanvasX);
                 c.writeAttributeString('y3',cy3 + CanvasY);
                 c.writeAttributeString('x4',cx4 + CanvasX);
                 c.writeAttributeString('y4',cy4 + CanvasY);
                 c.writeAttributeString('x5',cx5 + CanvasX);
                 c.writeAttributeString('y5',cy5 + CanvasY);
                 c.writeEndElement();
                 c.writeEndElement();
                 c.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
                 
                  document.getElementById("tempXML").value += (c.flush());
                 document.getElementById("tempxml").value += (c.flush());
       	      }
       	      
     	       }
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("pentagon");
     	 	PentaPan.classList.remove("PanOn");
     	   PentaPan.classList.add("PanOff");
     	 	PentaOn = false;
     	 }
     }
function CircleOn(e)
    {
    	cx1 =0;
      cy1 =0;
      cx2 =0;
      cy2 =50;
      cx3 =50;
      cy3 =0;
      cx4 =0;
      cy4 =50;
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (CircOn==false) {

     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    
     	    PentaOn = false;
     	    TrOn =false;
     	    RectOn =false;
     	    CircOn =true;
     	    PolyOn = false;
     	     DotOn = false;
     	    LineOn = false;
     	    	
     	 	
     	 	
     	    shapePrev.classList.add("circle");
     	    shapePrev.classList.remove("triangle");
          shapePrev.classList.remove("rectangle"); 
          shapePrev.classList.remove("pentagon");	
          shapePrev.classList.remove("polyline");
           shapePrev.classList.remove("line");
     	    shapePrev.classList.remove("dot");
          
     	         TrPan.classList.remove("PanOn");
     	       	TrPan.classList.add("PanOff");
     	       		
     	       	RectPan.classList.remove("PanOn");
     	       	RectPan.classList.add("PanOff");   	    
     	    
     	       	PentaPan.classList.add("PanOff");
     	       	PentaPan.classList.remove("PanOn");   	    
     	    
     	         CirclePan.classList.remove("PanOff");
     	       	CirclePan.classList.add("PanOn"); 
     	       	
     	       	PolyPan.classList.remove("PanOn");
     	         PolyPan.classList.add("PanOff");
     	       	
     	       	 LinePan.classList.remove("PanOn");
     	         LinePan.classList.add("PanOff");
     	         
     	         DotPan.classList.remove("PanOn");
     	         DotPan.classList.add("PanOff");
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	       
     	     
     	       window.onclick = function WriteCirclePos(e)
     	        {
     	        	  
     	          if ( CircOn == true) {
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	            x1 =document.forms["circlePan"]["x1"].value;
                  y1 =document.forms["circlePan"]["y1"].value;
                  x2 =document.forms["circlePan"]["x2"].value;
                  y2 =document.forms["circlePan"]["y2"].value;
                 
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
                 
                  
                 
     	           var c = new  XMLWriter();
     	         //  if (document.getElementById("tempXML").value == null) {
                 c.writeStartDocument();
             // }
                 c.writeStartElement("layers","");
                 c.writeStartElement('layer',"");
                 c.writeAttributeString('color',colore);
                 c.writeAttributeString('border-color',bordcolore);
                 c.writeAttributeString('tipo',"ellisse");
                 c.writeAttributeString('x1',cx1 + CanvasX);
                 c.writeAttributeString('y1',cy1 + CanvasY);
                 c.writeAttributeString('x2',cx2 + CanvasX);
                 c.writeAttributeString('y2',cy2 + CanvasY);
                 
                 c.writeEndElement();
                 c.writeEndElement();
                 c.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
                 
                  document.getElementById("tempXML").value += (c.flush());
                 document.getElementById("tempxml").value += (c.flush());
       	      }
       	      
     	       }
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("circle");
     	 	CirclePan.classList.remove("PanOn");
     	   CirclePan.classList.add("PanOff");
     	 	CircOn = false;
     	 }
     }
function PolylineOn(e)
    {
    	cx1 =0;
      cy1 =0;
      cx2 =0;
      cy2 =50;
      cx3 =50;
      cy3 =0;
      cx4 =0;
      cy4 =50;
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (PolyOn==false) {

     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	     
     	     PolyOn = true;
     	    PentaOn = false;
     	    TrOn =false;
     	    RectOn =false;
     	    CircOn =false;

     	     DotOn = false;
     	    LineOn = false;
     	    
     	    shapePrev.classList.add("polyline");
     	    shapePrev.classList.remove("triangle");
          shapePrev.classList.remove("rectangle"); 
          shapePrev.classList.remove("pentagon");
          shapePrev.classList.remove("circle");	
           shapePrev.classList.remove("line");
     	    shapePrev.classList.remove("dot");	
          
     	         TrPan.classList.remove("PanOn");
     	       	TrPan.classList.add("PanOff");
     	       		
     	       	RectPan.classList.remove("PanOn");
     	       	RectPan.classList.add("PanOff");   	    
     	    
     	       	PentaPan.classList.add("PanOff");
     	       	PentaPan.classList.remove("PanOn");   	    
     	    
     	         CirclePan.classList.remove("PanOn");
     	       	CirclePan.classList.add("PanOff"); 
     	       	
     	       	PolyPan.classList.remove("PanOff");
     	       	PolyPan.classList.add("PanOn"); 
     	       	
     	       	 LinePan.classList.remove("PanOn");
     	         LinePan.classList.add("PanOff");
     	         
     	         DotPan.classList.remove("PanOn");
     	         DotPan.classList.add("PanOff");
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	       
     	     
     	       window.onclick = function WriteCirclePos(e)
     	        {
     	        	  
     	          if ( PolyOn == true) {
     	          	
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	            x1 =document.forms["polyPan"]["x1"].value;
                  y1 =document.forms["polyPan"]["y1"].value;
                  x2 =document.forms["polyPan"]["x2"].value;
                  y2 =document.forms["polyPan"]["y2"].value;
                  x3 =document.forms["polyPan"]["x3"].value;
                  y3 =document.forms["polyPan"]["y3"].value;
                  x4 =document.forms["polyPan"]["x4"].value;
                  y4 =document.forms["polyPan"]["y4"].value;
                  x5 =document.forms["polyPan"]["x5"].value;
                  y5 =document.forms["polyPan"]["y5"].value;
                  
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
                  cx3 =Number(x3);
                  cy3 =Number(y3);
                  cx4 =Number(x4);
                  cy4 =Number(y4);
                  cx5 =Number(x5);
                  cy5 =Number(y5);
                 
                  
                 
     	           var c = new  XMLWriter();
     	         //  if (document.getElementById("tempXML").value == null) {
                 c.writeStartDocument();
             // }
                 c.writeStartElement("layers","");
                 c.writeStartElement('layer',"");
                 c.writeAttributeString('color',colore);
                 c.writeAttributeString('border-color',bordcolore);
                 c.writeAttributeString('tipo',"spezzata");
                 c.writeAttributeString('x1',cx1 + CanvasX);
                 c.writeAttributeString('y1',cy1 + CanvasY);
                 c.writeAttributeString('x2',cx2 + CanvasX);
                 c.writeAttributeString('y2',cy2 + CanvasY);
                 c.writeAttributeString('x3',cx3 + CanvasX);
                 c.writeAttributeString('y3',cy3 + CanvasY);
                 c.writeAttributeString('x4',cx4 + CanvasX);
                 c.writeAttributeString('y4',cy4 + CanvasY);
                 c.writeAttributeString('x5',cx5 + CanvasX);
                 c.writeAttributeString('y5',cy5 + CanvasY);
                 c.writeEndElement();
                 c.writeEndElement();
                 c.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
                 
                  document.getElementById("tempXML").value += (c.flush());
                 document.getElementById("tempxml").value += (c.flush());
       	      }
       	      
     	       }
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("polyline");
     	 	PolyPan.classList.remove("PanOn");
     	   PolyPan.classList.add("PanOff");
     	 	PolyOn = false;
     	 }
     }
     
function lineOn(e)
    {
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (LiOn==false) {
     	 	
     	    shapePrev.classList.add("line");
     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    //
     	    LiOn = true;
     	    DotOn = false;
     	    TrOn = false;
     	    RectOn = false;
     	    PentaOn = false;
     	    CircOn =false;
     	 	 PolyOn = false;
     	    //
     	    shapePrev.classList.remove("triangle");
     	    shapePrev.classList.remove("rectangular");
     	    shapePrev.classList.remove("pentagon"); 
     	    shapePrev.classList.remove("circle"); 
     	    shapePrev.classList.remove("polyline");
     	    shapePrev.classList.remove("dot");
     	         
     	         TrPan.classList.remove("PanOn");
     	         TrPan.classList.add("PanOff");
     	         
     	       	PentaPan.classList.remove("PanOn");
     	       	PentaPan.classList.add("PanOff"); 
     	       	
     	       	RectPan.classList.remove("PanOn");
     	       	RectPan.classList.add("PanOff");
     	       	
     	       	CirclePan.classList.remove("PanOn");
     	       	CirclePan.classList.add("PanOff"); 
     	       	
     	         PolyPan.classList.remove("PanOn");
     	         PolyPan.classList.add("PanOff");
     	         
     	         
     	         LinePan.classList.remove("PanOff");
     	         LinePan.classList.add("PanOn");
     	         
     	         DotPan.classList.remove("PanOn");
     	         DotPan.classList.add("PanOff");
     	         
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	    
     	     
     	       window.onclick = function WriteTrPos(e)
     	        {
     	        	  
     	          if ( LiOn == true) {
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	           	
     	           	/*cx1 =document.forms["trPan"]["x1"].value;
                  cy1 =document.forms["trPan"]["y1"].value;
                  cx2 =document.forms["trPan"]["x2"].value;
                  cy2 =document.forms["trPan"]["y2"].value;
                  cx3 =document.forms["trPan"]['x3'].value;
                  cy3 =document.forms["trPan"]["y3"].value;*/
                  x1 =document.forms["LinePan"]["x1"].value;
                  y1 =document.forms["LinePan"]["y1"].value;
                  x2 =document.forms["LinePan"]["x2"].value;
                  y2 =document.forms["LinePan"]["y2"].value;
                  
                  
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
                  
     	           var v = new  XMLWriter();
                 v.writeStartDocument();
                 v.writeStartElement("layers","");
                 v.writeStartElement('layer',"");
                 v.writeAttributeString('color',colore);
                 v.writeAttributeString('border-color',bordcolore);
                 v.writeAttributeString('tipo',"linea");
                 v.writeAttributeString('x1',cx1 + CanvasX);
                 v.writeAttributeString('y1',cy1 + CanvasY);
                 v.writeAttributeString('x2',cx2 + CanvasX);
                 v.writeAttributeString('y2',cy2 + CanvasY);
                 v.writeEndElement();
                 v.writeEndElement();
                 v.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
                 
                  document.getElementById("tempXML").value += (v.flush());
                 document.getElementById("tempxml").value += (v.flush());
       	      }
       	      
     	       }
     	       
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("line");
     	 	 LiPan.classList.remove("PanOn");
     	    LiPan.classList.add("PanOff");
     	 	LiOn = false;
     	 }
     }
        function DtOn(e)
    {
    	var mousext=document.getElementById("mouseTrackerX").value;
    	var mouseyt= document.getElementById("mouseTrackerY").value;

     	 if (DotOn==false) {
     	 	
     	    shapePrev.classList.add("dot");
     	    shapePrev.style.left = e.clientX;
     	    shapePrev.style.top = e.clientY;
     	    //
     	    LiOn = false;
     	    DotOn = true;
     	    TrOn = false;
     	    RectOn = false;
     	    PentaOn = false;
     	    CircOn =false;
     	 	 PolyOn = false;
     	    //
     	    shapePrev.classList.remove("triangle");
     	    shapePrev.classList.remove("rectangular");
     	    shapePrev.classList.remove("pentagon"); 
     	    shapePrev.classList.remove("circle"); 
     	    shapePrev.classList.remove("polyline");
     	    shapePrev.classList.remove("line");
     	    
     	         
     	         TrPan.classList.remove("PanOn");
     	         TrPan.classList.add("PanOff");
     	       	PentaPan.classList.remove("PanOn");
     	       	PentaPan.classList.add("PanOff"); 
     	       	RectPan.classList.remove("PanOn");
     	       	RectPan.classList.add("PanOff");
     	       	CirclePan.classList.remove("PanOn");
     	       	CirclePan.classList.add("PanOff"); 
     	         PolyPan.classList.remove("PanOn");
     	         PolyPan.classList.add("PanOff");
     	         LinePan.classList.remove("PanOn");
     	         LinePan.classList.add("PanOff");
     	         DotPan.classList.add("PanOn");
     	         DotPan.classList.remove("PanOff");
     	        
     	         
     	    window.onmousemove = function CursorMove(e) {        	    	
     	    	 shapePrev.style.left = e.clientX +20;
     	       shapePrev.style.top = e.clientY +20;
     	    
     	     
     	       window.onclick = function WriteTrPos(e)
     	        {
     	        	  
     	          if ( DotOn == true) {
     	           //layerCount++;
     	          /* //Tipo 2
     	           //those are the plugs where data will be written
     	           var tmparea= document.getElementById("tempXML");
     	           var tmparea2= document.getElementById("tempxml");
     	           //those are the incoming divs// */
     	           
     	           //Tipo1
     	           	
     	           	/*cx1 =document.forms["trPan"]["x1"].value;
                  cy1 =document.forms["trPan"]["y1"].value;
                  cx2 =document.forms["trPan"]["x2"].value;
                  cy2 =document.forms["trPan"]["y2"].value;
                  cx3 =document.forms["trPan"]['x3'].value;
                  cy3 =document.forms["trPan"]["y3"].value;*/
                  x1 =document.forms["DotPan"]["x1"].value;
                  y1 =document.forms["DotPan"]["y1"].value;
                  
                  
                  cx1 =Number(x1);
                  cy1 =Number(y1);
                  cx2 =Number(x2);
                  cy2 =Number(y2);
                  
     	           var v = new  XMLWriter();
                 v.writeStartDocument();
                 v.writeStartElement("layers","");
                 v.writeStartElement('layer',"");
                 v.writeAttributeString('color',colore);
                 v.writeAttributeString('border-color',bordcolore);
                 v.writeAttributeString('tipo',"punto");
                 v.writeAttributeString('x1',cx1 + CanvasX);
                 v.writeAttributeString('y1',cy1 + CanvasY);
                 v.writeAttributeString('x2',cx2 + CanvasX);
                 v.writeAttributeString('y2',cy2 + CanvasY);
                 v.writeEndElement();
                 v.writeEndElement();
                 v.writeEndDocument();
                 //document.getElementById("tempXML").innerHTML = (v.flush());
                 
                  document.getElementById("tempXML").value += (v.flush());
                 document.getElementById("tempxml").value += (v.flush());
       	      }
       	      
     	       }
     	       
     	    }
     	 	
     	 }
     	 else {
     	 	shapePrev.classList.remove("dot");
     	 	 DotPan.classList.remove("PanOn");
     	    DotPan.classList.add("PanOff");
     	 	DotOn = false;
     	 }
     }
 //menu    
     var menu = document.getElementById("menu");
     var User = document.getElementById("usr");
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
     	if (UserInfo == NoUser) {
      window.location.href="../../login.html";
      //window.location.href='https://www.google.com/chrome/browser/index.html';
       }
       else if(UserInfo != NoUser) 
       {
       	
       	alert("Already Logged In!");
       	}
      }
       function homeReq()
     {
     
      window.location.href="../../index.html";
      //window.location.href='https://www.google.com/chrome/browser/index.html';
       }
       
    //BUTTONS 
  
   
    