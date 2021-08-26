function validatePost()
{
    var validate = true;
    var msg = "Error: ";

    var title = document.getElementById("titleTB").value;
    var content = document.getElementById("contentTB").value;
    var category = document.getElementById("category").value;

    if(title.trim().length < 1)
    {
        msg += "\nTitle Required";
        validate = false;
    }

    if(content.trim().length < 1)
    {
        msg += "\nContent Required";
        validate = false;
    } 
    
    if(category.trim().length < 1)
    {
        msg += "\nCategory Required";
        validate = false;
    }

    if(!validate)
    {
        alert(msg);
    }

    return validate;
}