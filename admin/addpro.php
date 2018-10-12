<?php include "inc/header.php";?>
<?php
//post value
/*
$p_title=@$_POST['p_title'];
$p_category=@$_POST['p_category'];
$p_img=@$_FILES['p_img']['proImages'];
$p_img_tmp=@$_FILES['p_img']['tmp_name'];
$p_price=@$_POST['p_price'];
$p_desc=@$_POST['p_desc'];
$p_keyword=@$_POST['p_keyword'];
//move uplude img

move_uploaded_file($p_img_tmp,"images/$p_img");

// insert pro
if (isset($_POST['addpro'])) {
	$insert_pro = "insert into product(p_title,p_category,p_img,p_price,p_desc,p_keyword)values('$p_title','$p_category','$p_img','$p_price','$p_desc','$p_keyword')";
	$run_pro= mysqli_query($db,$insert_pro);
	if (isset($run_pro)) {
		header("Location: addpro.php");
	}
}
*/

if (isset($_FILES['p_img'])) {
 print_r($_FILES['p_img']);
 $names=$_FILES['p_img']['name'];
 $type=$_FILES['p_img']['type'];
 $tem=$_FILES['p_img']['tmp_name'];
 $size=$_FILES['p_img']['size'];
 $p_title=@$_POST['p_title'];
$p_category=@$_POST['p_category'];
$p_img=@$_FILES['p_img']['proImages'];
$p_img_tmp=@$_FILES['p_img']['tmp_name'];
$p_price=@$_POST['p_price'];
$p_desc=@$_POST['p_desc'];
$p_keyword=@$_POST['p_keyword'];
 $path="../images/".$names;
 if (move_uploaded_file($tem, $path)) {
   $insert_pro = "INSERT INTO product(p_title,p_category,p_img,p_price,p_desc,p_keyword)values('$p_title','$p_category','$path','$p_price','$p_desc','$p_keyword')";
  $run_pro= mysqli_query($db,$insert_pro);
  if (isset($run_pro)) {
    header("Location: addpro.php");
  }
 }
}
else{
  echo "string";
}
?>

<div class ="adminBodyy">
<form  method="POST" enctype="multipart/form-data"> 
<label >product name</label>
  <input type="text" name="p_title"/>
<label >product category</label>
<br/>
   <select name="p_category"style="margin-top:5px;" >
  <?php
  
  $get_c="select * from  category ";
  $run_c=mysqli_query($db,$get_c);
  
  while($row_c= mysqli_fetch_array($run_c)){
	  
	  echo '<option value ="'.$row_c['c_id'].'">'.$row_c['c_name'].'</option>';
	  
	  
	  
  }
  
  ?>
   </select>
   <br/>
   <label >Image product</label>
   <br/>
   <input type="file" name="p_img"/>
		
<label >price product</label>
    	<input type="text" name="p_price"/>
		<label >description product</label>
		<br/>
    	<textarea name="p_desc"></textarea>
		<br/>
		<label >Key words</label>
    	<input type="text" name="p_keyword"/>
		
    	<input type="submit" name="addpro" value= "addcategory"/>
</form>
</div>

<?php include "inc/footer.php"; ?>