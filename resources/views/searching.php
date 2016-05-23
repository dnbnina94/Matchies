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
					<div style="padding-bottom: 10px; padding-top: 10px; border-bottom: 1px solid #B9BAB8"><a href="/edit_profile" style="color: #AE0000">Edit your profile</a></div>
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
						<div class="jumbotronProfile">
							<div class="row" style="font-weight: bold; color: white; font-size: 16px">
								<div class="col-md-6" align="left" id="levoIme"><a href="profile1.html" class="linkToProfile">Thomas Appleby, 23, <i class="fa fa-mars"></i></a></div>
								<div class="col-md-6" align="right" id="desnoUsername"><a href="profile1.html" class="linkToProfile">@ThomasA</a></div>
							</div>										
						</div>

						<div class="jumbotronProfile" style="margin-top: 20px; color: white; font-size: 16px; font-weight: bold" align="center" id="UserBio">
							I'm an exchange student from UK and I came to Belgrade this year. I have a girlfriend, and I'm here to make friends.			
						</div>

						<div class="jumbotronProfile" style="margin-top: 20px; color: white" align="center">
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Relationship status: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserRelStatusCol">In a relationship</div>
							</div>			
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Education: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserEduStatusCol">High School</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Likes: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLikesCol">Parties, electronic music, music festivals.</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Dislikes: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserDislikesCol">I don't like shy people.</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Hobbies: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserHobbiesCol">Sleeping and eating.</div>
							</div>

							<hr style="margin-top: 10px; margin-bottom: 10px;"/>

							<div width="100%" id="ostatak">

							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Field of work: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserWorkCol">Student</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Perfect first date: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">/</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite quote: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFavQuoteCol">"Don't worry, be happy"</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite song: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFavSongCol">Chris Brown - Beautiful People</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Longest relationship: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLongestRelCol">2 months</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Best quality: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserBestQualCol">I'm kind and I'm very adventurous.</div>
							</div>
							<div class="row UserInfoRows">
								<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Worst quality: </div>
								<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserWorstQualCol">I'm lazy.</div>
							</div>

							<hr style="margin-top: 10px; margin-bottom: 10px;"/>

							</div>

							<span style="cursor: pointer; color: #AE0000; font-weight: bold" id="readMore">Read more</span>
						</div>

						<div class="jumbotronProfile" style="margin-top: 20px">
							<table width="100%">
								<tr>
									<td><span class="glyphicon glyphicon-remove LikeRemove" onclick="promeniRemove()"></span></td>
									<td width="100%" align="center" style="color: #AE0000"><span id="areYou">Are you interested in this user?</span></td>
									<td><span class="glyphicon glyphicon-ok LikeOk" onclick="promeniOk()"></span></td>
								</tr>
							</table>
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