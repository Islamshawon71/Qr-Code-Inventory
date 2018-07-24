<?php
$con = mysqli_connect("localhost","root","","inventory");
global $con;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  date_default_timezone_set("Asia/Dhaka"); 
  
  
  function getCategory($id){
	  global $con;
	  $sql = "SELECT * FROM category where cat_id='$id'";
	  $query2=mysqli_query($con,$sql)or die(mysqli_error($con));
	  $row=mysqli_fetch_array($query2);
	  return $row['cat_name'];
  }
 

?>

