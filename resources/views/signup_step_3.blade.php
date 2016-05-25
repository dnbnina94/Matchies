@extends('layouts.layout_basic')

@section('title')
Sign Up- Step 3!
@stop

@section('csslinks')
  <link href="bootstrap-3.3.6-dist/css/proba2.css" rel="stylesheet">
	<link href="bootstrap-3.3.6-dist/css/skloniKol3.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="bootstrap-3.3.6-dist/js/validacijaPicUpload.js"></script>
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
  	<div class="row" id="content">


  					<div class="col-md-6 col-md-offset-3" align="center" style="padding-left:10px; padding-right: 10px;">

  						<div class="jumbotron">

  							<form class="form" action="/signup_step_4" name="signup3" onsubmit="return validacija3();" method="post">
  									<span style="font-weight: bold; font-size: 20px; color: #555555;"> Now you need to choose your profile picture...  </span>
  									<div class= "row" style="padding-left:10px; padding-right:10px; padding-top:22px;">
  										<div class="row" align="center">
  										<div class="col-md-10 col-md-offset-1" align="center" >
  											<div id="profileImageBox" >
  												<div id="browseButton">
  													<div class="input-group image-preview">
  														<span class="input-group-btn">
  															<div class="btn btn-default image-preview-input" style="border: none; background: rgba(0,0,0,0); padding-bottom: 10px" >
  																<span class="glyphicon glyphicon-folder-open" style="font-size: 16px"></span>
  																<span class="image-preview-input-title" style="font-size: 16px">Browse</span>
  																<input type="file" accept="image/*" id="file" name="file" onchange="readURL();"/>
  															</div>
  														</span>
  													</div>
  												</div>
  											</div>
  										</div>
  										</div>
                                          <div class="row" style="color: #AE0000; display: none; padding-left:20px;" id="greskaSlika" align="left">

                                              <span class="text-left" id="picturelabel"></span>

                                          </div>

  									</div>

  									<div class="row" style="padding-left:10px; padding-right:10px; padding-top: 20px">
  									<span style="font-weight: bold; font-size: 20px; color: #555555;"> ...and your username and password: </span>
  									</div>
  									<div class="row" style="padding-left:10px; padding-right:10px; padding-top: 22px">

                                          <div class="form-group" id="greskaUsername" align="left">
  								            <input type="text" class="form-control has-error" name="username" id="username" placeholder="Choose your username" autofocus style="font-size: 16px">
                                              <span id="usernameicon" class="" aria-hidden="true"></span>
                                              <span id="inputError2Status" class="sr-only">(error)</span>
                                              <label class= "form-control-label" for="username" id="userlabel"  style="color:#AE0000; font-weight:normal;"></label>
                                          </div>

  									</div>
  									<div class="row" style="padding-left:10px; padding-right:10px;">

                                          <div class="form-group" id="greskaPassword" align="left">
  								            <input type="password" class="form-control has-error" name="password" id="password" placeholder="Choose your password"  style="font-size: 16px">
                                              <span id="passwordicon" class="" aria-hidden="true"></span>
                                              <span id="inputError2Status" class="sr-only">(error)</span>
                                              <label class= "form-control-label" for="password" id="passlabel"  style="color:#AE0000; font-weight:normal;"></label>
                                          </div>

  									</div>
  									<div class="row" style="padding-left:10px; padding-right:10px;">

                                          <div class="form-group" id="greskaRepeat" align="left">
  								            <input type="password" class="form-control has-error" name="passrepeat" id="passrepeat" placeholder="Re-enter your password"  style="font-size: 16px">
                                              <span id="repeaticon" class="" aria-hidden="true"></span>
                                              <span id="inputError2Status" class="sr-only">(error)</span>
                                              <label class= "form-control-label" for="passrepeat" id="repeatlabel"  style="color:#AE0000; font-weight:normal;"></label>
                                          </div>

                                          <button class="btn" id="subButt" type="submit" name="submitButton" onclick="validacija3();"><div align="center" valign="middle">Next step</div></button>

  									</div>

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
	  		<div class="col-md-3 korak" id="kol3">
	  			<div style="display: table; width: 100%; height: 100%">
	  				<div style="display: table-cell; vertical-align: middle;">
	  				<span><b>Step 3:</b> Profile picture, username and password</span>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-md-3" id="kol4"></div>
	  	</div>
      </div>
 </footer>
@stop
