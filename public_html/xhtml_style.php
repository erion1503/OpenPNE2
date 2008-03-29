<?php
/**
 * @copyright 2005-2008 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

require_once './config.inc.php';
require_once OPENPNE_WEBAPP_DIR . '/init.inc';
require_once 'smarty_plugins/function.t_img_url_skin.php';

$old_colors = util_get_color_config();
$colors = array(
    1 => $old_colors['bg_01'], // (1)線の色
    2 => $old_colors['bg_12'], // (2)ページ背景
    3 => $old_colors['bg_13'], // (3)コンテンツ領域背景
    4 => $old_colors['bg_00'], // (4)枠色
    5 => $old_colors['bg_06'], // (5)コンテンツ見出し背景
    6 => $old_colors['bg_09'], // (6)説明領域背景
    7 => $old_colors['bg_09'], // (7)項目背景
    8 => $old_colors['bg_02'], // (8)ボックスの背景
    9 => $old_colors['bg_10'], // (9)左メニュー枠色
);
function getSkin($name)
{
    $params['filename'] = $name;
    return smarty_function_t_img_url_skin($params, $dummy);
}

header('Content-Type: text/css');
?>
@charset "UTF-8";

/*==============================================================================
 * デフォルトスタイルシートの上書き
 *----------------------------------------------------------------------------*/
body, div, p, pre, blockquote, th, td,
dl, dt, dd, ul, ol, li,
h1, h2, h3, h4, h5, h6,
iframe, object, embed {
	margin: 0;
	padding: 0;
	border: none;
	text-align: left;
}
ul, ol {
	list-style-position: outside;
	list-style-type: none;
}
table {
	border-collapse: separate;
	border-spacing: 0;
	empty-cells: show;
	margin: 0;
	font-size: 1em;
}
* {
	word-break: break-all;
}
*:first-child+html table {
	border-collapse: collapse;
}
* html table {
	border-collapse: collapse;
}
th, td {
	vertical-align: middle;
}
address, cite, caption, th, del, ins,
abbr, acronym, dfn, em, strong,
code, kbd, samp, var {
	border: none;
	font-style: normal;
	font-variant: normal;
	font-weight: normal;
	text-align: left;
	text-decoration: none;
}
img {
	border: none;
	vertical-align: baseline;
}
a img {
	vertical-align: text-bottom;
}
br {
	letter-spacing: 0;
}
h1, h2, h3, h4, h5, h6 {
	font-size: 100%;
	font-weight: normal;
}
q:before, q:after {
	content: "";
}
form, fieldset, input, textarea {
	margin: 0;
}
form, fieldset {
	padding: 0;
}
fieldset {
	border: none;
}
form p {
	margin: 0;
	padding: 0;
}

/*==============================================================================
 * OpenPNE全共通指定
 *----------------------------------------------------------------------------*/
body {
	font: normal normal normal 10pt/1.2 "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "ＭＳ Ｐゴシック", "MS PGothic", Osaka, sans-serif;
}
input,
textarea,
select {
	color: #333333;
	font-size: inherit;
	font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "ＭＳ Ｐゴシック", "MS PGothic", Osaka, sans-serif;
}
a:link {
	color: #026cd1;
}
a:visited {
	color: #004a95;
}
a:hover, a:active {
	color: #76afe6;
}
.input_text,
.input_password,
textarea {
	background-color: #f8f8f8;
}
.input_text,
.input_password,
textarea,
select {
	border: 1px solid #888888;
}
.input_image {
	border: none;
}
p {
	overflow: hidden;
}
strong {
	font-weight: bold;
}
/*----------------------------------------------
 * テーブル
 *--------------------------------------------*/
div.parts table {
	table-layout: fixed;
	width: 100%;
}
div.parts th,
div.parts td {
	overflow: hidden;
	border-width: 1px 0 0 1px;
	border-style: solid;
	border-color: #<?php echo $colors[1]; ?>;
}
div.parts tr th:first-child,
div.parts tr td:first-child {
	border-left-width: 0;
}
/*----------------------------------------------
 * マーカー付きリンク、ボタンリンク
 *--------------------------------------------*/
ul.moreInfo li {
	padding: 2px 0 2px 20px;
	background: url(<?php echo getSkin('icon_arrow_1'); ?>) no-repeat 0 0.4em;
}
ul.moreInfo.button li {
	padding: 0;
	background: none;
}
/*----------------------------------------------
 * サブミットボタン
 *--------------------------------------------*/
.input_submit {
	border: 1px solid #888888;
	background: #dadce6 url(<?php echo getSkin('bg_button'); ?>) repeat-x scroll 50% 0;
	letter-spacing: 0;
}
/*----------------------------------------------
 * ラジオボタン、セレクトボタン
 *--------------------------------------------*/
.input_checkbox,
.input_radio {
	width: 16px;
}
ul.check {
	line-height: 1.4;
}
ul.check .input_radio,
ul.check .input_checkbox {
	margin: 0 4px;
}
/*----------------------------------------------
 * 画像置換指定
 *--------------------------------------------*/
#globalNav a,
#globalNavBefore a,
.localNav a {
	display: block;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 0;
	border: none;
	text-indent: -9999px;
	text-decoration: none;
}
#globalNav a:focus,
#globalNavBefore a:focus,
.localNav a:focus {
	overflow: hidden;
}
/*----------------------------------------------
 * clearfix, overflow: hidden
 *--------------------------------------------*/
div#LayoutA,
div#LayoutB,
div#LayoutC {
	zoom: 1;
	overflow: hidden;
}
/*----------------------------------------------
 * ベースレイアウト
 *--------------------------------------------*/
#Container {
	width: 720px;
}
#LayoutA #Left {
	float: left;
	width: 270px;
	padding: 0 5px;
}
#LayoutA #Center {
	float: right;
	width: 440px;
}
#LayoutB #Left {
	float: left;
	width: 180px;
}
#LayoutB #Center {
	float: right;
	width: 540px;
}
#LayoutC #Center {
	width: 650px;
	margin: 0 auto;
}
/*----------------------------------------------
 * パーツ枠
 *--------------------------------------------*/
div.dparts,
div.dparts div.parts,
div.ditem,
#LayoutA #Left div.parts {
	border: 1px solid #<?php echo $colors[1]; ?>;
}
div.ditem div.item {
	border-width: 0 1px 1px;
	border-style: solid;
	border-color: #<?php echo $colors[1]; ?>;
}
div.dparts {
	margin: 0 auto 10px;
	padding: 7px;
}
div.dparts div.parts {
	margin: 0;
}
div.parts {
	margin: 0 auto 10px;
}
div.ditem {
	padding: 5px 6px;
}
/*----------------------------------------------
 * パーツ見出し
 *--------------------------------------------*/
.partsHeading {
	overflow: hidden;
	padding: 2px 0 2px 36px;
	background: #<?php echo $colors[5]; ?> url(<?php echo getSkin('content_header_1'); ?>) no-repeat 0 0;
	text-align: left;
	font-size: 100%;
}
#LayoutA #Left .partsHeading {
	padding-left: 24px;
	background-image: url(<?php echo getSkin('icon_title_1'); ?>);
}
.partsHeading h3 {
	display: inline;
	font-weight: bold;
}
.partsHeading p {
	display: inline;
	margin-left: 0.5em;
}
/*----------------------------------------------
 * パーツ内上下の部分（1件～20件を表示など）
 *--------------------------------------------*/
div.block,
div.partsInfo,
div.pagerAbsolute,
div.pagerRelative,
div.pagerRelativeMulti,
div.operation {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
div.partsInfo {
	padding: 10px 40px;
}
div.pagerAbsolute {
	padding: 4px;
	text-align: center;
}
div.pagerAbsolute p {
	display: inline;
}
div.pagerRelative,
div.pagerRelativeMulti {
	padding: 4px;
	text-align: right;
}
div.pagerRelative p,
div.pagerRelativeMulti div.pager p {
	display: inline;
	margin-left: 10px;
}
div.pagerRelativeMulti {
	zoom: 1;
	position: relative;
}
div.pagerRelativeMulti div.pager {
	position: absolute;
	top: 1em;
	right: 4px;
}
div.operation {
	padding: 4px;
}
div.operation ul.moreInfo {
	text-align: center;
}
div.operation ul.moreInfo li {
	display: inline;
	background-position: 0 50%;
}
/*----------------------------------------------
 * カレンダー
 *--------------------------------------------*/
table.calendar th {
	text-align: center;
}
table.calendar td {
	text-align: right;
}
th.sun {
	color: #d92c49;
}
th.sat {
	color: #2c65d9;
}

/*==============================================================================
 * 0. h系、f系、c系ナビメニュー（localNav）
 *----------------------------------------------------------------------------*/
#globalNav,
#globalNavBefore {
	zoom: 1;
	position: relative;
	width: 720px;
	height: 96px;
}
#globalNav {
	background: url(<?php echo getSkin('skin_after_header'); ?>) 0 0 no-repeat;
}
#globalNavBefore {
	margin-bottom: 10px;
	background: url(<?php echo getSkin('skin_before_header'); ?>) 0 0 no-repeat;
}
.localNav {
	zoom: 1;
	position: relative;
	width: 720px;
	height: 29px;
}
#globalNav li a:hover, #globalNav li a:active {
	background-image: url(<?php echo getSkin('skin_after_header_2'); ?>);
}
#hLocalNav {
	background: url(<?php echo getSkin('skin_navi_h'); ?>) 0 0 no-repeat;
}
#hLocalNav li a:hover, #hLocalNav li a:active {
	background-image: url(<?php echo getSkin('skin_navi_h_2'); ?>);
}
#fLocalNav {
	background: url(<?php echo getSkin('skin_navi_f'); ?>) 0 0 no-repeat;
}
#fLocalNav li a:hover, #fLocalNav li a:active {
	background-image: url(<?php echo getSkin('skin_navi_f_2'); ?>);
}
#cLocalNav {
	background: url(<?php echo getSkin('skin_navi_c'); ?>) 0 0 no-repeat;
}
#cLocalNav li a:hover, #cLocalNav li a:active {
	background-image: url(<?php echo getSkin('skin_navi_c_2'); ?>);
}
#globalNav h1,
#globalNavBefore h1 {
	position: absolute;
	top: 5px;
	left: 0;
	width: 240px;
	height: 60px;
}
#globalNav li, .localNav li {
	position: absolute;
}

li#globalNav_1,
li#globalNav_2,
li#globalNav_3 {
	top: 70px;
	height: 18px;
}
li#globalNav_4,
li#globalNav_5,
li#globalNav_6,
li#globalNav_7,
li#globalNav_8,
li#globalNav_9 {
	top: 68px;
	height: 20px;
}
li#globalNav_1 { left:   2px; width: 88px; }
li#globalNav_2 { left:  90px; width: 90px; }
li#globalNav_3 { left: 180px; width: 88px; }
li#globalNav_4 { left: 290px; width: 70px; }
li#globalNav_5 { left: 360px; width: 72px; }
li#globalNav_6 { left: 432px; width: 72px; }
li#globalNav_7 { left: 504px; width: 72px; }
li#globalNav_8 { left: 576px; width: 72px; }
li#globalNav_9 { left: 648px; width: 70px; }
li#globalNav_1 a:hover, li#globalNav_1 a:active { background-position:   -2px -70px; }
li#globalNav_2 a:hover, li#globalNav_2 a:active { background-position:  -90px -70px; }
li#globalNav_3 a:hover, li#globalNav_3 a:active { background-position: -180px -70px; }
li#globalNav_4 a:hover, li#globalNav_4 a:active { background-position: -290px -68px; }
li#globalNav_5 a:hover, li#globalNav_5 a:active { background-position: -360px -68px; }
li#globalNav_6 a:hover, li#globalNav_6 a:active { background-position: -432px -68px; }
li#globalNav_7 a:hover, li#globalNav_7 a:active { background-position: -504px -68px; }
li#globalNav_8 a:hover, li#globalNav_8 a:active { background-position: -576px -68px; }
li#globalNav_9 a:hover, li#globalNav_9 a:active { background-position: -648px -68px; }

#hLocalNav li {
	top: 0;
	width: 80px;
	height: 29px;
}
li#hLocalNav_1 { left:   0px; }
li#hLocalNav_2 { left:  80px; }
li#hLocalNav_3 { left: 160px; }
li#hLocalNav_4 { left: 240px; }
li#hLocalNav_5 { left: 320px; }
li#hLocalNav_6 { left: 400px; }
li#hLocalNav_7 { left: 480px; }
li#hLocalNav_8 { left: 560px; }
li#hLocalNav_9 { left: 640px; }
li#hLocalNav_1 a:hover, li#hLocalNav_1 a:active { background-position:   -0px -29px; }
li#hLocalNav_2 a:hover, li#hLocalNav_2 a:active { background-position:  -80px -29px; }
li#hLocalNav_3 a:hover, li#hLocalNav_3 a:active { background-position: -160px -29px; }
li#hLocalNav_4 a:hover, li#hLocalNav_4 a:active { background-position: -240px -29px; }
li#hLocalNav_5 a:hover, li#hLocalNav_5 a:active { background-position: -320px -29px; }
li#hLocalNav_6 a:hover, li#hLocalNav_6 a:active { background-position: -400px -29px; }
li#hLocalNav_7 a:hover, li#hLocalNav_7 a:active { background-position: -480px -29px; }
li#hLocalNav_8 a:hover, li#hLocalNav_8 a:active { background-position: -560px -29px; }
li#hLocalNav_9 a:hover, li#hLocalNav_9 a:active { background-position: -640px -29px; }

#fLocalNav li {
	top: 0;
	width: 80px;
	height: 29px;
}
li#fLocalNav_1 { left:   0px; }
li#fLocalNav_2 { left:  80px; }
li#fLocalNav_3 { left: 160px; }
li#fLocalNav_4 { left: 240px; }
li#fLocalNav_5 { left: 320px; }
li#fLocalNav_6 { left: 400px; }
li#fLocalNav_7 { left: 480px; }
li#fLocalNav_8 { left: 560px; }
li#fLocalNav_9 { left: 640px; }
li#fLocalNav_1 a:hover, li#fLocalNav_1 a:active { background-position:   -0px -29px; }
li#fLocalNav_2 a:hover, li#fLocalNav_2 a:active { background-position:  -80px -29px; }
li#fLocalNav_3 a:hover, li#fLocalNav_3 a:active { background-position: -160px -29px; }
li#fLocalNav_4 a:hover, li#fLocalNav_4 a:active { background-position: -240px -29px; }
li#fLocalNav_5 a:hover, li#fLocalNav_5 a:active { background-position: -320px -29px; }
li#fLocalNav_6 a:hover, li#fLocalNav_6 a:active { background-position: -400px -29px; }
li#fLocalNav_7 a:hover, li#fLocalNav_7 a:active { background-position: -480px -29px; }
li#fLocalNav_8 a:hover, li#fLocalNav_8 a:active { background-position: -560px -29px; }
li#fLocalNav_9 a:hover, li#fLocalNav_9 a:active { background-position: -640px -29px; }

#cLocalNav li {
	top: 0;
	width: 120px;
	height: 29px;
}
li#cLocalNav_1 { left:   0px; }
li#cLocalNav_2 { left: 120px; }
li#cLocalNav_3 { left: 240px; }
li#cLocalNav_4 { left: 360px; }
li#cLocalNav_5 { left: 480px; }
li#cLocalNav_6 { left: 600px; }
li#cLocalNav_1 a:hover, li#cLocalNav_1 a:active { background-position:   -0px -29px; }
li#cLocalNav_2 a:hover, li#cLocalNav_2 a:active { background-position: -120px -29px; }
li#cLocalNav_3 a:hover, li#cLocalNav_3 a:active { background-position: -240px -29px; }
li#cLocalNav_4 a:hover, li#cLocalNav_4 a:active { background-position: -360px -29px; }
li#cLocalNav_5 a:hover, li#cLocalNav_5 a:active { background-position: -480px -29px; }
li#cLocalNav_6 a:hover, li#cLocalNav_6 a:active { background-position: -600px -29px; }

/*==============================================================================
 * 11. homePhotoBox（ホーム写真ボックス）
 *----------------------------------------------------------------------------*/
.homePhotoBox * {
	text-align: center;
}
.homePhotoBox p.friendLink {
	margin-bottom: 3px;
}
.homePhotoBox p.photo {
	margin-top: 7px;
}
.homePhotoBox ul.moreInfo {
	margin: 1px 0;
}
.homePhotoBox ul.moreInfo li {
	padding: 1px 0;
	background: none;
}
.homePhotoBox ul.moreInfo li img {
	vertical-align: bottom;
}
.homePhotoBox p.rank {
	margin-top: 6px;
}
.homePhotoBox p.point {
	margin-top: 2px;
}
.homePhotoBox p.text {
	margin-top: 4px;
}
.homePhotoBox p.loginTime {
	margin-top: 0px;
}

/*==============================================================================
 * 28. homeNineTable（ホーム9面テーブル）
 *----------------------------------------------------------------------------*/
.homeNineTable tr.photo td {
	height: 80px;
	padding: 2px 0;
	text-align: center;
}
.homeNineTable tr.photo td p.crown {
	text-align: center;
}
.homeNineTable tr.text td {
	padding: 2px;
	text-align: center;
}
.homeNineTable div.moreInfo ul.moreInfo {
	width: 11em;
	margin: 6px 0 6px auto;
}

/*==============================================================================
 * 18. searchResultList（検索結果リスト）
 *----------------------------------------------------------------------------*/
.searchResultList .ditem {
	margin: 8px 34px;
}
.searchResultList .item {
	zoom: 1;
	position: relative;
}
.searchResultList td.photo {
	width: 90px;
	padding: 0;
	text-align: center;
}
.searchResultList th, .searchResultList td {
	padding: 5px;
}
.searchResultList th {
	width: 75px;
}
#Body .searchResultList th:first-child {
	border-left-width: 1px;
}
.searchResultList td.operation {
	padding: 0;
	background: url(<?php echo getSkin('bg_border'); ?>) repeat-y 120px 0;
}
.searchResultList span.text {
	position: absolute;
	padding: 2px 0 0 5px;
}
.searchResultList span.moreInfo {
	display: block;
	margin-left: 120px;
	text-align: center;
}
.searchResultList span.moreInfo img {
	vertical-align: middle;
}

/*==============================================================================
 * 30. homeMainTable（ホームメインテーブル）
 *----------------------------------------------------------------------------*/
.homeMainTable .partsHeading {
	zoom: 1;
	position: relative;
}
.homeMainTable .partsHeading p.link {
	position: absolute;
	top: 2px;
	right: 8px;
}
.homeMainTable th {
	width: 83px;
	background-color: #<?php echo $colors[7]; ?>;
}
.homeMainTable th, .homeMainTable td {
	padding: 5px;
}
.homeMainTable dl.articleList {
	line-height: 1.3;
}
.homeMainTable dl.articleList dt {
	clear: both;
	float: left;
	width: 4.3em;
	padding-left: 13px;
	background: url(<?php echo getSkin('icon_1'); ?>) 3px 50% no-repeat scroll;
}
.homeMainTable dl.articleList dd {
	min-height: 1.3em; /* ddが空のとき領域確保 */
	margin-left: 5.3em;
	padding-left: 18px;
	background: url(<?php echo getSkin('articleList_marker'); ?>) 0 4px no-repeat scroll;
}
.homeMainTable div.moreInfo ul.moreInfo {
	width: 10em;
	margin: 0 2px 0 auto;
}
.homeMainTable td.halfway ul.moreInfo {
	width: 12em;
	margin: 0 0 20px auto;
}

/*==============================================================================
 * 34. sideNav（サイドナビ）
 *----------------------------------------------------------------------------*/
.sideNav .item {
	overflow: hidden;
	width: 150px;
	margin: 0 auto 10px;
	border: 8px solid #<?php echo $colors[9]; ?>;
}
.sideNav .partsHeading {
	border-bottom: 1px solid #<?php echo $colors[1]; ?>;
}
.sideNav .pageNav ul {
	margin: 1px;
}
.sideNav .pageNav li {
	padding: 4px 0 4px 18px;
	background: url(<?php echo getSkin('icon_1'); ?>) 8px 50% no-repeat scroll;
}
.sideNav .pageNav li.looking {
	background-color: #<?php echo $colors[7]; ?>;
}
.sideNav .calendar .partsHeading {
	padding: 4px 0;
	border: none;
	background: none;
	text-align: center;
}
.sideNav .calendar th {
	background-color: #<?php echo $colors[7]; ?>;
}
.sideNav .calendar td {
	padding: 1px 2px;
}
.sideNav .list {
	padding: 4px 0;
}
.sideNav .list li {
	padding-left: 16px;
	background: no-repeat 6px 4px;
}
.sideNav .monthlyMessage li  { background-image: url(<?php echo getSkin('icon_1'); ?>); }
.sideNav .recentlyDiary li   { background-image: url(<?php echo getSkin('icon_3'); ?>); }
.sideNav .recentlyComment li { background-image: url(<?php echo getSkin('icon_1'); ?>); }
.sideNav .monthlyDiary li    { background-image: url(<?php echo getSkin('icon_2'); ?>); }
.sideNav .listCategory li    { background-image: url(<?php echo getSkin('icon_2'); ?>); }

/*==============================================================================
 * 1. simpleBox（シンプルボックス）
 *----------------------------------------------------------------------------*/
.simpleBox .block {
	padding: 10px 0;
}
.simpleBox .block p {
	text-align: center;
}

/*==============================================================================
 * 31. formTable（入力フォームテーブル）
 *----------------------------------------------------------------------------*/
.formTable .partsHeading {
	zoom: 1;
	position: relative;
}
.formTable strong {
	font-weight: normal;
	color: #ff0000;
}
.formTable p.caution {
	color: #ff0000;
}
.formTable .partsHeading p.link {
	position: absolute;
	top: 2px;
	right: 8px;
}
.formTable div.partsInfo {
	background-color: #<?php echo $colors[6]; ?>;
}
.formTable th, .formTable td {
	padding: 5px;
}
.formTable th {
	width: 140px;
}
#LayoutB #Center .formTable th {
	width: 80px;
}
.formTable table table td {
	padding: 0;
	border: none;
}
.formTable textarea {
	width: 99%;
}
.formTable input.input_text_long {
	width: 99%;
}
.formTable table table td.publicSelector {
	width: 150px;
	text-align: right;
}
.formTable div.checkList ul {
	overflow: hidden;
}
.formTable div.checkList li {
	overflow: hidden;
	float: left;
	width: 27%;
	padding-left: 18px;
	text-indent: -18px;
	line-height: 1.6;
}
.formTable div.operation {
	padding: 10px 0;
}

/*==============================================================================
 * 29. photoTable（写真テーブル）
 *----------------------------------------------------------------------------*/
.photoTable {
	width: 561px;
}
.photoTable tr.photo td {
	height: 90px;
	padding: 8px 0;
	text-align: center;
}
.photoTable tr.photo td p.crown {
	text-align: center;
}
.photoTable tr.text td {
	padding: 5px 2px;
	text-align: center;
}

/*==============================================================================
 * 6. yesNoButtonBox（はい、いいえボタン付きボックス）
 *----------------------------------------------------------------------------*/
.yesNoButtonBox .block {
	padding: 10px 0;
}
.yesNoButtonBox .block p,
.yesNoButtonBox ul.moreInfo.button {
	text-align: center;
}
.yesNoButtonBox ul.moreInfo.button {
	margin-top: 4px;
}
.yesNoButtonBox ul.moreInfo.button li {
	display: inline;
}

/*==============================================================================
 * 3. alertBox（アラートボックス）
 *----------------------------------------------------------------------------*/
.alertBox {
	width: 564px;
}
#Body .alertBox th {
	width: 148px;
	padding: 8px 0;
	border: none;
	text-align: center;
}
#Body .alertBox td {
	padding: 6px;
	border-width: 0 0 0 1px;
	color: #ff0000;
}

/*==============================================================================
 * 17. commentList（コメントリスト）
 *----------------------------------------------------------------------------*/
.commentList dl {
	border-top: 1px solid #<?php echo $colors[1]; ?>; overflow:hidden;
}
.commentList dt {
	float: left;
	width: 70px;
	padding-top: 5px;
	text-align: center;
}
.commentList dd {
	zoom: 1;
	min-height: 5.5em;
	margin-left: 70px;
	border-left: 1px solid #<?php echo $colors[1]; ?>;
}
* html .commentList dd {
	height: 5.5em;
}
#LayoutC .commentList dt {
	width: 110px;
}
#LayoutC .commentList dd {
	margin-left: 110px;
}
.commentList dd div {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.commentList dd div p {
	padding: 4px 3px;
}
.commentList dd div.title {
	zoom: 1;
	position: relative;
	border-top: none;
}
.commentList dd div.title p.heading {
	margin-right: 10.5em;
}
.commentList dd div.title p.public {
	position: absolute;
	top: 0;
	right: 0;
}
.commentList dd ul.photo {
	padding: 5px 5px 0;
}
.commentList dd ul.photo li {
	display: inline;
	margin-left: 6px;
}
.commentList dd div.footer p {
	text-align: right;
}
.commentList div.operation {
	padding: 8px 0;
}

/*==============================================================================
 * 8. diaryDetailBox（日記詳細ボックス）
 *----------------------------------------------------------------------------*/
.diaryDetailBox .partsHeading {
	zoom: 1;
	position: relative;
}
.diaryDetailBox .partsHeading p.public {
	position: absolute;
	right: 3px;
}
.diaryDetailBox dl {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.diaryDetailBox dt {
	float: left;
	width: 70px;
	padding-top: 5px;
	text-align: center;
}
.diaryDetailBox dd {
	zoom: 1;
	min-height: 4.2em;
	margin-left: 70px;
	border-left: 1px solid #<?php echo $colors[1]; ?>;
}
* html .diaryDetailBox dd {
	height: 4.2em;
}
.diaryDetailBox dd div {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.diaryDetailBox dd div p {
	padding: 4px 3px;
}
.diaryDetailBox dd div.title {
	border-top: none;
}
.diaryDetailBox dd ul.photo {
	padding: 5px 5px 0;
}
.diaryDetailBox dd ul.photo li {
	display: inline;
	margin-left: 6px;
}
.diaryDetailBox div.category ul {
	padding: 4px;
	text-align: right;
}
.diaryDetailBox div.category ul li {
	display: inline;
	font-size: 80%;
}

/*==============================================================================
 * 21. recentList（最新書き込みリスト）
 *----------------------------------------------------------------------------*/
.recentList dl {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.recentList dt {
	float: left;
	width: 170px;
	padding: 5px;
	text-align: center;
}
.recentList dd {
	zoom: 1;
	margin-left: 180px;
	padding: 5px;
	border-left: 1px solid #<?php echo $colors[1]; ?>;
}
#LayoutB #Center .recentList dt {
	width: 110px;
}
#LayoutB #Center .recentList dd {
	margin-left: 120px;
}

/*==============================================================================
 * 10. eventDetailBox（イベント詳細ボックス）
 *----------------------------------------------------------------------------*/
.eventDetailBox dl {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.eventDetailBox dt {
	float: left;
	width: 100px;
	padding: 5px;
	text-align: center;
}
.eventDetailBox dd {
	zoom: 1;
	margin-left: 110px;
	border-left: 1px solid #<?php echo $colors[1]; ?>;
}
.eventDetailBox dd ul.photo {
	padding: 5px;
	border-bottom: 1px solid #<?php echo $colors[1]; ?>;
}
.eventDetailBox dd ul.photo li {
	display: inline;
	margin-left: 6px;
}
.eventDetailBox dd table th {
	width: 112px;
	text-align: center;
	border-left: none;
}
.eventDetailBox dd table th,
.eventDetailBox dd table td {
	padding: 5px;
}
.eventDetailBox dd table tr:first-child th,
.eventDetailBox dd table tr:first-child td {
	border-top: none;
}
.eventDetailBox dd table ul.moreInfo {
	margin-top: -1.2em;
	text-align: right;
}
.eventDetailBox dd table ul.moreInfo li {
	display: inline;
	background-position: 0 50%;
}

/*==============================================================================
 * 22. friendIntroList（フレンド紹介文リスト）
 *----------------------------------------------------------------------------*/
.friendIntroList th,
.friendIntroList td {
	padding: 14px;
}
.friendIntroList th {
	width: 120px;
	text-align: center;
}
.friendIntroList div.moreInfo ul.moreInfo {
	width: 10em;
	margin-left: auto;
	padding: 6px 2px;
}

/*==============================================================================
 * 9. topicDetailBox（トピック詳細ボックス）
 *----------------------------------------------------------------------------*/
.topicDetailBox dl {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.topicDetailBox dt {
	float: left;
	width: 100px;
	padding: 5px;
	text-align: center;
}
.topicDetailBox dd {
	zoom: 1;
	margin-left: 110px;
	border-left: 1px solid #<?php echo $colors[1]; ?>;
}
.topicDetailBox dd div {
	border-top: 1px solid #<?php echo $colors[1]; ?>;
}
.topicDetailBox dd div p {
	padding: 5px;
}
.topicDetailBox dd div.title {
	border-top: none;
}
.topicDetailBox dd ul.photo {
	padding: 5px;
}
.topicDetailBox dd ul.photo li {
	display: inline;
	margin-left: 6px;
}
.topicDetailBox dd div.attachFile {
	padding: 16px 5px;
}
.topicDetailBox div.operation {
	padding: 10px 0;
}

/*==============================================================================
 * 26. ashiatoList（あしあとリスト）
 *----------------------------------------------------------------------------*/
.ashiatoList div.partsInfo {
	border-bottom: 1px solid #<?php echo $colors[1]; ?>;
}
.ashiatoList div.item {
	margin: 8px 40px;
	padding: 8px 0;
	border: 1px solid #<?php echo $colors[1]; ?>;
}
.ashiatoList div.item p,
.ashiatoList div.item ul.list {
	padding-left: 160px;
}
.ashiatoList div.item p strong {
	margin: 0 2px;
}
.ashiatoList div.item ul.list {
	overflow: hidden;
	margin-top: 16px;
}

/*==============================================================================
 * 15. linkLine（リンクライン）
 *----------------------------------------------------------------------------*/
.linkLine ul.moreInfo {
	text-align: center;
}
.linkLine ul.moreInfo li {
	display: inline;
	background-position: 0 50%;
}

/*==============================================================================
 * 14. searchFormLine（検索フォームライン）
 *----------------------------------------------------------------------------*/
.searchFormLine ul {
	text-align: center;
	padding: 1px 0;
}
.searchFormLine ul li {
	display: inline;
}
.searchFormLine ul li * {
	vertical-align: middle;
}
.searchFormLine ul li label {
	margin-right: 2px;
	padding: 1px 13px 0 0;
	background: url(<?php echo getSkin('icon_arrow_2'); ?>) no-repeat 100% 0;
}

/*==============================================================================
 * 5. infoButtonBox（ボタン付き案内ボックス）
 *----------------------------------------------------------------------------*/
.infoButtonBox .block {
	padding: 30px 10px;
}
.infoButtonBox p,
.infoButtonBox ul {
	margin-top: 6px;
	text-align: center;
}
.infoButtonBox ul.check li {
	text-align: center;
}
.infoButtonBox ul.check li .input_submit {
	margin-top: 6px;
}
.infoButtonBox ul.moreInfo {
	margin-left: 230px;
}
.infoButtonBox ul.moreInfo.button {
	margin-left: 0;
}
.infoButtonBox ul.moreInfo.button li {
	text-align: center;
}

/*==============================================================================
 * 7. searchFormBox（検索フォームボックス）
 *----------------------------------------------------------------------------*/
.searchFormBox .partsHeading {
	border-bottom: 1px solid #<?php echo $colors[1]; ?>;
}
.searchFormBox .parts {
	zoom: 1;
}
.searchFormBox .item {
	overflow: hidden;
	margin: 10px 40px;
	padding-top: 8px;
	border: 1px solid #<?php echo $colors[1]; ?>;
}
.searchFormBox label,
.searchFormBox span.label {
	margin: 0 4px 0 8px;
	padding: 1px 16px 0 0;
	background: url(<?php echo getSkin('icon_arrow_2'); ?>) no-repeat 100% 0;
}
.searchFormBox .input_submit {
	margin-right: 8px;
}
.searchFormBox p.desc {
	margin: 0 4px 16px 8px;
}
.searchFormBox p.form {
	margin: 0 4px 8px 0;
}
.searchFormBox p.note {
	margin: -4px 4px 8px 8px;
}
.searchFormBox ul.moreInfo {
	margin: 0 4px 8px 150px;
}
.searchFormBox div.block {
	padding: 8px 0;
}
.searchFormBox dl.category {
	zoom: 1;
}
.searchFormBox dl.category dt {
	float: left;
	width: 6em;
}
.searchFormBox dl.category dd {
	zoom: 1;
	margin-left: 6em;
}
.searchFormBox dl.category dd p {
	margin: 0 16px;
}
.searchFormBox dl.categories dt {
	margin-bottom: 4px;
}
.searchFormBox dl.categories dl.category dt {
	margin: 0;
	background: url(<?php echo getSkin('colon'); ?>) no-repeat 100% 50%;
}
.searchFormBox dl.categories dl.category dt span {
	margin-left: 8px;
	font-weight: bold;
}
.searchFormBox dl.categories dl.category dd {
	margin-bottom: 6px;
}
.searchFormBox dl.categories dl.category dd p {
	margin: 0 8px;
}

/*==============================================================================
 * 4. infoBox（案内ボックス）
 *----------------------------------------------------------------------------*/
#Body .infoBox {
	margin: 0 20px 10px;
}
.infoBox .parts {
	zoom: 1;
	overflow: hidden;
	position: relative;
}
.infoBox p {
	overflow: hidden;
	margin-right: 16em;
	padding: 5px;
	border-right: 1px solid #<?php echo $colors[1]; ?>;
	background: #<?php echo $colors[6]; ?>;
}
.infoBox ul.moreInfo {
	position: absolute;
	bottom: 3px;
	right: 0;
	width: 15.5em;
}

/*==============================================================================
 * 12. homeInfoBox（ホームインフォメーションボックス）
 *----------------------------------------------------------------------------*/
#Body .homeInfoBox {
	margin-left: 5px;
	padding-left: 102px;
	border: 1px solid #<?php echo $colors[1]; ?>;
	background: #<?php echo $colors[7]; ?> url(<?php echo getSkin('icon_information'); ?>) no-repeat 5px 50%;
}
.homeInfoBox div.body {
	min-height: 1.2em;
	padding: 5px;
	border-left: 1px solid #<?php echo $colors[1]; ?>;
	background: #<?php echo $colors[8]; ?>;
}

/*==============================================================================
 * 2. descriptionBox（説明ボックス）
 *----------------------------------------------------------------------------*/
#Body .descriptionBox {
	margin: 0 20px 10px;
}
.descriptionBox p {
	margin: 12px;
}

/**=============================================================================
 * 未確認スタイル
 *----------------------------------------------------------------------------*/
/**150 o_regist_prof */
ul.moreInfo.button li form {
	display: inline;
}
ul.moreInfo.button li form .input_submit {
	margin: 0 5px;
}

/**200 ヘッダ、Layout直下でなく#Topボックスで包含 */
#Container {
	position: relative;
}
#Header {
	position: relative;
}
#LayoutA #Top {
	padding-left: 5px;
}

/**498 バナー、フッタ */
#topBanner {
	display: block;
	position: absolute;
	top: 5px;
	left: 247px;
	width: 468px;
	height: 60px;
}
#sideBanner {
	display: block;
	position: absolute;
	top: 0px;
	left: 720px;
}
#Footer {
	position: relative;
	width: 720px;
	height: 21px;
	background: url(<?php echo getSkin('skin_footer'); ?>) 0 0 no-repeat;
}
#Footer p {
	padding-right: 12px;
	line-height: 21px;
	text-align: right;
}

/**1012 フレンド紹介文リスト */
.friendIntroList p.text {
	margin-bottom: 1em;
}

/** 配色設定 */
#Body {
	background: #<?php echo $colors[2]; ?>;
}
#Container {
	background: #<?php echo $colors[3]; ?>;
}
div.dparts {
	background-color: #<?php echo $colors[4]; ?>;
}
div.parts {
	background-color: #<?php echo $colors[8]; ?>;
}
#Body .sideNav {
	background-color: transparent;
}
.sideNav .item {
	background-color: #<?php echo $colors[8]; ?>;
}
#Body .linkLine {
	background-color: transparent;
}
#Body .searchFormLine {
 	background-color: transparent;
}
#Body .buttonLine {
	background-color: transparent;
}

/*==============================================================
 * 32. weeklyCalendarTable（週間カレンダーテーブル）
 *------------------------------------------------------------*/
.weeklyCalendarTable p.scheduleForm {
	margin: 0 auto;
	padding: 6px 5px;
}
.weeklyCalendarTable table td {
	vertical-align: top;
}
.weeklyCalendarTable table.calendar th {
	padding: 5px;
	text-align: left;
}
.weeklyCalendarTable table.calendar td {
	padding: 5px;
	border-top: none;
	text-align: left;
}
.weeklyCalendarTable table.calendar th.now,
.weeklyCalendarTable table.calendar td.now {
	background: #<?php echo $colors[7]; ?>;
}
.weeklyCalendarTable span.holiday {
	color: #d92c49;
}
.weeklyCalendarTable div.moreInfo ul.moreInfo {
	width: 11em;
	margin: 6px 0 6px auto;
}

/*==============================================================
 * 36. buttonLine（ボタンライン）
 *------------------------------------------------------------*/
.buttonLine {
	text-align: center;
}

/*==============================================================================
 * 
 *----------------------------------------------------------------------------*/

/*==============================================================================
 * 
 *----------------------------------------------------------------------------*/
