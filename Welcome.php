<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_login(); ?>
<!DOCTYPE>

<html>
	<head>
		<title>Welcome</title>
	</head>
	<body>

	   <h1>Welcome to the club </h1>
	   
	   <?php
if(isset($_SESSION["User_Id"])){
	 echo "<strong>"; 
	 echo " ".$_SESSION["Club_Name"]."<br>";
	  echo "</strong>"; 
	 echo "<strong> your email id </strong>  ".$_SESSION["User_Email"] ."<br>";;}
	
?>

</br>
	   <a href="Logout.php">Logout Now</a>
	</body>
</html>
