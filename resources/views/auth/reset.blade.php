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

								<form class="form-signin" action="/password/reset" method="post">
                  {!! csrf_field() !!}
                  <input type="hidden" name="token" value="{{ $token }}">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
									<span style="color: white; font-size: 20px; font-weight: bold;"> Reset your password </span>
									<div style="height: 10px;"></div>
									<p align="center" style="color: #F1F1F1; font-size: 18px;">
											Enter your email and set your new password!
									</p>
									<input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Enter your email" required autofocus>

									<div class="span fill2"></div>
									<input type="password" name = "password" id="inputEmail" class="form-control" placeholder="Enter your password" required>

									<div class="span fill2"></div>
									<input type="password" name = "password_confirmation" id="inputEmail" class="form-control" placeholder="Enter your password again" required>
									<div class="span fill2"></div>
									<button class="btn"  id="subButt" type="submit">Continue</button>

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
