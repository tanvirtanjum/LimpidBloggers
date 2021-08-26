<?php
require_once 'DBC.php';

function deleteCommentForBlogDelete($data)
{

	$query = "DELETE FROM `comments` WHERE `blog_id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function loadCommentsByBlogID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT comments.*, bloggers.name FROM `comments` ";
		$query .= "INNER JOIN `bloggers` ON comments.commenter_id = bloggers.id ";
		$query .= "WHERE comments.`blog_id`='$data';";
	
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

function loadCommentByIDandBlogID($data, $id)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT comments.*, bloggers.name FROM `comments` ";
		$query .= "INNER JOIN `bloggers` ON comments.commenter_id = bloggers.id ";
		$query .= "WHERE comments.`blog_id`='$data' AND comments.`id`='$id';";
	
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

function insertComment($data)
{

	$query = "INSERT INTO `comments`(`comment`, `blog_id`, `commenter_id`) VALUES ('".$data['comment']."','".$data['blog_id']."','".$data['commenter_id']."');";
	
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

function deleteComment($data)
{

	$query = "DELETE FROM `comments` WHERE `id`= $data;";
	
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