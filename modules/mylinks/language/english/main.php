<?php
// $Id: main.php,v 1.10 2004/12/26 19:11:57 onokazu Exp $
//%%%%%%		Module Name 'MyLinks'		%%%%%

define("_MD_THANKSFORINFO","Obrigado pela informação, nós verificaremos o seu pedido brevemente.");
define("_MD_THANKSFORHELP","Obrigado por ajudar a manter a integridade deste portal.");
define("_MD_FORSECURITY","Por razões de segurança o seu nome de usuário e o endereço IP foram temporariamente armazenados no nosso sistema.");

define("_MD_SEARCHFOR","Procurar por");
define("_MD_ANY","QUALQUER");
define("_MD_SEARCH","Procurar");

define("_MD_MAIN","Principal");
define("_MD_SUBMITLINK","Submeter link");
define("_MD_SUBMITLINKHEAD","Formulário de submissão de link");
define("_MD_POPULAR","Populares");
define("_MD_TOPRATED","Mais votados");

define("_MD_NEWTHISWEEK","Novos desta semana");
define("_MD_UPTHISWEEK","Actualizados nesta semana");

define("_MD_POPULARITYLTOM","Popularidade(Menos para mais clicados)");
define("_MD_POPULARITYMTOL","Popularidade(Mais para menos clicados)");
define("_MD_TITLEATOZ","Título (A para Z)");
define("_MD_TITLEZTOA","Título(Z para A)");
define("_MD_DATEOLD","Date (Old Links Listed First)");
define("_MD_DATENEW","Date (New Links Listed First)");
define("_MD_RATINGLTOH","Votos (Menos votados para mais votados)");
define("_MD_RATINGHTOL","Votos (Mais votados para menos votados)");

define("_MD_NOSHOTS","Nenhuma imagem de visualização disponível");
define("_MD_EDITTHISLINK","Editar este link");

define("_MD_DESCRIPTIONC","Descrição: ");
define("_MD_EMAILC","Email: ");
define("_MD_CATEGORYC","Categoria: ");
define("_MD_LASTUPDATEC","Última actualização: ");
define("_MD_HITSC","Cliques: ");
define("_MD_RATINGC","Votos: ");
define("_MD_ONEVOTE","1 voto");
define("_MD_NUMVOTES","%s votos");
define("_MD_RATETHISSITE","Classificar este site");
define("_MD_MODIFY","Modificar");
define("_MD_REPORTBROKEN","Reportar link quebrado");
define("_MD_TELLAFRIEND","Informar um amigo");

define("_MD_THEREARE","Actualmente temos <b>%s</b> Links na nossa base de dados");
define("_MD_LATESTLIST","Últimos links adicionados");

define("_MD_REQUESTMOD","Solicitar alteração de link");
define("_MD_LINKID","Link ID: ");
define("_MD_SITETITLE","Título do website: ");
define("_MD_SITEURL","URL do website: ");
define("_MD_OPTIONS","Opções: ");
define("_MD_NOTIFYAPPROVE", "Avisar-me quando este link for aprovado");
define("_MD_SHOTIMAGE","Imagem de visualização: ");
define("_MD_SENDREQUEST","Enviar solicitação");

define("_MD_VOTEAPPRE","O seu voto é importante.");
define("_MD_THANKURATE","Obrigado por ajudar a classificar este site aqui no %s.");
define("_MD_VOTEFROMYOU","A opinião de usuários como você irá ajudar outros visitantes a escolherem os melhores links para visitar.");
define("_MD_VOTEONCE","Por favor não vote no mesmo link mais de uma vez.");
define("_MD_RATINGSCALE","A escala é 1 - 10, Sendo 1 o menor voto e 10 o maior.");
define("_MD_BEOBJECTIVE","Por favor seja objectivo, se todos os usuários votarem apenas 1 ou apenas 10, os votos não serão reelevantes. ");
define("_MD_DONOTVOTE","Não vote num link que você mesmo enviou.");
define("_MD_RATEIT","Classifique este link!");

define("_MD_INTRESTLINK","Um link interessante em %s");  // %s is your site name
define("_MD_INTLINKFOUND","Aqui está um link para um site interessante que eu encontrei em %s");  // %s is your site name

define("_MD_RECEIVED","Nós recebemos a informação relativa ao seu website, obrigado!");
define("_MD_WHENAPPROVED","Você será informado por email quando o seu site for aprovado.");
define("_MD_SUBMITONCE","Envie o seu link apenas uma vez.");
define("_MD_ALLPENDING","Toda a informação relativa a este link estão pendentes para uma verificação.");
define("_MD_DONTABUSE","Nome de usuário e endereço IP armazenados, por isso por favor não abuse o sistema.");
define("_MD_TAKESHOT","Nós capturaremos uma imagem de visualizção do seu site e esta poderá levar alguns dias a ser adicionado a nossa base de dados.");

define("_MD_RANK","Posição");
define("_MD_CATEGORY","Categoria");
define("_MD_HITS","Cliques");
define("_MD_RATING","Classificação");
define("_MD_VOTE","Voto");
define("_MD_TOP10"," Top 10 de %s"); // %s is a link category title

define("_MD_SEARCHRESULTS","Resultados da pesquisa por <b>%s</b>:"); // %s is search keywords
define("_MD_SORTBY","Ordenar por:");
define("_MD_TITLE","Título");
define("_MD_DATE","Data");
define("_MD_POPULARITY","Popularidade");
define("_MD_CURSORTEDBY","Sites actualmente ordenados por: %s");
define("_MD_PREVIOUS","anterior");
define("_MD_NEXT","próximo");
define("_MD_NOMATCH","Nenhum resultado encontrado para a sua pesquisa");

define("_MD_SUBMIT","Enviar");
define("_MD_CANCEL","Cancelar");

define("_MD_ALREADYREPORTED","Você já enviou um alerta de link quebrado para este site.");
define("_MD_MUSTREGFIRST","Desculpe, você não possui permissões para efectuar esta operação.<br />Por favor registre-se ou faça o login antes!");
define("_MD_NORATING","No rating selected.");
define("_MD_CANTVOTEOWN","You cannot vote on the resource you submitted.<br />All votes are logged and reviewed.");
define("_MD_VOTEONCE2","Vote for the selected resource only once.<br />All votes are logged and reviewed.");

//%%%%%%	Module Name 'MyLinks' (Admin)	  %%%%%

define("_MD_WEBLINKSCONF","Web Links Configuration");
define("_MD_GENERALSET","My Links General Settings");
define("_MD_ADDMODDELETE","Add, Modify, and Delete Categories/Links");
define("_MD_LINKSWAITING","Links Waiting for Validation");
define("_MD_BROKENREPORTS","Broken Link Reports");
define("_MD_MODREQUESTS","Link Modification Requests");
define("_MD_SUBMITTER","Submitter: ");
define("_MD_VISIT","Visit");
define("_MD_SHOTMUST","Screenshot image must be a valid image file under %s directory (ex. shot.gif). Leave it blank if no image file.");
define("_MD_APPROVE","Approve");
define("_MD_DELETE","Delete");
define("_MD_NOSUBMITTED","No New Submitted Links.");
define("_MD_ADDMAIN","Add a MAIN Category");
define("_MD_TITLEC","Title: ");
define("_MD_IMGURL","Image URL (OPTIONAL Image height will be resized to 50): ");
define("_MD_ADD","Add");
define("_MD_ADDSUB","Add a SUB-Category");
define("_MD_IN","in");
define("_MD_ADDNEWLINK","Add a New Link");
define("_MD_MODCAT","Modify Category");
define("_MD_MODLINK","Modify Link");
define("_MD_TOTALVOTES","Link Votes (total votes: %s)");
define("_MD_USERTOTALVOTES","Registered User Votes (total votes: %s)");
define("_MD_ANONTOTALVOTES","Anonymous User Votes (total votes: %s)");
define("_MD_USER","User");
define("_MD_IP","IP Address");
define("_MD_USERAVG","User AVG Rating");
define("_MD_TOTALRATE","Total Ratings");
define("_MD_NOREGVOTES","No Registered User Votes");
define("_MD_NOUNREGVOTES","No Unregistered User Votes");
define("_MD_VOTEDELETED","Vote data deleted.");
define("_MD_NOBROKEN","No reported broken links.");
define("_MD_IGNOREDESC","Ignore (Ignores the report and only deletes the <b>broken link report</b>)");
define("_MD_DELETEDESC","Delete (Deletes <b>the reported website data</b> and <b>broken link reports</b> for the link.)");
define("_MD_REPORTER","Report Sender");
define("_MD_LINKSUBMITTER","Link Submitter");
define("_MD_IGNORE","Ignore");
define("_MD_LINKDELETED","Link Deleted.");
define("_MD_BROKENDELETED","Broken link report deleted.");
define("_MD_USERMODREQ","User Link Modification Requests");
define("_MD_ORIGINAL","Original");
define("_MD_PROPOSED","Proposed");
define("_MD_OWNER","Owner: ");
define("_MD_NOMODREQ","No Link Modification Request.");
define("_MD_DBUPDATED","Database Updated Successfully!");
define("_MD_MODREQDELETED","Modification Request Deleted.");
define("_MD_IMGURLMAIN","Image URL (OPTIONAL and Only valid for main categories. Image height will be resized to 50): ");
define("_MD_PARENT","Parent Category:");
define("_MD_SAVE","Save Changes");
define("_MD_CATDELETED","Category Deleted.");
define("_MD_WARNING","WARNING: Are you sure you want to delete this Category and ALL of its Links and Comments?");
define("_MD_YES","Yes");
define("_MD_NO","No");
define("_MD_NEWCATADDED","New Category Added Successfully!");
define("_MD_ERROREXIST","ERROR: The Link you provided is already in the database!");
define("_MD_ERRORTITLE","ERROR: You need to enter TITLE!");
define("_MD_ERRORDESC","ERROR: You need to enter DESCRIPTION!");
define("_MD_NEWLINKADDED","New Link added to the Database.");
define("_MD_YOURLINK","Your Website Link at %s");
define("_MD_YOUCANBROWSE","You can browse our web links at %s");
define("_MD_HELLO","Hello %s");
define("_MD_WEAPPROVED","We approved your link submission to our web links database.");
define("_MD_THANKSSUBMIT","Thanks for your submission!");
define("_MD_ISAPPROVED","Nós aprovamos o lin que submeteu");

define('_MYLINKS_SECURITY_CODE','Código de segurança');
define("_MYLINKS_SECURITY_GETCODE","Introduza o código de segurança");
define("_MYLINKS_SECURITY_ERROR","Código de segurança inválido");
?>
