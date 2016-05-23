<html class="full" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Milena Filipovic, Nina Grujic">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="image/x-icon" href="images/puzle.ico" />
    <title> Welcome to Matchies </title>
    <link rel="shortcut icon" type="image/x-icon" href="images/heart.png" />
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	
	<link href="bootstrap-3.3.6-dist/slider2/bootstrap-slider.css" rel="stylesheet">
	<link href="bootstrap-3.3.6-dist/slider2/bootstrap-slider.min.css" rel="stylesheet">
	<script src="bootstrap-3.3.6-dist/slider2/bootstrap-slider.js"></script>
	<script src="bootstrap-3.3.6-dist/slider2/bootstrap-slider.min.js"></script>
	<script src="bootstrap-3.3.6-dist/js/sliderproba.js"></script>
	
	<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
	<script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>

	<script>
		$(document).ready(function(){
    		$("#sewingBut").click(function(){
        		$("#footerMenuNavBar").slideToggle("slow");
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
<nav class="navbar navbar-default navbar-custom" role="navigation" style="background: #AE0000; border: none">
  <div class="container">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img alt="Matchies" src="images/matchiespngwhite.png" width="100px">
      </a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
            <li align="center"><a><span class="glyphicon glyphicon-cog " id="settings" style=" color:white; height: 22px; font-size: 16px; cursor: pointer;" onclick="showSettings()"></span></a></li>  
            <li align="center"><a href="messages.html"><span class="glyphicon glyphicon-comment " id="messages" style=" color:white; height: 22px; font-size: 16px"></span></a></li>  
            <li align="center"><a href="notifications.html"><span class="glyphicon glyphicon-bell " id="alerts" style=" color:white; height: 22px; font-size: 16px"></span></a></li>  
      </ul>
    </div>
  </div>
</nav>					
			
<div class="container">
	
	<div class="row" id="content" style="padding-top: 3%;">
		
		<div class="col-md-3"></div>
		<div class="col-md-6" align="center" style="padding-left:30px; padding-right: 30px;">
					   
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px;">

				<div style="height: 100%; text-align: center; display: table-cell; vertical-align: 	middle">
					<form class="form-signin">
						<table width="100%" style="color: white; font-weight: bold; margin-top: 15px">
							<tbody>
								<tr>
									<td width="50%" align="left">Show ages:</td>
									<td width="50%" align="right" id="pokaziGodine"></td>
								</tr>
							</tbody>
						</table>
								
						<div class="row">
							<div class="col-md-12" style="padding-top:15px">
								<div style="display: table; width: 100%; height: 70px; border-radius: 5px; background-color: #AAAAAA; padding-left: 20px; padding-right: 20px;">
									<div style="height: 100%; text-align: center; display: table-cell; vertical-align: 	middle">
										<input id="ageslider" type="text"  value="" data-slider-min="18" data-slider-max=	"80" data-slider-step="1" data-slider-tooltip="hide" data-slider-value="[25,45]"/>
									</div>
								</div>	

								<table width="100%" style="color: white; font-weight: bold; margin-top: 15px">
									<tbody>
										<tr>
											<td width="40%" align="left">Show me:</td>
											<td width="60%" align="right" id="pokaziPol"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
								
						<div class="row" style="color: white; font-weight: bold; padding-top: 15px;">
							<div class="col-md-12">
								<div style="display: table; width: 100%; height: 70px; border-radius: 5px; background-color: #AAAAAA; padding-left: 20px; padding-right: 20px;">
									<div style="height: 100%; text-align: center; display: table-cell; vertical-align: 	middle; padding-top: 20px; padding-bottom: 20px">
										<div class="row">
											<div class="col-md-9 text-left">Men:</div>
											<div class="col-md-3 text-right" style="padding-left: 23px">
												<input id="maleslider" type="text"  value="" data-slider-min="0" data-slider-max="1" data-slider-step="1" data-slider-tooltip="hide" data-slider-value="0"/>
											</div>									
										</div>
										<div style="height: 10px"></div>
										<div class="row">
											<div class="col-md-9 text-left">Women:</div>
											<div class="col-md-3 text-right" style="padding-left: 23px">
												<input id="femaleslider" type="text" value="" data-slider-min="0" data-slider-max="1" data-slider-step="1" data-slider-tooltip="hide" data-slider-value="0"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
								
						<div class="row">
							<div class="col-md-12 text-center" style="padding-top:20px; color: white; font-size: 16px;">
								<p>
									Matchies uses these preferences to suggest potential matches. You can change these settings any time.
								</p>
							</div>
						</div>
								
						<div class="row">
							<div class="col-md-8 col-md-offset-2" align="center">
								<img id= "nekaSlika" class="img-responsive" src="images/searching.gif" />									
							</div>
						</div>
								
						<div class="row">
							<div class="col-md-12" style="padding-top:15px; padding-bottom: 30px">
								<button class=" btn" id="subButt" type="submit"><b>Search</b></button>
							</div>	
						</div>
					</form>
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