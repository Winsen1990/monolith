<?php
/**
 * 管理后台首页
 * @author 王仁欢
 * @email wrh4285@163.com
 * @date 2015-8-5
 * @version 1.0.0
 */

include 'library/init.inc.php';

//管理后台初始化
back_base_init();
$template = 'main/';

$action = 'view';
$act = check_action($action, getGET('act'));
$act = ( $act == '' ) ? 'view' : $act;

$get_content_count = 'select count(*) from '.$db->table('content').' where status = 1';
$content_count =$db->fetchOne($get_content_count);

$get_section_count = 'select count(*) from '.$db->table('section').' where 1';
$section_count = $db->fetchOne($get_section_count);

$get_user_count = 'select count(*) from '.$db->table('admin').' where 1';
$user_count = $db->fetchOne($get_user_count);

assign('content_count', $content_count);
assign('section_count', $section_count);
assign('user_count', $user_count);


$template .= $act.'.phtml';
$smarty->display($template);




