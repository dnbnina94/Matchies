@extends('layouts.layout_moderator')

@section('title')
Home Moderator
@stop

@section('csslinks')
	<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
@stop

@section('sewingBut')
@parent
@stop

@section('settingsBoxContainer')
@parent
@stop

@section('navbarmod')
@parent
@stop

@section('content')
<div class="container">

	<div class="row" id="content" style="padding-top: 3%;">

		<div class="col-md-1"></div>
		<div class="col-md-10" align="center" style="padding-left: 10px; padding-right: 10px">
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

				<div class="row">
					<div class="col-md-12">
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 0px">
							<span style="font-weight: bold"> Reports: </span>
							<div style="padding-top: 10px"></div>
							<div class="row">
								<div class="col-md-3">
									Reported user: <a href="#" style="font-weight: bold; color: #AE0000">user1</a><br/>
									Issued by: <a href="#" style="font-weight: bold; color: #AE0000">user2</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user shares inappropriate content.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash LikeRemove"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-3">
									Reported user: <a href="#" style="font-weight: bold; color: #AE0000">user3</a><br/>
									Issued by: <a href="#" style="font-weight: bold; color: #AE0000">user1</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">This user is bothering me, this user sends me mean messages.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash LikeRemove"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-3">
									Reported user: <a href="#" style="font-weight: bold; color: #AE0000">user3</a><br/>
									Issued by: <a href="#" style="font-weight: bold; color: #AE0000">user2</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user is spammer.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash LikeRemove"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-3">
									Reported user: <a href="#" style="font-weight: bold; color: #AE0000">user4</a><br/>
									Issued by: <a href="#" style="font-weight: bold; color: #AE0000">user3</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user is spammer.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash LikeRemove"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-3">
									Reported user: <a href="#" style="font-weight: bold; color: #AE0000">user4</a><br/>
									Issued by: <a href="#" style="font-weight: bold; color: #AE0000">user2</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user shares inappropriate content.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash LikeRemove"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-3">
									Reported user: <a href="#" style="font-weight: bold; color: #AE0000">user4</a><br/>
									Issued by: <a href="#" style="font-weight: bold; color: #AE0000">user1</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user shares inappropriate content.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash LikeRemove"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div style="padding-top: 15px; padding-bottom: 25px; color: white; text-align: center">
								You have no more reports.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
@stop

@section('footer')
<div style="height: 80px;" id="divche"></div>
@parent
@stop
