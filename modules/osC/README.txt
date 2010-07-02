xosC - 0.62 15.02.2006
- moneybookers Zahlungsmodul
- body tag aus dem stylesheet genommen
Bitte wie immer Datenbankbackup vorher machen

xosC - 0.59 13.01.2006
Reines Bugfix release

xosC - 0.58 19.12.2005
So nun gibt es auch Distributoren
Mit den Distributoren können auch externe Links für Bilder und PDF verknüpft werden
Für PDF Dateien von CNET kann es sein das eine Änderung in der product info gemacht werden muss
da CNET auch deine Vertrags/kundennummer noch haben will ( in product_info.php 'pdftext')

Ausserdem wurde ELMAR mit aufgenommen.

Wir haben es rudimentär überprüft und es scheint alles zu funktionieren.
Bugs deshalb bitte asap melden. 
Für Benutzer von Warenwirtschaftssoftware ist die products Tabelle nun noch interessanter.

Mit products_ean products_distributor_id und products_distributor_article_id kann schon anhand der Tabelle für Buchhaltungszwecke
eine sehr dataillierte Aufschlüsselung gemacht werden.

Wir haben nun auch eine empty.jpg für nicht vorhandene  Bilder. Macht daraus was ihr wollt ;)

Der Kunde kann nun auch seine Bestellung als PDF anzeigen. Im Admin bereich ist dies ebenso Möglich.

xosC - 0.57 - 09.12.2005
Kundengruppen - zur flexibleren Gestaltung wurden nun Kundengruppen eingeführt. Jede Kundengruppe
kann individuell an shipping / payment / tax angepasst werden

fsk18 - Produkten kann nun das Merkmal FSK18 zugewiesen werden. So können Kundengruppen generiert werden
welche auf FSK18 Produkte zugreifen können oder eben nicht. 

Kurzbeschreibungen für Kategorien und Produkte. Diese können nun im Katalog mitangegeben werden.

Gutscheine - Kunden können nun Gutscheine erhalten. Es können einzelne Gutschriften versendet werden oder standardmässig
an Neukunden Gutschriften gegeben werden. Coupouns können auch verkauft werden. Dafür muss Product Modell GIFT_{WERT} betragen.
ZB : GIFT_25 für einen 25 Euro gutschein.


Vorm installieren / update immer eine Sicherungskopie anlegen.

xosC - 0.55 - 30.11.2005

Für die Anpassungen an die Preisangabenverordnung. 
Im templates Verzeichnis liegen nun die templates terms_of_agreement, terms_of_revoke und shipping_handling.

Dort ihre Angaben anpassen.

Im Admin menu des Shops gibt es nun unter Konfiguration -> mystore 2 weitere Punkte

Display Products with Tax info - Zeigt die Mehrwertsteuerinfo mit an bei den Produkten
Display Products with Shipment - Zeig die Versandkosteninfo mit an bei den Produkten

Unter Admin Module gibt es nun den Punkt Bestellüberprüfung
Wenn dieses Modul installiert ist wird je nach Wunsch AGB oder/und Widerrufsbelehrung vor dem Bestellabschluss abgefragt.

DPD Shipping Modul ist nun eingebaut.

Bekannte Probleme :
- Mit eingeschaltetem cache wird das stylesheet des Shops nicht mehr angezeigt.
Dies liegt an xoops und nicht an xosC. Der workaround dafür ist das stylesheet des Shops
in das stylesheet des themes zu integrieren.

changes v0.62
- added moneybookers
- removed 'body' tag in stylesheet
Please dont forget to make befor update a databasebackup


changes v0.59
bugfix release

changes v0.58
You can now add distributors for products.
Under admin you can specify external links for this distributors ( PDF and pictures )
If you have an CNET contract it could be to change the product_info and add your customer number to
pdf data ( in product_info.php 'pdftext')

ELMAR is implemented.  Its an functional tool for build documents for product robots.

Please report each Bug

With products_ean products_pdf products_distributor_id and products_distribtuor_article_id in products table you have a better facility for controlling your products.

For empty pics you will find empty.jpg in your images directory.  Change it as you want ;)

Customers can see he is order as PDF. The same is in your admin section



changes v0.57
customer groups - You can make different customers with shipment / payment / tax rights
fsk18 for products. You can mark products as FSK18 for products which shouldnt ship to young customers.
( you can use it as FSK21 or e.g. if your country law have differences to german way )

gifts an coupons. You can give new customers gifts / coupons, Send gift or coupons to customers or make gifts as product for sell.
The products modell should look like this : GIFT_{WORTH} for e.g. GIFT_25 for an 25 Euro gift.


The changes of v0.55

For german law
In admin menu under myStore there are 2 new parameters

Display Products with Tax info - Display Products witht VAT Info
Display Products with Shipment - Display Products with Shipment info

Under admin menu modules you can find now pre order processing
Ther is on Modul. If you install this the customer must read the terms of agreement and/or the revoke terms.

You can find the necessary templates in the template directory
terms_of_agreement.html
terms_of_revoke.html
shipping_and_handling.html

DPD Shipping module is integrated.

Known issues.
If caching for shop is on, the stylesheet isnt loaded. The problem isnt xosC, it is xoops.
A workaround is to append the stylesheet of your shop to your theme stylesheet.
This will fix it.


Make an backup before every installation / update

Much fun, Michael