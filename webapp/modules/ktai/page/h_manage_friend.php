<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

class ktai_page_h_manage_friend extends OpenPNE_Action
{
    function execute($requests)
    {
        $u  = $GLOBALS['KTAI_C_MEMBER_ID'];

        // --- リクエスト変数
        $page = $requests['page'];
        // ----------

        // 1ペ�Eジ当たりに表示するフレンド�E数
        $page_size = 5;
        //自刁E�E友達リスチE
        $list = k_p_fh_friend_list_friend_list4c_member_id($u, $page_size, $page);

        $this->set("friend_list", $list[0]);
        $this->set("page", $page);
        $this->set("is_prev", $list[1]);
        $this->set("is_next", $list[2]);
        return 'success';
    }
}

?>
