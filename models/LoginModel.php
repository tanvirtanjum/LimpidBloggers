<?php
require_once 'DBC.php';

function getUser($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT logins.*, usertypes.type as usertype, registrationstatus.status as regstatus FROM `logins` ";
		$query .= "INNER JOIN `usertypes` ON logins.usertype_id = usertypes.id ";
		$query .= "INNER JOIN `registrationstatus` ON logins.regstatus_id = registrationstatus.id ";
		$query .= "WHERE `email`='".$data["email"]."' AND `password`='".$data["password"]."';";
	
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

function getIDByEmail($data)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT * FROM `logins` WHERE `email`='$data';";
	
		$result=get($query);

		if($result != null)
		{
			return $result[0]["id"];
		}
		
		else
		{
			return 0;
		}
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
		return 0;
	}
}

function emailExist($data)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT * FROM `logins` WHERE `email`='$data';";
	
		$result=get($query);
		
		if($result != null)
		{
			return true;
		}
		
		else
		{
			return false;
		}
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
		return false;
	}
}

function insertLogin($data)
{
	$result=array();
	$result = null;

	$query = "INSERT INTO `logins`(`email`, `password`, `usertype_id`, `regstatus_id`) VALUES ('".$data['email']."','".$data['password']."','".$data['usertype_id']."','".$data['regstatus_id']."');";
	
	try
	{
		execute($query);

		$getIdQuery = "SELECT MAX(id) as `LastID` FROM `logins`;";

		$result=get($getIdQuery);
		
		if($result != null)
		{
			return $result[0]['LastID'];
		}
		
		else
		{
			return -1;
		}
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
		return -1;
	}	
}

function getBloggersByRegistarationStatus($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT logins.*, bloggers.id AS blogger_id, bloggers.name, bloggers.gender, bloggers.contact FROM `logins` ";
		$query .= "INNER JOIN `bloggers` ON logins.id = bloggers.login_id ";
		$query .= "WHERE logins.usertype_id = 3 AND logins.regstatus_id = $data;";
	
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

function updatePassword($data)
{
	$query = "UPDATE `logins` SET `password`='".$data["password"]."' WHERE `id` = '".$data["id"]."'";
	
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

function deleteLogin($data)
{
	$query = "DELETE FROM `logins` WHERE `id` = '$data';";
	
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