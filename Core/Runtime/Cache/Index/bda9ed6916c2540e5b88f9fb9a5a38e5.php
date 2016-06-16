<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"></meta>
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/public.css" />
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/page.css" />
    <script type="text/javascript" src="/notes/Public/Index/js/jquery-1_10_2.js"></script>
    
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
            
            <table class="table">
                <tr>
                    <th>笔记id</th>
                    <td><?php echo ($note["id"]); ?></td>
                    <th>发布时间</th>
                    <td><?php echo ($note["publish_time"]); ?></td>
                </tr>
                <tr>
                    <th>笔记类型</th>
                    <td><?php echo ($note["c_name"]); ?></td>
                    <th>笔记标题</th>
                    <td><?php echo ($note["title"]); ?></td>
                </tr>
                <tr>
                    <th colspan="8">笔记内容</th>
                </tr>
                <tr>
                    <td colspan="8"><?php echo ($note["content"]); ?></td>
                </tr>
                <tr>
                    <th colspan="8">附件下载</th>
                </tr>
                <tr>
                    <td colspan="8">
                    <?php if(is_array($appendixes)): foreach($appendixes as $key=>$appendix): ?><a href="/notes/Public/Appendix/<?php echo ($appendix["location"]); ?>"><?php echo ($appendix["name"]); ?></a><br/><?php endforeach; endif; ?>
                    </td>
                </tr>
            </table>
        <a href="<?php echo U('Index/note/listView');?>">返回</a>

        </div>
    </body>
</html>