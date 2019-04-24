<!DOCTYPE html>
<html>
<head>
	<title>Product Detail</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="home.php" method="post" enctype="multipart/form-data">
<table align="center">
	<tr>
<td>
	<ul class="menu cf">
  <li><a href="home.php">QUANTUM TECHNOLOGY</a></li>
  <li>
    <a href="sale_computer.php">Computing</a>
    <ul class="submenu">
      <li><a href="">MACBOOK</a></li>
      <li><a href="">PC</a></li>
      <li><a href="">GAMING</a></li>
      <li><a href="">WINDOWS LAPTOP</a></li>
    </ul>			
  </li>
  <li><a href="sale_phone.php">Phone</a></li>
  <li><a href="sale_tv.php">Television</a></li>
  <li><a href="">ABOUT</a></li>

</ul>
</td>
</tr>
</table>
</form>
</body>
</html>
<?php 
session_start();
include('connect.php');
$PID=$_GET['PID'];
$CID=$_GET['CID'];
if ($CID == "C-5cc0557fd8c50") 
{
	$query="SELECT * FROM product,phone where product.product_id = phone.product_product_id and product.category_category_id = phone.product_category_category_id";
	$ret=mysqli_query($mysqli,$query);
	$row=mysqli_fetch_array($ret);

	//$productid=$row['product_id'];
	$productname=$row['product_name'];
	$price=$row['price'];
	$rating=$row['rating'];
	$detaildesc=$row['detail_description'];
	$os=$row['os'];
	$display=$row['display'];
	$frontcam=$row['front_camera'];
	$backcam=$row['back_camera'];
	$storage=$row['storage'];
	$battery=$row['battery_capicity'];
	$colour=$row['colour'];
	?>
	
	<table align="center" cellpadding="11">
		<tr>
			<td> <?php echo $productname?></td> 
		</tr>
		<tr>
			<td> <?php echo $price?></td> 
		</tr>
		<tr>
			<td> <?php echo $os ?></td> 
		</tr>
		<tr>
			<td> <?php echo $display ?> </td>
		</tr>
		<tr>
			<td> <?php echo $frontcam ?> </td>
		</tr>
		<tr>
			<td> <?php echo $backcam ?> </td>
		</tr>
		<tr>
			<td> <?php echo $storage ?> </td>
		</tr>
		<tr>
			<td> <?php echo $battery ?> </td>
		</tr>
		<tr>
			<td> <?php echo $colour ?> </td>
		</tr>
		<tr>
			<td> <?php echo $rating?></td> 
		</tr>
		<tr>
			<td> <?php echo $detaildesc?></td> 
		</tr>
	</table>
<?php
}
elseif ($CID == "C-5cc0559ec58ee") 
{
	$query="SELECT * FROM product,computer where product.product_id = computer.product_product_id";
	$ret=mysqli_query($mysqli,$query);
	$row=mysqli_fetch_array($ret);

	$productname=$row['product_name'];
	$price=$row['price'];
	$rating=$row['rating'];
	$detaildesc=$row['detail_description'];
	$size=$row['size'];
	$colour=$row['colour'];
	$cpu=$row['cpu'];
	$display=$row['display'];
	$ram=$row['ram'];
	$storage=$row['storage'];
	$graphic=$row['graphic'];
?>

	<table align="center" cellpadding="11">
		<tr>
			<td> <?php echo $productname?></td> 
		</tr>
		<tr>
			<td> <?php echo $price?></td> 
		</tr>
		<tr>
			<td> <?php echo $size ?> </td>
		</tr>
		<tr>
			<td> <?php echo $colour ?> </td>
		</tr>
		<tr>
			<td> <?php echo $cpu ?> </td>
		</tr>
		<tr>
			<td> <?php echo $display ?> </td>
		</tr>
		<tr>
			<td> <?php echo $ram ?> </td>
		</tr>
		<tr>
			<td> <?php echo $storage ?> </td>
		</tr>
		<tr>
			<td> <?php echo $graphic ?> </td>
		</tr>
		<tr>
			<td> <?php echo $rating?></td> 
		</tr>
		<tr>
			<td> <?php echo $detaildesc?></td> 
		</tr>
	</table>
<?php	
}
elseif ($CID == "C-5cc055af84256") 
{
	$query="SELECT * FROM product,tv where product.product_id = tv.product_product_id";
	$ret=mysqli_query($mysqli,$query);
	$row=mysqli_fetch_array($ret);

	$productname=$row['product_name'];
	$price=$row['price'];
	$rating=$row['rating'];
	$detaildesc=$row['detail_description'];
	$tvdisplay=$row['display'];
	$picquality=$row['picture_quantity'];
	$tvsize=$row['tv_size'];
	$feature=$row['feature'];
?>
<table align="center" cellpadding="11">
		<tr>
			<td> <?php echo $productname?></td> 
		</tr>
		<tr>
			<td> <?php echo $price?></td> 
		</tr>
		<tr>
			<td> <?php echo $tvdisplay ?> </td>
		</tr>
		<tr>
			<td> <?php echo $picquality ?> </td>
		</tr>
		<tr>
			<td> <?php echo $tvsize ?> </td>
		</tr>
		<tr>
			<td> <?php echo $feature ?> </td>
		</tr>
		<tr>
			<td> <?php echo $rating?></td> 
		</tr>
		<tr>
			<td> <?php echo $detaildesc?></td> 
		</tr>
	</table>
<?php
}
?>