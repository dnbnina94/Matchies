@extends('layouts.layout_basic')

@section('title')
Notifications
@stop

@section('csslinks')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="/bootstrap-3.3.6-dist/js/promenaProfila.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
@stop


@section('sewingBut')
@parent
@stop


@section('javascriptFunctions')
	<script>
		$(document).ready(function(){
    		$("#readMore").click(function(){
        		$("#ostatak").slideToggle();
        		if ($("#readMore").html() == "Read more")
        			$("#readMore").html("Show less");
        		else
        			$("#readMore").html("Read more");
    		});
		});
	</script>
@stop



@section('settingsBoxContainer')
@parent
<table id="dijalog">
	<tr>
		<td align="center" valign="middle" id="alertMessage">
		</td>
	</tr>
</table>
@stop

@section('navbar')
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
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 0px">
							<span style="font-weight: bold"> Notifications: </span>
							<div style="padding-top: 10px"></div>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8; border-top: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<i class="fa fa-heart" aria-hidden="true" style="font-size: 40px; color: #AD423C"></i>
									</td>
									<td valign="top" style="padding: 10px">
										<span style="color: white"> You have been matched with user <a href="#" style="color: #AE0000">UserBlaBla</a>. You can now start your conversation.</span> <br/>
										<div style="padding-top:10px"></div>
										<span style="color: #DCEBF9; font-size: 12px;">21.03.2016. 12:09</span>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<i class="fa fa-camera-retro" aria-hidden="true" style="font-size: 40px; color: #AD423C"></i>
									</td>
									<td valign="top" style="padding: 10px">
										<span style="color: white"> You have unlocked photos of <a href="#" style="color: #AE0000">UserNina</a>. Click <a href="#" style="color: #AE0000">here</a> to see them.</span> <br/>
										<div style="padding-top:10px"></div>
										<span style="color: #DCEBF9; font-size: 12px;">21.03.2016. 11:09</span>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size: 40px; color: #AD423C"></i>
									</td>
									<td valign="top" style="padding: 10px">
										<span style="color: white">You have been reported for negative attitude. Please, pay attention to your behavior. Otherwise, you'll get banned from our website.</span> <br/>
										<div style="padding-top:10px"></div>
										<span style="color: #DCEBF9; font-size: 12px;">20.03.2016. 08:43</span>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<i class="fa fa-heart" aria-hidden="true" style="font-size: 40px; color: #AD423C"></i>
									</td>
									<td valign="top" style="padding: 10px">
										<span style="color: white"> You have been matched with user <a href="#" style="color: #AE0000">TheyCallMeBot</a>. You can now start your conversation.</span> <br/>
										<div style="padding-top:10px"></div>
										<span style="color: #DCEBF9; font-size: 12px;">20.03.2016. 00:19</span>
									</td>
								</tr>
							</table>
							<div style="padding-top: 20px; padding-bottom: 25px; color: white; text-align: center">
								You have no more notifications.
							</div>
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
