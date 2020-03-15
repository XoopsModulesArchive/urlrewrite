<?php

$moduleDirName = basename(__DIR__);

defined('XOOPS_ROOT_PATH') || exit('Restricted access');
$modversion['name']             = 'Url Rewrite';
$modversion['version']          = 0.02;
$modversion['description']      = 'Url Rewrite';
$modversion['author']           = 'Hu Zhenghui https://xoops.org.cn/userinfo.php?uid=8616 QQ: 443089607 QQMail: hu_zhenghui@qq.com Skype: huzhenghui GMail: huzhengh@gmail.com GTalk: huzhengh';
$modversion['license']          = 'All rights reserved.';
$modversion['image']            = '../../images/logo.gif';
$modversion['dirname']          = $moduleDirName;
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables']           = [
    'urlrewrite_url',
];
$modversion['hasMain']          = 1;
$modversion['system_menu']      = 1;
$modversion['hasAdmin']         = 1;
$modversion['adminindex']       = 'admin/index.php';
$modversion['adminmenu']        = 'admin/menu.php';

// ------------------- Blocks -----------------------------//
$modversion['blocks'][] = [
    'file'        => 'StubHandler.php',
    'name'        => 'URL Rewrite Stub',
    'description' => 'URL Rewrite Stub',
    'show_func'   => 'b_urlrewrite_stub',
    'template'    => 'urlrewrite_block_stub.tpl',
];

//  ------------------- Templates -----------------------------//
$modversion['templates'][] = ['file' => 'urlrewrite_admin_index.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'urlrewrite_admin_create.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'urlrewrite_admin_createurl.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'urlrewrite_admin_edit.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'urlrewrite_admin_delete.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'urlrewrite_admin_htaccess.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'urlrewrite_admin_smarty.tpl', 'description' => ''];
