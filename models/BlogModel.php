<?php
require_once 'DBC.php';

function getAllBlogsByBlogStatus($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT blogs.*, categories.category as category, bloggers.name as blogger_name FROM `blogs` ";
		$query .= "INNER JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "INNER JOIN `bloggers`ON blogs.blogged_by = bloggers.id ";
		$query .= "WHERE `blogstatus_id`='".$data."' ORDER BY post_time DESC;";
	
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

function getAllReadableBlogByCategory($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT blogs.*, categories.category as category, bloggers.name as blogger_name FROM `blogs` ";
		$query .= "INNER JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "INNER JOIN `bloggers`ON blogs.blogged_by = bloggers.id ";
		$query .= "WHERE blogs.`category_id`='".$data."' AND blogs.`blogstatus_id`='3' ORDER BY post_time DESC;";
	
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

function getReadableBlog($id, $status)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT blogs.*, categories.category as category, bloggers.name as blogger_name, bloggers.id as blogger_id FROM `blogs` ";
		$query .= "INNER JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "INNER JOIN `bloggers`ON blogs.blogged_by = bloggers.id ";
		$query .= "WHERE blogs.`blogstatus_id`='$status' AND blogs.`id`='$id';";
	
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

function getBlogByID($data)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT blogs.*, categories.category as category, bloggers.name as blogger_name, bloggers.id as blogger_id FROM `blogs` ";
		$query .= "INNER JOIN `categories` ON blogs.category_id = categories.id ";
		$query .= "INNER JOIN `bloggers`ON blogs.blogged_by = bloggers.id ";
		$query .= "WHERE blogs.`id`='$data';";
	
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

function getBlogByIDandOwnerID($data, $by)
{
	$result=array();
	$result = null;
	try
	{
		$query = "SELECT * FROM `blogs` WHERE `id`='$data' AND `blogged_by`='$by';";
	
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

function insertBlog($data)
{

	$query = "INSERT INTO `blogs`(`title`, `content`, `category_id`, `blogstatus_id`, `blogged_by`) VALUES ('".$data['title']."','".$data['content']."','".$data['category_id']."','".$data['blogstatus_id']."','".$data['blogged_by']."');";
	
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

function updateMyBlog($data)
{

	$query = "UPDATE `blogs` SET `title`='".$data["title"]."',`content`='".$data["content"]."', `category_id`='".$data["category_id"]."' WHERE `id` = '".$data["id"]."' AND `blogged_by` = '".$data["blogged_by"]."';";
	
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

function updateMyBlogStatus($data, $id)
{

	$query = "UPDATE `blogs` SET `blogstatus_id`='".$data."' WHERE `id` = '".$id."';";
	
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

function increaseCommentCount($data)
{
	$blogData = getBlogByID($data);
	$newCount = $blogData[0]["comment_count"]+1;

	$query = "UPDATE `blogs` SET `comment_count`=$newCount WHERE `id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}

}

function increaseBookmarkCount($data)
{
	$blogData = getBlogByID($data);
	$newCount = $blogData[0]["bookmark_count"]+1;

	$query = "UPDATE `blogs` SET `bookmark_count`=$newCount WHERE `id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}

}

function decreseCommentCount($data)
{
	$blogData = getBlogByID($data);
	$newCount = $blogData[0]["comment_count"]-1;

	$query = "UPDATE `blogs` SET `comment_count`=$newCount WHERE `id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}

}

function decreseBookmarkCount($data)
{
	$blogData = getBlogByID($data);
	$newCount = $blogData[0]["bookmark_count"]-1;

	$query = "UPDATE `blogs` SET `bookmark_count`=$newCount WHERE `id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}

}

function deleteBlog($data)
{

	$query = "DELETE FROM `blogs` WHERE `id`= $data";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

?>