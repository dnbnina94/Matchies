@extends('layouts/layout_basic')

@section('title')
  Delete account
@stop

@section('csslinks')
  <link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop

@section('javascriptlinks')
	<script src="/bootstrap-3.3.6-dist/js/reportovanjeKorisnika.js"></script>
	<script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
	<script src="/bootstrap-3.3.6-dist/js/confirmPassword.js"></script>
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
  onload="ucitajDrzaveIGradove()"
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



  </div>
@stop

@section('footer')
  <div style="height: 30px;" id="divche"></div>
@parent
@stop
