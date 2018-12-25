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


<div align="center">Registration Form</div>
	<hr/>
	
		<form action="validate.php" method="POST">
		<table align="center" width="400" height="300">
		 <tr>
			<td>
				<fieldset>
					<legend>REGISTRATION</legend>
					<table align="left" width="400">
						<br>
						<tr>
							<td>Name:</td>
							<td colspan="2"><input type="text" name="name" align="right"/></td>
						</tr>
						<tr>
							<td >Email: </td>
							<td colspan="2"><input type="text" name="email"/> <b>i</b></td>
						</tr>
						<tr>
							<td>User Name: </td>
							<td colspan="2"><input type="text" name="username"/></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td colspan="2"><input type="password" name="password"/></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2"><font size="1">*must contain atleast one of the special characters (@, #, $, %)</font></td>
						</tr>
						<tr>
							<td>Confirm Password: </td>
							<td colspan="2"><input type="password" name="confirmpassword"/></td>
						</tr>
						<tr>
							<td colspan="3">
								<fieldset>
									<legend>Gender</legend>
									<input type="radio" name="gender" value="male" checked/>MALE <input type="radio" name="gender" value="female"/>FEMALE <input type="radio" name="gender" value="Other"/>OTHER
								</fieldset>
							</td>
						</tr>
						<tr>
							<td colspan="3"><hr></td>
						</tr>
						<tr>
							<td colspan="3">
								<fieldset>
									<legend>DATE OF BIRTH</legend>
									<table>
										<tr>
											<td colspan="3">
												<input type="text" name="dd" size="5"/>/ <input type="text" name="mm" size="5"/>/ <input type="text" name="yyyy" size="5"/>  (dd/mm/yyyy)
											</td>
										</tr>
									</table>
								</fieldset>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<hr>
							</td>
						</tr>
						<tr>
							<td><input type="submit" value="SUBMIT" name="SubmitRegistration"/> <input type="button" value="RESET" onclick="window.location.href='registration.php'"></td>
						</tr>
					</table>
					
				</fieldset>
			</td>
		 </tr>
			
		</table>
		</form>



<div class="footer">
	<div class="container">
	<p>@2305</p>
	
	</div>

</div>


</body>
</html>

