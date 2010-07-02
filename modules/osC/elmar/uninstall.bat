@echo off
REM $Id: uninstall.bat 436 2005-12-11 10:58:21Z stefan $
title Deinstallation des Elm@r-Moduls
cls

if exist .\uninstall.bat goto START
echo.
echo Bitte starten Sie uninstall.bat im Verzeichnis elmar.
echo.
goto ENDE

:START
echo.
echo Das Elm@r-Modul fuer osCommerce deinstallieren?
echo Es werden alle zum Elm@r-Modul gehoerenden Dateien und Verzeichnisse geloescht.
echo (Abschliessend muss nur noch das Verzeichnis 'elmar' manuell geloescht werden.)
echo.
echo Wir empfehlen Ihnen, vor der Deinstallation des Elm@r-Moduls ein Backup anzufertigen.
echo Rufen Sie dazu die Seite http://.../elmar_start.php?file=backup.php auf.
echo.
echo Falls Sie das Elm@r-Modul doch nicht loeschen moechten, druecken Sie jetzt bitte STRG+C.
echo.
pause

cd ..

del elmar\img\*.*
rd elmar\img

del elmar\tools\*.*
rd elmar\tools

del elmar\logs\*.*
rd elmar\logs

del elmar*.php
del amazon.txt
del froogle.txt
del hardwareschotte.txt
del kelkoo.txt
del pangora.txt
del shopping.txt
del webde.txt
del products.csv
del shopinfo.xml
del elmar_config.default

rem Mit dem naechsten Befehl loescht sich diese Datei selbst.
del elmar\*.*

:ENDE
