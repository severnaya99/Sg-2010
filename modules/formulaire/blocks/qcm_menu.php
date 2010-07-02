<?php
function qcm_menu_show() {

	global $xoopsDB, $myts, $xoopsUser, $xoopsModule, $xoopsTpl, $xoopsConfig;

	$myts =& MyTextSanitizer::getInstance();
	$menuid=0;
	$block = array();
    $block['css_file'] = XOOPS_URL . "/modules/formulaire/formulaire.css";
    if ( file_exists(XOOPS_THEME_PATH.'/'.$xoopsConfig['theme_set'].'/formulaire.css') ) {
	    $block['css_file'] = XOOPS_URL . '/themes/' . $xoopsConfig['theme_set'] . '/formulaire.css';
    }

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

	$module_handler =& xoops_gethandler('module');
	$formulaireModule =& $module_handler->getByDirname('formulaire');

	$block['admin_module'] = 0;
	if ( $xoopsUser ){
		if ( $xoopsUser->isAdmin($formulaireModule) ) {
			$block['admin_module'] = 1;
		}
	}

	$sql = "SELECT f.id_form, f.desc_form, f.help , m.indent, m.margintop, m.marginbottom, m.itemurl, m.bold FROM " . $xoopsDB->prefix("form_id") . " f LEFT JOIN " . $xoopsDB->prefix("form_menu") . " m on f.id_form = m.menuid WHERE f.qcm = 1 and m.status =1 ORDER BY m.position";
	$res = $xoopsDB->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.$xoopsDB->error());
	while ($row= $xoopsDB->fetchArray($res)) {
		if ( $gperm_handler -> checkRight( 'Droits des categories', $row['id_form'], $groups, $formulaireModule->getVar('mid') ) ) {

            $form = array();
			$form['id_form'] = $row['id_form'];
			$form['title'] = $myts->makeTboxData4Show($row['desc_form']);
			$form['help'] = $myts->displayTarea( $row['help'] );

			$form['indent'] = $row['indent'];
			$form['margintop'] = $row['margintop'];
			$form['marginbottom'] = $row['marginbottom'];
			$form['itemurl'] = $row['itemurl'];
	        $form['itemurl'] = XOOPS_URL . "/modules/" . $formulaireModule->getVar('dirname') . "/formulaire.php?id=" . $row['id_form'];
			$form['bold'] = $row['bold'];
            $block['formulaires'][] = $form;
		}
	}
	return $block;
}
?>