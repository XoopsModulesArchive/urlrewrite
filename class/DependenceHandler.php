<?php

namespace XoopsModules\Urlrewrite;

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

/**
 * Class DependenceHandler
 */
final class DependenceHandler
{
    /* override */

    /**
     * DependenceHandler constructor.
     */
    public function __construct()
    {
        return '';
    }

    /**
     * @return string
     */
    private function __clone()
    {
        return '';
    }

    /* operation */

    /**
     * @return bool
     */
    public function check_url_rewrite()
    {
        return true === in_array('mod_rewrite', apache_get_modules());
    }

    /**
     * @return bool
     */
    public function check_htaccess()
    {
        return '1' === $_SERVER['XOOPS_URLREWRITE_HTACCESS'];
    }
}
