({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">日記を書く</font></center>
<hr>
<a href="mailto:({$blog_address})">メールで投稿</a><br>
画像を添付すると写真付き日記になります
<hr>
({if $msg})<font color="red">({$msg})</font><br>({/if})

({t_form m=ktai a=do_h_diary_edit_insert_c_diary})
<input type="hidden" name="ksid" value="({$PHPSESSID})">
({if $target_c_diary.c_diary_id})<input type="hidden" name="target_c_diary_id" value="({$target_c_diary.c_diary_id})">({/if})
ﾀｲﾄﾙ<br>
<input size="14" name="subject" value="({$target_c_diary.subject})"><br>
本文<br>
<textarea name="body" rows="6" cols="14">({$target_c_diary.body})</textarea><br>
<input type="submit" value="送信">
</form>

<hr>
<a href="({t_url m=ktai a=page_fh_diary_list})&amp;({$tail})">日記ﾘｽﾄ</a><br>

({$inc_ktai_footer|smarty:nodefaults})