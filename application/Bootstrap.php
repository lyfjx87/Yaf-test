<?php
/**
 * Bootstrap类, 在这个类中, 所以以_init开头的方法
 * 都会被调用, 调用次序和申明次序相同
 *@author Liyufeng
*/

class Bootstrap extends Yaf_Bootstrap_Abstract {
	/**
	 * 注册本地类
	 * @param Yaf_Dispatcher $dispatcher
	 */
	function _initLib (Yaf_Dispatcher $dispatcher) {
		Yaf_Loader::getInstance()->registerLocalNamespace(array('Helper', 'Local', 'Smarty'));
	}	
	
	/**
	 * 把配置存到注册表
	 */
	public  function _initConfig(Yaf_Dispatcher $dispatcher) {
		$config = Yaf_Application::app()->getConfig();
		Yaf_Registry::set("Config",  $config);
	  	
	}
	/**
	 * 初始化数据库
	 * @param Yaf_Dispatcher $dispatcher
	 */
	public function _initDb(Yaf_Dispatcher $dispatcher) {
		/* $db = Yaf_Registry::get('config')->get('db')->toArray();
		$dbAdapter = Zend_Db::factory('PDO_MYSQL', $db);
		unset($db);
		$dbAdapter->query('SET NAMES UTF8');
		Zend_Db_Table::setDefaultAdapter($dbAdapter);
		unset($dbAdapter); */
	}
	
	/**
	 * 初始化模板引擎
	 * @param Yaf_Dispatcher $dispatcher
	 */
	public function  _initSmart(Yaf_Dispatcher $dispatcher) {
		$smarty = new Local_Adapter(null, Yaf_Registry::get('Config')->get('Smarty')->toArray());
		$dispatcher->setView($smarty);
		$dispatcher->autoRender (FALSE); // close auto render
	}
	/**
	 * 初始化插件
	 * @param unknown $dispatcher
	 */
	function _initPlugin($dispatcher) {
		$initPlugin = new InitPlugin();
		$dispatcher->registerPlugin($initPlugin);
	}
}