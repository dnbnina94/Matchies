@extends('layouts.layout_admin')

@section('title')
Home Moderator
@stop

@section('csslinks')
	<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/uklanjanje.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/upozoravanjeKorisnika.js"></script>
@stop

@section('sewingBut')
@parent
@stop

@section('specialMessage')
<div id="reportBoxContainer">
	<div id="reportBoxRowContainer">
		<div id="reportBoxCellContainer">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="reportBox col-md-4" style="margin-left: 25px; margin-right: 25px">
					<table width="100%" style="margin-bottom: 10px">
						<tr>
							<td style="font-weight: bold; font-size: 16px; color: white">
								Warn this user:
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="reportKor1remove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					Choose a reason for warning this user:
					<form name="reportUser" method="post" action = '/admin/warn_user'>

						<input type="hidden"  id= "user_idBox" name ="user_idBox" value = "">
						<input type="hidden" id= "report_idBox"  name ="report_idBox" value = "">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div style="padding-bottom:10px"></div>
					<div style="padding-bottom: 8px; border-bottom: 1px solid white">
						<input id="report1" type="radio" name="report" value="report1" checked="checked">
						<label for="report1"><span><span></span></span>Feels like spam</label>
					</div>
					<div style="padding-bottom: 8px; padding-top:10px; border-bottom: 1px solid white">
						<input id="report2" type="radio" name="report" value="report2">
						<label for="report2"><span><span></span></span>This user is sharing inappropriate information</label>
					</div>
					<div style="padding-bottom: 10px; padding-top:10px;">
						<input id="report3" type="radio" name="report" value="report3">
						<label for="report3"><span><span></span></span>Other</label><br/>
						<div style="padding-bottom: 6px"></div>
						<textarea class="form-control"  placeholder="Write down a reason for warning this user" name="OtherReason" id="otherreason" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
						<div id="greskaReport" style="color: #AE0000; padding-top: 5px"></div>
					</div>
					<!--
					<button class=" btn" id="subButt1" type="submit" style="background: #ae0000" onclick="return proveriWarn()"><b>Warn this user</b></button>
				-->
						<button class=" btn" id="subButt1" type="submit" style="background: #ae0000" ><b>Warn this user</b></button>
					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="deleteBoxContainer">
	<div id="deleteBoxRowContainer">
		<div id="deleteBoxCellContainer">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="deleteBox col-md-4" style="margin-left: 25px; margin-right: 25px">
					<table width="100%">
						<tr>
							<td>
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="deleteKorRemove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					<div class="row">
						<div class="col-md-12" align="center">
							<form name="deleteUser" action="/index_admin" method="post">
								Are you sure you want to delete this report?<br/>
								<div style="padding-bottom:10px"></div>
								<button class=" btn" id="subButt1" type="submit" style="background: #383838" onclick="return deleteReportRemove()"><b>Delete this report</b></button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
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

		<div class="col-md-1"></div>
		<div class="col-md-10" align="center" style="padding-left: 10px; padding-right: 10px">
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

				<div class="row">
					<div class="col-md-12" align="left">
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 0px">
							<span style="font-weight: bold"> Reports: </span>
							<div style="padding-top: 10px"></div>

							@foreach ($reports as $report)
							<form >
								<div class="row userRow">
									<div class="col-md-3">
										Reported user: <a href="/profile/{{$report->id_source_user}}" style="font-weight: bold; color: #AE0000">{{App\User::where('id', '=', $report->id_source_user)->first()->username}}</a><br/>
									</div>
									<input type="hidden" name ="user_id" value = "{{$report->id_source_user}}">
									<input type="hidden" name ="report_id" value = "{{$report->id}}">

											<input type="hidden" name="_token" value="{{ csrf_token() }}">


									<div class="col-md-5">
										Reason: <span style="color: #AE0000;">{{$report->description}}</span>
									</div>
									<div class="col-md-4">
										<table>
											<tr>
												<td width="100%">
													<button type='button' class="btn" id="subButt" onclick="warnKorDisplay(0,{{$report->id_source_user}},{{$report->id}})"><b>Warn</b></button>
												</td>
												<td style="padding-left: 5px">
													<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(0)"></span>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</form>

								<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
									<tr>
										<td>
										</td>
									</tr>
								</table>
							@endforeach

	<!--
							<div class="row userRow">
								<div class="col-md-3">
									Reported user: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user1</a><br/>
									Issued by: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user2</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user shares inappropriate content.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt" onclick="warnKorDisplay(0)"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(0)"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row userRow">
								<div class="col-md-3">
									Reported user: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user3</a><br/>
									Issued by: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user1</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">This user is bothering me, this user sends me mean messages.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt" onclick="warnKorDisplay(1)"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(1)"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row userRow">
								<div class="col-md-3">
									Reported user: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user3</a><br/>
									Issued by: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user2</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user is spammer.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt" onclick="warnKorDisplay(2)"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(2)"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row userRow">
								<div class="col-md-3">
									Reported user: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user4</a><br/>
									Issued by: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user3</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user is spammer.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt" onclick="warnKorDisplay(3)"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(3)"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row userRow">
								<div class="col-md-3">
									Reported user: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user4</a><br/>
									Issued by: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user2</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user shares inappropriate content.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt" onclick="warnKorDisplay(4)"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(4)"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							<div class="row userRow">
								<div class="col-md-3">
									Reported user: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user4</a><br/>
									Issued by: <a href="/profile_5" style="font-weight: bold; color: #AE0000">user1</a>
								</div>
								<div class="col-md-5">
									Reason: <span style="color: #AE0000;">Reported user shares inappropriate content.</span>
								</div>
								<div class="col-md-4">
									<table>
										<tr>
											<td width="100%">
												<button class=" btn" id="subButt" onclick="warnKorDisplay(5)"><b>Warn</b></button>
											</td>
											<td style="padding-left: 5px">
												<span class="glyphicon glyphicon-trash trashIcon" onclick="deleteReportDisplay(5)"></span>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<table class="userCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>
-->
							<div style="padding-top: 10px; padding-bottom: 25px; color: white; text-align: center">
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
