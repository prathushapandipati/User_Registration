<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Styles.css"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>

<?php
if(isset($_POST["Submit"])){
$ClubName=mysql_real_escape_string($_POST["ClubName"]);
$Email=mysql_real_escape_string($_POST["Email"]);
$Password=mysql_real_escape_string($_POST["Password"]);
$ConfirmPassword=mysql_real_escape_string($_POST["ConfirmPassword"]);
$Token=bin2hex(openssl_random_pseudo_bytes(40));

if(empty($ClubName)&&empty($Email)&&empty($Password)&&empty($ConfirmPassword)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("User_Registration.php");
}elseif($Password!==$ConfirmPassword){
	$_SESSION["message"]="Both Password Values must be Same";
	Redirect_To("User_Registration.php");
	
}elseif(strlen($Password)<4){
	$_SESSION["message"]="Password Should Include at least 4 values";
	Redirect_To("User_Registration.php");
	
}elseif(CheckEmailExistsOrNot($Email)){
		$_SESSION["message"]="Email is Already in Use";
	Redirect_To("User_Registration.php");	

}else{
	global $ConnectingDB;
	$Hashed_Password=Password_Encryption($Password);
	$Query="INSERT INTO admin_panel(username,email,password,token,active)
	VALUES('$ClubName','$Email','$Hashed_Password','$Token','OFF')";
	$Execute=mysql_query($Query);
	if($Execute){
				 $subject="Confirm Account";
				 $body='Hi'.$ClubName. 'Here is the link to Active your account
				 http://localhost/PHPCOURSE/User_Registration/Activate.php?token='.$Token;
				 $SenderEmail="From:prathusha.pandipati@gmail.com";
	 if (mail($Email, $subject, $body, $SenderEmail)) {
				 $_SESSION["SuccessMessage"]="Check Email for Activation";
		         Redirect_To("Login.php");
} else {
                 $_SESSION["message"]="Something Went Wrong with email Activation Try Again";
	             Redirect_To("User_Registration.php");
}
}else{
		         $_SESSION["message"]="Something Went Wrong Try Again!";
	             Redirect_To("User_Registration.php");
	             }
	
		
}

}	


?>

<?php ?>
<!DOCTYPE>
<html>
<head>
		<title>Register Now</title>

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
      <br><a href="Login.php"><span class="FieldInfo">Already a member? Login Now!</span></a>
		<br>
	<form action="User_Registration.php" method="post">
		
					
				<p class="header">Clubname:</p>
				<input type="text" Name="ClubName" placeholder="Your Full Name" value="">
				
				<p class="header">Email:</p>
				<input type="email" Name="Email" placeholder="Email" value="" >
				
				<p class="header">Password:</p>
				<input type="password" Name="Password" placeholder="Password" value="">
				
				<p class="header">Confirm Password:</p>
				<input type="password" Name="ConfirmPassword" placeholder="Confirm Password" value="">			
				
				<input type="Submit" Name="Submit" value="Register">
				
				
			</form>
		</div>	 
	
<p class="copyright">&copy; 2018 stylish sign in and sign up Form. All Rights Reserved </p>

</div>	
</body>
</html>