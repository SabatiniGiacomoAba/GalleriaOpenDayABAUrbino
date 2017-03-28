int posizioney=0;
int passo=1;

void setup(){
  size (300,400);
  



}

void draw(){
  background(0,0,255);
  noStroke();
  ellipse(120,posizioney,50,50);
  posizioney+=passo;
  if(posizioney>height){
  passo=-1;
  }else if(posizioney<0){
  passo=1;
  }
  



}