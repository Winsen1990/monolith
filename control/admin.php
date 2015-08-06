<?php
/**
 * 管理员
 * @author 王仁欢
 * @date 2015-01-09
 * @version 1.0.0
 */

include 'library/init.inc.php';
$template = 'themes/main/';

$action = 'login|forget';

$act = check_action($action, getGET('act'));
$act = ( $act == '' ) ? 'login' : $act;

if( 'login' == $act ) {
    
}



$template .= $act.'phtml';
$smarty->display($template);
