<?php

use XoopsModules\Urlrewrite;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$adminObject = \Xmf\Module\Admin::getInstance();

/** @var Urlrewrite\DependenceHandler $dependenceHandler */
$dependenceHandler = $helper->getHandler('Dependence');
if (false === $dependenceHandler->check_url_rewrite()) {
    xoops_error('The Urlrewrite module required apache mod_rewrite.');
}

require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';

$xoopsThemeFactory = new \xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
/** @var \XoopsTpl $xoopsTpl */
$xoopsTpl = $xoTheme->template;
/** @var Urlrewrite\UrlHandler $urlHandler */
$urlHandler = $helper->getHandler('Url');
$temp       = $urlHandler->getObjects();
$xoopsTpl->assign_by_ref('urls', $temp);
$xoopsTpl->display('db:urlrewrite_admin_index.tpl');

$adminObject->displayNavigation(basename(__FILE__));
//$adminObject->displayIndex();

require_once __DIR__ . '/admin_footer.php';
