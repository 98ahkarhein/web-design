<?php 
session_start();
require ('connect.php');
require ('function.php');
if (isset($_POST['btncreateaccount'])) 
{
	$cusid=$_POST['txtcustomerid'];
	$firstname=$_POST['txtfirstname'];
	$lastname=$_POST['txtlastname'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpass'];
	$address1=$_POST['txtaddress1'];
	$address2=$_POST['txtaddress2'];
	$town=$_POST['txttown'];
	$postcode=$_POST['txtpostcode'];
	$phone=$_POST['txtphone'];

	$select = "SELECT * FROM customer WHERE email='$email'";
	$run=mysqli_query($mysqli,$select);
	$count = mysqli_num_rows($run);

	if($count!=0)
	{ 
	echo "<script> window.alert('Your email address already exist!'); </script>";
	echo "<script> window.location='customer_registration.php'</script>";
	}
		$insert="INSERT INTO customer(customer_id,firstname,lastname,email,address1,address2,town,postcode,phoneno) VALUES('$cusid','$firstname','$lastname','$email','$address1','$address2','$town','$postcode','$phone')";
		
		$ret = mysqli_query($mysqli,$insert);
		if($ret)
		{
			echo "<script> window.alert('Welcome ! You are successfully created your account') </script>";
			echo "<script> window.location='home.php' </script>"; 
		}
			else
			{
				echo "Error:" . $insert . "<br>" . mysqli_error($mysqli);
			}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Registration</title>
	<script type="text/javascript">
	function checkvalidation()
	{
		email=document.getElementById('txtemail').value;
		reemail=document.getElementById('txtconfirmemail').value;
		
		if(email != reemail)
		{
			alert("email is not correct please try again");
			return false;	
		}
		
	}

</script>
</head>
<body>
<form action="customer_registration.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="txtcustomerid" value="<?php echo "CUS-" . uniqid(); ?>">
	<table align="center" cellpadding="5">
		<tr>
			<td><h1>Registration Here!</h1></td>
		</tr>
	</table>
	<table align="center" cellpadding="10">
	<tr>
		
		<td>First Name</td>
		<td>Last Name</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="txtfirstname" placeholder="Your First Name">
		</td>
		<td>
			<input type="text" name="txtlastname" placeholder="Your Last Name">
		</td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td>Confrim your Email</td>
	</tr>
	<tr>
		<td><input type="text" name="txtemail" placeholder="Your Email" onclick="checkvalidation()"></td>
		<td><input type="text" name="txtconfirmemail" placeholder="Retype your email" onclick="checkvalidation()"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>Retype Password</td>
	</tr>
	<tr>
		<td><input type="password" name="txtpass" placeholder="Create your Password"></td>
		<td><input type="password" name="txtrepass" placeholder="Confirm your Password"></td>
	</tr>
	<tr>
		<td>Address line 1</td>
		<td>Address line 2</td>
	</tr>
	<tr>
		<td><textarea name="txtaddress1"></textarea></td>
		<td><textarea name="txtaddress2"></textarea></td>
	</tr>
	<tr>
		<td>Town/City</td>
		<td>Country</td>
	</tr>
	<tr>
		<td><input type="text" name="txttown" placeholder="Name of town or city"></td>
		<td>United Kingdom</td>
	</tr>
	<tr>
		<td>Post Code</td>
		<td>Phone Number</td>
	</tr>
	<tr>
		<td><input type="text" name="txtpostcode" placeholder="Please type your postcode"></td>
		<td><input type="text" name="txtphone" placeholder="Please type your number"></td>
	</tr>
	<tr>
		<td><input type="submit" name="btncreateaccount" value="Create account"></td>
		<td><input type="reset" name="btnclear" value="Cancel"></td>
	</tr>
	</table>
</form>
</body>
</html>