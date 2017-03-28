//var loadscreen = document.getElementById("loading");
var pincopallo = document.getElementById("loading");
document.getElementById("test");
window.addEventListener("load",function () 
   {
	AnimateLoading1();
   });
   function AnimateLoading1() {
   	var username = document.getElementById("usr").innerHTML;
   	if(username != "NoUser"){
   	   document.getElementById("txt3").innerHTML = "Welcome, "+ username +".";
   	}
   	else {
   		 document.getElementById("txt3").innerHTML = "No User found. <br> Please login to use ProcEditor!";
   		 document.getElementById("txt4").style.marginTop = "7%";
   	}
   	 setTimeout(AnimateLoading2,2500);
   	}
	function AnimateLoading2() {
		var loadscreen = document.getElementById("loading");
       loadscreen.classList.add("closing");		
		  setTimeout(Destroy,2500);
		}
	
	function Destroy() {
			var loadscreen = document.getElementById("loading");
		document.body.removeChild(loadscreen);
	}