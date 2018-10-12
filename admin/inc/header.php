<?php
include "inc/cookie.php";

 $db = mysqli_connect('localhost','root','','traditionhere');
?>
	

<!DOCTYPE html>
<html>

<head>
<title> dashboard </title>
<meta charset ="utf-8"/>
<link rel ="stylesheet" type= "text/css" href="css/style.css"  />
</head>
<body>
<!-- adminMenu-->
<div class ="all">
<div class ="adminMenu">
<ul>
<li><a href="addcat.php">add category</a> </li>
<li><a href="addpro.php">add products</a> </li>
<li><a href="order.php">Order list</a> </li>

</ul>
</div>

<!-- adminMenu-->
