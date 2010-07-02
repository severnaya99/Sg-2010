<?php

class ExtcalFormFileCheckBox extends XoopsFormCheckBox {

	function ExtcalFormFileCheckBox($caption, $name, $value = null){
		$this->XoopsFormCheckBox($caption, $name, $value);
	}

	/**
	 * prepare HTML for output
	 *
     * @return	string
	 */
	function render(){
		$ret = "";
		if ( count($this->getOptions()) > 1 && substr($this->getName(), -2, 2) != "[]" ) {
			$newname = $this->getName()."[]";
			$this->setName($newname);
		}
		foreach ( $this->getOptions() as $value => $name ) {
			$ret .= "<input type='checkbox' name='".$this->getName()."' value='".$value."'";
			if (count($this->getValue()) > 0 && in_array($value, $this->getValue())) {
				$ret .= " checked='checked'";
			}
			$ret .= $this->getExtra()." />".$name."<br />\n";
		}
		return $ret;
	}

}
?>