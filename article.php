<?php
/**
 * 内容页
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-29
 */
include 'library/init.inc.php';

$id = intval(getGET('id'));

$get_article = 'select `title`,`author`,`add_time`,`content`,`keywords`,`description`,`section_id` from '.
               $db->table('content').' where `id`='.$id;

$article = $db->fetchRow($get_article);

if($article)
{
    $article['add_time'] = date('Y-m-d H:i:s', $article['add_time']);

    $get_section = 'select `id`,`section_name` from '.$db->table('section').' where `id`='.$article['section_id'];
    $section = $db->fetchRow($get_section);
} else {
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    header('Location: 404.php');
    exit;
}

assign('section', $section);
assign('article', $article);
assign('page_title', $article['title']);
$smarty->display('article.phtml');
