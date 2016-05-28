@extends('layouts.layout_basic')

@section('title')
Forgot password
@stop


@section('csslinks')
<link href="/bootstrap-3.3.6-dist/css/proba.css" rel="stylesheet">
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
	<div class="row" id="content">

					<div class="col-md-4"></div>
					<div class="col-md-4 nopadding" align="center" style="padding-left:30px; padding-right: 30px;">

					   <a href="/"> <img src="/images/puzlematchies.png" alt="" width="230px" style="padding-bottom: 15px;" id="slikaPuzzle"/> </a>

						<div class="jumbotron">

								<form class="form-signin" action="{{ url('/password/reset') }}" method="post">


									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<span style="color: white; font-size: 20px; font-weight: bold;"> Change your password </span>
									<div style="height: 10px;"></div>
									<input type="email" id="inputEmail" name ="email"  class="form-control" placeholder="Enter your email" required autofocus>
									<div class="span fill2"></div>
                  <input type="password" id="inputEmail" name ="password"  class="form-control" placeholder="Enter your email" required autofocus>
									<div class="span fill2"></div>
                  <input type="password" id="inputEmail" name ="password_confirmation"  class="form-control" placeholder="Enter your email" required autofocus>
									<div class="span fill2"></div>



									<button class="btn"  id="subButt" type="submit">Reset your password</button>
									<div class="span fill2"></div>
								</form>
						</div>
					</div>
					<div class="col-md-4"></div>
	</div>

</div><!-- /.container -->
@stop
@section('footer')
@parent
@stop
