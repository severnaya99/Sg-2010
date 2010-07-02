CREATE TABLE form_id (
  id_form smallint(5) NOT NULL auto_increment,
  desc_form varchar(60) NOT NULL default '',
  admin varchar(5) default NULL,
  groupe varchar(255) default NULL,
  email varchar(255) default NULL,
  expe varchar(5) default NULL,
  url varchar(255) default NULL,
  help text default NULL,
  send varchar(255) default NULL,
  msend varchar(5) default NULL,
  msub varchar(5) default NULL,
  mip varchar(5) default NULL,
  mnav varchar(5) default NULL,
  cod varchar(255) default NULL,
  save varchar(5) default NULL,
  onlyone varchar(5) default NULL,
  image varchar(255) default NULL,
  nbjours int(10) default NULL,
  afftit varchar(5) default NULL,
  affimg varchar(5) default NULL,
  ordre varchar(50) default NULL,
  qcm varchar(5) NOT NULL default '',
  affres varchar(5) default NULL,
  affrep varchar(5) default NULL,
  PRIMARY KEY  (`id_form`)
) TYPE=MyISAM;

INSERT INTO form_id VALUES (1,'Exemple de formulaire','', '0','me@mydomain.com','','http://localhost/modules/formulaire/formulaire.php?id=1','formulaire de demo', 'envoyer', '', '', '', '', 'ISO-8859-1','1','0','',0,'1','1','tit','','','');

CREATE TABLE form (
  id_form int(5) NOT NULL default '0',
  ele_id smallint(5) unsigned NOT NULL auto_increment,
  ele_type varchar(10) NOT NULL default '',
  ele_caption varchar(255) NOT NULL default '',
  ele_order smallint(2) NOT NULL default '0',
  ele_req tinyint(1) NOT NULL default '1',
  ele_value text NOT NULL,
  ele_display tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`ele_id`),
  KEY `ele_display` (`ele_display`),
  KEY `ele_order` (`ele_order`)
) TYPE=MyISAM;

INSERT INTO form VALUES (1,1,'sep','{null}',0,0,'a:3:{i:0;s:72:\"<font color=#e00000><h5><center>Titre du formulaire</center></h5></font>\";i:1;i:5;i:2;i:35;}',1);
INSERT INTO form VALUES (1,2,'textarea','Text area',1,0,'a:3:{i:0;s:25:\"Voici un texte quelconque\";i:1;i:2;i:2;i:35;}',1);
INSERT INTO form VALUES (1,3,'date','date de création',2,0,'a:1:{i:0;s:10:\"2004-05-04\";}',1);
INSERT INTO form VALUES (1,4,'text','Text box : nom de l\'utilisateur',3,0,'a:3:{i:0;i:30;i:1;i:255;i:2;s:7:\"{UNAME}\";}',1);
INSERT INTO form VALUES (1,5,'text','Text box : adresse e-mail de l\'utilisateur',4,0,'a:3:{i:0;i:30;i:1;i:255;i:2;s:8:\"{EMAIL} \";}',1);
INSERT INTO form VALUES (1,6,'sep','{null}',5,0,'a:3:{i:0;s:84:\"<font color=#4A766E><h5><center>Les informations commencent ici</center></h5></font>\";i:1;i:5;i:2;i:35;}',1);
INSERT INTO form VALUES (1,7,'radio','Radio button : un seul bouton peut être coché',6,0,'a:2:{s:14:\"premier bouton\";i:0;s:13:\"second bouton\";i:1;}',1);
INSERT INTO form VALUES (1,8,'checkbox','Check boxes',8,0,'a:5:{s:11:\"1ère option\";i:1;s:11:\"2ème option\";i:1;s:11:\"3ème option\";i:1;s:11:\"4ème option\";i:1;s:11:\"5ème option\";i:1;}',1);
INSERT INTO form VALUES (1,9,'areamodif','Texte area non modifiable',7,0,'a:3:{i:0;s:107:\"Le champ suivant permet de créer autant d\'options souhaitées. Elles sont ensuite à cocher par l\'utilisateur\";i:1;i:5;i:2;i:35;}',1);
INSERT INTO form VALUES (1,10,'upload','Fichier joint',9,0,'a:3:{i:0;N;i:1;d:204800;i:2;a:6:{i:0;a:4:{i:1;s:3:"pdf";s:5:"value";s:3:"pdf";i:0;i:0;s:3:"key";i:0;}i:1;a:4:{i:1;s:3:"doc";s:5:"value";s:3:"doc";i:0;i:1;s:3:"key";i:1;}i:2;a:4:{i:1;s:3:"txt";s:5:"value";s:3:"txt";i:0;i:2;s:3:"key";i:2;}i:3;a:4:{i:1;s:3:"gif";s:5:"value";s:3:"gif";i:0;i:3;s:3:"key";i:3;}i:4;a:4:{i:1;s:4:"mpeg";s:5:"value";s:4:"mpeg";i:0;i:4;s:3:"key";i:4;}i:5;a:4:{i:1;s:3:"jpg";s:5:"value";s:3:"jpg";i:0;i:5;s:3:"key";i:5;}}}',1);
INSERT INTO form VALUES (1,11,'select','Select boxes',10,0,'a:3:{i:0;i:1;i:1;i:0;i:2;a:3:{s:8:\"Option 1\";i:1;s:8:\"Option 2\";i:0;s:8:\"Option 3\";i:0;}}',1);
INSERT INTO form VALUES (1,12,'yn','Simple oui/ non radio buttons',11,0,'a:2:{s:4:\"_YES\";i:1;s:3:\"_NO\";i:0;}',1);


CREATE TABLE form_menu (
  menuid int(4) unsigned NOT NULL auto_increment,
  position int(4) unsigned NOT NULL,
  indent int(2) unsigned NOT NULL default '0',
  itemname varchar(60) NOT NULL default '',
  margintop varchar(12) NOT NULL default '0',
  marginbottom varchar(12) NOT NULL default '0',
  itemurl varchar(255) NOT NULL default '',
  bold tinyint(1) NOT NULL default '0',
  status tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (menuid),
  KEY idxmymenustatus (status)
) TYPE=MyISAM;

INSERT INTO form_menu VALUES (1,0,0,'Exemple d`utilisation d`un formulaire','0','0','http://localhost/modules/formulaire/formulaire.php?id=1',0,1);

CREATE TABLE form_form (
  id_form int(5) NOT NULL default '0',
  id_req smallint(5) ,
  ele_id smallint(5) unsigned NOT NULL auto_increment,
  ele_type varchar(10) NOT NULL default '',
  ele_caption varchar(255) NOT NULL default '',
  ele_value text NOT NULL,
  date Date NOT NULL default '2004-06-03',
  uid int(10) default '0',
  ip varchar(50) default NULL,
  time timestamp(8) NOT NULL,
  rep text,
  nbrep int(5) default NULL,
  nbtot int(5) default NULL,
  pos int(10) default NULL,
  PRIMARY KEY  (`ele_id`),
  KEY `ele_id` (`ele_id`)
) TYPE=MyISAM;