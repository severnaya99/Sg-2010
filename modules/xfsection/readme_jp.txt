$Id: readme_jp.txt,v 1.11 2006/06/21 17:24:32 ohwada Exp $

=================================================
Version: 1.12
Date:    2006-06-21
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.jp/
Email:   webmaster@ohwada.jp
=================================================

本モジュールは、wfsection 1.01 を変更したものです。
上位互換性があります

2005年11月に、WF-Project は解散しました。
wfsection は配布が中止されました。

今回のバージョンをもって、XFsection の開発を終了します。
以降は、重要なバグへの保守管理だけになります。
PHP5 への対応なども行いません。

SmartSection など 新しい実装によるセクション・モジュールの利用をお勧めします。

● 変更内容
１．バグ・フィックス
(1) 8207: カテゴリの編集が出来ない
http://sourceforge.jp/tracker/index.php?func=detail&aid=8207&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?viewmode=flat&topic_id=435&forum=3

(2) 8243: 表示する記事数が変更できない 
http://sourceforge.jp/tracker/index.php?func=detail&aid=8243&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=439&forum=3

(3) 8482: index.php にてHTML文法エラー 
http://sourceforge.jp/tracker/index.php?func=detail&aid=8482&group_id=1559&atid=5843
http://xoopscube.jp/modules/xhnewbb/viewtopic.php?viewmode=flat&topic_id=2680&forum=2

(4) 8569: 印刷用ページが表示されない
http://sourceforge.jp/tracker/index.php?func=detail&aid=8569&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?viewmode=flat&topic_id=461&forum=3

２．言語パックの追加
- イタリア語

○ 変更したファイル
- index.php
- print.php
- admin/category.php


=================================================
Version: 1.11
Date:    2006-03-20
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.jp/
Email:   webmaster@ohwada.jp
=================================================

本モジュールは、wfsection 1.01 を変更したものです。
上位互換性があります

WF-Project は解散しました。
wfsection は配布が中止されました。

● 変更内容
全てバグフィックスです。
機能追加はありません。

１．セキュリティ 
foreach ($HTTP_GET_VARS as $k => $v) を削除した
http://sourceforge.jp/tracker/index.php?func=detail&aid=8184&group_id=1559&atid=5843

２．PHP5 対応
(1) Fatal error: Cannot re-assign $this in include/functions.php
http://sourceforge.jp/tracker/index.php?func=detail&aid=8185&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=420&forum=3

(2) Fatal error: Cannot redeclare class wfsfiles
https://sourceforge.jp/tracker/index.php?func=detail&aid=8188&group_id=1559&atid=5843
http://xoopscube.jp/modules/xhnewbb/viewtopic.php?topic_id=1006

(3) register_long_arrays = Off 
$HTTP_*_VARS を置換した

３．ページ番号が１つ余計に表示される
http://sourceforge.jp/tracker/index.php?func=detail&aid=8186&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=414&forum=3

４．言語パックの変更
- フランス語

○ 変更したファイル
多くのファイルを変更したため、デグレしているかもしれません
- article.php
- brokenfile.php
- download.php
- index.php
- modify.php
- print.php
- ratefile.php
- submit.php
- topten.php
- xoops_version.php
- admin/allarticles.php
- admin/brokendown.php
- admin/category.php
- admin/config.php
- admin/duplicate.php
- admin/filemanager.php
- admin/index.php
- admin/pathconfig.php
- admin/reorder.php
- admin/sectiontxt.php
- admin/wfsfilesshow.php
- class/uploadfile.php
- class/wfsarticle.php
- class/wfsfiles.php
- include/functions.php
- include/pdedit.php
- include/storyform.inc.php
- include/wysiwygeditor.php


=================================================
Version: 1.10
Date:    2005-11-20
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.jp/
Email:   webmaster@ohwada.jp
=================================================

本モジュールは、wfsection 1.01 を変更したものです。
上位互換性があります
wfsection に関しては、下記をご覧ください。
http://www.wf-projects.com/

● 変更内容
全てバグフィックスです。
機能追加はありません。

１．typo &nbsp
http://sourceforge.jp/tracker/index.php?func=detail&aid=7443&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?viewmode=flat&topic_id=369&forum=3


=================================================
Version: 1.09
Date:    2005-09-10
=================================================

● 変更内容
全てバグフィックスです。
機能追加はありません。

１．Windows環境にて、一括登録が使用できない 
http://linux.ohwada.jp/modules/newbb/viewtopic.php?viewmode=flat&topic_id=306&forum=3


=================================================
Version: 1.08
Date:    2005-06-20
=================================================

● 変更内容
全てバグフィックスです。
機能追加はありません。

１．WYSIWYGエディタにて、テーブル・アイコンが使用できない 
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=55&forum=3

暫定対策として、テーブル・アイコンを削除した。

２．ヘッダ画像のHTMLタグが正しくない
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=75&forum=3

indexmainheader() の使用方法の間違い

３．[pagebreak]のとき、余分な「Page」が表示される。
http://linux2.ohwada.net/modules/newbb/viewtopic.php?topic_id=50&forum=1

スペース記号(& nbsp ;)のtypo

４．投票ページで右ブロックが消える
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=117&forum=3

header.php を２回読み込んでいた

５．オフラインの記事が表示される
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=174&forum=3

記事の表示の可否を調べる新しい関数を作成した

article.php?articleid=xx
print.php?articleid=xx
What's New モジュール

６．記事へのリンクが二重になる
http://jp.xoops.org/modules/newbb/viewtopic.php?topic_id=7854&forum=17

wfsarticle.php の iconLink() と textLink() に不要なリンクが入っている

７．クラス変数の２重定義 wfsarticle.php
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=212&forum=3

PHP4では、問題ないが。
PHP5では fatal error となる。

８．categoryのリンク先が正しくない
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=217&forum=3

文字列の置換が間違っていた

９．mydownloads を使用しないとき、NEWアイコンが表示されない
http://linux2.ohwada.net/modules/newbb/viewtopic.php?topic_id=78&forum=1

必要なアイコンを XFsection 内で持った

１０．Xoops Protector を入れると、カテゴリ作成ができない
http://jp.xoops.org/modules/newbb/viewtopic.php?topic_id=9370&forum=17

POSTされた変数の存在を確認した

１１．複製したモジュールが正しく動作しない
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=123&forum=3

ブロック関連で見落としがあったところを修正した。
What's New モジュールにも対応した。
safe mode でうまくいかない件は、対策していない。

１２．複製したモジュールが削除できない
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=194&forum=3

複製した後でアクセス権限を 777 とした。
モジュールの削除はできるが、個々のファイルの上書きはできない。
上書きするときは、いったんファイルを削除してから、追加する。

● 注意
WFsection 2.01/2.07 と共存する場合は、
下記の変更を行ってください。

wfsection/xoops_version.php
変更前
-----
include_once WFS_ROOT_PATH . "/include/groupaccess.php";
include_once WFS_ROOT_PATH . "/class/wfsarticle.php";
-----

変更後
-----
if ( !function_exists('listgroups') )
{
	include_once WFS_ROOT_PATH . "/include/groupaccess.php";
}
if ( !class_exists('wfstree') )
{
	include_once WFS_ROOT_PATH . "/class/wfsarticle.php";
}
-----

● 不可解な現象
管理者画面の「カテゴリと記事のウェート管理」(reorder.php)にて、
下記の環境では、Apache が落ちる
----
Windows XP SP1
Apache 1.3.33
PHP 5.0.4
----

PHP 4.3.10 では発生せず

● 追加・変更したファイル

○ 追加したファイル
images/newred.gif
images/update.gif
images/pop.gif

○ 変更したファイル
article.php
index.php
download.php
header.php
print.php
ratefile.php
topten.php
admin/category.php
admin/duplicate.php
admin/filemanager.php
admin/index.php
admin/pathconfig.php
blocks/xfs_artmenu.php
blocks/xfs_bigstory.php
blocks/xfs_menu.php
blocks/xfs_new.php
blocks/xfs_newdown.php
blocks/xfs_top.php
blocks/xfs_topics.php
class/wfsarticle.php
class/wfscategory.php
class/wfsfiles.php
class/wfstree.php
include/commentform.inc.php
include/data.inc.php
include/fucntions.php
include/storyform.inc.php
include/wysiwygeditor.php

○ ファイル名を変更したもの
class/xfs_wfstree.php       -> xfblock_wfstree.php
include/xfs_groupaccess.php -> xfblock_groupaccess.php

*** 貢献した人に感謝 ***
バグ報告をしてくれた人
修正をコードを書いてくれた人


=================================================
Version: 1.07
Date:    2004/07/14
=================================================

変更内容
１．WFsection 2.01 対応
XFsection は WFsection から変更を最小に抑えています。
関数名や定数名などを変更せず使っています。
WFsection が 2.01 にバージョンアップしたことで、
不整合を起こすようになりました。

１．１ ブロック機能
WF と XF が それぞれの groupaccess.php や wfstree.php を読み出しているため、
関数名が衝突していた。
ファイル名と関数名を変更することで 対策した。

１．２ 言語パックの変更
メニュー名が変更になっているので、WFS -> XFS とした

追加したファイル：
include/xfs_functions.php
class/xfs_wfstree.php

変更したファイル：
admin/menu.php
blocks/xfs_artmenu.php
blocks/xfs_bigstory.php
blocks/xfs_menu.php
blocks/xfs_newdown.php
blocks/xfs_new.php
blocks/xfs_topics.php
blocks/xfs_top.php
language/english/modinfo.php
language/english/blocks.php
language/japanese/modinfo.php
language/japanese/blocks.php

２．言語パックの追加
- フランス語

３．バグ・フィックス
３．１ WFsection からのもの
admin/category.php
  カテゴリ管理で カテゴリ画像が表示されない

admin/sectiontxt.php
  インデックス管理で アポストロフィ文字 ' が表示されない


*** 貢献した人に感謝 ***
http://interagir.ch : french lang pack


=================================================
Version: 1.06-2
Date:    2004/04/22
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.net/
Email:   linux@ohwada.net
=================================================
パッチ
(1) class/base_language.php
英語モードにて、ダウンロードできない
convert_download_filename 追加

(2) topten.php
表示行数を元に戻す 20 -> 10

(3) article.php
tel a frined : index.php -> article.php


=================================================
Version: 1.06-1
Date:    2004/04/04
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.net/
Email:   linux@ohwada.net
=================================================
パッチ
(1) language/japanese/admin.php
_AM_PREFERENCE がない

(2) admin/allartilces.php の63行目
削除を忘れた
$scount = count(WfsArticle::getAllArticle($wfsConfig['lastart'], 0, 0, $dataselect));

(3) include/functions.php
indexmainheader のpタグとdivタグの対応が正しくない

(4) class/wfstree.php
getNicePathFromId： & -> &amp;


=================================================
Version: 1.06
Date:    2004/04/02
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.net/
Email:   linux@ohwada.net
=================================================

本モジュールは、wfsection を変更したものです。
上位互換性があります
wfsection に関しては、下記をご覧ください。
http://wfsections.xoops2.com/modules/news/

変更内容
１．ユーザがファイルをアップロードできるようにした
１．１ 設定
conf.php で権限とファイルサイズを設定する

１．２ 関連して
(1) チェック結果にエラーコードを追加した
(2) MIMEタイプのチェックを行わないモードを追加した
(3) MIMEタイプの追加：excle, powerpoint

１．３ 言語ファイルへの追加
24単語（多いので省略）

変更したファイル：
conf.php
submit.php
modify.php
include/functions.php
include/storyform.inc.php
class/uploadfile.php
class/wfsarticle.php
class/mimetype.php
admin/index.php
admin/config.php
sql/xfsection.sql
language/english/main.php
language/japanese/main.php

２．記事のコピーを追加した
元の記事を残してコピーする。
添付ファイルはコピーされない。

言語ファイルへの追加
  _AM_COPY_ARTICLE_EXPLANE

変更したファイル：
admin/index.php
class/wfsarticle.php
language/english/admin.php
language/japanese/admin.php

３．性能改善
３．１ 記事一覧にて、レコード数が多くなると、タイムアウトする現象を改善した

変更したファイル：
admin/allartilces.php

４．モジュールの複製
フォームから新しいモジュール名などを指定できるようにした

変更したファイル：
admin/depulicate.php (rename.php より改名)

５．複数言語への対応
５．１ 言語ファイルへの追加
  _WFS_REPORT_BREOKEN_DOWNLOAD
  _AM_CATEGORY_REORDERED
  _AM_ARTICLE_REORDERED
  _AM_CATEGORY_REORDER_RETURN

５．２ 言語ファイルの追加
・ポーランド語
・スペイン語（更新）

変更したファイル：
article.php
admin/wfsfilesshow.php
admin/reorder.php
language/english/main.php
language/english/admin.php
language/japanese/main.php
language/japanese/admin.php

６．日本語環境への対応
(1) 複数言語対応のクラスを新設した
(2) 「友達に教える」でクラスを使用した
(3) ダウンロード・ファイル名の変換を追加した

追加したファイル：
class/base_language.php
/language/english/convert_language.php
/language/japanese/convert_language.php

変更したファイル：
article.php
download.php
include/functions.php

７．バグ・フィックス
７．１ WFsection からのもの
article.php
  ファイルの説明が表示されない
  http://www.xoops.org/modules/newbb/viewtopic.php?topic_id=17181&forum=4

class/wfsarticle.php
  プレビューで次の設定値が引き継がれない
      autoexpdat, autodate, movetotop, changeuser
  NOWSETTIME と NOWSETEXPTIME が正しくない
  不要な $num がある

class/wfsfiles.php
  フルパス名が設定されないため、ワーニングが出る

class/uploadfile.php
  maxFilesize が変更できない


*** 貢献した人に感謝 ***
http://kompozytor.net : polish lang pack
dacevedo : spanish lang pack


=================================================
Version: 1.05
Date:    2004/02/28
=================================================

変更内容
１．管理画面
１．１ 管理者メニュー
(1) 管理者メニューの項目を、ポップアップメニューと同じにした
    古いMACだと、ポップアップメニューが正しく表示しないようです。

(2) 全ての管理画面で管理者メニューを表示した

(3) 上段に管理者メニューを表示しないモードを追加した

(4) 記事管理で2ページ目以降は表示しないようにした

１．２ 記事管理メニュー
(1) 記事管理メニューに記事の数を表示した
    提出済で承認待ちの記事があれば、赤字で表示する

(2) 管理者メニューの項目とタイトルを同じにした

(3) 記事管理で2ページ目以降は表示しないようにした

１．３ 記事の並び順の維持
下段で選択した記事の並び順を、２ページ目以降でも維持する

１．４ 言語ファイルへの追加
 _AM_PATH_MANAGEMENT: パス管理
 _AM_LIST_BROKEN: 破損ファイル一覧

変更したファイル：
conf.php
admin/index.php
admin/allartilces.php
admin/section.txt
admin/pathconfig.php
admin/brokendown.php
admin/reorder.php
admin/config.php
admin/filemanager.php
admin/wfsfileshow.php
admin/category.php
admin/import.php
include/functions.php
class/wfsarticle.php
language/english/admin.php
language/japanese/admin.php

２．印刷画面
２．１ 表示と同じくアクセス権限をチェックする
２．２ 日付を作成日（created）から、記事の表示と同じく発行日（published）にする
２．３ 画像を logo.gif 固定から、インデックスページ管理で設定した画像にする

変更したファイル：
print.php

３．記事の投稿を禁止するモードを追加する

変更したファイル：
submit.php
conf.php

４．複数言語への対応
４．１ 非マルチバイト環境用に、マルチバイトのダミー関数を用意した

４．２ 言語ファイルへの追加
 _WFS_ERROR_IMAGE: Please check path/file for image
 _AM_DUPLICATE_ARTICLES: Also copy articles

４．３ 言語ファイルの追加
・スペイン語
・中国語

追加したファイル：
include/mb_dummy.php
language/tchinese/
language/spanish/

変更したファイル：
index.php 
article.php
wiki/init.php
admin/import.php
language/english/main.php
language/english/admin.php 
language/japanese/main.php
language/japanes/admin.php 

５．バグ・フィックス
５．１ WFsection からのもの
index.php
  <TD>〜</TD>が閉じていない

include/wysiwygeditor.php
  short_open_tag を使用している

include/groupsaccess.php
  phpスクリプトが閉じていない

admin/reorder.php
  ウェート管理で10件以上の記事が表示されない

admin/category.php
class/wfsarticle.php
  カテゴリの複製のとき、記事が複製されない

class/wfstree.php
  不要なコードがある: $string

class/wfscategory.php
  定数の文法エラー: orders

template/blocks/xfs_block.menu.html
  余分なタグ</li>がある

５．２ XFsection のもの
admin/import.php
  double addslashes when magic_quotes_gpc is off 


*** 貢献した人に感謝 ***
herve: バグ・フィックス、他
cache: 管理画面の改良
dacevedo: spanish lang pack
Conan: chinese lang pack


=================================================
Version: 1.04
Date:    2004/01/25
=================================================

変更内容
１．執筆者が記事を修正する機能を追加した
デフォルトでは、オフとなっているので、
使用する場合は 下記のファイルを変更してください。
33 行目 conf.php

追加したファイル：
modify.php

変更したファイル：
article.php
conf.php
include/storyform.inc.php

２．「HTMLファイルの一括登録」で画像がコピーできないとき、エラーメッセージを出す
変更したファイル：
admin/import.php

３. 「友達に教える」をEUC-JPからSJISを変換する機能を追加した。
日本語固有の文字化け対策です。
これは、メールソフトに依存する現象で、日本語環境ではこれが正しいという解がないようです。 

デフォルトでは、オフとなっているので、
使用する場合は 下記のファイルを変更してください。
37 行目 conf.php

変更したファイル：
article.php
conf.php

４．バグ・フィックス
４．１ WFsection からのもの
submit.php
  プレビュー時にカテゴリが反映されない
  url と urlname が設定できない

index.php
 カテゴリの説明で改行の代わりに </ br> が表示される

topten.php
  発行日前の記事が表示される

admin/sectiontxt.php
  新しい画像を選択すると、画像が消える

４．２ XFsection のもの
なし

４．３ 日本語固有のもの
language/japanes/admin.php 
  誤字訂正


=================================================
Version: 1.03
Date:    2003/11/21
=================================================

変更内容
１．英語版のサポート
変更したファイル：
article.php
language
  - japanese
      - admin.php
      - main.php
  - english
     - admin.php
     - main.php
     - blocks.php
     - modinfo.php

２．PukiWiki の BracketName を組み込んだ
デフォルトでは、オフとなっているので、
使用する場合は 下記のファイルを変更してください。
22 行目 conf.php
35 行目 class/wfsarticle.php 

詳細は wiki_jp.txt を読んでください。
変更したファイル：class/wfsarticle.php

３．既存のHTMLファイルの取込み
(1) Shift_JIS から EUC-JP への変換を追加
変更したファイル：admin/import.php

４．バグ・フィックス
４．１ WFsection からのもの
article.php
  ファイルの説明が表示されない

４．２ XFsection のもの
xoops_version.php
  検索ができない
admin/import.php
  Title に エスケープ文字があると、DB処理がエラーとなる


=================================================
Version: 1.02
Date:    2003/10/11
=================================================

変更内容
１．既存のHTMLファイルの取扱い
１．１ 取込み
import.php を追加した。
指定したデレクトリ以下のファイルを一括してarticleテーブルに取込む。

１．２ 表示・編集
articleテーブルに２つ項目を追加した。
(1) nobr：表示のとき、改行を <br> に変換しない。
(2) enaamp：編集のとき、& を &amp; に変換する

HTMLファイルでは、
タグは「<tag>」のように「<」と「>」で囲います。
「<tag>」を表示するには、「&lt;tag&gt;」と記述します。

これを編集するときに、wfsection では、
「<tag>」に対しては、
「&lt;tag&gt;」と編集枠に出力し、「<tag>」と表示されます。
しかし、「&lt;tag&gt;」に対しても、
「&lt;tag&gt;」と編集枠に出力し、「<tag>」と表示され、
両者は区別できなくなります。

今回は、& を &amp; に変換することで、
「<tag>」に対しては、
「&lt;tag&gt;」と編集枠に出力し、「<tag>」と表示します。
「&lt;tag&gt;」に対しては、
「&amp;lt;tag&amp;gt;」と編集枠に出力し、「&lt;tag&gt;」と表示します。
これで、元のHTMLファイルと同じになります。

２．タイトルでのリンク
「article.php?articleid=1」の他に、
「article.php?title=abc」という指定が可能です。

３．バグ・フィックス
index.php:
  can't jump at Path and local select box
submit.php：
  _WFS_THANKS isn't defined
topten.php：
  Top 10 in Popular isn't displayed
blocks/wfs_topics.php：
  uncomment groupaccess.php
  change xoops_wfs_categoryto to use xoopsDB->prefix

４．モジュール名とテーブル名の変更を手軽にする。
４．１ モジュール名とテーブル名の定義ファイル
修正個所が少なくなるように、
定義ファイル conf.php を追加した。
このファイルを参照するように多くのファイルを修正した。

４．２ 同じモジュールを２つ以上インストールする
blocks ディレクトリ内のファイルは、
include/groupaccess.php
をインクルードしているが、
同じファクション名を複数回インクルードすることがあり、
これが衝突することがある。
簡単な回避策を追加した。
ただし、完璧ではないので、
問題があれば、各自で修正してください。

４．３ ファイル名と内容の変更
ファイル名と内容を変更するコマンド rename.php を追加した。

４．４ モジュール名とテーブル名の変更
wfsection -> xfsection 
wfs_xxx   -> xfs_xxx

=================================================
追加・削除・変更したファイルの一覧
=================================================
１．既存のHTMLファイルの取扱い
２．タイトルでのリンク
３．バグ・フィックス

追加したファイル
readame_jp.txt
rename.php
conf.php
admin/import.php
images/xfs_slogo.gif

削除したファイル
wfsupdate.php

変更したファイル
xoops_version.php
article.php
index.php
submit.php
topten.php
admin/menu.php
blocks/xfs_topics.php（wfs_topics.php）
class/wfsarticle.php
include/functions.php
sql/xfsection.sql（wfsection.sql）
language/japanese/admin.php
language/japanese/main.php
language/japanese/modinfo.php

４．モジュール名とテーブル名の変更を手軽にする。
追加したファイル
rename.php

変更したファイル
brokenfile.php
header.php
ratefile.php
admin/admin_header.php
admin/brokendown.php
admin/config.php
admin/pathconfig.php
admin/reorder.php
admin/sectiontxt.php
admin/wfsfilesshow.php
class/common.php
class/wfscategory.php
class/wfsfiles.php
class/wfstree.php
include/groupaccess.php
include/search.inc.php
blocks/xfs_artmenu.php
blocks/xfs_bigstory.php
blocks/xfs_menu.php
blocks/xfs_newdown.php
blocks/xfs_new.php
blocks/xfs_topics.php
blocks/xfs_top.php
language/japanese/blocks.php

ファイル名だけの変更
templates/xfsection_article.html（xfsection_article.html）
templates/xfsection_htmlart.html（xfsection_htmlart.html）
templates/xfsection_topten.html（wfsection_topten.html）
templates/blocks/xfs_block.artmenu.html（wfs_block.artmenu.html）
templates/blocks/xfs_block_bigstory.html（wfs_block_bigstory.html）
templates/blocks/xfs_block.menu.html（wfs_block.menu.html）
templates/blocks/xfs_block_newdown.html（wfs_block_newdown.html）
templates/blocks/xfs_block_new.html（wfs_block_new.html）
templates/blocks/xfs_block_top.html（wfs_block_top.html）
templates/blocks/xfs_block_topics.html（wfs_block_topics.html）

=================================================
モジュール名とテーブル名の変更方法
=================================================
(1) ディレクトリ名を好きなものに変更する
(2) rename.php を変更する
(3) rename.php を実行する
    その処理内容は下記のとおりです。

下記のファイルの内容を変更する
xoops_version.php
language/japanese/admin.php
language/japanese/modinfo.php

下記のファイル名と内容を変更する
blocks ディレクトリの全てのファイル
templates ディレクトリの全てのファイル
sql/xfsection.sql

下記のファイル名を変更する
images/xfs_slogo.gif

