function validateProceed()
{
    var validate = true;
    var msg = "Error: ";

    var password1 = document.getElementById("oldpasswordTB").value;
    var password2 = document.getElementById("newpasswordTB").value;
    var password3 = document.getElementById("conpasswordTB").value;

    if (!confirm("System will logged out after password changes.\nProceed?")) 
    {
        validate = false;
        msg = "Execution Cancelled";
    }
    else 
    {
        if(password1.trim().length < 1)
        {
            msg += "\nOld Password Required.";
            validate = false;
        }
        
        if(password2.trim().length < 4)
        {
            msg += "\nValid New Password Required. (At least 4 characters.)";
            validate = false;
        }

        if(password3.trim().length < 1)
        {
            msg += "\nConfirm Password Required. (Same As New Password.)";
            validate = false;
        }
        else
        {
            if(password3 != password2)
            {
                msg += "\nConfirm Password doesn't match with New Password";
                validate = false;
            }
        }
    }


    if(!validate)
    {
        alert(msg);
    }

    return validate;
}