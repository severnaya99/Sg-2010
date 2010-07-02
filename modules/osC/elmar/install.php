<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: install.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

// Alle Includes hier, wegen der Pfadangabe. Reihenfolge ist relevant!
require(ELMAR_PATH.'tools/pear.php');
require(ELMAR_PATH.'tools/node.php');
require(ELMAR_PATH.'tools/parser.php');
require(ELMAR_PATH.'tools/tree.php');

function db_config() {
  $sql = 'SELECT configuration_group_id AS id FROM '.TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title='Elm@r'";
  $rs = tep_db_query($sql);
  if ($rs) {
    if ($row = tep_db_fetch_array($rs)) {
      $gid = $row['id'];
      echo "Elm@r-Konfigurationsgruppe gefunden: $gid\n";
    }
  }
  if (empty($gid)) {
    $sql = 'INSERT INTO '.TABLE_CONFIGURATION_GROUP."(configuration_group_title, configuration_group_description) VALUES('Elm@r', 'Shop- und Produktdaten gem&auml;&szlig; shopinfo.xml-Standard')";
    $rs = tep_db_query($sql);
    if ($rs == 1) {
      $gid = tep_db_insert_id();
      echo "Elm@r-Konfigurationsgruppe eingef&uuml;gt: $gid\n";
    } else {
      echo "Einf&uuml;gen der Elm@r-Konfigurationsgruppe hat nicht geklappt:\n";
      tep_db_error($sql, mysql_errno(), mysql_error());
    }
  }

  $sql = 'SELECT COUNT(*) AS cnt FROM '.TABLE_CONFIGURATION.' WHERE configuration_key=\'MODULE_ELMAR_WARN_ELMAR_RENAME\'';
  $rs = tep_db_query($sql);
  if ($rs && ($row = tep_db_fetch_array($rs)) && ($row['cnt'] > 0)) {
    echo "Elm@r-Konfigurationswert vorhanden.\n";
  } else {
    $sql = 'INSERT INTO '.TABLE_CONFIGURATION."(configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Verzeichnis-umbenennen-Warnung', 'MODULE_ELMAR_WARN_ELMAR_RENAME', 'False', 'Warnen, wenn das elmar-Verzeichnis noch nicht umbenannt wurde (siehe readme.html).', $gid, 1, 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())";
    $rs = tep_db_query($sql);
    if ($rs == 1) {
      echo "Elm@r-Konfigurationswert eingef&uuml;gt.\n";
    } else {
      echo "Einf&uuml;gen eines Elm@r-Konfigurationswerts hat nicht geklappt.\n";
      tep_db_error($sql, mysql_errno(), mysql_error());
    }
  }
}

// Datenkbanktabelle für Affiliates erzeugen
function db_affiliates() {
	if (defined('TABLE_AFFILIATES')) {
		$sql = 'CREATE TABLE IF NOT EXISTS '.TABLE_AFFILIATES.'(
			id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(255) NOT NULL,
			date DATETIME,
			useragent VARCHAR(255),
			ip VARCHAR(15),
			host VARCHAR(255),
			notes TEXT,
			UNIQUE(name))';
    tep_db_query($sql);
    echo '<p class="ok">OK, Datenbanktabelle <code>'.TABLE_AFFILIATES.'</code> vorhanden.</p>'."\n";
	}
}

function update_shopinfo_xml() {
  global $spalten;

  if (!file_exists(DIR_FS_SHOPINFO_XML) || (filesize(DIR_FS_SHOPINFO_XML) == 0)) {
    echo '<p class="ok">OK, die Shopdatei wurde noch nicht angelegt und muss folglich auch nicht angepasst werden.</p>'."\n";
    return true;
  }

  echo '<p>Lade Shopdatei: <code>'.DIR_FS_SHOPINFO_XML.'</code>'."\n";
  $tree = new XML_Tree(DIR_FS_SHOPINFO_XML, '1.0" encoding="ISO-8859-1');
  #$tree->useCdataSections();

  $root = &$tree->getTreeFromFile();
  if (PEAR::isError($root)) {
    echo '<p class="error">Fehler beim Parsen der Shopdatei:<br>'."\n";
    echo $root->toString()."</p>\n";
    return false;
  }

	$name_parts = explode(':', $root->name);
	if (sizeof($name_parts) > 1) {
		$namespace = $name_parts[0].':';
	} else {
		$namespace = '';
	}

  $requests = &$tree->getNodeAt($namespace.'Shop/Requests');
  if (PEAR::isError($requests)) {
    #echo '<p>Warnung: Zugriff auf Produktdaten in der Shopdatei nicht gefunden.</p>'."\n";
    // Request-Tag nach dem Url-Tag einfügen
    $pos = -1;
    for ($i = 0; $i < count($root->children); ++$i) {
			if ($root->children[$i]->name == 'Url')
			  $pos = $i + 1;
		}
    $requests = new XML_Tree_Node('Requests');
    $res = & $root->insertChild(null, $pos, $requests);
		if (PEAR::isError($res)) {
			echo '<p class="error">Das Requests-Tag konnte nicht in die shopinfo.xml eingef&uuml;gt werden:<br>'."\n";
			echo $res->toString()."</p>\n";
			return false;
		}
  }

  $offlineRequest = &$tree->getNodeAt($namespace.'Shop/Requests/OfflineRequest');
  if (PEAR::isError($offlineRequest)) {
    #echo '<p>Warnung: Produktdatei-Angaben in der Shopdatei nicht gefunden.</p>'."\n";
    $offlineRequest = & offlineRequest($requests);
		echo '<p class="ok">OK, Produktdatei-Angaben erg&auml;nzt.</p>'."\n";
  } else {
		$header = &$tree->getNodeAt($namespace.'Shop/Requests/OfflineRequest/Format/Tabular/CSV/Header');
		if (PEAR::isError($header)) {
			echo '<p class="error">Das Kopfzeilen-Tag in der Shopdatei nicht gefunden:<br>'."\n";
			echo $header->toString()."</p>\n";
			return false;
		}
		$old_titel = $header->content;  // Funktion getContent gibt es nicht.
		#echo 'old_titel: '.htmlspecialchars($old_titel)."\n\n";

		$corrected = false;

		if ($header->getAttribute('columns') != count($spalten)) {
			$header->setAttribute('columns', count($spalten));
			$corrected = true;
		}

		$mappings = &$tree->getNodeAt($namespace.'Shop/Requests/OfflineRequest/Format/Tabular/Mappings');
		if (PEAR::isError($mappings)) {
			echo '<p class="error">Das Mappings-Tag in der Shopdatei nicht gefunden:<br>'."\n";
			echo $mappings->toString()."</p>\n";
			return false;
		}

		foreach($mappings->children as $idx => $child) {
			if (count($child->attributes) > 0) {
				if ($child->getAttribute('columnName') != $spalten[$child->getAttribute('column')-1]) {
					#echo $idx.': '.$child->getAttribute('columnName').' =&gt; ';
					$mappings->children[$idx]->setAttribute('columnName', $spalten[$child->getAttribute('column')-1]);
					#echo $mappings->children[$idx]->getAttribute('columnName')."<br>\n";
					$corrected = true;
				}
			}
		}

		if (defined('DEFAULT_QUOTE'))
			$titel = DEFAULT_QUOTE.implode(DEFAULT_QUOTE.DEFAULT_DELIMITER.DEFAULT_QUOTE, $spalten).DEFAULT_QUOTE;
		else
			$titel = implode(DEFAULT_DELIMITER, $spalten);
		#echo 'titel: '.htmlspecialchars($titel)."\n\n";

		if ($old_titel != $titel) {
			$header->setContent($titel);
		}

		$special = &$tree->getNodeAt($namespace.'Shop/Requests/OfflineRequest/Format/Tabular/CSV/SpecialCharacters');
		if (PEAR::isError($special)) {
			echo '<p class="error">Das Sonderzeichen-Tag in der Shopdatei nicht gefunden:<br>'."\n";
			echo $special->toString()."</p>\n";
			return false;
		}

		$old_escape = $special->getAttribute('escaped');
		$old_quote = $special->getAttribute('quoted');
		$old_lineend = $special->getAttribute('lineend');
		$old_delimiter = $special->getAttribute('delimiter');

		if (defined('DEFAULT_ESCAPE'))
			$special->setAttribute('escaped', DEFAULT_ESCAPE);
		else
			$special->unsetAttribute('escaped');

		if (defined('DEFAULT_QUOTE'))
			$special->setAttribute('quoted', DEFAULT_QUOTE);
		else
			$special->unsetAttribute('quoted');

		if (defined('DEFAULT_LINEEND'))
			$special->setAttribute('lineend', (DEFAULT_LINEEND=="\n" ? '\n' : (DEFAULT_LINEEND=="\r" ? '\r' : '\r\n')));
		else
			$special->unsetAttribute('lineend');

		if (defined('DEFAULT_DELIMITER'))
			$special->setAttribute('delimiter', (DEFAULT_DELIMITER == "\t" ? '[tab]' : DEFAULT_DELIMITER));
		else
			$special->unsetAttribute('delimiter');

		$new_escape = $special->getAttribute('escaped');
		$new_quote = $special->getAttribute('quoted');
		$new_lineend = $special->getAttribute('lineend');
		$new_delimiter = $special->getAttribute('delimiter');

		if (!$corrected && $old_titel == $titel && $new_escape == $old_escape && $new_quote == $old_quote && $new_lineend == $old_lineend && $new_delimiter == $old_delimiter) {
			echo '<p class="ok">OK, die Shopdatei wurde bereits aktualisiert.</p>'."\n";
			return true;
		}

		if ($old_titel != $titel) {
			echo '<p class="ok">OK, Kopfzeile aktualisiert.</p>'."\n";
		}

		if ($corrected) {
			echo '<p class="ok">OK, Spaltennamen aktualisiert.</p>'."\n";
		}

		if ($new_escape != $old_escape) echo '<p class="ok">OK, Escape-Zeichen aktualisiert.</p>'."\n";
		if ($new_quote != $old_quote) echo '<p class="ok">OK, Zeichenkettenbegrenzer aktualisiert.</p>'."\n";
		if ($new_lineend != $old_lineend) echo '<p class="ok">OK, Zeilenendezeichen aktualisiert.</p>'."\n";
		if ($new_delimiter != $old_delimiter) echo '<p class="ok">OK, Trennzeichenzeichen aktualisiert.</p>'."\n";
	}

  #echo '<pre>'.(htmlspecialchars($tree->get())).'</pre>'."\n";

	if (!is_writable(DIR_FS_SHOPINFO_XML)) {
		echo '<p class="error">Die Shopdatei kann nicht geschrieben werden:<br>'.DIR_FS_SHOPINFO_XML."</p>\n";
		return false;
	}

	if (!$handle = @fopen(DIR_FS_SHOPINFO_XML, 'wb')) {
		echo '<p class="error">Die Shopdatei kann nicht zum Schreiben ge&ouml;ffnet werden:<br>'.DIR_FS_SHOPINFO_XML."</p>\n";
		return false;
	}
	flock($handle, LOCK_EX);

	if (!@fwrite($handle, $tree->get())) {
		echo '<p class="error">Fehler beim Schreiben der Shopdatei:<br>'.DIR_FS_SHOPINFO_XML."</p>\n";
		return false;
	}

	flock($handle, LOCK_UN);
	@fclose($handle);  // wenn hier etwas schief geht, ignorieren
	#$tree->free();
  echo '<p class="ok">OK, die Shopdatei wurde aktualisiert.<br>'.DIR_FS_SHOPINFO_XML.'</p>'."\n";
  return true;
}
?>

<h1>Installation</h1>
<div class="middleCell">
<?php
  #db_config();
  db_affiliates();
  $ok = update_shopinfo_xml();
  if (!$ok) {
    $shopinfo_exists = file_exists(DIR_FS_SHOPINFO_XML) && filesize(DIR_FS_SHOPINFO_XML) > 0;
?>
    <p><span class="error">Fehler</span> beim Update der Shopdatei <?php echo DIR_FS_SHOPINFO_XML; ?></p>
    <p>Damit Shopdatei und Produktdatei zusammenpassen, sollten Sie die Shopdatei mit dem HTML-Formular bei Elm@r aktualisieren.</p>
    <form action="<?php echo ELMAR_SHOPINFO_URL; ?>" method="GET" target="_blank">
      <input type="hidden" name="exec" value="elmarmodul">
      <input type="hidden" name="url" value="<?php echo ($shopinfo_exists ? DIR_WS_SHOPINFO_XML : ELMAR_SHOP_ROOT_DIR.'elmar_shopinfo.php'); ?>">
      <p><input type=submit value="Shopdatei &auml;ndern" title="Shopdatei bearbeiten"></p>
    </form>
<?php
  } else {
    $configs = new Config;
    $configs->set('ELMAR_MODULE_ONE_TIME_INSTALL', 100*MODUL_VERSION+MODUL_SUBVERSION);
    $configs->save();
?>
    <p>Gehen Sie nun bitte zur <a href="<?php echo ELMAR_START; ?>index.php">Startseite</a>.</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
      <input type="hidden" name="file" value="index.php">
      <p><input type=submit value="Startseite" title="Zur Startseite gehen"></p>
    </form>
<?php } ?>
</div>
