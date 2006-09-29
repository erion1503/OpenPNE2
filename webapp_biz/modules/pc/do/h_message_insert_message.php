<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * ã¡ãE»ã¼ã¸ãéã
 */
class pc_do_h_message_insert_message extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        // --- ãªã¯ã¨ã¹ãå¤æ°
        $title = $requests['title'];
        $body = $requests['body'];
        $target_c_member_id = $requests['target_c_member_id'];
        // ----------

        //--- æ¨©éãã§ãE¯
        //èªåE»¥å¤E

        if ($target_c_member_id == $u) {
            handle_kengen_error();
        }

        //ã¢ã¯ã»ã¹ãã­ãE¯è¨­å®E
        if (p_common_is_access_block($u, $target_c_member_id)) {
            openpne_redirect('pc', 'page_h_access_block');
        }
        //---

        // ---bizãããã
        $biz_dir = OPENPNE_MODULES_BIZ_DIR.'/biz/';  //bizã¢ã¸ã¥ã¼ã«ãE£ã¬ã¯ããªã®å®ç¾©
        include_once($biz_dir.'lib/mysql_functions.php');  //bizã¢ã¸ã¥ã¼ã«ããã©ã¤ãã©ãªãæåE
        if(biz_isKtaiMessage($target_c_member_id))
            biz_sendKtaiMessage($u, $target_c_member_id, $title, $body);
        // ---bizããã¾ã§

        do_common_send_message($u, $target_c_member_id, $title,$body);

        openpne_redirect('pc', 'page_h_message_box');
    }
}

?>
