<div id="LayoutC">
<div id="Center">

({if $c_friend_list})
({* {{{ manageList *})
<div class="dparts manageList"><div class="parts">
<div class="partsHeading"><h3>({$WORD_MY_FRIEND})管理</h3></div>
<div class="pagerRelative">
({if $pager.prev})<p class="prev"><a href="({t_url m=pc a=page_h_manage_friend page=$pager.prev})">前を表示</a></p>({/if})
({if $pager.total_num})<p class="number">({$pager.start})件～({$pager.end})件を表示</p>({/if})
({if $pager.next})<p class="next"><a href="({t_url m=pc a=page_h_manage_friend page=$pager.next})">次を表示</a></p>({/if})
</div>

<table>
({foreach from=$c_friend_list item=item})
<tr>
<td class="photo"><a href="({t_url m=pc a=page_f_home})&amp;target_c_member_id=({$item.c_member_id})"><img src="({t_img_url filename=$item.image_filename w=76 h=76 noimg=no_image})" alt="" /><br />({$item.nickname})</a></td>
<td>
({if $item.intro})
<p>({$item.intro|t_truncate:48:"":3})</p>
<p><a href="({t_url m=pc a=page_f_intro_edit})&amp;target_c_member_id=({$item.c_member_id})">編集</a> <a href="({t_url m=pc a=page_f_intro_delete_confirm})&amp;target_c_member_id=({$item.c_member_id})&amp;sessid=({$PHPSESSID})">削除</a></p>
({else})
<p><a href="({t_url m=pc a=page_f_intro_edit})&amp;target_c_member_id=({$item.c_member_id})">紹介文を書く</a></p>
({/if})
</td>
<td class="delete"><a href="({t_url m=pc a=page_fh_friend_list_delete_c_friend_confilm})&amp;target_c_member_id=({$item.c_member_id})">({$WORD_MY_FRIEND})から外す</a></td>
</tr>
({/foreach})
</table>

<div class="pagerRelative">
<p class="prev"><a href="./?m=pc&amp;a=page_h_manage_friend&amp;page=1">前を表示</a></p>
<p class="number">21件～40件を表示</p>
<p class="next"><a href="./?m=pc&amp;a=page_h_manage_friend&amp;page=3">次を表示</a></p>
</div>
</div></div>
({* }}} *})

({else})
({* {{{ simpleBox *})
<div class="dparts simpleBox"><div class="parts">
<div class="partsHeading"><h3>({$WORD_MY_FRIEND})管理</h3></div>
<div class="block">
<p>({$WORD_MY_FRIEND})登録がありません。</p>
</div>
</div></div>
({* }}} *})
({/if})

</div><!-- Center -->
</div><!-- LayoutC -->
