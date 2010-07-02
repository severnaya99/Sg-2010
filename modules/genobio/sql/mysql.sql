CREATE TABLE `genobio_categories` (                         
	`category_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,  
	`category_name` VARCHAR(128) DEFAULT NULL,               
	PRIMARY KEY (`category_id`)                              
) ENGINE=MYISAM ;

CREATE TABLE `genobio_member` (                           
	 `member_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,  
	 `category_id` INT(10) UNSIGNED DEFAULT NULL,           
	 `uid` INT(12) DEFAULT '0',    
	 `domain` VARCHAR(255) DEFAULT NULL,
	 `domains` MEDIUMTEXT,                                  
	 `display_name` VARCHAR(64) DEFAULT NULL, 
	 `display_picture` ENUM('baby_photo','midlife_photo','elderly_photo','current_photo') DEFAULT 'current_photo',
	 `member_sex` ENUM('male','female') DEFAULT 'male',
	 PRIMARY KEY (`member_id`)                              
) ENGINE=MYISAM ;

CREATE TABLE `genobio_members_profiles` (                                                 
	`member_id` INT(10) UNSIGNED NOT NULL,                                                 
	`member_father_id` INT(10) UNSIGNED DEFAULT '0',                                       
	`member_mother_id` INT(10) UNSIGNED DEFAULT '0',                                       
	`member_siblings_id` INT(10) UNSIGNED DEFAULT '0',                                     
	`member_partner_id` INT(10) DEFAULT '0',     
	`nickname` VARCHAR(128) DEFAULT NULL, 
	`dob` VARCHAR(10) DEFAULT '0000-00-00',  
	`dod` VARCHAR(10) DEFAULT '0000-00-00',                                                
	`anniversary` VARCHAR(10) DEFAULT '0000-00-00',   	
	`height` VARCHAR(20) DEFAULT '0.0 cm',                                                 
	`weight` VARCHAR(20) DEFAULT '0 Kgs',                                                  
	`colour_hair` VARCHAR(50) DEFAULT 'brown',                                             
	`colour_eyes` VARCHAR(50) DEFAULT 'hazel',                                             
	`baby_photo` VARCHAR(255) DEFAULT '/modules/genobio/images/no-default-picture.png',     
	`midlife_photo` VARCHAR(255) DEFAULT '/modules/genobio/images/no-default-picture.png',  
	`elderly_photo` VARCHAR(255) DEFAULT '/modules/genobio/images/no-default-picture.png',  
	`current_photo` VARCHAR(255) DEFAULT '/modules/genobio/images/no-default-picture.png',  
	`user_quote_id` INT(12) UNSIGNED DEFAULT '0',                                          
	`album_submission_id` INT(12) DEFAULT '0',                                             
	`bio` MEDIUMTEXT,                                                                      
	`history` MEDIUMTEXT,                                                                  
	`education` MEDIUMTEXT,                                                                
	`fellowship` MEDIUMTEXT,                                                               
	`earlyhistory` MEDIUMTEXT,                                                             
	`medical` MEDIUMTEXT,                                                                  
	`achivements` MEDIUMTEXT,                                                              
	`contributations` MEDIUMTEXT,                                                          
	`awards` MEDIUMTEXT,                                                                   
	`media` MEDIUMTEXT,                                                                    
	`publications` MEDIUMTEXT,                                                             
	`jobs` MEDIUMTEXT,                                                                     
	`spirtual` MEDIUMTEXT,                                                                 
	`hates` MEDIUMTEXT,                                                                    
	`likes` MEDIUMTEXT,                                                                    
	`music` MEDIUMTEXT,                                                                    
	`thearts` MEDIUMTEXT,                                                                   
	`other` MEDIUMTEXT,                                                                    
	KEY `family_key` (`member_father_id`,`member_mother_id`,`member_siblings_id`)          
 ) ENGINE=MYISAM;

 CREATE TABLE `genobio_sibblings` (                          
	`sibblings_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,  
	`members_group` VARCHAR(255) DEFAULT NULL,         
	`nickname` VARCHAR(255) DEFAULT NULL,                    
	`bio` MEDIUMTEXT,                                        
	`history` MEDIUMTEXT,                                    
	`activities` MEDIUMTEXT,                                 
	`toys` MEDIUMTEXT,      	
	PRIMARY KEY (`sibblings_id`)                             
) ENGINE=MYISAM ;