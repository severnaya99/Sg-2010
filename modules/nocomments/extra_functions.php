<?php
// Saniterings funktion hugget fra Xim
function sanitize($text) {
    $text = htmlspecialchars($text, ENT_QUOTES);
    //$text = preg_replace('/([^\s]{10})(?=[^\s])/m', '$1 <br />', $text); 
    $myts = MyTextSanitizer::getInstance();
    $text = $myts->displayTarea($text,1,1,1,1);
    $text = str_replace("\n\r","\n",$text);
    $text = str_replace("\r\n","\n",$text);
    $text = str_replace("\n","<br />",$text);
    $text = str_replace("\"","'",$text);

    return $text;
}

// If IE then we might need to insert dummy <div>
function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}
?>