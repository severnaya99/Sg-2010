#!/bin/bash
# $Id: writeaccess.sh 431 2005-11-08 22:46:58Z stefan $
echo Schreibrechte fuer einige Dateien des Elm@r-Moduls setzen.

if [ ! -f elmar/config.inc.php ]
then
  echo
  echo "Bitte starten Sie das Skript mit elmar/writeaccess.sh"
  echo "also im Verzeichnis ueber elmar."
  echo
else
  chmod a+rw shopinfo.xml
  chmod a+rw products.csv
  chmod a+rw amazon.txt
  chmod a+rw froogle.txt
  chmod a+rw hardwareschotte.txt
  chmod a+rw kelkoo.txt
  chmod a+rw pangora.txt
  chmod a+rw shopping.txt
  chmod a+rw webde.txt
  chmod a+rw elmar/config.inc.php
  chmod a+rw elmar/logs/error.html
  chmod a+rw elmar/logs/error.log
  chmod a+rw elmar/logs/products.html
  chmod a+rw elmar/logs/products.log
  chmod a+rw elmar/logs/request.html
  chmod a+rw elmar/logs/request.log
  echo Fertig.
fi
