<?php

require_once __DIR__ . '/admin_header.php';
if (false === isset($_GET['script_url'])) {
    redirect_header(XOOPS_URL . '/modules/urlrewrite/admin/index.php');
}
$script_url = $_GET['script_url'];
xoops_cp_header();
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';
$xoopsThemeFactory = new xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
$xoopsTpl          = $xoTheme->template;
/* @var XoopsTpl $xoopsTpl */
$xoopsTpl->assign_by_ref('script_url', $script_url);
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
$create_form = new \XoopsSimpleForm('', 'create_form', XOOPS_URL . '/modules/urlrewrite/admin/new.php');
$create_form->addElement(new \XoopsFormText('', 'pattern', 50, 50), true);
$create_form->addElement(new \XoopsFormHidden('target_url', $script_url), true);
$create_form->addElement(new \XoopsFormRadioYN('', 'enabled', true));
$create_form->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
$create_form->assign($xoopsTpl);
$xoopsTpl->display('db:urlrewrite_admin_createurl.tpl');

//require_once __DIR__ . '/admin_footer.php';
