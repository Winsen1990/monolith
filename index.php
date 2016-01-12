<?php
/**
 * 网站首页
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-29
 */
include 'library/init.inc.php';

$get_ad_list = 'select `img`,`url`,`alt`,`ad_pos_id` from '.$db->table('ad').' where `ad_pos_id`<=6 order by `ad_pos_id`';
$ad_list_tmp = $db->fetchAll($get_ad_list);

$ad_list = array();

if($ad_list_tmp)
{
    foreach($ad_list_tmp as $ad_item)
    {
        $ad_list[$ad_item['ad_pos_id']] = $ad_item;
    }
}

assign('ad_list', $ad_list);

$smarty->display('index.phtml');
