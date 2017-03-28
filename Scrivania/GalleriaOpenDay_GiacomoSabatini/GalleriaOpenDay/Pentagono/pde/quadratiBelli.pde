float y = 5;
float x = 10;
float dx ;
float dy;
void setup() {
  size(200, 200);
  stroke (100);
  //no loop
for (int i=0 ; i<=1000; i++){
  
  x = random (70);
  y = random (100);
  dx = random (50);
  dy = random (105);
  rect (x, y, x+dx, y+dy);
  fill(random (255),random (255),random (255));
  
};
}


void mousePressed() 
{ noLoop();}