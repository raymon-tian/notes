<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"></meta>
            <link rel="stylesheet" type="text/css" href="/notes/Public/Index/css/login.css" />
            <script type="text/javascript" src="/notes/Public/Index/js/jquery-1_10_2.js"></script>
            <script type="text/javascript"> var verifyURL='<?php echo U("Index/Login/verify","","");?>'; </script>
            <script type="text/javascript" src="/notes/Public/Index/js/login.js"></script>
    </head>
    <body>
        <div id="top"></div>
        <div class="login">	
            <form action="<?php echo U('Index/Login/login');?>" method="post" id="login">
                <div class="title">
                    笔记管理系统 | 登录
                </div>
                <table border="1" width="100%">
                    <tr>
                        <th>帐号:</th>
                        <td>
                            <input type="username" name="username" class="len250"/>
                        </td>
                    </tr>
                    <tr>
                        <th>密码:</th>
                        <td>
                            <input type="password" class="len250" name="password"/>
                        </td>
                    </tr>
                    <tr>
                        <th>验证码:</th>
                        <td>
                            <input type="code" class="len250" name="code"/> <img src="<?php echo U('Index/Login/verify');?>" id="code"/> <a href="javascript:void(change_code(this));">看不清</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left:160px;"> <input type="submit" class="submit" value="登录"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>