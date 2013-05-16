<?php

namespace MVCapplication;

class MVCapplication
{
	
	private $controller;
	private $action;
	private $url;
	private $posted;
	
	//need to start making views
	//Storing url on construction and setting to home/index if it's blank
	public function __construct($url)
	{
		$this->url = $url;
		if ($this->url['controller'] == "")
		{
			$this->controller = "home";
		}
		else
		{
			$this->controller = $this->url['controller'];
		}
		if ($this->url['action'] == "") 
		{
			$this->action = "index";
		}
		else
		{
			$this->action = $this->url['action'];
		}
	}
	

	public function CreateController()
	{
		if (class_exists($this->controller))
		{
			$parents = class_parents($this->controller);
			if (in_array("BaseController",$parents)) 
			{
				if (method_exists($this->controller,$this->action)) 
				{
					return new $this->controller($this->action,$this->url);
				}
				else
				{
					return new Error("badUrl",$this->url);
				}
			}
			else
			{
				return new Error("badUrl",$this->url);
			}
		}
		else
		{
			return new Error("badUrl",$this->url);
		}
	}
}
	
abstract class BaseController
{
	protected $url;
	protected $action;
	public function __construct($action, $url)
	{
		$this->action = $action;
		$this->url = $url;
	}
	
	public function ExecuteAction()
	{
		return $this->{$this->action}();
	}
	
	protected function ReturnView($viewmodel, $fullview)
	{
		$viewloc = 'views/' . get_class($this) . '/' . $this->action . '.php';
		if($fullview)
		{
			require('../../views/maintemplate.php');
		}
		else
		{
			require($viewloc);
		}
	}
}


?>
