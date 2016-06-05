<!-- autor: Nina Grujic 177/13 -->
@extends('layouts/layout_basic')

@section('title')
  Edit details
@stop

@section('csslinks')
  <link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop

@section('javascriptlinks')
  <script src="/bootstrap-3.3.6-dist/js/reportovanjeKorisnika.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/editDetails.js"></script>
@stop

@section('javascriptFunctions')
  <script>
    $(window).on('resize', function () {
      var pikseli = $("#slicice").width();
      $("#slicice").css("height", pikseli);
      var pikseli2 = $("#slicice1").width();
      $("#sliciceTablet").css("height", pikseli2);
    });
  </script>
@stop

@section('onloadfunction')
  onload="pullNotifications();"
@stop

@section('content')
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
  													<a href="/edit_picture" class="editProfileLink">Pictures</a>
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
  												<form name="editDetails" action="/save_details" method="post">
                                              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  												<span>Your relationship status:</span><br/>
  												<select  class="form-control" name="relationStatus" class="textForm" id="relationship" style="font-size:16px; padding-left: 8px;">
  										 			<option value="Status" disabled style="color: #8E8E8E">Your relationship status</option>
  										 			<option value="Single"
                              @if ($reg->relationship_status == "Single")
                                selected
                              @endif
                            class="others">Single</option>
  										 			<option value="In a relationship"
                            @if ($reg->relationship_status == "In a relationship")
                              selected
                            @endif
                            class="others">In a relationship</option>
  										 			<option value="Engaged"
                            @if ($reg->relationship_status == "Engaged")
                              selected
                            @endif
                            class="others">Engaged</option>
  										 			<option value="Married"
                            @if ($reg->relationship_status == "Married")
                              selected
                            @endif
                            class="others">Married</option>
  										 			<option value="It's complicated"
                            @if ($reg->relationship_status == "It's complicated")
                              selected
                            @endif
                            class="others">It's complicated</option>
  										 			<option value="In an open relationship"
                            @if ($reg->relationship_status == "In an open relationship")
                              selected
                            @endif
                            class="others">In an open relationship</option>
  										 			<option value="Divorced"
                            @if ($reg->relationship_status == "Divorced")
                              selected
                            @endif
                            class="others">Divorced</option>
  										 			<option value="Widowed"
                            @if ($reg->relationship_status == "Widowed")
                              selected
                            @endif
                            class="others">Widowed</option>
  										 			<option value="Separated"
                            @if ($reg->relationship_status == "Separated")
                              selected
                            @endif
                            class="others">Separated</option>
  												</select>

                                          		<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaRel" align="left">

                                              		<span class="text-left" id="relLabel"></span>

                                          		</div>

  											</div>

  											<div class="col-md-6 desnaKolonaBasicInfo" align="left">
  												<span>You education:</span><br/>
  												<select class="form-control" name="educationStatus" class="textForm" id="education" style="font-size:16px; padding-left: 8px;">
  										 			<option value="edStatus" disabled style="color: #8E8E8E">Your education</option>
  										 			<option value="High School"
                            @if ($reg->education == "High School")
                              selected
                            @endif
                            class="others">High School</option>
  										 			<option value="College"
                            @if ($reg->education == "College")
                              selected
                            @endif
                            class="others">College</option>
  										 			<option value="University"
                            @if ($reg->education == "University")
                              selected
                            @endif
                            class="others">University</option>
  										 			<option value="Associate degree"
                            @if ($reg->education == "Associate degree")
                              selected
                            @endif
                            class="others">Associate degree</option>
  										 			<option value="Graduate degree"
                            @if ($reg->education == "Graduate degree")
                              selected
                            @endif
                            class="others">Graduate degree</option>
  										 			<option value="PHD/Post doctorate"
                            @if ($reg->education == "PHD/Post doctorate")
                              selected
                            @endif
                            class="others">PHD/Post doctorate</option>
  										 			<option value="Bachelors degree"
                            @if ($reg->education == "Bachelors degree")
                              selected
                            @endif
                            class="others">Bachelors degree</option>
  										 			<option value="Masters degree"
                            @if ($reg->education == "Masters degree")
                              selected
                            @endif
                            class="others">Masters degree</option>
  										 		</select>

                                          		<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaEdu" align="left">

                                              		<span class="text-left" id="eduLabel"></span>

                                          		</div>
  											</div>
  										</div>

  										<div class="row" style="padding-top: 10px">
  											<div class="col-md-12" align="left">
  												<span>Details about yourself:</span><br/>
  												<textarea class="form-control" placeholder="Your short bio" name="shortBio" id="bio" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->bio}}</textarea>
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
  												<textarea class="form-control"   placeholder="Your hobbies" name="Hobbies" id="hobbies" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->hobbies}}</textarea>
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
  												<textarea class="form-control" placeholder="Your likes" name="Likes" id="likes" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->likes}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your dislikes" name="Dislikes" id="dislikes" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->dislikes}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your perfect first date" name="PerfFirstDate" id="firstDate" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->first_date}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your favorite quote" name="FavQuote" id="favQuote" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->quote}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your favorite song" name="FavSong" id="favSong" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->song}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your longest relationship" name="LongestRel" id="longestRel" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->longest_relationship}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your best quality" name="BestQuality" id="bestQuality" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->best_quality}}</textarea>
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
  												<textarea class="form-control"  placeholder="Your worst quality" name="WorstQuality" id="worstQuality" style="font-size:16px; padding-left: 12px; resize: none">{{$reg->worst_quality}}</textarea>
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
  										 			<option value="workStatus" selected style="color: #8E8E8E">Select your line of work.</option>
  										 			<option value="Administration"
                            @if ($reg->work == "Administration")
                              selected
                            @endif
                            class="others">Administration</option>
  										 			<option value="Architecture"
                            @if ($reg->work == "Architecture")
                              selected
                            @endif
                             class="others">Architecture</option>
  										 			<option value="Artist"
                            @if ($reg->work == "Artist")
                              selected
                            @endif
                             class="others">Artist</option>
  										 			<option value="Computers"
                            @if ($reg->work == "Computers")
                              selected
                            @endif
                             class="others">Computers</option>
  										 			<option value="Construction"
                            @if ($reg->work == "Construction")
                              selected
                            @endif
                             class="others">Construction</option>
  										 			<option value="Design"
                            @if ($reg->work == "Design")
                              selected
                            @endif
                             class="others">Design</option>
  										 			<option value="Education"
                            @if ($reg->work == "Education")
                              selected
                            @endif
                             class="others">Education</option>
  										 			<option value="Engineering"
                            @if ($reg->work == "Engineering")
                              selected
                            @endif
                             class="others">Engineering</option>
  										 			<option value="Entrepreneur"
                            @if ($reg->work == "Entrepreneur")
                              selected
                            @endif
                             class="others">Entrepreneur</option>
  										 			<option value="Fashion"
                            @if ($reg->work == "Fashion")
                              selected
                            @endif
                             class="others">Fashion</option>
  										 			<option value="Financial"
                            @if ($reg->work == "Financial")
                              selected
                            @endif
                             class="others">Financial</option>
  										 			<option value="Government"
                            @if ($reg->work == "Government")
                              selected
                            @endif
                             class="others">Government</option>
  										 			<option value="Hospitality"
                            @if ($reg->work == "Hospitality")
                              selected
                            @endif
                             class="others">Hospitality</option>
  										 			<option value="Law"
                            @if ($reg->work == "Law")
                              selected
                            @endif
                             class="others">Law</option>
  										 			<option value="Management"
                            @if ($reg->work == "Management")
                              selected
                            @endif
                             class="others">Management</option>
  										 			<option value="Marketing"
                            @if ($reg->work == "Marketing")
                              selected
                            @endif
                             class="others">Marketing</option>
  										 			<option value="Medicine"
                            @if ($reg->work == "Medicine")
                              selected
                            @endif
                             class="others">Medicine</option>
  										 			<option value="Military"
                            @if ($reg->work == "Military")
                              selected
                            @endif
                             class="others">Military</option>
  										 			<option value="Nonprofit"
                            @if ($reg->work == "Nonprofit")
                              selected
                            @endif
                             class="others">Nonprofit</option>
  										 			<option value="Performing Arts"
                            @if ($reg->work == "Performing Arts")
                              selected
                            @endif
                             class="others">Performing Arts</option>
  										 			<option value="Restaurant"
                            @if ($reg->work == "Restaurant")
                              selected
                            @endif
                             class="others">Restaurant</option>
  										 			<option value="Retail"
                            @if ($reg->work == "Retail")
                              selected
                            @endif
                             class="others">Retail</option>
  										 			<option value="Retired"
                            @if ($reg->work == "Retired")
                              selected
                            @endif
                            class="others">Retired</option>
  										 			<option value="Student"
                            @if ($reg->work == "Student")
                              selected
                            @endif
                             class="others">Student</option>
  										 			<option value="Teacher"
                            @if ($reg->work == "Teacher")
                              selected
                            @endif
                             class="others">Teacher</option>
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



  </div>
@stop

@section('footer')
  <div style="height: 30px;" id="divche"></div>
@parent
@stop
