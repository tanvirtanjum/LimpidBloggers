function search()
{
	var xhttp = new XMLHttpRequest();
	
	var key1 = document.getElementById('category').value;
	
	xhttp.onreadystatechange=function()
	{
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById('blogs').innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET","https://localhost/LimpidBloggers/controllers/api/AjaxLoadBlogsByCategory.php?id="+key1,true);
	xhttp.send();
}