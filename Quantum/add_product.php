<?php 
error_reporting(0);
session_start();
require ('connect.php');
require ('function.php');
if (isset($_POST['btnaddproduct'])) 
{
	$pid=$_POST['txtproductid'];
	$pname=$_POST['txtproductname'];
	$bname=$_POST['cbobname'];
	$cname=$_POST['cbocname'];
	$price=$_POST['txtprice'];
	$quantity=$_POST['txtquantity'];
	$status=$_POST['txtstatus'];
	$rating=$_POST['txtrating'];
	$detaildes=$_POST['txtpdetaildescription'];
}
//----------------image upload start------------//
/*$destination="";
			if($_FILES['file']['name']!="")
				   {
					  $name=$_FILES['file']['name'];                    
			
					  $destination="ProductImage/htdocs".$newImage;
					  $action=copy( $_FILES['file']['tmp_name'],$destination );
			
				   }*/

/*$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
$image1=$_FILES['product_img1']['name'];
	
	$folder1="image/";
	if($image1)
	{
		$name=$folder1. "_" .$image1;
		$copied=copy($_FILES['product_img1']['tmp_name'], $name);
		if(!$copied)
		{
			exit("Problem occured.Cannot Upload Item Image.");
		}
	}

//----------------END CODE-----------------------
	$select = "SELECT * FROM product WHERE product_name='$pname'";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Data you entered is already exist!'); </script>";
	echo "<script> window.location='add_brand.php'</script>";
	}

	$insert="INSERT INTO product(product_id,product_name,price,quantity,status,product_img1,rating,detail_description,brand_brand_id,category_category_id) VALUES('$pid','$pname','$price','$quantity','$status','$name','$rating','$detaildes','$bname','$cname')";
	$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! Your Product is created!') </script>";
			echo "<script> window.location='add_product.php' </script>"; 
		}
			else
			{
				echo "Error:" . $insert . "<br>" . mysqli_error($mysqli);
			}


?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="add_product.php" method="post" enctype="multipart/form-data">
	<table align="center" cellpadding="4">
	<tr>
		<td><h1>Add Product Form</h1></td>
	</tr>
</table>
<table align="center" cellpadding="7">	
	<tr>
		<td>Product ID</td>
		<td><input type="text" name="txtproductid" value="<?php echo "P-" . uniqid(); ?>" ></td>
	</tr>
	<tr>
		<td>Product Name</td>
		<td><input type="text" name="txtproductname"></td>
	</tr>
	<tr>
		<td>Brand Name</td>
		<td>
			<select name="cbobname" class="search">
			<option>--Choose Brand Name--</option>
			<?php 
			$select="SELECT * FROM brand WHERE status='Active'";
			$ret=mysqli_query($mysqli,$select);
			$count=mysqli_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$bid=$row['brand_id'];
				$bname=$row['brand_name'];
				echo "<option value='$bid'>$bid - $bname</option>";
			}
			 ?></select>
		</td>
	</tr>
	<tr>
		<td>Category Name</td>
		<td>
			<select name="cbocname" class="search">
			<option>--Choose Category Name</option>
			<?php 
			$select="SELECT * FROM category WHERE status='Active'";
			$ret=mysqli_query($mysqli,$select);
			$count=mysqli_num_rows($ret);
			for ($i=0; $i <$count ; $i++) 
			{ 
				$row=mysqli_fetch_array($ret);
				$cid=$row['category_id'];
				$cname=$row['category_name'];
				echo "<option value='$cid'>$cid - $cname</option>";
			}
			 ?></select>
		</td>
	</tr>
	<tr>
		<td>Price</td>
		<td><input type="text" name="txtprice"></td>
	</tr>
	<tr>
		<td>Quantity</td>
		<td><input type="text" name="txtquantity"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><input type="text" name="txtstatus"></td>
	</tr>
	<tr>
		<td>Rating</td>
		<td><input type="text" name="txtrating"></td>
	</tr>
	<tr>
		<td>Detail description</td>
		<td><textarea name="txtpdetaildescription"></textarea></td>
	</tr>
	<tr>
		<td>Product image 1</td>
		<td><input type="file" name="product_img1"></td>
	</tr>
	<tr>
		<td>Product image 2</td>
		<td><input type="file" name="product_img2"></td>
	</tr>
	<tr>
		<td>Product image 3</td>
		<td><input type="file" name="product_img3"></td>
	</tr>
	<tr>
		<td>Product image 4</td>
		<td><input type="file" name="product_img4"></td>
	</tr>
	<tr>
		<td>Product image 5</td>
		<td><input type="file" name="product_img5"></td>
	</tr>
	<tr>
		<td>Product image 6</td>
		<td><input type="file" name="product_img6"></td>
	</tr>
	<tr>
		<td>Product image 7</td>
		<td><input type="file" name="product_img7"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="btnaddproduct" value="Add Product">
			<input type="reset" value="Clear">
		</td>
	</tr>
</table>
</form>
</body>
</html>