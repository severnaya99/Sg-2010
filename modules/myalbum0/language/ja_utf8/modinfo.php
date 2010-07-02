<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","マイアルバム");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","検索・投稿・ランクその他の機能を持つ画像セクションを生成");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","最近の画像");
define("_ALBM_BNAME_HITS","人気画像");
define("_ALBM_BNAME_RANDOM","ピックアップ画像");
define("_ALBM_BNAME_RECENT_P","最近の画像(画像付)");
define("_ALBM_BNAME_HITS_P","人気画像(画像付)");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "画像ファイルの保存先ディレクトリ" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "XOOPSインストール先からのパスを指定（最初の'/'は必要、最後の'/'は不要）<br />Unixではこのディレクトリへの書込属性をONにして下さい" ) ;
define( "_ALBM_CFG_THUMBSPATH" , "サムネイルファイルの保存先ディレクトリ" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "「画像ファイルの保存先ディレクトリ」と同じです" ) ;
// define( "_ALBM_CFG_USEIMAGICK" , "画像処理にImageMagickを使う" ) ;
// define( "_ALBM_CFG_DESCIMAGICK" , "使わない場合は、メイン画像の調整は機能せず、サムネイルの生成にGDを使います。<br />可能であればImageMagickの使用が最善です" ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "画像処理を行わせるパッケージ選択" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "ほとんどのPHP環境で標準的に利用可能なのはGDですが機能的に劣ります<br />可能であればImageMagickかNetPBMの使用をお勧めします" ) ;
define( "_ALBM_CFG_FORCEGD2" , "強制GD2モード" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "強制的にGD2モードで動作させます<br />一部のPHPでは強制GD2モードでサムネイル作成に失敗します<br />画像処理パッケージとしてGDを選択した時のみ意味を持ちます" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "ImageMagickの実行パス" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "convertの存在するディレクトリをフルパスで指定しますが、空白でうまく行くことが多いでしょう。<br />画像処理パッケージとしてImageMagickを選択した時のみ意味を持ちます" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "NetPBMの実行パス" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "pnmscale等の存在するディレクトリをフルパスで指定しますが、空白でうまく行くことが多いでしょう。<br />画像処理パッケージとしてNetPBMを選択した時のみ意味を持ちます" ) ;
define( "_ALBM_CFG_POPULAR" , "'POP'アイコンがつくために必要なヒット数" ) ;
define( "_ALBM_CFG_NEWDAYS" , "'new'や'update'アイコンが表示される日数" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "トップページで新規画像として表示する数" ) ;
define( "_ALBM_CFG_DEFAULTORDER" , "カテゴリ表示でのデフォルト表示順" ) ;
define( "_ALBM_CFG_PERPAGE" , "1ページに表示される画像数" ) ;
define( "_ALBM_CFG_DESCPERPAGE" , "選択可能な数字を | で区切って下さい<br />例: 10|20|50|100" ) ;
define( "_ALBM_CFG_ALLOWNOIMAGE" , "画像のない投稿を許可する" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "サムネイルを作成する" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "「生成しない」から「生成する」に変更した時には、「サムネイルの再構築」が必要です。" ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "サムネイル画像の幅" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "生成されるサムネイル画像の高さは、幅から自動計算されます" ) ;
define( "_ALBM_CFG_THUMBSIZE" , "サムネイル画像サイズ(pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "サムネイル生成法則" ) ;
define( "_ALBM_CFG_WIDTH" , "最大画像幅" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "画像アップロード時に自動調整されるメイン画像の最大幅。<br />GDモードでTrueColorを扱えない時には単なるサイズ制限" ) ;
define( "_ALBM_CFG_HEIGHT" , "最大画像高" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "最大幅と同じ意味です" ) ;
define( "_ALBM_CFG_FSIZE" , "最大ファイルサイズ" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "アップロード時のファイルサイズ制限(byte)" ) ;
define( "_ALBM_CFG_MIDDLEPIXEL" , "シングルビューでの最大画像サイズ" ) ;
define( "_ALBM_CFG_DESCMIDDLEPIXEL" , "幅x高さ で指定します。<br />（例 480x480）" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "写真を投稿した時にカウントアップされる投稿数" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "常識的には0か1です。負の値は0と見なされます" ) ;
define( "_ALBM_CFG_CATONSUBMENU" , "サブメニューへのトップカテゴリーの登録" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "投稿者名の表示" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "ログイン名かハンドル名か選択して下さい" ) ;define( "_ALBM_CFG_VIEWCATTYPE" , "一覧表示の表示タイプ" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "テーブル表示時のカラム数" ) ;
define( "_ALBM_CFG_ALLOWEDEXTS" , "アップロード許可するファイル拡張子" ) ;
define( "_ALBM_CFG_DESCALLOWEDEXTS" , "ファイルの拡張子を、jpg|jpeg|gif|png のように、'|' で区切って入力して下さい。<br />すべて小文字で指定し、ピリオドや空白は入れないで下さい。<br />意味の判っている方以外は、phpやphtmlなどを追加しないで下さい" ) ;
define( "_ALBM_CFG_ALLOWEDMIME" , "アップロード許可するMIMEタイプ" ) ;
define( "_ALBM_CFG_DESCALLOWEDMIME" , "MIMEタイプを、image/gif|image/jpeg|image/png のように、'|' で区切って入力して下さい。<br />MIMEタイプによるチェックを行わない時には、ここを空欄にします" ) ;
define( "_ALBM_CFG_USESITEIMG" , "イメージマネージャ統合での[siteimg]タグ" ) ;
define( "_ALBM_CFG_DESCUSESITEIMG" , "イメージマネージャ統合で、[img]タグの代わりに[siteimg]タグを挿入するようになります。<br />利用モジュール側で[siteimg]タグが有効に機能するようになっている必要があります" ) ;

define( "_ALBM_OPT_USENAME" , "ハンドル名" ) ;
define( "_ALBM_OPT_USEUNAME" , "ログイン名" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "指定数値を幅として、高さを自動計算" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "指定数値を高さとして、幅を自動計算" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "幅か高さの大きい方が指定数値になるよう自動計算" ) ;

define( "_ALBM_OPT_VIEWLIST" , "説明文付リスト表示" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "テーブル表示" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","投稿");
define("_ALBM_TEXT_SMNAME2","高人気");
define("_ALBM_TEXT_SMNAME3","トップランク");
define("_ALBM_TEXT_SMNAME4","自分の投稿");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","投稿された画像の承認");
define("_ALBM_MYALBUM_ADMENU1","画像管理");
define("_ALBM_MYALBUM_ADMENU2","カテゴリ管理");
define("_ALBM_MYALBUM_ADMENU_GPERM","各グループの権限");
define("_ALBM_MYALBUM_ADMENU3","動作チェッカー");
define("_ALBM_MYALBUM_ADMENU4","画像一括登録");
define("_ALBM_MYALBUM_ADMENU5","サムネイルの再構築");
define("_ALBM_MYALBUM_ADMENU_IMPORT","画像インポート");
define("_ALBM_MYALBUM_ADMENU_EXPORT","画像エクスポート");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","ブロック・アクセス権限");
define("_ALBM_MYALBUM_ADMENU_MYTPLSADMIN","テンプレート管理");

// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'モジュール全体');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'myAlbum-Pモジュール全体における通知オプション');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'カテゴリー');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', '選択中のカテゴリーに対する通知オプション');
define('_MI_MYALBUM_PHOTO_NOTIFY', '写真');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', '表示中の写真に対する通知オプション');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', '新規写真登録');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', '新規に写真が登録された時に通知する');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', '新規に写真が登録された時に通知する');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: 新たに写真が登録されました');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'カテゴリ毎の新写真登録');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'このカテゴリに新たに写真が登録された時に通知する');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'このカテゴリに新たに写真が登録された時に通知する');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: 新たに写真が登録されました');

}

?>