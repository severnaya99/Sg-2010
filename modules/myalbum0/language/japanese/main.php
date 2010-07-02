<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "Y/m/d H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "次へ" ) ;
define( "_ALBM_REDOLOOPDONE" , "終了" ) ;

define( "_ALBM_BTN_SELECTALL" , "全選択" ) ;
define( "_ALBM_BTN_SELECTNONE" , "選択解除" ) ;
define( "_ALBM_BTN_SELECTRVS" , "選択反転" ) ;

define( "_ALBM_FMT_PHOTONUM" , "%s 枚" ) ;

define( "_ALBM_AM_ADMISSION" , "画像の承認" ) ;
define( "_ALBM_AM_ADMITTING" , "画像を承認しました" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "チェックした画像を承認する" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "承認" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "抽出" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "画像の管理" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "%s 番〜 %s 番を表示 (全 %s 枚)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "チェックした画像を削除する" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "削除" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "削除してよろしいですか" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "チェックした画像を移動する" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "移動" ) ;
define( "_ALBM_AM_BUTTON_UPDATE" , "変更" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "メイン画像が存在しません" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "画像回転" ) ;
define( "_ALBM_RADIO_ROTATE0" , "回転しない" ) ;
define( "_ALBM_RADIO_ROTATE90" , "右に90度回転" ) ;
define( "_ALBM_RADIO_ROTATE180" , "180度回転" ) ;
define( "_ALBM_RADIO_ROTATE270" , "左に90度回転" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","%s さんの画像をもっと!");
define("_ALBM_REDOTHUMBS","サムネイルの再構築(<a href='redothumbs.php'>再スタート</a>)");
define("_ALBM_REDOTHUMBS2","サムネイルの再構築");
define("_ALBM_REDOTHUMBSINFO","大きな数値を入力するとサーバータイムアウトの原因になります。");
define("_ALBM_REDOTHUMBSNUMBER","一度に処理するサムネールの数");
define("_ALBM_REDOING","再構築中: ");
define("_ALBM_BACK","戻る");
define("_ALBM_ADDPHOTO","画像を追加");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","サーバにアップロード済ファイルの一括登録");
define("_ALBM_PHOTOUPLOAD","画像アップロード");
define("_ALBM_PHOTOEDITUPLOAD","画像の編集・再アップロード");
define("_ALBM_MAXPIXEL","サイズ上限");
define("_ALBM_MAXSIZE","サイズ上限(byte)");
define("_ALBM_PHOTOTITLE","タイトル");
define("_ALBM_PHOTOPATH","Path:");
define("_ALBM_TEXT_DIRECTORY","ディレクトリ");
define("_ALBM_DESC_PHOTOPATH","画像の含まれるディレクトリを絶対パスで指定して下さい");
define("_ALBM_MES_INVALIDDIRECTORY","指定されたディレクトリから画像を読み出せません");
define("_ALBM_MES_BATCHDONE","%s 枚の画像を登録しました");
define("_ALBM_MES_BATCHNONE","指定されたディレクトリに画像ファイルがみつかりませんでした");
define("_ALBM_PHOTODESC","説明");
define("_ALBM_PHOTOCAT","カテゴリ");
define("_ALBM_SELECTFILE","画像選択");
define("_ALBM_NOIMAGESPECIFIED","画像未選択：アップロードすべき画像ファイルを選択して下さい。");
define("_ALBM_FILEERROR","画像アップロードに失敗：画像ファイルが見つからないか容量制限を越えてます。");
define("_ALBM_FILEREADERROR","画像読込失敗：なんらかの理由でアップロードされた画像ファイルを読み出せません。");

define("_ALBM_BATCHBLANK","タイトル部を空欄にした場合、ファイル名をタイトルとします");
define("_ALBM_DELETEPHOTO","削除?");
define("_ALBM_VALIDPHOTO","承認");
define("_ALBM_PHOTODEL","画像削除?");
define("_ALBM_DELETINGPHOTO","削除中");
define("_ALBM_MOVINGPHOTO","移動中");

define("_ALBM_POSTERC","投稿: ");
define("_ALBM_DATEC","日時: ");
define("_ALBM_EDITNOTALLOWED","コメントを編集する権限がありません！");
define("_ALBM_ANONNOTALLOWED","匿名ユーザは投稿できません。");
define("_ALBM_THANKSFORPOST","ご投稿有り難うございます。");
define("_ALBM_DELNOTALLOWED","コメントを削除する権限がありません!");
define("_ALBM_GOBACK","戻る");
define("_ALBM_AREYOUSURE","このコメントとその下部コメントを削除：よろしいですか？");
define("_ALBM_COMMENTSDEL","コメント削除完了！");

// End New

define("_ALBM_THANKSFORINFO","ご投稿頂いた画像の公開はできるだけ早く検討します。");
define("_ALBM_BACKTOTOP","最初の画像へ戻る");
define("_ALBM_THANKSFORHELP","ご協力有難うございます。");
define("_ALBM_FORSECURITY","セキュリティの観点からあなたのIPアドレスを一時的に保存します。");

define("_ALBM_MATCH","合致");
define("_ALBM_ALL","全て");
define("_ALBM_ANY","どれでも");
define("_ALBM_NAME","名前");
define("_ALBM_DESCRIPTION","説明");

define("_ALBM_MAIN","アルバムトップ");
define("_ALBM_NEW","新着");
define("_ALBM_UPDATED","更新");
define("_ALBM_POPULAR","高ヒット");
define("_ALBM_TOPRATED","高評価");

define("_ALBM_POPULARITYLTOM","ヒット数 (低→高)");
define("_ALBM_POPULARITYMTOL","ヒット数 (高→低)");
define("_ALBM_TITLEATOZ","タイトル (A → Z)");
define("_ALBM_TITLEZTOA","タイトル (Z → A)");
define("_ALBM_DATEOLD","日時 (旧→新)");
define("_ALBM_DATENEW","日時 (新→旧)");
define("_ALBM_RATINGLTOH","評価 (低→高)");
define("_ALBM_RATINGHTOL","評価 (高→低)");
define("_ALBM_LIDASC","レコード番号昇順");
define("_ALBM_LIDDESC","レコード番号降順");

define("_ALBM_NOSHOTS","サムネイルなし");
define("_ALBM_EDITTHISPHOTO","この画像を編集");

define("_ALBM_DESCRIPTIONC","説明");
define("_ALBM_EMAILC","Email");
define("_ALBM_CATEGORYC","カテゴリ");
define("_ALBM_LASTUPDATEC","前回更新");
define("_ALBM_HITSC","ヒット数");
define("_ALBM_RATINGC","評価");
define("_ALBM_ONEVOTE","投票数 1");
define("_ALBM_NUMVOTES","投票数 %s");
define("_ALBM_ONEPOST","コメント数");
define("_ALBM_NUMPOSTS","コメント数 %s");
define("_ALBM_COMMENTSC","コメント数");
define("_ALBM_RATETHISPHOTO","投票する");
define("_ALBM_MODIFY","変更");
define("_ALBM_VSCOMMENTS","コメントを見る/送る");

define("_ALBM_DIRECTCATSEL","カテゴリ選択");
define("_ALBM_THEREARE","データベースにある画像は <b>%s</b> 枚です");
define("_ALBM_LATESTLIST","最新リスト");

define("_ALBM_VOTEAPPRE","投票を受け付けました");
define("_ALBM_THANKURATE","当サイト %s へのご投票、ありがとうございました");
define("_ALBM_VOTEONCE","同一画像への投票は一度だけにお願いします。");
define("_ALBM_RATINGSCALE","評価は 1 から 10 までです： 1 が最低、 10 が最高");
define("_ALBM_BEOBJECTIVE","客観的な評価をお願いします。点数が1か10のみだと順位付けの意味がありません");
define("_ALBM_DONOTVOTE","自分が登録した画像は投票できません。");
define("_ALBM_RATEIT","投票する!");

define("_ALBM_RECEIVED","画像を登録しました。ご投稿有難うございます。");
define("_ALBM_ALLPENDING","すべての投稿画像は確認のため仮登録となります。");

define("_ALBM_RANK","ランク");
define("_ALBM_CATEGORY","カテゴリ");
define("_ALBM_SUBCATEGORY","サブカテゴリ");
define("_ALBM_HITS","ヒット");
define("_ALBM_RATING","評価");
define("_ALBM_VOTE","投票");
define("_ALBM_TOP10","%s のトップ10"); // %s はカテゴリのタイトル

define("_ALBM_SORTBY","並び替え:");
define("_ALBM_TITLE","タイトル");
define("_ALBM_DATE","日時");
define("_ALBM_POPULARITY","ヒット数");
define("_ALBM_CURSORTEDBY","現在の並び順: %s");
define("_ALBM_FOUNDIN","見つかったのはここ:");
define("_ALBM_PREVIOUS","前");
define("_ALBM_NEXT","次");
define("_ALBM_NOMATCH","画像がありません");

define("_ALBM_CATEGORIES","カテゴリ");

define("_ALBM_SUBMIT","投稿");
define("_ALBM_CANCEL","キャンセル");

define("_ALBM_MUSTREGFIRST","申し訳ありませんがアクセス権限がありません。<br>登録するか、ログイン後にお願いします。");
define("_ALBM_MUSTADDCATFIRST","追加するためにはカテゴリが必要です。<br>まずカテゴリを作成して下さい。");
define("_ALBM_NORATING","評価が選択されてません。");
define("_ALBM_CANTVOTEOWN","自分の投稿画像には投票できません。<br>投票には全て目を通します");
define("_ALBM_VOTEONCE2","選択画像への投票は一度だけにお願いします。<br>投票にはすべて目を通します。");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","投稿された画像の承認: 承認待画像数");
define("_ALBM_PHOTOMANAGER","画像管理");
define("_ALBM_CATEDIT","カテゴリの追加・編集");
define("_ALBM_GROUPPERM_GLOBAL","各グループの権限");
define("_ALBM_CHECKCONFIGS","モジュールの状態チェック");
define("_ALBM_BATCHUPLOAD","画像一括登録");
define("_ALBM_GENERALSET","一般設定");

define("_ALBM_SUBMITTER","投稿者");
define("_ALBM_DELETE","削除");
define("_ALBM_NOSUBMITTED","新規の投稿画像はありません。");
define("_ALBM_ADDMAIN","トップカテゴリを追加");
define("_ALBM_IMGURL","画像のURL (画像の高さはあらかじめ50pixelに): ");
define("_ALBM_ADD","追加");
define("_ALBM_ADDSUB","サブカテゴリの追加");
define("_ALBM_IN","");
define("_ALBM_MODCAT","カテゴリ変更");
define("_ALBM_DBUPDATED","データベース更新に成功!");
define("_ALBM_MODREQDELETED","変更要請を削除");
define("_ALBM_IMGURLMAIN","画像URL (画像の高さはあらかじめ50pixelに): ");
define("_ALBM_PARENT","親カテゴリ:");
define("_ALBM_SAVE","変更を保存");
define("_ALBM_CATDELETED","カテゴリの消去完了");
define("_ALBM_CATDEL_WARNING","カテゴリと同時にここに含まれる画像およびコメントが全て削除されますがよろしいですか？");
define("_ALBM_YES","はい");
define("_ALBM_NO","いいえ");
define("_ALBM_NEWCATADDED","新カテゴリ追加に成功!");
define("_ALBM_ERROREXIST","エラー: 提供される画像はすでにデータベースに存在します。");
define("_ALBM_ERRORTITLE","エラー: タイトルが必要です!");
define("_ALBM_ERRORDESC","エラー: 説明が必要です!");
define("_ALBM_WEAPPROVED","画像データベースへのリンク要請を承認しました。");
define("_ALBM_THANKSSUBMIT","ご投稿有り難うございます。");
define("_ALBM_CONFUPDATED","設定を更新しました。");

}

?>
