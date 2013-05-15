<?php

public class Timeclockapp 
{
	//should I extend this off of a database base class?
}

public interface iUser
{
	public function getUsername();
	public function setUsername();
	public function getUserID();
	public function setUserID();
}

public interface iEmployee
{
	public function getRole();
	public function setRole();
	public function getPayrate();
	public function setPayrate();
}

public abstract class Employee implements iUser, iEmployee
{
	private $username;
	private $userid;
	private $role;
	private $payrate;
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setUsername($username);
	{
		$this->username = $username;
	}
	
	public function getUserid()
	{
		return $this->userid;
	}
	
	public function setUserid($userid)
	{
		$this->userid = $userid;
	}
	
	public function getRole()
	{
		return $this->role;
	}
	public function setRole($role)
	{
		$this->role = $role;
	}
	public function getPayrate()
	{
		return $this->payrate;
	}
	public function setPayrate($payrate)
	{
		$this->payrate = $payrate;
	}
	function __construct($userid)
	{
		//use this to construct user after authenticating
	}
	
}
	
?>
