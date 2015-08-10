<?php
/**
 * 友情链接管理
 * @author Winsen
 * @email airplace1@gmail.com
 * @date 2015-8-6
 * @version 1.0.0
 */
include 'library/init.inc.php';
back_base_init();

$template = 'friend/';
assign('subTitle', '友情链接管理');

$action = 'edit|add|view';
$operation = 'edit|add';

$act = check_action($action, getGET('act'));
$act = ( $act == '' ) ? 'view' : $act;

$opera = check_action($operation, getPOST('opera'));

//===========================================================================

if( 'view' == $act ) {
    if(!check_purview('pur_friend_view', $_SESSION['purview']))
    {
        show_system_message('权限不足', array());
        exit;
    }

    $get_friend_list  = 'select * from '.$db->table('friend_link').' order by `type`';
    $friend_list_tmp = $db->fetchAll($get_friend_list);
    $friend_list = array();
    if($friend_list_tmp)
    {
        foreach($friend_list_tmp as $friend)
        {
            if(!isset($friend['type']))
            {
                $friend_list[$friend['type']] = array();
            }
    
            $friend_list[$friend['type']][] = $friend;
        }
    }

    assign('friend_list', $friend_list);
}



$template .= $act.'.phtml';
$smarty->display($template);

