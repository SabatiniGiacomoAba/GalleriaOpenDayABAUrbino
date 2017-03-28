int xc ;
int yc ;
int mr ;
int dr = 10 ;

void setup() {
  size(640, 640);
  background(255);
  noFill();
  //noStroke();
  stroke(0);
  xc = 320;
  yc = 320;
  mr = 300;
  frameRate(1200);
  
}

void drawCerchi(int ixc, int iyc, int mr){

  int i = dr ;
  //println("Qui!");
  if ( mr <= 600 ) {
    while ( i < mr ) {
      ellipse(ixc, iyc, i , i);
      i += dr ;
    }
  }
  //mr = 0;
    
}


void draw(){
  
  //drawCerchi(xc,yc,mr);
  //mr += dr;
  //xc+=dr;
  //yc+=dr;
   
}


void mouseClicked() {
   println(" mouse x " + xc + " mouse y " + yc);
   xc = mouseX;
   yc = mouseY;
   drawCerchi(xc,yc,mr);
}