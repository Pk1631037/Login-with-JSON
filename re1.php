<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'prem');
   define('DB_DATABASE', 'database');
   $db = mysqli_connect('localhost','root',"prem",'login');
   
   
if(isset($_POST) & !empty($_POST)){
	@$email = ($_POST['mailid']);
	@$password = ($_POST['password']);
	//$username = mysql_real_escape_string('$email');
   // $query = mysql_query("SELECT mail FROM details WHERE mail='$email'");
	//echo query;
	//$query = mysql_query("SELECT mail FROM details WHERE mail=='$email' ");
	//$sql_e = "SELECT * FROM details WHERE mail='$email'";
	$sql_e= "SELECT * FROM details WHERE mail = '$email' AND password = '$password' ";
	$res_e = mysqli_query($db, $sql_e);
	if (mysqli_num_rows($res_e) > 0) {
		//$message = "Username and Password are Correct";
		//echo "<script type='text/javascript'>alert('$message');
		//window.location.href='details.html';
		header('Location: details.html');
		//</script>";	
	}
	else{
		$message = "Username or Password are Incorrect";
		echo "<script type='text/javascript'>alert('$message');
		window.location.href='login.html';
		</script>";
	
}
}

?>