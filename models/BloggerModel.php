<?php
require_once 'DBC.php';

function getBloggerByLoginID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT * FROM `bloggers` WHERE `login_id` = '$data';";
	
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

function getBloggerByID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT bloggers.*, logins.email FROM `bloggers` INNER JOIN `logins` ON bloggers.login_id = logins.id WHERE bloggers.id = '$data';";
	
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

function getBloggersInfoAlongBlogsByBloggerID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT bloggers.*, logins.email AS email, blogs.id AS blog_id, blogs.title, blogs.content, blogs.post_time, blogs.comment_count, blogs.bookmark_count, blogstatus.status AS blog_status, categories.category FROM `bloggers` ";
		$query .= "LEFT JOIN `logins` ON bloggers.login_id = logins.id ";
		$query .= "LEFT JOIN `blogs` ON bloggers.id = blogs.blogged_by ";
		$query .= "LEFT JOIN `blogstatus` ON blogs.blogstatus_id = blogstatus.id ";
		$query .= "LEFT JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "WHERE bloggers.id = $data;";
	
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

function insertBlogger($data)
{
	$query = "INSERT INTO `bloggers`(`name`, `contact`, `blood_group`, `gender`, `birth_date`, `login_id`) VALUES ('".$data['name']."','+880".$data['contact']."','".$data['blood_group']."','".$data['gender']."','".$data['birth_date']."','".$data['login_id']."');";
	
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

function updateBloggerOwnProfile($data)
{
	$query = "UPDATE `bloggers` SET `name`='".$data["name"]."', `contact`='".$data["contact"]."', `blood_group`='".$data["blood_group"]."', `gender`='".$data["gender"]."', `birth_date`='".$data["birth_date"]."' WHERE `id` = '".$data["id"]."'";
	
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