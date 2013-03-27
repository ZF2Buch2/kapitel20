DROP TABLE IF EXISTS comments;
CREATE TABLE comments (
  id smallint NOT NULL,
  cdate datetime DEFAULT NULL,
  status varchar(8) DEFAULT NULL,
  url varchar(255) DEFAULT NULL,
  email varchar(128) DEFAULT NULL,
  name varchar(64) DEFAULT NULL,
  message text DEFAULT NULL,
  
  CONSTRAINT comments_id PRIMARY KEY(id)
);

INSERT INTO comments VALUES (1,'2012-12-28 18:02:17','new','/about/team','luigi@luigis-pizza.de','Luigi','<p>Ich freue mich, dass ihr alle in unserem Team seid!</p>');
INSERT INTO comments VALUES (2,'2013-01-01 15:55:14','new','/pizza/pizza-mexicana','horst@hat-hunger.de','Horst','<p>Liefert ihr auch heute an Neujahr?</p>');
INSERT INTO comments VALUES (3,'2013-01-01 16:06:47','new','/pizza/pizza-mexicana','valentina@luigis-pizza.de','Valentina','<p>Ja klar, Horst, ruf einfach an und gib deine Bestellung auf.</p><p>Alessandro und ich warten schon!</p><p>:-x</p>');
INSERT INTO comments VALUES (4,'2013-01-01 16:08:13','new','/pizza/pizza-mexicana','alessandro@luigis-pizza.de','Alessandro','<p>Ja, genau Horst. Hau rein, Salami und Schinken sind wieder ganz frisch reingekommen.</p><p>Forza Horst!</p>');
INSERT INTO comments VALUES (5,'2013-01-01 16:15:46','new','/pizza/pizza-mexicana','horst@hat-hunger.de','Horst','<p>Danke, geht gleich los!</p>');
INSERT INTO comments VALUES (6,'2013-01-04 03:47:01','new','/pizza/pizza-mexicana','buy@pizza-online.com','Buy Pizza Online','<p>Please look at <a href="http://mario.pizza-online.com/sale">http://mario.pizza-online.com/sale</a> and buy your pizza online!</p>');
INSERT INTO comments VALUES (7,'2013-01-04 03:49:42','new','/about/team','francesco@pizza-online.com','Francesco Pizza Online','<p>Please look at <a href="http://francesco.pizza-online.com/sale">http://mario.pizza-online.com/sale</a> and buy your pizza online!</p>');
