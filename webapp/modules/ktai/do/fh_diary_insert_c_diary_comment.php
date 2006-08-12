<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 日記コメント追加
 */
class ktai_do_fh_diary_insert_c_diary_comment extends OpenPNE_Action
{
    function execute($requests)
    {
        $tail = $GLOBALS['KTAI_URL_TAIL'];
        $u = $GLOBALS['KTAI_C_MEMBER_ID'];

        // --- リクエスト変数
        $target_c_diary_id = $requests['target_c_diary_id'];
        $body = $requests['body'];
        // ----------

        if (is_null($body) || $body === ''){
            $p = array('target_c_diary_id' => $target_c_diary_id, 'msg' => 1);
            openpne_redirect('ktai', 'page_fh_diary', $p);
        }

        //--- 権限チェック

        $c_diary = db_diary_get_c_diary4id($target_c_diary_id);
        $target_c_member_id = $c_diary['c_member_id'];
        $target_c_member = db_common_c_member4c_member_id($target_c_member_id);

        //日記の公開範囲設定
        if ($target_c_member['public_flag_diary'] == "friend" &&
            !db_friend_is_friend($u, $target_c_member_id) && $target_c_member_id != $u) {
            openpne_redirect('ktai', 'page_h_access_block');
        }

        //アクセスブロック設定
        if (p_common_is_access_block($u, $target_c_member_id)) {
            openpne_redirect('ktai', 'page_h_access_block');
        }
        //---

        db_diary_insert_c_diary_comment($u, $target_c_diary_id, $body);
        //日記コメントが書き込まれたので日記自体を未読扱いにする
        db_diary_update_c_diary_is_checked($target_c_diary_id, 0);

        $p = array('target_c_diary_id' => $target_c_diary_id);
        openpne_redirect('ktai', 'page_fh_diary', $p);
    }
}

?>
