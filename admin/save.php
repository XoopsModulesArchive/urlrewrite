<?php

use XoopsModules\Urlrewrite;

//require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
require_once __DIR__ . '/admin_header.php';
if (false === isset($_POST['id'])) {
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
$urlHandler = $helper->getHandler('Url');
/* @var Urlrewrite\UrlHandler $urlHandler */
$url = $urlHandler->get($_POST['id']);
/* @var Urlrewrite\Url $url */
if (false === isset($url)) {
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
$url->set_pattern($_POST['pattern']);
$url->set_target_url($_POST['target_url']);
$url->set_enabled($_POST['enabled']);
$urlHandler->insert($url);
redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');

require_once __DIR__ . '/admin_footer.php';
