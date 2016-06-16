<!-- autor: Nina Grujic 177/13 -->
@extends('layouts/layout_basic')

@section('title')
  Edit profile
@stop

@section('csslinks')
  <link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop

@section('javascriptlinks')
  <script src="/bootstrap-3.3.6-dist/js/reportovanjeKorisnika.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/validacijaEditProfile.js"></script>
	<script src="/bootstrap-3.3.6-dist/js/menjanjeLozinke.js"></script>
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
  onload="bla(); pullNotifications();"
@stop

@section('specialMessage')
  <div id="reportBoxContainer">
  	<div id="reportBoxRowContainer">
  		<div id="reportBoxCellContainer">
  			<div class="row">
  				<div class="col-md-4">
  				</div>
  				<div class="reportBox col-md-4" style="margin-left: 25px; margin-right: 25px;">
  					<table width="100%" style="margin-bottom: 10px">
  						<tr>
  							<td style="font-weight: bold; font-size: 16px; color: white">
  								Change your password:
  							</td>
  							<td align="right" style="font-size: 16px; color: white">
  								<span class="glyphicon glyphicon-remove" onclick="reportKor1remove()" style="cursor: pointer"></span>
  							</td>
  						</tr>
  					</table>

  					<form name="promenaLozinke" action="/savePassword" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="user_id_change_password" name="user_id_change_password" value="">
  						<span style="color: #474747">Current password:</span><br/>
  						<div class="form-group" id="greskaCurrPass" align="left" style="margin-bottom: 0px">
  				            <input type="password" class="form-control has-error" name="currentPass" id="currentPass" placeholder="Enter your current password" autofocus style="font-size: 16px">
                              <span id="currentPassicon" class="" aria-hidden="true"></span>
                              <span id="inputError2Status" class="sr-only">(error)</span>
                              <label class= "form-control-label" for="currentPass" id="currentPasslabel"  style="color:#AE0000; font-weight:normal;"></label>
                          </div>
                          <span style="color: #474747">New password:</span><br/>
                          <div class="form-group" id="greskaPassword" align="left" style="margin-bottom: 0px">
  							<input type="password" class="form-control has-error" name="password" id="password" placeholder="Choose your new password"  style="font-size: 16px">
                              <span id="passwordicon" class="" aria-hidden="true"></span>
                              <span id="inputError2Status" class="sr-only">(error)</span>
                              <label class= "form-control-label" for="password" id="passlabel"  style="color:#AE0000; font-weight:normal;"></label>
                          </div>
                          <span style="color: #474747">Re-enter password:</span><br/>
                          <div class="form-group" id="greskaRepeat" align="left">
  				            <input type="password" class="form-control has-error" name="passrepeat" id="passrepeat" placeholder="Re-enter your password"  style="font-size: 16px">
                              <span id="repeaticon" class="" aria-hidden="true"></span>
                              <span id="inputError2Status" class="sr-only">(error)</span>
                              <label class= "form-control-label" for="passrepeat" id="repeatlabel"  style="color:#AE0000; font-weight:normal;"></label>
                          </div>

                          <button class="btn" id="subButt" type="submit" name="submitButton" onclick="return validacija3();"><div align="center" valign="middle">Save changes</div></button>
  					</form>
  				</div>
  				<div class="col-md-4">
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
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
  													<a href="/edit_profile" class="editProfileLink" style="color: #AE0000">Basic information</a>
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
  													<a href="/edit_details" class="editProfileLink">Details</a>
  												</td>
  											</tr>
  											<tr>
  												<td class="editProfileCol" style="border: none">
  													<a href="/delete_account" class="editProfileLink">Delete your account</a>
  												</td>
  											</tr>
  										</table>
  									</div>
  									<div class="jumbotronProfile" style="margin-top: 20px; text-align: center; color: white; font-size: 16px">
  										You can use this section to edit your profile. The only things you cannot edit are your username and date of birth.<br/><br/>
  										Make sure to enter the correct information.
  									</div>
  								</div>
                  @if (count($errors) > 0)
                          @foreach ($errors->all() as $error)
                              <span style="color: #C0C0C0; font-size: 16px; font-weight:bold;"><span class="glyphicon glyphicon-remove"></span> {{ $error }}</span>
                              <br />
                          @endforeach
                  @endif

  								<div class="col-md-8 desnaKolonaEditProfile">
  									<div class="jumbotronProfile" style="padding-left: 20px; padding-right: 20px; font-size: 16px">
  										<div class="row">
  											<div class="col-md-6 levaKolonaBasicInfo" align="left">
  												<form name="editProfile" action="/save_profile" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
  												<span>First name:</span><br/>
  												<div class="form-group" id="greske1" align="left" style="margin-bottom: 0px">
  													  <input type="text"
                                value = "{{$reg->name}}"
                              class="form-control" name="fname" id="fname" placeholder="Enter your first name" aria-describedby="inputError2Status" autofocus style="font-size: 16px;">
  										  			<span id="fnameicon" class="" aria-hidden="true"></span>
  										  			<span id="inputError2Status" class="sr-only">(error)</span>
  													  <label class= "form-control-label" for="fname" id="flabel" align="left"style="color:#AE0000; font-weight:normal;"></label>
  												</div>
  											</div>

  											<div class="col-md-6 desnaKolonaBasicInfo" align="left">
  												<span>Last name:</span><br/>
  												<div class="form-group" id="greske2" align="left" style="margin-bottom: 0px">
  										 		<input type="text"
                          value = "{{$reg->surname}}"
                          class="form-control has-error" name="lname" id="lname" placeholder="Enter your last name" style="font-size: 16px;">
  										 		<span id="lnameicon" class="" aria-hidden="true"></span>
  										  		<span id="inputError2Status" class="sr-only">(error)</span>
  												<label class= "form-control-label" for="lname" id="llabel"  style="color:#AE0000; font-weight:normal;"></label>
  												</div>
  											</div>
  										</div>

  										<div class="row">
  											<div class="col-md-6 levaKolonaBasicInfo" align="left">
  												<span>Email:</span><br/>
  												<div class="form-group" id="greske3" align="left" style="margin-bottom: 0px">
  										 			<input type="text"
                              value = "{{$user->email}}"
                            class="form-control has-error" name="email" id="email" placeholder="Enter your email"  style="font-size: 16px;">
                                              		<span id="emailicon" class="" aria-hidden="true"></span>
  										  			<span id="inputError2Status" class="sr-only">(error)</span>
  													<label class= "form-control-label" for="email" id="elabel"  style="color:#AE0000; font-weight:normal;"></label>
                                          		</div>
  											</div>

  											<div class="col-md-6 desnaKolonaBasicInfo" align="left">
  												<span>Repeated email:</span><br/>
  												<div class="form-group" id="greske4" align="left" style="margin-bottom: 0px">
  													<input type="text"
                              value = "{{$user->email}}"
                            class="form-control has-error" name="emailAgain" id="emailAgain" placeholder="Re-enter your email" style="font-size: 16px;">
                                              		<span id="emailagainicon" class="" aria-hidden="true"></span>
                                              		<span id="inputError2Status" class="sr-only">(error)</span>
                                              		<label class= "form-control-label" for="emailAgain" id="ealabel"  style="color:#AE0000; font-weight:normal;"></label>
                                          		</div>
  											</div>
  										</div>

  										<div class="row">
  											<div class="col-md-6" align="left" style="padding-top: 20px">
  												<span>Gender:</span><br/>
  												<div>
  													<input id="genderMale"
                              @if ($reg->sex == 'm') {
                                checked
                              }
                              @endif
                            type="radio" name="gender" value="male">
  													 <label for="genderMale"><span><span></span></span>Male</label>
  													 &nbsp; &nbsp; &nbsp;
  													 <input id="genderFemale"
                               @if ($reg->sex == 'f') {
                                 checked
                               }
                               @endif
                             type="radio" name="gender" value="female">
    													 <label for="genderFemale"><span><span></span></span>Female</label>
  												</div>
  												<div class = "row"  id="greske6" align="left" style="color: #AE0000;  font-weight:normal; padding-left:20px;" >
  													<span class="text-left"  id="genderlabel"></span>
                                          		</div>
                                          	</div>
  										</div>

  										<div class="row" id="changePassKolona">
  											<div class="col-md-6" align="left">
  												<span style="font-weight: bold; color: #AE0000; cursor: pointer" onclick="reportKor1()">Change password</span>
  											</div>
  										</div>

  										<div class="row" style="padding-top: 20px; padding-bottom: 7px">
  											<div class="col-md-9"></div>
  											<div class="col-md-3">
  												<button class="btn" id="subButt" name="submitButton" onclick="return validacija();" style="font-weight: bold">Save</button>
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
@stop

@section('footer')
  <div style="height: 30px;" id="divche"></div>
@parent
@stop
