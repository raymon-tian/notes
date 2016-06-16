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
            
    <form action="<?php echo U('Index/Note/addDo');?>" enctype="multipart/form-data" method="post">
        <table class="table">
            <tr>
                <th>笔记类型</th>
                <td>
                    <select name="c_id">
                        <?php if(is_array($types_note)): foreach($types_note as $key=>$menu): ?><option value="<?php echo ($menu["id"]); ?>"><?php echo ($menu["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
                <th>笔记标题</th>
                <td> <input style="width: 300px" type="text" name="title"  value="" /></td>
            </tr> 
            <tr>
                <th colspan="6">笔记内容</th>
            </tr>
        </table>
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain"></script>
            <!-- 配置文件 -->
            <script type="text/javascript" src="/notes/Public/ueditor/ueditor.config.js"></script>
            <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="/notes/Public/ueditor/ueditor.all.js"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                UE.getEditor('container', {
                    "initialFrameWidth": "80%",
                    "initialFrameHeight": 250,
                });
            </script>
        <table class="table">
            <tr>
                <th>上传资料</th>
                <td>
                    <input type="file" name="fileurl[]" multiple />
                </td>
                <th>保存新增</th>
                <td> <input type="submit" value="请保存"/></td>
            </tr> 
        </table>
        </form>

        </div>
    </body>
</html>