<?php

namespace models;


public class HtmlHelpers
{
	public static function Hyperlink($url, $text)
	{
		//should probably check the string if it starts with www, http and return with or without that
		$thisstring = '<a href="' . $url . '">' . $text . '</a>';
		return $thisstring;
	}

	public static function ThisControllerLink($action, $text)
	{
		$thisstring = '<a href="../' . $action . '">' . $text . '</a>';
		return $thisstring;
	}

	public static function OtherControllerLink($controller, $action, $text)
	{
		$thisstring = '<a href="../../' . $controller . '/' . $action . '">' . $text . '</a>';
		return $thisstring;
	}

	public static function ThisControllerLinkID($action, $text, $ID)
	{
		$thisstring = '<a href="../' . $action . '/' . $ID . '">' . $text . '</a>';
		return $thisstring;
	}

	public static function Beginform()
	{
	}

	public static function TextInput($name, $id, $value)
	{
		$thisstring = '<input type="text" name="' . $name . '" id="' . $id . '" value="' . $value . '">';
		return $thisstring;
	}

	public static function RadioButton($name, $id, $valuearray)
	{
		foreach($valuearray as $value)
		{
			$thisstring = $thisstring . '<input type="radio" name="' . $name . '" value="' . $value . '">' . $value . '<br>';
		}
		return $thisstring;
	}

	public static function CheckBox($name, $id, $valuearray)
	{
		foreach($valuearray as $value)
		{
			$thisstring = $thisstring . '<input type="checkbox" name="' . $name . '" value="' . $value . '">' . $value . '<br>';
		}
		return $thisstring;
	}

	public static function CreateWholeForm($Formmodel)
	{
		//Going to iterate through the $Formmodel array to create the form based on the object
	}
}

?>
