<?php
/**
 * 初始化程序
 * @author winsen
 * @version 1.0.0
 * @date 2015-01-09
 */
//设置系统相关参数
session_start();
date_default_timezone_set('Asia/Shanghai');
define('ROOT_PATH', str_replace('library/init.inc.php', '',str_replace('\\', '/', __FILE__)));
define('BASE_DIR', str_replace($_SERVER['DOCUMENT_ROOT'], '',str_replace('\\', '/', ROOT_PATH)));
if(!class_exists('AutoLoader'))
{
    include('AutoLoader.class.php');
}

$loader = AutoLoader::getInstance();
$configs = array('script_path'=>ROOT_PATH.'library/', 'class_path'=>ROOT_PATH.'library/');
$loader->setConfigs($configs);

$class_list = array('Smarty', 'Logs', 'MySQL', 'Code');
$loader->includeClass($class_list);
$script_list = array('configs','functions','lang', 'purview', 'content', 'section', 'statistics');
$loader->includeScript($script_list);
//初始化数据库链接
global $db;
$db = new MySQL(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DBNAME, DB_PREFIX);

$debug_mode = true;//开启此项将关闭Smarty缓存模式，并开启日志跟踪
//初始化日志对象
global $log;
$log_file = date('Ymd').'.log';
$log = new Logs($debug_mode, $log_file);

//读取网站设置
$get_sysconf = 'select `key`,`value` from '.$db->table('sysconf');
global $config;
$config_tmp = $db->fetchAll($get_sysconf);
if($config_tmp)
{
    foreach($config_tmp as $tmp)
    {
        $config[$tmp['key']] = $tmp['value'];
    }
}

//初始化smarty对象
global $smarty;
$smarty = new Smarty();
$smarty->setCompileDir(ROOT_PATH.'data/compiles');
$smarty->setTemplateDir(ROOT_PATH.'themes/'.$config['themes']);
$smarty->setCacheDir(ROOT_PATH.'data/caches');
$smarty->setCacheLifetime(1800);//设置缓存文件超时时间为1800秒

//Debug模式下每次都强制编译输出
if($debug_mode)
{
    $smarty->force_compile = true;
}

//设置语言包
assign('LANG', $lang);
//设置网站参数
assign('config', $config);
//设置模板路径
assign('template_dir', 'themes/'.$config['themes'].'/');

//获取导航栏
$get_nav = 'select `id`,`name`,`url`,`position` from '.$db->table('nav').' where `parent_id`=0 order by position ASC, order_view ASC';

$nav_tmp = $db->fetchAll($get_nav);
$nav = array(
    'top' => array(),
    'middle' => array(),
    'bottom' => array()
);

$current_script = str_replace(BASE_DIR, '', $_SERVER['REQUEST_URI']);

if($nav_tmp)
{
    foreach($nav_tmp as $n)
    {
        $current = false;

        if($current_script == $n['url'])
        {
            $current = true;
        }

        $get_children = 'select `name`,`url`,`position` from '.$db->table('nav').' where `parent_id`='.$n['id'].' order by order_view ASC';
        $nav[$n['position']][] = array(
            'name' => $n['name'],
            'url' => $n['url'],
            'current' => $current,
            'children' => $db->fetchAll($get_children)
        );
    }
}

assign('nav', $nav);

//获取置顶文章
$get_top_article = 'select `id`,`title` from '.$db->table('content').' order by order_view ASC limit 12';

$top_article = $db->fetchAll($get_top_article);
assign('top_article', $top_article);
