<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$name = $_POST['prod_name'];
	$price = $_POST['prod_price'];  
	$category = $_POST['category'];
	$quantity = $_POST['quantity'];
	$serial = $_POST['serial'];
	
	$query2=mysqli_query($con,"select * from product where product_code='$serial' ")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2); 
		if ($count>0)
		{
			$row=mysqli_fetch_array($query2);
			$quantity = $row['prod_qty']+ $quantity;
			mysqli_query($con,"update product set prod_qty='$quantity' where product_code='$serial'")or die(mysqli_error($con));
			
			echo "<script type='text/javascript'>alert('Product already exist!');</script>";
			echo "<script>document.location='product.php'</script>";  
		}
		else
		{	

			$pic = $_FILES["image"]["name"];
			if ($pic=="")
			{
				$pic="default.gif";
			}
			else
			{
				$pic = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "../dist/uploads/".$pic);
				      }
					}
			}	
			 
			 
			 	

			mysqli_query($con,"INSERT INTO product VALUES(null , '$serial','$name','$price','$pic','$category','$quantity')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";
					  echo "<script>document.location='product.php'</script>";  
		}
?>