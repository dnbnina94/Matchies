@extends('layouts.layout_basic')

@section('title')
Home
@stop

@section('csslinks')
	<link href="bootstrap-3.3.6-dist/css/proba.css" rel="stylesheet">
@stop

@section('sewingBut')
@parent
@stop

@section('onloadfunction')
onload="ucitaj();"
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

			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px;">

				<div style="height: 100%; text-align: center; display: table-cell; vertical-align: 	middle">
					<form class="form-signin" action="/searching" method="post">
						<table width="100%" style="color: white; font-weight: bold; margin-top: 15px">
							<tbody>
								<tr>
									<td width="50%" align="left">Show ages:</td>
									<td width="50%" align="right" id="pokaziGodine"></td>
								</tr>
							</tbody>
						</table>

						<div class="row">
							<div class="col-md-12" style="padding-top:15px">
								<div style="display: table; width: 100%; height: 70px; border-radius: 5px; background-color: #AAAAAA; padding-left: 20px; padding-right: 20px;">
									<div style="height: 100%; text-align: center; display: table-cell; vertical-align: 	middle">
										<input id="ageslider" type="text"  value="" data-slider-min="18" data-slider-max=	"80" data-slider-step="1" data-slider-tooltip="hide" data-slider-value="[25,45]"/>
									</div>
								</div>

								<table width="100%" style="color: white; font-weight: bold; margin-top: 15px">
									<tbody>
										<tr>
											<td width="40%" align="left">Show me:</td>
											<td width="60%" align="right" id="pokaziPol"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="row" style="color: white; font-weight: bold; padding-top: 15px;">
							<div class="col-md-12">
								<div style="display: table; width: 100%; height: 70px; border-radius: 5px; background-color: #AAAAAA; padding-left: 20px; padding-right: 20px;">
									<div style="height: 100%; text-align: center; display: table-cell; vertical-align: 	middle; padding-top: 20px; padding-bottom: 20px">
										<div class="row">
											<div class="col-md-9 text-left">Men:</div>
											<div class="col-md-3 text-right" style="padding-left: 23px">
												<input id="maleslider" type="text"  value="" data-slider-min="0" data-slider-max="1" data-slider-step="1" data-slider-tooltip="hide" data-slider-value="0"/>
											</div>
										</div>
										<div style="height: 10px"></div>
										<div class="row">
											<div class="col-md-9 text-left">Women:</div>
											<div class="col-md-3 text-right" style="padding-left: 23px">
												<input id="femaleslider" type="text" value="" data-slider-min="0" data-slider-max="1" data-slider-step="1" data-slider-tooltip="hide" data-slider-value="0"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 text-center" style="padding-top:20px; color: white; font-size: 16px;">
								<p>
									Matchies uses these preferences to suggest potential matches. You can change these settings any time.
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8 col-md-offset-2" align="center">
								<img id= "nekaSlika" class="img-responsive" src="images/searching.gif" />
							</div>
						</div>

						<div class="row">
							<div class="col-md-12" style="padding-top:15px; padding-bottom: 30px">
								<button class=" btn" id="subButt" type="submit"><b>Search</b></button>
							</div>
						</div>
					</form>
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
