<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

// hash_table æ´æ°
class admin_biz_do_update_hash_table extends OpenPNE_Action
{
    function execute($requests)
    {
        $hash_tbl =& AdminHashTable::singleton();
        $hash_tbl->updateTable();

        admin_biz_client_redirect('top', 'įŽĄįE¨ããEã¸åãå¤æ´ããžãã');
    }
}

?>
