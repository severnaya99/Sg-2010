<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2005-08-31 15:23:36
define('_ALBM_STORETIMESTAMP','N�o colocar timestamp');
define('_ALBM_TELLAFRIEND','Recomende para um amigo');
define('_ALBM_SUBJECT4TAF','Uma foto para voc�!');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_LIDASC','N�mero do registro (Maior � posterior)');
define('_ALBM_LIDDESC','N�mero do registro (Menor � posterior)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_BTN_SELECTALL','Selecionar todos');
define('_ALBM_BTN_SELECTNONE','N�o selecionar');
define('_ALBM_BTN_SELECTRVS','Selecionar ao Contr�rio');
define('_ALBM_FMT_PHOTONUM','%s tudo numa p�gina');
define('_ALBM_AM_BUTTON_UPDATE','Modificar');
define('_ALBM_NOIMAGESPECIFIED','Erro:  Nenhuma fotografia pode fazer upload (verifique as permiss�es na prefer�ncias)');
define('_ALBM_FILEREADERROR','Erro: As Fotografias n�o est�o leg�veis.');
define('_ALBM_DIRECTCATSEL','SELECIONE UMA CATEGORIA');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Pr�ximo" ) ;
define( "_ALBM_REDOLOOPDONE" , "Feito" ) ;

define( "_ALBM_AM_ADMISSION" , "Autorizar Fotos" ) ;
define( "_ALBM_AM_ADMITTING" , "Foto(s) Autorizadas" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Autorizar fotos que voc� verificou" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "autorizar" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "extrair" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Gerenciador de Foto" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "Foto no %s-%s (de um total de %s fotos)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Remover fotos verificadas" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Remover!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Remover OK?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Mudar categoria das fotos verificadas" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Mover" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "A imagem n�o existe" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rota��o de Imagem" ) ;
define( "_ALBM_RADIO_ROTATE0" , "sem rota��o" ) ;
define( "_ALBM_RADIO_ROTATE90" , "rotacionar � direita" ) ;
define( "_ALBM_RADIO_ROTATE180" , "rotacionar 180 graus" ) ;
define( "_ALBM_RADIO_ROTATE270" , "rotacionar � esquerda" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","Mais fotos de %s");
define("_ALBM_REDOTHUMBS","Voltar thumbnails (<a href='redothumbs.php'>re-come�ar</a>)");
define("_ALBM_REDOTHUMBSINFO","Tamanho muito grande. Pode ultrapassar o tempo limite.");
define("_ALBM_REDOTHUMBSNUMBER","N�mero de thumbs por vez");
define("_ALBM_REDOING","Refazendo: ");
define("_ALBM_BACK","Voltar");
define("_ALBM_ADDPHOTO","Adicionar Foto");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","As fotos enviadas j�");
define("_ALBM_PHOTOUPLOAD","Foto enviada");
define("_ALBM_PHOTOEDITUPLOAD","Editar Foto e re-enviar");
define("_ALBM_MAXPIXEL","Tamanho m�ximo do pixel");
define("_ALBM_MAXSIZE","Tamanho m�ximo do arquivo");
define("_ALBM_PHOTOTITLE","T�tulo");
define("_ALBM_PHOTOPATH","Caminho");
define("_ALBM_TEXT_DIRECTORY","Diret�rio");
define("_ALBM_DESC_PHOTOPATH","Tipo do caminho completo do diret�rio incluindo fotos � serem registradas");
define("_ALBM_MES_INVALIDDIRECTORY","O diret�rio especificado � inv�lido.");
define("_ALBM_MES_BATCHDONE","foram registradas %s foto(s).");
define("_ALBM_MES_BATCHNONE","N�o foram detectadas fotos neste diret�rio.");
define("_ALBM_PHOTODESC","Descri��o");
define("_ALBM_PHOTOCAT","Categoria");
define("_ALBM_SELECTFILE","Selecionar foto");
define("_ALBM_FILEERROR","Foto n�o pode ser enviada ou esta foto � muito grande");

define("_ALBM_BATCHBLANK","Deixe o t�tulo em branco para usar o nomes do arquivo como t�tulo");
define("_ALBM_DELETEPHOTO","Excluir?");
define("_ALBM_VALIDPHOTO","Validar");
define("_ALBM_PHOTODEL","Excluir foto?");
define("_ALBM_DELETINGPHOTO","Excluindo foto");
define("_ALBM_MOVINGPHOTO","Movendo foto");

define("_ALBM_POSTERC","Poster: ");
define("_ALBM_DATEC","Data: ");
define("_ALBM_EDITNOTALLOWED","Voc� n�o est� autorizado � editar esse coment�rio!");
define("_ALBM_ANONNOTALLOWED","Usu�rio an�nimo n�o est� autorizado para enviar.");
define("_ALBM_THANKSFORPOST","Obrigado pelo envio!");
define("_ALBM_DELNOTALLOWED","Voc� n�o est� autorizado para excluir esse coment�rio!");
define("_ALBM_GOBACK","Voltar");
define("_ALBM_AREYOUSURE","Voc� deseja mesmo deletar esse coment�rio e coment�rios abaixo desse?");
define("_ALBM_COMMENTSDEL","Coment�rios Exclu�dos com Sucesso!");

// End New

define("_ALBM_THANKSFORINFO","Obrigado pela informa��oo. Estaremos verificando seu pedido em breve.");
define("_ALBM_BACKTOTOP","Voltar ao topo");
define("_ALBM_THANKSFORHELP","Obrigado por ajudar a manter a integridade desse diret�rio.");
define("_ALBM_FORSECURITY","Por motivos de seguran�a seu nome de usu�rio e seu endere�o IP ser�o registrados.");

define("_ALBM_MATCH","Ocorr�nci");
define("_ALBM_ALL","TUDO");
define("_ALBM_ANY","QUALQUER");
define("_ALBM_NAME","Nome");
define("_ALBM_DESCRIPTION","Descri��o");

define("_ALBM_MAIN","Geral");
define("_ALBM_NEW","Novo");
define("_ALBM_UPDATED","Atualizado");
define("_ALBM_POPULAR","Popular");
define("_ALBM_TOPRATED","Rankeado");

define("_ALBM_POPULARITYLTOM","Popularidade (Do menos popular ao mais popular)");
define("_ALBM_POPULARITYMTOL","Popularidade (Do mais popular ao menos popular)");
define("_ALBM_TITLEATOZ","T�tulo (de A a Z)");
define("_ALBM_TITLEZTOA","T�tulo (de Z a A)");
define("_ALBM_DATEOLD","Data (Fotos velhas primeiro)");
define("_ALBM_DATENEW","Data (Fotos novas primeiro)");
define("_ALBM_RATINGLTOH","Ranking (De Menos votados a Mais votados)");
define("_ALBM_RATINGHTOL","Ranking (De Mais votados a Menos votados)");

define("_ALBM_NOSHOTS","Screenshots n�o dispon�veis");
define("_ALBM_EDITTHISPHOTO","Editar Esta Foto");

define("_ALBM_DESCRIPTIONC","Descri��o: ");
define("_ALBM_EMAILC","Email: ");
define("_ALBM_CATEGORYC","Categoria: ");
define("_ALBM_SUBCATEGORY","Sub-categorias: ");
define("_ALBM_LASTUPDATEC","�ltima atualiza��o: ");
define("_ALBM_HITSC","Requisi��es: ");
define("_ALBM_RATINGC","Ranking: ");
define("_ALBM_ONEVOTE","1 voto");
define("_ALBM_NUMVOTES","%s votes");
define("_ALBM_ONEPOST","1 publica��o");
define("_ALBM_NUMPOSTS","%s publica��es");
define("_ALBM_COMMENTSC","Coment�rios: ");
define("_ALBM_RATETHISPHOTO","Rankiar esta foto");
define("_ALBM_MODIFY","Modificar");
define("_ALBM_VSCOMMENTS","Ver/Enviar Coment�rios");

define("_ALBM_THEREARE","Existem <b>%s</b> Imagens em nossa base de dados.");
define("_ALBM_LATESTLIST","�ltimas listagens");

define("_ALBM_VOTEAPPRE","Agredecemos pelo seu voto.");
define("_ALBM_THANKURATE","Obrigado por ajudar � rankiar essa foto em %s.");
define("_ALBM_VOTEONCE","Por favor, n�o vote duas vezes na mesma foto.");
define("_ALBM_RATINGSCALE","A escala � 1 - 10, 1 significa que � p�ssimo e 10 excelente.");
define("_ALBM_BEOBJECTIVE","Por favor, seja objetivo. Se todos recebem 1 ou 10 as avalia��es n�o ser�o muitos ��teis.");
define("_ALBM_DONOTVOTE","N�o vote em sua pr�pria Foto.");
define("_ALBM_RATEIT","D� sua nota!");

define("_ALBM_RECEIVED","Sua foto foi recebida com sucesso. Obrigado!");
define("_ALBM_ALLPENDING","Todas as fotos enviadas estar�o sendo enviadas para um processo de valida��o.");

define("_ALBM_RANK","Rank");
define("_ALBM_CATEGORY","Categoria");
define("_ALBM_HITS","Solicita��es");
define("_ALBM_RATING","Ranking");
define("_ALBM_VOTE","Voto");
define("_ALBM_TOP10","%s 10 Mais"); // %s is a photo category title

define("_ALBM_SORTBY","Ordenado por:");
define("_ALBM_TITLE","T�tulo");
define("_ALBM_DATE","Data");
define("_ALBM_POPULARITY","Popularidade");
define("_ALBM_CURSORTEDBY","Fotos ordenadas por: %s");
define("_ALBM_FOUNDIN","Encontrado em:");
define("_ALBM_PREVIOUS","Anterior");
define("_ALBM_NEXT","Pr�ximo");
define("_ALBM_NOMATCH","Nenhuma foto encontrada.");

define("_ALBM_CATEGORIES","Categorias");

define("_ALBM_SUBMIT","Enviar");
define("_ALBM_CANCEL","Cancelar");

define("_ALBM_MUSTREGFIRST","Desculpe, Voc� n�o tem permiss�o para acessar.<br>Por Favor, cadastre-se ou acesse sua conta primeiro!");
define("_ALBM_MUSTADDCATFIRST","Perd�o, Voc� n�o tem uma categoria criada ainda.<br>Por Favor, crie uma categoria!");
define("_ALBM_NORATING","Vota��o n�o selecionada.");
define("_ALBM_CANTVOTEOWN","Voc� n�o pode votar em sua pr�pria foto..<br>Todos os votos est�o sendo registrados e monitorados.");
define("_ALBM_VOTEONCE2","Vote apenas uma vez na mesma foto.<br>Todos os votos est�o sendo registrados e monitorados.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Fotos em espera para valida��o");
define("_ALBM_PHOTOMANAGER","Gerenciamento de fotos");
define("_ALBM_CATEDIT","Adicionar, Alterar e Deletar Categorias");
define("_ALBM_GROUPPERM_GLOBAL","Permiss�es Gerais");
define("_ALBM_CHECKCONFIGS","Verificar Configura���e e Ambientes");
define("_ALBM_BATCHUPLOAD","Registro por Lote");
define("_ALBM_GENERALSET","Prefer�ncias sobre myAlbum-P");
define("_ALBM_REDOTHUMBS2","Reconstruir Thumbnails");

define("_ALBM_SUBMITTER","Enviado por");
define("_ALBM_DELETE","Apagar");
define("_ALBM_NOSUBMITTED","N�o h� novas fotos enviadas.");
define("_ALBM_ADDMAIN","Adicionar uma categoria geral");
define("_ALBM_IMGURL","URL da Imagem(OPCIONAL: A altura da imagem ser� reajustada para 50px): ");
define("_ALBM_ADD","Adicionar");
define("_ALBM_ADDSUB","Adicionar uma SUB-Categoria");
define("_ALBM_IN","em");
define("_ALBM_MODCAT","Alterar Categoria");
define("_ALBM_DBUPDATED","Altera��o na base dados efetuada com sucesso!");
define("_ALBM_MODREQDELETED","Pedido de modifica��o deletado.");
define("_ALBM_IMGURLMAIN","URL da Imagem(OPCIONAL: � v�lido apenas para categorias gerais. A altura da imagem ser� redimensionada para 50px): ");
define("_ALBM_PARENT","Categoria acima:");
define("_ALBM_SAVE","Gravar Altera��es");
define("_ALBM_CATDELETED","Categoria Exclu�da.");
define("_ALBM_CATDEL_WARNING","AVISO: Voc� deseja mesmo remover esta categoria e TODAS suas fotos e coment�rios?");
define("_ALBM_YES","Sim");
define("_ALBM_NO","N�o");
define("_ALBM_NEWCATADDED","Categoria Adicionada com sucesso!");
define("_ALBM_ERROREXIST","ERRO: Esta Foto j� existe na base de dados!");
define("_ALBM_ERRORTITLE","ERRO: Voc� precisar colocar um T�TULO!");
define("_ALBM_ERRORDESC","ERRO: Voc� precisar colocar uma DESCRI��O!");
define("_ALBM_WEAPPROVED","Seu pedido de aprova��o foi confirmado.");
define("_ALBM_THANKSSUBMIT","Obrigado pelo envio!");
define("_ALBM_CONFUPDATED","Configura��es atualizadas com sucesso!");

}

?>
