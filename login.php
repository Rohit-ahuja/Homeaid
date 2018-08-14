<?php
	include "database.php"
	session_start();
	if(isset($_POST['submit']){
		$userid = $_POST['Userid'];
		$pass = $_POST['Password'];
		$pass = md5($pass);
		$sql = "select password from user_login where reg_id = '$userid'";
		$res = mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($res)){
			$pass_check = $row['password'];
			if($pass == $pass){
				header("Location:loginsucess.php");
				$_SESSION['id'] = $userid;
			}
			else
				header("Location:index.html");
?>