<?php

//require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
$dependenceHandler = $helper->getHandler('Dependence');
/* @var \XoopsModules\Urlrewrite\DependenceHandler $dependenceHandler */
if (false === $dependenceHandler->check_htaccess()) {
    xoops_error('The .htaccess is invalid.');
}
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';
$xoopsThemeFactory = new xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
/* @var \XoopsTpl $xoopsTpl */
$xoopsTpl = $xoTheme->template;

require_once XOOPS_ROOT_PATH . '/modules/urlrewrite/include/smarty.php';

//fieldset>Smarty Rewrite Samplelegend>fieldset>

require_once XOOPS_ROOT_PATH . '/modules/urlrewrite/include/smarty.php';
/* @var \XoopsModules\Urlrewrite\HtaccessHandler $htaccessHandler */
$htaccessHandler = $helper->getHandler('Htaccess');
$temp            = $htaccessHandler->get_urls();
$xoopsTpl->assign_by_ref('urls', $temp);
$xoopsTpl->display('db:urlrewrite_admin_smarty.tpl');

$adminObject->displayNavigation(basename(__FILE__));

require_once __DIR__ . '/admin_footer.php';
