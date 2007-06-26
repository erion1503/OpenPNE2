<?php
/**
 * @copyright 2005-2007 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * コミュニティ参加リクエスト
 */
class ktai_do_c_join_request_insert_c_commu_member_confirm extends OpenPNE_Action
{
    function handleError($errors)
    {
        if (!empty($errors['target_c_commu_id'])) {

        } elseif (!empty($errors['body'])) {
            $target_c_commu_id = $this->requests['target_c_commu_id'];
            $tail = $GLOBALS['KTAI_URL_TAIL'];
            $p = array('target_c_commu_id' => $target_c_commu_id, 'msg' => 1);
            openpne_redirect('ktai', 'page_c_join_request', $p);
        }
        parent::handleError($errors);
    }

    function execute($requests)
    {
        $tail = $GLOBALS['KTAI_URL_TAIL'];
        $u = $GLOBALS['KTAI_C_MEMBER_ID'];

        // --- リクエスト変数
        $target_c_commu_id = $requests['target_c_commu_id'];
        $body = $requests['body'];
        // ----------

        $c_member_id_from = $u;

        //--- 権限チェック
        //コミュニティメンバーでない and 参加承認中でない

        $status = db_common_commu_status($u, $target_c_commu_id);
        if ($status['is_commu_member'] ||
            $status['is_commu_member_confirm']) {
            handle_kengen_error();
        }
        //---

        db_commu_insert_c_commu_member_confirm($target_c_commu_id, $c_member_id_from, $body);

        //メッセージ
        $c_commu        = db_commu_c_commu4c_commu_id($target_c_commu_id);
        $c_member_id_to = $c_commu['c_member_id_admin'];
        $c_member_from  = db_member_c_member4c_member_id($c_member_id_from);

        $subject ="コミュニティ参加要請メッセージ";
        $body_disp =
            $c_member_from['nickname']." さんから ".$c_commu['name']." コミュニティへの参加希望メッセージが届いています。\n".
            "\n".
            "メッセージ：\n".
            $body."\n".
            "\n".
            "この要請について、承認待ちリストから承認または拒否を選択してください。\n";

        db_message_send_message_syoudaku($c_member_id_from, $c_member_id_to, $subject, $body_disp);

        $p = array('target_c_commu_id' => $target_c_commu_id);
        openpne_redirect('ktai', 'page_c_home', $p);
    }
}

?>
