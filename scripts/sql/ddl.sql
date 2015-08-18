CREATE DATABASE zendalbum;
USE zendalbum;

CREATE TABLE album (
   id int(11) NOT NULL auto_increment,
   artist varchar(100) NOT NULL,
   title varchar(100) NOT NULL,
   PRIMARY KEY (id)
 );

INSERT INTO album (artist, title)
    VALUES  ('The  Military  Wives',  'In  My  Dreams'),
            ('Adele',  '21'),
            ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)'),
            ('Lana  Del  Rey',  'Born  To  Die'),
            ('Gotye',  'Making  Mirrors');