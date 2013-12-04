<?php
/**
 * 用户session， 登入信息
 * @author Liyufeng
 */
class Local_UserInfo {
	protected $_request;
	public $_admin_session;
	public $_normal_session;
	
	public function __construct(Yaf_Request_Abstract $request) {
			$this->_request = $request;
			$this->_admin_session = new Zend_Session_Namespace('user');
			$this->_normal_session = new Zend_Session_Namespace('ad_user');		
	}
	/**
	 * 获取用户
	 * @return Zend_Session_Namespace
	 */
	public function getSession () {
		return $this->isAdmin() ? $this->_admin_session : $this->_normal_session;
	}
	
	/**
	 * 用户是否是管理员
	 * @return boolean
	 */
	public function isAdmin() {
		return ($this->_request->getModuleName() === 'Admin') ? true : false;
	}
	
	/**
	 * 是否登入
	 * @return boolean
	 */
	public function isLogin() {
		$session = $this->getSession();
		return  (isset($session->user_id) && trim($session->user_id) != '') ? true: false;
	}
	
}