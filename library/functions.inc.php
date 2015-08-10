<?php
/**
 * 公共函数库
 * @author winsen
 * @version 1.0.0
 * @date 2015-07-28
 */

/**
 * 权限检查函数
 * @param int $sys_purview 系统定义的权限
 * @param int $user_purview 用户的权限
 * @return bool 拥有该权限时返回true,否则返回false
 * @author winsen
 * @date 2015-07-28
 */
function check_purview($sys_purview, $user_purview)
{
    $user_purview = json_decode($user_purview);
    $has_power = false;
    foreach( $user_purview as $key => $value ) {
        if( in_array($sys_purview, $value) ) {
            $has_power = true;
            break;
        }
    }
    return $has_power;
}

/**
 * 权限合并
 * @param array $user_purview 用户的权限
 * @param mixed $purviewList 需要合并的权限列表
 * @return int 返回合并后的权限
 * @author winsen
 * @date 2015-07-28
 */
function combile_purview($user_purview, $purview_list)
{
    if(is_array($purview_list))
    {
        $user_purview = array_merge($user_purview, $purview_list);
    }

    if(is_string($purview_list))
    {
        $user_purview[] = $purview_list;
    }

    $user_purview = array_flip($user_purview);
    $user_purview = array_flip($user_purview);
    ksort($user_purview);

    return $user_purview;
}

/**
 * smarty assign函数
 * @param string $var 参数名
 * @param mixed $value 参数值
 * @return void
 * @author winsen
 * @date 2015-07-28
 */
function assign($var, $value)
{
    global $smarty;
    $smarty->assign($var, $value);
}

/**
 * 获取GET的参数封装
 * @param string $var 参数名
 * @return mixed 返回对应的参数,如果参数不存在,则返回null
 * @author winsen
 * @date 2015-07-28
 */
function getGET($var)
{
    if(isset($_GET[$var]))
    {
        return $_GET[$var];
    } else {
        return null;
    }
}

/**
 * 获取POST的参数封装
 * @param string $var 参数名
 * @return mixed 返回对应的参数,如果参数不存在,则返回null
 * @author winsen
 * @date 2015-07-28
 */
function getPOST($var)
{
    if(isset($_POST[$var]))
    {
        return $_POST[$var];
    } else {
        return null;
    }
}

/**
 * 验证页面的act或opera值的合法性
 * @param string $needle 合法操作字符串,多个操作用|分隔开
 * @param string $search 待验证的操作
 * @param string $default 若为非法操作,则采用默认值替换
 * @author winsen
 * @date 2015-07-28
 */
function check_action($needle, $search, $default = '')
{
    if(!$needle || false === strpos($needle, $search))
    {
        return $default;
    } else {
        return $search;
    }
}

/**
 * 显示系统信息
 * @param string $msg 系统提示的文本信息
 * @param mixed $links 自动跳转以及其他链接
 * @param int $time 自动跳转计时
 * @return void
 * @author winsen
 * @date 2015-07-28
 */
function show_system_message($msg, $links = array(), $time = 5)
{
    global $smarty;
    assign('message', $msg);
    if(count($links) > 0)
    {
    	assign('link', $links[0]['link']);
        assign('links', $links);
    } else {
    	assign('link', $_SERVER['HTTP_REFERER']);
        assign('links', array(array('alt'=>'返回上一页', 'link'=> $_SERVER['HTTP_REFERER'])));
    }
    assign('time', $time);
    assign('page_title', '系统信息');
    $smarty->display('public/message.phtml');
    exit;
}

/**
 * 备份数据库
 * @param mixed $tables
 * @param bool $with_struct
 * @param bool $with_drop_table
 * @return string
 * @author winsen
 * @date 2015-07-28
 */
function backup($tables = null)
{
    global $db;

    $file_name = 'backup/db-backup-'.date('YmdHis').'.sql';

    if(!dir('backup'))
    {
        mkdir('backup');
    }

    $content = '';

    if(!$tables)
    {
        $tables = array();
        //不指定要备份的表，默认为完整备份整个数据库
        $get_tables = 'show tables;';

        $tables_tmp = $db->fetchAll($get_tables);
        foreach($tables_tmp as $value)
        {
            foreach($value as $table)
            {
                $tables[] = $table;
            }
        }
    } else if(is_string($tables)) {
        $tables = array($tables);
    }

    //备份结构和数据
    $create_sql_format = '%s;'."\n\n%s\n\n\n";
    $get_table_struct = 'show create table %s;';
    $get_table_data = 'select * from %s;';

    foreach($tables as $table)
    {
        $get_table_struct_sql = sprintf($get_table_struct, $table);
        $get_table_data_sql = sprintf($get_table_data, $table);

        $create_table_sql = $db->fetchRow($get_table_struct_sql);
        $cnt = 0;
        $table_type = 'table';
        foreach($create_table_sql as $key=>$value)
        {
            if($cnt == 1)
            {
                $create_table_sql .= $value;
                break;
            } else {
                if($key == 'Table')
                {
                    $create_table_sql = 'DROP TABLE IF EXISTS `'.$table.'`;'."\n"; 
                    $table_type = 'table';
                } else if($key == 'View') {
                    $create_table_sql = 'DROP VIEW IF EXISTS `'.$table.'`;'."\n";
                    $table_type = 'view';
                }
            }
            $cnt++;
        }

        $data_set = $db->fetchAll($get_table_data_sql);
        $record_count = count($data_set);
        $data_sql = '';
        if($record_count && $table_type == 'table')
        {
            for($i = 0; $i < $record_count; $i++)
            {
                if($i%256 == 0)
                {
                    $data_sql .= 'INSERT INTO `'.$table.'` VALUES (';
                } else {
                    $data_sql .= ' (';
                }

                foreach($data_set[$i] as $value)
                {
                    $data_sql .= '\''.addslashes($value).'\',';
                }
                $data_sql = substr($data_sql, 0, strlen($data_sql)-1);
                $data_sql .= ')';

                if($i != $record_count-1 && (($i+1)%256 != 0 || $i == 0))
                {
                    $data_sql .= ",\n";
                } else {
                    $data_sql .= ";\n";
                }
            }
        }

        $content .= sprintf($create_sql_format, $create_table_sql, $data_sql);
    }

    $handler = fopen($file_name, 'w');
    fwrite($handler, $content);
    fclose($handler);

    return $file_name;
}

/**
 * 检测管理员是否已登陆
 * @author 王仁欢
 * @date 2015-08-05
 * @return bool
 */
function check_admin_login()
{
    if(isset($_SESSION['purview']) && isset($_SESSION['account']))
    {
        return true;
    } else {
       return false;
    }
}

/**
 * 重定向
 * @param $url
 * @author 王仁欢
 * @date 2015-08-05
 * @return void
 */
function redirect($url) {
    header('Location:'.$url);
    exit;
}

/**
 * 后台文件初始化，检查是否已登陆，根据权限生成菜单，assign通用信息
 * @author 王仁欢
 * @date 2015-08-05
 * @return void
 */
function back_base_init() {
    //是否已登陆
    if( !check_admin_login() ) {
        show_system_message('请先登陆', array(array('link' => 'index.php', 'alt' => '登陆')));
        exit;
    }

    $activeNav = get_active_nav();
    $realMenus = create_menu();
    if( $activeNav != 'main.php') {
        $is_main = false;
    } else {
        $is_main = true;
    }
    global $menus;
    $menuMark = array();
    foreach( $menus as $key => $menu ) {
        if( $activeNav == $menu['url'] ) {
            $menuMark['name'] = $realMenus[$menu['parent']]['key'];
            $menuMark['count'] = $realMenus[$menu['parent']]['count'];
            break;
        }
    }
//    var_dump($realMenus);exit;

    assign('menuMark', $menuMark);

    assign('is_main', $is_main);
    assign('activeNav', $activeNav);
    assign('pageTitle', '磐石CMS-管理后台');
    assign('currentAdmin', $_SESSION['name']);
}


/**
 * 生成后台菜单
 * @author 王仁欢
 * @date 2015-08-05
 * @return mixed
 */
function create_menu() {
    global $menus;
    global $topMenus;
    $purview = $_SESSION['purview'];
    $purview = json_decode($purview);
//    $menu = array();
    foreach($purview as $key => $value) {
        if( count($value) > 0 && isset($menus[$key])) {
            $menu = $menus[$key];
            $temp = $menus[$key]['parent'];//menu_nav
            if( isset( $topMenu[$temp]) ) {//exists
                $topMenu[$temp]['count']++;
                $topMenu[$temp]['children'][] = $menu;
            } else {
                $topMenu[$temp] = $topMenus[$temp];
                $topMenu[$temp]['key'] = $temp;
                $topMenu[$temp]['url'] = $menu['url'];
                $topMenu[$temp]['count'] = 1;
                $topMenu[$temp]['children'][] = $menu;
            }
        }
    }
    assign('menus', $topMenu);
    return $topMenu;
}

/**
 * @return string 当前文件名
 * @author 王仁欢
 *
 */
function get_active_nav() {
    $url = $_SERVER['PHP_SELF'];
    $filename= substr( $url , strrpos($url , '/')+1 );
    return $filename;
}
