<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8"></meta>
   <title><?php echo ($title); ?></title>
   <link href="/notes/Public/Index/css/bootstrap.min.css" rel="stylesheet">
   <script src="/notes/Public/Index/js/jquery-3.0.0.min.js"></script> 
   <script type="text/javascript" src="/notes/Public/Index/js/bootstrap.min.js"></script>
   
</head>
<body>
<!-- class="container" 总共可以容纳12列 -->
<!-- <div class="container"> -->
<div class ="row">
<div class="col-md-12">
<nav class="navbar navbar-inverse" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo U('Index/Index/index');?>">用户笔记管理系统</a>
   </div>
   <div>
      <!-- 向左对齐 -->
      <ul class="nav navbar-nav navbar-left">
         <!-- class="active" -->
         <li><a href="<?php echo U('Index/Category/add');?>">添加笔记类别</a></li>
         <li><a href="<?php echo U('Index/Note/add');?>">添加笔记</a></li>
      </ul>
      <form action="<?php echo U('Index/Index/result');?>" method="post" class="navbar-form navbar-left" role="search">
         <div class="form-group">
            <input type="text" class="form-control" placeholder="搜索笔记" name="keywords">
         </div>
         <button type="submit" class="btn btn-default">搜索</button>
      </form>    
      <p class="navbar-text navbar-left">当前用户: <?php echo ($user["name"]); ?></p>
      <a class="navbar-text navbar-left" href="<?php echo U('Index/Index/logout');?>" target="_self">退出</a>
      <!-- <button type="button" class="btn btn-default navbar-btn" >退出</button> -->
   </div>
</nav>
</div>
</div>
<div class ="row">
<div class="col-md-2">
<ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="125">
                <!-- class="active" -->
                <li><a href="<?php echo U('Index/User/view');?>">用户信息修改</a></li>
                <li><a href="<?php echo U('Index/Category/listView');?>">笔记类别管理</a></li>
                <li><a href="<?php echo U('Index/Note/listView');?>">笔记&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp管理</a></li>
                <li><a href="<?php echo U('Index/Appendix/listView');?>">笔记附件管理</a></li>
</ul>
</div>
<div class="col-md-10">

<table class="table">
    <form action="<?php echo U('Index/User/editDo');?>" method="post">
        <tr>
            <th>用户名</th>
            <td><input type="text" style="width: 250px" value="<?php echo ($user["name"]); ?>" name="name"/></td>
        </tr>
        <tr>
            <th>原密码</th>
            <td><input type="password" style="width: 250px"  name="password"/></td>
        </tr>
        <tr>
            <th>新密码</th>
            <td><input type="password" style="width: 250px"  name="n_password"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="修改并保存" />
            </td>
        </tr>
    </form>
</table>

</div>
</div>
<!-- </div> -->
</body>
</html>