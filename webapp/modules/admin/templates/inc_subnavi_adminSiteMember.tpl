<div class="subNavi">
({if $auth_type == 'all'})
<a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('list_c_member')})" title="メンバー管理: ユーザ登録情報閲覧、メッセージ送信、強制退会">メンバー管理</a>&nbsp;|&nbsp;
({/if})
({if $auth_type == 'all' || $auth_type == ''})
<a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('send_invites')})" title="SNS招待メール送信: 複数のメールアドレス宛に招待メールを送信">招待メール送信</a>&nbsp;|&nbsp;
({/if})
<a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('csv_download')})" title="メンバー情報CSV形式でダウンロードします。">CSVダウンロード</a>&nbsp;|&nbsp;
<a href="?m=({$module_name})&amp;a=page_({$hash_tbl->hash('import_c_member')})" title="CSV形式のメンバー情報データをインポートします。">CSVインポート</a>
</div>
