<?php 
session_start();
$connect= mysqli_connect('localhost','root','','traditionhere');

if($_SESSION['email'])
{
if (isset($_GET['id'])) {
 $pro=$_GET['id'];
	$sql="INSERT INTO cart(id_pro,email)VALUES('$pro','$_SESSION[email]')";
	if (mysqli_query($connect,$sql)) {
		header("location:index.php");

	}
}
else{
	header("location:index.php");
}

}
else{
header("location:admin/login.php");
}
?>