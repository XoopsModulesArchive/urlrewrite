<?php

//require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/theme.php';
require_once XOOPS_ROOT_PATH . '/class/theme_blocks.php';
$xoopsThemeFactory = new xos_opal_ThemeFactory();
$xoTheme           = $xoopsThemeFactory->createInstance();
$xoopsTpl          = $xoTheme->template;
/* @var XoopsTpl $xoopsTpl */
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
$create_form = new \XoopsSimpleForm('', 'create_form', XOOPS_URL . '/modules/urlrewrite/admin/new.php');
$create_form->addElement(new \XoopsFormText('', 'pattern', 50, 50), true);
$create_form->addElement(new \XoopsFormText('', 'target_url', 50, 50), true);
$create_form->addElement(new \XoopsFormRadioYN('', 'enabled', true));
$create_form->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
$create_form->assign($xoopsTpl);
$xoopsTpl->display('db:urlrewrite_admin_create.tpl');
require_once __DIR__ . '/admin_footer.php';
