<?php
// $Id: convert.php,v 1.2 2002/07/07 11:18:53 haruki Exp $

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
