<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 日記を修正
 */
class pc_do_h_diary_edit_insert_c_diary extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        // --- リクエスト変数
        $target_c_diary_id = $requests['target_c_diary_id'];
        $subject = $requests['subject'];
        $body = $requests['body'];
        $public_flag = $requests['public_flag'];
        $tmpfile_1 = $requests['tmpfile_1'];
        $tmpfile_2 = $requests['tmpfile_2'];
        $tmpfile_3 = $requests['tmpfile_3'];
        // ----------

        if (is_null($body) || $body === '') {
            $_REQUEST['msg'] = "本文を入力してください";
            $_REQUEST['subject'] = $subject;
            openpne_forward('pc', 'page', "h_diary_edit");
            exit;
        }

        if (is_null($subject) || $subject === '') {
            $_REQUEST['msg'] = "タイトルを入力してください";
            $_REQUEST['body'] = $body;
            openpne_forward('pc', 'page', "h_diary_edit");
            exit;
        }

        //--- 権限チェック
        //日記作成者

        $c_diary = db_diary_get_c_diary4id($target_c_diary_id);
        if ($c_diary['c_member_id'] != $u) {
            handle_kengen_error();
        }
        //---

        $sessid = session_id();

        $filename_1 = $filename_2 = $filename_3 = '';

        if ($tmpfile_1) {
            image_data_delete($c_diary['image_filename_1']);
            $filename_1 = image_insert_c_image4tmp("d_{$target_c_diary_id}_1", $tmpfile_1);
        }
        if ($tmpfile_2) {
            image_data_delete($c_diary['image_filename_2']);
            $filename_2 = image_insert_c_image4tmp("d_{$target_c_diary_id}_2", $tmpfile_2);
        }
        if ($tmpfile_3) {
            image_data_delete($c_diary['image_filename_3']);
            $filename_3 = image_insert_c_image4tmp("d_{$target_c_diary_id}_3", $tmpfile_3);
        }

        t_image_clear_tmp($sessid);
        db_diary_update_c_diary($target_c_diary_id, $subject, $body, $public_flag, $filename_1, $filename_2, $filename_3);

        $p = array('target_c_diary_id' => $target_c_diary_id);
        openpne_redirect('pc', 'page_fh_diary', $p);
    }
}

?>
