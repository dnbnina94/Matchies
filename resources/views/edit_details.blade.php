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
	<script src="bootstrap-3.3.6-dist/js/editDetails.js"></script>

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
<body>

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
													<a href="/edit_details" class="editProfileLink"  style="color: #AE0000">Details</a>
												</td>
											</tr>
											<tr>
												<td class="editProfileCol" style="border: none">
													<a href="/delete_account" class="editProfileLink" >Delete your account</a>
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
									<div class="jumbotronProfile" style="padding-left: 20px; padding-right: 20px; font-size: 16px; overflow: scroll; overflow-x: hidden; height: 500px">
										<div class="row">
											<div class="col-md-6 levaKolonaBasicInfo" align="left">
												<form name="editDetails" action="/edit_details" method="post">
												<span>Your relationship status:</span><br/>
												<select  class="form-control" name="relationStatus" class="textForm" id="relationship" style="font-size:16px; padding-left: 8px;">
										 			<option value="Status" disabled selected style="color: #8E8E8E">Your relationship status</option>
										 			<option value="single" class="others">Single</option>
										 			<option value="inRel" class="others">In a relationship</option>
										 			<option value="engaged" class="others">Engaged</option>
										 			<option value="married" class="others">Married</option>
										 			<option value="compl" class="others">It's complicated</option>
										 			<option value="open" class="others">In an open relationship</option>
										 			<option value="divorced" class="others">Divorced</option>
										 			<option value="widowed" class="others">Widowed</option>
										 			<option value="separated" class="others">Separated</option>
												</select>
                                        
                                        		<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaRel" align="left">
											
                                            		<span class="text-left" id="relLabel"></span>
											
                                        		</div>

											</div>

											<div class="col-md-6 desnaKolonaBasicInfo" align="left">
												<span>You education:</span><br/>
												<select class="form-control" name="educationStatus" class="textForm" id="education" style="font-size:16px; padding-left: 8px;">
										 			<option value="edStatus" disabled selected style="color: #8E8E8E">Your education</option>
										 			<option value="school" class="others">High School</option>
										 			<option value="college" class="others">College</option>
										 			<option value="university" class="others">University</option>
										 			<option value="assdegree" class="others">Associate degree</option>
										 			<option value="graddegree" class="others">Graduate degree</option>
										 			<option value="phd" class="others">PHD/Post doctorate</option>
										 			<option value="bachdegree" class="others">Bachelors degree</option>
										 			<option value="masterdegree" class="others">Masters degree</option>
										 		</select>
                                        
                                        		<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaEdu" align="left">
										
                                            		<span class="text-left" id="eduLabel"></span>
										
                                        		</div>
											</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Details about yourself:</span><br/>
												<textarea class="form-control" placeholder="Your short bio" name="shortBio" id="bio" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaBio" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="bioLabel"></span>
												</div>
										
                                        	</div>
                                        </div>

                                        <div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Your hobbies:</span><br/>
												<textarea class="form-control"   placeholder="Your hobbies" name="Hobbies" id="hobbies" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaHob" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="hobLabel"></span>
												</div>
                                        	</div>
                                        </div>

                                        <div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Your likes:</span><br/>
												<textarea class="form-control" placeholder="Your likes" name="Likes" id="likes" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaLik" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="likLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Your dislikes:</span><br/>
												<textarea class="form-control"  placeholder="Your dislikes" name="Dislikes" id="dislikes" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaDis" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="disLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Perfect first date:</span><br/>
												<textarea class="form-control"  placeholder="Your perfect first date" name="PerfFirstDate" id="firstDate" style="font-size:16px; padding-left: 12px; resize: none">/</textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaDate" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="dateLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Favorite quote:</span><br/>
												<textarea class="form-control"  placeholder="Your favorite quote" name="FavQuote" id="favQuote" style="font-size:16px; padding-left: 12px; resize: none">/</textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaQuote" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="quoteLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Favorite song:</span><br/>
												<textarea class="form-control"  placeholder="Your favorite song" name="FavSong" id="favSong" style="font-size:16px; padding-left: 12px; resize: none">/</textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaSong" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="songLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Longest relationship:</span><br/>
												<textarea class="form-control"  placeholder="Your longest relationship" name="LongestRel" id="longestRel" style="font-size:16px; padding-left: 12px; resize: none">/</textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaLongestRel" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="longestRelLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Best quality:</span><br/>
												<textarea class="form-control"  placeholder="Your best quality" name="BestQuality" id="bestQuality" style="font-size:16px; padding-left: 12px; resize: none">/</textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaBestQuality" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="bestQualLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Worst quality:</span><br/>
												<textarea class="form-control"  placeholder="Your worst quality" name="WorstQuality" id="worstQuality" style="font-size:16px; padding-left: 12px; resize: none">/</textarea>
											</div>
                                        
                                        	<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaWorstQuality" align="left">
												<div class="col-md-12">
                                            		<span class="text-left" id="worstQualLabel"></span>
												</div>
                                        	</div>
										</div>

										<div class="row" style="padding-top: 10px">
											<div class="col-md-12" align="left">
												<span>Field of work:</span><br/>
												<select class="form-control" name="fieldOfWork" class="textForm" id="fieldOfWork" style="font-size:16px; padding-left: 8px;">
										 			<option value="workStatus" selected style="color: #8E8E8E">/</option>
										 			<option value="administration" class="others">Administration</option>
										 			<option value="architecture" class="others">Architecture</option>
										 			<option value="artist" class="others">Artist</option>
										 			<option value="computers" class="others">Computers</option>
										 			<option value="construction" class="others">Construction</option>
										 			<option value="design" class="others">Design</option>
										 			<option value="education" class="others">Education</option>
										 			<option value="engineering" class="others">Engineering</option>
										 			<option value="entrepreneur" class="others">Entrepreneur</option>
										 			<option value="fashion" class="others">Fashion</option>
										 			<option value="financial" class="others">Financial</option>
										 			<option value="government" class="others">Government</option>
										 			<option value="hospitality" class="others">Hospitality</option>
										 			<option value="administration" class="others">Administration</option>
										 			<option value="law" class="others">Law</option>
										 			<option value="management" class="others">Management</option>
										 			<option value="marketing" class="others">Marketing</option>
										 			<option value="medicine" class="others">Medicine</option>
										 			<option value="military" class="others">Military</option>
										 			<option value="nonprofit" class="others">Nonprofit</option>
										 			<option value="performingarts" class="others">Performing Arts</option>
										 			<option value="restaurant" class="others">Restaurant</option>
										 			<option value="retail" class="others">Retail</option>
										 			<option value="retired" class="others">Retired</option>
										 			<option value="student" class="others">Student</option>
										 			<option value="teacher" class="others">Teacher</option>
										 		</select>
                                        
                                        		<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaWork" align="left">
										
                                            		<span class="text-left" id="workLabel"></span>
										
                                        		</div>
											</div>
										</div>

										<div class="row" style="padding-top: 20px; padding-bottom: 20px">
											<div class="col-md-9"></div>
											<div class="col-md-3">
												<button class="btn" id="subButt" name="submitButton" onclick="return editDetailsScript();" style="font-weight: bold">Save</button>
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