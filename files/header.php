<?php  
session_start();
include "inc/function.php";


?>
<html>
<head>
	<title>Tradition Here</title>
	<meta charset="utf-8"/>
	<link rel ="stylesheet" type= "text/css" href="css/style1.css"  />
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
  <!--header start / by suheyla-->
    <div class="headerTop">
    	<div class="logo  ">
    		<a href="index.php"><img src="images/logo1.png" width="250 px"></a>
    	</div>
    </div>
  <!--header end   / by suheyla-->

  <!--menu start   / by suheyla-->																									
  <div class="menuBar">
    <ul>
      <li><a href = "index.php">Home</a></li>
	  <?php get_cat(); ?>
     <li><?php
        if (isset($_SESSION['email'])) {
          echo'<a href = "admin/logout.php">Logout</a>';
        }
        else{
          echo '<a href = "admin/logout.php">Login</a>';
        }
?>
     </li>
      <div class="c"></div>
    </ul>
  </div>

  <!--menu  end   / by suheyla-->

  <!--search start   / by suheyla-->
  <div class="search">
  <?phpcart();?>
    <div class="w">
      <div class="cart r">Shopping Basket<a href="#">Go to the card</a></div>
      <div class="searchForm">
        <form action="search.php" method="get">
          <input type="text" name="searchArea" placeholder="Search"/>
          <input type="submit" name="search"  value ="Search"/>
        </form>
      
      <div class="c"></div>
      </div>
    </div>
  </div>
  <!--search end     / by suheyla-->
  <br/>
  <!-- content start     / by suheyla-->
  <div class="content w">