#
# Table structure for table `myalbum0_cat`
#

CREATE TABLE myalbum0_cat (
  cid int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
  title varchar(50) NOT NULL default '',
  imgurl varchar(150) NOT NULL default '',
  weight int(5) unsigned NOT NULL default 0,
  depth int(5) unsigned NOT NULL default 0,
  description text,
  allowed_ext varchar(255) NOT NULL default 'jpg|jpeg|gif|png',
  PRIMARY KEY (cid),
  KEY (weight),
  KEY (depth),
  KEY (pid)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `myalbum0_photos`
#

CREATE TABLE myalbum0_photos (
  lid int(11) unsigned NOT NULL auto_increment,
  cid int(5) unsigned NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  ext varchar(10) NOT NULL default '',
  res_x int(11) NOT NULL default '0',
  res_y int(11) NOT NULL default '0',
  submitter int(11) unsigned NOT NULL default '0',
  status tinyint(2) NOT NULL default '0',
  date int(10) NOT NULL default '0',
  hits int(11) unsigned NOT NULL default '0',
  rating double(6,4) NOT NULL default '0.0000',
  votes int(11) unsigned NOT NULL default '0',
  comments int(11) unsigned NOT NULL default '0',
  PRIMARY KEY (lid),
  KEY (cid),
  KEY (date),
  KEY (status),
  KEY (title)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `myalbum0_text`
#

CREATE TABLE myalbum0_text (
  lid int(11) unsigned NOT NULL default '0',
  description text,
  PRIMARY KEY lid (lid)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `myalbum0_votedata`
#

CREATE TABLE myalbum0_votedata (
  ratingid int(11) unsigned NOT NULL auto_increment,
  lid int(11) unsigned NOT NULL default '0',
  ratinguser int(11) unsigned NOT NULL default '0',
  rating tinyint(3) unsigned NOT NULL default '0',
  ratinghostname varchar(60) NOT NULL default '',
  ratingtimestamp int(10) NOT NULL default '0',
  PRIMARY KEY  (ratingid),
  KEY (lid),
  KEY (ratinguser),
  KEY (ratinghostname)
) TYPE=MyISAM;

