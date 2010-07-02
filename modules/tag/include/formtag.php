<?php
/**
 * Tag management
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */
 
if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

if (!class_exists('XoopsFormText')) {
	die("XoopsFormText not defined");
}

class XoopsFormTag extends XoopsFormText {

	/**
	 * Constructor
	 * 
	 * @param	string	$name       "name" attribute
	 * @param	int		$size	    Size
	 * @param	int		$maxlength	Maximum length of text
     * @param	mixed	$value      Initial text or itemid
     * @param	int		$catid      category id (applicable if $value is itemid)
	 */
	function XoopsFormTag($name, $size, $maxlength, $value = null, $catid = 0){
		include XOOPS_ROOT_PATH."/modules/tag/include/vars.php";
		if(!is_object($GLOBALS["xoopsModule"]) || "tag" != $GLOBALS["xoopsModule"]->getVar("dirname")){
			if(function_exists("xoops_load_lang_file")){
				xoops_load_lang_file("main", "tag");
			}else{
				$path = XOOPS_ROOT_PATH . "/modules/tag/language";
				if ( !@include_once( "{$path}/{$GLOBALS['xoopsConfig']['language']}/main.php" ) ) {
					$ret = @include_once( "{$path}/english/main.php" );
				}
			}
		}
		// itemid
		if( !empty($value) && is_numeric($value) && is_object($GLOBALS["xoopsModule"]) ){
			$modid = $GLOBALS["xoopsModule"]->getVar("mid");
			$tag_handler =& xoops_getmodulehandler("tag", "tag");
			if($tags = $tag_handler->getByItem($value, $modid, $catid)) {
				$value = htmlspecialchars(implode(", ", $tags));
			}
		}
		
		$caption = TAG_MD_TAGS;
		$this->XoopsFormText($caption, $name, $size, $maxlength, $value);
	}

	/**
	 * Prepare HTML for output
	 * 
     * @return	string  HTML
	 */
	function render(){
		$delimiters = tag_get_delimiter();
		foreach(array_keys($delimiters) as $key) {
			$delimiters[$key] = "<em style=\"font-weight: bold; color: red; font-style: normal;\">".htmlspecialchars($delimiters[$key])."</em>";
		}
		$render  = "<input type='text' name='".$this->getName()."' id='".$this->getName()."' size='".$this->getSize()."' maxlength='".$this->getMaxlength()."' value='".$this->getValue()."' ".$this->getExtra()." />";
		$render .= "<br />". TAG_MD_TAG_DELIMITER . ": [".implode("], [", $delimiters)."]";
		return $render;
	}
}
?>