<?php
// $Id: convert.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// zmodyfikowany 2004/03/03 (Modified by Artur Strauss artur_strauss@poczta.fm)

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