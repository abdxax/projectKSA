<?php

$connect= mysqli_connect('localhost','root','','traditionhere');


//get ip

function getIp(){
	
	$ip=$_SERFER['REMOTE_ADDR'];
	if (!empty ($_SERFER['HTTP_CLIENT_IP']))
	{
		
		$ip= $_SERFER['HTTP_CLIENT_IP'];
		
		
	}
	
	elseif(!empty($_SERFER['HTTP_X_FORWARDE_FOR']))
	{
	                   $ip=$_SERFER['HTTP_X_FORWARDE_FOR'];
		
		
		
	}
	
	return $ip;
	
	
}


//cart function

function cart(){
	
	global $connect;
	if(isset($_GET['add_cart']))
	{
		
		$ip=getIp();
		
		$pro_id=(int)$_GET['add_cart'];
		
		 $get_cart="select * from cart where ip_add = '$ip' AND  p_id='$pro_id' ";
		 $run_cart=mysqli_query($connect,$get_cart);
		 
		 if(mysqli_num_rows( $run_cart)>0){
			 
			 
			 echo'';
			 
			 
		 }
		 else{
			 
			 $insert_cart="insert into cart(p_id,ip_add)valuse('$pro_id','$ip')";
			 $run_i_cart=mysqli_query($connect,$insert_cart);
			 
			 if(isset( $run_i_cart)){
				  
			 header("Location:index.php");
			 }
			
	
			 
		 }
		
	}
	
	
	

	
	
	
	
	
	
}



//get category

function get_cat(){
	global $connect;
	$get_cat= "SELECT * FROM category";
	$run_cat= mysqli_query ($connect, $get_cat);

       while ($row_cat = mysqli_fetch_array ($run_cat)) 
	   {
           echo '<li><a href = "index.php?cat='.$row_cat['c_id'].'">'.$row_cat['c_name'].'</a></li>';
	}
}


//getting product to the index
function get_pro() {
	global $connect;
	 if (!isset($_GET['cat'])) {
	 	$get_pro = "SELECT * FROM product";
	$run_pro = mysqli_query($connect, $get_pro);
	while($row_pro = mysqli_fetch_array($run_pro)){
		echo '<li>
        <div class="product">
          <div id="pro_img">
            <a href="#"><img src="images/'.$row_pro['p_img'].'" width="300" height="250px" /></a>
          </div>
          <div id="pro_title">
              <a href="index.php?add_cart='.$row_pro['p_id'].'">'.$row_pro['p_title'].'</a>
           
          </div>
          <div id="pro_bay">
             <a href="testconn.php?id='.$row_pro['p_id'].'"><button>Buy Now</button></a>
          </div>
        </div>
      </li>';
	}
	 }
}



// getting product by category

function get_pro_cat(){

	global $connect;
	if (isset($_GET['cat'])) {
		$cat = (int)$_GET['cat'];
		$get_pro_cat = "SELECT * FROM product WHERE p_category = '$cat'";
		$run_pro_cat = mysqli_query($connect, $get_pro_cat);

		if(mysqli_num_rows($run_pro_cat) > 0) {

			while($row_pro_cat = mysqli_fetch_array($run_pro_cat)){

				echo '<li>
        <div class="product">
          <div id="pro_img">
            <a href="#"><img src="admin/images/'.$row_pro_cat['p_img'].'" width="300" height="250px" /></a>
          </div>
          <div id="pro_title">
            <a href="#">'.$row_pro_cat['p_title'].'</a>
          </div>
          <div id="pro_bay">
            <a href="#"><button>Buy Now</button></a>
          </div>
        </div>
      </li>';

			}

		}
		else{
			echo'<div class="error"> There is no product to display </div>';
		}
	}
}


// getting product by search

function get_pro_search(){
	global $connect;
	// search indicated to the name of input
	if (isset($_GET['search'])) {
		$searchArea= $_GET['searchArea'];
		$get_pro_search="select * from product where p_keyword like'$searchArea'";
		$run_pro_search = mysqli_query($connect,$get_pro_search);

	   if (mysqli_num_rows($run_pro_search)>0) {
	   		while ($row_pro_search = mysqli_fetch_array($run_pro_search)) {
			echo '<li>
        <div class="product">
          <div id="pro_img">
            <a href="#"><img src="admin/images/'.$row_pro_search['p_img'].'" width="300" height="250px" /></a>
          </div>
          <div id="pro_title">
            <a href="#">'.$row_pro_search['p_title'].'</a>
          </div>
          <div id="pro_bay">
            <a href="#"><button>Buy Now</button></a>
          </div>
        </div>
      </li>';
		}
	   }
	   else{
	   	echo '<div class="error">Not Found </div>';
	   }
	}
}

?>
