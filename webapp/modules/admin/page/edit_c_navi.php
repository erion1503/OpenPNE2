<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

// ナビ変更
class admin_page_edit_c_navi extends OpenPNE_Action
{
    function execute($requests)
    {
        $this->set('navi_global', util_get_c_navi('global'));
        $this->set('navi_h', util_get_c_navi('h'));
        $this->set('navi_f', util_get_c_navi('f'));
        $this->set('navi_c', util_get_c_navi('c'));
        return 'success';
    }
}

?>
