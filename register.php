<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'prem');
   define('DB_DATABASE', 'database');
   $db = mysqli_connect('localhost','root',"prem",'login');
   
   
if(isset($_POST) & !empty($_POST)){
	@$email = ($_POST['mailid']);
	@$password = ($_POST['password']);
	@$hint = ($_POST['hint']);
	//$username = mysql_real_escape_string('$email');
   // $query = mysql_query("SELECT mail FROM details WHERE mail='$email'");
	//echo query;
	//$query = mysql_query("SELECT mail FROM details WHERE mail=='$email' ");
	$sql_e = "SELECT * FROM details WHERE mail='$email'";
	$res_e = mysqli_query($db, $sql_e);
	if (mysqli_num_rows($res_e) > 0) {
  	    $message = "Sorry Email Already Taken";
		echo "<script type='text/javascript'>alert('$message');
		window.location.href='re.php';
		</script>";
	}
	else{
	$sql = "INSERT INTO details (mail,password,hint) VALUES ('$email','$password','$hint')";
	$result = mysqli_query($db,$sql);
	if($result)
	{
                //echo "prem";
				$file = "data.json";
				$json_string = json_encode($_POST, JSON_PRETTY_PRINT);
				file_put_contents($file, $json_string, FILE_APPEND);
				header('Location: login.html');
				//"<script >window.location.href='re.php';</script>";
				//echo file_get_contents( "data.json" );
	}
	
	
}
}

?>
