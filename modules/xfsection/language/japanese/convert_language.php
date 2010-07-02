<?php
// $Id: convert_language.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

//================================================================
// class convert language
// 2004/03/27 K.OHWADA
//================================================================

class ConvertLanguage extends BaseLanguage
{
	function convert_telafriend_subject($text)
	{
		return $this->convert_sjis_win_mac($text);
	}

	function convert_telafriend_body($text)
	{
		return $this->convert_sjis_win_mac($text);
	}

	function convert_download_filename($text)
	{
		return $this->convert_sjis_win_mac($text);
	}

	function convert_sjis_win_mac($text)
	{
		if (($this->os == 'win')||($this->os == 'mac'))
		{	$text = mb_convert_encoding($text, 'SJIS', 'EUC-JP');	}

		return $text;	
	}

}

?>