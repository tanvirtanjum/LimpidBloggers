function validateEmail(email) 
{
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function isNumeric(value) 
{
    return /^-?\d+$/.test(value);
}

function validateRegistration()
{
    var validate = true;
    var msg = "Error: ";

    var name = document.getElementById("nameTB").value;
    var contact = document.getElementById("contactTB").value;
    var dob = document.getElementById("dateTB").value;
    var gender = document.getElementById("gender").value;
    var bg = document.getElementById("bloodgroup").value;
    var email = document.getElementById("emailTB").value;
    var password1 = document.getElementById("passwordTB").value;
    var password2 = document.getElementById("conpasswordTB").value;

    if(name.trim().length < 1)
    {
        msg += "\nName Required";
        validate = false;
    }

    if(contact.trim().length != 10)
    {
        msg += "\nInvalid Contact. 10 digits Required.";
        validate = false;
    }

    if(!isNumeric(contact))
    {
        msg += "\nInvalid Contact. 10 digits Required. Only Numeric Values Required.";
        validate = false;
    }

    if(dob.trim().length < 1)
    {
        msg += "\nDate of Birth Required";
        validate = false;
    }

    if(gender.trim().length < 1)
    {
        msg += "\nGender Required";
        validate = false;
    }

    if(bg.trim().length < 1)
    {
        msg += "\nBlood Group Required";
        validate = false;
    }

    if(email.trim().length < 1)
    {
        msg += "\nEmail Required";
        validate = false;
    }
    else
    {
        if(!validateEmail(email))
        {
            msg += "\nInvalid Email";
            validate = false;
        }
    }

    if(password1.trim().length < 4)
    {
        msg += "\nPassword Required. (4 digits at least)";
        validate = false;
    }
    else
    {
        if(password1 != password2)
        {
            msg += "\nPassword and Confirm Password doesn't Match.";
            validate = false;
        }
    }

    if(!validate)
    {
        alert(msg);
    }

    return validate;
}