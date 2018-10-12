 <?php 
$connect= mysqli_connect('localhost','root','','traditionhere');
if (isset($_POST['sub'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$pass1=$_POST['pass1'];
	$phone=$_POST['phone'];
	$opi=$_POST['opi'];
	$adds=$_POST['address'];
	
	if ($pass==$pass1) {
		$sql="INSERT INTO user(email,pass,role)VALUES('$email','$pass',2)";
		if(mysqli_query($connect,$sql)){
            $sql2="INSERT INTO info(email,name,phone,city,address)VALUES('$email','$name','$phone','$opi','$adds')";
            if (mysqli_query($connect,$sql2)) {
            	header("location:");
            }

		}
	}
	else{
		echo "string";
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	
</header>
<section>
	<div class="title">
		<h4>Create New Account </h4>
	</div>
	<div class="forms">
		<form method="POST">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="email" name="email" placeholder="Email"><br>
		<input type="text" name="phone" placeholder="phone"><br>
		<input type="password" name="pass" placeholder="Password"><br>
		<input type="password" name="pass1" placeholder="Password Agien"><br>
		<select name="opi"><br>
			<option>city..</option>
			<option>city..</option>
			<option>city..</option>
			<option>city..</option>
		</select><br>
		<input type="text" name="address" placeholder="Address"><br>
		<input type="submit" name="sub" value="Create Account ">
		
	</form>
	</div>
</section>
</body>
</html>