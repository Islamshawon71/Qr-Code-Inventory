<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
	$id = $_GET['id'];  
	
	mysqli_query($con,"delete from product where prod_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
	echo "<script>document.location='product.php'</script>";  

	
?>
