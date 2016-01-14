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

$action = 'edit|add|view|delete';
$operation = 'edit|add';

$act = check_action($action, getGET('act'));
$act = ( $act == '' ) ? 'view' : $act;

$opera = check_action($operation, getPOST('opera'));

if('edit' == $opera)
{
    $response = array('error'=>1, 'msg'=>'', 'errmsg'=>array());

    if(!check_purview('pur_friend_edit', $_SESSION['purview']))
    {
        $response['msg'] = '没有操作权限';
        echo json_encode($response);
        exit;
    }

    $eid = intval(getPOST('eid'));
    $url = getPOST('url');
    $img = getPOST('img');
    $name = getPOST('name');
    $type = getPOST('type');
    $order_view = intval(getPOST('order_view'));
    $no_followed = intval(getPOST('no_followed'));

    if($eid <= 0)
    {
        $response['msg'] = '参数错误';
    }

    if($url == '')
    {
        $response['errmsg']['url'] = '-请输入url';
    } else {
        $url = $db->escape($url);
    }

    if($type != 'text' && $type != 'img')
    {
        $type = 'text';
    } else {
        $type = $db->escape($type);
    }

    switch($type)
    {
    case 'img' : 
        if($img == '')
        {
            $response['errmsg']['img'] = '-请上传链接图片';
        } else {
            $img = $db->escape($img);
        }
        break;
    default:
        $img = '';
        break;
    }

    if($name == '')
    {
        $response['errmsg']['name'] = '-请输入链接名称';
    } else {
        $name = $db->escape($name);
    }

    if($order_view <= 0)
    {
        $response['errmsg']['order_view'] = '-请填写大于0的整数';
    }

    if($no_followed <= 0)
    {
        $no_followed = 0;
    } else {
        $no_followed = 1;
    }

    if(count($response['errmsg']) == 0 && $response['msg'] == '')
    {
        $link_data = array(
            'url' => $url,
            'img' => $img,
            'type' => $type,
            'no_followed' => $no_followed,
            'name' => $name,
            'order_view' => $order_view
        );

        if($db->autoUpdate('friend_link', $link_data, '`id`='.$eid))
        {
            $response['msg'] = '修改友情链接成功';
            $response['error'] = 0;
        } else {
            $response['msg'] = '系统繁忙，请稍后再试';
        }
    }

    echo json_encode($response);
    exit;
}

if('add' == $opera)
{
    $response = array('error'=>1, 'msg'=>'', 'errmsg'=>array());

    if(!check_purview('pur_friend_add', $_SESSION['purview']))
    {
        $response['msg'] = '没有操作权限';
        echo json_encode($response);
        exit;
    }

    $url = getPOST('url');
    $img = getPOST('img');
    $name = getPOST('name');
    $type = getPOST('type');
    $order_view = intval(getPOST('order_view'));
    $no_followed = intval(getPOST('no_followed'));

    if($url == '')
    {
        $response['errmsg']['url'] = '-请输入url';
    } else {
        $url = $db->escape($url);
    }

    if($type != 'text' && $type != 'img')
    {
        $type = 'text';
    } else {
        $type = $db->escape($type);
    }

    switch($type)
    {
    case 'img' : 
        if($img == '')
        {
            $response['errmsg']['img'] = '-请上传链接图片';
        } else {
            $img = $db->escape($img);
        }
        break;
    default:
        $img = '';
        break;
    }

    if($name == '')
    {
        $response['errmsg']['name'] = '-请输入链接名称';
    } else {
        $name = $db->escape($name);
    }

    if($order_view <= 0)
    {
        $response['errmsg']['order_view'] = '-请填写大于0的整数';
    }

    if($no_followed <= 0)
    {
        $no_followed = 0;
    } else {
        $no_followed = 1;
    }

    if(count($response['errmsg']) == 0)
    {
        $link_data = array(
            'url' => $url,
            'img' => $img,
            'type' => $type,
            'no_followed' => $no_followed,
            'name' => $name,
            'order_view' => $order_view
        );

        if($db->autoInsert('friend_link', array($link_data)))
        {
            $response['msg'] = '新增友情链接成功';
            $response['error'] = 0;
        } else {
            $response['msg'] = '系统繁忙，请稍后再试';
        }
    }

    echo json_encode($response);
    exit;
}


if('view' == $act)
{
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

if('edit' == $act)
{
    if( !check_purview('pur_friend_edit', $_SESSION['purview']) ) {
        show_system_message('权限不足');
        exit;
    }

    $id = intval(getGET('id'));

    $get_link = 'select `id`,`url`,`img`,`name`,`order_view`,`type`,`no_followed` from '.$db->table('friend_link').' where `id`='.$id;

    assign('link', $db->fetchRow($get_link));
}

if('delete' == $act)
{
    if( !check_purview('pur_friend_del', $_SESSION['purview']) ) {
        show_system_message('权限不足');
        exit;
    }

    $id = intval(getGET('id'));

    if($id <= 0)
    {
        show_system_message('请求失败');
        exit;
    }

    $get_img = 'select `img` from '.$db->table('friend_link').' where `id`='.$id;

    $img = $db->fetchOne($get_img);

    if($db->autoDelete('friend_link', '`id`='.$id))
    {
        if($img)
        {
            unlink('./../..'.$img);
        }
        show_system_message('删除友情链接成功');
        exit;
    } else {
        show_system_message('系统繁忙，请稍后再试');
        exit;
    }
}

$template .= $act.'.phtml';
$smarty->display($template);

