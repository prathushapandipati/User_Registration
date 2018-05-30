<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Styles.css"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_POST["Submit"])){

$Email=mysql_real_escape_string($_POST["Email"]);

if(empty($Email)){
	$_SESSION["message"]="Email Required";
	Redirect_To("Recover_Account.php");
}elseif(!CheckEmailExistsOrNot($Email)){
		$_SESSION["message"]="Email not Found";
	Redirect_To("User_Registration.php");	
}
else{
	global $ConnectingDB;
	$Query="SELECT * FROM admin_panel WHERE email='$Email'";
	$Execute=mysql_query($Query);
	if($admin=mysql_fetch_array($Execute)){
		$admin["username"];
		$admin["token"];
 $subject="Reset Password";
 $body='Hi ' .$admin["username"]. 'Here is the link to Reset you Password'.'
 http://localhost/PHPCOURSE/User_Registration/Reset_Password.php?token='.$admin["token"];
 $SenderEmail="From:prathusha.pandipati@gmail.com";
 if (mail($Email, $subject, $body, $SenderEmail)) {
                $_SESSION["SuccessMessage"]="Check Email for Resetting Password";
		Redirect_To("Login.php");
                    } else {
                $_SESSION["message"]="Something Went Wrong with resetting password Try Again";
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
		<title>Forgot Password</title>

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
	  
			<form action="Recover_Account.php" method="post">
	
				<p class="header">Email:</p>
				<input type="email" Name="Email" placeholder="Email" value="" >

				<input type="Submit" Name="Submit" value="Submit">
			
		
			</form>
		</div>
	</div>	    
</body>
</html>
