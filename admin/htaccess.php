<?php

use XoopsModules\Urlrewrite;

//require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
require_once __DIR__ . '/admin_header.php';
/** @var Urlrewrite\HtaccessHandler $htaccessHandler */
$htaccessHandler = $helper->getHandler('Htaccess');
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $htaccessHandler->save();
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
xoops_cp_header();
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';
$xoopsThemeFactory = new \xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
/* @var XoopsTpl $xoopsTpl */
$xoopsTpl = $xoTheme->template;
$text     = $htaccessHandler->get_text();
$rows     = $htaccessHandler->get_rows();
$xoopsTpl->assign_by_ref('text', $text);
$xoopsTpl->assign_by_ref('rows', $rows);
$xoopsTpl->display('db:urlrewrite_admin_htaccess.tpl');
xoops_confirm([], '', "Are you sure want to save as '" . $htaccessHandler->get_htaccess_path() . "'?");

require_once __DIR__ . '/admin_footer.php';
