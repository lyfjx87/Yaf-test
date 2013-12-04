<?php
class InitPlugin extends Yaf_Plugin_Abstract {
	
	//在路由之前触发
	public  function routerStartup (Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		//var_dump($request);exit;
		
	}
	
	//路由结束之后触发
	public  function routerShutdown (Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		if($request->getControllerName() =='Api') {
			return;
		}
		$userInfo = new Local_UserInfo($request);
		if (!$userInfo->isLogin()) {
			$controller_name = $request->getControllerName();
			if ($controller_name != 'Index' && $controller_name != 'Login')
			{
				$login_url = '/';
				if ($request->getModuleName() == 'Admin') {
					$login_url = '/admin/index/login';									
				}		
				header("LOCATION: $login_url");exit;
				
			}
		}
		Yaf_Registry::set('UserInfo', $userInfo);
	}
	
	//分发循环开始之前被触发	 
	public  function dispatchLoopStartup (Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		//var_dump(3);
		
		
	}
	
	//分发之前触发
	public  function preDispatch (Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		//var_dump(4);
	
	}
	
	//分发结束之后触发
	public  function postDispatch (Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		//var_dump(5);
	
	}
	//分发循环结束之后触发,
	public  function dispatchLoopShutdown (Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
	
	}
	
	
}