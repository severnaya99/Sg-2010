<?php
// $Id: main.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/03/27 K.OHWADA
// add submit modify

// 2004/02/26 K.OHWADA
// 並び順の日本語を一部変更

// 2004/01/29 herve & K.OHWADA
// multi language
//   add _WFS_ERROR_IMAGE

// 2003/11/21 K.OHWADA
// article.php
//  _WFS_ARTCLE_MORE

// 2003/09/23 K.OHWADA
// view and edit for pure html file
//   add _WFS_DISBR, _WFS_ENAAMP

//%%%%%%
define("_WFS_PRINTER","印刷用ページ");
define("_WFS_COMMENTS","コメント？");
define("_WFS_PREVPAGE","前のページ");
define("_WFS_NEXTPAGE","次のページ");
//define("_WFS_RETURNTOP","<< Return to Top");

//%%%%%%

define("_WFS_TOP","トップ");
define("_WFS_POSTERC","投稿者:");
define("_WFS_DATEC","日付:");
define("_WFS_EDITNOTALLOWED","このコメントを編集する権限がありません");
define("_WFS_ANONNOTALLOWED","ゲストは投稿できません");
define("_WFS_THANKSFORPOST","投稿ありがとうございました"); //submission of news comments
define("_WFS_DELNOTALLOWED","このコメントを削除する権限がありません");
define("_WFS_AREUSUREDEL","本当にこのコメントと全ての返信を削除しますか？");
define("_WFS_YES","はい");
define("_WFS_NO","いいえ");
define("_PL_COMMENTSDEL","コメントは正常に削除されました");

//%%%%%%

define("_WFS_TITLE","タイトル");
define("_WFS_CATEGORY","カテゴリ");
define("_WFS_HTMLISFINE","HTML使用できますがURLとHTMLタグの両方をチェックして下さい");
define("_WFS_ALLOWEDHTML","許可されたHTML:");
define("_WFS_DISABLESMILEY","顔アイコンの非表示");
define("_WFS_DISABLEHTML","HTMLの非表示");
define("_WFS_POST","送信");
define("_WFS_PREVIEW","プレビュー");
define("_WFS_GO","投稿");

//%%%%%%
define("_WFS_ARTICLES","記事");
define("_WFS_VIEWS","閲覧数: %s"); //********* Updated ************
define("_WFS_DATE","日付: "); //********* Updated ************
define("_WFS_WRITTEN","最終更新日時: "); //********* Updated ************
define("_WFS_PRINTERFRIENDLY","印刷用ページ");

define("_WFS_TOPICC","カテゴリ:");
define("_WFS_URL","URL:");
define("_WFS_NOSTORY","選択された記事は存在しません");
define("_WFS_RETURN2INDEX","カテゴリの一覧に戻る");
define("_WFS_BACK2CAT","カテゴリに戻る");
define("_WFS_BACK2","戻る");
//%%%%%%	File Name print.php 	%%%%%

define("_WFS_URLFORSTORY","本記事のURLは:");

// %s represents your site name
define("_WFS_THISCOMESFROM","本記事は %s に投稿されたものです");

/////// wfsection
define("_WFS_CATEGORYS","カテゴリ");
define("_WFS_POSTS","記事");
define("_WFS_PUBLISHED","最新記事");
define("_WFS_WELCOME","%s カテゴリ");

define("_WFS_ARTICLE","記事");
define("_WFS_AUTHER","執筆者: "); //********* Updated ************
define("_WFS_AUTH","執筆者"); //updated
define("_WFS_CAUTH","<b>執筆者名</b> (空欄にすると元の執筆者名になります)"); //updated
define("_WFS_LASTUPDATE","更新");

// wfsarticle.php

define("_WFS_MAINTEXT","テキスト");
//_WFS_ALLOWEDHTML
define("_WFS_DISAMILEY","顔アイコンの非表示");
define("_WFS_DISHTML","HTMLの非表示");

//_WFS_PREVIEW
define("_WFS_SAVE","保存");
//_WFS_GO

// themenews.php
define("_WFS_POSTEDBY","投稿者：");
define("_WFS_ON","On");
define("_WFS_READS","ヒット");
define("_WFS_FILEUPLOAD","添付ファイルのアップロード");
define("_WFS_FILESHOWNAME","添付ファイルのタイトル");
define("_WFS_ATTACHEDFILES","添付ファイルの編集");
define("_WFS_NOFILE","ファイルがありません");
define("_WFS_AFTERREGED","記事作成時にはファイルを添付できません。記事を作成し保存した後に添付ファイルを追加して下さい");
define("_WFS_FILES","ファイル");
define("_WFS_COMMENTSNUM","コメント");
define("_WFS_CATEGORYDESC","説明");
define("_WFS_CATEGORYHEAD","カテゴリページのヘッダ<br /><br />あなたのカテゴリの上部にHTMLもしくはテキストが表示されます");
define("_WFS_CATEGORYFOOT","カテゴリページのフッタ<br /><br />あなたのカテゴリの下部にHTMLもしくはテキストが表示されます");
define("_WFS_FILEID","ファイルID");
define("_WFS_FILEREALNAME","保存時のファイル名");
define("_WFS_FILETEXT","検索用文字列");
define("_WFS_ARTICLEID","記事ID");
define("_WFS_EXT","拡張子");
define("_WFS_MINETYPE","MINEタイプ");
define("_WFS_UPDATEDATE","最終更新日時");
define("_WFS_DEL","削除");
define("_WFS_CANCEL","キャンセル");
define("_WFS_IMGADD","追加");
define("_WFS_UPLOAD","アップロード");
define("_WFS_LINKURL","リンクするURL");
define("_WFS_LINKURLNAME","上記URLの代替名");
define("_WFS_SUMMARY","概要");
define("_WFS_LINK","リンク");
define("_WFS_NOTREADFILE","ファイルが読めません");
define("_WFS_DOWNLOADNAME","ダウンロード時のファイル名");
define("_WFS_PAGEBREAK","改ページタグ: [pagebreak]");

//new version 0.9.2
define("_WFS_MAININDEX","カテゴリの一覧");
define("_WFS_NOVIEWPERMISSION","このエリアを見る権限がありません");
define("_WFS_WEBLINK","リンク:");
define("_WFS_VOTEAPPRE","投票ありがとうございます");
define("_WFS_THANKYOU","%s への御投票ありがとうございました"); // %s is your site name
define("_WFS_VOTEFROMYOU","自分自身の投票は閲覧者がどのファイルをダウンロードしたら良いか役立ちます");
define("_WFS_VOTEONCE","何回も同じ場所から投票しないで下さい");
define("_WFS_RATINGSCALE","範囲は1〜10で10が最高評価です");
define("_WFS_BEOBJECTIVE","客観的に評価して下さい。全ての人が1もしくは10の評価を見たら評価は意味が無くなってしまいます");
define("_WFS_DONOTVOTE","自分自身に投票しないで下さい");
define("_WFS_RATEIT","評価する");
define("_WFS_DESCRIPTIONC","説明: ");
define("_WFS_EMAILC","Email: ");
define("_WFS_CATEGORYC","カテゴリ: ");
define("_WFS_LASTUPDATEC","最終更新日: ");
define("_WFS_DLNOW","ダウンロードはこちら");
define("_WFS_VERSION","バージョン");
define("_WFS_SUBMITDATE","投稿日付");
define("_WFS_DLTIMES","%s 回ダウンロードされました");
define("_WFS_FILESIZE","ファイルサイズ");
define("_WFS_SUPPORTEDPLAT","利用可能なOS/ソフト等");
define("_WFS_HOMEPAGE","ホームページ");
define("_WFS_HITSC","ヒット: ");
define("_WFS_RATINGC","評価: ");
define("_WFS_ONEVOTE","1 件の投票");
define("_WFS_NUMVOTES","%s 件の投票");
define("_WFS_ONEPOST","1 件の投稿");
define("_WFS_NUMPOSTS","%s 件の投稿");
define("_WFS_COMMENTSC","コメント: ");
define("_WFS_RATETHISFILE","このファイルの評価");
define("_WFS_MODIFY","編集");
define("_WFS_TELLAFRIEND","友達に教える");
define("_WFS_VSCOMMENTS","コメントの閲覧/投稿");
define("_WFS_EDIT","編集");
define("_WFS_SUBMIT","投稿");
define("_WFS_BYTES","バイト");
define("_WFS_ALREADYREPORTED","本件に対するファイル破損の報告はすでになされています");
define("_WFS_MUSTREGFIRST","この動作を実行する権限がありません<br>登録またはログイン後実行して下さい");
define("_WFS_NORATING","この評価はありません");
define("_WFS_CANTVOTEOWN","投稿した場所からの投票は出来ません<br>全ての投票は無視され再評価されます");
define("_WFS_RANK","ランク");
define("_WFS_HITS","ヒット"); //updated
define("_WFS_RATING","評価");
define("_WFS_VOTE","投票");
define("_WFS_TOP10","%s トップ10"); // %s is a review category name
define("_WFS_CATEGORIES","カテゴリ");
define("_WFS_THANKSFORHELP","本ディレクトリの整合性の維持にご協力頂きありがとうございます");
define("_WFS_FORSECURITY","セキュリティ上の理由からあなたのIPアドレスとユーザ名は記録されます");
define("_WFS_NUMBYTES","%s バイト");
define("_WFS_TIMES"," 回");
define("_WFS_DOWNLOADS","ダウンロード ");
define("_WFS_FILETYPE","ファイルタイプ: ");
define("_WFS_GROUPPROMPT","次のグループにアクセスを許可する:");
define("_WFS_REPORTBROKEN","ファイル破損の報告");
define("_WFS_IMGNAME","ファイル名 (ブランク: オリジナルのファイル名と一緒)");
define("_WFS_POSTNEWARTICLE","記事の投稿");
define("_WFS_SMILIE","記事に顔アイコンを追加");
define("_WFS_EXGRAPHIC","外部の画像を記事に追加");
define("_WFS_GRAPHIC","ローカルの画像を記事に追加");
define("_WFS_NOIMG","イメージ無し");
define("_WFS_ARTIMGUPLOAD","イメージのアップロード");
define("_WFS_POPULAR","人気");
define("_WFS_RATEFILE","評価");
define("_WFS_COMMENT","コメント");
define("_WFS_RATED","評価");
define("_WFS_SUBMIT1","投稿");
define("_WFS_VOTES","投票");
define("_WFS_SORTBY1","並び順:");
define("_WFS_TITLE1","タイトル");

//define("_WFS_DATE1","日付");
define("_WFS_DATE1","作成日付");

define("_WFS_ARTICLEID1","記事ID");
define("_WFS_POPULARITY1","人気");
define("_WFS_CURSORTBY1","記事は現在 %s でソートされています");
define("_WFS_RATING1","評価");
define("_WFS_NOTIFYPUBLISH","発行時にEmailで通知を受ける");
define("_WFS_POPULARITYLTOM","人気順 (人気の低いものから)");
define("_WFS_POPULARITYMTOL","人気順 (人気の高いものから)");
define("_WFS_ARTICLEIDLTOM","記事ID順 (昇順)");
define("_WFS_ARTICLEIDMTOL","記事ID順 (降順)");
define("_WFS_TITLEZTOA","タイトル順 (降順)");
define("_WFS_TITLEATOZ","タイトル順 (昇順)");

//define("_WFS_DATEOLD","日付順 (記事日付の古いものから)");
//define("_WFS_DATENEW","日付順 (記事日付の新しいものから)");
define("_WFS_DATEOLD","作成日付順 (作成日付の古いものから)");
define("_WFS_DATENEW","作成日付順 (作成日付の新しいものから)");

define("_WFS_RATINGLTOH","評価順 (低評価から)");
define("_WFS_RATINGHTOL","評価順 (高評価から)");
define("_WFS_SUBMITLTOH","投稿順 (古いものから)");
define("_WFS_SUBMITHTOL","投稿順 (新しいものから)");
define("_WFS_WEIGHT","ウェート");
define("_WFS_NOTITLE","エラー: タイトルがありません。戻って記事のタイトルを入力して下さい");
define("_WFS_NOMAINTEXT","エラー: 本文がありません。戻って記事の本文を入力して下さい");
define("_WFS_RATINGA","評価された記事: %s");
define("_WFS_HTMLPAGE","HTMLファイル</b>(テキストは上書きされます)");
define("_WFS_DBUPDATED","投稿ありがとうございました");
define("_WFS_INTFILEAT","%s に本記事に関する事が書かれています");
define("_WFS_INTFILEFOUND","%s に興味深い記事が見つかりました");
define("_WFS_DESCRIPTION","ファイルの説明");
define("_WFS_ARTICLEADDIT","記事の追加");
define("_WFS_ARTICLELINK","記事のURLのリンク");
define("_WFS_MISCSETTINGS","その他記事設定");
define("_WFS_FILEDESCRIPT","ファイルの説明");
define("_WFS_ATTACHEDFILESTXT","<b>ファイルアップロード</b><br/><br />現在の記事に添付するファイル一覧を表示します。編集リンクをクリックすることで添付ファイルを編集できます。<br /><br />保存済み記事を「編集」した後だけファイルを添付できます。");
define("_WFS_DOWNLOAD","添付ファイルのアップロード");
define("_WFS_PUBLISHEDHOME","発行日付");

//define("_WFS_ARTSIZE","サイズは %s バイト");
define("_WFS_ARTSIZE","サイズは %s");

define("_WFS_DISCLAIMER","<b>免責:</b>本サイトはユーザによって投稿されたコメントに関してあらゆる責任も保証もいたしません");
define("_WFS_ONLYREGISTEREDUSERS","ファイル破損の報告は登録ユーザのみ出来ます");
define("_WFS_THANKSFORINFO","情報ありがとうございます。まもなくあなたのリクエストを調査いたします。");
define("_WFS_FILEPERMISSION","ファイルのアクセス権");
define("_WFS_DOWNLOADED","ダウンロード回数");
define("_WFS_DOWNLOADSIZE","ダウンロード時のファイルサイズ");
define("_WFS_LASTACCESS","最終アクセス日");
define("_WFS_LASTUPDATED","最終更新日");
define("_WFS_ERRORCHECK","ファイルは存在しますか？");
define("_AM_FILEATTACHED","ファイルを記事に添付しますか？");
define("_WFS_NODESCRIPT","ファイルの説明はありません");
define("_WFS_UPLOADED","アップロード: ");
define("_WFS_FILEMIMETYPE","ファイルのMIMEタイプ");

// add disbr, enaamp
define("_WFS_DISBR","改行を br に変換しない");
define("_WFS_ENAAMP","編集時に &amp; を &amp;amp; に変換する");

// article.php
define("_WFS_ARTCLE_MORE","該当するタイトルの記事が複数あります");
define("_WFS_REPORT_BREOKEN_DOWNLOAD","破損したファイルを報告する");

// submit.php
define("_WFS_SUBMIT_FAIL","記事を投稿できません");
define("_WFS_BUT_SUBMIT_SUCCESS","なお、記事は投稿されました");
define("_WFS_SUBMITED_ARTICLE","投稿された記事");
define("_WFS_UPLOAD_END","ファイルをアップロードしました");
define("_WFS_UPLOAD_FAIL","ファイルがアップロードできません");
define("_WFS_UPLOAD_NON","アップロード・ファイルが設定されていない");
define("_WFS_UPLOAD_TOO_BIG","ファイルサイズが大きすぎます。\n最大は %s B です。");
define("_WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE","この種類のファイルはアップロードできません");

// modify.php
define("_WFS_ARTICLE_BACK","元の記事へ戻る");
define("_WFS_MODIFY_TITLE","記事の編集");
define("_WFS_MODIFY_END","記事を編集しました");
define("_WFS_MODIFY_FAIL","記事を編集できません");
define("_WFS_ACTION","アクション");
define("_WFS_DELETE","削除");
define("_WFS_FILE_DOWNLOADNAME","ダウンロード・ファイル名");
define("_WFS_FILE_CHECK","ファイルの確認");
define("_WFS_FILE_NOEXIST","存在しない");
define("_WFS_FILE_NOFILE","通常ファイルでない");
define("_WFS_FILE_MODIFY_END","ファイルを更新しました");
define("_WFS_FILE_DELETE_COMFROM","注意: 本当にこのファイルを削除しますか？");
define("_WFS_FILE_DELETE_END","ファイルを削除しました");
define("_WFS_FILE_DELETE_FAIL","ファイルを削除できません");

// multi language in index.php
define("_WFS_ERROR_IMAGE","エラー： 画像のパスとファイル名を確認して下さい");

// translated into Japanse by HAL
// based on WF-Section V1.0 english/main.php 17/06/2003
// http://www.adslnet.org/
?>
