<?php
require_once 'DBC.php';

function getCheckBookMark($blog_id, $bookmarked_by)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT * FROM `bookmarks` WHERE `blog_id`='$blog_id' AND bookmarked_by='$bookmarked_by'";

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

function getBookmarksByOwner($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT bookmarks.*, blogs.title, blogs.post_time, blogs.blogged_by, categories.category as category, bloggers.name as blogger_name, bloggers.id as blogger_id FROM `bookmarks` ";
		$query .= "INNER JOIN `blogs` ON bookmarks.blog_id = blogs.id ";
		$query .= "INNER JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "INNER JOIN `bloggers`ON blogs.blogged_by = bloggers.id ";
		$query .= "WHERE bookmarks.`bookmarked_by`='$data';";
	
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

function loadBookmarkByIDandOwnerID($data, $id)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT bookmarks.*, blogs.title, blogs.post_time, blogs.blogged_by, categories.category as category, bloggers.name as blogger_name, bloggers.id as blogger_id FROM `bookmarks` ";
		$query .= "INNER JOIN `blogs` ON bookmarks.blog_id = blogs.id ";
		$query .= "INNER JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "INNER JOIN `bloggers`ON blogs.blogged_by = bloggers.id ";
		$query .= "WHERE bookmarks.`bookmarked_by`='$data' AND bookmarks.`id`='$id';";
	
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

function deleteBookmarkForBlogDelete($data)
{

	$query = "DELETE FROM `bookmarks` WHERE `blog_id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function deleteBookmark($data)
{

	$query = "DELETE FROM `bookmarks` WHERE `id`= $data;";
	
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

function insertBookmark($data)
{

	$query = "INSERT INTO `bookmarks`(`blog_id`, `bookmarked_by`) VALUES ('".$data['blog_id']."','".$data['bookmarked_by']."');";
	
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