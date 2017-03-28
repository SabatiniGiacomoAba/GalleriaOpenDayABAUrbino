float dy;
float dx;
float x = 5;
float y = 10;
void setup() {
  size(200,200);
  stroke(100);
  //noLoop();
  for (int i = 0; i < 100; i++){
       x = random(50);
       y = random(50);
       dx = random(50);
       dy = random(50);
       rect (x,y,x+dx,y+dy);
       fill(random(255));
  }
      
}

  void mousePressed() {
    //noLoop();
  }