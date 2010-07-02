<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: footer.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

#if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));
?>
<!-- footer_begin -->
      </div>
    </td>
  </tr>
</table>
<div align="center" style="border-top:1px black solid">
  <p>Version&nbsp;<?php echo MODUL_VERSION.'.'.MODUL_SUBVERSION; ?> &copy;&nbsp;2004-2005 &nbsp; Elm@r &nbsp; &bull; &nbsp; Der elektronische Markt &nbsp; &bull; &nbsp; <a href="http://elektronischer-markt.de/" target="_blank">http://elektronischer-markt.de/</a></p>
  <?php if (defined('ELMAR_DEBUG') && ELMAR_DEBUG) echo '<p>ELMAR_DEBUG = on</p>'; ?>
</div>
<?php
  if ($elmar_debug_level != 'none' && ($n = count($elmar_error_msg)) > 0) {
    $level = $elmar_debug_level == 'all' ? E_ALL : E_ALL & ~E_WARNING & ~E_NOTICE;
    $first = true;
    for($i = 0; $i < $n; ++$i) {
      $em = $elmar_error_msg[$i];
      if (($level & $em['error']) != 0) {
        if ($first) {
          echo '<div style="margin:0px;padding:10px;background-color:#efefef"><h2 style="color:black; font-size:16px">Gesammelte PHP-Systemmeldungen</h2><p>Bei den folgenden Meldungen handelt es sich um Fehler und Warnungen. Sie k&ouml;nnen zur schnellen Kl&auml;rung r&auml;tselhaften Programmverhaltens beitragen. Solange alles fehlerfrei l&auml;uft, k&ouml;nnen Sie die Meldungen ignorieren.</p>';
          $first = false;
        }
        display_error($em['error'], $em['errortype'], $em['error_string'], $em['filename'], $em['line']);
      }
    }
    if (!$first) echo '</div>';
  }
?>
<?php #include(ELMAR_PATH.'debug.inc.php'); ?>
</body>
</html>
<!-- footer_end -->
