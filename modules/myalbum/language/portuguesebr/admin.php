<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {





// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:03
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_AM_TH_DATE','�ltima atualiza��o');
define('_AM_TH_BATCHUPDATE','Conferida a atualiza��o das fotografias');
define('_AM_OPT_NOCHANGE','- NENHUMA MUDAN�A -');
define('_AM_JS_UPDATECONFIRM','Os artigos conferidos ser�o atualizados. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_AM_H3_FMT_CATEGORIES','Gerenciar as categorias (%s)');
define('_AM_CAT_TH_TITLE','Nome');
define('_AM_CAT_TH_PHOTOS','Imagens');
define('_AM_CAT_TH_OPERATION','Opera��o');
define('_AM_CAT_TH_IMAGE','Banner');
define('_AM_CAT_TH_PARENT','Principal');
define('_AM_CAT_TH_IMGURL','URL do Banner');
define('_AM_CAT_MENU_NEW','Fazer uma categoria');
define('_AM_CAT_MENU_EDIT','Editar uma categoria');
define('_AM_CAT_INSERTED','A category is added');
define('_AM_CAT_UPDATED','A categoria foi modificada');
define('_AM_CAT_BTN_BATCH','Aplicar');
define('_AM_CAT_LINK_MAKETOPCAT','Crie uma categoria nova em cima');
define('_AM_CAT_LINK_ADDPHOTOS','Adicionar uma imagem nesta categoria');
define('_AM_CAT_LINK_EDIT','Editar esta categoria');
define('_AM_CAT_LINK_MAKESUBCAT','Fazer uma categoria nova debaixo desta categoria');
define('_AM_CAT_FMT_NEEDADMISSION','%s � preciso imagem para adicionar');
define('_AM_CAT_FMT_CATDELCONFIRM','%s ser� eclu�do as sub-categorias, imagens, coment�rios. Voc� tem certeza?');
define('_AM_H3_FMT_ADMISSION','Adicionando imagem (%s)');
define('_AM_H3_FMT_PHOTOMANAGER','Gerenciar Foto (%s)');
define('_AM_H3_FMT_IMPORTTO','Importando imagens de outros m�dulos para %s');
define('_AM_H3_FMT_EXPORTTO','Exportando imagens de %s para outros m�dulos');
define('_AM_FMT_EXPORTTOIMAGEMANAGER','Exportando do gerenciador de imagens do XOOPS');
define('_AM_FMT_EXPORTIMSRCCAT','Fonte');
define('_AM_FMT_EXPORTIMDSTCAT','Destino');
define('_AM_CB_EXPORTRECURSIVELY','com imagens na sub-categoras');
define('_AM_CB_EXPORTTHUMB','Exporte thumbnails no lugar das imagens principais');
define('_AM_MB_EXPORTCONFIRM','Exportando, OK?');
define('_AM_FMT_EXPORTSUCCESS','Voc� exportou %s imagens');

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:26
define('_AM_ALBM_IMPORT','Importanto imagens de outros m�dulos');
define('_AM_FMT_IMPORTTO','Importe de %s ');
define('_AM_FMT_IMPORTFROMMYALBUMP','Importando de "% s" para o myAlbum-P');
define('_AM_FMT_IMPORTFROMIMAGEMANAGER','Importando do gerenciador de imagens do XOOPS');
define('_AM_CB_IMPORTRECURSIVELY','Importing sub-categories recursively');
define('_AM_RADIO_IMPORTCOPY','Copiando imagens (os coment�rios n�o ser� copiados');
define('_AM_RADIO_IMPORTMOVE','Mover imagens (ser�o tidos sucesso coment�rios)');
define('_AM_MB_IMPORTCONFIRM','Importando, OK?');
define('_AM_FMT_IMPORTSUCCESS','Voc� importou %s imagens');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Top of Admin)
define( "_ALBM_INDEX_BLOCKSADMIN" , "Adminstra��o" ) ;

// Admission
define( "_AM_TH_SUBMITTER" , "Enviado por" ) ;
define( "_AM_TH_TITLE" , "T�tulo" ) ;
define( "_AM_TH_DESCRIPTION" , "Descri��o" ) ;
define( "_AM_TH_CATEGORIES" , "Categoria" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "verificador" ) ;

define( "_AM_H4_ENVIRONMENT" , "verifica��o de ambiente" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "Diretiva PHP" ) ;
define( "_AM_MB_BOTHOK" , "ambos ok" ) ;
define( "_AM_MB_NEEDON" , "necessita ativa��o" ) ;


define( "_AM_H4_TABLE" , "Verfica��o de tabela" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Tabela de fotos" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Tabela de descri��o" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Tabela de categorias" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Tabela de vota��o" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Tabela de coment�rios" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "N�mero de fotos" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "N�mero de Descri��es" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "N�mero de Categorias" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "N�mero de vota��es" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "N�mero de coment�rios" ) ;


define( "_AM_H4_CONFIG" , "verifica��o de configura��o" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Dutos para imagens" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Diret�rio de Fotos" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Diret�rio de Thumbnails" ) ;
define( "_AM_ERR_LASTCHAR" , "Erro: O �ltimo caracter n�o deve ter '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Erro: O Primeiro caracter n�o deve ter '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Erro: Primeiro crie e ajuste permiss�o para 777 este diret�rio via FTP ou pelo CPanel." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Erro: Isto n�o � um diret�rio." ) ;
define( "_AM_ERR_READORWRITE" , "Erro: Este diret�rio n�o tem permiss�o de escrita, ou  leitura. Voc� deve alterar a permiss�� desse diret�rio para 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Erro: O caminho das fotos deve ser diferente do caminho dos thumbnails" ) ;
define( "_AM_LNK_CHECKGD2" , "Verifique se o GD2 est� corretamente compilado na vers�o de seu PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Se a p�gina n�o estiver sendo visualizada corretamente, verifique se seu GD est� funcionando em modo truecolor." ) ;
define( "_AM_MB_GD2SUCCESS" , "Parab�ns!<br />voc� pode utilizar G2 em modo truecolor neste ambiente." ) ;


define( "_AM_H4_PHOTOLINK" , "Fotos e Verificador de link de thumbs" ) ;
define( "_AM_MB_NOWCHECKING" , "Verificando..." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "a foto (%s) n�o pode ser lida.." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "o thumbnail (%s) n�o pode ser lido." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s de fotos mortas foram encontradas." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s de thumbnails devem ser reconstru�dos." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s arquivos de lixo foram removidos." ) ;
define( "_AM_LINK_REDOTHUMBS" , "reconstruir thumbnails" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "tabelas de manuten��o" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "manuten��o de fotos" ) ;

define( "_AM_FMT_CHECKING" , "verificando %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "manuten��o de fotos como refazer thumbnails etc." ) ;

define( "_AM_MB_FAILEDREADING" , "falha na leitura." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "thumbnail criado." ) ;
define( "_AM_MB_BIGTHUMBS" , "falha na cria��o de thumbnail. copiado." ) ;
define( "_AM_MB_SKIPPED" , "n�o verificado." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(campos reparados.)" ) ;
define( "_AM_MB_RECREMOVED" , "registro removido." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "foto geral n�o existe." ) ;
define( "_AM_MB_PHOTORESIZED" , "foto geral foi redimensionada." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "n�mero de registros come�ando com" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "n�mero de registros processados por vez" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "N�mero muito grande. Pode ultrapassar o tempo limite." ) ;

define( "_AM_RADIO_FORCEREDO" , "for�ar cria��o sempre que um thumbnail existir" ) ;
define( "_AM_RADIO_REMOVEREC" , "remove registros n�o linkados" ) ;
define( "_AM_RADIO_RESIZE" , "redimensionar fotos grandes maior que o especificado nas prefer�ncias" ) ;

define( "_AM_MB_FINISHED" , "finalizado" ) ;
define( "_AM_LINK_RESTART" , "recome�ar" ) ;
define( "_AM_SUBMIT_NEXT" , "pr�ximo" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "registro" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Permiss�es gerais" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "Configura privil�gios do grupo deste m�dulo" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Permiss�es foram alteradas com sucesso" ) ;

}

?>
