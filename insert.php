<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if(!empty($first_name) || !empty($last_name) || !empty($email) || !empty($username) || !empty($password)){
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "sign_up";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno() .') '. mysqli_connect_error());
	}else{
		$SELECT = "SELECT email From sign_up Where email = ? Limit 1";
		$INSERT = "INSERT Into sign_up(first_name, last_name, email, username, password) values(?, ?, ?, ?, ?)";

		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 0){
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sssss", $first_name, $last_name, $email, $username, $password);
			$stmt->execute();
			echo "New record inserted successfully";
		}else{
			$stmt->close();
			$conn->close();
		}
	}
}else{
	echo "All fields are required";
	die();
}

?>