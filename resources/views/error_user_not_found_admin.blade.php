@extends('layouts.layout_admin')

@section('title')
ERROR
@stop

@section('csslinks')
	<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
	<link href="/bootstrap-3.3.6-dist/slider2/bootstrap-slider.css" rel="stylesheet">
	<link href="/bootstrap-3.3.6-dist/slider2/bootstrap-slider.min.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="/bootstrap-3.3.6-dist/slider2/bootstrap-slider.js"></script>
	<script src="/bootstrap-3.3.6-dist/slider2/bootstrap-slider.min.js"></script>
	<script src="/bootstrap-3.3.6-dist/js/sliderproba.js"></script>
	<script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
@stop

@section('sewingBut')
@parent
@stop

@section('onloadfunction')
onload="ucitaj()"
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
		<div class="col-md-6" align="center" style="padding-left:30px; padding-right: 30px;">

			<div style="display: table; width: 100%;  border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px;">

				<div style="padding-right:20px; padding-left:20px; padding-bottom: 20px; height: 100%; text-align: center; display: table-cell; vertical-align: 	middle">
					<h1 style="color:white; font-weight:bold;">Error!</h1>
          <p style="text-align: center; color: white; font-size: 16px">

              User not found in database.

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
