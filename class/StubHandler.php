<?php

namespace XoopsModules\Urlrewrite;

use XoopsModules\Urlrewrite;

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

/**
 * Class StubHandler
 */
final class StubHandler
{
    private $in_xoops;
    private $script_url;
    private $is_redirect;
    private $patterns;
    private $target_urls;
    /* override */

    /**
     * StubHandler constructor.
     */
    public function __construct()
    {
        $parse_xoops_url   = parse_url(XOOPS_URL);
        $xoops_url_path    = $parse_xoops_url['path'];
        $parse_request_uri = parse_url($_SERVER['REQUEST_URI']);
        $request_uri_path  = $parse_request_uri['path'];
        /** @var Urlrewrite\Helper $helper */
        $helper = Urlrewrite\Helper::getInstance();
        if (0 === mb_strpos($request_uri_path, $xoops_url_path . '/')) {
            $this->in_xoops = true;
            $script_name    = $_SERVER['SCRIPT_NAME'];
            if (0 === mb_strpos($script_name, $xoops_url_path . '/')) {
                $this->script_url = mb_substr($script_name, mb_strlen($xoops_url_path) + 1);
            } else {
                $this->script_url = '';
            }
            $target_url = mb_substr($request_uri_path, mb_strlen($xoops_url_path) + 1);
            $urlHandler = $helper->getHandler('Url');
            /* @var UrlHandler $urlHandler */
            if (true === isset($_SERVER['REDIRECT_URL'])) {
                $this->is_redirect = true;
                $criteria          = new \CriteriaCompo();
                $criteria->add(new \Criteria('pattern', $target_url));
                $this->patterns = $urlHandler->getObjects($criteria);
            } else {
                $this->is_redirect = false;
                $criteria          = new \CriteriaCompo();
                $criteria->add(new \Criteria('target_url', $target_url));
                $this->target_urls = $urlHandler->getObjects($criteria);
            }
        } else {
            $this->in_xoops = false;
        }

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
    public function get_in_xoops()
    {
        return $this->in_xoops;
    }

    /**
     * @return string
     */
    public function get_script_url()
    {
        return $this->script_url;
    }

    /**
     * @return bool
     */
    public function get_is_redirect()
    {
        return $this->is_redirect;
    }

    /**
     * @return array
     */
    public function get_patterns()
    {
        return $this->patterns;
    }

    /**
     * @return array
     */
    public function get_target_urls()
    {
        return $this->target_urls;
    }
}
