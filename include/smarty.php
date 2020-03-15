<?php

$xoopsTpl->register_modifier('urlrewrite', 'smarty_urlrewrite');
if (true === function_exists('smarty_urlrewrite')) {
    return;
}
/**
 * @param $value
 * @return string
 */
function smarty_urlrewrite($value)
{
    if ('1' !== $_SERVER['XOOPS_URLREWRITE_HTACCESS']) {
        return $value;
    }
    static $target_urls;
    if (false === isset($target_urls)) {
        $target_urls_file = XOOPS_UPLOAD_PATH . '/urlrewrite/target_urls.php';
        if (true === is_file($target_urls_file)) {
            $target_urls = require_once $target_urls_file;
        } else {
            $target_urls = [];
        }
    }
    if ([] === $target_urls) {
        return $value;
    }
    if (0 === mb_strpos($value, XOOPS_URL . '/')) {
        $xoops_uri       = mb_substr($value, mb_strlen(XOOPS_URL) + 1);
        $parse_xoops_uri = parse_url($xoops_uri);
        $xoops_uri_path  = $parse_xoops_uri['path'];
        if (true === array_key_exists($xoops_uri_path, $target_urls)) {
            $redirect_url = XOOPS_URL . '/' . $target_urls[$xoops_uri_path];
            if (true === isset($parse_xoops_uri['query'])) {
                $redirect_url .= '?' . $parse_xoops_uri['query'];
            }
            if (true === isset($parse_xoops_uri['fragment'])) {
                $redirect_url .= '#' . $parse_xoops_uri['fragment'];
            }

            return $redirect_url;
        }

        return $value;
    }

    return $value;
}
