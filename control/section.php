<?php
/**
 * 栏目管理
 * @author 王仁欢
 * @email wrh4285@163.com
 * @date 2015-08-06
 * @version 1.0.0
 */

include 'library/init.inc.php';
back_base_init();

$template = 'section/';
assign('subTitle', '栏目管理');

$action = 'edit|add|view|delete';
$operation = 'edit|add';

$act = check_action($action, getGET('act'));
$act = ( $act == '' ) ? 'view' : $act;

$opera = check_action($operation, getPOST('opera'));
//===========================================================================

//添加栏目
if( 'add' == $opera ) {
    if( !check_purview('pur_section_add', $_SESSION['purview']) ) {
        show_system_message('权限不足', array());
        exit;
    }

    $name = getPOST('articleCatName');
    $parent_id = getPOST('parentId');
    $keywords = getPOST('keywords');
    $description = getPOST('description');
    $order_view = 0;
    $path = '';
    $original = getPOST('img');


    if('' == $name)
    {
        showSystemMessage('分类名称不能为空', array());
        exit;
    } else {
        $name = $db->escape(htmlspecialchars($name));
    }

    if('' == $keywords)
    {
        showSystemMessage('出于SEO考虑，请务必填写关键词', array());
        exit;
    } else {
        $keywords = $db->escape(htmlspecialchars($keywords));
    }

    if('' == $description)
    {
        showSystemMessage('出于SEO考虑，请务必填写简要介绍', array());
        exit;
    } else {
        $description = $db->escape(htmlspecialchars($description));
    }

    if( '' == $img ) {

    } else {
        if( !file_exists(realpath('../'.$img)) ) {
            showSystemMessage('图片不存在', array());
            exit;
        } else {
            $img = $db->escape(htmlspecialchars($img));
        }
    }

    $parentId = intval($parentId);
    if(0 > $parentId)
    {
        showSystemMessage('参数错误', array());
        exit;
    }

}



//===========================================================================

//栏目列表
if( 'view' == $act ) {

    if( !check_purview('pur_section_view', $_SESSION['purview']) ) {
        show_system_message('权限不足', array());
        exit;
    }

    $get_section_list = 'select * from '.$db->table('section').' where 1 order by `path` ASC';
    $section_list = $db->fetchAll($get_section_list);

    foreach($section_list as $key => $section) {
        $count = count(explode(',', $section['path']));
        if($count > 1)
        {
            $temp = '|--'.$section['section_name'];
            while($count--)
            {
                $temp = '&nbsp;&nbsp;'.$temp;
            }

            $section['section_name'] = $temp;
            $section_list[$key] = $section;
        }
    }

    assign('sectionList', $section_list);
}

//添加栏目
if( 'add' == $act ) {

    if( !check_purview('pur_section_add', $_SESSION['purview']) ) {
        show_system_message('权限不足', array());
        exit;
    }

    $get_section_list = 'select * from '.$db->table('section').' where 1 order by `path` ASC';
    $section_list = $db->fetchAll($get_section_list);

    foreach($section_list as $key => $section) {
        $count = count(explode(',', $section['path']));
        if($count > 1)
        {
            $temp = '|--'.$section['section_name'];
            while($count--)
            {
                $temp = '&nbsp;&nbsp;'.$temp;
            }

            $section['section_name'] = $temp;
            $section_list[$key] = $section;
        }
    }

    assign('sectionList', $section_list);
}

//编辑栏目
if( 'edit' == $act ) {
    if( !check_purview('pur_section_edit', $_SESSION['purview']) ) {
        show_system_message('权限不足', array());
        exit;
    }
    $id = getGET('id');
    $id = intval($id);

    if( 0 >= $id ) {
        show_system_message('参数错误', array());
        exit;
    }

    $get_section = 'select `id` from `'.DB_PREFIX.'section` where `parent_id`='.$id;
    $section = $db->fetchAll($get_section);

    if( empty($section) ) {
        show_system_message('栏目不存在', array());
        exit;
    }

    assign('section', $section);

}


//删除栏目
if( 'delete' == $act ) {
    if( !check_purview('pur_section_del', $_SESSION['purview']) ) {
        show_system_message('权限不足', array());
        exit;
    }

    $id = getGET('id');
    $id = intval($id);

    if(0 >= $id) {
        show_system_message('参数错误', array());
        exit;
    }

    $check_section = 'select `id` from `'.DB_PREFIX.'section` where `parent_id`='.$id;
    $section = $db->fetchAll($check_section);
    if($section) {
        show_system_message('当前栏目下有子栏目，请先删除或移走子栏目', array());
        exit;
    }

    if( $id == 1 ) {
        show_system_message('系统保留分类，不允许删除', array());
        exit;
    }

    $delete_section = 'delete from `'.DB_PREFIX.'section` where `id`='.$id.' limit 1';
    if($db->delete($delete_section)) {
        show_system_message('删除栏目成功', array());
        exit;
    } else {
        show_system_message('系统繁忙，请稍后再试', array());
        exit;
    }
}


$template .= $act.'.phtml';
$smarty->display($template);
