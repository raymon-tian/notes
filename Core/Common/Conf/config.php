<?php

return array(
	// '配置项'=>'配置值'
	'LOAD_EXT_CONFIG' => 'db',
	'DEFAULT_MODULE' => 'Index', 
	// 服务器设置，使用url 2
	// 'URL_MODEL'=>2,
	'SHOW_PAGE_TRACE' => false, // 显示debug
	// RBAC 验证
	//'USER_AUTH_ON' => true, // 是否开启验证
	//'USER_AUTH_TYPE' => 1, // 1登陆验证，2代表时时验证
	'USER_AUTH_KEY' => 'uid', // 用户认证识别号
	//'RBAC_SUPERADMIN' => 'admin', // 指定超级管理员账号
	//'ADMIN_AUTH_KEY' => 'superadmin', // 超级管理员识别
	//'REQUIRE_AUTH_MODULE' => '',
	//'NOT_AUTH_MODULE' => 'Index', // 无需验证的控制器
	//'NOT_AUTH_FUNCTION' => 'addNodeHandle,addRoleHandle,addUserHandle', // 无需验证的方法
	//'RBAC_ROLE_TABLE' => 'roles', // 角色表名称
	//'RBAC_USER_TABLE' => 'roles_users', // 角色与用户的中间表名称
	//'RBAC_ACCESS_TABLE' => 'access', // 权限表名称
	//'RBAC_NODE_TABLE' => 'nodes', // 节点表名称
	//多语言支持设置
	'LANG_SWITCH_ON'=>true,
	'DEFAULT_LANG'=>'zh-cn',
	'LANG_AUTO_DETECT'=>true,
	'LANG_LIST'=>'zh-cn',
    'VAR_LANGUAGE'  => 'lang',
    'URL_CASE_IN SEN SITIVE' => false, // 默认false 表示URL区分大小写 true则表示不区分大小写
	);
