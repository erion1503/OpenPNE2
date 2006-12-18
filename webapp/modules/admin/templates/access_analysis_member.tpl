({$inc_header|smarty:nodefaults})
({ext_include file="inc_subnavi_adminStatisticalInformation.tpl"})
<div class="tree"><a href="?m=({$module_name})">管理画面TOP</a>&nbsp;＞&nbsp;セキュリティ管理：ページ名ランダム生成</div>
</div>

({*ここまで:navi*})


<h2>({$item_str})<br>
({if $month_flag})({$ymd|date_format:"%Y年%m月"})({else})({$ymd|date_format:"%Y年%m月%d日"})({/if})　
にアクセスしたメンバー
</h2>
<div class="contents">

({if $msg})
<p class="actionMsg">({$msg})</p>
({/if})

[({$page_name})]

<br>

({if $is_prev})
<a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('access_analysis_member')})&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$page_name})&orderby=({$orderby})&direc=-1&page=({$page})">＜前を表示</a> 
({/if})
&nbsp;&nbsp;({$start_num})件～({$end_num})件を表示&nbsp;&nbsp;
({if $is_next})<a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('access_analysis_member')})&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$page_name})&orderby=({$orderby})&direc=1&page=({$page})">次を表示＞</a>({/if})
<br>
<table border="1" cellspacing="0" cellpadding="5">
<th><a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('access_analysis_member')})&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$page_name})&orderby1=({$orderby1})">ID</a></th>
<th>ニックネーム</th>
<th><a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('access_analysis_member')})&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$page_name})&orderby2=({$orderby2})">アクセス数</a></th>

({foreach from=$access_member item=item})
<tr>
<td>({$item.c_member_id})</td>
<td>({$item.nickname})</td>
<td>({$item.count})</td>
</tr>

({/foreach})

<tr>
<td colspan="2">合計</td>
<td>({$sum})</td>
</tr>

</table>

</div>
({$inc_footer|smarty:nodefaults})
