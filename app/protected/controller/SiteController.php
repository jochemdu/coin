<?php
class SiteController extends DooController{
	protected $TEMPLATE_ENGINE = 'SiteView';
	
	private $_action = null;
	private $_rendered = false;
	
	public $siteTitle = 'CryptMart';
	public $pageTitle;
	
	protected $data = array();
	
	public function r($view)
	{
		$this->_rendered = true;
		// import all class properties into local scope
		foreach($this as $key => $value)
		{
			if (substr($key, 0, 1) != '_')
			{
				if(isset($this->data[$key])){continue;}
				$this->data[$key] = $value;
			}
		}
		
		$this->renderc('layout/header', $this->data, true);
		$this->renderc($view, $this->data, true);
		$this->renderc('layout/footer', $this->data, true);
	}
	
	public function isPost() {
		return $_SERVER['REQUEST_METHOD'] == "POST";
	}
	
	public function beforeRun($resource, $action)
	{
		parent::beforeRun($resource, $action);
		$this->_action = $action; 
	}
	
	public function afterRun($routeResult)
	{
		$controller = strtolower( substr(get_class($this), 0, strpos(get_class($this), 'Controller')) );
		if($this->_rendered == false)
		{
			$this->r( $controller.'/'.$this->_action);
		}
		parent::afterRun($routeResult);
	}
}