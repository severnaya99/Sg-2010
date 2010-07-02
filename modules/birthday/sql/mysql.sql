# 
# Structure de la table `users_birthday` 
# 
CREATE TABLE users_birthday ( 
	uid int(11) NOT NULL default '0', 
	jour char(2) NOT NULL default '', 
	mois char(2) NOT NULL default '', 
	annee varchar(4) NOT NULL default '', 
	PRIMARY KEY `uid`(`uid`) 
	) TYPE=MyISAM; 


