<?php

use XoopsModules\Urlrewrite;

//require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
require_once __DIR__ . '/admin_header.php';
if (false === isset($_GET['id'])) {
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
$urlHandler = $helper->getHandler('Url');
/* @var Urlrewrite\UrlHandler $urlHandler */
$url = $urlHandler->get($_GET['id']);
/* @var Urlrewrite\Url $url */
if (false === isset($url)) {
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $urlHandler->delete($url);
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
xoops_cp_header();
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';
$xoopsThemeFactory = new xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
$xoopsTpl          = $xoTheme->template;
/* @var XoopsTpl $xoopsTpl */
$xoopsTpl->assign_by_ref('url', $url);
$xoopsTpl->display('db:urlrewrite_admin_delete.tpl');
if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    xoops_confirm([], '', 'Are you sure want to delete?');
}

require_once __DIR__ . '/admin_footer.php';
