<?php

use XoopsModules\Urlrewrite;

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
xoops_cp_header();
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';
$xoopsThemeFactory = new xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
$xoopsTpl          = $xoTheme->template;
/* @var XoopsTpl $xoopsTpl */
$xoopsTpl->assign_by_ref('id', $url->get_primary_key());
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
$edit_form = new \XoopsSimpleForm('', 'edit_form', XOOPS_URL . '/modules/urlrewrite/admin/save.php');
$edit_form->addElement(new \XoopsFormHidden('id', $url->get_primary_key()));
$edit_form->addElement(new \XoopsFormText('', 'pattern', 50, 50, $url->get_pattern()), true);
$edit_form->addElement(new \XoopsFormText('', 'target_url', 50, 50, $url->get_target_url()), true);
$edit_form->addElement(new \XoopsFormRadioYN('', 'enabled', $url->get_enabled()));
$edit_form->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
$edit_form->assign($xoopsTpl);
$xoopsTpl->display('db:urlrewrite_admin_edit.tpl');
require_once __DIR__ . '/admin_footer.php';
