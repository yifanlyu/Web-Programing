document.getElementById("textForm").onsubmit = validate;
function validate ()
{
  var elt = document.getElementById("textForm");
  if (elt.userName.value == "")
  {
    window.alert ("Enter name");
    return false;
  }
  if (elt.userName.value.length<6 || elt.userName.value.length>10)
  {
    window.alert ("Invalid Input: Username must be between 6 and 10 characters long");
    return false;
  }

  if (/^[a-z0-9]+$/i.test(elt.userName.value)==false)
  {
    window.alert ("Invalid Input: Username must be letters and digits");
    return false;
  }

  if (/^[0-9]/.test(elt.userName.value)==true)
  {
    window.alert ("Invalid Input: The user name cannot begin with a digit.");
    return false;
  }

  if (elt.password.value != elt.password1.value)
  {
    window.alert ("Invalid Input: Password don't match.");
    return false;
  }

  if (elt.password.value.length<6 || elt.password.value.length>10)
  {
    window.alert ("Invalid Input: Password must be between 6 and 10 characters long");
    return false;
  }

  if (/^[a-z0-9]+$/i.test(elt.password.value)==false)
  {
    window.alert ("Invalid Input: Password must be letters and digits");
    return false;
  }


  if (/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/.test(elt.password.value)==false)
  {
    window.alert ("Invalid Input: Password must have at least one lower case letter, at least one upper case letter, and at least one digit.");
    return false;
  }


  if (elt.password.value == "")
  {
    window.alert ("Invalid Input: Enter password");
    return false;
  }
  window.alert ("Passed Validation");
  return true;
}
