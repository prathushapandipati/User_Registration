<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Sport och Idrott</title>

    <!-- Bootstrap Core CSS -->
    <link href="indexcss/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="indexcss/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>

<body>

    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container" background-color ="white" >
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                	<span class="glyphicon glyphicon-fire"></span> 
                	Sport och Idrott
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="User_Registration.php">Skapa Konto</a>
                    </li>
                    <li>
                        <a href="Login.php">Logga In</a>
                   
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

	<!-- Header -->
    <header>	
        <div class="header-content">
		
		     <div class="header-content-inner">			  
                <h1>Sök klubb här</h1>
               
               <div id="search_form" class="search_top">
			   
			   
		<h2>Sök klubb här</h2>
		
		
		
		<form action="#" method="post">
		
		
			<!--<input type="text" name="Enter Keyword(s)" placeholder="Enter Keyword(s)" required="">-->
			<!-- <input class="email" name="Location" type="text" placeholder="Location" required=""> -->

			 <select id="country12" onchange="change_country(this.value)" class="frm-field required">
			<?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'registration_system';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT sports_item FROM sportstable";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
			 echo "
				 <option> Välj Idrott</option>";
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $sports_item=$cdrow["sports_item"];
               
				echo " <option>
                    $sports_item
                </option>";
            
            }
                
            ?>
                                        </select>

            
			<select id="country12" onchange="change_country(this.value)" class="frm-field required" required="" >
														<option value="null"> Välj Område</option>
														<option value="city">Stockholm</option>
														<option value="city">Värmland</option>
														<option value="city">Södermanland</option>
														<option value="city">Örebro</option>
														
										</select>
										
										
			<select id="country12" onchange="change_country(this.value)" class="frm-field required">
                                                        <option value="null"> Välj Ålder</option>
                                                        <option value="age">3-9</option>
                                                        <option value="age">10-17</option>
                                                        <option value="age">18-30</option>
                                                        <option value="age">30+</option>
                                                        
                                        </select>
										
										
										
										
			<input type="submit" value="Sök">
			<div class="clearfix"></div>
		</form>
	</div>
	<!--//search_form -->
			 
            </div>
        </div>
    </header>	

	<!-- Content 3 -->
     <section class="content content-3">
        <div class="container">
			<h2 class="section-header"> About</h2>
			<p class="lead text-muted">Holisticly predominate extensible testing procedures for reliable supply chains. Dynamically innovate resource-leveling customer service for state of the art customer service. jfhfgygesjgh bgjrgjgf vdfjgvfjd fbjvfgdjbgfd djhdjbds sdhbjdbgdjs hsufjsafbs sjhdfgjsdfbsj</p> 
                  <!--  <a href="#" class="btn btn-primary btn-lg">Check Now</a>               -->
            </div>
        </div>
    </section>
    
	<!-- Promos -->
	<!-- <div class="container-fluid">
        <div class="row promo">
        	
				<div class="col-md-4 promo-item item-1">
					<h3>
					<a href="https://www.coop.se/">Coop</a>
					</h3>
				</div>
            
            <a href="#">
				<div class="col-md-4 promo-item item-2">
					<h3>
						Synergize
					</h3>
				</div>
            </a>
			
			<a href="#">
				<div class="col-md-4 promo-item item-3">
					<h3>
						Procrastinate
					</h3>
				</div>
            </a>
        </div>
    </div> 	-->
	<!-- /.container-fluid -->   

	
	<!-- Footer -->
    <footer class="page-footer">
    
    	<!-- Contact Us -->
        <div class="contact">
        	<div class="container">
				<h2 class="section-heading">Contact Us</h2>
				<p><span class="glyphicon glyphicon-earphone"></span><br> +46 734 89 47 62</p>
				<p><span class="glyphicon glyphicon-envelope"></span><br> info@sportochidrott.com</p>
        	</div>
        </div>
        	
        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<p>Copyright &copy; www.sportochidrott.com 2018</p>
        	</div>
        </div>
        
    </footer>

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>

</body>

</html>
