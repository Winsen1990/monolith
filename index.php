<?php
/**
 * 网站首页
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-29
 */
include 'library/init.inc.php';

$section_id = array(2,3,4,6,8);

$get_article_list = 'select `section_id`,`id`,`title` from '.$db->table('content').' where `section_id`=%d order by order_view ASC, add_time DESC limit 24';
$article_list = array();

foreach($section_id as $id)
{
    $get_article_sql = sprintf($get_article_list, $id);

    $article_list[$id] = $db->fetchAll($get_article_sql);
}

assign('article_list', $article_list);
$smarty->display('index.phtml');
