<?php
require_once 'DBC.php';

function getCategories()
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT * FROM `categories` ORDER BY `category` ASC;";
	
		$result=get($query);
		
		if($result != null)
		{
			return $result;
		}
		
		else
		{
			return $result;
		}
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}
?>