import java.io.File;
XML xml;
String dir_forme_geometriche;
String[] log = { "Vuoto"};
//File[] files_forme_geometriche;
float x1, y1, x2, y2, x3, y3, x4, y4 ; 
//
void setup() {
        size(640, 640);
        background(250);    
        dir_forme_geometriche = "../forme_geometriche/";
        String files_forme_geometriche[] = loadStrings("indice_forme.txt");
        for (int j = 2; j <= files_forme_geometriche.length - 1; j++) {
              String str_file_forme_geometriche = dir_forme_geometriche + files_forme_geometriche[j] ;
              xml = loadXML(str_file_forme_geometriche);
              log = append(log , " File in analisi "+ str_file_forme_geometriche);
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
		if ( children[i].getString("x4") != "" )
                   x4 = children[i].getInt("x4");
                else
                   x4 = 0;
                if ( children[i].getString("y4") != "" )
                   y4 = children[i].getInt("y4");
                else
                   y4 = 0;
                String area = children[i].getString("area");                
		String name = children[i].getContent();
		log = append(log, id + ", " + user + ", " + colors + ", " + x1 + ", " + y1 + ", " + x2 + ", " + y2 +", " + name);
                log = append(log, " red " + red(color(unhex(colors))) );
                log = append(log, " blue " + blue(color(unhex(colors))) );
                log = append(log, " green " + green(color(unhex(colors))) );
                smooth();
                int hi = unhex(colors);
                if (area.equals("fill") ){
                    stroke(hi);
                    fill(hi);
                    log = append(log, "Area piena " );
                }else{
                    noFill();
                    log = append(log, "Area bordo " );
                    stroke(hi);
                }   
                if ( id.equals("punto") ) {
			//point(x1, y1);
			ellipse(x1, y1,3,3);
		} else if ( id.equals("linea") ) {
                        line(x1, y1,x2,y2);
                } else if ( id.equals("rettangolo") ) {
                        rect(x1, y1,x2,y2);
                } else if ( id.equals("ellisse") ) {
                        ellipse(x1, y1, x2, y2);
                } else if ( id.equals("triangolo") ) {
                         //
                         //line(x1, y1,x2,y2);
      			 //line(x2, y2,x3,y3);
                         //line(x3, y3,x1,y1);
                         triangle(x1, y1, x2, y2, x3, y3);
                } else if ( id.equals("spezzata") ) {
			 line(x1, y1,x2,y2);
      			 line(x2, y2,x3,y3);
                         line(x3, y3,x4,y4);
                } else 
			log = append(log,"Errore nella scelta del tipo!");
	    }
        }
        saveStrings("log_forme.txt", log);
}

