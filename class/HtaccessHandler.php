<?php

namespace XoopsModules\Urlrewrite;

use XoopsModules\Urlrewrite;

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

/**
 * Class HtaccessHandler
 */
final class HtaccessHandler
{
    private $urls;
    private $text;
    private $rows;

    /* override */

    /**
     * HtaccessHandler constructor.
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

    /* cache */

    /**
     * @return string
     */
    private function ensure_urls()
    {
        if (true === isset($this->urls)) {
            return '';
        }
        /** @var Urlrewrite\Helper $helper */
        $helper = Urlrewrite\Helper::getInstance();
        /** @var Urlrewrite\UrlHandler $urlHandler */
        $urlHandler = $helper->getHandler('Url');
        $criteria   = new \CriteriaCompo();
        $criteria->add(new \Criteria('enabled', true));
        $this->urls = $urlHandler->getObjects($criteria);

        return '';
    }

    /**
     * @return string
     */
    private function ensure_text()
    {
        if (true === isset($this->text)) {
            return '';
        }
        $this->ensure_urls();
        $this->text = '\n';
        $this->text .= '\n';
        $this->text .= 'SetEnv XOOPS_URLREWRITE_HTACCESS 1n';
        $this->text .= '\n';
        $this->text .= 'RewriteEngine on\n';
        foreach ($this->urls as $url) {
            /** @var Urlrewrite\Url $url */
            $this->text .= 'RewriteRule ^' . preg_quote($url->get_pattern(), '/') . '$ ' . $url->get_target_url() . ' [L,QSA]n';
        }
        $this->text .= '';
        $this->rows = mb_substr_count($this->text, 'n') + 1;

        return '';
    }

    /* operation */
    public function get_urls()
    {
        $this->ensure_urls();

        return $this->urls;
    }

    public function get_text()
    {
        $this->ensure_text();

        return $this->text;
    }

    public function get_rows()
    {
        $this->ensure_text();

        return $this->rows;
    }

    /**
     * @return string
     */
    public function get_htaccess_path()
    {
        return XOOPS_ROOT_PATH . '/.htaccess';
    }

    /**
     * @return string
     */
    public function get_target_urls_path()
    {
        $cache_dir = XOOPS_UPLOAD_PATH . '/urlrewrite';
        if (false === is_dir($cache_dir)) {
            mkdir($cache_dir);
        }

        return $cache_dir . '/target_urls.php';
    }

    /**
     * @return string
     */
    public function save()
    {
        $this->ensure_text();
        file_put_contents($this->get_htaccess_path(), $this->text);
        $target_urls = [];
        foreach ($this->urls as $url) {
            /* @var Url $url */
            $target_urls[$url->get_target_url()] = $url->get_pattern();
        }
        $target_urls_content = '' . var_export($target_urls, true) . ';n ?>';
        file_put_contents($this->get_target_urls_path(), $target_urls_content);

        return '';
    }
}
