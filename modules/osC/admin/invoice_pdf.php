<?php
/*
 $Id: invoice_pdf.php 149 2006-01-27 13:31:07Z Michael $

 osCommerce, Open Source E-Commerce Solutions
 http://www.oscommerce.com

 Copyright (c) 2003 osCommerce

 Released under the GNU General Public License

 Changelog: by Infobroker
 info@cooleshops.de
*/
include '../../../include/cp_header.php';
include('../includes/classes/customer_group.php');
define('FPDF_FONTPATH','fpdf/font/');
require('fpdf/fpdf.php');

require('includes/application_top.php');
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_INVOICE_PDF);

function tep_date_short_add($raw_date, $typ, $add) {
    if ( ($raw_date == '0000-00-00 00:00:00') || ($raw_date == '') ) return false;

   if ($typ == 'year') {
     $year = substr($raw_date, 0, 4);
 $year = $year + (int)$add;
} else {
 $year = substr($raw_date, 0, 4);
}
 
    if ($typ == 'month') {  
        $month = (int)substr($raw_date, 5, 2);
 $month = $month + (int)add;
} else {
 $month = (int)substr($raw_date, 5, 2);
}
 
    if ($typ == 'day') {    
        $day = (int)substr($raw_date, 8, 2);
 $day = $day + (int)$add;
} else {
 $day = (int)substr($raw_date, 8, 2);
}
 
    $hour = (int)substr($raw_date, 11, 2);
    $minute = (int)substr($raw_date, 14, 2);
   $second = (int)substr($raw_date, 17, 2);

    if (@date('Y', mktime($hour, $minute, $second, $month, $day, $year)) == $year) {
       return date(DATE_FORMAT, mktime($hour, $minute, $second, $month, $day, $year));
    } else {
       return ereg_replace('2037' . '$', $year, date(DATE_FORMAT, mktime($hour, $minute, $second, $month, $day, 2037)));
    }
}

require(DIR_WS_CLASSES . 'currencies.php');
$currencies = new currencies();
$customer_group= new customer_group($the_customers_id);
include(DIR_WS_CLASSES . 'order.php');

$oID=$_GET['oID'];
$orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where orders_id = '" . $oID . "'");
$order = new order($oID);

// Kundennummer in invoice.php einfuegen
$the_extra_query= tep_db_query("select * from " . TABLE_ORDERS . " where orders_id = '" . tep_db_input($oID) . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_id= $the_extra['customers_id'];
$the_extra_query= tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $the_customers_id . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_fax= $the_extra['customers_fax'];
// Ende Kundennummer in invoice.php

       $text_query = tep_db_query("SELECT * FROM ".$xoopsDB->prefix('osc_edit_invoice')." where edit_invoice_id = '1' and language_id = '" . $languages_id . "'");
       $text = tep_db_fetch_array($text_query); 
 
       $text2_query = tep_db_query("SELECT * FROM ".$xoopsDB->prefix('osc_edit_invoice')." where edit_invoice_id = '2' and language_id = '" . $languages_id . "'");
       $text2 = tep_db_fetch_array($text2_query);

class PDF extends FPDF {
// Seitenheader
 function Header() {
  global $oID;
   $date = strftime('%A, %d %B %Y');
// Logo
      if (EDIT_INVOICE_LOGO_ALIGN == 'rechts' and EDIT_INVOICE_LOGO != '') {
      $this->Image('images/oscommerce.jpg',140,20,60);
      } else {
       if (EDIT_INVOICE_LOGO_ALIGN == 'links' and EDIT_INVOICE_LOGO != '') {
       $this->Image('images/oscommerce.jpg',20,20,60);
       } else {
        if (EDIT_INVOICE_LOGO_ALIGN == 'mitte' and EDIT_INVOICE_LOGO != '') {
        $this->Image('images/oscommerce.jpg',80,20,60);
        } else {
         if (EDIT_INVOICE_LOGO == '') {
         $this->Image('images/pixel_trans.jpg',20,20,60);
        }
          }
        }
      }
 }

// Seitenfooter
  function Footer() {
      global $pdf;
      $this->SetY(-34);
  $this->SetX(20);
      $footer_color_cell=explode(",",FOOTER_CELL_BG_COLOR);
      $this->SetFillColor($footer_color_cell[0], $footer_color_cell[1], $footer_color_cell[2]);
      $this->MultiCell(0,0,"",0,'L',1);
  $x=20;
  $y=$this->GetY();
  $this->SetLineWidth(0.25);
  $this->Line($x,$y,$this->w-$this->rMargin,$y);

  $pdf->SetFont('Arial','',6);
  $this->SetY(-33);
  $pdf->SetX(30);
  $pdf->Cell(45,3,SHOPBETREIBER,0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,'HRB:' . HRB,0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,OWNER_BANK_NAME,0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,OWNER_BANK_SWIFT,0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-30);
  $pdf->SetX(30);
  $pdf->Cell(45,3,SHOPSTRASSE,0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,AMTSGERICHT,0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,OWNER_BANK_ACCOUNT,0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,OWNER_BANK_IBAN,0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-27);
  $pdf->SetX(30);
  $pdf->Cell(45,3,SHOPSTADT,0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,'',0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,TEXT_BANK_BLZ . ' ' . STORE_OWNER_BLZ,0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-24);
  $pdf->SetX(30);
  $pdf->Cell(45,3,SHOPTELEFON,0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,OWNER_BANK_FA,0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,TEXT_BANK_KTO . '&nbsp;' . OWNER_BANK,0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-21);
  $pdf->SetX(30);
  $pdf->Cell(45,3,SHOPFAX,0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,OWNER_BANK_TAX_NUMBER,0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,'',0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);

  $pdf->Ln();
  
  $pdf->SetFont('Arial','',6);
  $this->SetY(-18);
  $pdf->SetX(30);
  $pdf->Cell(45,3,SHOPEMAIL,0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,OWNER_BANK_UST_NUMBER,0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,'',0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);
  
  $pdf->Ln();
  $pdf->Cell(0,20,'Seite '.$this->PageNo().'/{nb}',0,0,'R');
 }

 } 
function Footer() {
// Position von 1.5 cm von unten
     $this->SetY(-19);
  }


// Übernahme class
$pdf=new PDF();
$pdf->AliasNbPages();
// Abstände auf der seite setzen
$pdf->SetMargins(4,2,4);

// Hinzufügen der 1. Seite
$pdf->AddPage();

// Adressfeld mit Absender und Rechnungsanschrift
$pdf->SetX(0);
$pdf->SetY(58);
    $pdf->SetFont('Arial','',6);
$pdf->SetTextColor(0);
$pdf->Text(20,50, SHOPBETREIBER . ' *' . SHOPSTRASSE . ' *' . SHOPSTADT);
    $pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0);
    $pdf->Cell(20);
$pdf->MultiCell(70, 3.3, tep_address_format($order->billing['format_id'], $order->billing, '', '', "\n"),0,'L');

// Lieferanschrift
/*
    $pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0);
$pdf->Text(117,71,ENTRY_SHIP_TO);
$pdf->SetX(0);
$pdf->SetY(74);
    $pdf->Cell(115);
*/

// Barcode   
/* if (BARCODE_RECHNUNG == 'ja'){
 $print_barcode = pdf_open_jpeg($pdf, 'barcodegen.php?barcode= ' . tep_db_input($oID) .);
 $pdf->Image($print_barcode,120,74,60);
}
$bar = barcodegen.php?barcode=
$pdf->Cell(120, 60, $bar,0,'L');
 $pdf->Image(barcode.php?barcode=123456,120,74,60);
$pdf->Text(20,113, $bar . tep_db_input($oID));
 $pdf-><IMG SRC="barcode.php?barcode=123456&width=320&height=200">
*/
if (BARCODE_RECHNUNG == 'ja'){
 $pdf->Code39(140, 50, tep_db_input($oID));
  }
/*
 barcodegen.php?barcode= ' . tep_db_input($oID) . ' ;
*/

// Rechnungsnummer
$temp = str_replace('&nbsp;', ' ', PRINT_INVOICE_ORDERNR);
$pdf->Text(20,95, $temp . tep_db_input($oID)); 
// Rechnungsdatum
$temp = str_replace('&nbsp;', ' ', PRINT_INVOICE_DATE);
$pdf->Text(160,95,$temp . tep_date_short($order->info['date_purchased']));
// Fälligkeitsdatum
$temp2 = str_replace('&nbsp;', ' ', ENTRY_INVOICE_DATE_ZAHLBAR);
$pdf->Text(171,99,$temp2 . tep_date_short_add($order->info['date_purchased'], 'day' , ZAHLUNGSFAELLIGKEIT)); 

// Falzmarke
   $pdf->SetY(105);
$pdf->SetX(20);
$x=10;
$y=$pdf->GetY();
$pdf->SetLineWidth(0.25);
$pdf->Line($x,$y,$this->w-$this->rMargin,$y);

// Rechnungstext 1
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0);
$pdf->SetY(100);
    $pdf->Cell(15);
   $text['edit_invoice_text'] = str_replace("<br>",'',$text['edit_invoice_text']);
$pdf->MultiCell(200, 4,$text['edit_invoice_text'],0,'L');

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0);

// Auftragsnummer
$temp = str_replace('&nbsp;', ' ', ENTRY_INVOICE_AUFTRAG_ID);
$pdf->Text(20,120, $temp . tep_db_input($oID)); 

// Kundenummer
$temp = str_replace('&nbsp;', ' ', ENTRY_INVOICE_COSTUMER_ID);
$pdf->Text(170,120,$temp . $the_customers_id);

// Fields Name position
$Y_Fields_Name_position = 125;
// Table position, under Fields Name
$Y_Table_Position = 131;


function output_table_heading($Y_Fields_Name_position){
     global $pdf;
// Feldnamen der Rechnung
// Hintergrundfarbe der Boxen
 $pdf->SetFillColor(232,232,232);
// Schrift der Boxen
 $pdf->SetFont('Arial','B',7);
 $pdf->SetY($Y_Fields_Name_position);
 $pdf->SetX(20); 
 $pdf->Cell(10,6,TABLE_HEADING_QUANTITY,1,0,'C',1);
 $pdf->SetX(30);
 $pdf->Cell(25,6,TABLE_HEADING_PRODUCTS_MODEL,1,0,'C',1);
 $pdf->SetX(55);
 $pdf->Cell(57,6,TABLE_HEADING_PRODUCTS,1,0,'C',1);
 $pdf->SetX(112);
 $pdf->Cell(13,6,TABLE_HEADING_TAX,1,0,'C',1);
 $pdf->SetX(125); 
 $pdf->Cell(20,6,TABLE_HEADING_PRICE_EXCLUDING_TAX,1,0,'C',1);
 $pdf->SetX(145);
 $pdf->Cell(20,6,TABLE_HEADING_PRICE_INCLUDING_TAX,1,0,'C',1);
 $pdf->SetX(165);
 $pdf->Cell(20,6,TABLE_HEADING_TOTAL_EXCLUDING_TAX,1,0,'C',1);
 $pdf->SetX(185);
 $pdf->Cell(18,6,TABLE_HEADING_TOTAL_INCLUDING_TAX,1,0,'C',1);
 $pdf->Ln();
}
output_table_heading($Y_Fields_Name_position);

$line_counter=0;
// Rechnungsaufgliederung nach Positionen
for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) {
      if ($line_counter +sizeof($order->products[$i]['attributes']) >= 20) {
          $pdf->AddPage();
// Position der Feldnamen auf den Folgeseiten
         $Y_Fields_Name_position = 125;
// Tabellenposition under den Feldnamen
         $Y_Table_Position = 70;
         output_table_heading($Y_Table_Position-6);
         $line_counter=0;
     }

 $border='LTR';
 if(sizeof($order->products[$i]['attributes']) == 0) $border=1;

 
 
 $pdf->SetFont('Arial','',7);
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(20);
 //$temp = str_replace('&nbsp;', ' ');
 $pdf->MultiCell(10,6,$order->products[$i]['qty'] . 'x',$border,'C');
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(55);
 if (strlen($order->products[$i]['name']) > 40 && strlen($order->products[$i]['name']) < 45) {
  $pdf->SetFont('Arial','',7);
  $order->products[$i]['name'] = str_replace("<br>",'',$order->products[$i]['name']);
  $order->products[$i]['name'] = str_replace("<b>",'',$order->products[$i]['name']);
  $order->products[$i]['name'] = str_replace("</b>",'',$order->products[$i]['name']);
  $pdf->MultiCell(57,6,$order->products[$i]['name'],$border,'L');
 }
 else if (strlen($order->products[$i]['name']) > 45) {
  $pdf->SetFont('Arial','',7);
  $order->products[$i]['name'] = str_replace("<br>",'',$order->products[$i]['name']);
  $order->products[$i]['name'] = str_replace("<b>",'',$order->products[$i]['name']);
  $order->products[$i]['name'] = str_replace("</b>",'',$order->products[$i]['name']);
  $pdf->MultiCell(57,6,substr($order->products[$i]['name'],0,45),$border,'L');
 }
 else {
  $order->products[$i]['name'] = str_replace("<br>",'',$order->products[$i]['name']);
  $order->products[$i]['name'] = str_replace("<b>",'',$order->products[$i]['name']);
  $order->products[$i]['name'] = str_replace("</b>",'',$order->products[$i]['name']);
  $pdf->MultiCell(57,6,$order->products[$i]['name'],$border,'L');
 }
 $pdf->SetFont('Arial','',7);
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(112);
 $pdf->MultiCell(13,6,tep_display_tax_value($order->products[$i]['tax']) . '%',$border,'C');
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(30);
     $pdf->SetFont('Arial','',7);
 $pdf->MultiCell(25,6,$order->products[$i]['model'],$border,'C');
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(125);
     $pdf->SetFont('Arial','',7);
 $pdf->MultiCell(20,6,$currencies->format($order->products[$i]['final_price'], true, $order->info['currency'], $order->info['currency_value']),$border,'C');
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(145);
 $pdf->MultiCell(20,6,$currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']),$border,'C');
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(165);
 $pdf->MultiCell(20,6,$currencies->format($order->products[$i]['final_price'] * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']),$border,'C');
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(185);
 $pdf->MultiCell(18,6,$currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']),$border,'C');
 $Y_Table_Position += 6;
 $attributes='';
 $pdf->SetFont('Arial','I',5);
 for($att = 0; $att < sizeof($order->products[$i]['attributes']); $att ++) {
    $border='LR';
	if($att== sizeof($order->products[$i]['attributes'])-1) $border.='B';
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(20);
 //$temp = str_replace('&nbsp;', ' ');
    $pdf->MultiCell(10,4,"",$border,'C');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(55);
    $attributes=$order->products[$i]['attributes'][$att]['option']." :".$order->products[$i]['attributes'][$att]['value'];
    $pdf->MultiCell(57,4,$attributes,$border,'L');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(112);
    $pdf->MultiCell(13,4,'',$border,'C');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(30);
    $pdf->MultiCell(25,4,"",$border,'C');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(125);
    $pdf->MultiCell(20,4,"",$border,'C');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(145);
    $pdf->MultiCell(20,4,"",$border,'C');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(165);
    $pdf->MultiCell(20,4,"",$border,'C');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(185);
    $pdf->MultiCell(18,4,"",$border,'C');
    $line_counter++;
    $Y_Table_Position += 4;
 }
 $line_counter++;


}

$Y_Table_Position += 4;

if ( $Y_Table_Position > 240 ) {
 $pdf->AddPage();
 $Y_Table_Position = 70;         
}

for ($i = 0, $n = sizeof($order->totals); $i < $n; $i++) {
 if ($i == 0) {
// Text Zahlungsweise
  $pdf->SetFont('Arial','B',8);
  $pdf->SetTextColor(0); 
  $temp = substr ($order->info['payment_method'] , 0, 23);
  $pdf->Text(20,$Y_Table_Position+4,ENTRY_PAYMENT_METHOD . ' ' . $temp); 
  $pdf->SetFont('Arial','',8);
 }
 $pdf->SetY($Y_Table_Position);
 // Position Feld Beschreibung Endbeträge Wert ändern proportionanl zum Wert $pdf->MultiCell(40
 $pdf->SetX(138);
 $temp = substr ($order->totals[$i]['text'],0 ,3);  
 if ($temp == '<b>') {
  $pdf->SetFont('Arial','B',8);
  $temp2 = substr($order->totals[$i]['text'], 3);
  $order->totals[$i]['text'] = substr($temp2, 0, strlen($temp2)-4);
 }
 $temp = substr ($order->totals[$i]['title'],0 ,3);  
 if ($temp == '<b>') {
  $pdf->SetFont('Arial','B',8);
  $temp2 = substr($order->totals[$i]['title'], 3);
  $order->totals[$i]['title'] = substr($temp2, 0, strlen($temp2)-5) . ':';
 }
 // Breite Feld Beschreibung Endbeträge Wert ändern proportionanl zum Wert $pdf->MultiCell(40
 $pdf->MultiCell(40,4,$order->totals[$i]['title'],0,'L'); 
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(178);
 $pdf->MultiCell(25,4,$order->totals[$i]['text'],0,'R');
 $Y_Table_Position += 4; 
}
$Y_Table_Position += 4; 
// Strich unter den Rechnungsbeträgen
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0);
   $pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(0,0,"",1,'L',1);
   $Y_Table_Position += 4;
$x=0;
$y=$pdf->GetY();
$pdf->SetLineWidth(0.25);
$pdf->Line($x,$y,$this->w-$this->rMargin,$y);

if ( $Y_Table_Position > 240 ) {
 $pdf->AddPage();
 $Y_Table_Position = 70;         
}

// Rechnungstext 2 
   $pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0); 
$pdf->SetX(0); 
$pdf->SetY($Y_Table_Position);
   $pdf->Cell(15);
  $text2['edit_invoice_text'] = str_replace("<br>",'',$text2['edit_invoice_text']);
$pdf->MultiCell(250, 4,$text2['edit_invoice_text'],0,'L'); 

$pdf->Output();
?>