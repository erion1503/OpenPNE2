({ext_include file="inc_header.tpl"})
({ext_include file="inc_layoutcolumn_top_720px.tpl"})

({***************************})
({**ここから：メインコンテンツ**})
({***************************})
<img src="./skin/dummy.gif" alt="" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******ここから：プロフィール変更****** -->
({t_form m=pc a=do_h_regist_address})
<input type="hidden" name="sessid" value="({$PHPSESSID})">

<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：プロフィール変更＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="({t_img_url_skin filename=content_header_1})" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:458px;padding:2px 0px;" class="bg_06">
<span class="b_b c_00">メールアドレス登録
</td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({capture name="nick"})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:636px;" class="bg_05" align="left" valign="middle">
<div style="padding:10px 30px;">

PC版のご利用にはPCのメールアドレスのご登録が必要となります。<br>
以下のフォームにメールアドレスを入れていただくと確認のメールが送信されますので<br>
それに従いご登録を行ってください。

</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:130px;" class="bg_05" align="left" valign="middle">

<div class="padding_s">

メールアドレス

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:503px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input type="text" class="text" name="pc_address" value="" size="40">

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

メールアドレス(確認)

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

<input type="text" class="text" name="pc_address2" value="" size="40">

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>

({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_03" align="center" valign="middle" colspan="3">

<div class="padding_w_m">

<input type="submit" class="submit" value="　送　信　">

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" alt="" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：プロフィール変更＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" alt="" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
</form>
<!-- ******ここまで：プロフィール変更****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" alt="" class="v_spacer_l">

({***************************})
({**ここまで：メインコンテンツ**})
({***************************})
({ext_include file="inc_layoutcolumn_bottom_270px_165px_175px_720px.tpl"})
({ext_include file="inc_footer.tpl"})
