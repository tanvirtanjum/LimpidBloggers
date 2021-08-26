function validateComment()
{
    var validate = true;
    var msg = "Error: ";
    var comment = document.getElementById("commentTB").value;

    if(comment.trim().length < 1)
    {
        msg += "\nComment Text Required.";
        validate = false;
    }

    if(!validate)
    {
        alert(msg);
    }

    return validate;
}

function confirm_delete()
{
    return confirm("Are you sure?");
}