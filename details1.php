<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'prem');
   define('DB_DATABASE', 'database');
   $db = mysqli_connect('localhost','root',"prem",'login');
   
   
if(isset($_POST) & !empty($_POST)){
	@$name = ($_POST['name']);
	@$gender = ($_POST['gender']);
	@$cgpa = ($_POST['cgpa']);
	@$degree = ($_POST['degree']);
	@$city = ($_POST['city']);
	@$mobile = ($_POST['mobilenumber']);
	//$username = mysql_real_escape_string('$email');
   // $query = mysql_query("SELECT mail FROM details WHERE mail='$email'");
	//echo query;
	//$query = mysql_query("SELECT mail FROM details WHERE mail=='$email' ");
	$sql_p = "SELECT * FROM userdetails WHERE name = '$name' ";
	$res_p = mysqli_query($db, $sql_p);
	//$sql_n = "SELECT * FROM details WHERE mail='$email'";
	//$res_n = mysqli_query($db, $sql_n);
	if (mysqli_num_rows($res_p) > 0) {
  	    $message = "Sorry UserName Already Taken";
		echo "<script type='text/javascript'>alert('$message');
		window.location.href='details.html';
		</script>";
	}
	else{
	$sql = "INSERT INTO userdetails (name,gender,mail,degree,city,mobile) VALUES ('$name','$gender','$cgpa','$degree','$city','$mobile')";
	$result = mysqli_query($db,$sql);
	if($result)
	{
                //echo "prem";
				$file = "data1.json";
				$json_string = json_encode($_POST, JSON_PRETTY_PRINT);
				file_put_contents($file, $json_string, FILE_APPEND);
				$str = file_get_contents('data1.json');
				$json = json_decode($str, true); 
				echo "Details of the User";
				echo '<pre>' . print_r($json, true) . '</pre>';
				file_put_contents("data1.json", "");
				//header('Location: print.html');
				//echo file_get_contents( "data1.json" );
				//$strJsonFileContents = file_get_contents("data12.txt");
				// Convert to array 
				//$array = json_decode($strJsonFileContents, true);
				//var_dump($array); // print array
	}
	
	
}
}

?>
