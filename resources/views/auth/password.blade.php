<!-- autori: Branislava Ivkovic 125/13 i Petar Djukic 634/13 -->

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
								<form class="form-signin" action="/password/email" method="post">
                  {!! csrf_field() !!}


									<span style="color: white; font-size: 20px; font-weight: bold;"> Get your password </span>
									<div style="height: 10px;"></div>
									<p align="center" style="color: #F1F1F1; font-size: 18px;">
											Enter the email you used for registration on this website, and we will send you your password.
									</p>
									@if (count($errors) > 0)

													@foreach ($errors->all() as $error)
															<span style="color: #C0C0C0; font-size: 18px; font-weight:bold;">{{ $error }}</span>
															<br />
													@endforeach


									@endif

                  <div>
									           <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter your email" required autofocus>
                  </div>
									<div class="span fill2"></div>

                  <div>
									           <button class="btn"  id="subButt" type="submit">Continue</button>
                  </div>
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
