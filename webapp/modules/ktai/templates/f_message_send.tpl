({$inc_ktai_header|smarty:nodefaults})

<table width="100%"><tr><td align="center" bgcolor="#0d6ddf">
<font color="#eeeeee"><a name="top">({$target_c_member.nickname})さん</a></font><br>
</td></tr>
<tr><td bgcolor="#dddddd" align="center">
ﾒｯｾｰｼﾞの送信<br>
</td></tr></table>

<font color=red>({if $msg})({$msg})<br>({/if})</font>

<font color="#999966">宛先：</font><a href="({t_url m=ktai a=page_f_home})&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">({$target_c_member.nickname})</a><br>
({t_form m=ktai a=do_f_message_send_insert_c_message})
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="c_member_id_to" value="({$target_c_member.c_member_id})">
<font color="#999966">件名：</font><br>
<input type="text" name="subject"><br>
<font color="#999966">ﾒｯｾｰｼﾞ：</font><br>
<textarea name="body" rows="6"></textarea>
<center>
<input type="submit" value="ﾒｯｾｰｼﾞを送る">
</center>
</form>

({$inc_ktai_footer|smarty:nodefaults})
