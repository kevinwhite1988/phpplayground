<?php

public class Home extends BaseController
{
	protected function Index()
	{
		$viewdata = "Testing for right now.";
		$this->ReturnView($viewdata, true);
	}

	protected function About()
	{
		$viewdata = "About page will go here.";
		$this->ReturnView($viewdata, false);
	}
}


?>
