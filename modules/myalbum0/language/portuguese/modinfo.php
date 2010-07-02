<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:59:00
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:06
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_CFG_DESCPERPAGE','Input selectable numbers separated with \'|\'<br />eg) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_ALBM_CFG_ALLOWNOIMAGE','Allows a sumbit without images');
define('_ALBM_CFG_ALLOWEDEXTS','File extensions can be uploaded');
define('_ALBM_CFG_DESCALLOWEDEXTS','Input extensions with separator \'|\'. (eg \'jpg|jpeg|gif|png\') .<br />All character must be small. Don\'t insert periods or spaces');
define('_ALBM_CFG_ALLOWEDMIME','MIME Types can be uploaded');
define('_ALBM_CFG_DESCALLOWEDMIME','Input MIME Types with separator \'|\'. (eg \'image/gif|image/jpeg|image/png\')<br />If you want to be checked by MIME Type, be blank here');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Import Images');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Export Images');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Blocks&Groups Admin');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","Álbum de Fotos");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Cria uma sessão de fotos onde usuários pode procurar/enviar/votar várias fotos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Fotos Recentes");
define("_ALBM_BNAME_HITS","Top Fotos");
define("_ALBM_BNAME_RANDOM","Foto Acima");
define("_ALBM_BNAME_RECENT_P","Fotos Recentes com thumbnails");
define("_ALBM_BNAME_HITS_P","Top Photos com thumbnails");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Caminho para as fotos" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Caminho do diretório instalado o XOOPS.<br />(O primeiro caracter deve ser'/'. O Último caracter não deve ser'/'.)<br />Este diretório terá permissão 777 ou 707 no unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Caminho para os thumbnails" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Mesmo que 'Caminho para as fotos'." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Use ImageMagick for treating images" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Imagens de tratamento do pacote" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "Verifique se a versão do PHP possui o GD2" ) ;
define( "_ALBM_CFG_FORCEGD2" , "Forçar conversão GD2" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Verifique se a versão do PHP possui o GD2" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Caminho do ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "O Caminho completo para o 'convert'<br />O Último caracter não pode ser '/'.)<br />Esta configuração é valida apenas quando utilizado o ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "Caminho do NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Caminho completo para o 'pnmscale' etc.<br />(Último caracter não pode ser '/'.)<br />Esta configuração é valida apenas quando utilizado o NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Hits para serem populares" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Dias entre apresentação 'novo'&'atualizar'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Número de fotos novas no topo da página" ) ;
define( "_ALBM_CFG_PERPAGE" , "Fotos mostradas por página" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Fazer o thumbnail da Imagem" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Quando aletrar de 'Não' para 'Sim' você deve 'Voltar os thumbails'." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Thumb Image Width" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "The height of thumbs will be decided from the width automatically." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Tamanho dos thumbnails (pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Regra de cálculo para a reconstrução dos thumbnails" ) ;
define( "_ALBM_CFG_WIDTH" , "Largura Máxima da Foto" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Largura da foto a ser redimensionada." ) ;
define( "_ALBM_CFG_HEIGHT" , "Altura Máxima da Foto" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Altura da foto a ser redimensionada." ) ;
define( "_ALBM_CFG_FSIZE" , "Tamanho Máximo do arquivo" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "A limitação do tamanho máximo do arquivo a ser enviado." ) ;
// define( "_ALBM_CFG_NEEDADMIT" , "Needs admition for new photo" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "O Número adicionado pelo usuário quando enviar um foto." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalmente, 0 ou 1." ) ;

define( "_ALBM_CFG_CATONSUBMENU" , "Registrar categorias do topo no submenu" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Mostrar o nome de quem publicou" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Seleciona qual nome será mostrado" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Tipo de visão na categoria" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "Número de colunas na tabela de visualização" ) ;

define( "_ALBM_OPT_USENAME" , "Nome do Handle" ) ;
define( "_ALBM_OPT_USEUNAME" , "Nome de Usuário" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "largura:altura especificada:automático" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "largura:largura automática:especificado" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "colocar em um tamanho específico" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Visão da Lista" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "Visão da tabela" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Enviar");
define("_ALBM_TEXT_SMNAME2","Popular");
define("_ALBM_TEXT_SMNAME3","Mais Rankeado");
define("_ALBM_TEXT_SMNAME4","Minhas Fotos");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Fotos Enviadas");
define("_ALBM_MYALBUM_ADMENU1","Gerenciamento de Fotos");
define("_ALBM_MYALBUM_ADMENU2","Adicionar/Editar Categorias");
define("_ALBM_MYALBUM_ADMENU_GPERM","Permissões Gerais");
define("_ALBM_MYALBUM_ADMENU3","Verificar Configurações&Ambientes");
define("_ALBM_MYALBUM_ADMENU4","Registro em Lote");
define("_ALBM_MYALBUM_ADMENU5","Reconstruir Thumbnails");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Geral');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Opções de notificação geral');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Categoria');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Opções de notificação que é aplicada a categoria de foto atual');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Opções de notificação que é aplicada a foto atual');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nova Foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Notificar-me quando qualquer nova foto for enviada');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Receber notificação quando qualquer nova foto for enviada');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: notificação automática: Nova Foto');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nova Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Notificar-me quando qualquer nova foto for enviada nesta categoria');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Receber notificação quando qualquer nova foto for enviada nesta categoria');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: notificação automática: Nova Foto');

}

?>
