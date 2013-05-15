<?php

public abstract class Databasemodels()
{
	private $dbhost = 'add host';
	private $dbname = 'add database name';
	private $dbuser = 'add db user';
	private $dbpass = 'add db user password';

	public $database = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
}

?>
