<?php
/**
 * @copyright 2005-2007 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

// 休日変更
class admin_do_update_c_holiday extends OpenPNE_Action
{
    function handleError($errors)
    {
        admin_client_redirect('edit_c_holiday', array_shift($errors));
    }

    function execute($requests)
    {
        db_admin_update_c_holiday(
            $requests['c_holiday_id'],
            $requests['name'],
            $requests['month'],
            $requests['day']
        );
        admin_client_redirect('edit_c_holiday', '祝日を編集しました');
    }
}

?>
