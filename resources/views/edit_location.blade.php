@extends('layouts/layout_basic')

@section('title')
  Edit location
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
  													<a href="/edit_location" class="editProfileLink" style="color: #AE0000">Location</a>
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
  													<a href="/delete_account" class="editProfileLink">Delete your account</a>
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
  											<div class="col-md-12" align="left">
  												<form name="editLocation" action="/edit_location" method="post">
  												<span>Country:</span><br/>
  												<select name="country" class="form-control" id="country" style="font-size:16px; padding-left: 8px;">
  													<option  value="selectCountry" disabled selected>Your country</option>
  												</select>
  												<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaDrzava" align="left">

                                              		<span class="text-left" id="countrylabel"></span>

                                          		</div>
  											</div>
  										</div>
  										<div class="row" style="padding-top: 10px">
  											<div class="col-md-12" align="left">
  												<span>City:</span><br/>
  												<select name="city" class="form-control" id="city" style="font-size: 16px; padding-left: 8px;">
  													<option value="selectCity" disabled selected>Your city</option>
  												</select>
                                          		<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaGrad" align="left">

                                              		<span class="text-left" id="citylabel"></span>

                                          		</div>
  												</form>
  											</div>
  										</div>

  										<div class="row" style="padding-top: 20px; padding-bottom: 7px">
  											<div class="col-md-9"></div>
  											<div class="col-md-3">
  												<button class="btn" id="subButt" name="submitButton" onclick="return validacija2();" style="font-weight: bold">Save</button>
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
