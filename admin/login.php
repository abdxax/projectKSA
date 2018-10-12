<?php
session_start();
//connect db


  $con= mysqli_connect('localhost','root','','traditionhere');
  // postt value
  $a_name=@$_POST['a_name'];
    $a_pass=@$_POST['a_pass'];
	
	if (isset($_POST['login'])){
		
		if(empty($a_name)|| empty($a_pass) ){
			
			echo '<script> alert("Please Fill All")</script>';	
			
		}
		else{
			//get admin name&&pass
			
			$get_admin="select * from user where email='$a_name' && pass='$a_pass' ";
			
			$run_admin= mysqli_query($con, $get_admin);
			// admin isset
			if(mysqli_num_rows($run_admin)==1){
				$row_admin=mysqli_fetch_array($run_admin);
				
				//admin value isset
				/*
				$aname=$row_admin['a_name'];
				//cookie hehe
				setcookie("aname",$aname, time()+60*60*24);
				setcookie("adminlogin",1,time()+60*60*24);
				echo '<script> alert("welocm here ")</script>';
			
			
				header("Location:ok.php");
				*/

				if($row_admin['role']==2){
					$_SESSION['email']=$row_admin['email'];
					$_SESSION['pass']=$row_admin['pass'];
					header("location:../index.php");
				}
				else if ($row_admin['role']==1){
					$_SESSION['email']=$row_admin['email'];
					$_SESSION['pass']=$row_admin['pass'];
					header("location:ok.php");
				}
				
				
				
			}
			else{	echo '<script> alert("The input information is incorrect ")</script>';
			}
		}
		
	}








?>

<!DOCTYPE html>

<html>

<head>
<title> Admin Login </title>
<meta charset ="utf-8"/>
<link rel ="stylesheet" type= "text/css" href="css/style.css"  />
</head>
<body>

<div class="loginAll" >

<form action ="login.php" method="post">
<input type = "email" name="a_name" placeholder="username" />
<br/>
<input type = "password" name="a_pass" placeholder="password" />
<br/>
<input type = "submit" name="login" value ="login" />
</form>

<a href="register.php">Create new Account</a>




</div>






</body>



</html>