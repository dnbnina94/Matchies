<html class="full" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Nina Grujic">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="image/x-icon" href="images/puzle.ico" />
    <title> Welcome to Matchies </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/heart.png" />
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="bootstrap-3.3.6-dist/js/promenaProfila.js"></script>
	<script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>

	<script>
		$(document).ready(function(){
    		$("#sewingBut").click(function(){
        		$("#footerMenuNavBar").slideToggle("slow");
    		});
		});
	</script>

	<script>
		$(document).ready(function(){
    		$("#readMore").click(function(){
        		$("#ostatak").slideToggle();
        		if ($("#readMore").html() == "Read more")
        			$("#readMore").html("Show less");
        		else
        			$("#readMore").html("Read more");
    		});
		});
	</script>
	</head>
<body onload="ucitaj();">

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
					<div style="padding-bottom: 10px; padding-top: 10px; border-bottom: 1px solid #B9BAB8"><a href="#" style="color: #AE0000">Edit your profile</a></div>
					<div style="padding-bottom: 5px; padding-top: 10px;"><a href="index.html" style="color: #AE0000">Log out</a></div>
				</div>
				<div class="col-md-5"></div>
			</div>
		</div>
	</div>
</div>

<table id="dijalog">
	<tr>
		<td align="center" valign="middle" id="alertMessage">
		</td>
	</tr>
</table>

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
			
<div class="container">
	
	<div class="row" id="content" style="padding-top: 3%;">
		
		<div class="col-md-3"></div>
		<div class="col-md-6" align="center" style="padding-left: 10px; padding-right: 10px">
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

				<div class="row">
					<div class="col-md-12">
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 0px">
							<span style="font-weight: bold"> Messages: </span>
							<div style="padding-top: 10px"></div>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8; border-top: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envclosed.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="chat.html" style="color: white; font-weight: bold; font-size: 16px">UserNina</a>
										<i class="fa fa-reply" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">21.03.2016. 13:43</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 50%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-lock" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envclosed.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="chat.html" style="color: white; font-weight: bold; font-size: 16px">MyNameIsBot</a>
										<i class="fa fa-reply" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">10.02.2016. 09:33</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 20%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-lock" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envopen.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="chat.html" style="color: white; font-weight: bold; font-size: 16px">PrettyLady</a> 
										<i class="fa fa-reply" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">11.01.2016. 19:09</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 70%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-lock" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envopen.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="chat.html" style="color: white; font-weight: bold; font-size: 16px">Mary_Jane</a>
										<i class="fa fa-share" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">11.01.2016. 17:19</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 100%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-unlock-alt" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<div style="padding-top: 20px; padding-bottom: 25px; color: white; text-align: center">
								You have no more messages.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>

	</div>

</div>

<div style="height: 80px;" id="divche"></div>
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