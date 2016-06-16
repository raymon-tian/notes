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
                <th>标题</th>
                <th>笔记类别</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($notes)): foreach($notes as $key=>$note): ?><tr>
                    <td>
                    [<a href="<?php echo U('Index/note/view',array('id'=>$note['id']));?>"><?php echo ($note["id"]); ?></a>]
                    </td>
                    <td><?php echo ($note["title"]); ?></td>
                    <td><?php echo ($note["c_name"]); ?></td>
                    <td><?php echo ($note["publish_time"]); ?></td>
                    <td>
                        【<a href="<?php echo U('Index/note/view',array('id'=>$note['id']));?>">查看</a>】
                        【<a href="<?php echo U('Index/note/edit',array('id'=>$note['id']));?>">修改</a>】
                        【<a onclick="return confirm('确认要删除该文章？');" href="<?php echo U('Index/note/delete',array('id'=>$note['id']));?>" >删除</a>】
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <div class="digg"><?php echo ($page); ?></div>
    </div>

        </div>
    </body>
</html>