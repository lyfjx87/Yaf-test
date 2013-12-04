<?php

/**
 * 视图引擎定义
 * Smarty/Adapter.php
 */
class Local_Adapter implements Yaf_View_Interface 
{
	/**
	 * Smarty object
	 * @var Smarty
	 */
	public $_smarty;

	/**
	 * Constructor
	 *
	 * @param string $tmplPath
	 * @param array $extraParams
	 * @return void
	 */
	public function __construct($tmplPath = null, $extraParams = array()) {
		require APP_PATH . "/library/Smarty/libs/Smarty.class.php";
		$this->_smarty = new Smarty;
		if (null !== $tmplPath) {
			$this->setScriptPath($tmplPath);
		}
		foreach ($extraParams as $key => $value) {
			$this->_smarty->$key = $value;
		}
	}

	/**
	 * Assign variables to the template
	 *
	 * Allows setting a specific key to the specified value, OR passing
	 * an array of key => value pairs to set en masse.
	 *
	 * @see __set()
	 * @param string|array $spec The assignment strategy to use (key or
	 * array of key => value pairs)
	 * @param mixed $value (Optional) If assigning a named variable,
	 * use this as the value.
	 * @return void
	 */
	public function assign($spec, $value = null) {
		if (is_array($spec)) {
			$this->_smarty->assign($spec);
			return;
		}
		$this->_smarty->assign($spec, $value);
	}

	/**
	 * Processes a template and returns the output.
	 *
	 * @param string $name The template to process.
	 * @return string The output.
	 */
	public function render($name, $tpl_vars = NULL) {
		return $this->_smarty->fetch($name);
	}
	
	public function display($tpl, $tpl_vals = array()) {
		if (!empty($tpl_vals)){
			foreach ($tpl_vals as $k => $v) {
				$this->_smarty->assign($k, $v);
			}
		}
		return $this->_smarty->display($tpl); 
	}
	/**
	 * set view directory
	 */
	public function setScriptPath ($path) {
		if (is_readable($path)) {
			$this->_smarty->template_dir = $path;
			return;
		}
		throw new Exception('Smarty template path is Invalid ');
	}
	/**
	 * get view directory
	 */
	public function getScriptPath() {
		return $this->_smarty->template_dir;
	}
	
	public function __autoload($classname){//自动加载
		if (file_exists(APP_PATH . '/library/Smarty/sysplugins/'.$classname)) {
			require_once APP_PATH.'/library/Smarty/sysplugins/'.$classname;
		}
	}
	
	
}