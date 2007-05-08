<?php
/**
 * @copyright 2005-2007 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 設定項目の管理クラス
 */
class OpenPNE_Config
{
    var $allowed_names = array();

    /**
     * constructor
     * @access private
     */
    function OpenPNE_Config()
    {
        $this->allowed_names = array(
            'SNS_NAME', 'SNS_TITLE',
            'ADMIN_EMAIL', 'AMAZON_AFFID',
            'CATCH_COPY', 'OPERATION_COMPANY', 'COPYRIGHT',
            'IS_CLOSED_SNS', 'IS_USER_INVITE', 'IS_GET_EASY_ACCESS_ID',
            'OPENPNE_ENABLE_PC', 'OPENPNE_ENABLE_KTAI',
            'OPENPNE_REGIST_FROM',
            'LOGIN_CHECK_ENABLE','LOGIN_CHECK_TIME','LOGIN_CHECK_NUM','LOGIN_REJECT_TIME',
            'LOGIN_URL_PC', 'DISPLAY_LOGIN',
            'DISPLAY_SCHEDULE_HOME', 'DISPLAY_SEARCH_HOME', 'DAILY_NEWS_DAY',
            'USE_BOOKMARK_FEED', 'USE_SHINOBIASHI', 'USE_DIARY_CATEGORY',
            'OPENPNE_USE_CMD_TAG', 'OPENPNE_USE_FLASH_LIST',
            'WORD_FRIEND','WORD_MY_FRIEND',
            'WORD_FRIEND_HALF','WORD_MY_FRIEND_HALF',
            'SORT_ORDER_NICK', 'SORT_ORDER_BIRTH',
            'OPENPNE_ENABLE_ROLLOVER',
            'OPENPNE_DISP_POINT', 'OPENPNE_DISP_RANK',
            'SKIN_VERSION',
            'AFFILIATE_TAG',
            'UNUSED_MAILS',
            'DISPLAY_OPENPNE_INFO',
            'USE_EXTRA_SERVICE',
            'USE_BIZ_DIR',
            'SEND_USER_DATA',
            'FILE_TYPE',
            'LIMIT_DOMAIN1',
            'LIMIT_DOMAIN2',
            'LIMIT_DOMAIN3',
            'LIMIT_DOMAIN4',
            'LIMIT_DOMAIN5',
        );
    }

    function &getInstance()
    {
        static $singleton;
        if (empty($singleton)) {
            $singleton = new OpenPNE_Config();
        }
        return $singleton;
    }

    function is_allowed($name)
    {
        return in_array($name, $this->allowed_names);
    }

    /**
     * c_admin_config から設定値を読み込み
     * ひとまず定数として定義
     */
    function db_load_config()
    {
        $sql = 'SELECT * FROM c_admin_config';
        $configs = db_get_all($sql);

        foreach ($configs as $config) {
            if (!$this->is_allowed($config['name'])) continue;

            defined($config['name']) or define($config['name'], $config['value']);
        }
    }

    /**
     * bind_default()
     * 
     * @access public
     */
    function bind_default()
    {
        $defaults = array(
        // 管理画面
            'SNS_NAME' => 'MySNS',
            'SNS_TITLE' => '',
            'ADMIN_EMAIL' => 'sns@' . MAIL_SERVER_DOMAIN,
            'IS_CLOSED_SNS' => true,
            'IS_USER_INVITE' => true,
            'IS_GET_EASY_ACCESS_ID' => 1,
            'OPENPNE_ENABLE_PC' => true,
            'OPENPNE_ENABLE_KTAI' => true,
            'OPENPNE_REGIST_FROM' => 3,
            'AMAZON_AFFID'   => 'snsoftjp-22',
            'LOGIN_URL_PC' => '',
            'DISPLAY_LOGIN' => 1,
            'DISPLAY_SCHEDULE_HOME' => 1,
            'DISPLAY_SEARCH_HOME' => 1,
            'DAILY_NEWS_DAY' => '月,木',
            'USE_BOOKMARK_FEED' => false,
            'USE_SHINOBIASHI' => false,
            'USE_DIARY_CATEGORY' => true,
            'OPENPNE_USE_CMD_TAG' => true,
            'LOGIN_CHECK_ENABLE' => false,
            'LOGIN_CHECK_NUM' => 1000,
            'LOGIN_CHECK_TIME' => 6,
            'LOGIN_REJECT_TIME' => 30,
            'CATCH_COPY' => '',
            'OPERATION_COMPANY' => '',
            'COPYRIGHT' => '',
            'WORD_FRIEND' => 'フレンド',
            'WORD_FRIEND_HALF' => 'ﾌﾚﾝﾄﾞ',
            'WORD_MY_FRIEND' => 'マイフレンド',
            'WORD_MY_FRIEND_HALF' => 'ﾏｲﾌﾚﾝﾄﾞ',
            'SORT_ORDER_NICK'  => 0,
            'SORT_ORDER_BIRTH' => 0,
            'OPENPNE_ENABLE_ROLLOVER' => true,
            'SKIN_VERSION' => '2.0',
            'AFFILIATE_TAG' => '',
            'UNUSED_MAILS' => '',
            'USE_EXTRA_SERVICE' => '1',
            'USE_BIZ_DIR' => '0',
            'SEND_USER_DATA' => '0',
            'FILE_TYPE' => '',
            'LIMIT_DOMAIN1' => '',
            'LIMIT_DOMAIN2' => '',
            'LIMIT_DOMAIN3' => '',
            'LIMIT_DOMAIN4' => '',
            'LIMIT_DOMAIN5' => '',

        // config.php
            'OPENPNE_RSS_CACHE_DIR' => OPENPNE_VAR_DIR . '/rss_cache',
            'OPENPNE_UNDER_MAINTENANCE' => false,
            'OPENPNE_DEBUGGING' => false,
            'OPENPNE_TRIM_DOUBLEBYTE_SPACE' => true,
            'OPENPNE_USE_API' => false,
            'SESSION_SAVE_DB' => false,
            'OPENPNE_TMP_IMAGE_DB' => false,
            'OPENPNE_TMP_FILE_DB' => false,
            'OPENPNE_USE_PARTIAL_SSL' => false,
            'OPENPNE_USE_SSL_PARAM' => false,
            'OPENPNE_IMG_URL' => '',
            'OPENPNE_IMG_CACHE_PUBLIC' => false,
            'OPENPNE_IMG_CACHE_PREFIX' => 'img_cache_',
            'IMAGE_MAX_FILESIZE' => 300,
            'IMAGE_MAX_WIDTH' => 0,
            'IMAGE_MAX_HEIGHT' => 0,
            'MAIL_ADDRESS_PREFIX' => '',
            'MAIL_ADDRESS_HASHED' => true,
            'MAIL_HAN2ZEN' => true,
            'MAIL_HEADER_SEP' => 'LF',
            'MAIL_FROM_ENCODING' => 'auto',
            'MAIL_WRAP_WIDTH' => 200,
            'MAIL_SET_ENVFROM' => true,
            'MAIL_ENVFROM' => '',
            'LOG_C_ACCESS_LOG' => false,
            'OPENPNE_ADMIN_URL' => '',
            'ADMIN_MODULE_NAME' => 'admin',
            'ADMIN_INIT_CONFIG' => true,
            'SERVER_IP_KEY' => 'REMOTE_ADDR',
            'OPENPNE_USE_FUNCTION_CACHE' => false,
            'OPENPNE_USE_MYSQL_HINT' => false,
            'OPENPNE_USE_FLASH_LIST' => true,
            'OPENPNE_USE_COMMU_MAP' => true,
            'OPENPNE_USE_OLD_CRYPT_BLOWFISH' => false,
            'OPENPNE_SESSION_CHECK_URL' => false,
            'OPENPNE_INFO_URL' => 'http://info.openpne.jp/rss',
            'DISPLAY_OPENPNE_INFO' => true,
            'OPENPNE_DISP_POINT' => false,
            'OPENPNE_DISP_RANK' => false,
            'IS_SLAVEPNE' => false,
        // 固定値
            'AMAZON_TOKEN'   => '1WZYY1W9YF49AGM0RTG2',
            'AMAZON_LOCALE'  => 'jp',
            'AMAZON_BASEURL' => 'http://xml-jp.amznxslt.com/onca/xml3',
            'OPENPNE_REGIST_FROM_NONE'   => 0,
            'OPENPNE_REGIST_FROM_PC'     => 1,
            'OPENPNE_REGIST_FROM_KTAI'   => 2,
            'OPENPNE_REGIST_FROM_PCKTAI' => 3,
            'OPENPNE_FUNCTION_CACHE_LIFETIME_FAST' => 300,
            'OPENPNE_FUNCTION_CACHE_LIFETIME_SHORT' => 1200,
            'OPENPNE_FUNCTION_CACHE_LIFETIME_LONG' => 3600,
        );

        foreach ($defaults as $key => $value) {
            defined($key) or define($key, $value);
        }
    }
}

?>
