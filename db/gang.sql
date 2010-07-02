-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 02 Lug, 2010 at 07:15 PM
-- Versione MySQL: 5.0.77
-- Versione PHP: 5.1.6
-- 
-- Database: `gang`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_avatar`
-- 

CREATE TABLE `xoops25_avatar` (
  `avatar_id` mediumint(8) unsigned NOT NULL auto_increment,
  `avatar_file` varchar(30) NOT NULL default '',
  `avatar_name` varchar(100) NOT NULL default '',
  `avatar_mimetype` varchar(30) NOT NULL default '',
  `avatar_created` int(10) NOT NULL default '0',
  `avatar_display` tinyint(1) unsigned NOT NULL default '0',
  `avatar_weight` smallint(5) unsigned NOT NULL default '0',
  `avatar_type` char(1) NOT NULL default '',
  PRIMARY KEY  (`avatar_id`),
  KEY `avatar_type` (`avatar_type`,`avatar_display`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_avatar`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_avatar_user_link`
-- 

CREATE TABLE `xoops25_avatar_user_link` (
  `avatar_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  KEY `avatar_user_id` (`avatar_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_avatar_user_link`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_banner`
-- 

CREATE TABLE `xoops25_banner` (
  `bid` smallint(5) unsigned NOT NULL auto_increment,
  `cid` tinyint(3) unsigned NOT NULL default '0',
  `imptotal` mediumint(8) unsigned NOT NULL default '0',
  `impmade` mediumint(8) unsigned NOT NULL default '0',
  `clicks` mediumint(8) unsigned NOT NULL default '0',
  `imageurl` varchar(255) NOT NULL default '',
  `clickurl` varchar(255) NOT NULL default '',
  `date` int(10) NOT NULL default '0',
  `htmlbanner` tinyint(1) NOT NULL default '0',
  `htmlcode` text,
  PRIMARY KEY  (`bid`),
  KEY `idxbannercid` (`cid`),
  KEY `idxbannerbidcid` (`bid`,`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dump dei dati per la tabella `xoops25_banner`
-- 

INSERT INTO `xoops25_banner` VALUES (1, 1, 0, 4, 0, 'http://www.test.snowgang.it/images/banners/xoops_flashbanner2.swf', 'http://www.xoops.org/', 1008813250, 0, '');
INSERT INTO `xoops25_banner` VALUES (2, 1, 0, 6, 0, 'http://www.test.snowgang.it/images/banners/xoops_banner_2.gif', 'http://www.xoops.org/', 1008813250, 0, '');
INSERT INTO `xoops25_banner` VALUES (3, 1, 0, 3, 0, 'http://www.test.snowgang.it/images/banners/banner.swf', 'http://www.xoops.org/', 1008813250, 0, '');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_bannerclient`
-- 

CREATE TABLE `xoops25_bannerclient` (
  `cid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `contact` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(10) NOT NULL default '',
  `passwd` varchar(10) NOT NULL default '',
  `extrainfo` text,
  PRIMARY KEY  (`cid`),
  KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `xoops25_bannerclient`
-- 

INSERT INTO `xoops25_bannerclient` VALUES (1, 'XOOPS', 'XOOPS Dev Team', 'webmaster@xoops.org', '', '', '');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_bannerfinish`
-- 

CREATE TABLE `xoops25_bannerfinish` (
  `bid` smallint(5) unsigned NOT NULL auto_increment,
  `cid` smallint(5) unsigned NOT NULL default '0',
  `impressions` mediumint(8) unsigned NOT NULL default '0',
  `clicks` mediumint(8) unsigned NOT NULL default '0',
  `datestart` int(10) unsigned NOT NULL default '0',
  `dateend` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_bannerfinish`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_block_module_link`
-- 

CREATE TABLE `xoops25_block_module_link` (
  `block_id` mediumint(8) unsigned NOT NULL default '0',
  `module_id` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`module_id`,`block_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_block_module_link`
-- 

INSERT INTO `xoops25_block_module_link` VALUES (1, 0);
INSERT INTO `xoops25_block_module_link` VALUES (2, 0);
INSERT INTO `xoops25_block_module_link` VALUES (3, 0);
INSERT INTO `xoops25_block_module_link` VALUES (4, 0);
INSERT INTO `xoops25_block_module_link` VALUES (5, 0);
INSERT INTO `xoops25_block_module_link` VALUES (6, 0);
INSERT INTO `xoops25_block_module_link` VALUES (7, 0);
INSERT INTO `xoops25_block_module_link` VALUES (8, 0);
INSERT INTO `xoops25_block_module_link` VALUES (9, 0);
INSERT INTO `xoops25_block_module_link` VALUES (10, 0);
INSERT INTO `xoops25_block_module_link` VALUES (11, 0);
INSERT INTO `xoops25_block_module_link` VALUES (12, 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_cache_model`
-- 

CREATE TABLE `xoops25_cache_model` (
  `cache_key` varchar(64) NOT NULL default '',
  `cache_expires` int(10) unsigned NOT NULL default '0',
  `cache_data` text,
  PRIMARY KEY  (`cache_key`),
  KEY `cache_expires` (`cache_expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_cache_model`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_config`
-- 

CREATE TABLE `xoops25_config` (
  `conf_id` smallint(5) unsigned NOT NULL auto_increment,
  `conf_modid` smallint(5) unsigned NOT NULL default '0',
  `conf_catid` smallint(5) unsigned NOT NULL default '0',
  `conf_name` varchar(25) NOT NULL default '',
  `conf_title` varchar(255) NOT NULL default '',
  `conf_value` text,
  `conf_desc` varchar(255) NOT NULL default '',
  `conf_formtype` varchar(15) NOT NULL default '',
  `conf_valuetype` varchar(10) NOT NULL default '',
  `conf_order` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`conf_id`),
  KEY `conf_mod_cat_id` (`conf_modid`,`conf_catid`),
  KEY `conf_order` (`conf_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

-- 
-- Dump dei dati per la tabella `xoops25_config`
-- 

INSERT INTO `xoops25_config` VALUES (1, 0, 1, 'sitename', '_MD_AM_SITENAME', 'XOOPS Site', '_MD_AM_SITENAMEDSC', 'textbox', 'text', 0);
INSERT INTO `xoops25_config` VALUES (2, 0, 1, 'slogan', '_MD_AM_SLOGAN', 'Just Use it!', '_MD_AM_SLOGANDSC', 'textbox', 'text', 2);
INSERT INTO `xoops25_config` VALUES (3, 0, 1, 'language', '_MD_AM_LANGUAGE', 'italian', '_MD_AM_LANGUAGEDSC', 'language', 'other', 4);
INSERT INTO `xoops25_config` VALUES (4, 0, 1, 'startpage', '_MD_AM_STARTPAGE', '--', '_MD_AM_STARTPAGEDSC', 'startpage', 'other', 6);
INSERT INTO `xoops25_config` VALUES (5, 0, 1, 'server_TZ', '_MD_AM_SERVERTZ', '0', '_MD_AM_SERVERTZDSC', 'timezone', 'float', 8);
INSERT INTO `xoops25_config` VALUES (6, 0, 1, 'default_TZ', '_MD_AM_DEFAULTTZ', '0', '_MD_AM_DEFAULTTZDSC', 'timezone', 'float', 10);
INSERT INTO `xoops25_config` VALUES (7, 0, 1, 'theme_set', '_MD_AM_DTHEME', 'default', '_MD_AM_DTHEMEDSC', 'theme', 'other', 12);
INSERT INTO `xoops25_config` VALUES (8, 0, 1, 'anonymous', '_MD_AM_ANONNAME', 'Anonimo', '_MD_AM_ANONNAMEDSC', 'textbox', 'text', 15);
INSERT INTO `xoops25_config` VALUES (9, 0, 1, 'gzip_compression', '_MD_AM_USEGZIP', '0', '_MD_AM_USEGZIPDSC', 'yesno', 'int', 16);
INSERT INTO `xoops25_config` VALUES (10, 0, 1, 'usercookie', '_MD_AM_USERCOOKIE', 'xoops_user', '_MD_AM_USERCOOKIEDSC', 'textbox', 'text', 18);
INSERT INTO `xoops25_config` VALUES (11, 0, 1, 'session_expire', '_MD_AM_SESSEXPIRE', '15', '_MD_AM_SESSEXPIREDSC', 'textbox', 'int', 22);
INSERT INTO `xoops25_config` VALUES (12, 0, 1, 'banners', '_MD_AM_BANNERS', '1', '_MD_AM_BANNERSDSC', 'yesno', 'int', 26);
INSERT INTO `xoops25_config` VALUES (13, 0, 1, 'debug_mode', '_MD_AM_DEBUGMODE', '0', '_MD_AM_DEBUGMODEDSC', 'select', 'int', 24);
INSERT INTO `xoops25_config` VALUES (14, 0, 1, 'my_ip', '_MD_AM_MYIP', '127.0.0.1', '_MD_AM_MYIPDSC', 'textbox', 'text', 29);
INSERT INTO `xoops25_config` VALUES (15, 0, 1, 'use_ssl', '_MD_AM_USESSL', '0', '_MD_AM_USESSLDSC', 'yesno', 'int', 30);
INSERT INTO `xoops25_config` VALUES (16, 0, 1, 'session_name', '_MD_AM_SESSNAME', 'xoops_session', '_MD_AM_SESSNAMEDSC', 'textbox', 'text', 20);
INSERT INTO `xoops25_config` VALUES (17, 0, 2, 'minpass', '_MD_AM_MINPASS', '5', '_MD_AM_MINPASSDSC', 'textbox', 'int', 1);
INSERT INTO `xoops25_config` VALUES (18, 0, 2, 'minuname', '_MD_AM_MINUNAME', '3', '_MD_AM_MINUNAMEDSC', 'textbox', 'int', 2);
INSERT INTO `xoops25_config` VALUES (19, 0, 2, 'new_user_notify', '_MD_AM_NEWUNOTIFY', '1', '_MD_AM_NEWUNOTIFYDSC', 'yesno', 'int', 4);
INSERT INTO `xoops25_config` VALUES (20, 0, 2, 'new_user_notify_group', '_MD_AM_NOTIFYTO', '1', '_MD_AM_NOTIFYTODSC', 'group', 'int', 6);
INSERT INTO `xoops25_config` VALUES (21, 0, 2, 'activation_type', '_MD_AM_ACTVTYPE', '0', '_MD_AM_ACTVTYPEDSC', 'select', 'int', 8);
INSERT INTO `xoops25_config` VALUES (22, 0, 2, 'activation_group', '_MD_AM_ACTVGROUP', '1', '_MD_AM_ACTVGROUPDSC', 'group', 'int', 10);
INSERT INTO `xoops25_config` VALUES (23, 0, 2, 'uname_test_level', '_MD_AM_UNAMELVL', '0', '_MD_AM_UNAMELVLDSC', 'select', 'int', 12);
INSERT INTO `xoops25_config` VALUES (24, 0, 2, 'avatar_allow_upload', '_MD_AM_AVATARALLOW', '0', '_MD_AM_AVATARALWDSC', 'yesno', 'int', 14);
INSERT INTO `xoops25_config` VALUES (27, 0, 2, 'avatar_width', '_MD_AM_AVATARW', '120', '_MD_AM_AVATARWDSC', 'textbox', 'int', 16);
INSERT INTO `xoops25_config` VALUES (28, 0, 2, 'avatar_height', '_MD_AM_AVATARH', '120', '_MD_AM_AVATARHDSC', 'textbox', 'int', 18);
INSERT INTO `xoops25_config` VALUES (29, 0, 2, 'avatar_maxsize', '_MD_AM_AVATARMAX', '35000', '_MD_AM_AVATARMAXDSC', 'textbox', 'int', 20);
INSERT INTO `xoops25_config` VALUES (30, 0, 1, 'adminmail', '_MD_AM_ADMINML', 'ska@ilpescecane.it', '_MD_AM_ADMINMLDSC', 'textbox', 'text', 3);
INSERT INTO `xoops25_config` VALUES (31, 0, 2, 'self_delete', '_MD_AM_SELFDELETE', '0', '_MD_AM_SELFDELETEDSC', 'yesno', 'int', 22);
INSERT INTO `xoops25_config` VALUES (32, 0, 1, 'com_mode', '_MD_AM_COMMODE', 'nest', '_MD_AM_COMMODEDSC', 'select', 'text', 34);
INSERT INTO `xoops25_config` VALUES (33, 0, 1, 'com_order', '_MD_AM_COMORDER', '0', '_MD_AM_COMORDERDSC', 'select', 'int', 36);
INSERT INTO `xoops25_config` VALUES (34, 0, 2, 'bad_unames', '_MD_AM_BADUNAMES', 'a:3:{i:0;s:9:"webmaster";i:1;s:6:"^xoops";i:2;s:6:"^admin";}', '_MD_AM_BADUNAMESDSC', 'textarea', 'array', 24);
INSERT INTO `xoops25_config` VALUES (35, 0, 2, 'bad_emails', '_MD_AM_BADEMAILS', 'a:1:{i:0;s:10:"xoops.org$";}', '_MD_AM_BADEMAILSDSC', 'textarea', 'array', 26);
INSERT INTO `xoops25_config` VALUES (36, 0, 2, 'maxuname', '_MD_AM_MAXUNAME', '10', '_MD_AM_MAXUNAMEDSC', 'textbox', 'int', 3);
INSERT INTO `xoops25_config` VALUES (37, 0, 1, 'bad_ips', '_MD_AM_BADIPS', 'a:1:{i:0;s:9:"127.0.0.1";}', '_MD_AM_BADIPSDSC', 'textarea', 'array', 42);
INSERT INTO `xoops25_config` VALUES (38, 0, 3, 'meta_keywords', '_MD_AM_METAKEY', 'xoops, web applications, web 2.0, sns, news, technology, headlines, linux, software, download, downloads, free, community, forum, bulletin board, bbs, php, survey, polls, kernel, comment, comments, portal, odp, open source, opensource, FreeSoftware, gnu, gpl, license, Unix, *nix, mysql, sql, database, databases, web site, blog, wiki, module, modules, theme, themes, cms, content management', '_MD_AM_METAKEYDSC', 'textarea', 'text', 0);
INSERT INTO `xoops25_config` VALUES (39, 0, 3, 'footer', '_MD_AM_FOOTER', 'Powered by XOOPS @ 2001-2010 <a href="http://xoops.sourceforge.net/" target="_blank">The XOOPS Project</a>', '_MD_AM_FOOTERDSC', 'textarea', 'text', 20);
INSERT INTO `xoops25_config` VALUES (40, 0, 4, 'censor_enable', '_MD_AM_DOCENSOR', '0', '_MD_AM_DOCENSORDSC', 'yesno', 'int', 0);
INSERT INTO `xoops25_config` VALUES (41, 0, 4, 'censor_words', '_MD_AM_CENSORWRD', 'a:2:{i:0;s:4:"fuck";i:1;s:4:"shit";}', '_MD_AM_CENSORWRDDSC', 'textarea', 'array', 1);
INSERT INTO `xoops25_config` VALUES (42, 0, 4, 'censor_replace', '_MD_AM_CENSORRPLC', '#OOPS#', '_MD_AM_CENSORRPLCDSC', 'textbox', 'text', 2);
INSERT INTO `xoops25_config` VALUES (43, 0, 3, 'meta_robots', '_MD_AM_METAROBOTS', 'index,follow', '_MD_AM_METAROBOTSDSC', 'select', 'text', 2);
INSERT INTO `xoops25_config` VALUES (44, 0, 5, 'enable_search', '_MD_AM_DOSEARCH', '1', '_MD_AM_DOSEARCHDSC', 'yesno', 'int', 0);
INSERT INTO `xoops25_config` VALUES (45, 0, 5, 'keyword_min', '_MD_AM_MINSEARCH', '5', '_MD_AM_MINSEARCHDSC', 'textbox', 'int', 1);
INSERT INTO `xoops25_config` VALUES (46, 0, 2, 'avatar_minposts', '_MD_AM_AVATARMP', '0', '_MD_AM_AVATARMPDSC', 'textbox', 'int', 15);
INSERT INTO `xoops25_config` VALUES (47, 0, 1, 'enable_badips', '_MD_AM_DOBADIPS', '0', '_MD_AM_DOBADIPSDSC', 'yesno', 'int', 40);
INSERT INTO `xoops25_config` VALUES (48, 0, 3, 'meta_rating', '_MD_AM_METARATING', 'general', '_MD_AM_METARATINGDSC', 'select', 'text', 4);
INSERT INTO `xoops25_config` VALUES (49, 0, 3, 'meta_author', '_MD_AM_METAAUTHOR', 'XOOPS', '_MD_AM_METAAUTHORDSC', 'textbox', 'text', 6);
INSERT INTO `xoops25_config` VALUES (50, 0, 3, 'meta_copyright', '_MD_AM_METACOPYR', 'Copyright @ 2001-2010', '_MD_AM_METACOPYRDSC', 'textbox', 'text', 8);
INSERT INTO `xoops25_config` VALUES (51, 0, 3, 'meta_description', '_MD_AM_METADESC', 'XOOPS is a dynamic Object Oriented based open source portal script written in PHP.', '_MD_AM_METADESCDSC', 'textarea', 'text', 1);
INSERT INTO `xoops25_config` VALUES (52, 0, 2, 'allow_chgmail', '_MD_AM_ALLWCHGMAIL', '0', '_MD_AM_ALLWCHGMAILDSC', 'yesno', 'int', 3);
INSERT INTO `xoops25_config` VALUES (53, 0, 1, 'use_mysession', '_MD_AM_USEMYSESS', '0', '_MD_AM_USEMYSESSDSC', 'yesno', 'int', 19);
INSERT INTO `xoops25_config` VALUES (54, 0, 2, 'reg_dispdsclmr', '_MD_AM_DSPDSCLMR', '1', '_MD_AM_DSPDSCLMRDSC', 'yesno', 'int', 30);
INSERT INTO `xoops25_config` VALUES (55, 0, 2, 'reg_disclaimer', '_MD_AM_REGDSCLMR', 'Gli amministratori e moderatori di questo sito cancelleranno o modificheranno, il pi&ugrave; velocemente possibile, qualsiasi contenuto ritenuto sgradevole o offensivo.\n&Egrave; in ogni caso impossibile esaminare ogni messaggio e si mette quindi a conoscenza che tutti i messaggi esprimono opinioni e punti di vista dei loro autori e non degli amministratori, moderatori o webmaster (ad eccezione dei messaggi inviati da questi utenti) e sono per questa ragione al di fuori della responsabilit&agrave; diretta degli amministratori del sito.\n\nSi accetta di non inviare messaggi e/o allegati osceni, volgari, calunniosi, discriminatori, \natti a fomentare qualsiasi forma di odio politico, razziale o religioso, o qualsiasi materiale in contrasto con le leggi vigenti in Italia.\nIl non rispetto di queste condizioni provocher&agrave; l''immediata e definitiva espulsione (e il vostro provider/hosting verr&agrave; informato).\nTutti gli indirizzi IP degli autori dei messaggi saranno registrati per consentire l''applicazione di queste condizioni. \nNon &egrave; consentito creare account multipli per la stessa persona fisica. \nSi accetta inoltre che i webmaster, amministratori o moderatori di questo sito abbiano il diritto di cancellare, modificare, spostare o chiudere qualsiasi discussione ogni volta lo ritengano necessario.\nCome utente si accetta inoltre che qualsiasi informazione inserita venga memorizzata in un database. \nQuesti dati non verranno consegnati a terze parti senza il consenso dell''utente e ne verr&agrave; garantit&agrave; la protezione attraverso l''utilizzo di adeguati sistemi di sicurezza e di monitoraggio. \nWebmaster, amministratori e moderatori non possono in ogni caso essere ritenuti responsabili per operazioni hacking che possano condurre ai suddetti dati.\n\nQuesto sito utilizza dei cookies per salvare informazioni in locale sul computer dell''utente.\nTali cookies non contengono alcun dato personale dell''utente, tra quelli inseriti nel modulo di registrazione (ad eccezione dell''id utente), e servono solo a consentire la navigazione del sito. \nL''indirizzo email verr&agrave; usato per confermare i dettagli della registrazione e la password (e per inviare una nuova password nel caso in cui questa venga persa o dimenticata). \nVerr&agrave; inoltre utilizzato per l''invio di notifiche di pubblicazione relativamente all''immissione di contenuti sul sito e per eventuali comunicazioni di servizio/utilit&agrave; da parte degli amministratori.\n\nPremendo il pulsante ''Invia'' si accettano tutti i vincoli e le condizioni sopra descritte e si da autorizzazione al trattamento dei dati personali contestualmente forniti per la fornitura di questo servizio, secondo quanto stabilito dal Codice in materia di protezione dei dati personali (d.lgs 196/03).', '_MD_AM_REGDSCLMRDSC', 'textarea', 'text', 32);
INSERT INTO `xoops25_config` VALUES (56, 0, 2, 'allow_register', '_MD_AM_ALLOWREG', '1', '_MD_AM_ALLOWREGDSC', 'yesno', 'int', 0);
INSERT INTO `xoops25_config` VALUES (57, 0, 1, 'theme_fromfile', '_MD_AM_THEMEFILE', '0', '_MD_AM_THEMEFILEDSC', 'yesno', 'int', 13);
INSERT INTO `xoops25_config` VALUES (58, 0, 1, 'closesite', '_MD_AM_CLOSESITE', '0', '_MD_AM_CLOSESITEDSC', 'yesno', 'int', 26);
INSERT INTO `xoops25_config` VALUES (59, 0, 1, 'closesite_okgrp', '_MD_AM_CLOSESITEOK', 'a:1:{i:0;s:1:"1";}', '_MD_AM_CLOSESITEOKDSC', 'group_multi', 'array', 27);
INSERT INTO `xoops25_config` VALUES (60, 0, 1, 'closesite_text', '_MD_AM_CLOSESITETXT', 'Il sito al momento &egrave; chiuso per manutenzione. Si prega di riprovare pi&ugrave; tardi.', '_MD_AM_CLOSESITETXTDSC', 'textarea', 'text', 28);
INSERT INTO `xoops25_config` VALUES (61, 0, 1, 'sslpost_name', '_MD_AM_SSLPOST', 'xoops_ssl', '_MD_AM_SSLPOSTDSC', 'textbox', 'text', 31);
INSERT INTO `xoops25_config` VALUES (62, 0, 1, 'module_cache', '_MD_AM_MODCACHE', '', '_MD_AM_MODCACHEDSC', 'module_cache', 'array', 50);
INSERT INTO `xoops25_config` VALUES (63, 0, 1, 'template_set', '_MD_AM_DTPLSET', 'default', '_MD_AM_DTPLSETDSC', 'tplset', 'other', 14);
INSERT INTO `xoops25_config` VALUES (64, 0, 6, 'mailmethod', '_MD_AM_MAILERMETHOD', 'mail', '_MD_AM_MAILERMETHODDESC', 'select', 'text', 4);
INSERT INTO `xoops25_config` VALUES (65, 0, 6, 'smtphost', '_MD_AM_SMTPHOST', 'a:1:{i:0;s:0:"";}', '_MD_AM_SMTPHOSTDESC', 'textarea', 'array', 6);
INSERT INTO `xoops25_config` VALUES (66, 0, 6, 'smtpuser', '_MD_AM_SMTPUSER', '', '_MD_AM_SMTPUSERDESC', 'textbox', 'text', 7);
INSERT INTO `xoops25_config` VALUES (67, 0, 6, 'smtppass', '_MD_AM_SMTPPASS', '', '_MD_AM_SMTPPASSDESC', 'password', 'text', 8);
INSERT INTO `xoops25_config` VALUES (68, 0, 6, 'sendmailpath', '_MD_AM_SENDMAILPATH', '/usr/sbin/sendmail', '_MD_AM_SENDMAILPATHDESC', 'textbox', 'text', 5);
INSERT INTO `xoops25_config` VALUES (69, 0, 6, 'from', '_MD_AM_MAILFROM', '', '_MD_AM_MAILFROMDESC', 'textbox', 'text', 1);
INSERT INTO `xoops25_config` VALUES (70, 0, 6, 'fromname', '_MD_AM_MAILFROMNAME', '', '_MD_AM_MAILFROMNAMEDESC', 'textbox', 'text', 2);
INSERT INTO `xoops25_config` VALUES (71, 0, 1, 'sslloginlink', '_MD_AM_SSLLINK', 'https://', '_MD_AM_SSLLINKDSC', 'textbox', 'text', 33);
INSERT INTO `xoops25_config` VALUES (72, 0, 1, 'theme_set_allowed', '_MD_AM_THEMEOK', 'a:1:{i:0;s:7:"default";}', '_MD_AM_THEMEOKDSC', 'theme_multi', 'array', 13);
INSERT INTO `xoops25_config` VALUES (73, 0, 6, 'fromuid', '_MD_AM_MAILFROMUID', '1', '_MD_AM_MAILFROMUIDDESC', 'user', 'int', 3);
INSERT INTO `xoops25_config` VALUES (74, 0, 7, 'auth_method', '_MD_AM_AUTHMETHOD', 'xoops', '_MD_AM_AUTHMETHODDESC', 'select', 'text', 1);
INSERT INTO `xoops25_config` VALUES (75, 0, 7, 'ldap_port', '_MD_AM_LDAP_PORT', '389', '_MD_AM_LDAP_PORT', 'textbox', 'int', 2);
INSERT INTO `xoops25_config` VALUES (76, 0, 7, 'ldap_server', '_MD_AM_LDAP_SERVER', 'your directory server', '_MD_AM_LDAP_SERVER_DESC', 'textbox', 'text', 3);
INSERT INTO `xoops25_config` VALUES (77, 0, 7, 'ldap_base_dn', '_MD_AM_LDAP_BASE_DN', 'dc=xoops,dc=org', '_MD_AM_LDAP_BASE_DN_DESC', 'textbox', 'text', 4);
INSERT INTO `xoops25_config` VALUES (78, 0, 7, 'ldap_manager_dn', '_MD_AM_LDAP_MANAGER_DN', 'manager_dn', '_MD_AM_LDAP_MANAGER_DN_DESC', 'textbox', 'text', 5);
INSERT INTO `xoops25_config` VALUES (79, 0, 7, 'ldap_manager_pass', '_MD_AM_LDAP_MANAGER_PASS', 'manager_pass', '_MD_AM_LDAP_MANAGER_PASS_DESC', 'password', 'text', 6);
INSERT INTO `xoops25_config` VALUES (80, 0, 7, 'ldap_version', '_MD_AM_LDAP_VERSION', '3', '_MD_AM_LDAP_VERSION_DESC', 'textbox', 'text', 7);
INSERT INTO `xoops25_config` VALUES (81, 0, 7, 'ldap_users_bypass', '_MD_AM_LDAP_USERS_BYPASS', 'a:1:{i:0;s:5:"admin";}', '_MD_AM_LDAP_USERS_BYPASS_DESC', 'textarea', 'array', 8);
INSERT INTO `xoops25_config` VALUES (82, 0, 7, 'ldap_loginname_asdn', '_MD_AM_LDAP_LOGINNAME_ASDN', 'uid_asdn', '_MD_AM_LDAP_LOGINNAME_ASDN_D', 'yesno', 'int', 9);
INSERT INTO `xoops25_config` VALUES (83, 0, 7, 'ldap_loginldap_attr', '_MD_AM_LDAP_LOGINLDAP_ATTR', 'uid', '_MD_AM_LDAP_LOGINLDAP_ATTR_D', 'textbox', 'text', 10);
INSERT INTO `xoops25_config` VALUES (84, 0, 7, 'ldap_filter_person', '_MD_AM_LDAP_FILTER_PERSON', '', '_MD_AM_LDAP_FILTER_PERSON_DESC', 'textbox', 'text', 11);
INSERT INTO `xoops25_config` VALUES (85, 0, 7, 'ldap_domain_name', '_MD_AM_LDAP_DOMAIN_NAME', 'mydomain', '_MD_AM_LDAP_DOMAIN_NAME_DESC', 'textbox', 'text', 12);
INSERT INTO `xoops25_config` VALUES (86, 0, 7, 'ldap_provisionning', '_MD_AM_LDAP_PROVIS', '0', '_MD_AM_LDAP_PROVIS_DESC', 'yesno', 'int', 13);
INSERT INTO `xoops25_config` VALUES (87, 0, 7, 'ldap_provisionning_group', '_MD_AM_LDAP_PROVIS_GROUP', 'a:1:{i:0;s:1:"2";}', '_MD_AM_LDAP_PROVIS_GROUP_DSC', 'group_multi', 'array', 14);
INSERT INTO `xoops25_config` VALUES (88, 0, 7, 'ldap_mail_attr', '_MD_AM_LDAP_MAIL_ATTR', 'mail', '_MD_AM_LDAP_MAIL_ATTR_DESC', 'textbox', 'text', 15);
INSERT INTO `xoops25_config` VALUES (89, 0, 7, 'ldap_givenname_attr', '_MD_AM_LDAP_GIVENNAME_ATTR', 'givenname', '_MD_AM_LDAP_GIVENNAME_ATTR_DSC', 'textbox', 'text', 16);
INSERT INTO `xoops25_config` VALUES (90, 0, 7, 'ldap_surname_attr', '_MD_AM_LDAP_SURNAME_ATTR', 'sn', '_MD_AM_LDAP_SURNAME_ATTR_DESC', 'textbox', 'text', 17);
INSERT INTO `xoops25_config` VALUES (91, 0, 7, 'ldap_field_mapping', '_MD_AM_LDAP_FIELD_MAPPING_ATTR', 'email=mail|name=displayname', '_MD_AM_LDAP_FIELD_MAPPING_DESC', 'textarea', 'text', 18);
INSERT INTO `xoops25_config` VALUES (92, 0, 7, 'ldap_provisionning_upd', '_MD_AM_LDAP_PROVIS_UPD', '1', '_MD_AM_LDAP_PROVIS_UPD_DESC', 'yesno', 'int', 19);
INSERT INTO `xoops25_config` VALUES (93, 0, 7, 'ldap_use_TLS', '_MD_AM_LDAP_USETLS', '0', '_MD_AM_LDAP_USETLS_DESC', 'yesno', 'int', 20);
INSERT INTO `xoops25_config` VALUES (94, 0, 1, 'cpanel', '_MD_AM_CPANEL', 'oxygen', '_MD_AM_CPANELDSC', 'cpanel', 'other', 11);
INSERT INTO `xoops25_config` VALUES (95, 0, 2, 'welcome_type', '_MD_AM_WELCOMETYPE', '1', '_MD_AM_WELCOMETYPE_DESC', 'select', 'int', 3);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_configcategory`
-- 

CREATE TABLE `xoops25_configcategory` (
  `confcat_id` smallint(5) unsigned NOT NULL auto_increment,
  `confcat_name` varchar(255) NOT NULL default '',
  `confcat_order` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`confcat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dump dei dati per la tabella `xoops25_configcategory`
-- 

INSERT INTO `xoops25_configcategory` VALUES (1, '_MD_AM_GENERAL', 0);
INSERT INTO `xoops25_configcategory` VALUES (2, '_MD_AM_USERSETTINGS', 0);
INSERT INTO `xoops25_configcategory` VALUES (3, '_MD_AM_METAFOOTER', 0);
INSERT INTO `xoops25_configcategory` VALUES (4, '_MD_AM_CENSOR', 0);
INSERT INTO `xoops25_configcategory` VALUES (5, '_MD_AM_SEARCH', 0);
INSERT INTO `xoops25_configcategory` VALUES (6, '_MD_AM_MAILER', 0);
INSERT INTO `xoops25_configcategory` VALUES (7, '_MD_AM_AUTHENTICATION', 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_configoption`
-- 

CREATE TABLE `xoops25_configoption` (
  `confop_id` mediumint(8) unsigned NOT NULL auto_increment,
  `confop_name` varchar(255) NOT NULL default '',
  `confop_value` varchar(255) NOT NULL default '',
  `conf_id` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`confop_id`),
  KEY `conf_id` (`conf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- Dump dei dati per la tabella `xoops25_configoption`
-- 

INSERT INTO `xoops25_configoption` VALUES (1, '_MD_AM_DEBUGMODE1', '1', 13);
INSERT INTO `xoops25_configoption` VALUES (2, '_MD_AM_DEBUGMODE2', '2', 13);
INSERT INTO `xoops25_configoption` VALUES (3, '_NESTED', 'nest', 32);
INSERT INTO `xoops25_configoption` VALUES (4, '_FLAT', 'flat', 32);
INSERT INTO `xoops25_configoption` VALUES (5, '_THREADED', 'thread', 32);
INSERT INTO `xoops25_configoption` VALUES (6, '_OLDESTFIRST', '0', 33);
INSERT INTO `xoops25_configoption` VALUES (7, '_NEWESTFIRST', '1', 33);
INSERT INTO `xoops25_configoption` VALUES (8, '_MD_AM_USERACTV', '0', 21);
INSERT INTO `xoops25_configoption` VALUES (9, '_MD_AM_AUTOACTV', '1', 21);
INSERT INTO `xoops25_configoption` VALUES (10, '_MD_AM_ADMINACTV', '2', 21);
INSERT INTO `xoops25_configoption` VALUES (11, '_MD_AM_STRICT', '0', 23);
INSERT INTO `xoops25_configoption` VALUES (12, '_MD_AM_MEDIUM', '1', 23);
INSERT INTO `xoops25_configoption` VALUES (13, '_MD_AM_LIGHT', '2', 23);
INSERT INTO `xoops25_configoption` VALUES (14, '_MD_AM_DEBUGMODE3', '3', 13);
INSERT INTO `xoops25_configoption` VALUES (15, '_MD_AM_INDEXFOLLOW', 'index,follow', 43);
INSERT INTO `xoops25_configoption` VALUES (16, '_MD_AM_NOINDEXFOLLOW', 'noindex,follow', 43);
INSERT INTO `xoops25_configoption` VALUES (17, '_MD_AM_INDEXNOFOLLOW', 'index,nofollow', 43);
INSERT INTO `xoops25_configoption` VALUES (18, '_MD_AM_NOINDEXNOFOLLOW', 'noindex,nofollow', 43);
INSERT INTO `xoops25_configoption` VALUES (19, '_MD_AM_METAOGEN', 'general', 48);
INSERT INTO `xoops25_configoption` VALUES (20, '_MD_AM_METAO14YRS', '14 years', 48);
INSERT INTO `xoops25_configoption` VALUES (21, '_MD_AM_METAOREST', 'restricted', 48);
INSERT INTO `xoops25_configoption` VALUES (22, '_MD_AM_METAOMAT', 'mature', 48);
INSERT INTO `xoops25_configoption` VALUES (23, '_MD_AM_DEBUGMODE0', '0', 13);
INSERT INTO `xoops25_configoption` VALUES (24, 'PHP mail()', 'mail', 64);
INSERT INTO `xoops25_configoption` VALUES (25, 'sendmail', 'sendmail', 64);
INSERT INTO `xoops25_configoption` VALUES (26, 'SMTP', 'smtp', 64);
INSERT INTO `xoops25_configoption` VALUES (27, 'SMTPAuth', 'smtpauth', 64);
INSERT INTO `xoops25_configoption` VALUES (28, '_MD_AM_AUTH_CONFOPTION_XOOPS', 'xoops', 74);
INSERT INTO `xoops25_configoption` VALUES (29, '_MD_AM_AUTH_CONFOPTION_LDAP', 'ldap', 74);
INSERT INTO `xoops25_configoption` VALUES (30, '_MD_AM_AUTH_CONFOPTION_AD', 'ads', 74);
INSERT INTO `xoops25_configoption` VALUES (31, '_NO', '0', 95);
INSERT INTO `xoops25_configoption` VALUES (32, '_MD_AM_WELCOMETYPE_EMAIL', '1', 95);
INSERT INTO `xoops25_configoption` VALUES (33, '_MD_AM_WELCOMETYPE_PM', '2', 95);
INSERT INTO `xoops25_configoption` VALUES (34, '_MD_AM_WELCOMETYPE_BOTH', '3', 95);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_group_permission`
-- 

CREATE TABLE `xoops25_group_permission` (
  `gperm_id` int(10) unsigned NOT NULL auto_increment,
  `gperm_groupid` smallint(5) unsigned NOT NULL default '0',
  `gperm_itemid` mediumint(8) unsigned NOT NULL default '0',
  `gperm_modid` mediumint(5) unsigned NOT NULL default '0',
  `gperm_name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`gperm_id`),
  KEY `groupid` (`gperm_groupid`),
  KEY `itemid` (`gperm_itemid`),
  KEY `gperm_modid` (`gperm_modid`,`gperm_name`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

-- 
-- Dump dei dati per la tabella `xoops25_group_permission`
-- 

INSERT INTO `xoops25_group_permission` VALUES (1, 1, 1, 1, 'module_admin');
INSERT INTO `xoops25_group_permission` VALUES (2, 1, 1, 1, 'module_read');
INSERT INTO `xoops25_group_permission` VALUES (3, 2, 1, 1, 'module_read');
INSERT INTO `xoops25_group_permission` VALUES (4, 3, 1, 1, 'module_read');
INSERT INTO `xoops25_group_permission` VALUES (5, 1, 1, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (6, 1, 2, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (7, 1, 3, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (8, 1, 4, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (9, 1, 5, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (10, 1, 6, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (11, 1, 7, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (12, 1, 8, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (13, 1, 9, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (14, 1, 10, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (15, 1, 11, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (16, 1, 12, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (17, 1, 13, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (18, 1, 14, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (19, 1, 15, 1, 'system_admin');
INSERT INTO `xoops25_group_permission` VALUES (20, 1, 1, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (21, 2, 1, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (22, 3, 1, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (23, 1, 2, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (24, 2, 2, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (25, 3, 2, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (26, 1, 3, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (27, 2, 3, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (28, 3, 3, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (29, 1, 4, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (30, 2, 4, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (31, 3, 4, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (32, 1, 5, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (33, 2, 5, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (34, 3, 5, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (35, 1, 6, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (36, 2, 6, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (37, 3, 6, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (38, 1, 7, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (39, 2, 7, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (40, 3, 7, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (41, 1, 8, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (42, 2, 8, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (43, 3, 8, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (44, 1, 9, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (45, 2, 9, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (46, 3, 9, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (47, 1, 10, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (48, 2, 10, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (49, 3, 10, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (50, 1, 11, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (51, 2, 11, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (52, 3, 11, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (53, 1, 12, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (54, 2, 12, 1, 'block_read');
INSERT INTO `xoops25_group_permission` VALUES (55, 3, 12, 1, 'block_read');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_groups`
-- 

CREATE TABLE `xoops25_groups` (
  `groupid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `description` text,
  `group_type` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`groupid`),
  KEY `group_type` (`group_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dump dei dati per la tabella `xoops25_groups`
-- 

INSERT INTO `xoops25_groups` VALUES (1, 'Webmasters', 'Webmaster di questo sito', 'Admin');
INSERT INTO `xoops25_groups` VALUES (2, 'Utenti registrati', 'Gruppo degli utenti registrati al sito', 'User');
INSERT INTO `xoops25_groups` VALUES (3, 'Utenti anonimi', 'Gruppo degli utenti non registrati che navigano il sito', 'Anonymous');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_groups_users_link`
-- 

CREATE TABLE `xoops25_groups_users_link` (
  `linkid` mediumint(8) unsigned NOT NULL auto_increment,
  `groupid` smallint(5) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`linkid`),
  KEY `groupid_uid` (`groupid`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dump dei dati per la tabella `xoops25_groups_users_link`
-- 

INSERT INTO `xoops25_groups_users_link` VALUES (1, 1, 1);
INSERT INTO `xoops25_groups_users_link` VALUES (2, 2, 1);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_image`
-- 

CREATE TABLE `xoops25_image` (
  `image_id` mediumint(8) unsigned NOT NULL auto_increment,
  `image_name` varchar(30) NOT NULL default '',
  `image_nicename` varchar(255) NOT NULL default '',
  `image_mimetype` varchar(30) NOT NULL default '',
  `image_created` int(10) unsigned NOT NULL default '0',
  `image_display` tinyint(1) unsigned NOT NULL default '0',
  `image_weight` smallint(5) unsigned NOT NULL default '0',
  `imgcat_id` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`image_id`),
  KEY `imgcat_id` (`imgcat_id`),
  KEY `image_display` (`image_display`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_image`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_imagebody`
-- 

CREATE TABLE `xoops25_imagebody` (
  `image_id` mediumint(8) unsigned NOT NULL default '0',
  `image_body` mediumblob,
  KEY `image_id` (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_imagebody`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_imagecategory`
-- 

CREATE TABLE `xoops25_imagecategory` (
  `imgcat_id` smallint(5) unsigned NOT NULL auto_increment,
  `imgcat_name` varchar(100) NOT NULL default '',
  `imgcat_maxsize` int(8) unsigned NOT NULL default '0',
  `imgcat_maxwidth` smallint(3) unsigned NOT NULL default '0',
  `imgcat_maxheight` smallint(3) unsigned NOT NULL default '0',
  `imgcat_display` tinyint(1) unsigned NOT NULL default '0',
  `imgcat_weight` smallint(3) unsigned NOT NULL default '0',
  `imgcat_type` char(1) NOT NULL default '',
  `imgcat_storetype` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`imgcat_id`),
  KEY `imgcat_display` (`imgcat_display`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_imagecategory`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_imgset`
-- 

CREATE TABLE `xoops25_imgset` (
  `imgset_id` smallint(5) unsigned NOT NULL auto_increment,
  `imgset_name` varchar(50) NOT NULL default '',
  `imgset_refid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`imgset_id`),
  KEY `imgset_refid` (`imgset_refid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `xoops25_imgset`
-- 

INSERT INTO `xoops25_imgset` VALUES (1, 'default', 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_imgset_tplset_link`
-- 

CREATE TABLE `xoops25_imgset_tplset_link` (
  `imgset_id` smallint(5) unsigned NOT NULL default '0',
  `tplset_name` varchar(50) NOT NULL default '',
  KEY `tplset_name` (`tplset_name`(10))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_imgset_tplset_link`
-- 

INSERT INTO `xoops25_imgset_tplset_link` VALUES (1, 'default');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_imgsetimg`
-- 

CREATE TABLE `xoops25_imgsetimg` (
  `imgsetimg_id` mediumint(8) unsigned NOT NULL auto_increment,
  `imgsetimg_file` varchar(50) NOT NULL default '',
  `imgsetimg_body` blob,
  `imgsetimg_imgset` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`imgsetimg_id`),
  KEY `imgsetimg_imgset` (`imgsetimg_imgset`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_imgsetimg`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_modules`
-- 

CREATE TABLE `xoops25_modules` (
  `mid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL default '',
  `version` smallint(5) unsigned NOT NULL default '100',
  `last_update` int(10) unsigned NOT NULL default '0',
  `weight` smallint(3) unsigned NOT NULL default '0',
  `isactive` tinyint(1) unsigned NOT NULL default '0',
  `dirname` varchar(25) NOT NULL default '',
  `hasmain` tinyint(1) unsigned NOT NULL default '0',
  `hasadmin` tinyint(1) unsigned NOT NULL default '0',
  `hassearch` tinyint(1) unsigned NOT NULL default '0',
  `hasconfig` tinyint(1) unsigned NOT NULL default '0',
  `hascomments` tinyint(1) unsigned NOT NULL default '0',
  `hasnotification` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  KEY `hasmain` (`hasmain`),
  KEY `hasadmin` (`hasadmin`),
  KEY `hassearch` (`hassearch`),
  KEY `hasnotification` (`hasnotification`),
  KEY `dirname` (`dirname`),
  KEY `name` (`name`(15)),
  KEY `isactive` (`isactive`),
  KEY `weight` (`weight`),
  KEY `hascomments` (`hascomments`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `xoops25_modules`
-- 

INSERT INTO `xoops25_modules` VALUES (1, 'Sistema', 200, 1278086514, 0, 1, 'system', 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_newblocks`
-- 

CREATE TABLE `xoops25_newblocks` (
  `bid` mediumint(8) unsigned NOT NULL auto_increment,
  `mid` smallint(5) unsigned NOT NULL default '0',
  `func_num` tinyint(3) unsigned NOT NULL default '0',
  `options` varchar(255) NOT NULL default '',
  `name` varchar(150) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `content` text,
  `side` tinyint(1) unsigned NOT NULL default '0',
  `weight` smallint(5) unsigned NOT NULL default '0',
  `visible` tinyint(1) unsigned NOT NULL default '0',
  `block_type` char(1) NOT NULL default '',
  `c_type` char(1) NOT NULL default '',
  `isactive` tinyint(1) unsigned NOT NULL default '0',
  `dirname` varchar(50) NOT NULL default '',
  `func_file` varchar(50) NOT NULL default '',
  `show_func` varchar(50) NOT NULL default '',
  `edit_func` varchar(50) NOT NULL default '',
  `template` varchar(50) NOT NULL default '',
  `bcachetime` int(10) unsigned NOT NULL default '0',
  `last_modified` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `mid` (`mid`),
  KEY `visible` (`visible`),
  KEY `isactive_visible_mid` (`isactive`,`visible`,`mid`),
  KEY `mid_funcnum` (`mid`,`func_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dump dei dati per la tabella `xoops25_newblocks`
-- 

INSERT INTO `xoops25_newblocks` VALUES (1, 1, 1, '', 'Menù utente', 'Menù utente', '', 0, 0, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_user_show', '', 'system_block_user.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (2, 1, 2, '', 'Login', 'Login', '', 0, 0, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_login_show', '', 'system_block_login.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (3, 1, 3, '', 'Cerca', 'Cerca', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_search_show', '', 'system_block_search.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (4, 1, 4, '', 'Contenuti in attesa', 'Contenuti in attesa', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_waiting_show', '', 'system_block_waiting.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (5, 1, 5, '', 'Men&ugrave; principale', 'Men&ugrave; principale', '', 0, 0, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_main_show', '', 'system_block_mainmenu.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (6, 1, 6, '320|190|s_poweredby.gif|1', 'Informazioni sul sito', 'Informazioni sul sito', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_info_show', 'b_system_info_edit', 'system_block_siteinfo.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (7, 1, 7, '', 'Utenti online', 'Utenti online', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_online_show', '', 'system_block_online.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (8, 1, 8, '10|1', 'Utenti pi&ugrave; attivi', 'Utenti pi&ugrave; attivi', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_topposters_show', 'b_system_topposters_edit', 'system_block_topusers.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (9, 1, 9, '10|1', 'Nuovi utenti', 'Nuovi utenti', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_newmembers_show', 'b_system_newmembers_edit', 'system_block_newusers.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (10, 1, 10, '10', 'Ultimi commenti', 'Ultimi commenti', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_comments_show', 'b_system_comments_edit', 'system_block_comments.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (11, 1, 11, '', 'Opzioni di notifica', 'Opzioni di notifica', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_notification_show', '', 'system_block_notification.html', 0, 1278086514);
INSERT INTO `xoops25_newblocks` VALUES (12, 1, 12, '0|80', 'Temi', 'Temi', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_themes_show', 'b_system_themes_edit', 'system_block_themes.html', 0, 1278086514);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_online`
-- 

CREATE TABLE `xoops25_online` (
  `online_uid` mediumint(8) unsigned NOT NULL default '0',
  `online_uname` varchar(25) NOT NULL default '',
  `online_updated` int(10) unsigned NOT NULL default '0',
  `online_module` smallint(5) unsigned NOT NULL default '0',
  `online_ip` varchar(15) NOT NULL default '',
  KEY `online_module` (`online_module`),
  KEY `online_updated` (`online_updated`),
  KEY `online_uid` (`online_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_online`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_priv_msgs`
-- 

CREATE TABLE `xoops25_priv_msgs` (
  `msg_id` mediumint(8) unsigned NOT NULL auto_increment,
  `msg_image` varchar(100) default NULL,
  `subject` varchar(255) NOT NULL default '',
  `from_userid` mediumint(8) unsigned NOT NULL default '0',
  `to_userid` mediumint(8) unsigned NOT NULL default '0',
  `msg_time` int(10) unsigned NOT NULL default '0',
  `msg_text` text,
  `read_msg` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`msg_id`),
  KEY `to_userid` (`to_userid`),
  KEY `touseridreadmsg` (`to_userid`,`read_msg`),
  KEY `msgidfromuserid` (`from_userid`,`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_priv_msgs`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_ranks`
-- 

CREATE TABLE `xoops25_ranks` (
  `rank_id` smallint(5) unsigned NOT NULL auto_increment,
  `rank_title` varchar(50) NOT NULL default '',
  `rank_min` mediumint(8) unsigned NOT NULL default '0',
  `rank_max` mediumint(8) unsigned NOT NULL default '0',
  `rank_special` tinyint(1) unsigned NOT NULL default '0',
  `rank_image` varchar(255) default NULL,
  PRIMARY KEY  (`rank_id`),
  KEY `rank_min` (`rank_min`),
  KEY `rank_max` (`rank_max`),
  KEY `rankminrankmaxranspecial` (`rank_min`,`rank_max`,`rank_special`),
  KEY `rankspecial` (`rank_special`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dump dei dati per la tabella `xoops25_ranks`
-- 

INSERT INTO `xoops25_ranks` VALUES (1, 'Matricola', 0, 50, 0, 'rank3e632f95e81ca.gif');
INSERT INTO `xoops25_ranks` VALUES (2, 'Allievo', 51, 150, 0, 'rank3dbf8e94a6f72.gif');
INSERT INTO `xoops25_ranks` VALUES (3, 'Senior', 151, 350, 0, 'rank3dbf8e9e7d88d.gif');
INSERT INTO `xoops25_ranks` VALUES (4, 'Maestro', 351, 750, 0, 'rank3dbf8ea81e642.gif');
INSERT INTO `xoops25_ranks` VALUES (5, 'Guru', 751, 10000, 0, 'rank3dbf8eb1a72e7.gif');
INSERT INTO `xoops25_ranks` VALUES (6, 'Moderatore', 0, 0, 1, 'rank3dbf8edf15093.gif');
INSERT INTO `xoops25_ranks` VALUES (7, 'Webmaster', 0, 0, 1, 'rank3dbf8ee8681cd.gif');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_session`
-- 

CREATE TABLE `xoops25_session` (
  `sess_id` varchar(32) NOT NULL default '',
  `sess_updated` int(10) unsigned NOT NULL default '0',
  `sess_ip` varchar(15) NOT NULL default '',
  `sess_data` text,
  PRIMARY KEY  (`sess_id`),
  KEY `updated` (`sess_updated`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_session`
-- 

INSERT INTO `xoops25_session` VALUES ('bfjfupa1h8ve2ri3odfam2qsb7', 1278086838, '188.218.81.184', 'xoopsUserId|s:1:"1";xoopsUserGroups|a:2:{i:0;s:1:"1";i:1;s:1:"2";}settings|a:0:{}');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_smiles`
-- 

CREATE TABLE `xoops25_smiles` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `code` varchar(50) NOT NULL default '',
  `smile_url` varchar(100) NOT NULL default '',
  `emotion` varchar(75) NOT NULL default '',
  `display` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Dump dei dati per la tabella `xoops25_smiles`
-- 

INSERT INTO `xoops25_smiles` VALUES (1, ':-D', 'smil3dbd4d4e4c4f2.gif', 'Felice', 1);
INSERT INTO `xoops25_smiles` VALUES (2, ':-)', 'smil3dbd4d6422f04.gif', 'Sorridi', 1);
INSERT INTO `xoops25_smiles` VALUES (3, ':-(', 'smil3dbd4d75edb5e.gif', 'Triste', 1);
INSERT INTO `xoops25_smiles` VALUES (4, ':-o', 'smil3dbd4d8676346.gif', 'Sorpreso', 1);
INSERT INTO `xoops25_smiles` VALUES (5, ':-?', 'smil3dbd4d99c6eaa.gif', 'Confuso', 1);
INSERT INTO `xoops25_smiles` VALUES (6, '8-)', 'smil3dbd4daabd491.gif', 'Cool', 1);
INSERT INTO `xoops25_smiles` VALUES (7, ':lol:', 'smil3dbd4dbc14f3f.gif', 'Ridi', 1);
INSERT INTO `xoops25_smiles` VALUES (8, ':-x', 'smil3dbd4dcd7b9f4.gif', 'Matto', 1);
INSERT INTO `xoops25_smiles` VALUES (9, ':-P', 'smil3dbd4ddd6835f.gif', 'Linguetta', 1);
INSERT INTO `xoops25_smiles` VALUES (10, ':oops:', 'smil3dbd4df1944ee.gif', 'Imbarazzato', 0);
INSERT INTO `xoops25_smiles` VALUES (11, ':cry:', 'smil3dbd4e02c5440.gif', 'In lacrime', 0);
INSERT INTO `xoops25_smiles` VALUES (12, ':evil:', 'smil3dbd4e1748cc9.gif', 'Cattivo', 0);
INSERT INTO `xoops25_smiles` VALUES (13, ':roll:', 'smil3dbd4e29bbcc7.gif', 'Occhi roteanti', 0);
INSERT INTO `xoops25_smiles` VALUES (14, ';-)', 'smil3dbd4e398ff7b.gif', 'Occhiolino', 0);
INSERT INTO `xoops25_smiles` VALUES (15, ':pint:', 'smil3dbd4e4c2e742.gif', 'Brinda', 0);
INSERT INTO `xoops25_smiles` VALUES (16, ':hammer:', 'smil3dbd4e5e7563a.gif', 'Martello', 0);
INSERT INTO `xoops25_smiles` VALUES (17, ':idea:', 'smil3dbd4e7853679.gif', 'Idea', 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_tplfile`
-- 

CREATE TABLE `xoops25_tplfile` (
  `tpl_id` mediumint(7) unsigned NOT NULL auto_increment,
  `tpl_refid` smallint(5) unsigned NOT NULL default '0',
  `tpl_module` varchar(25) NOT NULL default '',
  `tpl_tplset` varchar(50) NOT NULL default '',
  `tpl_file` varchar(50) NOT NULL default '',
  `tpl_desc` varchar(255) NOT NULL default '',
  `tpl_lastmodified` int(10) unsigned NOT NULL default '0',
  `tpl_lastimported` int(10) unsigned NOT NULL default '0',
  `tpl_type` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`tpl_id`),
  KEY `tpl_refid` (`tpl_refid`,`tpl_type`),
  KEY `tpl_tplset` (`tpl_tplset`,`tpl_file`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- 
-- Dump dei dati per la tabella `xoops25_tplfile`
-- 

INSERT INTO `xoops25_tplfile` VALUES (1, 1, 'system', 'default', 'system_imagemanager.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (2, 1, 'system', 'default', 'system_imagemanager2.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (3, 1, 'system', 'default', 'system_userinfo.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (4, 1, 'system', 'default', 'system_userform.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (5, 1, 'system', 'default', 'system_rss.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (6, 1, 'system', 'default', 'system_redirect.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (7, 1, 'system', 'default', 'system_comment.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (8, 1, 'system', 'default', 'system_comments_flat.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (9, 1, 'system', 'default', 'system_comments_thread.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (10, 1, 'system', 'default', 'system_comments_nest.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (11, 1, 'system', 'default', 'system_siteclosed.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (12, 1, 'system', 'default', 'system_dummy.html', 'Dummy template file for holding non-template contents. This should not be edited.', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (13, 1, 'system', 'default', 'system_notification_list.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (14, 1, 'system', 'default', 'system_notification_select.html', '', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (15, 1, 'system', 'default', 'system_block_dummy.html', 'Dummy template for custom blocks or blocks without templates', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (16, 1, 'system', 'default', 'system_homepage.html', 'Homepage template', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (17, 1, 'system', 'default', 'system_bannerlogin.html', 'Banner Login', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (18, 1, 'system', 'default', 'system_banner.html', 'Banner Login', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (19, 1, 'system', 'default', 'system_bannerdisplay.html', 'Banner Login', 1278086514, 1278086514, 'module');
INSERT INTO `xoops25_tplfile` VALUES (20, 1, 'system', 'default', 'system_block_user.html', 'Shows user block', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (21, 2, 'system', 'default', 'system_block_login.html', 'Shows login form', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (22, 3, 'system', 'default', 'system_block_search.html', 'Shows search form block', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (23, 4, 'system', 'default', 'system_block_waiting.html', 'Shows contents waiting for approval', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (24, 5, 'system', 'default', 'system_block_mainmenu.html', 'Shows the main navigation menu of the site', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (25, 6, 'system', 'default', 'system_block_siteinfo.html', 'Shows basic info about the site and a link to Recommend Us pop up window', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (26, 7, 'system', 'default', 'system_block_online.html', 'Displays users/guests currently online', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (27, 8, 'system', 'default', 'system_block_topusers.html', 'Top posters', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (28, 9, 'system', 'default', 'system_block_newusers.html', 'Shows most recent users', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (29, 10, 'system', 'default', 'system_block_comments.html', 'Shows most recent comments', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (30, 11, 'system', 'default', 'system_block_notification.html', 'Shows notification options', 1278086514, 1278086514, 'block');
INSERT INTO `xoops25_tplfile` VALUES (31, 12, 'system', 'default', 'system_block_themes.html', 'Shows theme selection box', 1278086514, 1278086514, 'block');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_tplset`
-- 

CREATE TABLE `xoops25_tplset` (
  `tplset_id` int(7) unsigned NOT NULL auto_increment,
  `tplset_name` varchar(50) NOT NULL default '',
  `tplset_desc` varchar(255) NOT NULL default '',
  `tplset_credits` text,
  `tplset_created` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tplset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `xoops25_tplset`
-- 

INSERT INTO `xoops25_tplset` VALUES (1, 'default', 'XOOPS Default Template Set', '', 1278086514);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_tplsource`
-- 

CREATE TABLE `xoops25_tplsource` (
  `tpl_id` mediumint(7) unsigned NOT NULL default '0',
  `tpl_source` mediumtext,
  KEY `tpl_id` (`tpl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dump dei dati per la tabella `xoops25_tplsource`
-- 

INSERT INTO `xoops25_tplsource` VALUES (1, '<!DOCTYPE html PUBLIC ''-//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\n<head>\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\n<title><{$sitename}> <{$lang_imgmanager}></title>\n<script type="text/javascript">\n<!--//\nfunction appendCode(addCode) {\n	var targetDom = window.opener.xoopsGetElementById(''<{$target}>'');\n	if (targetDom.createTextRange && targetDom.caretPos){\n  		var caretPos = targetDom.caretPos;\n		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == '' '' ? addCode + '' '' : addCode;  \n	} else if (targetDom.getSelection && targetDom.caretPos) {\n		var caretPos = targetDom.caretPos;\n		caretPos.text = caretPos.text.charat(caretPos.text.length - 1) == '' '' ? addCode + '' '' : addCode;\n	} else {\n		targetDom.value = targetDom.value + addCode;\n  	}\n	window.close();\n	return;\n}\n//-->\n</script>\n<style type="text/css" media="all">\nbody {margin: 0;}\nimg {border: 0;}\ntable {width: 100%; margin: 0;}\na:link {color: #3a76d6; font-weight: bold; background-color: transparent;}\na:visited {color: #9eb2d6; font-weight: bold; background-color: transparent;}\na:hover {color: #e18a00; background-color: transparent;}\ntable td {background-color: white; font-size: 12px; padding: 0; border-width: 0; vertical-align: top; font-family: Verdana, Arial, Helvetica, sans-serif;}\ntable#imagenav td {vertical-align: bottom; padding: 5px;}\ntable#imagemain td {border-right: 1px solid silver; border-bottom: 1px solid silver; padding: 5px; vertical-align: middle;}\ntable#imagemain th {border: 0; background-color: #2F5376; color:white; font-size: 12px; padding: 5px; vertical-align: top; text-align:center; font-family: Verdana, Arial, Helvetica, sans-serif;}\ntable#header td {width: 100%; background-color: #2F5376; vertical-align: middle;}\ntable#header td#headerbar {border-bottom: 1px solid silver; background-color: #dddddd;}\ndiv#pagenav {text-align:center;}\ndiv#footer {text-align:right; padding: 5px;}\n</style>\n\n<{php}> \n$language = $GLOBALS[''xoopsConfig''][''language''];\nif(file_exists(XOOPS_ROOT_PATH.''/language/''.$language.''/style.css'')){ \necho "<link rel=\\"stylesheet\\" type=\\"text/css\\" media=\\"all\\" href=\\"language/$language/style.css\\" />";\n}\n<{/php}>\n\n</head>\n\n<body onload="window.resizeTo(<{$xsize}>, <{$ysize}>);">\n  <table id="header" cellspacing="0">\n    <tr>\n      <td><a href="<{$xoops_url}>/" title=""><img src="<{$xoops_url}>/images/logo.gif" width="150" height="80" alt="" /></a></td><td> </td>\n    </tr>\n    <tr>\n      <td id="headerbar" colspan="2"> </td>\n    </tr>\n  </table>\n\n  <form action="imagemanager.php" method="get">\n    <table cellspacing="0" id="imagenav">\n      <tr>\n        <td>\n          <select name="cat_id" onchange="location=''<{$xoops_url}>/imagemanager.php?target=<{$target}>&cat_id=''+this.options[this.selectedIndex].value"><{$cat_options}></select> <input type="hidden" name="target" value="<{$target}>" /><input type="submit" value="<{$lang_go}>" />\n        </td>\n\n        <{if $show_cat > 0}>\n        <td align="right"><a href="<{$xoops_url}>/imagemanager.php?target=<{$target}>&op=upload&imgcat_id=<{$show_cat}>" title="<{$lang_addimage}>"><{$lang_addimage}></a></td>\n        <{/if}>\n\n      </tr>\n    </table>\n  </form>\n\n  <{if $image_total > 0}>\n\n  <table cellspacing="0" id="imagemain">\n    <tr>\n      <th><{$lang_imagename}></th>\n      <th><{$lang_image}></th>\n      <th><{$lang_imagemime}></th>\n      <th><{$lang_align}></th>\n    </tr>\n\n    <{section name=i loop=$images}>\n    <tr align="center">\n      <td><input type="hidden" name="image_id[]" value="<{$images[i].id}>" /><{$images[i].nicename}></td>\n      <td><img src="<{$images[i].src}>" alt="" /></td>\n      <td><{$images[i].mimetype}></td>\n      <td><a href="#" title="" onclick="javascript:appendCode(''<{$images[i].lxcode}>'');"><img src="<{$xoops_url}>/images/alignleft.gif" alt="Left" /></a> <a href="#" title="" onclick="javascript:appendCode(''<{$images[i].xcode}>'');"><img src="<{$xoops_url}>/images/aligncenter.gif" alt="Center" /></a> <a href="#" title="" onclick="javascript:appendCode(''<{$images[i].rxcode}>'');"><img src="<{$xoops_url}>/images/alignright.gif" alt="Right" /></a></td>\n    </tr>\n    <{/section}>\n  </table>\n\n  <{/if}>\n\n  <div id="pagenav"><{$pagenav}></div>\n\n  <div id="footer">\n    <input value="<{$lang_close}>" type="button" onclick="javascript:window.close();" />\n  </div>\n\n  </body>\n</html>');
INSERT INTO `xoops25_tplsource` VALUES (2, '<!DOCTYPE html PUBLIC ''-//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\n<head>\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\n<title><{$xoops_sitename}> <{$lang_imgmanager}></title>\n<{$image_form.javascript}>\n<style type="text/css" media="all">\nbody {margin: 0;}\nimg {border: 0;}\ntable {width: 100%; margin: 0;}\na:link {color: #3a76d6; font-weight: bold; background-color: transparent;}\na:visited {color: #9eb2d6; font-weight: bold; background-color: transparent;}\na:hover {color: #e18a00; background-color: transparent;}\ntable td {background-color: white; font-size: 12px; padding: 0; border-width: 0; vertical-align: top; font-family: Verdana, Arial, Helvetica, sans-serif;}\ntable#imagenav td {vertical-align: bottom; padding: 5px;}\ntd.body {padding: 5px; vertical-align: middle;}\ntd.caption {border: 0; background-color: #2F5376; color:white; font-size: 12px; padding: 5px; vertical-align: top; text-align:left; font-family: Verdana, Arial, Helvetica, sans-serif;}\ntable#imageform {border: 1px solid silver;}\ntable#header td {width: 100%; background-color: #2F5376; vertical-align: middle;}\ntable#header td#headerbar {border-bottom: 1px solid silver; background-color: #dddddd;}\ndiv#footer {text-align:right; padding: 5px;}\n</style>\n\n<{php}> \n$language = $GLOBALS[''xoopsConfig''][''language''];\nif(file_exists(XOOPS_ROOT_PATH.''/language/''.$language.''/style.css'')){ \necho "<link rel=\\"stylesheet\\" type=\\"text/css\\" media=\\"all\\" href=\\"language/$language/style.css\\" />";\n}\n<{/php}>\n\n</head>\n\n<body onload="window.resizeTo(<{$xsize}>, <{$ysize}>);">\n  <table id="header" cellspacing="0">\n    <tr>\n      <td><a href="<{$xoops_url}>/" title=""><img src="<{$xoops_url}>/images/logo.gif" width="150" height="80" alt="" /></a></td><td> </td>\n    </tr>\n    <tr>\n      <td id="headerbar" colspan="2"> </td>\n    </tr>\n  </table>\n\n  <table cellspacing="0" id="imagenav">\n    <tr>\n      <td align="left"><a href="<{$xoops_url}>/imagemanager.php?target=<{$target}>&amp;cat_id=<{$show_cat}>" title="<{$lang_imgmanager}>"><{$lang_imgmanager}></a></td>\n    </tr>\n  </table>\n\n  <form name="<{$image_form.name}>" id="<{$image_form.name}>" action="<{$image_form.action}>" method="<{$image_form.method}>" <{$image_form.extra}>>\n    <table id="imageform" cellspacing="0">\n    <!-- start of form elements loop -->\n    <{foreach item=element from=$image_form.elements}>\n      <{if $element.hidden != true}>\n      <tr valign="top">\n        <td class="caption"><{$element.caption}></td>\n        <td class="body"><{$element.body}></td>\n      </tr>\n      <{else}>\n      <{$element.body}>\n      <{/if}>\n    <{/foreach}>\n    <!-- end of form elements loop -->\n    </table>\n  </form>\n\n\n  <div id="footer">\n    <input value="<{$lang_close}>" type="button" onclick="javascript:window.close();" />\n  </div>\n\n  </body>\n</html>');
INSERT INTO `xoops25_tplsource` VALUES (3, '<{if $user_ownpage == true}>\n\n<form name="usernav" action="user.php" method="post">\n\n<br /><br />\n\n<table width="70%" align="center" border="0">\n  <tr align="center">\n    <td><input type="button" value="<{$lang_editprofile}>" onclick="location=''edituser.php''" />\n    <input type="button" value="<{$lang_avatar}>" onclick="location=''edituser.php?op=avatarform''" />\n    <input type="button" value="<{$lang_inbox}>" onclick="location=''viewpmsg.php''" />\n\n    <{if $user_candelete == true}>\n    <input type="button" value="<{$lang_deleteaccount}>" onclick="location=''user.php?op=delete''" />\n    <{/if}>\n\n    <input type="button" value="<{$lang_logout}>" onclick="location=''user.php?op=logout''" /></td>\n  </tr>\n</table>\n</form>\n\n<br /><br />\n<{elseif $xoops_isadmin != false}>\n\n<br /><br />\n\n<table width="70%" align="center" border="0">\n  <tr align="center">\n    <td><input type="button" value="<{$lang_editprofile}>" onclick="location=''<{$xoops_url}>/modules/system/admin.php?fct=users&amp;uid=<{$user_uid}>&amp;op=modifyUser''" />\n    <input type="button" value="<{$lang_deleteaccount}>" onclick="location=''<{$xoops_url}>/modules/system/admin.php?fct=users&amp;op=delUser&amp;uid=<{$user_uid}>''" />\n  </tr>\n</table>\n\n<br /><br />\n<{/if}>\n\n<table width="100%" border="0" cellspacing="5">\n  <tr valign="top">\n    <td width="50%">\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\n        <tr>\n          <th colspan="2" align="center"><{$lang_allaboutuser}></th>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_avatar}></td>\n          <td align="center" class="even"><img src="<{$user_avatarurl}>" alt="Avatar" /></td>\n        </tr>\n        <tr>\n          <td class="head"><{$lang_realname}></td>\n          <td align="center" class="odd"><{$user_realname}></td>\n        </tr>\n        <tr>\n          <td class="head"><{$lang_website}></td>\n          <td class="even"><{$user_websiteurl}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_email}></td>\n          <td class="odd"><{$user_email}></td>\n        </tr>\n        <{if !$user_ownpage == true}>\n        <tr valign="top">\n          <td class="head"><{$lang_privmsg}></td>\n          <td class="even"><{$user_pmlink}></td>\n        </tr>\n        <{/if}>\n        <tr valign="top">\n          <td class="head"><{$lang_icq}></td>\n          <td class="odd"><{$user_icq}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_aim}></td>\n          <td class="even"><{$user_aim}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_yim}></td>\n          <td class="odd"><{$user_yim}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_msnm}></td>\n          <td class="even"><{$user_msnm}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_location}></td>\n          <td class="odd"><{$user_location}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_occupation}></td>\n          <td class="even"><{$user_occupation}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_interest}></td>\n          <td class="odd"><{$user_interest}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_extrainfo}></td>\n          <td class="even"><{$user_extrainfo}></td>\n        </tr>\n      </table>\n    </td>\n    <td width="50%">\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\n        <tr valign="top">\n          <th colspan="2" align="center"><{$lang_statistics}></th>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_membersince}></td>\n          <td align="center" class="even"><{$user_joindate}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_rank}></td>\n          <td align="center" class="odd"><{$user_rankimage}><br /><{$user_ranktitle}></td>\n        </tr>\n        <tr valign="top">\n          <td class="head"><{$lang_posts}></td>\n          <td align="center" class="even"><{$user_posts}></td>\n        </tr>\n    <tr valign="top">\n          <td class="head"><{$lang_lastlogin}></td>\n          <td align="center" class="odd"><{$user_lastlogin}></td>\n        </tr>\n      </table>\n      <br />\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\n        <tr valign="top">\n          <th colspan="2" align="center"><{$lang_signature}></th>\n        </tr>\n        <tr valign="top">\n          <td class="even"><{$user_signature}></td>\n        </tr>\n      </table>\n    </td>\n  </tr>\n</table>\n\n<!-- start module search results loop -->\n<{foreach item=module from=$modules}>\n\n<br style="clear: both;" />\n<h4><{$module.name}></h4>\n\n  <!-- start results item loop -->\n  <{foreach item=result from=$module.results}>\n\n  <img src="<{$result.image}>" alt="<{$module.name}>" /><b><a href="<{$result.link}>" title="<{$result.title}>"><{$result.title}></a></b><br /><small>(<{$result.time}>)</small><br />\n\n  <{/foreach}>\n  <!-- end results item loop -->\n\n<{$module.showall_link}>\n\n\n<{/foreach}>\n<!-- end module search results loop -->\n');
INSERT INTO `xoops25_tplsource` VALUES (4, '<fieldset style="padding: 10px;">\n  <legend style="font-weight: bold;"><{$lang_login}></legend>\n  <form action="user.php" method="post">\n    <{$lang_username}> <input type="text" name="uname" size="26" maxlength="25" value="<{$usercookie}>" /><br /><br />\n    <{$lang_password}> <input type="password" name="pass" size="21" maxlength="32" /><br /><br />\n    <{if isset($lang_rememberme)}>\n        <input type="checkbox" name="rememberme" value="On" checked /> <{$lang_rememberme}><br /><br />\n    <{/if}>\n    \n    <input type="hidden" name="op" value="login" />\n    <input type="hidden" name="xoops_redirect" value="<{$redirect_page}>" />\n    <input type="submit" value="<{$lang_login}>" />\n  </form>\n  <br />\n  <a name="lost"></a>\n  <div><{$lang_notregister}><br /></div>\n</fieldset>\n\n<br />\n\n<fieldset style="padding: 10px;">\n  <legend style="font-weight: bold;"><{$lang_lostpassword}></legend>\n  <div><br /><{$lang_noproblem}></div>\n  <form action="lostpass.php" method="post">\n    <{$lang_youremail}> <input type="text" name="email" size="26" maxlength="60" />&nbsp;&nbsp;<input type="hidden" name="op" value="mailpasswd" /><input type="hidden" name="t" value="<{$mailpasswd_token}>" /><input type="submit" value="<{$lang_sendpassword}>" />\n  </form>\n</fieldset>');
INSERT INTO `xoops25_tplsource` VALUES (5, '<?xml version="1.0" encoding="UTF-8"?>\n<rss version="2.0">\n  <channel>\n    <title><{$channel_title}></title>\n    <link><{$channel_link}></link>\n    <description><{$channel_desc}></description>\n    <lastBuildDate><{$channel_lastbuild}></lastBuildDate>\n    <docs>http://backend.userland.com/rss/</docs>\n    <generator><{$channel_generator}></generator>\n    <category><{$channel_category}></category>\n    <managingEditor><{$channel_editor}></managingEditor>\n    <webMaster><{$channel_webmaster}></webMaster>\n    <language><{$channel_language}></language>\n    <{if $image_url != ""}>\n    <image>\n      <title><{$channel_title}></title>\n      <url><{$image_url}></url>\n      <link><{$channel_link}></link>\n      <width><{$image_width}></width>\n      <height><{$image_height}></height>\n    </image>\n    <{/if}>\n    <{foreach item=item from=$items}>\n    <item>\n      <title><{$item.title}></title>\n      <link><{$item.link}></link>\n      <description><{$item.description}></description>\n      <pubDate><{$item.pubdate}></pubDate>\n      <guid><{$item.guid}></guid>\n    </item>\n    <{/foreach}>\n  </channel>\n</rss>');
INSERT INTO `xoops25_tplsource` VALUES (6, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html>\n<head>\n<meta http-equiv="Content-Type" content="text/html; charset=<{$xoops_charset}>" />\n<meta http-equiv="Refresh" content="<{$time}>; url=<{$url}>" />\n<meta name="generator" content="XOOPS" />\n<link rel="shortcut icon" type="image/ico" href="<{$xoops_url}>/favicon.ico" />\n<title><{$xoops_sitename}></title>\n<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_themecss}>" />\n</head>\n<body>\n<div style="text-align:center; background-color: #EBEBEB; border-top: 1px solid #FFFFFF; border-left: 1px solid #FFFFFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight : bold;">\n  <h4><{$message}></h4>\n  <p><{$lang_ifnotreload}></p>\n</div>\n<{if $xoops_logdump != ''''}><div><{$xoops_logdump}></div><{/if}>\n</body>\n</html>\n');
INSERT INTO `xoops25_tplsource` VALUES (7, '<!-- start comment post -->\n        <tr>\n          <td class="head"><a id="comment<{$comment.id}>"></a> <{$comment.poster.uname}></td>\n          <td class="head"><div class="comDate"><span class="comDateCaption"><{$lang_posted}>:</span> <{$comment.date_posted}>&nbsp;&nbsp;<span class="comDateCaption"><{$lang_updated}>:</span> <{$comment.date_modified}></div></td>\n        </tr>\n        <tr>\n\n          <{if $comment.poster.id != 0}>\n\n          <td class="odd"><div class="comUserRank"><div class="comUserRankText"><{$comment.poster.rank_title}></div><img class="comUserRankImg" src="<{$xoops_upload_url}>/<{$comment.poster.rank_image}>" alt="" /></div><img class="comUserImg" src="<{$xoops_upload_url}>/<{$comment.poster.avatar}>" alt="" /><div class="comUserStat"><span class="comUserStatCaption"><{$lang_joined}>:</span> <{$comment.poster.regdate}></div><div class="comUserStat"><span class="comUserStatCaption"><{$lang_from}>:</span> <{$comment.poster.from}></div><div class="comUserStat"><span class="comUserStatCaption"><{$lang_posts}>:</span> <{$comment.poster.postnum}></div><div class="comUserStatus"><{$comment.poster.status}></div></td>\n\n          <{else}>\n\n          <td class="odd"> </td>\n\n          <{/if}>\n\n          <td class="odd">\n            <div class="comTitle"><{$comment.image}><{$comment.title}></div><div class="comText"><{$comment.text}></div>\n          </td>\n        </tr>\n        <tr>\n          <td class="even"></td>\n\n          <{if $xoops_iscommentadmin == true}>\n\n          <td class="even" align="right">\n            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_edit}>"><img src="<{$xoops_url}>/images/icons/edit.gif" alt="<{$lang_edit}>" /></a><a href="<{$deletecomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_delete}>"><img src="<{$xoops_url}>/images/icons/delete.gif" alt="<{$lang_delete}>" /></a><a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_reply}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\n          </td>\n\n          <{elseif $xoops_isuser == true && $xoops_userid == $comment.poster.id}>\n\n          <td class="even" align="right">\n            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_edit}>"><img src="<{$xoops_url}>/images/icons/edit.gif" alt="<{$lang_edit}>" /></a><a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_reply}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\n          </td>\n\n          <{elseif $xoops_isuser == true || $anon_canpost == true}>\n\n          <td class="even" align="right">\n            <a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\n          </td>\n\n          <{else}>\n\n          <td class="even"> </td>\n\n          <{/if}>\n\n        </tr>\n<!-- end comment post -->');
INSERT INTO `xoops25_tplsource` VALUES (8, '<table class="outer" cellpadding="5" cellspacing="1">\n  <tr>\n    <th width="20%"><{$lang_poster}></th>\n    <th><{$lang_thread}></th>\n  </tr>\n  <{foreach item=comment from=$comments}>\n    <{include file="db:system_comment.html" comment=$comment}>\n  <{/foreach}>\n</table>');
INSERT INTO `xoops25_tplsource` VALUES (9, '<{section name=i loop=$comments}>\n<br />\n<table cellspacing="1" class="outer">\n  <tr>\n    <th width="20%"><{$lang_poster}></th>\n    <th><{$lang_thread}></th>\n  </tr>\n  <{include file="db:system_comment.html" comment=$comments[i]}>\n</table>\n\n<{if $show_threadnav == true}>\n<div style="text-align:left; margin:3px; padding: 5px;">\n<a href="<{$comment_url}>" title="<{$lang_top}>"><{$lang_top}></a> | <a href="<{$comment_url}>&amp;com_id=<{$comments[i].pid}>&amp;com_rootid=<{$comments[i].rootid}>#newscomment<{$comments[i].pid}>"><{$lang_parent}></a>\n</div>\n<{/if}>\n\n<{if $comments[i].show_replies == true}>\n<!-- start comment tree -->\n<br />\n<table cellspacing="1" class="outer">\n  <tr>\n    <th width="50%"><{$lang_subject}></th>\n    <th width="20%" align="center"><{$lang_poster}></th>\n    <th align="right"><{$lang_posted}></th>\n  </tr>\n  <{foreach item=reply from=$comments[i].replies}>\n  <tr>\n    <td class="even"><{$reply.prefix}> <a href="<{$comment_url}>&amp;com_id=<{$reply.id}>&amp;com_rootid=<{$reply.root_id}>" title="<{$reply.title}>"><{$reply.title}></a></td>\n    <td class="odd" align="center"><{$reply.poster.uname}></td>\n    <td class="even" align="right"><{$reply.date_posted}></td>\n  </tr>\n  <{/foreach}>\n</table>\n<!-- end comment tree -->\n<{/if}>\n\n<{/section}>');
INSERT INTO `xoops25_tplsource` VALUES (10, '<{section name=i loop=$comments}>\n<br />\n<table cellspacing="1" class="outer">\n  <tr>\n    <th width="20%"><{$lang_poster}></th>\n    <th><{$lang_thread}></th>\n  </tr>\n  <{include file="db:system_comment.html" comment=$comments[i]}>\n</table>\n\n<!-- start comment replies -->\n<{foreach item=reply from=$comments[i].replies}>\n<br />\n<table cellspacing="0" border="0">\n  <tr>\n    <td width="<{$reply.prefix}>"></td>\n    <td>\n      <table class="outer" cellspacing="1">\n        <tr>\n          <th width="20%"><{$lang_poster}></th>\n          <th><{$lang_thread}></th>\n        </tr>\n        <{include file="db:system_comment.html" comment=$reply}>\n      </table>\n    </td>\n  </tr>\n</table>\n<{/foreach}>\n<!-- end comment tree -->\n<{/section}>');
INSERT INTO `xoops25_tplsource` VALUES (11, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\n<head>\n	<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\n	<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\n	<title><{$xoops_sitename}></title>\n	<meta name="robots" content="<{$xoops_meta_robots}>" />\n	<meta name="keywords" content="<{$xoops_meta_keywords}>" />\n	<meta name="description" content="<{$xoops_meta_description}>" />\n	<meta name="rating" content="<{$xoops_meta_rating}>" />\n	<meta name="author" content="<{$xoops_meta_author}>" />\n	<meta name="copyright" content="<{$xoops_meta_copyright}>" />\n	<meta name="generator" content="XOOPS" />\n	\n	<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_url}>/xoops.css" />\n	<link rel="shortcut icon" type="image/ico" href="<{xoAppUrl favicon.ico}>" />\n	\n</head>\n<body>\n  <table cellspacing="0">\n    <tr id="header">\n      <td style="width: 150px; background-color: #2F5376; vertical-align: middle; text-align:center;"><a href="<{$xoops_url}>/" title=""><img src="<{$xoops_imageurl}>logo.gif" width="150" alt="" /></a></td>\n      <td style="width: 100%; background-color: #2F5376; vertical-align: middle; text-align:center;">&nbsp;</td>\n    </tr>\n    <tr>\n      <td style="height: 8px; border-bottom: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>\n    </tr>\n  </table>\n\n  <table cellspacing="1" align="center" width="80%" border="0" cellpadding="10">\n    <tr>\n      <td align="center"><div style="background-color: #DDFFDF; color: #136C99; text-align: center; border-top: 1px solid #DDDDFF; border-left: 1px solid #DDDDFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight: bold; padding: 10px;"><{$lang_siteclosemsg}></div></td>\n    </tr>\n  </table>\n  \n  <form action="<{$xoops_url}>/user.php" method="post">\n    <table cellspacing="0" align="center" style="border: 1px solid silver; width: 200px;">\n      <tr>\n        <th style="background-color: #2F5376; color: #FFFFFF; padding : 2px; vertical-align : middle;" colspan="2"><{$lang_login}></th>\n      </tr>\n      <tr>\n        <td style="padding: 2px;"><{$lang_username}></td><td style="padding: 2px;"><input type="text" name="uname" size="12" value="" /></td>\n      </tr>\n      <tr>\n        <td style="padding: 2px;"><{$lang_password}></td><td style="padding: 2px;"><input type="password" name="pass" size="12" /></td>\n      </tr>\n      <tr>\n        <td style="padding: 2px;">&nbsp;</td>\n        <td style="padding: 2px;">\n        	<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />\n        	<input type="hidden" name="xoops_login" value="1" />\n        	<input type="submit" value="<{$lang_login}>" /></td>\n      </tr>\n    </table>\n  </form>\n\n  <table cellspacing="0" width="100%">\n    <tr>\n      <td style="height:8px; border-bottom: 1px solid silver; border-top: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>\n    </tr>\n  </table>\n\n  </body>\n</html>');
INSERT INTO `xoops25_tplsource` VALUES (12, '<{$dummy_content}>');
INSERT INTO `xoops25_tplsource` VALUES (13, '<h4><{$lang_activenotifications}></h4>\n<form name="notificationlist" action="notifications.php" method="post">\n<table class="outer">\n  <tr>\n	<th><input name="allbox" id="allbox" onclick="xoopsCheckAll(''notificationlist'', ''allbox'');" type="checkbox" value="<{$lang_checkall}>" /></th>\n    <th><{$lang_event}></th>\n    <th><{$lang_category}></th>\n    <th><{$lang_itemid}></th>\n    <th><{$lang_itemname}></th>\n  </tr>\n  <{foreach item=module from=$modules}>\n  <tr>\n    <td class="head"><input name="del_mod[<{$module.id}>]" id="del_mod[]" onclick="xoopsCheckGroup(''notificationlist'', ''del_mod[<{$module.id}>]'', ''del_not[<{$module.id}>][]'');" type="checkbox" value="<{$module.id}>" /></td>\n    <td class="head" colspan="4"><{$lang_module}>: <{$module.name}></td>\n  </tr>\n  <{foreach item=category from=$module.categories}>\n  <{foreach item=item from=$category.items}>\n  <{foreach item=notification from=$item.notifications}>\n  <tr>\n    <{cycle values=odd,even assign=class}>\n    <td class="<{$class}>"><input type="checkbox" name="del_not[<{$module.id}>][]" id="del_not[<{$module.id}>]" value="<{$notification.id}>" /></td>\n    <td class="<{$class}>"><{$notification.event_title}></td>\n    <td class="<{$class}>"><{$notification.category_title}></td>\n    <td class="<{$class}>"><{if $item.id != 0}><{$item.id}><{/if}></td>\n    <td class="<{$class}>"><{if $item.id != 0}><{if $item.url != ''''}><a href="<{$item.url}>" title="<{$item.name}>"><{/if}><{$item.name}><{if $item.url != ''''}></a><{/if}><{/if}></td>\n  </tr>\n  <{/foreach}>\n  <{/foreach}>\n  <{/foreach}>\n  <{/foreach}>\n  <tr>\n    <td class="foot" colspan="5">\n      <input type="submit" name="delete_cancel" value="<{$lang_cancel}>" />\n      <input type="reset" name="delete_reset" value="<{$lang_clear}>" />\n      <input type="submit" name="delete" value="<{$lang_delete}>" />\n      <input type="hidden" name="XOOPS_TOKEN_REQUEST" value="<{$notification_token}>" />\n    </td>\n  </tr>\n</table>\n</form>\n');
INSERT INTO `xoops25_tplsource` VALUES (14, '<{if $xoops_notification.show}>\n<form name="notification_select" action="<{$xoops_notification.target_page}>" method="post">\n<h4 style="text-align:center;"><{$lang_activenotifications}></h4>\n<input type="hidden" name="not_redirect" value="<{$xoops_notification.redirect_script}>" />\n<input type="hidden" name="XOOPS_TOKEN_REQUEST" value="<{php}>echo $GLOBALS[''xoopsSecurity'']->createToken();<{/php}>" />\n<table class="outer">\n  <tr><th colspan="3"><{$lang_notificationoptions}></th></tr>\n  <tr>\n    <td class="head"><{$lang_category}></td>\n    <td class="head"><input name="allbox" id="allbox" onclick="xoopsCheckAll(''notification_select'',''allbox'');" type="checkbox" value="<{$lang_checkall}>" /></td>\n    <td class="head"><{$lang_events}></td>\n  </tr>\n  <{foreach name=outer item=category from=$xoops_notification.categories}>\n  <{foreach name=inner item=event from=$category.events}>\n  <tr>\n    <{if $smarty.foreach.inner.first}>\n    <td class="even" rowspan="<{$smarty.foreach.inner.total}>"><{$category.title}></td>\n    <{/if}>\n    <td class="odd">\n    <{counter assign=index}>\n    <input type="hidden" name="not_list[<{$index}>][params]" value="<{$category.name}>,<{$category.itemid}>,<{$event.name}>" />\n    <input type="checkbox" id="not_list[]" name="not_list[<{$index}>][status]" value="1" <{if $event.subscribed}>checked="checked"<{/if}> />\n    </td>\n    <td class="odd"><{$event.caption}></td>\n  </tr>\n  <{/foreach}>\n  <{/foreach}>\n  <tr>\n    <td class="foot" colspan="3" align="center"><input type="submit" name="not_submit" value="<{$lang_updatenow}>" /></td>\n  </tr>\n</table>\n<div align="center">\n<{$lang_notificationmethodis}>:&nbsp;<{$user_method}>&nbsp;&nbsp;[<a href="<{$editprofile_url}>" title="<{$lang_change}>"><{$lang_change}></a>]\n</div>\n</form>\n<{/if}>');
INSERT INTO `xoops25_tplsource` VALUES (15, '<{$block.content}>');
INSERT INTO `xoops25_tplsource` VALUES (16, '\n');
INSERT INTO `xoops25_tplsource` VALUES (17, '<div id="login_window">\n<h2 class=''content_title''><{$smarty.const._BANNERS_LOGIN_TITLE}></h2>\n<form method=''post'' action=''banners.php'' class=''login_form''>\n <div class=''credentials''>\n  <label for=''login_form-login''><{$smarty.const._BANNERS_LOGIN_LOGIN}></label>\n  <input type=''text'' name=''login'' id=''login_form-login'' value='''' /><br />\n  <label for=''login_form-password''><{$smarty.const._BANNERS_LOGIN_PASS}></label>\n  <input type=''password'' name=''pass'' id=''login_form-password'' value='''' /><br />\n </div>\n <div class=''actions''>\n 	<input type=''hidden'' name=''op'' value=''list'' />\n	<button type=''submit''><{$smarty.const._BANNERS_LOGIN_OK}></button></div>\n <div class=''login_info''><{$smarty.const._BANNERS_LOGIN_INFO}></div>\n <{$TOKEN}>\n</form>\n</div>');
INSERT INTO `xoops25_tplsource` VALUES (18, '<h1><{$smarty.const._BANNERS_MANAGEMENT}></h1>\n<h5><{$welcomeuser}></h5>\n<div style="text-align: center;"><a href="banners.php?op=logout" title="<{$smarty.const._BANNERS_LOGOUT}>"><{$smarty.const._BANNERS_LOGOUT}></a></div>\n<h4 class="content_title"><{$smarty.const._BANNERS_TITLE}></h4>\n<table cellpadding="2" cellspacing="1" summary="" class="outer">\n	<tr style="text-align: center;">\n		<th><{$smarty.const._BANNERS_NO}></th>\n		<th><{$smarty.const._BANNERS_IMP_MADE}></th>\n		<th><{$smarty.const._BANNERS_IMP_TOTAL}></th>\n		<th><{$smarty.const._BANNERS_IMP_LEFT}></th>\n		<th><{$smarty.const._BANNERS_CLICKS}></th>\n		<th><{$smarty.const._BANNERS_PER_CLICKS}></th>\n		<th><{$smarty.const._BANNERS_FUNCTIONS}></th>\n	</tr>\n	<{if $bcount}>\n		<{foreach item=banner from=$banners}>\n			<tr style=''text-align: center;'' class=''even''>\n				<td><{$banner.bid}></td>\n			    <td><{$banner.impmade}></td>\n			    <td><{$banner.imptotal}></td>\n			    <td><{$banner.left}></td>\n			    <td><{$banner.clicks}></td>\n			    <td><{$banner.percent}>%</td>\n			    <td>\n					<a href="banners.php?op=banner_email&amp;cid=<{$banner.cid}>&amp;bid=<{$banner.bid}>" title="<{$smarty.const._BANNERS_STATS}>"><{$smarty.const._BANNERS_STATS}></a>\n			        <a href="banners.php?op=banner_display&amp;cid=<{$banner.cid}>" title="<{$banner.bid}>"><{$smarty.const._BANNERS_SHOWBANNER}></a>\n				</td>\n			</tr>\n		<{/foreach}>\n	<{else}>\n		<tr>\n			<td class=''even'' style=''text-align: center;'' colspan=''7''><{$smarty.const._BANNERS_NOTHINGFOUND}></td>\n		</tr>\n	<{/if}>\n	<tr>\n		<td class="head" colspan="7">&nbsp;</td>\n	</tr>\n</table><br /><br />\n\n<h4 class=''content_title''><{$smarty.const._BANNERS_FINISHED}></h4>\n\n<table cellpadding=''2'' cellspacing=''1'' summary='''' class = ''outer''>\n	<tr style=''text-align: center;''>\n		<th><{$smarty.const._BANNERS_NO}></th>\n		<th><{$smarty.const._BANNERS_IMP_MADE}></th>\n		<th><{$smarty.const._BANNERS_CLICKS}></th>\n		<th><{$smarty.const._BANNERS_PER_CLICKS}></th>\n		<th><{$smarty.const._BANNERS_STARTED}></th>\n		<th><{$smarty.const._BANNERS_ENDED}></th>\n	</tr>\n	<{if $bcount}>\n		<{foreach item=ebanner from=$ebanners}>\n			<tr style=''text-align: center;'' class=''even''>\n				<td><{$ebanner.bid}></td>\n			    <td><{$ebanner.impressions}></td>\n			    <td><{$ebanner.clicks}></td>\n			    <td><{$ebanner.percent}></td>\n			    <td><{$ebanner.datestart}></td>\n			    <td><{$ebanner.dateend}>%</td>\n			</tr>\n		<{/foreach}>\n	<{else}>\n		<tr>\n			<td class=''even'' style=''text-align: center;'' colspan=''7''><{$smarty.const._BANNERS_NOTHINGFOUND}></td>\n		</tr>\n	<{/if}>\n	<tr>\n		<td class=''head'' colspan=''7''>&nbsp;</td>\n	</tr>\n</table><br />');
INSERT INTO `xoops25_tplsource` VALUES (19, '<h1><{$smarty.const._BANNERS_MANAGEMENT}></h1>\n<h5><{$welcomeuser}></h5>\n<div style="text-align: center;"><a href="banners.php?op=logout" title="<{$smarty.const._BANNERS_LOGOUT}>"><{$smarty.const._BANNERS_LOGOUT}></a></div>\n<div style="text-align: center;"><a href="banners.php?op=list" title="<{$smarty.const._BANNERS_BACK}>"><{$smarty.const._BANNERS_BACK}></a></div>\n<div><{$banneractive}></div><br />\n<{if $count}>\n	<{foreach item=banner from=$banners}>\n		<form action="banners.php" method="post">\n			<table width="100%" cellspacing="1" class="outer">\n				<th colspan="2"><{$smarty.const._BANNERS_ID}> <{$banner.bid}></th>\n				<tr>\n					<td width="50%" class="head">\n					<div><{$banner.sendstats}></div>\n					<div><{$banner.bannerpoints}></div>\n					<{if !$banner.htmlbanner}>\n					<div></div>\n					<div><{$smarty.const._BANNERS_URL}>\n						<input type="text" name="url" size="50" maxlength="200" value="<{$banner.clickurl}>" />\n						<input type="hidden" name="bid" value="<{$banner.bid}>" />\n						<input type="hidden" name="cid" value="<{$banner.cid}>" />\n						<input type="submit" name="op" value="save" />\n						<{$TOKEN}>\n					</div>\n					<{/if}>\n					</td>\n					<td class="even" style="text-align: center;" ><{$banner.banner_url}></td>\n				</tr>\n				<tr>\n					<td class=''head'' colspan=''2''>&nbsp;</td>\n				</tr>\n			</table><br />\n		</form>\n	<{/foreach}>\n<{/if}>');
INSERT INTO `xoops25_tplsource` VALUES (20, '<table cellspacing="0">\n  <tr>\n    <td id="usermenu">\n      <{if $xoops_isadmin}>\n        <a class="menuTop" href="<{$xoops_url}>/admin.php" title="<{$block.lang_adminmenu}>"><{$block.lang_adminmenu}></a>\n	    <a href="<{$xoops_url}>/user.php" title="<{$block.lang_youraccount}>"><{$block.lang_youraccount}></a>\n      <{else}>\n		<a class="menuTop" href="<{$xoops_url}>/user.php" title="<{$block.lang_youraccount}>"><{$block.lang_youraccount}></a>\n      <{/if}>\n      <a href="<{$xoops_url}>/edituser.php" title="<{$block.lang_editaccount}>"><{$block.lang_editaccount}></a>\n      <a href="<{$xoops_url}>/notifications.php" title="<{$block.lang_notifications}>"><{$block.lang_notifications}></a>\n      <{if $block.new_messages > 0}>\n        <a class="highlight" href="<{$xoops_url}>/viewpmsg.php" title="<{$block.lang_inbox}>"><{$block.lang_inbox}> (<span style="color:#ff0000; font-weight: bold;"><{$block.new_messages}></span>)</a>\n      <{else}>\n        <a href="<{$xoops_url}>/viewpmsg.php" title="<{$block.lang_inbox}>"><{$block.lang_inbox}></a>\n      <{/if}>\n      <a href="<{$xoops_url}>/user.php?op=logout" title="<{$block.lang_logout}>"><{$block.lang_logout}></a>\n    </td>\n  </tr>\n</table>\n');
INSERT INTO `xoops25_tplsource` VALUES (21, '<form style="margin-top: 0px;" action="<{$xoops_url}>/user.php" method="post">\n    <{$block.lang_username}><br />\n    <input type="text" name="uname" size="12" value="<{$block.unamevalue}>" maxlength="25" /><br />\n    <{$block.lang_password}><br />\n    <input type="password" name="pass" size="12" maxlength="32" /><br />\n    <{if isset($block.lang_rememberme)}>\n        <input type="checkbox" name="rememberme" value="On" class ="formButton" /><{$block.lang_rememberme}><br />\n    <{/if}>\n    <br />\n    <input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />\n    <input type="hidden" name="op" value="login" />\n    <input type="submit" value="<{$block.lang_login}>" /><br />\n    <{$block.sslloginlink}>\n</form>\n<br />\n<a href="<{$xoops_url}>/user.php#lost" title="<{$block.lang_lostpass}>"><{$block.lang_lostpass}></a>\n<br /><br />\n<a href="<{$xoops_url}>/register.php" title="<{$block.lang_registernow}>"><{$block.lang_registernow}></a>');
INSERT INTO `xoops25_tplsource` VALUES (22, '<form style="margin-top: 0px;" action="<{$xoops_url}>/search.php" method="get">\n  <input type="text" name="query" size="14" /><input type="hidden" name="action" value="results" /><br /><input type="submit" value="<{$block.lang_search}>" />\n</form>\n<a href="<{$xoops_url}>/search.php" title="<{$block.lang_advsearch}>"><{$block.lang_advsearch}></a>');
INSERT INTO `xoops25_tplsource` VALUES (23, '<ul>\n  <{foreach item=module from=$block.modules}>\n  <li><a href="<{$module.adminlink}>" title="<{$module.lang_linkname}>"><{$module.lang_linkname}></a>: <{$module.pendingnum}></li>\n  <{/foreach}>\n</ul>');
INSERT INTO `xoops25_tplsource` VALUES (24, '<table cellspacing="0">\n  <tr>\n    <td id="mainmenu">\n      <a class="menuTop" href="<{$xoops_url}>/"><{$block.lang_home}></a>\n      <!-- start module menu loop -->\n      <{foreach item=module from=$block.modules}>\n      <a class="menuMain" href="<{$xoops_url}>/modules/<{$module.directory}>/" title="<{$module.name}>"><{$module.name}></a>\n        <{foreach item=sublink from=$module.sublinks}>\n          <a class="menuSub" href="<{$sublink.url}>" title="<{$sublink.name}>"><{$sublink.name}></a>\n        <{/foreach}>\n      <{/foreach}>\n      <!-- end module menu loop -->\n    </td>\n  </tr>\n</table>');
INSERT INTO `xoops25_tplsource` VALUES (25, '<table class="outer" cellspacing="0">\n\n  <{if $block.showgroups == true}>\n\n  <!-- start group loop -->\n  <{foreach item=group from=$block.groups}>\n  <tr>\n    <th colspan="2"><{$group.name}></th>\n  </tr>\n\n  <!-- start group member loop -->\n  <{foreach item=user from=$group.users}>\n  <tr>\n    <td class="even" valign="middle" align="center">\n        <img src="<{$user.avatar}>" alt="<{$user.name}>" width="32" /><br />\n        <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>" title="<{$user.name}>"><{$user.name}></a>\n    </td>\n    <td class="odd" width="20%" align="right" valign="middle">\n        <{$user.msglink}>\n    </td>\n  </tr>\n  <{/foreach}>\n  <!-- end group member loop -->\n\n  <{/foreach}>\n  <!-- end group loop -->\n  <{/if}>\n</table>\n\n<br />\n\n<div style="margin: 3px; text-align:center;">\n  <img src="<{$block.logourl}>" alt="" border="0" /><br /><{$block.recommendlink}>\n</div>');
INSERT INTO `xoops25_tplsource` VALUES (26, '<{$block.online_total}><br /><br />\n<{$block.lang_members}>: <{$block.online_members}><br />\n<{$block.lang_guests}>: <{$block.online_guests}><br /><br />\n<{$block.online_names}>\n<a href="javascript:openWithSelfMain(''<{$xoops_url}>/misc.php?action=showpopups&amp;type=online'',''Online'',420,350);" title="<{$block.lang_more}>">\n    <{$block.lang_more}>\n</a>');
INSERT INTO `xoops25_tplsource` VALUES (27, '<table cellspacing="1" class="outer">\n  <{foreach item=user from=$block.users}>\n  <tr class="<{cycle values="even,odd"}>" valign="middle">\n    <td><{$user.rank}></td>\n    <td align="center">\n      <{if $user.avatar != ""}>\n      <img src="<{$user.avatar}>" alt="<{$user.name}>" width="32" /><br />\n      <{/if}>\n      <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>" title="<{$user.name}>"><{$user.name}></a>\n    </td>\n    <td align="center"><{$user.posts}></td>\n  </tr>\n  <{/foreach}>\n</table>\n');
INSERT INTO `xoops25_tplsource` VALUES (28, '<table cellspacing="1" class="outer">\n  <{foreach item=user from=$block.users}>\n    <tr class="<{cycle values="even,odd"}>" valign="middle">\n      <td align="center">\n      <{if $user.avatar != ""}>\n      <img src="<{$user.avatar}>" alt="<{$user.name}>" width="32" /><br />\n      <{/if}>\n      <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>" title="<{$user.name}>"><{$user.name}></a>\n      </td>\n      <td align="center"><{$user.joindate}></td>\n    </tr>\n  <{/foreach}>\n</table>\n');
INSERT INTO `xoops25_tplsource` VALUES (29, '<table width="100%" cellspacing="1" class="outer">\n  <{foreach item=comment from=$block.comments}>\n  <tr class="<{cycle values="even,odd"}>">\n    <td align="center"><img src="<{$xoops_url}>/images/subject/<{$comment.icon}>" alt="" /></td>\n    <td><{$comment.title}></td>\n    <td align="center"><{$comment.module}></td>\n    <td align="center"><{$comment.poster}></td>\n    <td align="right"><{$comment.time}></td>\n  </tr>\n  <{/foreach}>\n</table>');
INSERT INTO `xoops25_tplsource` VALUES (30, '<form action="<{$block.target_page}>" method="post">\n<table class="outer">\n  <{foreach item=category from=$block.categories}>\n  <{foreach name=inner item=event from=$category.events}>\n  <{if $smarty.foreach.inner.first}>\n  <tr>\n    <td class="head" colspan="2"><{$category.title}></td>\n  </tr>\n  <{/if}>\n  <tr>\n    <td class="odd"><{counter assign=index}><input type="hidden" name="not_list[<{$index}>][params]" value="<{$category.name}>,<{$category.itemid}>,<{$event.name}>" /><input type="checkbox" name="not_list[<{$index}>][status]" value="1" <{if $event.subscribed}>checked="checked"<{/if}> /></td>\n    <td class="odd"><{$event.caption}></td>\n  </tr>\n  <{/foreach}>\n  <{/foreach}>\n  <tr>\n    <td class="foot" colspan="2"><input type="hidden" name="not_redirect" value="<{$block.redirect_script}>"><input type="hidden" value="<{$block.notification_token}>" name="XOOPS_TOKEN_REQUEST" /><input type="submit" name="not_submit" value="<{$block.submit_button}>" /></td>\n  </tr>\n</table>\n</form>');
INSERT INTO `xoops25_tplsource` VALUES (31, '<div style="text-align: center;">\n<form action="index.php" method="post">\n<{$block.theme_select}>\n</form>\n</div>');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_users`
-- 

CREATE TABLE `xoops25_users` (
  `uid` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `uname` varchar(25) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `user_avatar` varchar(30) NOT NULL default 'blank.gif',
  `user_regdate` int(10) unsigned NOT NULL default '0',
  `user_icq` varchar(15) NOT NULL default '',
  `user_from` varchar(100) NOT NULL default '',
  `user_sig` tinytext,
  `user_viewemail` tinyint(1) unsigned NOT NULL default '0',
  `actkey` varchar(8) NOT NULL default '',
  `user_aim` varchar(18) NOT NULL default '',
  `user_yim` varchar(25) NOT NULL default '',
  `user_msnm` varchar(100) NOT NULL default '',
  `pass` varchar(32) NOT NULL default '',
  `posts` mediumint(8) unsigned NOT NULL default '0',
  `attachsig` tinyint(1) unsigned NOT NULL default '0',
  `rank` smallint(5) unsigned NOT NULL default '0',
  `level` tinyint(3) unsigned NOT NULL default '1',
  `theme` varchar(100) NOT NULL default '',
  `timezone_offset` float(3,1) NOT NULL default '0.0',
  `last_login` int(10) unsigned NOT NULL default '0',
  `umode` varchar(10) NOT NULL default '',
  `uorder` tinyint(1) unsigned NOT NULL default '0',
  `notify_method` tinyint(1) NOT NULL default '1',
  `notify_mode` tinyint(1) NOT NULL default '0',
  `user_occ` varchar(100) NOT NULL default '',
  `bio` tinytext,
  `user_intrest` varchar(150) NOT NULL default '',
  `user_mailok` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`uid`),
  KEY `uname` (`uname`),
  KEY `email` (`email`),
  KEY `uiduname` (`uid`,`uname`),
  KEY `unamepass` (`uname`,`pass`),
  KEY `level` (`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `xoops25_users`
-- 

INSERT INTO `xoops25_users` VALUES (1, '', 'admin', 'ska@ilpescecane.it', 'http://www.test.snowgang.it/', 'blank.gif', 1278086514, '', '', '', 1, '', '', '', '', '6325342d77fd774255315f1592bb3d4a', 0, 0, 7, 5, 'default', 0.0, 1278086838, 'thread', 0, 1, 0, '', '', '', 0);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_xoopscomments`
-- 

CREATE TABLE `xoops25_xoopscomments` (
  `com_id` mediumint(8) unsigned NOT NULL auto_increment,
  `com_pid` mediumint(8) unsigned NOT NULL default '0',
  `com_rootid` mediumint(8) unsigned NOT NULL default '0',
  `com_modid` smallint(5) unsigned NOT NULL default '0',
  `com_itemid` mediumint(8) unsigned NOT NULL default '0',
  `com_icon` varchar(25) NOT NULL default '',
  `com_created` int(10) unsigned NOT NULL default '0',
  `com_modified` int(10) unsigned NOT NULL default '0',
  `com_uid` mediumint(8) unsigned NOT NULL default '0',
  `com_ip` varchar(15) NOT NULL default '',
  `com_title` varchar(255) NOT NULL default '',
  `com_text` text,
  `com_sig` tinyint(1) unsigned NOT NULL default '0',
  `com_status` tinyint(1) unsigned NOT NULL default '0',
  `com_exparams` varchar(255) NOT NULL default '',
  `dohtml` tinyint(1) unsigned NOT NULL default '0',
  `dosmiley` tinyint(1) unsigned NOT NULL default '0',
  `doxcode` tinyint(1) unsigned NOT NULL default '0',
  `doimage` tinyint(1) unsigned NOT NULL default '0',
  `dobr` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`com_id`),
  KEY `com_pid` (`com_pid`),
  KEY `com_itemid` (`com_itemid`),
  KEY `com_uid` (`com_uid`),
  KEY `com_title` (`com_title`(40)),
  KEY `com_status` (`com_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_xoopscomments`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `xoops25_xoopsnotifications`
-- 

CREATE TABLE `xoops25_xoopsnotifications` (
  `not_id` mediumint(8) unsigned NOT NULL auto_increment,
  `not_modid` smallint(5) unsigned NOT NULL default '0',
  `not_itemid` mediumint(8) unsigned NOT NULL default '0',
  `not_category` varchar(30) NOT NULL default '',
  `not_event` varchar(30) NOT NULL default '',
  `not_uid` mediumint(8) unsigned NOT NULL default '0',
  `not_mode` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`not_id`),
  KEY `not_modid` (`not_modid`),
  KEY `not_itemid` (`not_itemid`),
  KEY `not_class` (`not_category`),
  KEY `not_uid` (`not_uid`),
  KEY `not_event` (`not_event`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `xoops25_xoopsnotifications`
-- 

