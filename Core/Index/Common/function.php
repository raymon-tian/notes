<?php

/**
 * 节点数组重组
 */
function node_merge($nodes, $access = null, $pid = 0) {
	$arr = array();
	foreach ($nodes as $node) {
		if (is_array($access)) {
			$node['access'] = in_array($node['id'], $access) ? 1 : 0;
		} 
		// 如果pid为0,得到节点根目录,递归循环
		if ($node['pid'] == $pid) {
			$node['child'] = node_merge($nodes, $access, $node['id']);
			$arr[] = $node;
		}
	}
	return $arr;
}

?>
