@extends('layouts.layout_basic')

@section('title')
Sign Up- Step 2!
@stop

@section('csslinks')
  <link href="/bootstrap-3.3.6-dist/css/proba2.css" rel="stylesheet">
	<link href="/bootstrap-3.3.6-dist/css/skloniKol2.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="/bootstrap-3.3.6-dist/js/validacijaLocation.js"></script>
@stop

@section('sewingBut')
@stop

@section('onloadfunction')
onload="bla()"
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
          <img alt="Matchies" src="/images/matchiespng.png" width="100px">
        </a>
      </div>

    </div>
  </nav>

  <div id="divHeader"></div>
  <div class="container">
  	<div class="row" id="content">


  					<div class="col-md-6 col-md-offset-3" align="center" style="padding-left:10px; padding-right: 10px;">

  						<div class="jumbotron">

  							<form class="form" action="{{ url('/signup/step3') }}" name="signup2" onsubmit="return validacija2();" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  									<span style="font-weight: bold; font-size: 20px; color: #555555;"> Now you need to enter your current location: </span>
  									<br/>
  									<br/>
  									<div class="row" style="padding-left:10px; padding-right:10px;">

  										<select name="country" class="form-control" id="country" style="font-size:16px; padding-left: 8px;">
  										<option  value="selectCountry" disabled selected>Your country</option>
  										</select>
  										<div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaDrzava" align="left">

                                              <span class="text-left" id="countrylabel"></span>

                                          </div>

  									</div>

  									<br/>
  									<div class="row" style="padding-left:10px; padding-right:10px;">

  										<select name="city" class="form-control" id="city" style="font-size: 16px; padding-left: 8px;">
  										<option value="selectCity" disabled selected>Your city</option>
  										</select>
                                          <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greskaGrad" align="left">

                                              <span class="text-left" id="citylabel"></span>

                                          </div>

                                          <br/>
  										<button class="btn" id="subButt" name="submitButton" onclick="validacija2()"><div align="center" valign="middle">Next step</div></button>

  									</div>

                      <input type="hidden" name="name" value="{{ $name }}">
                      <input type="hidden" name="surname" value="{{ $surname }}">
                      <input type="hidden" name="email" value="{{ $email }}">
                      <input type="hidden" name="gender" value="{{ $gender }}">
                      <input type="hidden" name="day" value="{{ $day }}">
                      <input type="hidden" name="month" value="{{ $month }}">
                      <input type="hidden" name="year" value="{{ $year }}">


  							</form>

  						</div>


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
	  		<div class="col-md-3" id="kol3"></div>
	  		<div class="col-md-3" id="kol4"></div>
	  	</div>
      </div>
 </footer>
@stop
