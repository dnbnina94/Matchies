<!-- autor: Petar Djukic 634/13 -->
@extends('layouts.layout_admin')

@section('title')
Home Moderator
@stop

@section('csslinks')
	<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
  <script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>
  <script src="bootstrap-3.3.6-dist/js/validacijaModerator.js"></script>
@stop

@section('sewingBut')
@parent
@stop

@section('specialMessage')
@stop

@section('settingsBoxContainer')
@parent
@stop

@section('navbarmod')
@parent
@stop

@section('content')

<div class="container">

	<div class="row" id="content" style="padding-top: 3%;">

		<div class="col-md-3"></div>
		<div class="col-md-6" align="center" style="padding-left: 10px; padding-right: 10px">
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

				<div class="row">
					<div class="col-md-12">
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 10px">
							<span style="font-weight: bold"> Register a new moderator:</span>
							<div style="padding-top: 10px"></div>
							<form name="newModerator" method="post" action="/moderators_admin">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
								 <div class="form-group" id="greskaUsername" align="left" style="margin-bottom: 0px !important">
  								    <input type="text" class="form-control has-error" name="username" id="username" placeholder="Moderator's username" autofocus style="font-size: 16px">
                                    <span id="usernameicon" class="" aria-hidden="true"></span>
                                    <span id="inputError2Status" class="sr-only">(error)</span>
                                    <label class= "form-control-label" for="username" id="userlabel"  style="color:#AE0000; font-weight:normal;"></label>
                                 </div>

                                 <div class="form-group" id="greskaPassword" align="left" style="margin-bottom: 0px !important">
  								 	<input type="password" class="form-control has-error" name="password" id="password" placeholder="Moderator's password"  style="font-size: 16px">
                                   	<span id="passwordicon" class="" aria-hidden="true"></span>
                                   	<span id="inputError2Status" class="sr-only">(error)</span>
                                   	<label class= "form-control-label" for="password" id="passlabel"  style="color:#AE0000; font-weight:normal;"></label>
                                 </div>

                                 <div class="form-group" id="greskaRepeat" align="left" style="margin-bottom: 0px !important">
  								    <input type="password" class="form-control has-error" name="passrepeat" id="passrepeat" placeholder="Re-enter moderator's password"  style="font-size: 16px">
                                    <span id="repeaticon" class="" aria-hidden="true"></span>
                                    <span id="inputError2Status" class="sr-only">(error)</span>
                                    <label class= "form-control-label" for="passrepeat" id="repeatlabel"  style="color:#AE0000; font-weight:normal;"></label>
                                 </div>

                                 <div class="form-group" id="greske3" align="left" style="margin-bottom: 0px !important">
  									<input type="text" class="form-control has-error" name="email" id="email" placeholder="Moderator's email"  style="font-size: 16px;">
                                    <span id="emailicon" class="" aria-hidden="true"></span>
  									<span id="inputError2Status" class="sr-only">(error)</span>
  									<label class= "form-control-label" for="email" id="elabel"  style="color:#AE0000; font-weight:normal;"></label>
                                 </div>

                                 <div class="form-group" id="greske4" align="left"style="margin-bottom: 10px !important">
  									<input type="text" class="form-control has-error" name="emailAgain" id="emailAgain" placeholder="Re-enter moderator's email" style="font-size: 16px;">
                                    <span id="emailagainicon" class="" aria-hidden="true"></span>
                                    <span id="inputError2Status" class="sr-only">(error)</span>
                                    <label class= "form-control-label" for="emailAgain" id="ealabel"  style="color:#AE0000; font-weight:normal;"></label>
                                 </div>

                                 <button class="btn" id="subButt" name="submitButton" type="submit" onclick="validacijaModerator();">Register a moderator</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
@stop

@section('footer')
<div style="height: 80px;" id="divche"></div>
@parent
@stop
