<!-- autor: Petar Djukic 634/13 -->
@extends('layouts.layout_admin')

@section('title')
Home Moderator
@stop

@section('csslinks')
	<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/upozoravanjeKorisnika.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/uklanjanje.js"></script>
@stop

@section('sewingBut')
@parent
@stop

@section('specialMessage')
<div id="moderatorBoxContainer">
	<div id="moderatorBoxRowContainer">
		<div id="moderatorBoxCellContainer">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4" style="margin-left: 25px; margin-right: 25px">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="moderatorBox col-md-8">
							<table width="100%">
								<tr>
									<td style="font-weight: bold">
										Details about moderator:
									</td>
									<td align="right" style="font-size: 16px; color: white">
										<span class="glyphicon glyphicon-remove" onclick="moderatorKorRemove()" style="cursor: pointer"></span>
									</td>
								</tr>
							</table>
							<div class="row">
								<div class="col-md-12" align="left" style="color: black; padding-top: 10px">
									Username: <span id="usernameMod" style="color: white; font-weight: bold"></span><br/>
									Email: <span id="emailMod" style="color: white; font-weight: bold"></span><br/>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
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
							<form name="deleteUser" action="/admin/deleteMod" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="moderatorID" id="moderatorID" value="" />
								Are you sure you want to delete this moderator?<br/>
								<div style="padding-bottom:10px"></div>
								<button class=" btn" id="subButt1" type="submit" style="background: #383838"><b>Delete this moderator</b></button>
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

@section('navbarmod')
@parent
@stop

@section('content')

<div class="container">

	<div class="row" id="content" style="padding-top: 3%;">

		<div class="col-md-3"></div>
		<div class="col-md-6" align="center" style="padding-left: 10px; padding-right: 10px">
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

				<div class="row">
					<div class="col-md-12" align="left">
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 0px">
							<span style="font-weight: bold"> Moderators: </span>
							<div style="padding-top: 10px"></div>

							@foreach ($users as $user)
							<form>
							<div class="row moderatorRow">
								<div class="col-md-6">

									Username:
									<?php
										echo('<span class="moderatori" style="font-weight: bold; color: #AE0000; cursor: pointer" onclick="moderatorKorDisplay(\'' . $user->username . '\' , \'' . $user->email . '\')">' . $user->username . '</span>');
									?>
								</div>
								<div class="col-md-6 desno">
									<span class="glyphicon glyphicon-trash" style="color: #AE0000; cursor: pointer" onclick="deleteModeratorDisplay({{$user->id}})"></span>
								</div>
							</div>

							<table class="moderatorCrta" width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>
							</form>
							@endforeach

							<div style="padding-top: 10px; padding-bottom: 25px; color: white; text-align: center">
								There are no more moderators to be shown.
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
