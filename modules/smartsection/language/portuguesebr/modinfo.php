<?php

/**
* $Id: modinfo.php 3211 2008-06-23 21:12:24Z gibaphp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

// Module Info
// The name of this module

global $xoopsModule;

define("_MI_SSECTION_ADMENU1", "Õndice");
define("_MI_SSECTION_ADMENU2", "Categorias");
define("_MI_SSECTION_ADMENU3", "Artigos");
define("_MI_SSECTION_ADMENU4", "Permissıes");
define("_MI_SSECTION_ADMENU5", "Blocos e Grupos");
define("_MI_SSECTION_ADMENU6", "Formatos");
define("_MI_SSECTION_ADMENU7", "Ir para o mÛdulo");

define("_MI_SSECTION_ADMINHITS", "Contar cliques do admin?");
define("_MI_SSECTION_ADMINHITSDSC", "Permitir cliques de admin para estatÌsticas?");
define("_MI_SSECTION_ALLOWSUBMIT", "Submissıes do usu·rio:");
define("_MI_SSECTION_ALLOWSUBMITDSC", "Permitir a usu·rios submeter artigos em seu site?");
define("_MI_SSECTION_ANONPOST", "Permitir posts de visitantes");
define("_MI_SSECTION_ANONPOSTDSC", "Permitir a visitantes a submiss„o de artigos.");
define("_MI_SSECTION_AUTHOR_INFO", "Desenvolvedores");
define("_MI_SSECTION_AUTHOR_WORD", "A Palavra do Autor");
define("_MI_SSECTION_AUTOAPP", "Auto aprovar artigos submetidos?");
define("_MI_SSECTION_AUTOAPPDSC", "Auto aprovar os artigos submetidos sem intervenÁ„o do admin?");
define("_MI_SSECTION_BCRUMB","Mostrar o nome do mÛdulo no breadcrumb?");
define("_MI_SSECTION_BCRUMBDSC","Se vocÍ selecionar sim, o breadcrumb ir· mostrar \"Smartsection > nome da categoria > nome do artigo\". <br>Se n„o, somente \"nome da categoria > nome do artigo\" ser· exibido.");
define("_MI_SSECTION_BOTH_FOOTERS","Ambos os rodapÈs");
define("_MI_SSECTION_BY", "por");
define("_MI_SSECTION_CATEGORY_ITEM_NOTIFY", "Itens da Categoria");
define("_MI_SSECTION_CATEGORY_ITEM_NOTIFY_DSC", "OpÁıes de notificaÁ„o que se aplicam a categoria atual.");
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY", "Novo artigo publicado");
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_CAP", "Avise-me quando um novo artigo for publicado na categoria atual.");   
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_DSC", "Receber notificaÁ„o quando um novo artigo for publicado na categoria atual.");      
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : Novo artigo publicado em categoria"); 
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY", "'Artigo submetido");
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_CAP", "Avise-me quando um novo artigo for submetido na categoria atual.");   
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_DSC", "Receber notificaÁ„o quando um novo artigo for submetido na categoria atual.");      
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : Novo artigo submetido em categoria"); 
define("_MI_SSECTION_CATLIST_IMG_W", "Lista de Imagens da Categoria width");
define("_MI_SSECTION_CATLIST_IMG_WDSC", "Specify the witdh of category images when listing the categories.");
define("_MI_SSECTION_CATMAINIMG_W", "Category main image width");
define("_MI_SSECTION_CATMAINIMG_WDSC", "Specify the width of the category main image.");
define("_MI_SSECTION_CATPERPAGE", "N˙mero m·ximo de categorias por p·gina (Lado de usu·rio):");
define("_MI_SSECTION_CATPERPAGEDSC", "N˙mero m·ximo de categorias principais a serem exibidas, por p·gina, pelo lado do usu·rio.");
define("_MI_SSECTION_CLONE", "Permitir duplicaÁ„o de artigo?");
define("_MI_SSECTION_CLONEDSC", "Selecione 'Sim' para permitir que os usu·rios apropriados dupliquem um artigo.");
define("_MI_SSECTION_COLLHEAD", "Mostrar a barra colaps·vel?");
define("_MI_SSECTION_COLLHEADDSC", "Se vocÍ marcar a opÁ„o como 'Sim', os resumos das Categorias v„o ser exibidos na barra colaps·vel, bem como os Artigos. Se vocÍ marcar 'N„o', a barra colaps·vel n„o ser· exibida.");
define("_MI_SSECTION_COMMENTS", "Controlar coment·rios ‡ nÌvel de artigo?");
define("_MI_SSECTION_COMMENTSDSC", "Se vocÍ marcar a opÁ„o 'Sim', vocÍ ver· coment·rios apenas nos itens em que seus coment·rios estiverem devidamente marcados.<br><br/> Selecionando 'N„o' vocÍ ter· os coment·rios gerenciados de forma global. Olhe abaixo em 'Regras de Coment·rios'.");
define("_MI_SSECTION_DATEFORMAT", "Formato de Data:");
define("_MI_SSECTION_DATEFORMATDSC", "Use a parte final de language/english/global.php para selecionar um estilo de exibiÁ„o. Exemplo: ");
define("_MI_SSECTION_DEMO_SITE", "Site de demonstraÁ„o da SmartFactory");
define("_MI_SSECTION_DEVELOPER_CONTRIBUTOR", "Colaborador(es)");
define("_MI_SSECTION_DEVELOPER_CREDITS", "CrÈditos");
define("_MI_SSECTION_DEVELOPER_EMAIL", "E-mail");
define("_MI_SSECTION_DEVELOPER_LEAD", "Desenvolvedor principal(is)");
define("_MI_SSECTION_DEVELOPER_WEBSITE", "Site da web");
define("_MI_SSECTION_DISCOM", "Mostrar contador de coment·rios?");
define("_MI_SSECTION_DISCOMDSC", "Marque 'Sim' para mostrar o contador de coment·rios em cada artigo");
define("_MI_SSECTION_DISDATECOL", "Mostar a coluna 'Publicado em'?");
define("_MI_SSECTION_DISDATECOLDSC", "Quando a opÁ„o mostrar 'Resumo' estiver selecionada, selecione 'Sim' para mostrar a data do 'Publicado em' na tabela de itens do Ìndice e na p·gina da categoria.");
define("_MI_SSECTION_DCS", "Mostrar o resumo da categoria?");
define("_MI_SSECTION_DCS_DSC", "Escolha 'N„o' para n„o mostrar o sum·rio da Categoria na p·gina de sub-categorias.");
define("_MI_SSECTION_DISPLAY_CATEGORY", "Mostrar o nome da Categoria?");
define("_MI_SSECTION_DISPLAY_CATEGORY_DSC", "Escolha para 'Sim' para mostrar dentro da Categoria o Link para um artigo individual");
define("_MI_SSECTION_DISPLAYTYPE_FULL", "VisualizaÁ„o Completa");
define("_MI_SSECTION_DISPLAYTYPE_LIST", "Lista de itens");
define("_MI_SSECTION_DISPLAYTYPE_WFSECTION", "Estilo WFSection");
define("_MI_SSECTION_DISPLAYTYPE_SUMMARY", "Visualizar Resumo");
define("_MI_SSECTION_DISSBCATDSC", "Mostar descriÁ„o das sub-categorias?");
define("_MI_SSECTION_DISSBCATDSCDSC", "Selecionar 'Sim' para mostrar a descriÁ„o das sub-categorias no Ìndice e na p·gina da categoria.");
define("_MI_SSECTION_DISTYPE", "Forma de exibiÁ„o do artigo:");
define("_MI_SSECTION_DISTYPEDSC", "Se a opÁ„o 'Resumo' estiver selecionada, apenas o tÌtulo, a data e os cliques de cada item ser„o mostrados na categoria selecionada. Se a opÁ„o 'Vis„o Completa' estiver selecionada, cada artigo ser· mostrado integralmente na categoria selecionada.");
define("_MI_SSECTION_FILEUPLOADDIR", "Arquivos enviados para a pasta de upload:");
define("_MI_SSECTION_FILEUPLOADDIRDSC", "Pasta de destino para os arquivos anexados aos artigos. artigos. N„o inclua qualquer tag ou barra.");
define("_MI_SSECTION_FOOTERPRINT","Imprimir rodapÈ da p·gina");
define("_MI_SSECTION_FOOTERPRINTDSC","Selecionar o rodapÈ que estar· impresso em cada artigo entre aquelas criadas nas opÁıes de preferÍncia/conte˙do");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY", "Nova categoria");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP", "Avise-me quando uma nova categoria for criada.");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC", "Receba notificaÁ„o quando uma nova categoria for criada.");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : Nova categoria");
define("_MI_SSECTION_GLOBAL_ITEM_NOTIFY", "Artigos em Geral");
define("_MI_SSECTION_GLOBAL_ITEM_NOTIFY_DSC", "OpÁıes de notificaÁ„o que se aplicam a todos os artigos.");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY", "Novo artigo publicado");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_CAP", "Avise-me quando qualquer novo artigo for publicado.");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_DSC", "Receber notificaÁ„o quando qualquer novo artigo for publicado.");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : Novo artigo publicado");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY", "Artigo submetido");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_CAP", "Avise-me quando qualquer artigo for submetido e estiver aguardando aprovaÁ„o.");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_DSC", "Receber notificaÁ„o quando qualquer artigo for submetido e estiver esperando aprovaÁ„o.");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : Novo artigo submetido");
define("_MI_SSECTION_HEADERPRINT","Imprimir o cabeÁalho da p·gina");
define("_MI_SSECTION_HEADERPRINTDSC","CabeÁalho que estar· impresso em cada artigo");
define("_MI_SSECTION_HELP_CUSTOM", "Caminho Personalizado");
define("_MI_SSECTION_HELP_INSIDE", "Dentro do mÛdulo");
define("_MI_SSECTION_HELP_PATH_CUSTOM", "Caminho personalizado dos arquivos de ajuda do SmartSection");
define("_MI_SSECTION_HELP_PATH_CUSTOM_DSC", "Se vocÍ selecionar caminho personalizado  na opÁ„o prÈvia de caminho dos arquivos de ajuda do SmartSection, por favor especifique a URL dos arquivos de ajuda do SmartSection, no formato : http://www.yoursite.com/doc");
define("_MI_SSECTION_HELP_PATH_SELECT", "Caminho de arquivos de ajuda do SmartSection");
define("_MI_SSECTION_HELP_PATH_SELECT_DSC", "Selecione de onde vocÍ gostaria de acessar arquivos de ajuda do SmartSection. Se vocÍ fez o download do'Pacote de Ajuda do SmartSection' e fez upload dele em'modules/smartsection/doc/', vocÍ pode selecionar'dentro do mÛdulo'. Alternativamente, vocÍ pode acessar a ajuda do mÛdulo diretamente de docs.xoops.org escolhendo esta via no seletor. VocÍ tambÈm pode selecionar'Caminho de Costume' e especificar vocÍ mesmo o caminho dos arquivos de ajuda na prÛxima opÁ„o de configuraÁ„o'Caminho de Costume para opÁ„o de arquivos de ajuda do SmartSection'");
define("_MI_SSECTION_HITSCOL", "Mostrar a coluna de 'Cliques'?");
define("_MI_SSECTION_HITSCOLDSC", "Quando a opÁ„o 'Resumo' estiver selecionada, selecione 'Sim' para mostrar a coluna de 'Cliques' na tabela de itens do Ìndice e na p·gina da categoria.");
define("_MI_SSECTION_HLCOLOR", "Cor de destaque para palavras-chave");
define("_MI_SSECTION_HLCOLORDSC", "Mostrar as palavras-chave com cor de destaque quando pesquisar");
define("_MI_SSECTION_IMAGENAV", "Usar a imagem NavegaÁ„o na P·gina:");
define("_MI_SSECTION_IMAGENAVDSC", "Se vocÍ marcou esta opÁ„o como \"Sim\", a NavegaÁ„o na P·gina ser· exibida com imagens, se n„o, a NavegaÁ„o na P·gina original ser· exibida.");
define("_MI_SSECTION_INDEXFOOTER","Indexar rodapÈ");
define("_MI_SSECTION_INDEXFOOTER_SEL","Indexar rodapÈ");
define("_MI_SSECTION_INDEXFOOTERDSC","RodapÈ que ser· exibido na p·gina de Ìndice do mÛdulo");
define("_MI_SSECTION_INDEXMSG", "Mensagem de boas-vindas do Õndice");
define("_MI_SSECTION_INDEXMSGDEF", ""); 
define("_MI_SSECTION_INDEXMSGDSC", "Mensagem de boas-vindas ser· exibida na p·gina-Ìndice do mÛdulo.");
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY", "Artigo aprovado");
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY_CAP", "Avise-me quando este artigo for aprovado.");   
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY_DSC", "Receber notificaÁ„o quando este artigo for aprovado.");      
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : artigo aprovado"); 
define("_MI_SSECTION_ITEM_NOTIFY", "Artigo");
define("_MI_SSECTION_ITEM_NOTIFY_DSC", "OpÁıes de notificaÁ„o que se aplicam ao artigo atual.");
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY", "Artigo rejeitado");
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY_CAP", "Avise-me se este artigo for rejeitado.");   
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY_DSC", "Receba notificaÁ„o se este artigo for rejeitado.");      
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notificaÁ„o : artigo rejeitado"); 
define("_MI_SSECTION_ITEM_TYPE", "Tipo de artigo:");
define("_MI_SSECTION_ITEM_TYPEDSC", "Selecione o tipo de artigos este mÛdulo vai administrar.");
define("_MI_SSECTION_ITEMFOOTER", "RodapÈ de artigo");
define("_MI_SSECTION_ITEMFOOTER_SEL", "RodapÈ de artigo");
define("_MI_SSECTION_ITEMFOOTERDSC","RodapÈ que ser· exibido em cada artigo");
define("_MI_SSECTION_ITEMSMENU", "Menu de navegaÁ„o");
//bd tree block hack
define("_MI_SSECTION_ITEMSTREE", "Bloco em ¡rvore");
//--/bd
define("_MI_SSECTION_ITEMSNEW", "Lista de artigos recentes");
define("_MI_SSECTION_ITEMSPOT", "Em destaque!");
define("_MI_SSECTION_ITEMSRANDOM_ITEM", "Artigo aleatÛrio !");
define("_MI_SSECTION_LASTITEM", "Mostrar coluna '˙ltimo item'?");
define("_MI_SSECTION_LASTITEMDSC", "Marcar 'Sim' para mostrar o ˙ltimo item em cada categoria no Ìndice e na p·gina da categoria.");
define("_MI_SSECTION_LASTITEMS", "Mostrar a lista dos artigos publicados mais recentes?");
define("_MI_SSECTION_LASTITEMSDSC", "Marque 'Sim' para ter a lista embaixo, na primeira p·gina do mÛdulo");
define("_MI_SSECTION_LASTITSIZE", "Tamanho do ˙ltimo item :");
define("_MI_SSECTION_LASTITSIZEDSC", "Defina o tamanho m·ximo do tÌtulo na coluna ⁄ltimos Itens");
define("_MI_SSECTION_LINKPATH", "Permitir links no caminho atual:");
define("_MI_SSECTION_LINKPATHDSC", "Esta opÁ„o permitir· ao usu·rio retornar, com um clique, ao caminho exibido no topo da p·gina");
define("_MI_SSECTION_MAX_HEIGHT", "Altura m·xima da imagem");
define("_MI_SSECTION_MAX_HEIGHTDSC", "Altura m·xima do arquivo de imagem que pode ser carregado");
define("_MI_SSECTION_MAX_SIZE", "Tamanho m·ximo de arquivo");
define("_MI_SSECTION_MAX_SIZEDSC", "Tamanho m·ximo [em bytes] de um arquivo para ser carregado.");
define("_MI_SSECTION_MAX_WIDTH", "Largura m·xima da imagem a ser carregada");
define("_MI_SSECTION_MAX_WIDTHDSC", "Largura m·xima permitida para um arquivo ser carregado.");
define("_MI_SSECTION_MD_DESC", "Sistema de Gerenciamento de SeÁıes para seu Portal em XOOPS");
define("_MI_SSECTION_MD_NAME", "SmartSection");
define("_MI_SSECTION_MODULE_BUG", "Reportar um erro neste mÛdulo");
define("_MI_SSECTION_MODULE_DEMO", "Site de demonstraÁ„o");
define("_MI_SSECTION_MODULE_DISCLAIMER", "Carta de ren˙ncia");
define("_MI_SSECTION_MODULE_FEATURE", "Sugerir uma nova caracterÌstica para este mÛdulo");
define("_MI_SSECTION_MODULE_INFO", "InformaÁıes do desenvolvimento do MÛdulo");
define("_MI_SSECTION_MODULE_RELEASE_DATE", "Data do release");
define("_MI_SSECTION_MODULE_STATUS", "Status");
define("_MI_SSECTION_MODULE_SUBMIT_BUG", "Submeter um erro");
define("_MI_SSECTION_MODULE_SUBMIT_FEATURE", "Submeter um pedido de alteraÁ„o");
define("_MI_SSECTION_MODULE_SUPPORT", "Site de suporte oficial");
define("_MI_SSECTION_NO_FOOTERS","Nenhum");
define("_MI_SSECTION_ORDERBY", "Ordem de classificaÁ„o");
define("_MI_SSECTION_ORDERBY_DATE", "Date DESC");
define("_MI_SSECTION_ORDERBY_TITLE", "TÌtulo ASC");
define("_MI_SSECTION_ORDERBY_WEIGHT", "Peso ASC");
define("_MI_SSECTION_ORDERBYDSC", "Selecione a ordem de classificaÁ„o dos itens para todo o mÛdulo.");
define("_MI_SSECTION_OTHER_ITEMS_TYPE_ALL", "Todos os artigos");
define("_MI_SSECTION_OTHER_ITEMS_TYPE_NONE", "Nenhum");
define("_MI_SSECTION_OTHER_ITEMS_TYPE_PREVIOUS_NEXT", "PrÈvio e prÛximo artigo");
define("_MI_SSECTION_OTHERITEMS", "Tipo de exibiÁ„o de outros artigos");
define("_MI_SSECTION_OTHERITEMSDSC", "Selecione como vocÍ gostaria de exibir os outros artigos da categoria na p·gina de um artigo.");
define("_MI_SSECTION_PERPAGE", "M·ximo de artigos por p·gina (Lado do Admin):");
define("_MI_SSECTION_PERPAGEDSC", "N˙mero de m·ximo de artigos por p·gina a ser exibido de uma vez no lado do admin.");
define("_MI_SSECTION_PERPAGEINDEX", "Artigos de m·ximo pela p·gina (Lado de usu·rio):");
define("_MI_SSECTION_PERPAGEINDEXDSC", "N˙mero de m·ximo de artigos por p·gina a ser exibido de uma vez no lado de usu·rio.");
define("_MI_SSECTION_PRINTLOGOURL","Logotipo imprimir URL");
define("_MI_SSECTION_PRINTLOGOURLDSC","URL do logotipo que estar· impresso no topo da p·gina");
define("_MI_SSECTION_RECENTITEMS", "Artigos recentes (Detalhe)");
define("_MI_SSECTION_SHOW_RSS","Mostrar link para RSS feed");
define("_MI_SSECTION_SHOW_RSSDSC","");
define("_MI_SSECTION_SHOW_SUBCATS", "Exibir sub-categorias na p·gina de Ìndice");
define("_MI_SSECTION_SHOW_SUBCATS_ALL", "Mostrar todas as sub-categorias");
define("_MI_SSECTION_SHOW_SUBCATS_DSC", "Selecione sim para exibir as sub-categorias na lista de categorias da p·gina de Ìndice do mÛdulo");
define("_MI_SSECTION_SHOW_SUBCATS_NO", "N„o mostrar sub-categorias");
define("_MI_SSECTION_SHOW_SUBCATS_NOTEMPTY", "Mostrar sub-categorias que n„o est„o vazias");
define("_MI_SSECTION_SUB_SMNAME1", "Submeter um artigo");
define("_MI_SSECTION_SUB_SMNAME2", "Artigos populares");
define("_MI_SSECTION_SUBMITMSG", "Apresentar p·gina de introduÁ„o:");
define("_MI_SSECTION_SUBMITMSGDEF", "");
define("_MI_SSECTION_SUBMITMSGDSC", "Mensagem de introduÁ„o que ser· exibida quando um artigo for submetido ‡ aprovaÁ„o.");
define("_MI_SSECTION_TITLE_SIZE", "Tamanho de tÌtulo :");
define("_MI_SSECTION_TITLE_SIZEDSC", "Determinar o tamanho m·ximo do tÌtulo na p·gina de exibiÁ„o de um ˙nico artigo.");
define("_MI_SSECTION_UPLOAD", "Usu·rio pode fazer upload?");
define("_MI_SSECTION_UPLOADDSC", "Permitir que usu·rios faÁam uploads de arquivos vinculados a artigos em seu site?");
define("_MI_SSECTION_USEREALNAME", "Usar o Nome Real dos usu·rios");
define("_MI_SSECTION_USEREALNAMEDSC", "Quando exibir um nickname, use o nome real do usu·rio se ele tiver escolhido usar seu nome real.");
define("_MI_SSECTION_VERSION_HISTORY", "HistÛrico da Vers„o");
define("_MI_SSECTION_WARNING_BETA", "Este mÛdulo est· neste est·gio, sem qualquer garantia.");
define("_MI_SSECTION_WARNING_FINAL", "Este mÛdulo est· neste est·gio, sem qualquer garantia.");
define("_MI_SSECTION_WARNING_RC", "Este mÛdulo est· neste est·gio, sem qualquer garantia.");
define("_MI_SSECTION_WELCOME", "Mostrar o tÌtulo e a mensagem de boas-vindas:");
define("_MI_SSECTION_WELCOMEDSC", "Se vocÍ marcar 'Sim', a p·gina-Ìndice do mÛdulo ir· mostrar o tÌtulo 'Bem-vindo ao Smartsection de...', seguida da mensagem de boas-vindas definida abaixo. Se vocÍ marcar 'N„o', nenhuma dessas linhas ser· exibida.");
define("_MI_SSECTION_WHOWHEN", "Mostrar o an˙ncio e a data?");
define("_MI_SSECTION_WHOWHENDSC", "Marque 'Sim' para mostrar o an˙ncio e a informaÁ„o da data de cada artigo, individualmente.");
define("_MI_SSECTION_WYSIWYG", "Tipo de editor");
define("_MI_SSECTION_WYSIWYGDSC", "Para escolher que tipo de editor vocÍ quer usar. Note, no entanto, que se vocÍ escolher qualquer editor que n„o o XoopsEditor, ele dever· estar instalado em seu site.");

define("_MI_SSECTION_PV_TEXT", "VisualizaÁ„o parcial de Mensagem");
define("_MI_SSECTION_PV_TEXTDSC", "Mensagem para artigos de visualizaÁ„o parcial apenas.");
define("_MI_SSECTION_PV_TEXT_DEF", "Para ver o artigo completo, vocÍ deve estar registrado no site.");

define("_MI_SSECTION_SEOMODNAME", "URL - Reescrevendo o nome do mÛdulo");
define("_MI_SSECTION_SEOMODNAMEDSC", "Se URL para reescrevendo estiver habilitada para este mÛdulo, este È o nome do mÛdulo que ser· usado. Por exemplo : http://yoursite.com/smartection/...");

define("_MI_SSECTION_ARTCOUNT", "Mostrar quantidade de artigos");
define("_MI_SSECTION_ARTCOUNTDSC", "Escolher 'Sim' para mostrar a quantidade de artigos na categoria ou dentro do sum·rio. AtenÁ„o, o mÛdulo atualmente conta somente artigos dentro de cada categoria e n„o o conta dentro dos subcategoies.");

define("_MI_SSECTION_LATESTFILES", "⁄ltimos arquivos enviados");

define("_MI_SSECTION_PATHSEARCH", "ExposiÁ„o do trajeto da categoria em resultados da busca");
define("_MI_SSECTION_PATHSEARCHDSC", "");
define("_MI_SSECTION_SHOW_SUBCATS_NOMAIN", "Mostrar sub-categorias no inÌcio da p·gina somente");
define("_MI_SSECTION_RATING_ENABLED", "Habilitar sistema de votaÁ„o");
define("_MI_SSECTION_RATING_ENABLEDDSC", "Isso exige recursos do FrameWork SmartObject");

define("_MI_SSECTION_DISPBREAD", "Mostrar um breadcrumb");
define("_MI_SSECTION_DISPBREADDSC", "Breadcrumb navigation displays the current page's context within the site structure");

define('_MI_SSECTION_DATE_TO_DATE', 'Artigos da data atÈ ‡ data')

?><?php

/**
* $Id: modinfo.php 3211 2008-06-23 21:12:24Z gibaphp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

// Module Info
// The name of this module

global $xoopsModule;

define("_MI_SSECTION_ADMENU1", "√çndice");
define("_MI_SSECTION_ADMENU2", "Categorias");
define("_MI_SSECTION_ADMENU3", "Artigos");
define("_MI_SSECTION_ADMENU4", "Permiss√µes");
define("_MI_SSECTION_ADMENU5", "Blocos e Grupos");
define("_MI_SSECTION_ADMENU6", "Formatos");
define("_MI_SSECTION_ADMENU7", "Ir para o m√≥dulo");

define("_MI_SSECTION_ADMINHITS", "Contar cliques do admin?");
define("_MI_SSECTION_ADMINHITSDSC", "Permitir cliques de admin para estat√≠sticas?");
define("_MI_SSECTION_ALLOWSUBMIT", "Submiss√µes do usu√°rio:");
define("_MI_SSECTION_ALLOWSUBMITDSC", "Permitir a usu√°rios submeter artigos em seu site?");
define("_MI_SSECTION_ANONPOST", "Permitir posts de visitantes");
define("_MI_SSECTION_ANONPOSTDSC", "Permitir a visitantes a submiss√£o de artigos.");
define("_MI_SSECTION_AUTHOR_INFO", "Desenvolvedores");
define("_MI_SSECTION_AUTHOR_WORD", "A Palavra do Autor");
define("_MI_SSECTION_AUTOAPP", "Auto aprovar artigos submetidos?");
define("_MI_SSECTION_AUTOAPPDSC", "Auto aprovar os artigos submetidos sem interven√ß√£o do admin?");
define("_MI_SSECTION_BCRUMB","Mostrar o nome do m√≥dulo no breadcrumb?");
define("_MI_SSECTION_BCRUMBDSC","Se voc√™ selecionar sim, o breadcrumb ir√° mostrar \"Smartsection > nome da categoria > nome do artigo\". <br>Se n√£o, somente \"nome da categoria > nome do artigo\" ser√° exibido.");
define("_MI_SSECTION_BOTH_FOOTERS","Ambos os rodap√©s");
define("_MI_SSECTION_BY", "por");
define("_MI_SSECTION_CATEGORY_ITEM_NOTIFY", "Itens da Categoria");
define("_MI_SSECTION_CATEGORY_ITEM_NOTIFY_DSC", "Op√ß√µes de notifica√ß√£o que se aplicam a categoria atual.");
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY", "Novo artigo publicado");
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_CAP", "Avise-me quando um novo artigo for publicado na categoria atual.");   
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_DSC", "Receber notifica√ß√£o quando um novo artigo for publicado na categoria atual.");      
define("_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : Novo artigo publicado em categoria"); 
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY", "'Artigo submetido");
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_CAP", "Avise-me quando um novo artigo for submetido na categoria atual.");   
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_DSC", "Receber notifica√ß√£o quando um novo artigo for submetido na categoria atual.");      
define("_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : Novo artigo submetido em categoria"); 
define("_MI_SSECTION_CATLIST_IMG_W", "Lista de Imagens da Categoria width");
define("_MI_SSECTION_CATLIST_IMG_WDSC", "Specify the witdh of category images when listing the categories.");
define("_MI_SSECTION_CATMAINIMG_W", "Category main image width");
define("_MI_SSECTION_CATMAINIMG_WDSC", "Specify the width of the category main image.");
define("_MI_SSECTION_CATPERPAGE", "N√∫mero m√°ximo de categorias por p√°gina (Lado de usu√°rio):");
define("_MI_SSECTION_CATPERPAGEDSC", "N√∫mero m√°ximo de categorias principais a serem exibidas, por p√°gina, pelo lado do usu√°rio.");
define("_MI_SSECTION_CLONE", "Permitir duplica√ß√£o de artigo?");
define("_MI_SSECTION_CLONEDSC", "Selecione 'Sim' para permitir que os usu√°rios apropriados dupliquem um artigo.");
define("_MI_SSECTION_COLLHEAD", "Mostrar a barra colaps√°vel?");
define("_MI_SSECTION_COLLHEADDSC", "Se voc√™ marcar a op√ß√£o como 'Sim', os resumos das Categorias v√£o ser exibidos na barra colaps√°vel, bem como os Artigos. Se voc√™ marcar 'N√£o', a barra colaps√°vel n√£o ser√° exibida.");
define("_MI_SSECTION_COMMENTS", "Controlar coment√°rios √† n√≠vel de artigo?");
define("_MI_SSECTION_COMMENTSDSC", "Se voc√™ marcar a op√ß√£o 'Sim', voc√™ ver√° coment√°rios apenas nos itens em que seus coment√°rios estiverem devidamente marcados.<br><br/> Selecionando 'N√£o' voc√™ ter√° os coment√°rios gerenciados de forma global. Olhe abaixo em 'Regras de Coment√°rios'.");
define("_MI_SSECTION_DATEFORMAT", "Formato de Data:");
define("_MI_SSECTION_DATEFORMATDSC", "Use a parte final de language/english/global.php para selecionar um estilo de exibi√ß√£o. Exemplo: ");
define("_MI_SSECTION_DEMO_SITE", "Site de demonstra√ß√£o da SmartFactory");
define("_MI_SSECTION_DEVELOPER_CONTRIBUTOR", "Colaborador(es)");
define("_MI_SSECTION_DEVELOPER_CREDITS", "Cr√©ditos");
define("_MI_SSECTION_DEVELOPER_EMAIL", "E-mail");
define("_MI_SSECTION_DEVELOPER_LEAD", "Desenvolvedor principal(is)");
define("_MI_SSECTION_DEVELOPER_WEBSITE", "Site da web");
define("_MI_SSECTION_DISCOM", "Mostrar contador de coment√°rios?");
define("_MI_SSECTION_DISCOMDSC", "Marque 'Sim' para mostrar o contador de coment√°rios em cada artigo");
define("_MI_SSECTION_DISDATECOL", "Mostar a coluna 'Publicado em'?");
define("_MI_SSECTION_DISDATECOLDSC", "Quando a op√ß√£o mostrar 'Resumo' estiver selecionada, selecione 'Sim' para mostrar a data do 'Publicado em' na tabela de itens do √≠ndice e na p√°gina da categoria.");
define("_MI_SSECTION_DCS", "Mostrar o resumo da categoria?");
define("_MI_SSECTION_DCS_DSC", "Escolha 'N√£o' para n√£o mostrar o sum√°rio da Categoria na p√°gina de sub-categorias.");
define("_MI_SSECTION_DISPLAY_CATEGORY", "Mostrar o nome da Categoria?");
define("_MI_SSECTION_DISPLAY_CATEGORY_DSC", "Escolha para 'Sim' para mostrar dentro da Categoria o Link para um artigo individual");
define("_MI_SSECTION_DISPLAYTYPE_FULL", "Visualiza√ß√£o Completa");
define("_MI_SSECTION_DISPLAYTYPE_LIST", "Lista de itens");
define("_MI_SSECTION_DISPLAYTYPE_WFSECTION", "Estilo WFSection");
define("_MI_SSECTION_DISPLAYTYPE_SUMMARY", "Visualizar Resumo");
define("_MI_SSECTION_DISSBCATDSC", "Mostar descri√ß√£o das sub-categorias?");
define("_MI_SSECTION_DISSBCATDSCDSC", "Selecionar 'Sim' para mostrar a descri√ß√£o das sub-categorias no √≠ndice e na p√°gina da categoria.");
define("_MI_SSECTION_DISTYPE", "Forma de exibi√ß√£o do artigo:");
define("_MI_SSECTION_DISTYPEDSC", "Se a op√ß√£o 'Resumo' estiver selecionada, apenas o t√≠tulo, a data e os cliques de cada item ser√£o mostrados na categoria selecionada. Se a op√ß√£o 'Vis√£o Completa' estiver selecionada, cada artigo ser√° mostrado integralmente na categoria selecionada.");
define("_MI_SSECTION_FILEUPLOADDIR", "Arquivos enviados para a pasta de upload:");
define("_MI_SSECTION_FILEUPLOADDIRDSC", "Pasta de destino para os arquivos anexados aos artigos. artigos. N√£o inclua qualquer tag ou barra.");
define("_MI_SSECTION_FOOTERPRINT","Imprimir rodap√© da p√°gina");
define("_MI_SSECTION_FOOTERPRINTDSC","Selecionar o rodap√© que estar√° impresso em cada artigo entre aquelas criadas nas op√ß√µes de prefer√™ncia/conte√∫do");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY", "Nova categoria");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP", "Avise-me quando uma nova categoria for criada.");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC", "Receba notifica√ß√£o quando uma nova categoria for criada.");
define("_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : Nova categoria");
define("_MI_SSECTION_GLOBAL_ITEM_NOTIFY", "Artigos em Geral");
define("_MI_SSECTION_GLOBAL_ITEM_NOTIFY_DSC", "Op√ß√µes de notifica√ß√£o que se aplicam a todos os artigos.");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY", "Novo artigo publicado");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_CAP", "Avise-me quando qualquer novo artigo for publicado.");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_DSC", "Receber notifica√ß√£o quando qualquer novo artigo for publicado.");
define("_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : Novo artigo publicado");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY", "Artigo submetido");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_CAP", "Avise-me quando qualquer artigo for submetido e estiver aguardando aprova√ß√£o.");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_DSC", "Receber notifica√ß√£o quando qualquer artigo for submetido e estiver esperando aprova√ß√£o.");
define("_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : Novo artigo submetido");
define("_MI_SSECTION_HEADERPRINT","Imprimir o cabe√ßalho da p√°gina");
define("_MI_SSECTION_HEADERPRINTDSC","Cabe√ßalho que estar√° impresso em cada artigo");
define("_MI_SSECTION_HELP_CUSTOM", "Caminho Personalizado");
define("_MI_SSECTION_HELP_INSIDE", "Dentro do m√≥dulo");
define("_MI_SSECTION_HELP_PATH_CUSTOM", "Caminho personalizado dos arquivos de ajuda do SmartSection");
define("_MI_SSECTION_HELP_PATH_CUSTOM_DSC", "Se voc√™ selecionar caminho personalizado  na op√ß√£o pr√©via de caminho dos arquivos de ajuda do SmartSection, por favor especifique a URL dos arquivos de ajuda do SmartSection, no formato : http://www.yoursite.com/doc");
define("_MI_SSECTION_HELP_PATH_SELECT", "Caminho de arquivos de ajuda do SmartSection");
define("_MI_SSECTION_HELP_PATH_SELECT_DSC", "Selecione de onde voc√™ gostaria de acessar arquivos de ajuda do SmartSection. Se voc√™ fez o download do'Pacote de Ajuda do SmartSection' e fez upload dele em'modules/smartsection/doc/', voc√™ pode selecionar'dentro do m√≥dulo'. Alternativamente, voc√™ pode acessar a ajuda do m√≥dulo diretamente de docs.xoops.org escolhendo esta via no seletor. Voc√™ tamb√©m pode selecionar'Caminho de Costume' e especificar voc√™ mesmo o caminho dos arquivos de ajuda na pr√≥xima op√ß√£o de configura√ß√£o'Caminho de Costume para op√ß√£o de arquivos de ajuda do SmartSection'");
define("_MI_SSECTION_HITSCOL", "Mostrar a coluna de 'Cliques'?");
define("_MI_SSECTION_HITSCOLDSC", "Quando a op√ß√£o 'Resumo' estiver selecionada, selecione 'Sim' para mostrar a coluna de 'Cliques' na tabela de itens do √≠ndice e na p√°gina da categoria.");
define("_MI_SSECTION_HLCOLOR", "Cor de destaque para palavras-chave");
define("_MI_SSECTION_HLCOLORDSC", "Mostrar as palavras-chave com cor de destaque quando pesquisar");
define("_MI_SSECTION_IMAGENAV", "Usar a imagem Navega√ß√£o na P√°gina:");
define("_MI_SSECTION_IMAGENAVDSC", "Se voc√™ marcou esta op√ß√£o como \"Sim\", a Navega√ß√£o na P√°gina ser√° exibida com imagens, se n√£o, a Navega√ß√£o na P√°gina original ser√° exibida.");
define("_MI_SSECTION_INDEXFOOTER","Indexar rodap√©");
define("_MI_SSECTION_INDEXFOOTER_SEL","Indexar rodap√©");
define("_MI_SSECTION_INDEXFOOTERDSC","Rodap√© que ser√° exibido na p√°gina de √≠ndice do m√≥dulo");
define("_MI_SSECTION_INDEXMSG", "Mensagem de boas-vindas do √çndice");
define("_MI_SSECTION_INDEXMSGDEF", ""); 
define("_MI_SSECTION_INDEXMSGDSC", "Mensagem de boas-vindas ser√° exibida na p√°gina-√≠ndice do m√≥dulo.");
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY", "Artigo aprovado");
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY_CAP", "Avise-me quando este artigo for aprovado.");   
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY_DSC", "Receber notifica√ß√£o quando este artigo for aprovado.");      
define("_MI_SSECTION_ITEM_APPROVED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : artigo aprovado"); 
define("_MI_SSECTION_ITEM_NOTIFY", "Artigo");
define("_MI_SSECTION_ITEM_NOTIFY_DSC", "Op√ß√µes de notifica√ß√£o que se aplicam ao artigo atual.");
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY", "Artigo rejeitado");
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY_CAP", "Avise-me se este artigo for rejeitado.");   
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY_DSC", "Receba notifica√ß√£o se este artigo for rejeitado.");      
define("_MI_SSECTION_ITEM_REJECTED_NOTIFY_SBJ", "[{X_SITENAME}] {X_MODULE} auto-notifica√ß√£o : artigo rejeitado"); 
define("_MI_SSECTION_ITEM_TYPE", "Tipo de artigo:");
define("_MI_SSECTION_ITEM_TYPEDSC", "Selecione o tipo de artigos este m√≥dulo vai administrar.");
define("_MI_SSECTION_ITEMFOOTER", "Rodap√© de artigo");
define("_MI_SSECTION_ITEMFOOTER_SEL", "Rodap√© de artigo");
define("_MI_SSECTION_ITEMFOOTERDSC","Rodap√© que ser√° exibido em cada artigo");
define("_MI_SSECTION_ITEMSMENU", "Menu de navega√ß√£o");
//bd tree block hack
define("_MI_SSECTION_ITEMSTREE", "Bloco em √Årvore");
//--/bd
define("_MI_SSECTION_ITEMSNEW", "Lista de artigos recentes");
define("_MI_SSECTION_ITEMSPOT", "Em destaque!");
define("_MI_SSECTION_ITEMSRANDOM_ITEM", "Artigo aleat√≥rio !");
define("_MI_SSECTION_LASTITEM", "Mostrar coluna '√∫ltimo item'?");
define("_MI_SSECTION_LASTITEMDSC", "Marcar 'Sim' para mostrar o √∫ltimo item em cada categoria no √≠ndice e na p√°gina da categoria.");
define("_MI_SSECTION_LASTITEMS", "Mostrar a lista dos artigos publicados mais recentes?");
define("_MI_SSECTION_LASTITEMSDSC", "Marque 'Sim' para ter a lista embaixo, na primeira p√°gina do m√≥dulo");
define("_MI_SSECTION_LASTITSIZE", "Tamanho do √∫ltimo item :");
define("_MI_SSECTION_LASTITSIZEDSC", "Defina o tamanho m√°ximo do t√≠tulo na coluna √öltimos Itens");
define("_MI_SSECTION_LINKPATH", "Permitir links no caminho atual:");
define("_MI_SSECTION_LINKPATHDSC", "Esta op√ß√£o permitir√° ao usu√°rio retornar, com um clique, ao caminho exibido no topo da p√°gina");
define("_MI_SSECTION_MAX_HEIGHT", "Altura m√°xima da imagem");
define("_MI_SSECTION_MAX_HEIGHTDSC", "Altura m√°xima do arquivo de imagem que pode ser carregado");
define("_MI_SSECTION_MAX_SIZE", "Tamanho m√°ximo de arquivo");
define("_MI_SSECTION_MAX_SIZEDSC", "Tamanho m√°ximo [em bytes] de um arquivo para ser carregado.");
define("_MI_SSECTION_MAX_WIDTH", "Largura m√°xima da imagem a ser carregada");
define("_MI_SSECTION_MAX_WIDTHDSC", "Largura m√°xima permitida para um arquivo ser carregado.");
define("_MI_SSECTION_MD_DESC", "Sistema de Gerenciamento de Se√ß√µes para seu Portal em XOOPS");
define("_MI_SSECTION_MD_NAME", "SmartSection");
define("_MI_SSECTION_MODULE_BUG", "Reportar um erro neste m√≥dulo");
define("_MI_SSECTION_MODULE_DEMO", "Site de demonstra√ß√£o");
define("_MI_SSECTION_MODULE_DISCLAIMER", "Carta de ren√∫ncia");
define("_MI_SSECTION_MODULE_FEATURE", "Sugerir uma nova caracter√≠stica para este m√≥dulo");
define("_MI_SSECTION_MODULE_INFO", "Informa√ß√µes do desenvolvimento do M√≥dulo");
define("_MI_SSECTION_MODULE_RELEASE_DATE", "Data do release");
define("_MI_SSECTION_MODULE_STATUS", "Status");
define("_MI_SSECTION_MODULE_SUBMIT_BUG", "Submeter um erro");
define("_MI_SSECTION_MODULE_SUBMIT_FEATURE", "Submeter um pedido de altera√ß√£o");
define("_MI_SSECTION_MODULE_SUPPORT", "Site de suporte oficial");
define("_MI_SSECTION_NO_FOOTERS","Nenhum");
define("_MI_SSECTION_ORDERBY", "Ordem de classifica√ß√£o");
define("_MI_SSECTION_ORDERBY_DATE", "Date DESC");
define("_MI_SSECTION_ORDERBY_TITLE", "T√≠tulo ASC");
define("_MI_SSECTION_ORDERBY_WEIGHT", "Peso ASC");
define("_MI_SSECTION_ORDERBYDSC", "Selecione a ordem de classifica√ß√£o dos itens para todo o m√≥dulo.");
define("_MI_SSECTION_OTHER_ITEMS_TYPE_ALL", "Todos os artigos");
define("_MI_SSECTION_OTHER_ITEMS_TYPE_NONE", "Nenhum");
define("_MI_SSECTION_OTHER_ITEMS_TYPE_PREVIOUS_NEXT", "Pr√©vio e pr√≥ximo artigo");
define("_MI_SSECTION_OTHERITEMS", "Tipo de exibi√ß√£o de outros artigos");
define("_MI_SSECTION_OTHERITEMSDSC", "Selecione como voc√™ gostaria de exibir os outros artigos da categoria na p√°gina de um artigo.");
define("_MI_SSECTION_PERPAGE", "M√°ximo de artigos por p√°gina (Lado do Admin):");
define("_MI_SSECTION_PERPAGEDSC", "N√∫mero de m√°ximo de artigos por p√°gina a ser exibido de uma vez no lado do admin.");
define("_MI_SSECTION_PERPAGEINDEX", "Artigos de m√°ximo pela p√°gina (Lado de usu√°rio):");
define("_MI_SSECTION_PERPAGEINDEXDSC", "N√∫mero de m√°ximo de artigos por p√°gina a ser exibido de uma vez no lado de usu√°rio.");
define("_MI_SSECTION_PRINTLOGOURL","Logotipo imprimir URL");
define("_MI_SSECTION_PRINTLOGOURLDSC","URL do logotipo que estar√° impresso no topo da p√°gina");
define("_MI_SSECTION_RECENTITEMS", "Artigos recentes (Detalhe)");
define("_MI_SSECTION_SHOW_RSS","Mostrar link para RSS feed");
define("_MI_SSECTION_SHOW_RSSDSC","");
define("_MI_SSECTION_SHOW_SUBCATS", "Exibir sub-categorias na p√°gina de √≠ndice");
define("_MI_SSECTION_SHOW_SUBCATS_ALL", "Mostrar todas as sub-categorias");
define("_MI_SSECTION_SHOW_SUBCATS_DSC", "Selecione sim para exibir as sub-categorias na lista de categorias da p√°gina de √≠ndice do m√≥dulo");
define("_MI_SSECTION_SHOW_SUBCATS_NO", "N√£o mostrar sub-categorias");
define("_MI_SSECTION_SHOW_SUBCATS_NOTEMPTY", "Mostrar sub-categorias que n√£o est√£o vazias");
define("_MI_SSECTION_SUB_SMNAME1", "Submeter um artigo");
define("_MI_SSECTION_SUB_SMNAME2", "Artigos populares");
define("_MI_SSECTION_SUBMITMSG", "Apresentar p√°gina de introdu√ß√£o:");
define("_MI_SSECTION_SUBMITMSGDEF", "");
define("_MI_SSECTION_SUBMITMSGDSC", "Mensagem de introdu√ß√£o que ser√° exibida quando um artigo for submetido √† aprova√ß√£o.");
define("_MI_SSECTION_TITLE_SIZE", "Tamanho de t√≠tulo :");
define("_MI_SSECTION_TITLE_SIZEDSC", "Determinar o tamanho m√°ximo do t√≠tulo na p√°gina de exibi√ß√£o de um √∫nico artigo.");
define("_MI_SSECTION_UPLOAD", "Usu√°rio pode fazer upload?");
define("_MI_SSECTION_UPLOADDSC", "Permitir que usu√°rios fa√ßam uploads de arquivos vinculados a artigos em seu site?");
define("_MI_SSECTION_USEREALNAME", "Usar o Nome Real dos usu√°rios");
define("_MI_SSECTION_USEREALNAMEDSC", "Quando exibir um nickname, use o nome real do usu√°rio se ele tiver escolhido usar seu nome real.");
define("_MI_SSECTION_VERSION_HISTORY", "Hist√≥rico da Vers√£o");
define("_MI_SSECTION_WARNING_BETA", "Este m√≥dulo est√° neste est√°gio, sem qualquer garantia.");
define("_MI_SSECTION_WARNING_FINAL", "Este m√≥dulo est√° neste est√°gio, sem qualquer garantia.");
define("_MI_SSECTION_WARNING_RC", "Este m√≥dulo est√° neste est√°gio, sem qualquer garantia.");
define("_MI_SSECTION_WELCOME", "Mostrar o t√≠tulo e a mensagem de boas-vindas:");
define("_MI_SSECTION_WELCOMEDSC", "Se voc√™ marcar 'Sim', a p√°gina-√≠ndice do m√≥dulo ir√° mostrar o t√≠tulo 'Bem-vindo ao Smartsection de...', seguida da mensagem de boas-vindas definida abaixo. Se voc√™ marcar 'N√£o', nenhuma dessas linhas ser√° exibida.");
define("_MI_SSECTION_WHOWHEN", "Mostrar o an√∫ncio e a data?");
define("_MI_SSECTION_WHOWHENDSC", "Marque 'Sim' para mostrar o an√∫ncio e a informa√ß√£o da data de cada artigo, individualmente.");
define("_MI_SSECTION_WYSIWYG", "Tipo de editor");
define("_MI_SSECTION_WYSIWYGDSC", "Para escolher que tipo de editor voc√™ quer usar. Note, no entanto, que se voc√™ escolher qualquer editor que n√£o o XoopsEditor, ele dever√° estar instalado em seu site.");

define("_MI_SSECTION_PV_TEXT", "Visualiza√ß√£o parcial de Mensagem");
define("_MI_SSECTION_PV_TEXTDSC", "Mensagem para artigos de visualiza√ß√£o parcial apenas.");
define("_MI_SSECTION_PV_TEXT_DEF", "Para ver o artigo completo, voc√™ deve estar registrado no site.");

define("_MI_SSECTION_SEOMODNAME", "URL - Reescrevendo o nome do m√≥dulo");
define("_MI_SSECTION_SEOMODNAMEDSC", "Se URL para reescrevendo estiver habilitada para este m√≥dulo, este √© o nome do m√≥dulo que ser√° usado. Por exemplo : http://yoursite.com/smartection/...");

define("_MI_SSECTION_ARTCOUNT", "Mostrar quantidade de artigos");
define("_MI_SSECTION_ARTCOUNTDSC", "Escolher 'Sim' para mostrar a quantidade de artigos na categoria ou dentro do sum√°rio. Aten√ß√£o, o m√≥dulo atualmente conta somente artigos dentro de cada categoria e n√£o o conta dentro dos subcategoies.");

define("_MI_SSECTION_LATESTFILES", "√öltimos arquivos enviados");

define("_MI_SSECTION_PATHSEARCH", "Exposi√ß√£o do trajeto da categoria em resultados da busca");
define("_MI_SSECTION_PATHSEARCHDSC", "");
define("_MI_SSECTION_SHOW_SUBCATS_NOMAIN", "Mostrar sub-categorias no in√≠cio da p√°gina somente");
define("_MI_SSECTION_RATING_ENABLED", "Habilitar sistema de vota√ß√£o");
define("_MI_SSECTION_RATING_ENABLEDDSC", "Isso exige recursos do FrameWork SmartObject");

define("_MI_SSECTION_DISPBREAD", "Mostrar um breadcrumb");
define("_MI_SSECTION_DISPBREADDSC", "");

define('_MI_SSECTION_DATE_TO_DATE', 'Artigos da data at√© √† data')

?>