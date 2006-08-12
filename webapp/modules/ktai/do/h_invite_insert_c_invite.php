<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 招待メール送信
 */
class ktai_do_h_invite_insert_c_invite extends OpenPNE_Action
{
    function execute($requests)
    {
        $tail = $GLOBALS['KTAI_URL_TAIL'];
        $u = $GLOBALS['KTAI_C_MEMBER_ID'];

        if (!IS_USER_INVITE) {
            ktai_display_error(SNS_NAME . 'では、ユーザによる招待は行えません');
        }

        // --- リクエスト変数
        $mail = $requests['mail_address'];
        $body = $requests['body'];
        // ----------

        if (!$mail) {
            $p = array('msg' => 12);
            openpne_redirect('ktai', 'page_h_invite', $p);
        }
        if (!$body){
            $p = array('msg' => 1);
            openpne_redirect('ktai', 'page_h_invite', $p);
        }

        if (!db_common_is_mailaddress($mail)) {
            $p = array('msg' => 31);
            openpne_redirect('ktai', 'page_h_invite', $p);
        }
        if( p_is_sns_join4mail_address($mail) ){
            $p = array('msg' => 9);
            openpne_redirect('ktai', 'page_h_invite', $p);
        }

        $session = create_hash();

        if (is_ktai_mail_address($mail)) {
            //<PCKTAI
            if (defined('OPENPNE_REGIST_FROM') &&
                    !((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
                $p = array('msg' => 13);
                openpne_redirect('ktai', 'page_h_invite', $p);
            }
            //>

            // c_member_ktai_pre に追加
            if (do_common_c_member_ktai_pre4ktai_address($mail)) {
                do_update_c_member_ktai_pre($session, $mail, $u);
            } else {
                do_insert_c_member_ktai_pre($session, $mail, $u);
            }

            h_invite_insert_c_invite_mail_send($session, $u, $mail, $body);

        } else {
            //<PCKTAI
            if (defined('OPENPNE_REGIST_FROM') &&
                    !(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
                $p = array('msg' => 16);
                openpne_redirect('ktai', 'page_h_invite', $p);
            }
            //>

            // c_member_pre に追加
            if (do_common_c_member_pre4pc_address($mail)) {
                do_h_invite_update_c_invite($u, $mail, $body, $session);
            } else {
                do_h_invite_insert_c_invite($u, $mail, $body, $session);
            }

            do_h_invite_insert_c_invite_mail_send($u, $session, $body, $mail);
        }

        $p = array('msg' => 30);
        openpne_redirect('ktai', 'page_h_invite', $p);
    }
}

?>
