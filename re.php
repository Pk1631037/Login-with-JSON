<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript">
function validate()
{ 

    var str1 = document.forms["registration"]["password"].value;
    var str2 = document.forms["registration"]["password2"].value;
    if(str1.localeCompare(str2)!=0)
     {
        alert("Password did not match!");
        return false;
        }


   if( document.Registration.username.value == "" )
   {
     alert( "Please provide your Name!" );
     document.Registration.username.focus() ;
     return false;
   }
 var email = document.Registration.email.value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
 if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
 {
     alert("Please enter correct email ID")
     document.Registration.email.focus() ;
     return false;
 }
   return true ;
}



</script>
</head>
<body>
  <form method="post" action="register.php" id="register_form" name="registration" onsubmit="return(validate(this))">
  	<h1>Register</h1>
  	<div class="form_error" >
	  <input type="email" name="mailid" placeholder="Email" id="mailid" required>
	  
  	</div>
  	<div class="form_error">
      <input type="password" name="password" placeholder="Password" id="password" required>
  	</div>
  	<div class="form_error">
  		<input type="password"  placeholder="Re-Type Password" name="password2" id="password2" required>
  	</div>
	<div class="form_error">
  		<input type="text"  placeholder="Hint" name="hint" id="hint" required>
  	</div>
  	<div>
  		<button type="submit" id="reg_btn">Register</button>
  	</div>
	<div>
	<center><a href="login.html">Already Member?</a></center>
	</div>
  </form>
  </body>
</html>