<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"></meta>
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/public.css" />
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/page.css" />
    <script type="text/javascript" src="/notes/Public/Index/js/jquery-1_10_2.js"></script>
    
    <script type="text/javascript" charset="utf-8" src="/notes/Public/Index/js/jquery-ui-1.10.4.custom.js"></script>
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/jquery-ui-1.10.4.custom.css" />

    <head>
        <title><?php echo ($title); ?></title>
    </head>
    <body>
        <div id="top">
            <div class="menu">
                <a href="<?php echo U('Index/Category/add');?>">添加笔记类别</a>
                <a href="<?php echo U('Index/Note/add');?>">添加笔记</a>
            </div>
            <div class="exit">
                <a href="<?php echo U('Index/Index/logout');?>" target="_self">退出</a>
                <a href="" target="_blank">获得帮助</a>
                <a href="<?php echo (L("url")); ?>" target="_blank"><?php echo (L("web")); ?></a>
            </div>
        </div>
        <div id="left">
            <dl>
                <dt>网站设置</dt>
                <dd><a href="<?php echo U('Index/User/view');?>">用户信息修改</a></dd>
                <dd><a href="<?php echo U('Index/Category/listView');?>">笔记类别管理</a></dd>
                <dd><a href="<?php echo U('Index/Note/listView');?>">笔记&nbsp&nbsp管理</a></dd>
                <dd><a href="<?php echo U('Index/Appendix/listView');?>">笔记附件管理</a></dd>
            </dl>
        </div>
        <div id="right">
            <h1><?php echo ($title); ?></h1><br/><br/>
            
    <div id="content">
        <table class="table">
            <tr>
                <th>id</th>
                <th>笔记类别名称</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($categories)): foreach($categories as $key=>$category): ?><tr>
                        <td>[<a href="<?php echo U('Index/Category/view',array('id'=>$category['id']));?>"><?php echo ($category["id"]); ?>]</a></td>
                        <td><?php echo ($category["name"]); ?></td>
                        <td>【<a href="<?php echo U('Index/Category/view',array('id'=>$category['id']));?>">查看该类别所有笔记</a>】
                        【<a href="<?php echo U('Index/Category/edit',array('id'=>$category['id']));?>">修改</a>】
                        【<a onclick="return confirm('确认要删除笔记类别？这将会删除该类别下的所有笔记以及笔记所对应的附件');" href="<?php echo U('Index/Category/delete',array('id'=>$category['id']));?>">删除</a>】
                        </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <div class="digg"><?php echo ($page); ?></div>
    </div>

        </div>
    </body>
</html>