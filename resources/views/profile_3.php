<html class="full" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Milena Filipovic, Nina Grujic">
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

	<script>
		var imgArray = new Array();

		imgArray[0] = new Image();
		imgArray[1] = new Image();
		imgArray[2] = new Image();

		imgArray[0].src = "images/fuckingThomas/kek.jpg";
		imgArray[1].src = "images/fuckingThomas/funny.jpg";
		imgArray[2].src = "images/fuckingThomas/meh.jpg";

		var slikaIterator = 0;

		function lol() {
			var pikseli = document.getElementById('slicice').clientWidth;
			document.getElementById('slicice').style.height = pikseli;

			var pikseli2 = document.getElementById('slicice1').clientWidth;
			document.getElementById('sliciceTablet').style.height = pikseli2;

			document.getElementById('progressComplete').style.width = "100%";
			document.getElementById('progressBarTekst').innerHTML = "100% Complete";

			$('#slicice').css("background-image", "url("+imgArray[slikaIterator].src+")");
			$('#slicice1').css("background-image", "url("+imgArray[slikaIterator].src+")"); 
		}

		function sledeca() {
			if (slikaIterator == imgArray.length-1)
				slikaIterator = 0;
			else
				slikaIterator++;

			$('#slicice').css("background-image", "url("+imgArray[slikaIterator].src+")");
			$('#slicice1').css("background-image", "url("+imgArray[slikaIterator].src+")"); 
		}

		function prethodna() {
			if (slikaIterator == 0)
				slikaIterator = imgArray.length-1;
			else
				slikaIterator--;

			$('#slicice').css("background-image", "url("+imgArray[slikaIterator].src+")");
			$('#slicice1').css("background-image", "url("+imgArray[slikaIterator].src+")");
		}
	</script>
	</head>
<body onload="lol()">

<div id="reportBoxContainer">
	<div id="reportBoxRowContainer">
		<div id="reportBoxCellContainer">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="reportBox col-md-4" style="margin-left: 25px; margin-right: 25px">
					<table width="100%" style="margin-bottom: 10px">
						<tr>
							<td style="font-weight: bold; font-size: 16px; color: white">
								Report this user:
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="reportKor1remove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					Is this user bothering you? Tell us what they did:
					<form name="reportUser" method="post" action="/profile_3">
					<div style="padding-bottom:10px"></div>
					<div style="padding-bottom: 8px; border-bottom: 1px solid white">
						<input id="report1" type="radio" name="report" value="report1" checked="checked">
						<label for="report1"><span><span></span></span>Feels like spam</label>
					</div>
					<div style="padding-bottom: 8px; padding-top:10px; border-bottom: 1px solid white">
						<input id="report2" type="radio" name="report" value="report2">
						<label for="report2"><span><span></span></span>This user is sharing inappropriate information</label>
					</div>
					<div style="padding-bottom: 10px; padding-top:10px;">
						<input id="report3" type="radio" name="report" value="report3">
						<label for="report3"><span><span></span></span>Other</label><br/>
						<div style="padding-bottom: 6px"></div>
						<textarea class="form-control"  placeholder="Write down a reason for reporting this user" name="OtherReason" id="otherreason" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
						<div id="greskaReport" style="color: #AE0000; padding-top: 5px"></div>
					</div>
					<button class=" btn" id="subButt1" type="submit" style="background: #383838" onclick="return proveriReport()"><b>Report this user</b></button>
					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

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
								<div class="col-md-12">
									<div class="jumbotronProfile">
										<div class="row" style="font-weight: bold; color: white; font-size: 16px">
											<div class="col-md-6" align="left" id="levoIme">Thomas Appleby, 23, <i class="fa fa-mars"></i></div>
											<div class="col-md-6" align="right" id="desnoUsername">@ThomasA</div>
										</div>
										<div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 10px">
											<div class="col-md-4 nopadding" id="reportButtonDiv">
												<button class="btn" id="subButt" type="submit" style="background: #383838" onclick="reportKor1()"><b>Report this user</b></button>
											</div>
											<div class="col-md-4" id="messageButtonDiv">
												<button class="btn" id="subButt" type="submit" style="background: #AE0000"><b>Send message</b></button>
											</div>
										</div>											
									</div>
								</div>
							</div>
								
							<div class="row" style="padding-top: 20px;">
								<div class="col-md-5">
									
									<div class="jumbotronProfile">
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-12 nopadding" align="center">
												<table width="100%" id="slicice">
													<tr>
														<td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px; background: rgba(174,174,174,0.2)">
															<span class="glyphicon glyphicon-chevron-left" style="font-size: 20px; cursor: pointer" id="strelica1" onclick="prethodna()"></span>
														</td>
														<td width="100%" align="center" id="lockCol"></td>
														<td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; background: rgba(174,174,174,0.2)">
															<span class="glyphicon glyphicon-chevron-right" style="font-size: 20px; cursor: pointer" id="strelica2" onclick="sledeca()"></span>
														</td>
													</tr>
												</table>

												<table width="100%" id="sliciceTablet">
													<tr>
														<td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px; width: 30%; background: rgba(170,170,170,0.2)">
															<span class="glyphicon glyphicon-chevron-left" style="font-size: 20px; cursor: pointer" id="strelica1" onclick="prethodna()"></span>
														</td>
														<td width="40%" id="slicice1" align="center"></td>
														<td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; width: 30%; background: rgba(170,170,170,0.2)">
															<span class="glyphicon glyphicon-chevron-right" style="font-size: 20px; cursor: pointer" id="strelica2" onclick="sledeca()"></span>
														</td>
													</tr>
												</table>
												<div style="height: 10px"></div>
												<table width="100%">
													<tr>
														<td id="progressBar" align="center" style="color: white;">
															<span id="progressBarTekst"></span>
															<div class="progress" style="margin-bottom: 0px; margin-top: 10px; background: #AED581; height: 10px">
  																<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08" id="progressComplete">
  																</div>
															</div>
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									
									<div class="jumbotronProfile" style="margin-top: 20px;">
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Relationship status:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="relStatusField"> In a relationship</span>
											</div>
										</div>
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Education:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="eduStatusField"> High School </span>
											</div>
										</div>
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Field of work:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="fieldOfWork"> Student </span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="col-md-7" id="kolonaInfo">
									<div class="jumbotronProfile">
										<div class="row">
											<div class="col-md-12" align="center" style="font-weight: bold; color: white">
											<span id="detailsSpan"> I'm an exchange student from UK and I came to Belgrade this year. I have a girlfriend, and I'm here to make friends. </span>

											<div class="row UserInfoRows" style="padding-top: 20px">
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
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Perfect first date: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">/</div>
											</div>

											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite quote: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFavQuoteCol">"Don't worry, be happy"</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite song: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">Chris Brown - Beautiful People</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Longest relationship: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLongestRelCol">2 months</div>
											</div>
											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Best quality: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserBestQualCol">I'm kind and I'm very adventurous.</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Worst quality: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserWorstQualCol">I'm lazy.</div>
											</div>
											</div>
										</div>
									</div>

									<div class="jumbotronProfile" style="margin-top: 20px">
										<table width="100%">
											<tr>
												<td><span class="glyphicon glyphicon-remove LikeRemove"></span></td>
												<td width="100%" align="left" style="color: #AE0000; padding-left: 10px"><span>You are currently matched with this user. If you want to block this user, just click the button on the left.</span></td>
											</tr>
										</table>
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