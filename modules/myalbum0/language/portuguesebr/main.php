<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2005-08-31 15:23:36
define('_ALBM_STORETIMESTAMP','Não colocar timestamp');
define('_ALBM_TELLAFRIEND','Recomende para um amigo');
define('_ALBM_SUBJECT4TAF','Uma foto para você!');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_LIDASC','Número do registro (Maior é posterior)');
define('_ALBM_LIDDESC','Número do registro (Menor é posterior)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_BTN_SELECTALL','Selecionar todos');
define('_ALBM_BTN_SELECTNONE','Não selecionar');
define('_ALBM_BTN_SELECTRVS','Selecionar ao Contrário');
define('_ALBM_FMT_PHOTONUM','%s tudo numa página');
define('_ALBM_AM_BUTTON_UPDATE','Modificar');
define('_ALBM_NOIMAGESPECIFIED','Erro:  Nenhuma fotografia pode fazer upload (verifique as permissões na preferências)');
define('_ALBM_FILEREADERROR','Erro: As Fotografias não estão legíveis.');
define('_ALBM_DIRECTCATSEL','SELECIONE UMA CATEGORIA');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Próximo" ) ;
define( "_ALBM_REDOLOOPDONE" , "Feito" ) ;

define( "_ALBM_AM_ADMISSION" , "Autorizar Fotos" ) ;
define( "_ALBM_AM_ADMITTING" , "Foto(s) Autorizadas" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Autorizar fotos que você verificou" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "autorizar" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "extrair" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Gerenciador de Foto" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "Foto no %s-%s (de um total de %s fotos)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Remover fotos verificadas" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Remover!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Remover OK?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Mudar categoria das fotos verificadas" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Mover" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "A imagem não existe" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rotação de Imagem" ) ;
define( "_ALBM_RADIO_ROTATE0" , "sem rotação" ) ;
define( "_ALBM_RADIO_ROTATE90" , "rotacionar à direita" ) ;
define( "_ALBM_RADIO_ROTATE180" , "rotacionar 180 graus" ) ;
define( "_ALBM_RADIO_ROTATE270" , "rotacionar à esquerda" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","Mais fotos de %s");
define("_ALBM_REDOTHUMBS","Voltar thumbnails (<a href='redothumbs.php'>re-começar</a>)");
define("_ALBM_REDOTHUMBSINFO","Tamanho muito grande. Pode ultrapassar o tempo limite.");
define("_ALBM_REDOTHUMBSNUMBER","Número de thumbs por vez");
define("_ALBM_REDOING","Refazendo: ");
define("_ALBM_BACK","Voltar");
define("_ALBM_ADDPHOTO","Adicionar Foto");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","As fotos enviadas já");
define("_ALBM_PHOTOUPLOAD","Foto enviada");
define("_ALBM_PHOTOEDITUPLOAD","Editar Foto e re-enviar");
define("_ALBM_MAXPIXEL","Tamanho máximo do pixel");
define("_ALBM_MAXSIZE","Tamanho máximo do arquivo");
define("_ALBM_PHOTOTITLE","Título");
define("_ALBM_PHOTOPATH","Caminho");
define("_ALBM_TEXT_DIRECTORY","Diretório");
define("_ALBM_DESC_PHOTOPATH","Tipo do caminho completo do diretório incluindo fotos à serem registradas");
define("_ALBM_MES_INVALIDDIRECTORY","O diretório especificado é inválido.");
define("_ALBM_MES_BATCHDONE","foram registradas %s foto(s).");
define("_ALBM_MES_BATCHNONE","Não foram detectadas fotos neste diretório.");
define("_ALBM_PHOTODESC","Descrição");
define("_ALBM_PHOTOCAT","Categoria");
define("_ALBM_SELECTFILE","Selecionar foto");
define("_ALBM_FILEERROR","Foto não pode ser enviada ou esta foto é muito grande");

define("_ALBM_BATCHBLANK","Deixe o título em branco para usar o nomes do arquivo como título");
define("_ALBM_DELETEPHOTO","Excluir?");
define("_ALBM_VALIDPHOTO","Validar");
define("_ALBM_PHOTODEL","Excluir foto?");
define("_ALBM_DELETINGPHOTO","Excluindo foto");
define("_ALBM_MOVINGPHOTO","Movendo foto");

define("_ALBM_POSTERC","Poster: ");
define("_ALBM_DATEC","Data: ");
define("_ALBM_EDITNOTALLOWED","Você não está autorizado à editar esse comentário!");
define("_ALBM_ANONNOTALLOWED","Usuário anônimo não está autorizado para enviar.");
define("_ALBM_THANKSFORPOST","Obrigado pelo envio!");
define("_ALBM_DELNOTALLOWED","Você não está autorizado para excluir esse comentário!");
define("_ALBM_GOBACK","Voltar");
define("_ALBM_AREYOUSURE","Você deseja mesmo deletar esse comentário e comentários abaixo desse?");
define("_ALBM_COMMENTSDEL","Comentários Excluídos com Sucesso!");

// End New

define("_ALBM_THANKSFORINFO","Obrigado pela informaçãoo. Estaremos verificando seu pedido em breve.");
define("_ALBM_BACKTOTOP","Voltar ao topo");
define("_ALBM_THANKSFORHELP","Obrigado por ajudar a manter a integridade desse diretório.");
define("_ALBM_FORSECURITY","Por motivos de segurança seu nome de usuário e seu endereço IP serão registrados.");

define("_ALBM_MATCH","Ocorrênci");
define("_ALBM_ALL","TUDO");
define("_ALBM_ANY","QUALQUER");
define("_ALBM_NAME","Nome");
define("_ALBM_DESCRIPTION","Descrição");

define("_ALBM_MAIN","Geral");
define("_ALBM_NEW","Novo");
define("_ALBM_UPDATED","Atualizado");
define("_ALBM_POPULAR","Popular");
define("_ALBM_TOPRATED","Rankeado");

define("_ALBM_POPULARITYLTOM","Popularidade (Do menos popular ao mais popular)");
define("_ALBM_POPULARITYMTOL","Popularidade (Do mais popular ao menos popular)");
define("_ALBM_TITLEATOZ","Título (de A a Z)");
define("_ALBM_TITLEZTOA","Título (de Z a A)");
define("_ALBM_DATEOLD","Data (Fotos velhas primeiro)");
define("_ALBM_DATENEW","Data (Fotos novas primeiro)");
define("_ALBM_RATINGLTOH","Ranking (De Menos votados a Mais votados)");
define("_ALBM_RATINGHTOL","Ranking (De Mais votados a Menos votados)");

define("_ALBM_NOSHOTS","Screenshots não disponíveis");
define("_ALBM_EDITTHISPHOTO","Editar Esta Foto");

define("_ALBM_DESCRIPTIONC","Descrição: ");
define("_ALBM_EMAILC","Email: ");
define("_ALBM_CATEGORYC","Categoria: ");
define("_ALBM_SUBCATEGORY","Sub-categorias: ");
define("_ALBM_LASTUPDATEC","Última atualização: ");
define("_ALBM_HITSC","Requisições: ");
define("_ALBM_RATINGC","Ranking: ");
define("_ALBM_ONEVOTE","1 voto");
define("_ALBM_NUMVOTES","%s votes");
define("_ALBM_ONEPOST","1 publicação");
define("_ALBM_NUMPOSTS","%s publicações");
define("_ALBM_COMMENTSC","Comentários: ");
define("_ALBM_RATETHISPHOTO","Rankiar esta foto");
define("_ALBM_MODIFY","Modificar");
define("_ALBM_VSCOMMENTS","Ver/Enviar Comentários");

define("_ALBM_THEREARE","Existem <b>%s</b> Imagens em nossa base de dados.");
define("_ALBM_LATESTLIST","Últimas listagens");

define("_ALBM_VOTEAPPRE","Agredecemos pelo seu voto.");
define("_ALBM_THANKURATE","Obrigado por ajudar à rankiar essa foto em %s.");
define("_ALBM_VOTEONCE","Por favor, não vote duas vezes na mesma foto.");
define("_ALBM_RATINGSCALE","A escala é 1 - 10, 1 significa que é péssimo e 10 excelente.");
define("_ALBM_BEOBJECTIVE","Por favor, seja objetivo. Se todos recebem 1 ou 10 as avaliações não serão muitos “úteis.");
define("_ALBM_DONOTVOTE","Não vote em sua própria Foto.");
define("_ALBM_RATEIT","Dê sua nota!");

define("_ALBM_RECEIVED","Sua foto foi recebida com sucesso. Obrigado!");
define("_ALBM_ALLPENDING","Todas as fotos enviadas estarão sendo enviadas para um processo de validação.");

define("_ALBM_RANK","Rank");
define("_ALBM_CATEGORY","Categoria");
define("_ALBM_HITS","Solicitações");
define("_ALBM_RATING","Ranking");
define("_ALBM_VOTE","Voto");
define("_ALBM_TOP10","%s 10 Mais"); // %s is a photo category title

define("_ALBM_SORTBY","Ordenado por:");
define("_ALBM_TITLE","Título");
define("_ALBM_DATE","Data");
define("_ALBM_POPULARITY","Popularidade");
define("_ALBM_CURSORTEDBY","Fotos ordenadas por: %s");
define("_ALBM_FOUNDIN","Encontrado em:");
define("_ALBM_PREVIOUS","Anterior");
define("_ALBM_NEXT","Próximo");
define("_ALBM_NOMATCH","Nenhuma foto encontrada.");

define("_ALBM_CATEGORIES","Categorias");

define("_ALBM_SUBMIT","Enviar");
define("_ALBM_CANCEL","Cancelar");

define("_ALBM_MUSTREGFIRST","Desculpe, Você não tem permissão para acessar.<br>Por Favor, cadastre-se ou acesse sua conta primeiro!");
define("_ALBM_MUSTADDCATFIRST","Perdão, Você não tem uma categoria criada ainda.<br>Por Favor, crie uma categoria!");
define("_ALBM_NORATING","Votação não selecionada.");
define("_ALBM_CANTVOTEOWN","Você não pode votar em sua própria foto..<br>Todos os votos estão sendo registrados e monitorados.");
define("_ALBM_VOTEONCE2","Vote apenas uma vez na mesma foto.<br>Todos os votos estão sendo registrados e monitorados.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Fotos em espera para validação");
define("_ALBM_PHOTOMANAGER","Gerenciamento de fotos");
define("_ALBM_CATEDIT","Adicionar, Alterar e Deletar Categorias");
define("_ALBM_GROUPPERM_GLOBAL","Permissões Gerais");
define("_ALBM_CHECKCONFIGS","Verificar Configuraîçõe e Ambientes");
define("_ALBM_BATCHUPLOAD","Registro por Lote");
define("_ALBM_GENERALSET","Preferências sobre myAlbum-P");
define("_ALBM_REDOTHUMBS2","Reconstruir Thumbnails");

define("_ALBM_SUBMITTER","Enviado por");
define("_ALBM_DELETE","Apagar");
define("_ALBM_NOSUBMITTED","Não há novas fotos enviadas.");
define("_ALBM_ADDMAIN","Adicionar uma categoria geral");
define("_ALBM_IMGURL","URL da Imagem(OPCIONAL: A altura da imagem será reajustada para 50px): ");
define("_ALBM_ADD","Adicionar");
define("_ALBM_ADDSUB","Adicionar uma SUB-Categoria");
define("_ALBM_IN","em");
define("_ALBM_MODCAT","Alterar Categoria");
define("_ALBM_DBUPDATED","Alteração na base dados efetuada com sucesso!");
define("_ALBM_MODREQDELETED","Pedido de modificação deletado.");
define("_ALBM_IMGURLMAIN","URL da Imagem(OPCIONAL: é válido apenas para categorias gerais. A altura da imagem será redimensionada para 50px): ");
define("_ALBM_PARENT","Categoria acima:");
define("_ALBM_SAVE","Gravar Alterações");
define("_ALBM_CATDELETED","Categoria Excluída.");
define("_ALBM_CATDEL_WARNING","AVISO: Você deseja mesmo remover esta categoria e TODAS suas fotos e comentários?");
define("_ALBM_YES","Sim");
define("_ALBM_NO","Não");
define("_ALBM_NEWCATADDED","Categoria Adicionada com sucesso!");
define("_ALBM_ERROREXIST","ERRO: Esta Foto já existe na base de dados!");
define("_ALBM_ERRORTITLE","ERRO: Você precisar colocar um TÍTULO!");
define("_ALBM_ERRORDESC","ERRO: Você precisar colocar uma DESCRIÇÃO!");
define("_ALBM_WEAPPROVED","Seu pedido de aprovação foi confirmado.");
define("_ALBM_THANKSSUBMIT","Obrigado pelo envio!");
define("_ALBM_CONFUPDATED","Configurações atualizadas com sucesso!");

}

?>
