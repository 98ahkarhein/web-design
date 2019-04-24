<!DOCTYPE html>
<html>
<head>
	<title>Sign in to your account</title>
</head>
<body>
<form action="customer_login.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="6">
	<tr>
		<td>Enter Your Email</td>
	</tr>
	<tr>
		<td><input type="text" name="txtemail" placeholder="Email address"></td>
	</tr>
	<tr>
		<td><input type="text" name="txtpassword" placeholder="Password"></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="chkremember" value="remember me">Remember Me</td>
	</tr>
	<tr>
		<td><input type="submit" name="btnsignin" value="Sign In"></td>
	</tr>
</table>
</form>
</body>
</html>