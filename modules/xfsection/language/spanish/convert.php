<?php
// 2004/03/01 DACEVEDO 
//   Spanish Translation ES-CO v0.2

// 2004/02/20 DACEVEDO
//   Spanish Translation ES-CO v0.1

// $Id: convert.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

class WfsConvert {

        function TextPlane($text) {
                $text = preg_replace("/[\s\t\n]{2,}/", " ", $text);
                return $text;
        }

        function TextHtml($text) {
                $text = preg_replace("/[\s\t\n]{2,}/", " ", $text);
                return $text;
        
        }
        
        function stripSpaces($text) {
                $ret = preg_replace("/[\s\t\n]{2,}/", " ", $text);
                return $ret;
        }

        function filenameForWin($text){
                return $text;
        }


}

?>
