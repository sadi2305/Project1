<?php
$fonts="verdana";
$bgcolor="#FB8367";

$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$error = "";
	$success = "";
	
	if(isset($_POST['submit'])){
		if($uname == "admin"){
			if($pass == "1234"){
				$error = "";
				$success = "Welcome Admin!!!";
				//redirect to another page on successful login
				header("Location: index.php");
			}
			else{
				$error = "Invalid Password!!!";
				$success = "";
			}
		}
		else{
			$error = "Invalid Username!!!";
			$success = "";
		}
	}

?>


<html>
<head>
<title>Smart Choice</title>
<link rel="stylesheet" href="style.css"/>


</head>
<body>

<div class="header">

	<div class="header_top">
		<div class="container">
			<ul>
			<li><i class="fa fa-user"></i>
				<a href="#">My Account</a></li>
			<li><i class="fa fa-shopping-cart"></i>
			<a href="cart.php">Shopping Chart</a></li>
			<li><i class="fa fa-sign-out"></i>
			<a href="#">CheckOut</a></li>
			<li><i class="fa fa-sign-out"></i>
			<a href="login.php">Sign in</a></li>
			<li><i class="fa fa-sign-out"></i>
			<a href="index.php">signOut</a></li>
			<li><a href="signup.php">Create Account</a></li>
			</ul>
		
		</div>
	</div>
	
	<div class="header_bottom">
	<div class="container">
	<img src="logo.png" height="100px" width="160px" alt=""/>
	
	</div>
	</div>
	<!--start menu section-->
	<div class="menu">
		<div class="container">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="">About Us</a></li>
			<li><a href="">Product</a>
				<ul>
				<li><a href="gents.php">Gents</a></li>
				<li><a href="ladis.php">Ladis</a></li>
				</ul>
			</li>
			<li><a href="signup.php">Sign up</a></li>
			<li><a href="">Contact Us</a></li>
			</ul>
		</div>
	</div>
	<!--end menu section-->
	
	
</div>
<!--end header section-->

	<hr/>
		<div align="center">Login</div>
	<hr/>
	
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		
		
		<div class="container">
			
			<p class="error"><?php echo $error; ?></p><p class="success"><?php echo $success; ?></p>
			<form method="post">
				<div align="center">
					<table>
						<tr>
							<td><input type="text" name="uname" value="" placeholder="enter username" required><br/></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" value="" placeholder="enter password" required><br/></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="LOGIN"><br/></td>
						</tr>
						<tr>
					<td><a href="#">Forget Password</a></td>
					</tr>
					</table>
				</div>
			</form>
		</div>
		
		
		</form>



<div class="footer">
	<div class="container">
	<p>@2305</p>
	
	</div>

</div>


</body>
</html>

