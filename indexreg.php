<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> register</title>

<link rel="stylesheet" type="text/css" href="rkcss.css">
</head>
<body>	

<?php
include("database.php");
include("genpass.php");

$register=$_POST['register'];
echo var_dump($register);
if(isset( $register))
{
  

$name       	=$_POST['name']    ;
$address       	=$_POST['addr'];
$gender       	=$_POST['gender'];  
$email    	    =$_POST['email'];    
$phone         	=$_POST['phone'];   
$dob          	=$_POST['dob'];   
$classify     	=$_POST['classify'];

echo $category   	."<br>";
echo $id        	."<br>";	
echo $name       	."<br>";
echo $address       ."<br>";	
echo $gender       	."<br>";
echo $email    	    ."<br>";
echo $phone         ."<br>";	
echo $dob          	."<br>";
echo $classify     	."<br>";
$registerdate=date("Y/m/d");
if($classify=='worker')
$table="worker_reg";
else
	$table="user_reg";

$pass=gen_pass(7);
$q="INSERT INTO  $table ";
echo $q;
$q="INSERT INTO  $table (`name`,`dob`,`phone`,`gender`,`address`,`password`,`email`,`regdate`)values('$name','$dob','$phone','$gender','$address','$pass','$email','$registerdate')";
echo $q;
$r=mysqli_query($con,$q);
if($r)
{	setcookie('message','successfully registerd in database',time()+1);
			$q="select max(reg_id) from $table";
$r=mysqli_query($con,$q);

while ($row=mysqli_fetch_array($r)){
?>


					  <td><?php echo $row['max(reg_id)'] ?></td>
					  <td><?php echo $pass ?></td>
<?php			//header("location:bookfulldetail.php?detail=$id&category=$category");
}}
else
{
$error_code = mysqli_errno($con);
echo "error:".$error_code;
if ($error_code == 1062) {
echo "<br><br><br>duplicate id<br><br><br>";
}
else{
echo "unsuccessful in  inserting book in book database <br>";
}
}
}
else 
{
setcookie('message','enter details first',time()+1);
			
			//header("location:bookrecord1.php");
			echo "fails";
}
?>
</span>
</b>
</center></div>
</body>
</html>

