<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * コミュ管理者交代承認
 */
class ktai_do_h_confirm_list_update_c_commu_admin_confirm extends OpenPNE_Action
{
    function execute($requests)
    {
        $tail = $GLOBALS['KTAI_URL_TAIL'];
        $u = $GLOBALS['KTAI_C_MEMBER_ID'];

        // --- リクエスト変数
        $target_c_commu_admin_confirm_id = $requests['target_c_commu_admin_confirm_id'];
        // ----------

        //--- 権限チェック
        //コミュ管理交代を受けている

        $admin_confirm = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($target_c_commu_admin_confirm_id);

        if ($admin_confirm['c_member_id_to'] != $u) {
            handle_kengen_error();
        }
        //---

        db_commu_update_c_commu_c_member_id_admin($admin_confirm['c_commu_id'], $u);

        $p = array('msg' => 3);
        openpne_redirect('ktai', 'page_h_confirm_list', $p);
    }
}

?>
