@extends('layouts.layout_basic')

@section('title')
Login
@stop

@section('sewingBut')
@parent
@stop

@section('settingsBoxContainer')
@stop

@section('navbar')
@stop

@section('content')

<div class="divHeader"></div>
<div class="container">
	<div class="row" id="content" >

					<div class="col-md-4"></div>
					<div class="col-md-4 nopadding" align="center" valign="middle">

					   <a href="/"> <img src="images/puzlematchies.png" alt="" width="230px" style="padding-bottom: 15px; padding-top:5px;" id="slikaPuzzle"/> </a>

						<div class="jumbotron">

								<form class="form-signin" action="/home" method="post">
									<span style="color: white; font-size: 22px; font-weight: bold;"> Welcome! </span>
									<div class="span fill"></div>
									<input type="text" id="usr" class="form-control" placeholder="Enter your username" required autofocus>
									<div class="span fill2"></div>
									<input type="password" id="inputPassword" class="form-control" placeholder="Enter your password" required>
									<div class="span fill2"></div>
									<button class="btn" id="subButt" type="submit">Login</button>
									<div style="height: 8px;"></div>
									 <p class="text-right">
									 <a id="specialLink" href="/forgot_password"> Forgot your password? </a>
									 <span style="font-size: 20px;"> &bull; </span>
									 <a href="/signup_step_1" style="font-weight: bold;">Sign up!</a>
									 </p>
								</form>

						</div>

					</div>
					<div class="col-md-4"></div>
	</div>
</div>

@stop

@section('footer')
@parent
@stop
