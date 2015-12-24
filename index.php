<?php
/**
 * 网站首页
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-29
 */
include 'library/init.inc.php';

$get_ad_list = 'select `img`,`url`,`alt` from '.$db->table('ad').' where `ad_pos_id`=1';
$ad_list = $db->fetchAll($get_ad_list);
assign('ad_list', $ad_list);

$smarty->display('index.phtml');
