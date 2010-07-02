<?php
// $Id: admin.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/04/04 K.OHWADA
// _AM_PREFERENCE がない

// 2004/03/27 K.OHWADA
// multi language in reorder.php
//   _AM_CATEGORY_REORDERED
//   _AM_ARTICLE_REORDERED
//   _AM_CATEGORY_REORDER_RETURN
// copy mode
// _AM_COPY_ARTICLE_EXPLANE

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
//   新設 _AM_PATH_MANAGEMENT  _AM_LIST_BROKEN
// multi langauge
//   新設 _AM_DUPLICATE_ARTICLES
// メニューとタイトルを一致させる
// 誤字訂正

// 2003/11/26 K.OHWADA
// 誤字訂正

// 2003/11/21 K.OHWADA
// import.php 英語対応

// 2003/09/23 K.OHWADA
// rename WFセクション to XFセクション
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'モジュール設定');
define("_AM_PATH_MANAGEMENT","パス管理");
define("_AM_LIST_BROKEN",'破損ファイル一覧');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","データベースは正常に更新されました");
define("_AM_STORYID","ID");
define("_AM_TITLE","タイトル");
define("_AM_SUMMARY","概要");
define("_AM_CATEGORY","カテゴリ名"); //******
define("_AM_CATEGORY2","このカテゴリーの編集:"); //******
define("_AM_POSTER","執筆者");
define("_AM_SUBMITTED2","提出日付");
define("_AM_NOSHOWART2","非表示");
define("_AM_ACTION","行動");
define("_AM_EDIT","編集");
define("_AM_DELETE","削除");
define("_AM_LAST10ARTS","発行済み記事");
define("_AM_PUBLISHED","発行日付");
define("_AM_PUBLISHEDON","発行日付");
define("_AM_GO","提出");
define("_AM_EDITARTICLE","記事の編集");
define("_AM_POSTNEWARTICLE","新しい記事の追加");
define("_AM_RUSUREDEL","本当にこの記事と全てのコメントを削除しますか？");
define("_AM_YES","はい");
define("_AM_NO","いいえ");
define("_AM_ALLOWEDHTML","HTMLを許可:");
define("_AM_DISAMILEY","顔アイコンを無効");
define("_AM_DISHTML","HTMLを無効");
define("_AM_PREVIEW","プレビュー");
define("_AM_SAVE","保存");
define("_AM_ADD","追加");
define("_AM_SMILIE","記事に顔アイコンを追加");
define("_AM_EXGRAPHIC","記事に外部画像を追加");
define("_AM_GRAPHIC","記事にローカルの画像を追加");
define("_AM_FILESHOWDESCRIPT","ファイルアップロード詳細");
define("_AM_ARTICLEMANAGEMENT","記事管理");
define("_AM_ARTICLEMANAGEMENTLINKS","記事管理のリンク");
define("_AM_ARTICLEPREVIEW","記事のプレビュー");
define("_AM_ADDMCATEGORY","メインカテゴリの追加");
define("_AM_CATEGORYNAME","カテゴリ名");
define("_AM_CATEGORYTAKEMETO","ここをクリックすると新しいカテゴリを作成できます");
define("_AM_NOCATEGORY","エラー - カテゴリーは作成されませんでした");
define("_AM_MAX40CHAR","(最大:半角40文字)");
define("_AM_CATEGORYIMG","カテゴリのイメージ");
define("_AM_IMGNAEXLOC","%s に割り当てられたイメージファイル名＋拡張子");
define("_AM_IN","<b>カテゴリの中に作成</b><br /> (空欄: メインカテゴリ, それ以外はサブカテゴリとして)");
define("_AM_MOVETO","<b>別カテゴリに移動</b> (空欄:カテゴリを移動しない)");
define("_AM_MODIFYCATEGORY","カテゴリの編集");
define("_AM_MODIFY","編集");
define("_AM_PARENTCATEGORY","親カテゴリ");
define("_AM_SAVECHANGE","変更の保存");
define("_AM_DEL","削除");
define("_AM_CANCEL","キャンセル");
define("_AM_WAYSYWTDTTAL","注意: このカテゴリと全ての記事、コメントを削除しますか？");
// Added in Beta6

//define("_AM_CATEGORYSMNGR","カテゴリマネージャ");
define("_AM_CATEGORYSMNGR","カテゴリ管理");

define("_AM_PEARTICLES","新規記事の作成");
define("_AM_GENERALCONF","一般設定");

// WFSECTION
define("_AM_UPDATEFAIL","更新に失敗しました");
define("_AM_EDITFILE","添付ファイルの編集");
define("_AM_CATEGORYDESC","カテゴリーに付記するテキスト");
define("_AM_FILESBASEPATH","添付ファイルのディレクトリ:");
define("_AM_AGRAPHICPATH","記事の画像ファイルのディレクトリ:");
define("_AM_SGRAPHICPATH","カテゴリの画像ファイルのディレクトリ:");
define("_AM_SMILIECPATH","顔アイコンのディレクトリ:");
define("_AM_HTMLCPATH","HTMLファイルのディレクトリ:");
define("_AM_FILEUPLOADSPATH","添付ファイル: ");
define("_AM_FILEUPLOADSTEMPPATH","添付の一時保存: ");
define("_AM_ARTICLESFILEPATH","記事のイメージ: ");
define("_AM_SECTIONFILEPATH","カテゴリのイメージ: ");
define("_AM_SMILIEFILEPATH","顔アイコンのイメージ: ");
define("_AM_HTMLFILEPATH","HTMLファイル: ");
define("_AM_UPLOADCONFIGFILE","設定ファイルのアップロード: ");
define("_AM_ARTICLESAPAGE","一ページに表示する記事数");
define("_AM_ARTICLESAPAGE2","ページナビゲータが表示される前にそれぞれのページに表示される記事数");
define("_AM_NOIMG","イメージがありません");
define("_AM_PIDINVALID","親カテゴリが不正です");
define("_AM_NOTITLE","タイトル無し");
define("_AM_FILEDEL","注意: 本当にこのファイルを削除しますか？");
define("_AM_AFERTSETCATE","カテゴリを追加後、記事を追加できます");
define("_AM_IMGUPLOAD","カテゴリのイメージのアップロード");
define("_AM_IMGUPLOAD2","現在のイメージフォルダは");
define("_AM_IMGNAME","ファイル名 (ブランク: オリジナルのファイル名と一緒");
define("_AM_UPLOADED","アップロードされました");
define("_AM_ISNOTWRITABLE","は書き込み可ではありません");
define("_AM_UPLOADFAIL","アップロード失敗");
define("_AM_NOTALLOWEDMINETYPE","この種類のファイルはアップロードできません");
define("_AM_FILETOOBIG","ファイルサイズが大きすぎます");

define("_AM_CATEGORYMENU","カテゴリー見出し設定");
define("_AM_ARTICLE2MENU","記事見出し設定");
define("_AM_ARTICLEPAGEMENU","記事ページ設定");
define("_AM_BLOCKMENU","ブロック設定");
define("_AM_ADMINEDITMENU","記事一般設定");
define("_AM_ADMINCONFIGMENU","管理設定");

define("_AM_ARTIMGUPLOAD","イメージのアップロード");
define("_AM_TOPPAGETYPE","記事表示回数の代わりに記事へのリンクを表示する？");
define("_AM_SHOWCATPIC","メインメニューのページにカテゴリのイメージを表示する");
define("_AM_WYSIWYG","オリジナルのエディターの代わりのWYSIWYGエディタ");
define("_AM_SHOWCOMMENTS","記事のページにユーザのコメントを表示しますか？");
define("_AM_SUBMITTED","ユーザが投稿した記事"); //added

//define("_AM_ALLTXT","<h4>記事管理</h4></div><div><b>記事管理</b>では記事の編集、削除、名前の変更ができます。本機能はデータベース内の全ての記事で表示されます。<br /><br />"); //added
// WF -> XF
//define("_AM_PUBLISHEDTXT","<h4>記事発行管理</h4></div><div><b>記事発行管理</b>では（管理者によって承認され）発行された全ての記事が表示されます<br /><br />ここで表示される記事は XFセクション のメインメニューのカテゴリー一覧内に全て表示されます。（グループアクセスにて制御された全ての記事を含む）<br /><br />"); //added
//define("_AM_SUBMITTEDTXT","<h4>記事提出管理</h4></div><div><b>記事提出管理</b>では、あなたのサイトで提出された全ての記事が表示され編集できます。<br /><br />承認するには<b>編集</b>をクリックし<b>承認</b>チェックボックスにチェックを入れて記事を保存して下さい。提出済み記事が発行されます。<br /><br />"); //added
//define("_AM_ONLINETXT","<h4>記事表示管理</h4></div><div><b>記事表示管理</b>では「online」に設定された全ての記事が表示されます。<br /><br />記事のステータスを変更するには編集をクリックし「online」チェックボックスで変更して下さい。<br /><br />"); //added
//define("_AM_OFFLINETXT","<h4>記事非表示管理</h4></div><div><b>記事非表示管理</b>では「offline」に設定された全ての記事が表示されます。<br /><br />記事のステータスを変更するには編集をクリックし「online」チェックボックスで変更して下さい。<br /><br />"); //added
//define("_AM_EXPIREDTXT","<h4>記事失効管理</h4></div><div><b>記事失効管理</b>では失効した全ての記事が表示されます<br /><br /><b>編集</b>リンクをクリックし<b>失効日時を指定する</b>設定を変更することで簡単に失効日を初期化できます"); //added
//define("_AM_AUTOEXPIRETXT","<h4>記事自動失効管理</h4></div><div><b>記事自動失効管理では</b>ある日付で失効するように設定した全ての記事が表示されます<br /><br /><b>編集</b>リンクをクリックし<b>失効日時を指定する</b>設定を変更することで簡単に失効日を初期化できます"); //added
//define("_AM_AUTOTXT","<h4>記事自動発行管理</h4></div><div><b>記事自動発行管理では</b>先日付で発行するように設定した全ての記事が表示されます<br /><br /><b>編集</b>リンクをクリックし'発行日時を指定する'設定を変更することで設定できます"); //added
// WF -> XF
//define("_AM_NOSHOWTXT","<h4>一覧非表示記事</h4></div><div><b>一覧非表示記事</b>は記事の特別な属性で通常の記事とは違い、記事のトップページに表示されず、たどる事もできません。その代わり XFセクション のメニューブロックに表示されます。<br /><br />HTMLページでのこのオプションと「情報の非表示」（記事編集ページのオプション）を使用して、あなたの表示したいものを表示できます。例えば、プライバシーに関する告知等で利用できます。<br /><br />その他のオプションは全て同時に使用できます。（発行、失効、表示、非表示など）<br /><br />"); //added

// メニューとタイトルを一致させる
define("_AM_ALLTXT","<b>記事管理</b>では記事の編集、削除、名前の変更ができます。本機能はデータベース内の全ての記事で表示されます。<br /><br />"); //added
define("_AM_PUBLISHEDTXT","<b>発行済み記事一覧</b>では（管理者によって承認され）発行された全ての記事が表示されます<br /><br />ここで表示される記事は XFセクション のメインメニューのカテゴリー一覧内に全て表示されます。（グループアクセスにて制御された全ての記事を含む）<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<b>承認待ち記事一覧</b>では、あなたのサイトで提出された全ての記事が表示され編集できます。<br /><br />承認するには<b>編集</b>をクリックし<b>承認</b>チェックボックスにチェックを入れて記事を保存して下さい。提出済み記事が発行されます。<br /><br />"); //added
define("_AM_ONLINETXT","<b>表示記事一覧</b>では「online」に設定された全ての記事が表示されます。<br /><br />記事のステータスを変更するには編集をクリックし「online」チェックボックスで変更して下さい。<br /><br />"); //added
define("_AM_OFFLINETXT","<b>非表示記事一覧</b>では「offline」に設定された全ての記事が表示されます。<br /><br />記事のステータスを変更するには編集をクリックし「online」チェックボックスで変更して下さい。<br /><br />"); //added
define("_AM_EXPIREDTXT","<b>失効記事一覧</b>では失効した全ての記事が表示されます<br /><br /><b>編集</b>リンクをクリックし<b>失効日時を指定する</b>設定を変更することで簡単に失効日を初期化できます"); //added
define("_AM_AUTOEXPIRETXT","<b>自動失効記事一覧</b>ではある日付で失効するように設定した全ての記事が表示されます<br /><br /><b>編集</b>リンクをクリックし<b>失効日時を指定する</b>設定を変更することで簡単に失効日を初期化できます"); //added
define("_AM_AUTOTXT","<b>自動発行記事一覧</b>では先日付で発行するように設定した全ての記事が表示されます<br /><br /><b>編集</b>リンクをクリックし'発行日時を指定する'設定を変更することで設定できます"); //added
define("_AM_NOSHOWTXT","<b>一覧非表示記事一覧</b>は記事の特別な属性で通常の記事とは違い、記事のトップページに表示されず、たどる事もできません。その代わり XFセクション のメニューブロックに表示されます。<br /><br />HTMLページでのこのオプションと「情報の非表示」（記事編集ページのオプション）を使用して、あなたの表示したいものを表示できます。例えば、プライバシーに関する告知等で利用できます。<br /><br />その他のオプションは全て同時に使用できます。（発行、失効、表示、非表示など）<br /><br />"); //added

define("_AM_BLOCKCONF","ブロック設定");
define("_AM_TITLE1","メインメニューのブロック名:");
define("_AM_TITLE4","最近の記事のブロック名:");
define("_AM_TITLE5","人気記事のブロック名:");
define("_AM_ORDER","「順」の代わりのテキスト:");
define("_AM_DATE","「日付」の代わりのテキスト:");
define("_AM_HITS","「ヒット」の代わりのテキスト:");
define("_AM_DISP","「表示」の代わりのテキスト:");
define("_AM_ARTCLS","記事ブロック名");
define("_AM_MENU_LINKS","<b>メニュー管理のリンク</b>");
define("_AM_BAN","禁止ユーザ");
//New to version 0.9.2
define("_AM_CMODHEADER","File Permission Check");

// WF -> XF
define("_AM_CMODERRORINFO","ディレクトリとファイルが適切に書き込み可になっているかチェックします。<br/><br/> XFセクション は下記のファイルとディレクトリに対してCHMODを試み書き込み属性が正しくない場合にはエラーを表示します");

define("_AM_FILEPATH","イメージとアップロードの設定");

// WF -> XF
define("_AM_FILEPATHWARNING","ディレクトリのパス設定をします。 XFセクション はあなたの入力したパスが正しくない場合警告をだします。<br/><br/>空欄にするとデフォルトのパスが使用されます<br/><br/>");

define("_AM_FILEUSEPATH","ユーザのパスの変更");
define("_AM_PATHEXIST","パスは存在します");
define("_AM_PATHNOTEXIST","パスが存在しません、確認して下さい");
define("_AM_USERPATH","ユーザ定義パス");
define("_AM_SHOWSELIMAGE","現在選択されているイメージの表示: "); //******* Updated *******
define("_AM_SHOWSUBMENU","カテゴリの一覧ページにサブメニューを表示する？");
define("_AM_MENUS","カテゴリの一覧設定");
define("_AM_DEFAULTPATH","デフォルトのパスは使用されています");
define("_AM_SCROLLINGBLOCK","最近の記事のブロックでスクロールさせる？");
define("_AM_BLOCKHEIGHT","スクロールさせるブロックの高さ");
define("_AM_DEFAULT"," デフォルト");
define("_AM_BLOCKAMOUNT","スクロールさせる行数？");
define("_AM_BLOCKDELAY","スクロールさせるブロックの一行あたりの遅延");
define("_AM_LASTART","管理画面で表示する新しい記事数: ");
define("_AM_NUMUPLOADS","一回にアップロードするファイル数？");

// WF -> XF
define("_AM_WEBMASTONLY","管理者のみに XFセクション の設定変更を限定する？");

define("_AM_DEFAULTS","全ての設定をデフォルトに戻す？");

define("_AM_NOCMODERROR","( 正常 )");
define("_AM_CMODERROR","( 異常/ディレクトリがありません )");

// WF -> XF
define("_AM_REVERTED"," XFセクション の設定をデフォルトに戻す");

define("_AM_GROUPPROMPT","下記のグループにアクセスを許可する:");
define("_AM_NOVIEWPERMISSION","このエリアへのアクセス権がありません");
define("_AM_FILE","ファイル: ");
define("_AM_NOMAINTEXT","エラー: あなたの記事にはテキスト/HTMLがありません。空の記事は投稿できません");
define("_AM_DIR","ディレクトリ: ");
define("_AM_MISC","その他設定");

define("_AM_ISNOTWRITABLE2"," はサーバに存在しません。正しいパスに変更して下さい");
define("_AM_CANNOTMODIFY"," 正しいパスを設定しないと編集できません");
define("_AM_PATH","パス: ");

define("_AM_CMODHEADER2","ファイルチェック");
define("_AM_ARTICLEMENU","記事の索引設定");
define("_AM_APPROVE","承認");
define("_AM_MOVETOTOP","本記事を一番上に移動");
define("_AM_CHANGEDATETIME","発行日時の変更");
define("_AM_NOWSETTIME","現在 %s に設定されています"); // %s is datetime of publish
define("_AM_CURRENTTIME","%s が現在の時刻です");  // %s is the current datetime
define("_AM_SETDATETIME","設定する発行日時");
define("_AM_MONTHC","月:");
define("_AM_DAYC","日:");
define("_AM_YEARC","年:");
define("_AM_TIMEC","時間:");
define("_AM_AUTOAPPROVE","新規提出記事を自動承認する？");
define("_AM_DEFAULTTIME","タイムスタンプ");

// WF -> XF
define("_AM_TURNOFFLINE"," XFセクション を隠しますか？ (管理者だけが XFセクション にアクセスできます)");

define("_AM_SHOWMARTICLES","記事欄を表示しますか？");
define("_AM_SHOWMUPDATED","更新欄を表示しますか？");
define("_AM_SHORTCATTITLE","カテゴリーのタイトルを自動で省略しますか？");
define("_AM_SHOWAUTHOR","記事一覧に執筆者の欄を表示する");
define("_AM_SHOWCOMMENTS2","記事一覧にコメント欄を表示する");
define("_AM_SHOWFILE","記事一覧に添付ファイル欄を表示する");
define("_AM_SHOWRATED","記事一覧に高評価欄を表示する");
define("_AM_SHOWVOTES","記事一覧に投票欄を表示する");
define("_AM_SHOWPUBLISHED","発行日付欄を表示しますか？");
define("_AM_SHOWHITS","記事一覧にヒット欄を表示する");
define("_AM_SHORTARTTITLE","記事のタイトルを自動で省略しますか？");
define("_AM_OFFLINE","<b>記事の非表示</b> 記事を見えなくします");
define("_AM_BROKENREPORTS","破損したファイルの報告");
define("_AM_NOBROKEN","破損したファイルは報告されていません");
define("_AM_IGNORE","無視");
define("_AM_FILEDELETED","ファイルは削除されました");
define("_AM_BROKENDELETED","ファイル破損報告は削除されました");
define("_AM_IGNOREDESC","無視 (報告を無視し<b>ファイル破損報告</b>のみ削除)");
define("_AM_DELETEDESC","削除 (ファイルに関する <b>報告されたダウンロードデータ</b> と <b>ファイル破損報告</b> の削除)");
define("_AM_REPORTER","送信者の報告");
define("_AM_FILETITLE","ダウンロードタイトル: ");

// WF -> XF
define("_AM_DLCONF","XFセクション のダウンロード設定");

define("_AM_FILEDESCRIPT","ファイル名の詳細");
define("_AM_STATUS","ステータス");
define("_AM_UPLOAD","アップロード");
define("_AM_NOTIFYPUBLISH","発行時にEmailでの通知");
define("_AM_VIEWHTML","HTML編集");
define("_AM_VIEWWAYSIWIG","WYSIWYG編集");
define("_AM_CATEGORYT","カテゴリ");
define("_AM_ACCESS","アクセス");
define("_AM_PAGE","ページ");
define("_AM_ARTICLEMANAGE","記事管理");

//define("_AM_WEIGHTMANAGE","ウェート管理");
//define("_AM_UPLOADMAN","アップロード管理");
define("_AM_WEIGHTMANAGE","カテゴリと記事のウェート管理");
define("_AM_UPLOADMAN","アップロードファイル管理");

// WF -> XF
define("_AM_NOADMINRIGHTS","管理者のみが XFセクション の設定を変更できます");

define("_AM_FILECount","ファイルカウント");
define("_AM_ALLARTICLES","全ての記事一覧");
define("_AM_PUBLARTICLES","発行済み記事一覧");

//define("_AM_SUBLARTICLES","投稿済み記事一覧");
define("_AM_SUBLARTICLES","承認待ち記事一覧");

define("_AM_ONLINARTICLES","表示記事一覧");
define("_AM_OFFLIARTICLES","非表示記事一覧");
define("_AM_EXPIREDARTICLES","失効記事一覧");
define("_AM_AUTOEXPIREARTICLES","自動失効記事一覧");
define("_AM_AUTOARTICLES","自動発行記事一覧");
define("_AM_NOSHOWARTICLES","一覧非表示記事一覧");
define("_NOADMINRIGHTS2","管理者のみが本設定を変更できます");
define("_AM_CANNOTHAVECATTHERE","エラー: カテゴリは自分自身のサブカテゴリにはなれません");
define("_AM_SECTIONMANAGE","カテゴリ管理");
define("_AM_SECTIONMANAGELINK","カテゴリ管理のリンク");
define("_AM_FILEID","ファイル");
define("_AM_FILEICON","アイコン");
define("_AM_FILESTORE","名前を付けて保存");
define("_AM_REALFILENAME","保存時のファイル名");
define("_AM_USERFILENAME","ダウンロード時のファイル名");
define("_AM_FILEMIMETYPE","ファイルタイプ");
define("_AM_FILESIZE","ファイルサイズ");
define("_AM_FDCOUNTER","カウンタ");
define("_AM_EXPARTS","失効記事");
define("_AM_EXPIRED","自動失効日");

//define("_AM_CREATED","日付の作成");
define("_AM_CREATED","作成日付");

define("_AM_CHANGEEXPDATETIME","失効日時を変更する");
define("_AM_SETEXPDATETIME","失効日時を指定する");
define("_AM_NOWSETEXPTIME","%s に記事の失効日が設定されています");
define("_AM_ANONPOST","ゲストに記事の投稿を許可しますか？");
define("_AM_NOTIFYSUBMIT","新規投稿の際管理者にメールを送信しますか？");
define("_AM_SECTIONIMAGE","トップページのイメージ");
define("_AM_SECTIONHEAD","トップページのヘッダ");
define("_AM_SECTIONFOOT","トップページのフッタ");
define("_AM_SHOWVOTESINART","記事への投票を許可しますか？");
define("_AM_SHOWREALNAME","執筆者にユーザの本名を表示しますか？(本名が設定されていない場合はユーザ名が設定されます)");
define("_AM_SHOWCATEGORYIMG","カテゴリ内で上記イメージを表示しますか？");
define("_AM_EDITSERVERFILE","サーバのファイルの編集");
define("_AM_CURRENTFILENAME","現在のファイル名: ");
define("_AM_CURRENTFILESIZE","ファイルサイズ: ");
define("_AM_UPLOADFOLD","アップロードフォルダ: ");
define("_AM_UPLOADPATH","パス: ");
define("_AM_FREEDISKSPACE","空き容量:");
define("_AM_RENAMETHIS","ファイル名を変更しますか？");
define("_AM_RENAMEFILE","ファイル名の変更");
define("_AM_SHOWSUMMARY","概要欄を表示しますか？");
define("_AM_SHOWICON","人気と更新のアイコンを表示しますか？");
define("_AM_INDEXHEADING","トップページのヘッダ"); 
define("_AM_EXTERNALARTICLE","外部記事</b> テキストやHTMLファイルは上書きされます。"); 

// added in WFS v1b6
define("_AM_POPULARITY", "人気");
define("_AM_ARTICLESSORT", "記事表示順");
define("_AM_NAVTOOLTYPE", "ナビゲーションツールの種類");
define("_AM_SELECTBOX", "プルダウンメニュー");
define("_AM_SELECTSUBS", "サブカテゴリを含めたプルダウンメニュー");
define("_AM_LINKEDPATH", "リンク");
define("_AM_LINKSANDSELECT", "リンクとプルダウンメニュー");
define("_AM_NONE", "無し");
define("_AM_CATEGORYWEIGHT", "カテゴリのウェート");
define("_AM_ARTICLEWEIGHT", "記事のウェート");
define("_AM_WEIGHT", "ウェート");
define("_AM_DUPLICATECATEGORY","カテゴリの複製");

// add
define("_AM_DUPLICATE_ARTICLES","記事も複製する");

define("_AM_COPY", "コピー");
define("_AM_TO", "対象：");
define("_AM_NEWCATEGORYNAME", "新しいカテゴリ名");
define("_AM_DUPLICATE", "複製");
define("_AM_DUPLICATEWSUBS", "サブカテゴリ込みで複製");
define("_AM_ALLOWEDMIMETYPES", "使用できるMIMEタイプ");
define("_AM_MODIFYFILE", "記事ファイルの編集");
define("_AM_FILESTATS", "添付ファイル状態");
define("_AM_FILESTAT", "記事のファイル状態:"); 
define("_AM_ERRORCHECK", "ファイルチェック"); 
define("_AM_LASTACCESS", "最終アクセス"); 
define("_AM_DOWNLOADED", "ダウンロード回数"); 
define("_AM_DOWNLOADSIZE", "ファイルサイズ");
define("_AM_UPLOADFILESIZE", "アップロードできる最大ファイルサイズ(KB) 1048576 B = 1 MB");
define("_AM_FILEMODE", "ファイルアップロードのアクセス権設定");
define("_AM_IMGHEIGHT", "アップロードイメージの最大高さ");
define("_AM_IMGWIDTH", "アップロードイメージの最大幅");
define("_AM_FILEPERMISSION", "ファイルアクセス権");  
define("_AM_IMGESIZETOBIG", "制限サイズ以上のイメージ高さ/幅");
define("_AM_CATREORDERTEXT", "ここから全てのカテゴリを並べ直せます。<br />メインカテゴリは濃い青、サブカテゴリは淡い青とグレーです。それぞれのカテゴリはウェートによって表示されます。<br /><br />記事を並び替えるにはカテゴリのタイトルをクリックすると記事の一覧が表示されます。");  
define("_WFS_ATTACHFILE", "添付ファイル");  
define("_WFS_ATTACHFILEACCESS", "アクセス権は記事と同じになります。添付ファイルの編集時に変更できます。");  
define("_AM_WFSFILESHOW", "添付ファイル");  
define("_AM_ATTACHEDFILE", "ファイルの表示");  
define("_AM_ATTACHEDFILEM", "添付ファイル管理"); 
define("_AM_UPOADMANAGE", "アップロード管理"); 
define("_AM_CAREORDER", "カテゴリと記事のウェート");
define("_AM_CAREORDER2", "カテゴリの並び替え");
define("_AM_CAREORDER3", "記事の並び替え");   

define("_AM_PICON", "記事（ページ）のアイコンを表示する？"); 

// WF -> XF
define("_AM_JUSTHTML", "<b> 情報の非表示</b> （このオプションは記事内で全ての XFセクション の情報を表示せずに単純にHTMLやテキストを表示する物です）");

define("_AM_NOSHOART", "<b> 一覧非表示</b> （このオプションによって、本記事がトップページの一覧に表示されなくなります。かわりにメニューブロックの記事リンクのみに表示されます。）");
define("_AM_INDEXPAGECONFIG", "インデックスページ管理");

// WF -> XF
// 誤字訂正
define("_AM_INDEXPAGECONFIGTXT", "ここで XFセクション のインデックスぺージ部分の変更をすることができます<br /><br />簡単にロゴイメージやヘッダやフッタの文章を変更する事ができます");

// comment
//define("_AM_VISITSUPPORT", 'WFセクションの情報やアップデートや使用方法のヘルプを入手するにはWFセクションのウェブサイトを訪れて下さい<br /> WF-Sections v1 B6 &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-Sections</a>');
define("_AM_VISITSUPPORT", '');

define("_AM_REORDERID", "ID"); 
define("_AM_REORDERPID", "PID"); 
define("_AM_REORDERTITLE", "タイトル");
define("_AM_REORDERDESCRIPT", "説明");
define("_AM_REORDERWEIGHT", "ウェート");
define("_AM_REORDERSUMMARY", "概要");

// copy mode in index.php
define("_AM_COPY_ARTICLE_EXPLANE","元の記事を残してコピーする。添付ファイルはコピーされない。");

// multi language in reorder.php
define("_AM_CATEGORY_REORDERED","カテゴリは並び替えされました");
define("_AM_ARTICLE_REORDERED","記事は並び替えされました");
define("_AM_CATEGORY_REORDER_RETURN","カテゴリの並び替えへ戻る");

// *** add menu: bulk import ***
define("_AM_IMPORT", "HTMLファイルの一括登録");
define("_AM_IMPORT_DIRNAME", "ディレクトリ名 あるいは ファイル名");
define("_AM_IMPORT_HTMLPROC", "HTMLファイルの処理");
define("_AM_IMPORT_EXTFILTER", "外部フィルタ・プログラム名");
define("_AM_IMPORT_CHARCONV", "文字コードの変換");
define("_AM_IMPORT_CHARNON", "変換しない");
define("_AM_IMPORT_CHARAUTO", "文字コードを自動認識し、SJISであれば、EUC-JPに変換する");
define("_AM_IMPORT_CHARFORCE", "文字コードをSJISとみなし、EUC-JPに変換する");
define("_AM_IMPORT_BODY", "body部 のみ切出す");
define("_AM_IMPORT_INDEXHTML", "同じか１つ上のディレクトリの index.html へのリンクを削除する");
define("_AM_IMPORT_LINK", "リンクをタイトル＝ファイル名に変更する");
define("_AM_IMPORT_IMAGE", "イメージ・ファイルのリンクをイメージ格納先に変更する");
define("_AM_IMPORT_ATMARK", "@ を &amp;#064; に変更する");
define("_AM_IMPORT_TEXTPROC", "テキスト・ファイルの処理");
define("_AM_IMPORT_TEXTPRE", "テキスト・ファイルを &lt;pre&gt; &lt;/pre&gt; で囲む");
define("_AM_IMPORT_IMAGEPROC", "イメージ・ファイルの処理");
define("_AM_IMPORT_IMAGEDIR", "イメージ・ファイルの格納先のディレクトリ名");
define("_AM_IMPORT_IMAGECOPY", "イメージ・ファイルを格納先にコピーする");
define("_AM_IMPORT_TESTMODE", "テスト・モード");
define("_AM_IMPORT_TESTDB", "DBに格納されません。格納するときはチェックをはずしてください。");
define("_AM_IMPORT_TESTEXEC", "テスト実行");
define("_AM_IMPORT_TESTTEXT", "テキストを表示する");
define("_AM_IMPORT_EXPLANE", "ファイルの種類の判定は、拡張子で行います。<br>HTMLファイルの判定は、html,htm のいづれかです。<br>テキスト・ファイルの判定は、txt です。<br>イメージ・ファイルは、gif,jpg,jpeg,png のいづれかです。");
define("_AM_IMPORT_ERRDIREXI", "ディレクトリあるいは ファイルが存在しない");
define("_AM_IMPORT_ERRFILEXI", "フィルタ・プログラムが存在しない");
define("_AM_IMPORT_ERRFILEXEC", "フィルタ・プログラムが実行属性でない");
define("_AM_IMPORT_ERRNOCOPY", "イメージ・ファイルを格納先にコピーする指定がない");
define("_AM_IMPORT_ERRNOIMGDIR", "イメージ・ファイルの格納先のディレクトリ名の指定がない");
define("_AM_IMPORT_ERRIMGDIREXI", "イメージ・ファイルの格納先がディレクトリでない");
define("_AM_IMPORT_ERRFILEEXI", "ファイルが存在しない");

// translated into Japanse by HAL
// based on WF-Section V1.0 english/admin.php 19/06/2003
// http://www.adslnet.org/

// 
?>