<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'prem');
   define('DB_DATABASE', 'database');
   $db = mysqli_connect('localhost','root',"prem",'login');
   
   
if(isset($_POST) & !empty($_POST)){
	@$hint = ($_POST['hint']);
	//@$password = ($_POST['password']);
	//$username = mysql_real_escape_string('$email');
   // $query = mysql_query("SELECT mail FROM details WHERE mail='$email'");
	//echo query;
	//$query = mysql_query("SELECT mail FROM details WHERE mail=='$email' ");
	//$sql_e = "SELECT * FROM details WHERE mail='$email'";
	$sql_m= "SELECT password FROM details WHERE hint = '$hint' ";
	//echo $sql_m;
	$res_m = mysqli_query($db, $sql_m);
	if (mysqli_num_rows($res_m) > 0) {
		//$message = $res_m;
		while ($row = $res_m->fetch_assoc()) {
		//echo $row['password']."<br>";
		$message= implode(',', $row);
		//echo $message;
		echo "<script type='text/javascript'>alert('Your Password : $message');
		window.location.href='login.html';
		</script>";
	}}
	else{
		$message = "Username and Password are Wrong";
		echo "<script type='text/javascript'>alert('$message');
		window.location.href='login.html';
		</script>";
	
}
}

?>