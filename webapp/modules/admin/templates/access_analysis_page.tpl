({$inc_header|smarty:nodefaults})
({ext_include file="inc_subnavi_adminStatisticalInformation.tpl"})
<div class="tree"><a href="?m=({$module_name})">管理画面TOP</a>&nbsp;＞&nbsp;セキュリティ管理：ページ名ランダム生成</div>
</div>

({*ここまで:navi*})

<h2>({$item_str}) ({if $month_flag})({$ymd|date_format:"%Y年%m月分"})({else})({$ymd|date_format:"%Y年%m月%d日分"})({/if})　ページ毎の集計</h2>
<div class="contents">

<table border="1" cellspacing="0" cellpadding="3">
<th><a href="?m=admin&a=page_access_analysis_page&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&orderby1=({$orderby1})">ページ</a></th>
<th><a href="?m=admin&a=page_access_analysis_page&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&orderby2=({$orderby2})">アクセス数</a></th>
<th>アクセスされた<br>メンバー<br>(target_c_member_id)</td>
<th>アクセスされた<br>コミュニティ<br>(target_c_commu_id)</td>
<th>アクセスされた<br>トピック<br>(target_c_topic_id)</td>
<th>アクセスされた<br>日記<br>(target_c_diary_id)</td>
<th>アクセスした<br>メンバー<br>(c_member_id)</td>

({foreach from=$access_analysis_month_page item=item})
<tr>
<td>({$item.page_name})</td>
<td>({$item.count})</td>
({if $item.is_target_c_member_id == 1})
<td><a href="?m=admin&a=page_access_analysis_target_member&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$item.page_name})">詳細</a></td>
({else})
<td><br></td>
({/if})

({if $item.is_target_c_commu_id == 1})
<td><a href="?m=admin&a=page_access_analysis_target_commu&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$item.page_name})">詳細</a></td>
({else})
<td><br></td>
({/if})

({if $item.is_target_c_topic_id == 1})
<td><a href="?m=admin&a=page_access_analysis_target_topic&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$item.page_name})">詳細</a></td>
({else})
<td><br></td>
({/if})

({if $item.is_target_c_diary_id == 1})
<td><a href="?m=admin&a=page_access_analysis_target_diary&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$item.page_name})">詳細</a></td>
({else})
<td><br></td>
({/if})

({if $item.is_c_member_id == 1})
<td><a href="?m=admin&a=page_access_analysis_member&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=({$item.page_name})">詳細</a></td>
</tr>
({else})
<td><br></td>
({/if})
({/foreach})

<tr>
<td>合計</td>
<td>({$sum})</td>
<td><a href="?m=admin&a=page_access_analysis_target_member&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=all">詳細</a></td>
<td><a href="?m=admin&a=page_access_analysis_target_commu&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=all">詳細</a></td>
<td><a href="?m=admin&a=page_access_analysis_target_topic&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=all">詳細</a></td>
<td><a href="?m=admin&a=page_access_analysis_target_diary&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=all">詳細</a></td>
<td><a href="?m=admin&a=page_access_analysis_member&ktai_flag=({$ktai_flag})&ymd=({$ymd})&month_flag=({$month_flag})&page_name=all">詳細</a></td>
</table>

</div>
({$inc_footer|smarty:nodefaults})
