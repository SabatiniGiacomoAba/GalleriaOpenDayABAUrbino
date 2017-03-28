//Layer Display  	
      window.addEventListener("load", function LayerCreation () {
    	 var fs = document.getElementById("tempxml").value;
    	 
    		var lines = fs.split('\n');
    		var lineslen = lines.length;
    		
    		document.getElementById("test").innerText = lines[0];
    		if (lineslen > 1) {
    			var i = 0;
    			var f = 1;
    			
    			for (i = 2; i < (lineslen-1); i += 3) {
    			/* if (lines[i] === " " ) {
    			 lines.splice(i,3);
    			
    			 }
    			 else {*/
    			 	if (lines[i] != " " ) {
    			 		var lineshaper = lines[i].split(" ");
    			 		/*var colorsDiv = lineshaper[1].split("=");
    			 		var colorsShape = colorsDiv[1];
    			 		var colortemp1 = colorsShape[0] == " ";
    			 		var colorVal = colortemp1[2] == " ";*/
    			 		
    			 		var attributeDiv = lineshaper[3].split("=");
    			 		var attributeShape = attributeDiv[1];
    			 		
    			 	//	document.getElementById("test").innerText = colorsVal;
    			 		
    		/*	 		 document.getElementById("layersPan").innerHTML += "<button id=\"select-"+ f +"\" onclick=\"selectLayer(this.id)\" class=\"layerbtn\" style=\"float:left;\">S</button>";
    			  document.getElementById("layersPan").innerHTML += "<div id=\"layerdisp-"+ f +"\" type=\"text\" class=\"layerDisp\" style=\"float:left;\"> L" + f +"_"+ attributeShape +"</div>";
    			 document.getElementById("layersPan").innerHTML += "<button id=\"rm-"+ f +"\" onclick=\"rmLayer(this.id)\" class=\"layerbtn\" style=\"float:left;\">-</button>";
    			 document.getElementById("layersPan").innerHTML += "<button id=\"up-"+ f +"\" onclick=\"mvLayer(this.id)\" class=\"layerbtn\" style=\"float:left;\">&uarr;</button>";
              document.getElementById("layersPan").innerHTML += "<input id=\"counter-"+ f +"\" type=\"text\" class=\"layerbtn\" value=\"0\"/ style=\"float:left;\">"
    			  document.getElementById("layersPan").innerHTML += "<button id=\"dwn-"+ f +"\" onclick=\"mvLayer(this.id)\" class=\"layerbtn\" style=\"float:left;\">&darr;</button><br>"; */
    				 document.getElementById("layersPan").innerHTML += "<button id=\"select-"+ f +"\" onclick=\"selectLayer(this.id)\" class=\"layerbtn\" style=\"display:inline;\">S</button>";
    			  document.getElementById("layersPan").innerHTML += "<div id=\"layerdisp-"+ f +"\" type=\"text\" class=\"layerDisp\" style=\"display:inline;\"> L" + f +"_"+ attributeShape +"</div>";
    			 document.getElementById("layersPan").innerHTML += "<button id=\"rm-"+ f +"\" onclick=\"rmLayer(this.id)\" class=\"layerbtn\" style=\"display:inline;\">-</button>";
    			 document.getElementById("layersPan").innerHTML += "<button id=\"up-"+ f +"\" onclick=\"mvLayer(this.id)\" class=\"layerbtn\" style=\"display:inline;\">&uarr;</button>";
              document.getElementById("layersPan").innerHTML += "<input id=\"counter-"+ f +"\" type=\"text\" class=\"layerbtn\" value=\"0\"/ style=\"display:inline;\">"
    			  document.getElementById("layersPan").innerHTML += "<button id=\"dwn-"+ f +"\" onclick=\"mvLayer(this.id)\" class=\"layerbtn\" style=\"display:inline;\">&darr;</button><br>"; 
    		    }
    		    f++;
    			  //document.getElementById("layersPan").innerHTML += "<button onclick=\"rnmLayer()\" class=\"layerbtn\">&#8475</button><br>";
    			//}
    			
    			}
             
    			/*for (i = 3; i < (lineslen-1); i += 3) {
    				
    				//document.getElementById("layersPan").innerHTML = "<input id=\"layer"+i+"\" type=\"text\" value=\"Layer "+(i-2)+"\" style=\"float:right;\"> <br>";
    				document.getElementById("layersPan").innerText = "ciao Mondo";
			      }*/
           }
           });
           function rmLayer(myId)
           {
           	   var fs = document.getElementById("tempxml").value;
           	   var lines = fs.split('\n');
    		      document.getElementById("test").innerText = lines;
               var layerId =  myId;
               var layerObj = layerId.split("-");
               var num = layerObj[1];
               //document.getElementById("test").innerHTML = "layerdisp-" + num;
               var layerDisplayedId = "".concat("layerdisp-", num);
                
               var layerDisplayed = document.getElementById("layerdisp-"+num);
               var selector = document.getElementById("select-"+num)
               var removing = document.getElementById("rm-"+num);
               var up = document.getElementById("up-"+num);
               var dwn = document.getElementById("dwn-"+num);
               var f = document.getElementById("counter-"+num);
               document.getElementById("layersPan").removeChild(layerDisplayed);
               document.getElementById("layersPan").removeChild(removing);
               document.getElementById("layersPan").removeChild(up);
               document.getElementById("layersPan").removeChild(dwn);
               document.getElementById("layersPan").removeChild(f);
                document.getElementById("layersPan").removeChild(selector);
               lines[(num-1)+(num*2)] = " "; 
               
               var rejoined = lines.join("\n");
    	         document.getElementById("tempxml").value = rejoined;           
           }
           
            function mvLayer(myId)
           {
           	   
           	   var fs = document.getElementById("tempxml").value;
           	   var lines = fs.split('\n');
           	   var lineslen = lines.length;
    		      
               var layerId =  myId;
               var layerObj = layerId.split("-");
               var num = layerObj[1];
            /*   //document.getElementById("test").innerHTML = "layerdisp-" + num;
               var layerDisplayedId = "".concat("layerdisp-", num);
                
               var layerDisplayed = document.getElementById("layerdisp-"+num);
            
               var removing = document.getElementById("rm-"+num);
               var moving = document.getElementById("mv-"+num);*/
               var i = (num-1)+(num*2);
               var c = 3;
               var f = document.getElementById("counter-"+num).value;
               var up = document.getElementById("up-"+num);
               var dwn = document.getElementById("dwn-"+num);
                  if (myId == "up-"+num) {
               	   f= f - c;
               	   
               	}
               	else if(myId == "dwn-"+num) {
               		f = +f + c;
               		
               	}
               	document.getElementById("test").innerHTML = f;
               	document.getElementById("counter-"+num).value = f;
               	var swapArrayElements = function(arr, indexA, indexB)
               	{
                      var temp = arr[indexA];
                      arr[indexA] = arr[indexB];
                      arr[indexB] = temp;               	
               	}
               	if ((i+f) > 1) {
                   if(((i+f)) < lineslen)
                {
                
                  	swapArrayElements(lines,i,(i+f));
                  
                    }
                }
               var rejoined = lines.join("\n");
    	         document.getElementById("tempxml").value = rejoined; 
    	                 
           }
           
             function selectLayer(myId)
           {
           	   
           	   var fs = document.getElementById("tempxml").value;
           	   var lines = fs.split('\n');
           	   var lineslen = lines.length;
           	   
           	    var layerId = myId;
               var layerObj = layerId.split("-");
               var num = layerObj[1];
           	    var i = (num-1)+(num*2);
                var c = 3;
                 var linesArr = lines[i].split(" ");
                 var ColorAttr = linesArr[1].split("=");
                
                 
           	  var ColorRough1 = ColorAttr[1];
           	  
           	  
           	  var ColorCleaned = ColorRough1.substring(1,(ColorRough1.length-1));
           	 
            /*   //document.getElementById("test").innerHTML = "layerdisp-" + num;
               var layerDisplayedId = "".concat("layerdisp-", num);
                
               var layerDisplayed = document.getElementById("layerdisp-"+num);
            
               var removing = document.getElementById("rm-"+num);
               var moving = document.getElementById("mv-"+num);*/
              
             
               	document.getElementById("test").innerText = ColorCleaned;
               	
    
    	                 
           }