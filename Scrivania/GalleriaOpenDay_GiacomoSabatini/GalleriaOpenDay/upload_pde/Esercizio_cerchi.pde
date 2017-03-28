int x,y,d;

void setup() {
size(800,800);
background(255);
}

void mouseClicked() {
x= mouseX;
y= mouseY;
}

void draw() {
for(d=0; d<250; d++) {
if(x!=0 && y!=0) {
if(d%17==0){
  noFill();
  stroke(0);
  strokeWeight(1);
  ellipse(x, y, d, d);
}
}
}
}