<?php

namespace Index\Model;

use Think\Model\ViewModel;

class NoteViewModel extends ViewModel {
	public $viewFields = array(
		'note' => array('id','title','content','publish_time'),
		'category' => array('id' => 'brand_id', 'name' => 'brand_name', '_on' => 'en_products.brand_id=en_brands.id'),
		'appendix' => array('id' => 'a_id', 'name' => 'a_name', '_on' => 'en_brands.category_id=en_category.id'),
		);
}

?>
