@extends('layouts.layout_basic')

@section('title')
Sign Up- Step 4!
@stop

@section('csslinks')
  <link href="bootstrap-3.3.6-dist/css/proba2.css" rel="stylesheet">
	<link href="bootstrap-3.3.6-dist/css/skloniKol4.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="bootstrap-3.3.6-dist/js/validacijaDodatno.js"></script>
@stop

@section('sewingBut')
@stop

@section('onloadfunction')
@stop

@section('settingsBoxContainer')
@stop

@section('navbar')
@stop

@section('content')
<nav class="navbar navbar-custom">
  <div class="container">
	<div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img alt="Matchies" src="images/matchiespng.png" width="100px">
      </a>
    </div>

  </div>
</nav>

<div id="divHeader"></div>
<div class="container">
	<div class="row" id="content" >


					<div class="col-md-6 col-md-offset-3" align="center" style="padding-left:10px; padding-right: 10px;">

						<div class="jumbotron">

							<form class="form" action="/home" name="signup4" onsubmit="return validacija4();" method="post">
									<span style="font-weight: bold; font-size: 20px; color: #555555;"> And a little more about yourself:  </span>
									<div class="row">
									<div class="col-md-6" style="padding-top:20px;" id="relKolona">

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
									<div class="col-md-6" style="padding-top:20px;" id="eduKolona">
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
									<br/>
									<div class="row" >
										<div class="col-md-12" >
										<textarea class="form-control" placeholder="Your short bio" name="shortBio" id="bio" style="font-size:16px; padding-left: 12px"></textarea>
										</div>

                                        <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaBio" align="left">
										<div class="col-md-12">
                                            <span class="text-left" id="bioLabel"></span>
										</div>

                                        </div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-12" >
										<textarea class="form-control"   placeholder="Your hobbies" name="Hobbies" id="hobbies" style="font-size:16px; padding-left: 12px"></textarea>
										</div>

                                        <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaHob" align="left">
											<div class="col-md-12">
                                            <span class="text-left" id="hobLabel"></span>
											</div>
                                        </div>
									</div>
									<br/>
									<div class="row" >
										<div class="col-md-12" >
										<textarea class="form-control" placeholder="Your likes" name="Likes" id="likes" style="font-size:16px; padding-left: 12px"></textarea>
										</div>

                                        <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaLik" align="left">
											<div class="col-md-12">
                                            <span class="text-left" id="likLabel"></span>
											</div>
                                        </div>
									</div>
									<br/>
									<div class="row" >
										<div class="col-md-12" >
										<textarea class="form-control"  placeholder="Your dislikes" name="Dislikes" id="dislikes" style="font-size:16px; padding-left: 12px"></textarea>
										</div>

                                        <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaDis" align="left">
											<div class="col-md-12">
                                            <span class="text-left" id="disLabel"></span>
											</div>
                                        </div>
									</div>
									<br/>

									<div class="row" >
										<div class="col-md-12" align="left">
										Interested in: &nbsp; &nbsp; &nbsp;
										<input id="men" type="checkbox" name="interested" value="men"/>
										 <label for="men"><span><span></span></span>Men</label>
										 &nbsp; &nbsp; &nbsp;
										 <input id="women" type="checkbox" name="interested" value="women"/>
  										 <label for="women"><span><span></span></span>Women</label>
										 </div>
									</div>
                                    <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaInt" align="left">

                                            <span class="text-left" id="intLabel"></span>

                                        </div>
									<br/>
									<button class="btn" id="subButt" type="submit" name="submitButton" onclick="validacija4();"><div align="center" valign="middle">Sign up</div></button>
									 <br/>

									</div>



							</form>

						</div>

					</div>
	</div>
@stop

@section('footer')
  <footer class="footer">
        <div class="container">
  	  	<div class="row">
  	  		<div class="col-md-3 korak" id="kol1">
  	  			<div style="display: table; width: 100%; height: 100%">
  	  				<div style="display: table-cell; vertical-align: middle;">
  	  				<span><b>Step 1:</b> Basic information</span>
  	  				</div>
  	  			</div>
  	  		</div>
  	  		<div class="col-md-3 korak" id="kol2">
  	  			<div style="display: table; width: 100%; height: 100%">
  	  				<div style="display: table-cell; vertical-align: middle;">
  	  				<span><b>Step 2:</b> Location</span>
  	  				</div>
  	  			</div>
  	  		</div>
  	  		<div class="col-md-3 korak" id="kol3">
  	  			<div style="display: table; width: 100%; height: 100%">
  	  				<div style="display: table-cell; vertical-align: middle;">
  	  				<span><b>Step 3:</b> Profile picture, username and password</span>
  	  				</div>
  	  			</div>
  	  		</div>
  	  		<div class="col-md-3 korak" id="kol4">
  	  			<div style="display: table; width: 100%; height: 100%">
  	  				<div style="display: table-cell; vertical-align: middle;">
  	  				<span><b>Step 4:</b> Adding some details and confirmation</span>
  	  				</div>
  	  			</div>
  	  		</div>
  	  	</div>
        </div>
   </footer>
@stop
