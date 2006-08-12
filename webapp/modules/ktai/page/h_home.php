<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

class ktai_page_h_home extends OpenPNE_Action
{
    function execute($requests)
    {
        $u  = $GLOBALS['KTAI_C_MEMBER_ID'];

        $c_member_secure = db_common_c_member_secure4c_member_id($u);

        //管理画面HTML
        $this->set('c_siteadmin', p_common_c_siteadmin4target_pagename('k_h_home'));

        $c_member = db_common_c_member4c_member_id($u);
        //メンバ情報
        $this->set('c_member', $c_member);
        //新着メッセージ数
        $this->set('c_message_unread_count', k_p_h_home_c_message_received_unread_all_count4c_member_id($u));
        //フレンドの最新日記
        $this->set('c_diary_friend_list', k_p_h_home_c_diary_friend_list4c_member_id($u, 5));
        //参加コミュニティリスト
        $this->set('c_commu_list', k_p_h_home_c_commu_list_lastupdate4c_member_id($u, 5));
        //フレンドリスト
        $this->set('c_friend_list', k_p_h_home_c_friend_list_random4c_member_id($u, 5));

        //参加コミュニティの新着書き込み
        $this->set('c_commu_topic_list', p_h_home_c_commu_topic_comment_list4c_member_id($u, 5));

        $this->set('SNS_NAME', SNS_NAME);

        //アクセス日時を記録
        p_common_do_access($u);

        //未読メッセージの数をお知らせ
        $this->set("num_message_not_is_read",p_h_message_count_c_message_not_is_read4c_member_to_id($u));
        //日記コメントの未読の数をお知らせ
        $this->set("num_diary_not_is_read",p_h_diary_count_c_diary_not_is_read4c_member_id($u));
        //日記コメントの未読の中で、読ませるものを送る
        $this->set("first_diary_read",p_h_diary_c_diary_first_diary_read4c_member_id($u) );

        //コミュニティ承認を求めているメンバーリスト
        $h_confirm_list = p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($u);
        $this->set("h_confirm_list", $h_confirm_list);
        //そのメンバーの人数
        $this->set("num_h_confirm_list", count($h_confirm_list) );

        //あなたにフレンド認証を求めているメンバーリスト
        $f_confirm_list = p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($u);
        $this->set("f_confirm_list", $f_confirm_list);
        //そのメンバーの人数
        $this->set("num_f_confirm_list", count($f_confirm_list) );

        // あなたにコミュニティ管理者交代を希望しているメンバー
        $anatani_c_commu_admin_confirm_list = p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($u);
        $this->set("anatani_c_commu_admin_confirm_list",$anatani_c_commu_admin_confirm_list);
        //そのメンバーの人数
        $this->set("num_anatani_c_commu_admin_confirm_list", count($anatani_c_commu_admin_confirm_list));

        //日記コメント記入履歴
        $this->set("c_diary_my_comment_list", p_h_home_c_diary_my_comment_list4c_member_id($u, 5));

        // 誕生日かどうか
        $this->set('birthday_flag', p_h_home_birthday_flag4c_member_id($u));

        return 'success';
    }
}

?>
