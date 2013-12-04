<?php

class IndexController extends Yaf_Controller_Abstract
{
	public function indexAction()
	{
		$data = array("title"=>"Yef Test", "words"=>"Hello World");
		$this->_view->display('index/index.tpl', $data);
	}
	
	
	
}
?>