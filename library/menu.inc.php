<?php
/**
 * 菜单配置
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-22
 */
global $menu;

$menu = array();

$menu[] = array(
    'group' => '内容设置',
    'items' => array(
        array('name'=>'栏目管理', 'purview'=>'pur_section_view', 'link'=>'section.php'),
        array('name'=>'内容管理', 'purview'=>'pur_content_view', 'link'=>'content.php'),
        array('name'=>'访问统计', 'purview'=>'pur_static_view', 'link'=>'statics.php')
    )
);

$menu[] = array(
    'group' => '网站设置',
    'items' => array(
        array('name'=>'站点参数', 'purview'=>'pur_sysconf_edit', 'link'=>'sysconf.php'),
        array('name'=>'友情链接', 'purview'=>'pur_link_view', 'link'=>'friend.php'),
        array('name'=>'网站地图', 'purview'=>'pur_sitemap_edit', 'link'=>'sitemap.php'),
        array('name'=>'广告位置', 'purview'=>'pur_adpos_view', 'link'=>'adpos.php'),
        array('name'=>'广告管理', 'purview'=>'pur_ad_view', 'link'=>'ad.php'),
        array('name'=>'导航栏管理', 'purview'=>'pur_nav_view', 'link'=>'nav.php')
    )
);

$menu[] = array(
    'group' => '管理设置',
    'items' => array(
        array('name'=>'角色管理', 'purview'=>'pur_role_view', 'link'=>'role.php'),
        array('name'=>'管理员管理', 'purview'=>'pur_admin_view', 'link'=>'admin.php')
    )
);

$menu[] = array(
    'group' => '个人信息',
    'items' => array(
        array('name'=>'信息修改', 'purview'=>'pur_info_edit', 'link'=>'info.php'),
        array('name'=>'密码修改', 'purview'=>'pur_passwd_edit', 'link'=>'password.php')
    )
);
