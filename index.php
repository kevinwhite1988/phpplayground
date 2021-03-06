<?php

/*Remember, you need to set up many options in the application and webserver before this will work*/

//Comment out Display errors
ini_set('display_errors', 'On');
//making sure git repo is good

//require the general classes
//base application classes are all under the MVCapplication namespace
require("baseclasses/MVCapplication.php");

require("baseclasses/basecontroller.php");

//require the model classes
//All model classes are connected to the phptimeclock namespace
require("models/home.php");

//require the controller classes
//controller classes are part of the phptimeclock namespace
require("controllers/home.php");


//create the controller and execute the action
$application = new \MVCapplication\MVCapplication($_GET);

$controller = $application->CreateController();

$controller->ExecuteAction();

?>
