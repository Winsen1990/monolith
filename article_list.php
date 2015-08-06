<?php
/**
 * 栏目页
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-29
 */
include 'library/init.inc.php';

$id = intval(getGET('id'));
$page = intval(getGET('page'));

if($page <= 0)
{
    $page = 1;
}

$get_section = 'select `section_name`,`keywords`,`description` from '.$db->table('section').' where `id`='.$id;

$section = $db->fetchRow($get_section);

if(!$section)
{
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    header('Location: 404.php');
    exit;
}

$get_total_count = 'select count(*) from '.$db->table('content').' where `section_id`='.$id;
$total_count = $db->fetchOne($get_total_count);

$total_page = intval($total_count/$config['section_step']);

if($total_count%$config['section_step'])
{
    $total_page++;
}

if($page > $total_page)
{
    $page = $total_page;
}

$limit = ($page - 1)*$config['section_step'].', '.$config['section_step'];

$get_article_list = 'select `title`,`id` from '.$db->table('content').' where `section_id`='.$id;

$article_list = $db->fetchAll($get_article_list);

$script = preg_replace('/\&page=\d+$/', '', $_SERVER['REQUEST_URI']);
assign('script', $script);
assign('page', $page);
assign('total_page', $total_page);
assign('section', $section);
assign('article_list', $article_list);
assign('page_title', $section['section_name']);
$smarty->display('article_list.phtml');
