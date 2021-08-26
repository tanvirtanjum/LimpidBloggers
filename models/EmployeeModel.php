<?php
require_once 'DBC.php';

function getEmployeeByLoginID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT * FROM `employees` WHERE `login_id` = '$data';";
	
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

function getEmployeeByID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT employees.*, logins.email, usertypes.type FROM `employees` INNER JOIN `logins` ON employees.login_id = logins.id INNER JOIN `usertypes` ON logins.usertype_id = usertypes.id WHERE employees.id = '$data';";
	
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

function updateEmployeeOwnProfile($data)
{
	$query = "UPDATE `employees` SET `name`='".$data["name"]."', `contact`='".$data["contact"]."', `blood_group`='".$data["blood_group"]."', `gender`='".$data["gender"]."', `birth_date`='".$data["birth_date"]."' WHERE `id` = '".$data["id"]."'";
	
	try
	{
		execute($query);
		return true;
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
		return false;
	}	
}
?>