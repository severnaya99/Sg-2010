INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Logo','EDIT_INVOICE_LOGO','','Hier können Sie ein Logo angeben, dass auf der Rechnung angezeigt werden soll',787,1,'','','','');
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('', 'Logo Ausrichtung', 'EDIT_INVOICE_LOGO_ALIGN', 'rechts', 'Wo soll das Logo angezeigt werden?', 787, 2, '', '', NULL, 'tep_cfg_select_option(array(\'links\', \'rechts\', \'mitte\'),');
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Datumsanzeige','EDIT_INVOICE_SHOW_DATE','nur Datum','Wie soll das Datum angezeigt werden?',787,20,'','', NULL,'tep_cfg_select_option(array(\'nur Datum\', \'Datum und Uhrzeit\'),');
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Kundennummer','EDIT_INFOICE_SHOW_CNR','ja','Soll die Kundennummer auf der Rechnung angezeigt werden?',787,30,'','', NULL,'tep_cfg_select_option(array(\'ja\', \'nein\'),');
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Rechnungsnummer','EDIT_INFOICE_SHOW_ONR','ja','Soll die Rechnungsnummer auf der Rechnung angezeigt werden?',787,35,'','', NULL,'tep_cfg_select_option(array(\'ja\', \'nein\'),');
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Zahlungsweise','EDIT_INFOICE_SHOW_PAYMENT','ja','Soll die Zahlungsweise auf der Rechnung angezeigt werden?',787,40,'','', NULL,'tep_cfg_select_option(array(\'ja\', \'nein\'),');

# Anfang Ergänzung Barcode für Produkte
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Barcode für Produkte','BARCODE_PRODUCT','nein','Sollder Barcode für die Produkte angezeigt werden?',787,45,'','', NULL,'tep_cfg_select_option(array(\'ja\', \'nein\'),');
# Ende Ergänzung Barcode für Produkte

# Anfang Ergänzung Barcode für Rechnungsnummer
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Barcode für Rechnungsnummer','BARCODE_RECHNUNG','nein','Soll der Barcode für die Rechnungsnummer angezeigt werden?',787,50,'','', NULL,'tep_cfg_select_option(array(\'ja\', \'nein\'),');
# Ende Ergänzung Barcode für Rechnungsnummer

# Anfang Ergänzung Zahlungsfälligkeit der Rechnung
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Zahlungsfälligkeit der Rechnung', 'ZAHLUNGSFAELLIGKEIT', '10', 'Tage bis die Rechnung bezahlt werden soll. Ausgehend vom Rechnungsdatum', 787, 55, '', '', NULL, NULL);

# Ende Ergänzung Zahlungsfälligkeit der Rechnung

INSERT INTO osc_configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) values ('911','Bankverbindung', 'Bankverbindung', '911', '1');


INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Bank', 'OWNER_BANK_NAME', 'Bank1Saar eG', 'Der Bankname Ihrer Hausbank', '911', '1', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Kontoinhaber', 'OWNER_BANK_ACCOUNT', 'Vor u. Zuname', 'Name des Kontoinhabers', '911', '2', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Bankleitzahl', 'STORE_OWNER_BLZ', '55555555555', 'Die Bankleitzahl Ihrer Hausbank', '911', '3', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Kontonummer', 'OWNER_BANK', '66666666666', 'Ihre Kontonummer', '911', '4', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('International Bank Account Number (IBAN)', 'OWNER_BANK_IBAN', 'IBAN', 'International Bank Account Number', '911', '5', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('SWIFT Code', 'OWNER_BANK_SWIFT', 'SWIFT', 'Swift Code für internationale Überweisungen', '911', '6', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Finanzamt', 'OWNER_BANK_FA', 'Finanzamt Neuss II', 'Name Ihres zuständigen Finanzamtes', '911', '7', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Steuernummer', 'OWNER_BANK_TAX_NUMBER', 'Steuer_Nr.:122/122/122', 'Ihre Steuernummer (Eingabe incl. Abkürzung)', '911', '8', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Umsatzsteuer-Identifikationsnummer', 'OWNER_BANK_UST_NUMBER', 'UST-ID-Nr.:DE122122122', 'Ihre Umsatzsteuer-Identifikationsnummer (Eingabe incl. Abkürzung)', '911', '9', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Anzeige der Bankdaten', 'SHOW_BANK_DATA', 'ja', 'Wollen Sie ihre Bankdaten im Impressum anzeigen lassen?', '911', '10', now(), 'tep_cfg_select_option(array(\'ja\',\'nein\'),');



INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Rechnungsnummer Prefix','ENTRY_INVOICE_ORDER_ID_PREFIX','','Hier kann man einen Prefix eingeben, der vor der Rechnungsnummet angezeigt wird.',787,36,'2003-06-15 04:49:34','2003-05-18 21:00:00','',''); 
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Rechnungsnummer Sufix','ENTRY_INVOICE_ORDER_ID_SUFIX','','Hier kann man einen Sufix eingeben, der nach der Rechnungsnummet angezeigt wird.',787,37,'2003-06-15 04:49:34','2003-05-18 21:00:00','',''); 

# Beginn Ergänzung 08.01.2005 Weitere Angaben für eine GmbH

INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Handelsregisternr.', 'HRB', '1340', 'Handelsregisternr.', '911', '11', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Amtsgericht', 'AMTSGERICHT', 'Amtsgericht Crailsheim', 'Amtsgericht', '911', '12', now(), now());

# Ergänzung 2 08.01.2005 Weitere Angaben zum Footer eintragen

INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Shopbetreiber', 'SHOPBETREIBER', 'Muster GmbH', 'Shopbetreiber eintragen', '911', '13', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Shopadresse-Strasse', 'SHOPSTRASSE', 'Andreas-Muster-Str.6', 'Shopadresse-Strasse eintragen', '911', '14', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Shopadresse-Stadt', 'SHOPSTADT', 'D 99999 Musterstadt', 'Shopadresse-Stadt eintragen', '911', '15', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Shopadresse-Telefon', 'SHOPTELEFON', 'Tel. +49 (0) 9999 999999', 'Shopadresse-Telefon eintragen', '911', '16', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Shopadresse-Fax', 'SHOPFAX', 'FAX +49 (0) 9999 999998', 'Shopadresse-Fax eintragen', '911', '17', now(), now());
INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Shopadresse-Email', 'SHOPEMAIL', 'info@muster.de', 'Shopadresse-Email eintragen', '911', '18', now(), now());

#  Ergänzung 3 21.05.2005  GmBH Angaben im Footer abschalten

INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) values ('Anzeige der Bankdaten', 'SHOW_GMBH_DATA', 'ja', 'Wollen Sie die GmBH-Daten im Impressum anzeigen lassen?', '911', '19', now(), 'tep_cfg_select_option(array(\'ja\',\'nein\'),');
#  Ende Ergänzung 3 21.05.2005  GmBH Angaben im Footer abschalten


# Anfang Ergänzung 21.05.2005 Rechnung für Kleinunternehmer
INSERT INTO osc_configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('','Kleinunternehmerrechnung','KLEINUNTERNEHMER_RECHNUNG','nein','Soll eine Kleinunternehmer Rechnung angezeigt werden?',787,60,'','', NULL,'tep_cfg_select_option(array(\'ja\', \'nein\'),');
# Ende Ergänzung 21.05.2005 Rechnung für Kleinunternehmer



# Beginn Ergänzung 08.01.2005

# Änderung Ergänzung 08.01.2005 -  3. Feld für Lieferschein

# Änderung Ergänzung 24.01.2005 -  English eingefügt.


CREATE TABLE `osc_edit_invoice` (
 `edit_invoice_id` tinyint(3) unsigned NOT NULL default '0',
 `language_id` tinyint(3) unsigned NOT NULL default '1',
 `edit_invoice_text` text,
 PRIMARY KEY  (`edit_invoice_id`,`language_id`),
 KEY `status_id` (`edit_invoice_id`)
) TYPE=MyISAM;

# Aus performance Gründen
ALTER TABLE `osc_specials` ADD INDEX ( `products_id` ) ;
ALTER TABLE `osc_products` ADD INDEX ( `products_id` , `products_status` );
ALTER TABLE `osc_products` ADD `products_price_class` varchar (30) NOT NULL default 'price_standard';
ALTER TABLE `osc_products` ADD `products_ean` varchar (16) NOT NULL;
ALTER TABLE `osc_products` ADD `products_distributor_id` int (11) NOT NULL;
ALTER TABLE `osc_products` ADD `products_distributor_article_id` varchar(30) NOT NULL;
ALTER TABLE `osc_products` ADD `products_pdf` varchar (64) NOT NULL;

CREATE TABLE `osc_distributors` (
 `distributor_id` int(11)  NOT NULL AUTO_INCREMENT,
 `distributor_name` varchar(30) NOT NULL,
  `pdf_prefix` varchar(255) NOT NULL,
 `image_prefix` varchar(255) NOT NULL,
 PRIMARY KEY  (`distributor_id`)
) TYPE=MyISAM;

INSERT INTO `osc_edit_invoice` (`edit_invoice_id`, `language_id`, `edit_invoice_text`) VALUES (1, 1, 'erster englischer Text'),
(2, 1, 'zweiter englischer Text'),(3, 1, 'dritter englischer Text'),(1, 2, 'erster Text'),
(2, 2, 'zweiter Text'),(3, 2, 'dritter Text');
