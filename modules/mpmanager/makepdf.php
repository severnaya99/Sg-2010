<?php
// $Id: makepdf.php,v 1.1.2.6 2004/11/16 21:43:13 phppp Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

error_reporting(0);
/* Include the header */
include_once("header.php");
require 'fpdf/fpdf.php';

$msg_id = empty($_REQUEST['msg_mp']) ? '' : $_REQUEST['msg_mp'];
$option = !empty($_REQUEST['option']) ? $_REQUEST['option'] : 'default';

if ( empty($msg_id) ) {
	redirect_header(XOOPS_URL."/modules/mpmanager/msgbox.php",1,_PM_REDNON);
}

//verify si utilisateur
global $xoopsUser, $xoopsDB, $xoopsConfig, $xoopsModule, $xoops_meta_keywords ,$xoops_meta_description;

if (empty($xoopsUser)) {
 redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);
	}

$myts =& MyTextSanitizer::getInstance();
$size = count($msg_id);
$msg =& $msg_id;

//create the A4-PDF...
$pdf=new FPDF();

for ( $i = 0; $i < $size; $i++ ) {

switch( $option )
{
   default:
   redirect_header("javascript:history.go(-1)",2, _PM_REDNON);
   break;
   
case "pdf_messages":
  $pm_handler  = & xoops_gethandler('priv_msgs'); 
  $pm =& $pm_handler->get($msg_id[$i]);
 
$pdf_data['title'] = utf8_decode(Chars($pm->getVar('subject')));
$pdf_data['content'] = utf8_decode(Chars($pm->getVar('msg_text')));

$pdf_data['date'] = formatTimestamp($pm->getVar('msg_time'));
$pdf_data['author'] = XoopsUser::getUnameFromId($pm->getVar('from_userid'));
$pdf->AddPage();


		$pdf->SetFont('Arial','B',15);
		$w=$pdf->GetStringWidth($pdf_data['title'])+6;
		$pdf->SetX((210-$w)/2);
		$pdf->SetDrawColor(204,204,204);
		$pdf->SetFillColor(0,0,0);
		$pdf->SetLineWidth(0.2);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell($w,8,Chars($pdf_data['title']),1,1,'C',true);
		$pdf->Ln(6);

// date
		$pdf->SetFont('Arial','',8);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFillColor(255,255,255);
		$pdf->MultiCell(40,8,chars(_MP_TRI_DATE).': '.$pdf_data['date'],1,1,'L',true);
		$pdf->Ln(6);

		$pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(239,239,239);
		$pdf->MultiCell(190,10,$pdf_data['content'],1,1, 'C', true);
		$pdf->Ln(4);
		$pdf->SetFillColor(255,255,255);
		$pdf->MultiCell(190,10,_MP_FROM2." : ".$pdf_data['author'],1,1, 'C', true);
		$pdf->Ln(4);

  break;
  
case "pdf_messagess":
 $pm_handler  = & xoops_gethandler('priv_msgs'); 
 $pm =& $pm_handler->get($msg_id[$i]);
 $criteria = new CriteriaCompo();
 $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
 $criteria->add(new Criteria('msg_pid', $pm->getVar('msg_pid'))); 
 $pm =& $pm_handler->getObjects($criteria);
 
 foreach (array_keys($pm) as $i) { 


$pdf_data['title'] = utf8_decode(Chars($pm[$i]->getVar('subject')));
$pdf_data['content'] = utf8_decode(Chars($pm[$i]->getVar('msg_text')));

$pdf_data['date'] = formatTimestamp($pm[$i]->getVar('msg_time'));
$pdf_data['author'] = XoopsUser::getUnameFromId($pm[$i]->getVar('from_userid'));


$pdf->AddPage();
		$pdf->SetFont('Arial','B',15);
		$w=$pdf->GetStringWidth($pdf_data['title'])+6;
		$pdf->SetX((210-$w)/2);
		$pdf->SetDrawColor(204,204,204);
		$pdf->SetFillColor(0,0,0);
		$pdf->SetLineWidth(0.2);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell($w,8,Chars($pdf_data['title']),1,1,'C',true);
		$pdf->Ln(6);

// date
		$pdf->SetFont('Arial','',8);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFillColor(255,255,255);
		$pdf->MultiCell(40,8,chars(_MP_TRI_DATE).': '.$pdf_data['date'],1,1,'L',true);
		$pdf->Ln(6);

		$pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(239,239,239);
		$pdf->MultiCell(190,10,$pdf_data['content'],1,1, 'C', true);
		$pdf->Ln(4);
		$pdf->SetFillColor(255,255,255);
		$pdf->MultiCell(190,10,_MP_FROM2." : ".$pdf_data['author'],1,1, 'C', true);
		$pdf->Ln(4);
		
		}

	
 break;
 
 
 }
 }
 $pdf->Output();
     function Chars($text)
    {
	$myts = & MyTextSanitizer :: getInstance(); 
        return preg_replace(
                            array( "/&#039;/i", "/&#233;/i", "/&#232;/i", "/&#224;/i", "/&quot;/i", '/<br \/>/i', "/&agrave;/i"),
                            array( "'", "é", "è", "à", '"', "\n", "à"),
                           $text);
    }

?>