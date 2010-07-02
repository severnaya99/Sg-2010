<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: logout.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));
?>

<h1>Abmelden</h1>
<div class="middleCell">
<p class="ok">OK, Sie wurden abgemeldet.</p>
<p><a href="<?php echo ELMAR_START; ?>index.php">Hier</a> k&ouml;nnen Sie sich wieder anmelden.</p>
</div>
