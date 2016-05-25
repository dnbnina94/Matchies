<html class="full" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Nina Grujic">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="image/x-icon" href="images/puzle.ico" />
    <title> Welcome to Matchies - Searching! </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/heart.png" />
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	
	<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="bootstrap-3.3.6-dist/js/reportovanjeKorisnika.js"></script>
	<script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>
	<script src="bootstrap-3.3.6-dist/js/confirmPassword.js"></script>

	<script>
		$(document).ready(function(){
			$("#sewingBut").click(function(){
        		$("#footerMenuNavBar").slideToggle("slow");
    		});
		});
	</script>

	<script>
		$(window).on('resize', function () {
			var pikseli = $("#slicice").width();
			$("#slicice").css("height", pikseli);
			var pikseli2 = $("#slicice1").width();
			$("#sliciceTablet").css("height", pikseli2);
		});
	</script>

	</head>
<body onload="ucitajDrzaveIGradove()">

<div id="settingsBoxContainer">
	<div id="settingsBoxRowContainer">
		<div id="settingsBoxCellContainer">
			<div class="row">
				<div class="col-md-5"></div>
				<div class="settingsBox col-md-2" style="margin-left: 25px; margin-right: 25px">
					<table width="100%" style="color: white; margin-bottom: 10px">
						<tr>
							<td style="font-weight: bold; font-size: 16px;">
								Settings:
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="hideSettings()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					<div style="padding-bottom: 10px; padding-top: 10px; border-bottom: 1px solid #B9BAB8"><a href="#" style="color: #AE0000">View your profile</a></div>
					<div style="padding-bottom: 10px; padding-top: 10px; border-bottom: 1px solid #B9BAB8"><a href="/edit_profile" style="color: #AE0000">Edit your profile</a></div>
					<div style="padding-bottom: 5px; padding-top: 10px;"><a href="index.html" style="color: #AE0000">Log out</a></div>
				</div>
				<div class="col-md-5"></div>
			</div>
		</div>
	</div>
</div>

<nav class="navbar navbar-default navbar-custom" role="navigation" style="background: #AE0000; border: none">
  <div class="container">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/home">
        <img alt="Matchies" src="images/matchiespngwhite.png" width="100px">
      </a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
            <li align="center"><a><span class="glyphicon glyphicon-cog " id="settings" style=" color:white; height: 22px; font-size: 16px; cursor: pointer" onclick="showSettings()"></span></a></li>  
            <li align="center"><a href="/messages"><span class="glyphicon glyphicon-comment " id="messages" style=" color:white; height: 22px; font-size: 16px"></span></a></li>  
            <li align="center"><a href="/notifications"><span class="glyphicon glyphicon-bell " id="alerts" style=" color:white; height: 22px; font-size: 16px"></span></a></li>  
      </ul>
    </div>
  </div>
</nav>					
			
<div class="container" id="containerDiv">
	<div class="row" id="content" style="padding-top: 3%;">
			
					
					<div class="col-md-10 col-md-offset-1" align="center">
					   
						<div class="jumbotron" style="background: rgba(170,170,170, 0.6)">
							<div class="row">
								<div class="col-md-4 levaKolonaEditProfile">
									<div class="jumbotronProfile">
										<table id="editProfileMenu">
											<tr>
												<td class="editProfileCol">
													<a href="/edit_profile" class="editProfileLink">Basic information</a>
												</td>
											</tr>
											<tr>
												<td class="editProfileCol">
													<a href="/edit_location" class="editProfileLink">Location</a>
												</td>
											</tr>
											<tr>
												<td class="editProfileCol">
													<a href="#" class="editProfileLink">Pictures</a>
												</td>
											</tr>
											<tr>
												<td class="editProfileCol">
													<a href="/edit_details" class="editProfileLink">Details</a>
												</td>
											</tr>
											<tr>
												<td class="editProfileCol" style="border: none">
													<a href="/delete_account" class="editProfileLink"  style="color: #AE0000">Delete your account</a>
												</td>
											</tr>
										</table>
									</div>
									<div class="jumbotronProfile" style="margin-top: 20px; text-align: center; color: white; font-size: 16px">
										You can use this section to edit your profile. The only thing you cannot edit is your username.<br/><br/>
										Make sure to enter the correct information.
									</div>
								</div>

								<div class="col-md-8 desnaKolonaEditProfile">
									<div class="jumbotronProfile" style="padding-left: 20px; padding-right: 20px; font-size: 16px">
										<div class="row">
											<form name="deleteAccount" action="/" method="post">
											<div class="col-md-12" align="center" style="color: white">
												<span style="font-weight: bold">Deleting your account</span><br/>
												<div style="height: 10px"></div>
												<span>We will be sad to see you go, however you can delete your account at any time. Upon confirmation,
													all your information will be permanently deleted from the system.</span>
												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-8" style="padding-top: 20px">
														<div class="form-group" id="greskaCurrPass" align="left">
				           									<input type="password" class="form-control has-error" name="currentPass" id="currentPass" placeholder="Enter your password" autofocus style="font-size: 16px">
                           									<span id="currentPassicon" class="" aria-hidden="true"></span>
                           									<span id="inputError2Status" class="sr-only">(error)</span>
                           									<label class= "form-control-label" for="currentPass" id="currentPasslabel"  style="color:#AE0000; font-weight:normal;"></label>
                        								</div>
													</div>
													<div class="col-md-2"></div>
												</div>
											</div>
										</div>

										<div class="row" style="padding-bottom: 7px">
											<div class="col-md-9"></div>
											<div class="col-md-3">
												<button class="btn" id="subButt" name="submitButton" style="font-weight: bold" onclick="return confirmPass()">Confirm</button>
											</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					
						
					</div>

	</div> 
	

	
</div><!-- /.container --> 

<div style="height: 30px;" id="divche"></div>
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