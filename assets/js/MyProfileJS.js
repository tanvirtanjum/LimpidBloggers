function enableEdit()
{
    document.getElementById("nameTB").removeAttribute("readonly"); 
    document.getElementById("contactTB").removeAttribute("readonly"); 
    document.getElementById("dateTB").removeAttribute("readonly"); 
    document.getElementById("gender").removeAttribute("disabled"); 
    document.getElementById("bloodgroup").removeAttribute("disabled"); 
    document.getElementById("updateBTN").removeAttribute("hidden"); 
    document.getElementById("enableBTN").setAttribute("hidden", "hidden");
}

function isNumeric(value) 
{
    return /^-?\d+$/.test(value);
}

function validateUpdate()
{
    var validate = true;
    var msg = "Error: ";

    var name = document.getElementById("nameTB").value;
    var contact = document.getElementById("contactTB").value;
    var dob = document.getElementById("dateTB").value;
    var gender = document.getElementById("gender").value;
    var bg = document.getElementById("bloodgroup").value;

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


    if(!validate)
    {
        alert(msg);
    }

    return validate;
}