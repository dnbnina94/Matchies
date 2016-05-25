<html class="full" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Nina Grujic, Milena Filipovic, Branislava Ivkovic">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="image/x-icon" href="images/puzle.ico" />
    <title> Welcome to Matchies - Login </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/heart.png" />
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	<link href="bootstrap-3.3.6-dist/css/proba.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>

	<script>
		$(document).ready(function(){
    		$("#sewingBut").click(function(){
        		$("#footerMenuNavBar").slideToggle("slow");
    		});
		});
	</script>
<body>

<div class="divHeader"></div>
<div class="container">
	<div class="row" id="content" >
			
					<div class="col-md-4"></div>
					<div class="col-md-4 nopadding" align="center" valign="middle">
					
					   <a href="/"> <img src="images/puzlematchies.png" alt="" width="230px" style="padding-bottom: 15px; padding-top:5px;" id="slikaPuzzle"/> </a>
					   
						<div class="jumbotron">
						
								<form class="form-signin" action="/home" method="post">
									<span style="color: white; font-size: 22px; font-weight: bold;"> Welcome! </span>
									<div class="span fill"></div>
									<input type="text" id="usr" class="form-control" placeholder="Enter your username" required autofocus>
									<div class="span fill2"></div>
									<input type="password" id="inputPassword" class="form-control" placeholder="Enter your password" required>
									<div class="span fill2"></div>
									<button class="btn" id="subButt" type="submit">Login</button>
									<div style="height: 8px;"></div>
									 <p class="text-right">
									 <a id="specialLink" href="/forgot_password"> Forgot your password? </a>
									 <span style="font-size: 20px;"> &bull; </span>
									 <a href="/signup_step_1" style="font-weight: bold;">Sign up!</a>
									 </p>
								</form>	
						
						</div>
										
					</div>
					<div class="col-md-4"></div>
	</div>
</div><!-- /.container -->

<!-- /footer -->
<div class="container" id="footerMenuNavBar">
	<div class="row">
		<div style="height: 10px"></div>
		<div class="text-center"><a href="#">About</a></div>
		<div style="height: 10px"></div>
		<div class="text-center"><a href="#">Support</a></div>
		<div style="height: 10px"></div>
		<div class="text-center"><a href="#">Privacy</a></div>
		<div style="height: 10px"></div>
		<div class="text-center"><a href="#">Terms</a></div>
		<div style="height: 10px"></div>
		<div class="text-center"><a href="#">Contact</a></div>
		<div style="height: 10px"></div>
	</div>
</div>
<footer class="footer navbar-fixed-bottom">
      <div class="container">
	  		<div class="text-left" id="footerLinkovi">
      		   <a href="#" class="footerLink"> About </a>
				 &nbsp;&nbsp;&nbsp;&nbsp;
				 <a href="#" class="footerLink"> Support </a>
				 &nbsp;&nbsp;&nbsp;&nbsp;
				 <a href="#" class="footerLink"> Privacy </a>
				 &nbsp;&nbsp;&nbsp;&nbsp;
				 <a href="#" class="footerLink"> Terms </a>
				 &nbsp;&nbsp;&nbsp;&nbsp;
				 <a href="#" class="footerLink"> Contact </a>
				 &nbsp;&nbsp;&nbsp;&nbsp;
					@2016_Matchies,Inc
			</div>

			<div class="text-center" id="footermobile">
				<img src="images/btnred.png" width="21px" id="sewingBut">
			</div>
	  </div>
    </footer>
	
  </body>
</html>