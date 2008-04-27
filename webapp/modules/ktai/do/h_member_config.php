<?php
/**
 * @copyright 2005-2008 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 設定変更
 */
class ktai_do_h_member_config extends OpenPNE_Action
{
    function execute($requests)
    {
        $tail = $GLOBALS['KTAI_URL_TAIL'];
        $u = $GLOBALS['KTAI_C_MEMBER_ID'];

        // コメントメール通知

        db_member_update_c_member_config($u, 'SEND_DIARY_COMMENT_MAIL_KTAI', $requests['SEND_DIARY_COMMENT_MAIL_KTAI']);
        if (DISPLAY_NEWDIARYTOPIC_HOME){
            db_member_update_c_member_config($u, 'DISPLAY_CHANGE_NEWDIARY_HOME_KTAI', $requests['DISPLAY_CHANGE_NEWDIARY_HOME_KTAI']);
            db_member_update_c_member_config($u, 'DISPLAY_CHANGE_NEWTOPIC_HOME_KTAI', $requests['DISPLAY_CHANGE_NEWTOPIC_HOME_KTAI']);
        }

        $p = array('msg' => 32);
        openpne_redirect('ktai', 'page_h_config', $p);
    }
}

?>
