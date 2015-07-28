<?php
/**
 * 权限配置
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-22
 */
global $purview;

$purview = array();

$purview[] = array(
    'group' => '内容设置',
    'items' => array(
        array(
            'name' => '栏目管理',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_section_view'),
                array('name'=>'新增', 'purview'=>'pur_section_add'),
                array('name'=>'编辑', 'purview'=>'pur_section_edit'),
                array('name'=>'删除', 'purview'=>'pur_section_del')
            )
        ),

        array(
            'name' => '内容管理',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_content_view'),
                array('name'=>'新增', 'purview'=>'pur_content_add'),
                array('name'=>'编辑', 'purview'=>'pur_content_edit'),
                array('name'=>'删除', 'purview'=>'pur_content_del'),
            )
        ),

        array(
            'name' => '访问统计',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_static_view')
            )
        )
    )
);

$purview[] = array(
    'group' => '网站设置',
    'items' => array(
        array(
            'name' => '站点参数',
            'operations' => array(
                array('name'=>'修改', 'purview'=>'pur_sysconf_edit')
            )
        ),

        array(
            'name' => '友情链接',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_link_view'),
                array('name'=>'新增', 'purview'=>'pur_link_add'),
                array('name'=>'编辑', 'purview'=>'pur_link_edit'),
                array('name'=>'删除', 'purview'=>'pur_link_del')
            )
        ),

        array(
            'name' => '网站地图',
            'operations' => array(
                array('name'=>'修改', 'purview'=>'pur_sitemap_edit')
            )
        ),

        array(
            'name' => '广告位置',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_adpos_view'),
                array('name'=>'新增', 'purview'=>'pur_adpos_add'),
                array('name'=>'编辑', 'purview'=>'pur_adpos_edit'),
                array('name'=>'删除', 'purview'=>'pur_adpos_del')
            )
        ),

        array(
            'name' => '广告管理',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_ad_view'),
                array('name'=>'新增', 'purview'=>'pur_ad_add'),
                array('name'=>'编辑', 'purview'=>'pur_ad_edit'),
                array('name'=>'删除', 'purview'=>'pur_ad_del')
            )
        ),

        array(
            'name' => '导航栏管理',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_nav_view'),
                array('name'=>'新增', 'purview'=>'pur_nav_add'),
                array('name'=>'编辑', 'purview'=>'pur_nav_edit'),
                array('name'=>'删除', 'purview'=>'pur_nav_del')
            )
        )
    )
);

$purview[] = array(
    'group' => '管理设置',
    'items' => array(
        array(
            'name' => '角色管理',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_role_view'),
                array('name'=>'新增', 'purview'=>'pur_role_add'),
                array('name'=>'编辑', 'purview'=>'pur_role_edit'),
                array('name'=>'删除', 'purview'=>'pur_role_del')
            )
        ),

        array(
            'name' => '管理员管理',
            'operations' => array(
                array('name'=>'查看', 'purview'=>'pur_admin_view'),
                array('name'=>'新增', 'purview'=>'pur_admin_add'),
                array('name'=>'编辑', 'purview'=>'pur_admin_edit'),
                array('name'=>'删除', 'purview'=>'pur_admin_del')
            )
        )
    )
);

$purview[] = array(
    'group' => '个人信息',
    'items' => array(
        array(
            'name' => '信息修改',
            'operations' => array(
                array('name'=>'修改', 'purview'=>'pur_info_edit')
            )
        ),

        array(
            'name' => '修改密码',
            'operations' => array(
                array('name'=>'修改', 'purview'=>'pur_passwd_edit')
            )
        )
    )
);
