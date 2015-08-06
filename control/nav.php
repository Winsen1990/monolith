<?php
/**
 * 导航管理
 * @author 王仁欢
 * @email wrh4285@163.com
 * @date 2015-8-6
 * @version 1.0.0
 */
include 'library/init.inc.php';
back_base_init();

$template = 'nav/';
assign('subTitle', '导航管理');

$action = 'edit|add|view';
$operation = 'edit|add';

$act = check_action($action, getGET('act'));
$act = ( $act == '' ) ? 'view' : $act;

$opera = check_action($operation, getPOST('opera'));

//===========================================================================

if( 'view' == $act ) {
    if(!check_purview('pur_nav_view', $_SESSION['purview']))
    {
        show_system_message('权限不足', array());
        exit;
    }

    $getNavs  = 'select * from `'.DB_PREFIX.'nav`';
    $getNavs .= ' order by `position` desc, `parent_id` asc, `order_view` asc' ;
    $navs = $db->fetchAll($getNavs);

//    foreach($navs as $key=>$nav)
//    {
//        $count = count(explode(',', $nav['path']));
//
//        if($count > 1)
//        {
//            $temp = '|--';
//
//            while($count--)
//            {
//                $temp = '&nbsp;&nbsp;'.$temp;
//            }
//
//            $nav['name'] = $temp.$nav['name'];
//        }
//
//        $navs[$key] = $nav;
//    }

    assign('navs', $navs);
}



$template .= $act.'.phtml';
$smarty->display($template);

