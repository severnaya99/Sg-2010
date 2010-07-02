<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: prodfiles.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

define('FROOGLE_FTP_SERVER', 'hedwig.google.com');

$allow_url_fopen = (bool) ini_get('allow_url_fopen');
$use_fopen_for_url = defined('ELMAR_MODUL_USE_FOPEN_FOR_URL') && ELMAR_MODUL_USE_FOPEN_FOR_URL;
if ($use_fopen_for_url) {
  $generate_prodfiles = $allow_url_fopen;
} else {
  $generate_prodfiles = true;
}

$ftp_func = function_exists('ftp_connect') ? 1 : (function_exists('stream_context_create') && $allow_url_fopen ? 2 : false);
$froogle_ftp = defined('FROOGLE_FTP_USER_NAME') && FROOGLE_FTP_USER_NAME!='' && defined('FROOGLE_FTP_USER_PASS') && FROOGLE_FTP_USER_PASS!='' && $generate_prodfiles && $ftp_func;

$msg = '';
$ok = true;

$productAnz = productAnz();

$use_prod_cat_idx = isset($_REQUEST['use_prod_cat_idx']) && ($_REQUEST['use_prod_cat_idx']=='yes');

doParam('standard', PRODUCTFILE);
doParam('froogle', FILENAME_FROOGLE);
doParam('hardwareschotte', FILENAME_HARDWARESCHOTTE);
doParam('kelkoo', FILENAME_KELKOO);
doParam('pangora', FILENAME_PANGORA);
doParam('shopping', FILENAME_SHOPPING);
doParam('webde', FILENAME_WEBDE);
doParam('amazon', FILENAME_AMAZON);

$limit_kelkoo = isset($_REQUEST['limit_kelkoo']) ? (int)$_REQUEST['limit_kelkoo'] : false;

if ($ok) {
	$ftp = isset($_REQUEST['ftp']) ? $_REQUEST['ftp'] : false;
	if ($ftp) {
		if ($ftp == 'froogle') {
			$generate = !file_exists($filename_froogle) || filesize($filename_froogle)==0 || time() - ($mtime = filemtime($filename_froogle)) > 60*60;  // 1 Stunde
			if (!$generate) {
				$msg .= 'OK, aktuelle Froogle-Produktdatei '.$filename_froogle.' gefunden: '.date('d.m.Y H:i:s', $mtime).'<br>';
			}
			if (!$generate || saveProductFile(false, $filename_froogle, 'froogle')) {
				$msg .= '<br>';

				if (substr(FROOGLE_FTP_FILE_NAME, -4) != '.zip') {
					// Textdatei
					froogle_ftp_upload($filename_froogle, FROOGLE_FTP_FILE_NAME);
				} else {
					// Produktdatei komprimieren
					$fs = filesize($filename_froogle);

					$fh = fopen($filename_froogle, 'rb');
					flock($fh, LOCK_SH);
					$data = fread($fh, $fs);
					flock($fh, LOCK_UN);
					fclose($fh);

					require(ELMAR_PATH.'tools/zip.lib.php');
					$zipfile = new zipfile;
					$zipfile->addFile($data, basename($filename_froogle));

					$zipname = dirname($filename_froogle).$PATH_SEPARATOR.FROOGLE_FTP_FILE_NAME;

					$fh = fopen($zipname, 'wb');
					flock($fh, LOCK_EX);
					fputs($fh, $zipfile->file());
					flock($fh, LOCK_UN);
					fclose($fh);

					froogle_ftp_upload($zipname, FROOGLE_FTP_FILE_NAME);
				}
			} else {
				$msg .= '<br>Produktdatei wurde nicht zum Froogle-FTP-Server &uuml;bertragen.';
			}
		} else {
			$ok = false;
			$msg .= 'Aufruf- oder Programmierfehler: Parameterwert "'.$ftp.'" f&uuml;r FTP-Upload unbekannt.';
		}
	} else if (isset($_REQUEST['do_active'])) {
		if ($standard_active || $froogle_active || $hardwareschotte_active || $kelkoo_active || $pangora_active || $shopping_active || $webde_active || $amazon_active) {
			#echo '<script type="text/javascript">alert("Produktdateien werden generiert. Bitte OK druecken und warten...");</script>';
			flush();

			if ($standard_active) {
				saveProductFile(true, $filename_standard, '');  // Standardformat
			}

			if ($froogle_active) saveProductFile(false, $filename_froogle, 'froogle');
			if ($hardwareschotte_active) saveProductFile(false, $filename_hardwareschotte, 'hardwareschotte');
			if ($kelkoo_active) saveProductFile(false, $filename_kelkoo, 'kelkoo', $limit_kelkoo);
			if ($pangora_active) saveProductFile(false, $filename_pangora, 'pangora');
			if ($shopping_active) saveProductFile(false, $filename_shopping, 'shopping');
			if ($webde_active) saveProductFile(false, $filename_webde, 'webde');
			if ($amazon_active) saveProductFile(false, $filename_amazon, 'amazon');
		} else {
			$msg = 'Bitte w&auml;hlen Sie mindestens eine Produktdatei aus.';
			$ok = false;
		}
	}
}

function doParam($name, $defaultFilename) {
	$active = $name.'_active';
	$filename = 'filename_'.$name;
	global $ok, $msg, $$active, $$filename;
	$$active = isset($_REQUEST[$active]) ? true : false;
	$$filename = isset($_REQUEST[$filename]) ? stripslashes($_REQUEST[$filename]) : $defaultFilename;
	if (strpos($$filename, '://')) {
		$msg .= '<span class="error">Fehler: Bitte geben Sie den Pfad auf dem Server und keine URL für <code>'.$name.'</code> ein:</span> '.$$filename.'<br>';
		$ok = false;
	}
	$dir = dirname($$filename);
	if (empty($dir) || $dir == '.')
		$$filename = DIR_FS_CATALOG.$$filename;
	else if (file_exists($$filename))
		$$filename = realpath($$filename);
}

function saveProductFile($standard, $filename, $typename, $limit=0) {
  // Laedt eine Produktdatei und speichert sie.
  global $msg, $db_part, $language_code, $currency, $use_prod_cat_idx, $ok;
  if (!$standard || !WRITE_PRODUCTFILE) {
    $dst = fopen($filename, $db_part<=1 ? 'wb' : 'ab');
    if (!$dst) {
      $msg .= '<span class="error">Fehler, kann die Datei '.$filename.(empty($typename) ? '' : ' f&uuml;r '.$typename).' nicht anlegen.</span> '.$php_errormsg.'<br>';
      $ok = false;
      return;
    }
    flock($dst, LOCK_EX);
  } else {
    $dst = false;
  }

  $size = 0;
  #Alternativ ELMAR_SHOP_ROOT_DIR.'elmar_products.php?type='.$typename;
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off') {
    $prot = 'https://';
    $sock = 'ssl://';
  } else {
    $prot = 'http://';
    $sock = '';
  }
  $port = $_SERVER['SERVER_PORT'];
  $server = $_SERVER['SERVER_NAME'].($port==80 ? '' : ':'.$port);  // evtl. $_SERVER['HTTP_HOST']
  $path = dirname($_SERVER['PHP_SELF']).'/elmar_products.php?';
  if ($standard) {
    $path .= ($db_part ? 'db_part='.$db_part : 'force=yes');
  } else {
    $path .= 'type='.$typename;
    if ($db_part) $path .= '&db_part='.$db_part;
  }
  $path .= '&language='.(empty($language_code) ? PROD_DEFAULT_LANGUAGE : $language_code);
  $path .= '&currency='.(empty($currency) ? PROD_DEFAULT_CURRENCY : $currency);
  if ($use_prod_cat_idx) $path .= '&use_prod_cat_idx=yes';
  if ($limit > 0) $path .= '&limit='.$limit;
  $url = $prot.$server.$path;

  if (defined('ELMAR_MODUL_USE_FOPEN_FOR_URL') && ELMAR_MODUL_USE_FOPEN_FOR_URL) {
    if (function_exists('stream_context_create')) {
      // Bei neueren PHP-Versionen kann man noch ein paar HTTP-Header mitschicken.
      // Brauchen wir wohl nicht: 'Cookie: '.$_SERVER['HTTP_COOKIE']."\r\n"
      $opts = array(
       'http' => array(
         'header' => 'Referer: '.HTTP_SERVER.$_SERVER['PHP_SELF'].'?file='.THISPAGE."\r\n"
                    .'Host: '.$server."\r\n"
                    .'User-agent: PHP/'.PHP_VERSION."\r\n"
                    .'From: '.STORE_OWNER_EMAIL_ADDRESS."\r\n"
                    .'Accept-Language: '.(empty($language_code) ? PROD_DEFAULT_LANGUAGE : $language_code)."\r\n"
       )
      );
      $context = stream_context_create($opts);
      $src = fopen($url, 'rb', false, $context);
    } else {
      $src = fopen($url, 'rb');
    }
    if (!$src) {
      $msg .= '<span class="error">Fehler, kann die URL '.htmlspecialchars($url).' nicht &ouml;ffnen.</span> '.$php_errormsg.'<br>';
      if ($_SERVER['HTTPS']) {
        $msg .= 'SSL-Verbindungen kann PHP erst ab Version 4.3 und mit aktiviertem OpenSSL &ouml;ffnen. Versuchen Sie es bitte mit <code>http</code> statt <code>https</code>.<br>';
      }
      if (!ini_get('allow_url_fopen'))
        $msg .= '<span class="error">In der <code>php.ini</code> ist <code>allow_url_fopen=Off</code> statt <code>On</code>.</span><br>';
      $msg .= 'Evtl. klappt es, wenn Sie in der Konfigurationsdatei <code>elmar_config.inc.php</code> die Konstante <code>ELMAR_MODUL_USE_FOPEN_FOR_URL</code> auf <code>false</code> setzen.<br><br>';
      $ok = false;
    } else {
      while (($len = strlen($data = fread($src, 8192))) > 0) {
         if ($dst) fwrite($dst, $data);
         $size += $len;
      }
      fclose($src);
      $msg .= '<span class="ok">OK, '.($db_part ? 'Teil '.$db_part.' der ' : '').'Produktdatei <code>'.realpath($filename).'</code> geschrieben: '.number_format($size, 0, ',', '.').'&nbsp;Bytes</span><br>';
    }
  } else {
    // Zugriff auf eine URL mit fsockopen (statt fopen).
    $errno = 0;
    $errstr = '';
    $src = fsockopen($sock.$_SERVER['SERVER_NAME'], $port, $errno, $errstr, 30);  // evtl. $_SERVER['HTTP_HOST']
    if (!$src) {
      $msg .= '<span class="error">Fehler: '.$errstr.' ('.$errno.')<br>Kann die URL '.htmlspecialchars($url).' nicht &ouml;ffnen.</span> '.$php_errormsg.'<br>';
      $ok = false;
    } else {
      $req = "GET $path HTTP/1.0\r\n"
              .'Referer: '.HTTP_SERVER.$_SERVER['PHP_SELF'].'?file='.THISPAGE."\r\n"
              .'Host: '.$server."\r\n"
              .'User-agent: PHP/'.PHP_VERSION."\r\n"
              .'From: '.STORE_OWNER_EMAIL_ADDRESS."\r\n"
              .'Accept-Language: '.(empty($language_code) ? PROD_DEFAULT_LANGUAGE : $language_code)."\r\n"
              ."\r\n";
      fwrite($src, $req);

      if (feof($src)) {
        $msg .= '<span class="error">Fehler: Der Webserver schickt keine Antwort.<br>URL: '.htmlspecialchars($url).'</span>';
        $ok = false;
      } else {
        // Erst kommen die HTTP-Header.
        $statusline = fgets($src);
        $status = explode(' ', $statusline, 3);
        if ($status[1] != 200) {
          $msg .= '<span class="error">Fehler: HTTP-Statuscode nicht OK: '.$status[1].' = '.htmlspecialchars($status[2]).'<br>Statuszeile: '.htmlspecialchars($statusline).'</span><br>URL: '.htmlspecialchars($url).'<br>';
          if ($_SERVER['HTTPS']) {
            $msg .= 'SSL-Verbindungen kann PHP erst ab Version 4.3 und mit aktiviertem OpenSSL &ouml;ffnen. Versuchen Sie es bitte mit <code>http</code> statt <code>https</code>.<br>';
          }
          $msg .= 'Evtl. klappt es, wenn Sie in der Konfigurationsdatei <code>elmar_config.inc.php</code> die Konstante <code>ELMAR_MODUL_USE_FOPEN_FOR_URL</code> auf <code>true</code> setzen.<br><br>';
          $ok = false;
        } else {
          $headers = '';
          while (!feof($src)) {
            $buffer = fgets($src);
            if (rtrim($buffer) == '')
              break;  // Bei der ersten Leerzeile enden die HTTP-Header.
            $headers .= htmlspecialchars($buffer).'<br>';
          }

          if (feof($src)) {
            $msg .= '<span class="error">Fehler: Die Antwort vom Webserver enth&auml;lt keine Daten.<br>URL: '.htmlspecialchars($url).'</span><br>';
            $msg .= '<strong>HTTP-Header der Server-Antwort:</strong><br>'.$statusline.'<br>'.$headers.'<br>';
            $ok = false;
          } else {
            // Jetzt kommt der eigentliche Inhalt der Produktdatei.
            while (($len = strlen($data = fread($src, 8192))) > 0) {
               if ($dst) fwrite($dst, $data);
               $size += $len;
            }
            $msg .= '<span class="ok">OK, '.($db_part ? 'Teil '.$db_part.' der ' : '').'Produktdatei <code>'.realpath($filename).'</code> geschrieben: '.number_format($size, 0, ',', '.').'&nbsp;Bytes</span><br>';
          }
        }
      }

      fclose($src);
    }
  }

  if ($db_part) {
    if ($dst) {
      fseek($dst, 0, SEEK_END);
      $fsize = ftell($dst);
    } else {
      $fsize = filesize($filename);
    }
    $msg .= 'Die Produktdatei <code>'.realpath($filename).'</code> hat insgesamt '.number_format($fsize, 0, ',', '.').'&nbsp;Bytes<br><br>';
  }

  if ($dst) {
    flock($dst, LOCK_UN);
    fclose($dst);
  }

  return $ok;
}

function froogle_ftp_upload($source_file_name, $dest_file_name) {
  global $ftp_func;
 	switch($ftp_func) {
		case 1:  return froogle_ftp_upload1($source_file_name, $dest_file_name);
		case 2:  return froogle_ftp_upload2($source_file_name, $dest_file_name);
  	default: return false;
	}
}

// Nutzt die PHP-FTP-Bibliothek.
function froogle_ftp_upload1($source_file_name, $dest_file_name) {
  global $msg;

  $ftp_handle = ftp_connect(FROOGLE_FTP_SERVER);
  if (!$ftp_handle) {
    $msg .= '<span class="error">Fehler: Netzwerkverbindung zum Froogle-FTP-Server &quot;'.FROOGLE_FTP_SERVER.'&quot; konnte nicht hergestellt werden. '.$php_errormsg.' Bitte sp&auml;ter nochmals probieren.</span>';
    return false;
  }

  #ftp_set_option($ftp_handle, FTP_TIMEOUT_SEC, 90);  // ggf. Timeout erhoehen

  if (!ftp_login($ftp_handle, FROOGLE_FTP_USER_NAME, FROOGLE_FTP_USER_PASS)) {
    $msg .= '<span class="error">Fehler: Login beim Froogle-FTP-Server mit dem Benutzernamen &quot;'.FROOGLE_FTP_USER_NAME.'&quot; war nicht erfolgreich. '.$php_errormsg.' Bitte pr&uuml;fen Sie die Einstellungen f&uuml;r den Benutzernamen (<CODE>FROOGLE_FTP_USER_NAME</CODE>) und das Passwort (<CODE>FROOGLE_FTP_USER_PASS</CODE>) in der Datei <code>elmar_config.inc.php</code>.</span>';
    return false;
  }

  if (FROOGLE_FTP_PASSIVE_MODE) {
    // Wenn bei ftp_put ein Fehler der Art "Illegal PORT command" auftritt, Passive-Mode aktivieren.
    if (!ftp_pasv($ftp_handle, true)) {
      $msg .= 'Warnung: Passive-Mode konnte nicht aktiviert werden. Eventuell treten Fehler beim &Uuml;bertragen der Produktdatei auf.';
    }
  }

  // Wenn bei PUT ein Fehler der Art "Illegal PORT command" auftritt, Passive-Mode aktivieren (FROOGLE_FTP_PASSIVE_MODE).
  // Evtl. ftp_nb_put() benutzen.
  if (!ftp_put($ftp_handle, $dest_file_name, $source_file_name, FTP_BINARY)) {
    $msg .= '<span class="error">Fehler: Die Produktdatei konnte nicht fehlerfrei zum Froogle-FTP-Server &uuml;bertragen werden.</span> '.$php_errormsg;
    $msg .= '<br>Nach der &Uuml;bertragung einer Produktdatei k&ouml;nnen Sie nicht sofort im Anschluss eine weitere Datei senden. Warten Sie ein paar Stunden und versuchen Sie es dann nochmals. Einmal t&auml;glich sollte es klappen.';
    if (!FROOGLE_FTP_PASSIVE_MODE)
      $msg .= '<br>Eventuell hilft es, wenn Sie den passiven FTP-Transfermodus aktivieren. Dazu ist in der Datei <code>elmar_config.inc.php</code> die Konstante <code>FROOGLE_FTP_PASSIVE_MODE</code> auf <code>TRUE</code> zu setzen.';
    else
      $msg .= '<br>Eventuell hilft es, wenn Sie den passiven FTP-Transfermodus deaktivieren. Dazu ist in der Datei <code>elmar_config.inc.php</code> die Konstante <code>FROOGLE_FTP_PASSIVE_MODE</code> auf <code>FALSE</code> zu setzen.';
    return false;
  }

  ftp_close($ftp_handle);  // oder ftp_quit($ftp_handle);

  $msg .= '<span class="ok">OK, Produktdatei erfolgreich auf den Froogle-FTP-Server &uuml;bertragen.<br>Die n&auml;chste Produktdatei kann erst in ein paar Stunden geschickt werden. Einmal t&auml;glich sollte es klappen.</span>';
  return true;
}

// Nutzt den FTP-Wrapper. Setzt allow_url_fopen voraus. Zum Überschreiben wird PHP ab 4.3 benötigt.
function froogle_ftp_upload2($source_file_name, $dest_file_name) {
  global $msg;

	$in = fopen($source_file_name, 'rb');
	if (!$in) {
    $msg .= '<span class="error">Fehler: Die Produktdatei auf dem eigenen Server (<code>'.$source_file_name.'</code>) konnte nicht geöffnet werden. '.$php_errormsg.'</span>';
    return false;
	}

  $ftp_url = 'ftp://'.FROOGLE_FTP_USER_NAME.':'.FROOGLE_FTP_USER_PASS.'@'.FROOGLE_FTP_SERVER.'/'.$dest_file_name;

  if (function_exists('stream_context_create')) {
		$opts = array('ftp'=>array('overwrite'=>true));
		$context = stream_context_create($opts);
		$fh = fopen($ftp_url, 'wb', false, $context);
	} else {
	  // So kann die Datei nicht überschrieben werden!
		$fh = fopen($ftp_url, 'wb');
	}

	if (!$fh) {
    $msg .= '<span class="error">Fehler: Die zu schreibende Datei (<code>'.$dest_file_name.'</code>) auf dem Froogle-FTP-Server &quot;'.FROOGLE_FTP_SERVER.'&quot; konnte nicht zum Schreiben angelegt bzw. geöffnet werden. '.$php_errormsg.' Eventuell einfach sp&auml;ter nochmals probieren.</span>';
    return false;
	}

	while (!feof($in)) {
		 $buffer = fgets($in, 4096);
		 fwrite($fh, $buffer);
	}

	fclose($fh);
	fclose($in);

  $msg .= '<span class="ok">OK, Produktdatei erfolgreich auf den Froogle-FTP-Server &uuml;bertragen.<br>Die n&auml;chste Produktdatei kann erst in ein paar Stunden geschickt werden. Einmal t&auml;glich sollte es klappen.</span>';
  return true;
}

?>
<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

<?php if (!empty($msg)) { ?>
  <h1 class="<?php echo $ok ? 'ok' : 'error'; ?>">Status</h1>
  <div class="<?php echo $ok ? 'okCell' : 'errorCell'; ?>">
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>

<h1>Service wider Willen</h1>
<div class="middleCell">
<p>
  Als Service k&ouml;nnen Sie hier Produktdateien f&uuml;r spezielle Preisvergleichsdienste erzeugen.
  <STRONG>Dies ist ausdr&uuml;cklich <span style="color:red">nicht</span> im Sinne des <CODE>shopinfo.xml</CODE>-Standards.</STRONG>
  Denn es ist sehr umst&auml;ndlich, f&uuml;r alle m&ouml;glichen Dienste die Produktdateien in speziellen Formaten aufzubereiten.
  W&uuml;rden alle Preisvergleichsdienste den <code>shopinfo.xml</code>-Standard unterst&uuml;tzen, w&auml;re dies nicht notwendig, wodurch insbesondere die Shops Zeit und Geld sparen w&uuml;rden.
  Es ist deshalb in Ihrem Interesse, den Standard zu f&ouml;rdern. Fragen Sie bei den Preisvergleichsdiensten doch mal nach, ob sie Shop- und Produktdaten, die entsprechend dem <CODE>shopinfo.xml</CODE>-Standard vorliegen, einlesen k&ouml;nnen. Je mehr Shopbetreiber nachhaken, desto eher werden die Preisvergleichsdienste mitmachen.
  Hier finden Sie einen <a href="<?php echo ELMAR_START; ?>letter.php">Musterbrief</a>.
</p>
<p class="comment">
  Wer bereit ist, Preisvergleichsdienste f&uuml;r Clicks, Leads usw. zu bezahlen, sollte auch mal dar&uuml;ber nachdenken, was dieses Modul wert ist. Zur finanziellen F&ouml;rderung dieses Projektes ist der PayPal-Button links gedacht. Damit Sie das Geld steuerlich als Betriebsausgabe verbuchen k&ouml;nnen, leiste ich gerne Support im Zusammenhang mit dem Elm@r-Modul und stelle Ihnen eine Rechnung inkl. MwSt. aus.
</p>
</div>

<?php if ((!defined('FROOGLE_FTP_USER_NAME') || FROOGLE_FTP_USER_NAME=='' || !defined('FROOGLE_FTP_USER_PASS') || FROOGLE_FTP_USER_PASS=='') && $generate_prodfiles && $ftp_func) { ?>
<h1>Froogle</h1>
<div class="middleCell">
  <p><a href="http://froogle.google.de/" target="_blank" title="Die Froogle-Homepage &ouml;ffnen">Froogle</a> - die Produktsuchmaschine von Google - ist nun auch in Deutschland aktiv. Die Anmeldung ist kostenlos.</p>
  <p>Bevor Sie Ihre Produktdatei hochladen k&ouml;nnen, m&uuml;ssen Sie diese im H&auml;ndler-Center anmelden. F&uuml;r die Konfiguration Ihrer Produktdatei im Froogle H&auml;ndler-Center m&uuml;ssten folgende Werte gelten:</p>
  <table cellspacing="1" cellpadding="3" border="0" summary="Froogle Konfiguration der Produktdatei" align="center">
  <tr class="row1"><td>Dateiname:</td><td><?php echo FROOGLE_FTP_FILE_NAME; ?></td></tr>
  <tr class="row2"><td>Kodierung/Zeichensatz:</td><td>Latin-1</td></tr>
  <tr class="row1"><td>Trennzeichen:</td><td><code>\t</code> f&uuml;r Tabulator</td></tr>
  <tr class="row2"><td>W&auml;hrung:</td><td><?php echo $currency; ?></td></tr>
  <tr class="row1"><td>Sprache:</td><td><?php echo $language_code; ?></td></tr>
  <tr class="row2"><td>Anf&uuml;hrungszeichen um Felder:</td><td>Keine</td></tr>
  </table>
  <p class="comment">Um die Produktdatei f&uuml;r Froogle hier per Knopfdruck &uuml;bertragen zu k&ouml;nnen, sind die entsprechenden Konstanten (<code>FROOGLE_FTP_*</code>) in der Datei <code>elmar_config.inc.php</code> zu setzen. Anschlie&szlig;end erscheint unten in der Froogle-Zeile der Tabelle der Button &quot;FTP-Upload&quot;.</p>
</div>
<?php } ?>

<?php if ($use_fopen_for_url && !$allow_url_fopen) { ?>
  <h1 class="error">Achtung</h1>
  <div class="errorCell">
  <p>
    In der <code><strong>php.ini</strong></code> ist <code><strong>allow_url_fopen=Off</strong></code> statt <code><strong>On</strong></code>.
    Produktdateien k&ouml;nnen deshalb von diesem Skript nicht mit <code>fopen</code> erzeugt und auf dem Server gespeichert werden.
    Sie k&ouml;nnen die Produktdateien aber trotzdem mittels Download-Button herunterladen.<br>
  </p>
  <p class="comment">
    Setzen Sie in der Konfigurationsdatei <code>elmar_config.inc.php</code> die Konstante <code>ELMAR_MODUL_USE_FOPEN_FOR_URL</code> auf <code>false</code>, um die Produktdateien unter Umgehung von <code>fopen</code> zu erzeugen.
  </p>
  </div>
<?php } ?>

<?php if ((!defined('ELMAR_KELKOO_FORMAT') || ELMAR_KELKOO_FORMAT==0) && defined('ELMAR_KELKOO_MAX_DESCRIPTION_LENGTH') && countLongDescriptions(ELMAR_KELKOO_MAX_DESCRIPTION_LENGTH) > 0) { ?>
  <h1 class="error">Achtung</h1>
  <div class="errorCell">
  <p>
    <strong>Kelkoo</strong> akzeptiert beim kostenlosen Partnerprogramm keine Produktbeschreibungen, die l&auml;nger als <?php echo ELMAR_KELKOO_MAX_DESCRIPTION_LENGTH; ?> Zeichen sind oder abgeschnitten wurden. Entsprechende Produkte werden deshalb nicht in die Produktdatei f&uuml;r Kelkoo aufgenommen! K&uuml;rzen Sie die Produktbeschreibungen, damit alle Produkte ber&uuml;cksichtigt werden k&ouml;nnen.
  </p>
  </div>
<?php } ?>


<h1>Produktdateien erzeugen</h1>
<div class="middleCell">
<p>
  Markieren Sie, welche Produktdateien erzeugt werden sollen, geben Sie die Dateinamen (inkl. Pfad) an, unter denen die generierten Dateien auf dem Server gespeichert werden sollen, und dr&uuml;cken Sie dann den Button "Markierte&nbsp;Produktdateien&nbsp;erzeugen".
  Relative oder fehlende Pfade werden bzgl. <code><?php echo realpath(DIR_FS_CATALOG); ?></code> aufgel&ouml;st, also relativ zum osCommerce <code>catalog</code>-Verzeichnis.
  Mit dem jeweiligen Download-Button kann eine einzelne Produktdatei erzeugt werden.
  Deutsche Preisvergleichsdienste verlangen in der Regel die Einstellungen Sprache=de und W&auml;hrung=EUR.
</p>
<p>
  Falls Fehler auftreten, liegt das oft an fehlenden Schreibrechten. Unter Linux hilft es, wenn man eine leere Datei gleichen Namens anlegt (z.&nbsp;B. <code>test.txt</code>) und deren Rechte mit <code>chmod&nbsp;a+rw&nbsp;test.txt</code> setzt.
</p>
<p>
  Weitere Produktdateiformate werden bei Bedarf erg&auml;nzt. Bitte schicken Sie die Spezifikationen per <a href="mailto:stefan@kuhlins.de?subject=Produktdateiformat">E-Mail</a>.
</p>

<?php /* Damit die Umleitung in elmar_start.php mittels REQUEST_URI klappt, muss das Formular mit GET abgeschickt werden. */ ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" method="<?php echo DB_STEP < $productAnz ? 'GET' : 'POST'; ?>" onSubmit="return check_prodfilesform(this);">
  <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
  <table summary="Produktdateien erzeugen" cellspacing="1" cellpadding="3" border="0" align="center">
  <tr class="cellHeader">
    <th>Dienst</th>
<?php if ($generate_prodfiles) { ?>
    <th>Erzeugen</th>
    <th>Dateiname</th>
    <th>Gr&ouml;&szlig;e</th>
    <th>Zeit</th>
<?php } ?>
    <th>Download</th>
  </tr>
  <tr class="row2">
    <th><a href="http://elektronischer-markt.de/" target="_blank" title="Die Elm@r-Homepage &ouml;ffnen">Standard</a></th>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="standard_active" value="yes" <?php if ($standard_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_standard" value="<?php echo $filename_standard; ?>"></td>
    <td align="right"><?php echo file_exists($filename_standard) ? number_format(filesize($filename_standard), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_standard) ? date('d.m.Y H:i:s', filemtime($filename_standard)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei im Standardformat downloaden" onclick="document.location=\'elmar_products.php?language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php" title="Nur die Produktdatei im Standardformat downloaden">Download</a>
      </noscript>
    </td>
  </tr>
  <tr class="row1">
    <th><a href="http://froogle.google.de/" target="_blank" title="Die Froogle-Homepage &ouml;ffnen">Froogle</a></th>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="froogle_active" value="yes" <?php if ($froogle_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_froogle" value="<?php echo $filename_froogle; ?>"></td>
    <td align="right"><?php echo file_exists($filename_froogle) ? number_format(filesize($filename_froogle), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_froogle) ? date('d.m.Y H:i:s', filemtime($filename_froogle)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Froogle downloaden" onclick="document.location=\'elmar_products.php?type=froogle&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
<?php if ($froogle_ftp) { ?>
        document.writeln('<br><input type="button" value="FTP-Upload" title="Die Produktdatei f&uuml;r Froogle per FTP &uuml;bertragen" onclick="froogle_ftp_click(\'<?php echo ELMAR_START.THISPAGE; ?>\')">');
<?php } ?>
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=froogle" title="Nur die Produktdatei f&uuml;r Froogle downloaden">Download</a>
<?php if ($froogle_ftp) { ?>
        <br><a href="<?php echo ELMAR_START.THISPAGE; ?>&amp;ftp=froogle" title="Die Produktdatei f&uuml;r Froogle per FTP &uuml;bertragen">FTP-Upload</a>
<?php } ?>
      </noscript>
    </td>
  </tr>
  <tr class="row2">
    <th><a href="http://www.hardwareschotte.de" target="_blank" title="Die Hardwareschotte-Homepage &ouml;ffnen">Hardwareschotte</a></th>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="hardwareschotte_active" value="yes" <?php if ($hardwareschotte_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_hardwareschotte" value="<?php echo $filename_hardwareschotte; ?>"></td>
    <td align="right"><?php echo file_exists($filename_hardwareschotte) ? number_format(filesize($filename_hardwareschotte), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_hardwareschotte) ? date('d.m.Y H:i:s', filemtime($filename_hardwareschotte)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Hardwareschotte downloaden" onclick="document.location=\'elmar_products.php?type=hardwareschotte&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=hardwareschotte" title="Nur die Produktdatei f&uuml;r Hardwareschotte downloaden">Download</a>
      </noscript>
    </td>
  </tr>
  <tr class="row1">
    <th><a href="http://projekt.wifo.uni-mannheim.de/preisvergleich/counter?id=130&amp;redirect=http://www.kelkoo.de/" target="_blank" title="Die Kelkoo-Homepage &ouml;ffnen">Kelkoo</a></th>
<?php if (!defined('VERSANDKOSTEN_AB') || VERSANDKOSTEN_AB=='') { ?>
		<td colspan="5" align="center">
	    <small>F&uuml;r Kelkoo muss in der Konfigurationsdatei <code>elmar_config.inc.php</code> die Konstante <code>VERSANDKOSTEN_AB</code> gesetzt werden.</small>
    </td>
<?php } else { ?>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="kelkoo_active" value="yes" <?php if ($kelkoo_active) echo 'checked="checked"'; ?>></td>
    <td>
      <input type="text" size="70" name="filename_kelkoo" value="<?php echo $filename_kelkoo; ?>">
<?php if (defined('KELKOO_LIMIT') && $productAnz > KELKOO_LIMIT) { /*nur sinnvoll, wenn mehr Produkte vorhanden sind*/ ?>
      <br>Limit:&nbsp;<input type="text" size="10" name="limit_kelkoo" value="<?php if($limit_kelkoo) echo $limit_kelkoo; ?>"> (Bis zu <?php echo KELKOO_LIMIT; ?> Produkte sind angeblich kostenfrei.)
<?php } ?>
    </td>
    <td align="right"><?php echo file_exists($filename_kelkoo) ? number_format(filesize($filename_kelkoo), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_kelkoo) ? date('d.m.Y H:i:s', filemtime($filename_kelkoo)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
<?php if (defined('KELKOO_LIMIT') && $productAnz > KELKOO_LIMIT) { /*nur sinnvoll, wenn mehr Produkte vorhanden sind*/ ?>
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Kelkoo downloaden" onclick="document.location=\'elmar_products.php?type=kelkoo&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\')+\'&limit=\'+document.form.limit_kelkoo.value;">');
<?php } else { ?>
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Kelkoo downloaden" onclick="document.location=\'elmar_products.php?type=kelkoo&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
<?php } ?>
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=kelkoo" title="Nur die Produktdatei f&uuml;r Kelkoo downloaden">Download</a>
      </noscript>
    </td>
  </tr>
<?php } ?>

  <tr class="row2">
    <th><a href="http://www.pangora.de/" target="_blank" title="Die Pangora-Homepage &ouml;ffnen">Pangora</a></th>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="pangora_active" value="yes" <?php if ($pangora_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_pangora" value="<?php echo $filename_pangora; ?>"></td>
    <td align="right"><?php echo file_exists($filename_pangora) ? number_format(filesize($filename_pangora), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_pangora) ? date('d.m.Y H:i:s', filemtime($filename_pangora)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Pangora downloaden" onclick="document.location=\'elmar_products.php?type=pangora&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=pangora" title="Nur die Produktdatei f&uuml;r Pangora downloaden">Download</a>
      </noscript>
    </td>
  </tr>

  <tr class="row1">
    <th><a href="http://de.shopping.com/" target="_blank" title="Die deutsche Shopping.com-Homepage &ouml;ffnen">Shopping.com</a></th>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="shopping_active" value="yes" <?php if ($shopping_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_shopping" value="<?php echo $filename_shopping; ?>"></td>
    <td align="right"><?php echo file_exists($filename_shopping) ? number_format(filesize($filename_shopping), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_shopping) ? date('d.m.Y H:i:s', filemtime($filename_shopping)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Shopping.com downloaden" onclick="document.location=\'elmar_products.php?type=shopping&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=shopping" title="Nur die Produktdatei f&uuml;r Shopping.com downloaden">Download</a>
      </noscript>
    </td>
  </tr>

  <tr class="row2">
    <th><a href="http://web.de/" target="_blank" title="Die WEB.DE-Homepage &ouml;ffnen">WEB.DE</a></th>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="webde_active" value="yes" <?php if ($webde_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_webde" value="<?php echo $filename_webde; ?>"></td>
    <td align="right"><?php echo file_exists($filename_webde) ? number_format(filesize($filename_webde), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_webde) ? date('d.m.Y H:i:s', filemtime($filename_webde)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r WEB.DE downloaden" onclick="document.location=\'elmar_products.php?type=webde&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=webde" title="Nur die Produktdatei f&uuml;r WEB.DE downloaden">Download</a>
      </noscript>
    </td>
  </tr>

  <tr class="row1">
    <th><a href="http://www.amazon.de/" target="_blank" title="Die Amazon-Homepage &ouml;ffnen">Amazon</a></th>
<?php if (!defined('ELMAR_PRODUCTS_EAN_FIELD') || !defined('AMAZON_SHIP_INTERNATIONALLY')) { ?>
		<td colspan="5" align="center">
			<small>Zum Erzeugen von Produktdateien für Amazon Market Place sind die Konstanten <code>ELMAR_PRODUCTS_EAN_FIELD</code> sowie <code>AMAZON_SHIP_INTERNATIONALLY</code> in der Konfigurationsdatei <code>elmar_config.inc.php</code> zu setzen.</small>
    </td>
<?php } else { ?>
<?php if ($generate_prodfiles) { ?>
    <td align="center"><input type="checkbox" name="amazon_active" value="yes" <?php if ($amazon_active) echo 'checked="checked"'; ?>></td>
    <td><input type="text" size="70" name="filename_amazon" value="<?php echo $filename_amazon; ?>"></td>
    <td align="right"><?php echo file_exists($filename_amazon) ? number_format(filesize($filename_amazon), 0, ',', '.') : '&nbsp;'; ?></td>
    <td align="center"><?php echo file_exists($filename_amazon) ? date('d.m.Y H:i:s', filemtime($filename_amazon)) : '&nbsp;'; ?></td>
<?php } ?>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Download" title="Nur die Produktdatei f&uuml;r Amazon downloaden" onclick="document.location=\'elmar_products.php?type=amazon&language=\'+document.form.language.value+\'&currency=\'+document.form.currency.value+(document.form.use_prod_cat_idx.checked?\'&use_prod_cat_idx=yes\':\'\');">');
      //-->
      </script>
      <noscript>
        <a href="elmar_products.php?type=amazon" title="Nur die Produktdatei f&uuml;r Amazon downloaden">Download</a>
      </noscript>
    </td>
<?php } ?>
  </tr>

<?php
  // Auswahl von Sprache und/oder Waehrung nur, wenn auch mehrere zur Auswahl stehen.
  $language_codes = get_language_codes();
  $language_codes_size = sizeof($language_codes);
  $currency_codes = get_currency_codes();
  $currency_codes_size = sizeof($currency_codes);
  if ($language_codes_size > 1 || $currency_codes_size > 1) {
?>
  <tr class="row2">
    <th>&nbsp;</th>
<?php if ($generate_prodfiles) { ?>
    <td>&nbsp;</td>
<?php } ?>
    <td>
      <?php if ($language_codes_size > 1) { ?>
        Sprache:&nbsp;<select size="1" name="language">
        <?php
          for ($i=0; $i<$language_codes_size; ++$i) {  // entspricht PHP4: foreach($language_codes as $code)
            echo '<option value="'.$language_codes[$i].'"'.($language_codes[$i]==$language_code ? ' selected' : '').'>'.$language_codes[$i].'</option>';
          }
        ?>
        </select>
      <?php } else { ?>
        <input type="hidden" name="language" value="<?php echo $language_codes[0]; ?>">
      <?php } ?>

      <?php if ($language_codes_size > 1 && $currency_codes_size > 1) { ?>
        &nbsp; und &nbsp;
      <?php } ?>

      <?php if ($currency_codes_size > 1) { ?>
        W&auml;hrung:&nbsp;<select size="1" name="currency">
        <?php
          for ($i=0; $i<$currency_codes_size; ++$i) {  // entspricht PHP4: foreach($currency_codes as $code)
            echo '<option value="'.$currency_codes[$i].'"'.($currency_codes[$i]==$currency ? ' selected' : '').'>'.$currency_codes[$i].'</option>';
          }
        ?>
        </select>
      <?php } else { ?>
        <input type="hidden" name="currency" value="<?php echo $currency_codes[0]; ?>">
      <?php } ?>
    </td>
<?php if ($generate_prodfiles) { ?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
<?php } ?>
  </tr>
<?php } ?>

<?php if (defined('ELMAR_PRODUCT_CATEGORY_INDEX') && ELMAR_PRODUCT_CATEGORY_INDEX >= 0) { ?>
  <tr class="row1">
    <th>&nbsp;</th>
<?php if ($generate_prodfiles) { ?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
<?php } ?>
    <td>
      <input type="checkbox" name="use_prod_cat_idx" value="yes" <?php if ($use_prod_cat_idx) echo 'checked="checked"'; ?>>
      Bezeichnung der <?php echo 1+ELMAR_PRODUCT_CATEGORY_INDEX; ?>. Produktkategorieebene dem Produktnamen voranstellen
    </td>
<?php if ($generate_prodfiles) { ?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
<?php } ?>
  </tr>
<?php } ?>

<?php if (DB_STEP < $productAnz && $generate_prodfiles) { /*nur sinnvoll, wenn viele Produkte vorhanden sind*/ ?>
  <tr class="row2">
    <th>&nbsp;</th>
    <td>&nbsp;</td>
    <td>
      <input type="checkbox" name="db_part" value="1" <?php if ($db_part) echo 'checked="checked"'; ?>>
      Markierte Produktdateien in mehreren Schritten generieren (s.&nbsp;u.)
      <!-- <br>(Diese Funktion ist noch in der Testphase: <a href="mailto:stefan@kuhlins.de?subject=Feedback%20Parts">Feedback</a> willkommen.) -->
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<?php } ?>

<?php if ($generate_prodfiles) { ?>
  <tr class="row1">
    <th>&nbsp;</th>
    <td align="center">
      <script type="text/javascript">
      <!--
        document.writeln(' <input type="button" value="Alle" title="Alle markieren" onclick="all_checkboxes_if(form, \'_active\');">');
        document.writeln(' <input type="button" value="Keine" title="Keine markieren" onclick="no_checkboxes_if(form, \'_active\');">');
      //-->
      </script>
    </td>
    <td>
      <input type="submit" name="do_active" value="Markierte Produktdateien erzeugen" title="Die markierten Produktdateien generieren.">
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<?php } ?>
  </table>
<?php if ($language_codes_size <= 1 && $currency_codes_size <= 1) { ?>
  <input type="hidden" name="language" value="<?php echo $language_codes[0]; ?>">
  <input type="hidden" name="currency" value="<?php echo $currency_codes[0]; ?>">
<?php } ?>
<?php if (!defined('ELMAR_PRODUCT_CATEGORY_INDEX') || ELMAR_PRODUCT_CATEGORY_INDEX < 0) { ?>
  <input type="hidden" name="use_prod_cat_idx" value="0">
<?php } ?>
</form>
<p class="comment">
  <STRONG>Achtung:</STRONG> Bei sehr vielen Produkten kann die Erstellung der Produktdatei(en) mehrere Minuten dauern. Solange passiert im Browser-Fenster nichts.
</p>
<?php if (DB_STEP < $productAnz) { ?>
<p>
  Um Timeout-Probleme bei sehr vielen Produkten zu umgehen, wurde die Funktion
  &quot;<strong>Markierte Produktdateien in mehreren Schritten generieren</strong>&quot; eingebaut.
  Solange Timeouts auftreten, muss der Wert der Konstanten <STRONG><CODE>DB_STEP</CODE></STRONG> in der Datei <CODE>elmar_config.inc.php</CODE> verringert werden.
  Einige Browser wie <em>Firefox</em> begrenzen die Anzahl von Weiterleitungen und brechen die Generierung gro&szlig;er Produktdateien unter Umst&auml;nden vorzeitig ab. Mit dem <em>Internet Explorer</em> funktioniert es.
<?php if ($froogle_ftp) { ?>
  <br>Vor einem <STRONG>FTP-Upload bei Froogle</STRONG> sind gro&szlig;e Dateien ggf. in einem ersten Schritt zun&auml;chst zu erzeugen und dann im zweiten Schritt mit dem FTP-Button hochzuladen.
<?php } ?>
</p>
<?php if (WRITE_PRODUCTFILE) { ?>
  <p class="comment">Deaktivieren Sie ggf. unter <a href="<?php echo ELMAR_START; ?>setup.php">Einstellungen</a> die Option <strong>Produktdatei speichern</strong>, damit ein externer Aufruf von <code>elmar_products.php</code> nicht versehentlich die Produktdatei <code>products.csv</code> überschreibt.</p>
<?php } ?>
<?php } ?>
</div>
