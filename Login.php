<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Styles.css"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_POST["Submit"])){
$Email=mysql_real_escape_string($_POST["Email"]);
$Password=mysql_real_escape_string($_POST["Password"]);
if(empty($Email)||empty($Password)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("Login.php");
}else{
	if(ConfirmingAccountActiveStatus()){
	$Found_Account=Login_Attempt($Email,$Password);
	if($Found_Account){
		$_SESSION["User_Id"]=$Found_Account['id'];
		$_SESSION["Club_Name"]=$Found_Account['username'];
		$_SESSION["User_Email"]=$Found_Account['email'];
		if(isset($_POST["Remember"])){
			$ExpireTime=time()+86400;
			setcookie("SettingEmail",$Email,$ExpireTime);
			setcookie("SettingName",$Username,$ExpireTime);
		}
		
		Redirect_To("Welcome.php");
	}else{
		$_SESSION["message"]="Invalid Email / Password";
	Redirect_To("Login.php");
	}
	}else{
	$_SESSION["message"]="Account Confirmation Required";
	Redirect_To("Login.php");
	}
}
}
?>
<?php ?>
<!DOCTYPE>
<html>
<head>
		<title>Login</title>

<!--online_fonts-->
	<link href="//fonts.googleapis.com/css?family=Sansita:400,400i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<!--//online_fonts-->
</head>
	<body>
<div>		
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?>
</div>
<div id="centerpage">
<div id="signup-agile">   
      <br><a href="User_Registration.php"><span class="FieldInfo">Not a member yet? Register here!</span></a>
		<br>
	<form action="Login.php" method="post">
					
				<p class="header">Email:</p>
				<input type="email" Name="Email" placeholder="Email" value="" >
				
				<p class="header">Password:</p>
				<input type="password" Name="Password" placeholder="Password" value="">	

				<p class="header">
				<input type="checkbox" Name="Remember"> Remember Me</p>

				<p class="header"> 
				<a href="Recover_Account.php"> Forgot Password</a></p>			
					
				<input type="Submit" Name="Submit" value="Login">
				
			</form>
		</div>	
	
<p class="copyright">&copy; 2018 www.sportochidrott.com. All Rights Reserved </p>
</div>	
</body>
</html>