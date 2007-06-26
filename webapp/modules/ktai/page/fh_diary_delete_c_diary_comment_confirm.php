<?php
/**
 * @copyright 2005-2007 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

class ktai_page_fh_diary_delete_c_diary_comment_confirm extends OpenPNE_Action
{
    function execute($requests)
    {
        $u  = $GLOBALS['KTAI_C_MEMBER_ID'];

        // --- リクエスト変数
        $target_c_diary_id = $requests['target_c_diary_id'];
        $target_c_diary_comment_id = $requests['target_c_diary_comment_id'];
        // ----------

        $this->set("target_c_diary_id", $target_c_diary_id);
        $this->set("target_c_diary_comment_id", $target_c_diary_comment_id);

        return 'success';
    }
}

?>
