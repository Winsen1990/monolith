<?php
/**
 * 初始化数据
 */
include 'library/init.inc.php';
$table = array();
$data = array();

//站点参数
$table[] = 'sysconf';
$data[] = array(
    array('key'=>'site_name', 'name'=>'站点名称', 'value'=>'磐石CMS', 'type'=>'text', 'group'=>'config'),
    array('key'=>'domain', 'name'=>'站点域名', 'value'=>'http://localhost/monolith', 'type'=>'text', 'group'=>'config'),
    array('key'=>'description', 'name'=>'站点描述', 'value'=>'', 'type'=>'textarea', 'group'=>'config'),
    array('key'=>'keywords', 'name'=>'关键词', 'value'=>'', 'type'=>'text', 'group'=>'config'),
    array('key'=>'themes', 'name'=>'模板', 'value'=>'cs', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'icp', 'name'=>'ICP备案号', 'value'=>'', 'type'=>'text', 'group'=>'config'),
    array('key'=>'address', 'name'=>'地址', 'value'=>'', 'type'=>'text', 'group'=>'config'),
    array('key'=>'phone', 'name'=>'联系电话', 'value'=>'', 'type'=>'text', 'group'=>'config'),
    array('key'=>'server', 'name'=>'QQ客服', 'value'=>'', 'type'=>'textarea', 'group'=>'config'),
    array('key'=>'static', 'name'=>'伪静态', 'value'=>'0', 'type'=>'radio', 'group'=>'config'),
    array('key'=>'compress', 'name'=>'压缩输出', 'value'=>'0', 'type'=>'radio', 'group'=>'config'),
    array('key'=>'logo', 'name'=>'LOGO图片', 'value'=>'',  'type'=>'img', 'group'=>'config'),
    array('key'=>'sthumb_height', 'name'=>'栏目缩略图高度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'sthumb_width', 'name'=>'栏目缩略图宽度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'soriginal_height', 'name'=>'栏目大图高度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'soriginal_width', 'name'=>'栏目大图宽度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'cthumb_height', 'name'=>'内容缩略图高度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'cthumb_width', 'name'=>'内容缩略图宽度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'coriginal_height', 'name'=>'内容大图高度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'coriginal_width', 'name'=>'内容大图宽度', 'value'=>'', 'type'=>'text', 'group'=>'themes'),
    array('key'=>'statistics', 'name'=>'统计', 'value'=>'1', 'type'=>'radio', 'group'=>'config'),
    array('key'=>'owner', 'name'=>'网站主体', 'value'=>'广州君穗信息科技有限公司', 'type'=>'text', 'group'=>'config')
);

//管理员
$table[] = 'admin';
$data[] = array(
    array('account'=>'kwanson', 'password'=>md5('kwanson'.PASSWORD_END), 'email'=>'support@kwanson.com', 'name'=>'君穗科技', 
          'sex'=>'M', 'role_id'=>1)
);

$user_purview = array();
foreach($purview as $group)
{
    foreach($group['items'] as $items)
    {
        foreach($items['operations'] as $item)
        {
            $user_purview[] = $item['purview'];
        }
    }
}
//角色
$table[] = 'role';
$data[] = array(
    array('id'=>1, 'name'=>'超级管理员', 'purview'=>json_encode($user_purview))
);

//栏目
$table[] = 'section';
$data[] = array(
    array('id'=>1, 'section_name'=>'系统保留分类', 'parent_id'=>0, 'path'=>'1,')
);

echo '初始化数据:<br/>';
foreach($table as $key=>$name)
{
    $db->query('truncate table '.$db->table($name).';');
    echo $name;

    $dot_count = 30 - strlen($name);

    while($dot_count--)
    {
        echo '-';
    }

    if($db->autoInsert($name, $data[$key]))
    {
        echo ' <font color="green">success</font><br/>';
    } else {
        echo ' <font color="red">fail</font><br/>';
    }
}
