<?php

namespace XoopsModules\Urlrewrite;

defined('XOOPS_ROOT_PATH') || exit('Restricted access');
//if (false === defined('FRAMEWORKS_ART_FUNCTIONS_INI')) {
//    require_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.ini.php';
//}
//load_object();

/**
 * Class UrlHandler
 */
final class UrlHandler extends \XoopsPersistableObjectHandler
{
    const TABLE = 'urlrewrite_url';
    const PRIMARY_KEY = 'id';
    /* override */

    /**
     * UrlHandler constructor.
     * @param object|\XoopsDatabase|\XoopsMySQLDatabase $db
     */
    public function __construct($db)
    {
        parent::__construct($db, self::TABLE, Url::class, self::PRIMARY_KEY);
    }

    /**
     * @return string
     */
    private function __clone()
    {
        //return '';
    }

    /* operation */
}
