<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Styles.css"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_GET['token'])){
    $TokenFromURL=$_GET['token'];
if(isset($_POST["Submit"])){

$Password=mysql_real_escape_string($_POST["Password"]);
$ConfirmPassword=mysql_real_escape_string($_POST["ConfirmPassword"]);

if(empty($Password)||empty($ConfirmPassword)){
	$_SESSION["message"]="All Fields must be filled out";
}elseif($Password!==$ConfirmPassword){
	$_SESSION["message"]="Both Password Values must be Same";
	
}elseif(strlen($Password)<4){
	$_SESSION["message"]="Password Should Include at least 4 values";
	
}
else{
	global $ConnectingDB;
	$Hashed_Password=Password_Encryption($Password);
	$Query="UPDATE admin_panel SET password='$Hashed_Password' WHERE token='$TokenFromURL'";
$Execute=mysql_query($Query);
if($Execute){
	    $_SESSION["SuccessMessage"]="Password Changed Successfully";
		Redirect_To("Login.php");
}else{
		$_SESSION["message"]="Something Went Wrong Try Again!";
	        Redirect_To("Login.php");
}

	
	
}

	
}
}
?>
<?php ?>
<!DOCTYPE>
<html>
<head>
		<title>Create New Password</title>

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
	        <form action="Reset_Password.php?token=<?php echo $TokenFromURL; ?>" method="post">


				<p class="header">Password:</p>
				<input type="password" Name="Password" placeholder="Password" value="">
				
				<p class="header">Confirm Password:</p>
				<input type="password" Name="ConfirmPassword" placeholder="Confirm Password" value="">			
				
				<input type="Submit" Name="Submit" value="Register">
		

			
		
	</form>
	</div>
</div>	    
	</body>
</html>
