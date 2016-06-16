<!-- autori: Milena Filipovic 73/13 i Branislava Ivkovic 125/13 -->
@extends('layouts.layout_basic')

@section('title')
:(
@stop

@section('csslinks')
	<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop

@section('javascriptlinks')
@stop

@section('sewingBut')
@parent
@stop

@section('onloadfunction')
@stop

@section('settingsBoxContainer')
@parent
@stop

@section('navbar')
@parent
@stop

@section('content')
<div class="container">

	<div class="row" id="content" style="padding-top: 3%;">

		<div class="col-md-3"></div>
		<div class="col-md-6" align="center" style="padding-top:60px; padding-left:30px; padding-right: 30px; height:80%;">

			<div style="display: table; width: 100%;  border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px;">

				<div style="padding-top:20px; padding-bottom:30px; padding-right:20px; padding-left:20px; height: 100%; text-align: center; display: table-cell; vertical-align: 	middle">
					<span style="color:#AE0000; font-weight:bold; font-size: 80px">
						<i class="fa fa-frown-o" aria-hidden="true"></i>
					</span>
          <p style="text-align: center; color: white; font-size: 16px">

              There are no more users to be shown. You can go back to <a href="/home" style="color: #AE0000; text-decoration: underline">homepage</a> to change some preferences or try again later.

          </p>
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
