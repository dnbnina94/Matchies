@extends('layouts.layout_basic')

@section('title')
Notifications
@stop

@section('csslinks')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
	<script src="bootstrap-3.3.6-dist/js/promenaProfila.js"></script>
  <script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>
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

@section('onloadfunction')onload="ucitaj();" @stop

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
							<span style="font-weight: bold"> Messages: </span>
							<div style="padding-top: 10px"></div>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8; border-top: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envclosed.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="/chat" style="color: white; font-weight: bold; font-size: 16px">UserNina</a>
										<i class="fa fa-reply" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">21.03.2016. 13:43</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 50%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-lock" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envclosed.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="/chat" style="color: white; font-weight: bold; font-size: 16px">MyNameIsBot</a>
										<i class="fa fa-reply" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">10.02.2016. 09:33</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 20%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-lock" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envopen.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="/chat" style="color: white; font-weight: bold; font-size: 16px">PrettyLady</a>
										<i class="fa fa-reply" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">11.01.2016. 19:09</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 70%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-lock" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<table width="100%" height="70px" style="border-bottom: 1px solid #B9BAB8">
								<tr>
									<td valign="middle" width="5%" style="padding-right: 10px; padding-left: 10px">
										<img src="images/envopen.png" width="40px" />
									</td>
									<td valign="top" style="padding: 10px">
										<a href="/chat" style="color: white; font-weight: bold; font-size: 16px">Mary_Jane</a>
										<i class="fa fa-share" style="font-size: 14px;"></i> <br/>
										<div style="padding-top: 5px"><span style="color: #F1F1F1; font-size: 12px;">11.01.2016. 17:19</span></div> <br/>
										<table width="100%" style="padding-top: 0px">
											<tr>
												<td width="100%">
													<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
  														<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 100%" id="progressComplete">
  														</div>
													</div>
												</td>
												<td style="padding-left: 10px">
													<i class="fa fa-unlock-alt" style="font-size: 20px"></i>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<div style="padding-top: 20px; padding-bottom: 25px; color: white; text-align: center">
								You have no more messages.
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
