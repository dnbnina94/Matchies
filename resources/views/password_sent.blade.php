@extends('layouts.layout_basic')

@section('title')
Password sent
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

					   <a href="/"> <img src="/images/puzlematchies.png" alt="" width="230px" style="padding-bottom: 15px;" id="slikaPuzzle" /> </a>

						<div class="jumbotron">
									<span style="color: white; font-size: 20px; font-weight: bold;"> Check your email </span>
									<div style="height: 10px;"></div>
									<p align="center" style="color: #F1F1F1; font-size: 18px;">
											We've sent you an email. Click the link in the email to get your password.
									</p>
									<p align="center" style="color: #F1F1F1; font-size: 18px;">
										If you don't see the email, check other places it might be, like your junk, spam, social or other folders.
									</p>

									<div class="text-right">
									<a  id="specialLink" href="/forgot_password">I didn't recieve the email</a>
									</div>



						</div>


					</div>
					<div class="col-md-4"></div>
	</div>
</div><!-- /.container -->

@stop

@section('footer')
@parent
@stop
