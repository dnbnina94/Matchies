<!-- autori: Milena Filipovic 73/13 i Nina Grujic 177/13 -->
@extends('layouts.layout_basic')

@section('title')
Sign Up- Step 1!
@stop

@section('csslinks')
  <link href="/bootstrap-3.3.6-dist/css/proba2.css" rel="stylesheet">
	<link href="/bootstrap-3.3.6-dist/css/skloniKol1.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="/bootstrap-3.3.6-dist/js/validacijaSignUp.js"></script>
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

  					<div class="col-md-2"></div>
  					<div class="col-md-8" align="center" style="padding-left:10px; padding-right: 10px;">

  						<div class="jumbotron">

  							<form class="form" action="{{ url('/signup/step2') }}" name="signup1" onsubmit="return validacija()" method="post">
                  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  									<span style="font-weight: bold; font-size: 20px; color: #555555;"> You are just a few clicks away from meeting awesome people... </span>
  									<br/>    
  									<br/>
  									<div class="row" style="padding-top: 0px">
  									<div class="col-md-6" id="imeKolona" >
  										<div class="form-group" id="greske1" align="left" style="margin-bottom: 0px">
  										<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name" aria-describedby="inputError2Status" autofocus style="font-size: 16px;">
  										  <span id="fnameicon" class="" aria-hidden="true"></span>
  										  <span id="inputError2Status" class="sr-only">(error)</span>
  										<label class= "form-control-label" for="fname" id="flabel" align="left"style="color:#AE0000; font-weight:normal;"></label>
                       @if ($errors->has('fname'))<label class= "form-control-label" for="fname" id="flabel" align="left"style="color:#AE0000; font-weight:normal;"> <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('fname') }}</label> @endif
                      </div>
  									</div>
  									<div class="col-md-6" id="prezimeKolona">
  										<div class="form-group" id="greske2" align="left" style="margin-bottom: 0px">

  										 <input type="text" class="form-control has-error" name="lname" id="lname" placeholder="Enter your last name" style="font-size: 16px;">
  										 <span id="lnameicon" class="" aria-hidden="true"></span>
  										  <span id="inputError2Status" class="sr-only">(error)</span>
  										<label class= "form-control-label" for="lname" id="llabel"  style="color:#AE0000; font-weight:normal;"></label>
                      @if ($errors->has('lname'))
                      <label class= "form-control-label" for="lname" id="llabel"  style="color:#AE0000; font-weight:normal;">
                        <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('lname') }}
                      </label>
                      @endif
                      </div>
  									</div>
  									</div>
  									<div class="row">
  									<div class="col-md-6" id="emailKolona">
                                          <div class="form-group" id="greske3" align="left" style="margin-bottom: 0px">
  										 <input type="text" class="form-control has-error" name="email" id="email" placeholder="Enter your email"  style="font-size: 16px;">
                                              <span id="emailicon" class="" aria-hidden="true"></span>
  										  <span id="inputError2Status" class="sr-only">(error)</span>
  										<label class= "form-control-label" for="email" id="elabel"  style="color:#AE0000; font-weight:normal;"></label>
                      @if ($errors->has('email'))
                      <label class= "form-control-label" for="email" id="elabel"  style="color:#AE0000; font-weight:normal;">
                        <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('email') }}
                      </label>
                      @endif

                                          </div>
                                          </div>
  									<div class="col-md-6" id="emailAgainKolona">
                                          <div class="form-group" id="greske4" align="left" style="margin-bottom: 0px">
  										<input type="text" class="form-control has-error" name="emailAgain" id="emailAgain" placeholder="Re-enter your email" style="font-size: 16px;">
                                              <span id="emailagainicon" class="" aria-hidden="true"></span>
                                              <span id="inputError2Status" class="sr-only">(error)</span>
                                              <label class= "form-control-label" for="emailAgain" id="ealabel"  style="color:#AE0000; font-weight:normal;"></label>
                                              @if ($errors->has('emailAgain'))
                                              <label class= "form-control-label" for="emailAgain" id="ealabel"  style="color:#AE0000; font-weight:normal;">
                                                <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('emailAgain') }}
                                              </label>
                                              @endif

                                          </div>
                                          </div>

  									</div>
  									<div class="row" >

  									<div class="col-md-6" valign="middle"  style="color: #555555; padding-left: 10px">
  										<div class="row">

  										<div id="bday" class="text-left" style="padding-left:20px;"> Birthday: </div>
  										<br/>
  										</div>
  										<div class="row" align="left" style="padding-left:17px; padding-right:13px;">
  										<div class="form-inline smallSelect">

  											<select class="form-control "  name="month" id="month" style="font-size: 16px; padding-left: 8px;">
  											<option value="Month" disabled selected >Month</option>
  											</select>



  											<select class="form-control " name="day" id="day" style="font-size: 16px; padding-left: 8px;">
  											<option value='Day' disabled selected>Day</option>
  											</select>



  											<select class="form-control " name="year" id="year" style="font-size: 16px; padding-left: 8px;">
  											<option value="Year" disabled selected>Year</option>
  											<script>
  																var date = new Date();
  																var year = date.getFullYear();

  																for (var i = year - 18; i>=year-100; i--) {
  																	document.write("<option value='"+i+"'>"+i+"</option>");
  																}
  											</script>
  											</select>
                                              </div>
  										</div>
                                          <div class = "row" style = "color: #AE0000; display: none; padding-left:20px;" id="greske5" align="left">

                                              <span class="text-left" id="datelabel"></span>
                                          </div>
                                      @if ($errors->has('month') or $errors->has('day') or $errors->has('year'))
                                        <div class = "row" style = "color: #AE0000; padding-left:20px;" id="greske5" align="left">
                                              @if ($errors->has('month'))
                                              <span class="text-left">
                                             <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('month') }}
                                           </span> <br />
                                              @endif

                                              @if ($errors->has('day'))
                                              <span class="text-left" >
                                                <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('day') }}
                                              </span> <br />
                                              @endif
                                              @if ($errors->has('year'))
                                              <span class="text-left" >
                                                <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('year') }}
                                              </span> <br />
                                              @endif
                                      </div>
                                    @endif

  									</div>

  									<div class="col-md-6" valign="middle" style="color: #555555; padding-left:10px;">
  										<div class="row">
  										<div id="gen" class="text-left"> Gender: </div>
  										<br/>
  										</div>
  										<div class="row" align="left" id="rowGender">
  										<div>

  													<input id="genderMale" type="radio" name="gender" value="male">
  													 <label for="genderMale"><span><span></span></span>Male</label>
  													 &nbsp; &nbsp; &nbsp;
  													 <input id="genderFemale" type="radio" name="gender" value="female">
    													 <label for="genderFemale"><span><span></span></span>Female</label>

  										</div>
  										</div>
                                          <div class = "row"  id="greske6" align="left" style="color: #AE0000;  font-weight:normal; padding-left:20px;" >

                                              <span class="text-left"  id="genderlabel"></span>

                                          </div>
                                          @if ($errors->has('gender'))
                                          <div class = "row"  id="greske6" align="left" style="color: #AE0000;  font-weight:normal; padding-left:20px;" >

                                              <span class="text-left"  id="genderlabel">
                                                <span class="glyphicon glyphicon-remove"></span> {{ $errors->first('gender') }}
                                              </span>

                                          </div>
                                          @endif
  									</div>
  									</div>
  									<div class="row" style="padding-left: 15px; padding-right: 15px; padding-top: 7px">
  									<br/>
  									<button class="btn" id="subButt" name="submitButton" onclick="validacija();">Next step</button>
  									 <br/>
  									</div>



  							</form>

  						</div>


  					</div>
  					<div class="col-md-2"></div>






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
	  		<div class="col-md-3" id="kol2"></div>
	  		<div class="col-md-3" id="kol3"></div>
	  		<div class="col-md-3" id="kol4"></div>
	  	</div>
      </div>
 </footer>
@stop
