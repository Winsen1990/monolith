<?php
/**
 * 权限配置
 * @author 王仁欢
 * @date 2015-08-05
 * @version 1.0.0
 */
global $L_purview;
$L_purview = array(
    'pur_sysconf' => '系统设置',
    'pur_sysconf_add'=>'添加系统参数',
    'pur_sysconf_view'=>'查看系统参数',
    'pur_sysconf_edit'=>'修改系统参数',
    'pur_sysconf_del'=>'删除系统参数',

    'pur_nav' => '导航管理',
    'pur_nav_add'=>'添加导航栏',
    'pur_nav_view'=>'查看导航栏',
    'pur_nav_edit'=>'编辑导航栏',
    'pur_nav_del'=>'删除导航栏',

    'pur_adpos' => '广告位置',
    'pur_adpos_add'=>'添加广告位置',
    'pur_adpos_view'=>'查看广告位置',
    'pur_adpos_edit'=>'编辑广告位置',
    'pur_adpos_del'=>'删除广告位置',

    'pur_ad' => '广告',
    'pur_ad_add'=>'添加广告',
    'pur_ad_view'=>'查看广告列表',
    'pur_ad_edit'=>'编辑广告',
    'pur_ad_del'=>'删除广告',

    'pur_section' => '资讯分类',
    'pur_section_add'=>'添加资讯分类',
    'pur_section_view'=>'查看资讯分类',
    'pur_section_edit'=>'编辑资讯分类',
    'pur_section_del'=>'删除资讯分类',

    'pur_content' => '资讯',
    'pur_content_add'=>'添加资讯',
    'pur_content_view'=>'查看资讯',
    'pur_content_edit'=>'编辑资讯',
    'pur_content_del'=>'删除资讯',

    'pur_admin' => '管理员',
    'pur_admin_add'=>'添加管理员',
    'pur_admin_view'=>'查看管理员',
    'pur_admin_edit'=>'编辑管理员',
    'pur_admin_del'=>'删除管理员',

    'pur_role' => '管理员角色',
    'pur_role_add'=>'添加管理员角色',
    'pur_role_view'=>'查看管理员角色',
    'pur_role_edit'=>'编辑管理员角色',
    'pur_role_del'=>'删除管理员角色',

    'pur_friend' => '友情链接',
    'pur_friend_add'=>'添加友情链接',
    'pur_friend_view'=>'查看友情链接',
    'pur_friend_edit'=>'编辑友情链接',
    'pur_friend_del'=>'删除友情链接',

    'pur_self' => '个人信息',
    'pur_info_edit' => '信息修改',
    'pur_passwd_edit' => '密码修改',

    'pur_sitemap' => '网站地图',
    'pur_sitemap_edit' => '编辑网站地图',

    'pur_template' => '主题',
    'pur_template_view' => '模板列表',
    'pur_template_apply' => '更换模板',

    'pur_stastics' => '站点统计',
    'pur_stastics_view' => '查看统计',
);

global $menus;
$menus = array(
    //array('url' => 'main.php', 'title' => '首页', 'icon' => 'fa fa-home'),
    'pur_friend' => array('url'=>'friend.php', 'title'=>'友情链接管理', 'parent' => 'menu_site'),
    'pur_nav' => array('url'=>'nav.php', 'title'=>'导航栏管理', 'parent' => 'menu_site'),
    'pur_content' => array('url'=>'content.php', 'title'=>'资讯管理', 'parent' => 'menu_content'),
    'pur_section' => array('url'=>'section.php', 'title'=>'资讯分类管理', 'parent' => 'menu_content'),
    'pur_admin' => array('url'=>'admin.php', 'title'=>'管理员管理', 'parent' => 'menu_admin'),
    'pur_role' => array('url'=>'role.php', 'title'=>'管理员角色管理', 'parent' => 'menu_admin'),
    'pur_sysconf' => array('url'=>'sysconf.php', 'title'=>'系统参数管理', 'parent' => 'menu_site'),
    'pur_self' => array('url' => 'self.php', 'title' => '个人信息修改', 'parent' => 'menu_self'),
    'pur_passwd' => array('url' => 'password.php', 'title' => '修改密码', 'parent' => 'pur_self'),
    'pur_adpos' => array('url' => 'adpos.php', 'title' => '广告位置管理', 'parent' => 'menu_site'),
    'pur_ad' => array('url' => 'ad.php', 'title' => '广告管理', 'parent' => 'menu_site'),
    'pur_stastics' => array('url' => 'stastics.php', 'title' => '查看统计', 'parent' => 'menu_stastics')
);

global $topMenus;
$topMenus = array(
    'menu_site' => array('title' => '网站设置', 'icon' => '&#xe607;'),
    'menu_content' => array('title' => '内容设置', 'icon' => '&#xe603;'),
    'menu_admin' => array('title' => '权限管理', 'icon' => '&#xe601;'),
    'menu_self' => array('title' => '个人信息', 'icon' => '&#xe602;'),
    'menu_stastics' => array('title' => '站点统计', 'icon' => '&#xe604;'),
);
