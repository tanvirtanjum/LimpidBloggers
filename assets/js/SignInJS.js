function validateEmail(email) 
{
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateLogin()
{
    var validate = true;
    var msg = "Error: ";
    var email = document.getElementById("emailTB").value;
    var password = document.getElementById("passwordTB").value;

    if(email.trim().length < 1)
    {
        msg += "\nEmail Required.";
        validate = false;
    }
    else
    {
        if(!validateEmail(email))
        {
            msg += "\nInvalid Email.";
            validate = false;
        }
    }
    if(password.trim().length < 1)
    {
        msg += "\nPassword Required.";
        validate = false;
    }

    if(!validate)
    {
        alert(msg);
    }

    return validate;
}