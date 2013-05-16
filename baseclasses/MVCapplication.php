<?php

namespace MVCapplication;

class Application
{
	
	private $controller;
	private $action;
	private $url;
	private $id;
	
	//need to start making views
	//Storing url on construction and setting to home/index if it's blank
	public function __construct($url)
	{
		$this->url = $url;
		$this->id = $this->url['id'];
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
	
	//If data is posted, this static function is called instead of creating a new Application object
	public static function Dataposted($url, $posted)
	{
		$instance = new self();
		$instance->posted = $posted;
		$instance->url = $url;
		$this->id = $this->url['id'];
		if ($instance->url['controller'] == "")
		{
			$instance->controller = "home";
		}
		else
		{
			$instance->controller = $instance->url['controller'];
		}
		if ($instance->url['action'] == "") 
		{
			$instance->action = "index";
		}
		else
		{
			$instance->action = $instance->url['action'];
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
		$viewlocation = 'views/' . get_class($this) . '/' . $this->action . '.php';
		if($fullview)
		{
			require('views/maintemplate.php');
		}
		else
		{
			require($viewlocation);
		}
	}
}

?>
