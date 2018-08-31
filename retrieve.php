<?php
$DB_HOST="localhost";
$DB_NAME="login-data";
$DB_USER="root";
$DB_PASSWORD="2614";

$con=new mysqli($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if($con->connect_error)
{
	die("Connection failed: ".$con->connect_error);
}
if(isset($_POST['login']))
{
	$username=$_POST['use'];
	$password=$_POST['pas'];

	$qry="SELECT * FROM `root` WHERE `username`='$username' AND `password`='$password'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if ($row<1) {
?>
		<script>
			alert("Data entered is incorrect.");
			window.open("login.html","_self");
		</script>
<?php
	}
	else{
		$data=mysqli_fetch_assoc($run);
		$id=$data['username'];
		echo "Welcome ".$id;
	}
}
?>