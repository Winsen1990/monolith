<?php
/**
 * 初始化数据库
 */
include 'library/init.inc.php';

$table = array();
$sql = array();

$table[] = '栏目';
$sql[] = 'create table if not exists '.$db->table('section').' (
    `id` int not null auto_increment primary key,
    `section_name` varchar(255) not null,
    `parent_id` int not null default \'0\',
    `path` varchar(255),
    `keywords` varchar(255),
    `description` varchar(255),
    `order_view` int not null default \'50\',
    `thumb` varchar(255),
    `original` varchar(255)
) default charset=utf8;';

$table[] = '内容';
$sql[] = 'create table if not exists '.$db->table('content').' (
    `id` int not null auto_increment primary key,
    `title` varchar(255) not null,
    `author` varchar(255) not null,
    `add_time` int not null,
    `content` text,
    `wap_content` text,
    `last_modify` timestamp,
    `keywords` varchar(255),
    `description` varchar(255),
    `thumb` varchar(255),
    `original` varchar(255),
    `order_view` int not null default \'50\',
    `original_url` varchar(255),
    `section_id` int not null
) default charset=utf8;';

$table[] = '访问统计';
$sql[] = 'create table if not exists '.$db->table('statistics').' (
    `id` bigint not null auto_increment primary key,
    `request_time` int not null,
    `ip` varchar(255) not null,
    `source` varchar(255) not null,
    `destination` varchar(255) not null,
    `keep_alive` int,
    `cookie` varchar(255) not null,
    `agent` varchar(255) not null,
    `markup` varchar(255)
) default charset=utf8;';

$table[] = '友情链接';
$sql[] = 'create table if not exists '.$db->table('friend_link').' (
    `id` int not null auto_increment primary key,
    `url` varchar(255) not null,
    `img` varchar(255),
    `type` varchar(255) not null default \'text\',
    `no_followed` tinyint(1) not null default \'0\',
    `name` varchar(255) not null,
    `order_view` int not null default \'50\'
) default charset=utf8;';

$table[] = '站点参数';
$sql[] = 'create table if not exists '.$db->table('sysconf').' (
    `key` varchar(255) not null primary key,
    `name` varchar(255) not null,
    `value` text,
    `type` varchar(255) not null,
    `options` text,
    `group` varchar(255)
) default charset=utf8;';

$table[] = '广告位置';
$sql[] = 'create table if not exists '.$db->table('ad_position').' (
    `id` int not null auto_increment primary key,
    `pos_name` varchar(255) not null,
    `width` decimal(18,2) not null,
    `height` decimal(18,2) not null,
    `number` int not null default \'1\',
    `code` text
) default charset=utf8;';

$table[] = '广告';
$sql[] = 'create table if not exists '.$db->table('ad').' (
    `id` int not null auto_increment primary key,
    `img` varchar(255) not null,
    `alt` varchar(255),
    `add_time` int not null,
    `begin_time` int,
    `end_time` int,
    `forever` tinyint(1) not null default \'0\',
    `click_time` int not null default \'0\',
    `url` varchar(255) not null,
    `order_view` int not null default \'50\',
    `ad_pos_id` int not null
) default charset=utf8;';

$table[] = '角色';
$sql[] = 'create table if not exists '.$db->table('role').' (
    `id` int not null auto_increment primary key,
    `purview` text not null,
    `name` varchar(255) not null
) default charset=utf8;';

$table[] = '管理员';
$sql[] = 'create table if not exists '.$db->table('admin').' (
    `account` varchar(255) not null primary key,
    `password` varchar(255) not null,
    `email` varchar(255) not null,
    `name` varchar(255) not null,
    `sex` char(2) not null,
    `role_id` int not null
) default charset=utf8;';

$table[] = '导航栏';
$sql[] = 'create table if not exists '.$db->table('nav').' (
    `id` int not null auto_increment primary key,
    `name` varchar(255) not null,
    `url` varchar(255) not null,
    `parent_id` int not null default \'0\',
    `position` varchar(255) not null,
    `order_view` int not null default \'50\'
) default charset=utf8;';

echo '创建数据库表:<br/>';
foreach($table as $key=>$name)
{
    echo $name;

    $dot_count = 40 - mb_strlen($name)*3;
    while($dot_count--)
    {
        echo '-';
    }
    
    if($db->query($sql[$key]))
    {
        echo ' <font color="green">success</font><br/>';
    } else {
        echo ' <font color="red">fail</font><br/>';
    }
}
