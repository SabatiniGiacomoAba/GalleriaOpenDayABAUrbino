size(800,600);
smooth();
background(0);
for (int i = 0; i < 100; i+=1) {
  float x=random(1, width);
  float y=random(1, height);
  float l=random(1, 100);
  float c=random(0, 255);
   
  ellipse(x, y, l, l);
}
for (int i = 0; i < 10000; i+=1) {
  float f = random(0, width);
  float k = random(0, height);
  stroke(255);
  fill(255);
  point(f, k);
   
}

