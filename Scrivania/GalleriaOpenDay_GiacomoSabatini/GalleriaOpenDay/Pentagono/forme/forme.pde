import java.io.File;
XML xml;
File dir_forme_geometriche;
File[] files_forme_geometriche;
int x1, y1, x2, y2, x3, y3 ; 
//
void setup() {
        size(640, 360);
        background(250);    
        dir_forme_geometriche = new File("/var/www/html/Galleria1/forme_geometriche/");
        if ( dir_forme_geometriche != null)
           files_forme_geometriche = dir_forme_geometriche.listFiles();
        if ( (files_forme_geometriche != null) || (files_forme_geometriche.length == 0) ) {
           for (int j = 0; j <= files_forme_geometriche.length - 1; j++) {
              xml = loadXML(files_forme_geometriche[j].getAbsolutePath());
              println(" File in analisi "+ files_forme_geometriche[j].getAbsolutePath() +"\n");
	      XML[] children = xml.getChildren("forma_geometrica");
              //
	      for (int i = 0; i < children.length; i++) {
                //
		String id = children[i].getString("tipo");
                String user = children[i].getString("utente");
		String colors = children[i].getString("colore");
                if ( colors != ""){
                    colors = "FF" + colors.substring(1);
                }
                if ( children[i].getString("x1") != "" )
                   x1 = children[i].getInt("x1");
                else
                   x1 = 0;
                if ( children[i].getString("y1") != "" )
                   y1 = children[i].getInt("y1");
                else
                   y1 = 0;
                if ( children[i].getString("x2") != "" )
                   x2 = children[i].getInt("x2");
                else
                   x2 = 0;
                if ( children[i].getString("y2") != "" )
                   y2 = children[i].getInt("y2");
                else
                   y2 = 0;
                 if ( children[i].getString("x3") != "" )
                   x3 = children[i].getInt("x3");
                else
                   x3 = 0;
                if ( children[i].getString("y3") != "" )
                   y3 = children[i].getInt("y3");
                else
                   y3 = 0;
		String name = children[i].getContent();
		println(id + ", " + user + ", " + colors + ", " + x1 + ", " + y1 + ", " + x2 + ", " + y2 +", " + name);
                println( " red " + red(color(unhex(colors))) );
                println( " blue " + blue(color(unhex(colors))) );
                println( " green " + green(color(unhex(colors))) );
                stroke(red(color(unhex(colors))),blue(color(unhex(colors))),green(color(unhex(colors))));
                if ( id.equals("punto") ) {
			//point(x1, y1);
                        ellipse(x1, y1,5,5);
		} else if ( id.equals("linea") ) {
                        line(x1, y1,x2,y2);
                } else if ( id.equals("rettangolo") ) {
                        rect(x1, y1,x2,y2);
                } else if ( id.equals("ellisse") ) {
                        ellipse(x1, y1,x2,y2);
                } else if ( id.equals("triangolo") ) {
                         //rect(x1, y1,x2,y2);
                         //line(x1, y1,x2,y2);
                         //line(x2, y2,x3,y3);
                         line(x3, y3,x1,y1);
                } else 
			println("Errore nella scelta del tipo!");
	    }
        }
      }
}

