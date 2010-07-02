<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {

define( 'MYALBUM_AM_LOADED' , 1 ) ;

define('_MD_A_MYMENU_MYTPLSADMIN','テンプレート管理');
define('_MD_A_MYMENU_MYBLOCKSADMIN','ブロック管理/アクセス権限');
define('_MD_A_MYMENU_MYPREFERENCES','一般設定');

// Index (Categories)
define( "_AM_H3_FMT_CATEGORIES" , "%s カテゴリー管理" ) ;
define( "_AM_CAT_TH_TITLE" , "カテゴリー名" ) ;
define( "_AM_CAT_TH_PHOTOS" , "画像数" ) ;
define( "_AM_CAT_TH_OPERATION" , "カテゴリ操作" ) ;
define( "_AM_CAT_TH_IMAGE" , "イメージ" ) ;
define( "_AM_CAT_TH_PARENT" , "親カテゴリー" ) ;
define( "_AM_CAT_TH_IMGURL" , "イメージのURL" ) ;
define( "_AM_CAT_MENU_NEW" , "カテゴリーの新規作成" ) ;
define( "_AM_CAT_MENU_EDIT" , "カテゴリーの編集" ) ;
define( "_AM_CAT_INSERTED" , "カテゴリーを追加しました" ) ;
define( "_AM_CAT_UPDATED" , "カテゴリーを更新しました" ) ;
define( "_AM_CAT_BTN_BATCH" , "変更を反映する" ) ;
define( "_AM_CAT_LINK_MAKETOPCAT" , "トップカテゴリーを追加" ) ;
define( "_AM_CAT_LINK_ADDPHOTOS" , "このカテゴリーに画像を追加" ) ;
define( "_AM_CAT_LINK_EDIT" , "このカテゴリーの編集" ) ;
define( "_AM_CAT_LINK_MAKESUBCAT" , "このカテゴリー下にサブカテゴリー作成" ) ;
define( "_AM_CAT_FMT_NEEDADMISSION" , "未承認画像あり (%s 枚)" ) ;
define( "_AM_CAT_FMT_CATDELCONFIRM" , "カテゴリー %s を削除してよろしいですか？ 配下のサブカテゴリーも含め、画像やコメントがすべて削除されます" ) ;


// Admission
define( "_AM_H3_FMT_ADMISSION" , "%s 投稿画像の承認" ) ;
define( "_AM_TH_SUBMITTER" , "投稿者" ) ;
define( "_AM_TH_TITLE" , "タイトル" ) ;
define( "_AM_TH_DESCRIPTION" , "説明文" ) ;
define( "_AM_TH_CATEGORIES" , "カテゴリー" ) ;
define( "_AM_TH_DATE" , "最終更新日" ) ;


// Photo Manager
define( "_AM_H3_FMT_PHOTOMANAGER" , "%s 画像管理" ) ;
define( "_AM_TH_BATCHUPDATE" , "チェックした画像をまとめて変更する" ) ;
define( "_AM_OPT_NOCHANGE" , "変更なし" ) ;
define( "_AM_JS_UPDATECONFIRM" , "指定された項目についてのみ、チェックした画像を変更します" ) ;


// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P 動作チェッカー (%s)" ) ;

define( "_AM_H4_ENVIRONMENT" , "環境チェック" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP設定" ) ;
define( "_AM_MB_BOTHOK" , "両方ok" ) ;
define( "_AM_MB_NEEDON" , "要on" ) ;


define( "_AM_H4_TABLE" , "テーブルチェック" ) ;
define( "_AM_MB_PHOTOSTABLE" , "メイン画像テーブル" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "テキストテーブル" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "カテゴリーテーブル" ) ;
define( "_AM_MB_VOTEDATATABLE" , "投票データテーブル" ) ;
define( "_AM_MB_COMMENTSTABLE" , "コメントテーブル" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "画像総数" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "テキスト総数" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "カテゴリー総数" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "投票総数" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "コメント総数" ) ;


define( "_AM_H4_CONFIG" , "設定チェック" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "画像処理プログラム" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "メイン画像ディレクトリ" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "サムネイルディレクトリ" ) ;
define( "_AM_ERR_LASTCHAR" , "エラー: 最後の文字は'/'でなければなりません" ) ;
define( "_AM_ERR_FIRSTCHAR" , "エラー: 最初の文字は'/'でなければなりません" ) ;
define( "_AM_ERR_PERMISSION" , "エラー: まずこのディレクトリをつくって下さい。その上で、書込可能に設定して下さい。Unixではchmod 777、Windowsでは読み取り専用属性を外します" ) ;
define( "_AM_ERR_NOTDIRECTORY" , "エラー: 指定されたディレクトリがありません." ) ;
define( "_AM_ERR_READORWRITE" , "エラー: 指定されたディレクトリは読み出せないか書き込めないかのいずれかです。その両方を許可する設定にして下さい。Unixではchmod 777、Windowsでは読み取り専用属性を外します" ) ;
define( "_AM_ERR_SAMEDIR" , "エラー: メイン画像用ディレクトリとサムネイル用ディレクトリが一緒です。（その設定は不可能です）" ) ;
define( "_AM_LNK_CHECKGD2" , "GD2(truecolor)モードが動くかどうかのチェック" ) ;
define( "_AM_MB_CHECKGD2" , "（このリンク先が正常に表示されなければ、GD2モードでは動かないものと諦めてください）" ) ;
define( "_AM_MB_GD2SUCCESS" , "成功しました!<br />おそらく、このサーバのPHPでは、GD2(true color)モードで画像を生成可能です。" ) ;


define( "_AM_H4_PHOTOLINK" , "メイン画像とサムネイルのリンクチェック" ) ;
define( "_AM_MB_NOWCHECKING" , "チェック中 ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "メイン画像 (%s) が読めません." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "サムネイル画像 (%s) が読めません." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "画像のないレコードが %s 個ありました。" ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "サムネイルが %s 個未作成です" ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "テンポラリを %s 個削除しました" ) ;
define( "_AM_LINK_REDOTHUMBS" , "サムネイル再構築" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "テーブルメンテナンス" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P 写真メンテナンス (%s)" ) ;

define( "_AM_FMT_CHECKING" , "%s をチェック中 ... " ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "サムネイルの再構築など、写真データの各種メンテナンス" ) ;

define( "_AM_MB_FAILEDREADING" , "写真ファイルの読み込み失敗" ) ;
define( "_AM_MB_CREATEDTHUMBS" , "サムネイル作成完了" ) ;
define( "_AM_MB_BIGTHUMBS" , "サムネイルを作成できないので、コピーしました" ) ;
define( "_AM_MB_SKIPPED" , "スキップします" ) ;
define( "_AM_MB_SIZEREPAIRED" , "(登録されていたピクセル数を修正しました)" ) ;
define( "_AM_MB_RECREMOVED" , "このレコードは削除されました" ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "画像がありません" ) ;
define( "_AM_MB_PHOTORESIZED" , "サイズ調整しました" ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "処理を開始するレコード番号" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "一度に処理する写真数" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "この数を大きくしすぎるとサーバのタイムアウトを招きます" ) ;

define( "_AM_RADIO_FORCEREDO" , "サムネイルがあっても常に作成し直す" ) ;
define( "_AM_RADIO_REMOVEREC" , "写真がないレコードを削除する" ) ;
define( "_AM_RADIO_RESIZE" , "今のピクセル数設定よりも大きな画像はサイズを切りつめる" ) ;

define( "_AM_MB_FINISHED" , "完了" ) ;
define( "_AM_LINK_RESTART" , "再スタート" ) ;
define( "_AM_SUBMIT_NEXT" , "次へ" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P 画像一括登録 (%s)" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "各グループの権限設定" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "グループ個々について、権限を設定します" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "権限設定を変更しました" ) ;


// Import
define( "_AM_H3_FMT_IMPORTTO" , '%s への画像インポート' ) ;
define( "_AM_FMT_IMPORTFROMMYALBUMP" , 'myAblum-Pモジュール: 「%s」 からの取り込み（カテゴリー単位）' ) ;
define( "_AM_FMT_IMPORTFROMIMAGEMANAGER" , 'イメージ・マネージャからの取り込み（カテゴリー単位）' ) ;
define( "_AM_CB_IMPORTRECURSIVELY" , 'サブカテゴリーもインポートする' ) ;
define( "_AM_RADIO_IMPORTCOPY" , '画像のコピー（コメントは引き継がれません）' ) ;
define( "_AM_RADIO_IMPORTMOVE" , '画像の移動（コメントを引き継ぎます）' ) ;
define( "_AM_MB_IMPORTCONFIRM" , 'インポートします。よろしいですか？' ) ;
define( "_AM_FMT_IMPORTSUCCESS" , '%s 枚の画像をインポートしました' ) ;


// Export
define( "_AM_H3_FMT_EXPORTTO" , '%s から他モジュール等への画像エクスポート' ) ;
define( "_AM_FMT_EXPORTTOIMAGEMANAGER" , 'イメージ・マネージャへの書き出し（カテゴリー単位）' ) ;
define( "_AM_FMT_EXPORTIMSRCCAT" , 'コピー元カテゴリー' ) ;
define( "_AM_FMT_EXPORTIMDSTCAT" , 'コピー先カテゴリー' ) ;
define( "_AM_CB_EXPORTRECURSIVELY" , 'サブカテゴリーもエクスポートする' ) ;
define( "_AM_CB_EXPORTTHUMB" , 'サムネイル画像の方をエクスポートする' ) ;
define( "_AM_MB_EXPORTCONFIRM" , 'エクスポートします。よろしいですか？' ) ;
define( "_AM_FMT_EXPORTSUCCESS" , '%s 枚の画像をエクスポートしました' ) ;


}

?>