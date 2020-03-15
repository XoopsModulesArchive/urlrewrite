<?php

namespace XoopsModules\Urlrewrite;

defined('XOOPS_ROOT_PATH') || exit('Restricted access');
//if (false === defined('FRAMEWORKS_ART_FUNCTIONS_INI')) {
//    require_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.ini.php';
//}
//load_object();

/**
 * Class Url
 */
final class Url extends \XoopsObject
{
    /* override */

    /**
     * Url constructor.
     */
    public function __construct()
    {
        parent::__construct(UrlHandler::TABLE);
        parent::initVar(UrlHandler::PRIMARY_KEY, XOBJ_DTYPE_INT);
        parent::initVar('pattern', XOBJ_DTYPE_TXTBOX);
        parent::initVar('target_url', XOBJ_DTYPE_TXTBOX);
        parent::initVar('enabled', XOBJ_DTYPE_INT);
    }

    /**
     * @return string
     */
    public function __clone()
    {
        //        return '';
    }

    /* getter / setter */

    /**
     * @return int
     */
    public function get_primary_key()
    {
        return (int)parent::getVar(UrlHandler::PRIMARY_KEY);
    }

    /**
     * @return string
     */
    public function get_pattern()
    {
        return (string)parent::getVar('pattern');
    }

    /**
     * @param $pattern
     */
    public function set_pattern($pattern)
    {
        return parent::setVar('pattern', (string)$pattern);
    }

    /**
     * @return string
     */
    public function get_target_url()
    {
        return (string)parent::getVar('target_url');
    }

    /**
     * @param $target_url
     */
    public function set_target_url($target_url)
    {
        return parent::setVar('target_url', (string)$target_url);
    }

    /**
     * @return mixed
     */
    public function get_enabled()
    {
        $enabled = (bool)parent::getVar('enabled');
        //        settype($enabled, 'boolean');
        return $enabled;
    }

    /**
     * @param $enabled
     */
    public function set_enabled($enabled)
    {
        //        settype($enabled, 'boolean');
        $enabled = (bool)$enabled;

        return parent::setVar('enabled', $enabled);
    }
}
