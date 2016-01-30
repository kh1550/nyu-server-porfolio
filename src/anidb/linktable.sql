CREATE TABLE link ( name VARCHAR(30), wiki VARCHAR(200), image VARCHAR(100), PRIMARY KEY(name), FOREIGN KEY(name) REFERENCES anime.name);
INSERT INTO link ( name, wiki, image ) VALUES ( 'Kuroko no Basuke', 'http://en.wikipedia.org/wiki/Kuroko%27s_Basketball', 'images/kurobas.jpg' );
INSERT INTO link ( name, wiki, image ) VALUES ( 'Uta no Prince Sama', 'http://en.wikipedia.org/wiki/Uta_no_Prince-sama', 'images/utapri.png' );
INSERT INTO link ( name, wiki, image ) VALUES ( 'Ansatsu Kyoushitsu', 'http://en.wikipedia.org/wiki/Assassination_Classroom', 'images/ansatsu.jpg' );
INSERT INTO link ( name, wiki, image ) VALUES ( 'Owari no Seraph', 'http://en.wikipedia.org/wiki/Seraph_of_the_End', 'images/owari.jpg' );
INSERT INTO link ( name, wiki, image ) VALUES ( 'Kekkai Sensen', 'http://en.wikipedia.org/wiki/Blood_Blockade_Battlefront', 'images/kekkai.jpg' );