#!/bin/bash
# $Id: uninstall.sh 436 2005-12-11 10:58:21Z stefan $

if [ ! -f elmar/uninstall.sh ]
then
  echo
  echo "Bitte starten Sie die Deinstallation mit elmar/uninstall.sh"
  echo "also im Verzeichnis ueber elmar."
  echo
else
  if [ -n "$1" ]
  then
    ok="y"
  else
    echo
    echo Das Elm@r-Modul fuer osCommerce deinstallieren?
    echo Es werden alle zum Elm@r-Modul gehoerenden Dateien und Verzeichnisse geloescht.
    echo
    echo Wir empfehlen Ihnen, vor der Deinstallation des Elm@r-Moduls ein Backup anzufertigen.
    echo Rufen Sie dazu die Seite http://.../elmar_start.php?file=backup.php auf.
    echo
    read -p "Deinstallation des Elm@r-Moduls starten (y/n)?"
    if [ $REPLY != "y" ]
    then
      ok="n"
    else
      ok="y"
    fi
  fi

  if [ $ok != "y" ]
  then
    echo "Deinstallation abgebrochen!"
  else
    echo "Dateien werden geloescht..."

    rm elmar*.php
    rm amazon.txt
    rm froogle.txt
    rm hardwareschotte.txt
    rm kelkoo.txt
    rm pangora.txt
    rm shopping.txt
    rm webde.txt
    rm products.csv
    rm shopinfo.xml
    rm elmar_config.default

    rm -rf elmar

    echo
    echo "Deinstallation abgeschlossen!"
    echo
  fi
fi
